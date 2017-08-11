<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Validation\Validation;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\Network\Email\Email;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
   

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
     public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'forgotPassword','forgot']);
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bookmarks']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
       
        $user = $this->Users->newEntity();
        
        
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
           
            if ($this->Users->save($user)) {
               
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $id = $this->decode($id);
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function decode($id = NULL)
	{
		//$this->autoRender = false;
		return base64_decode($id);
		//die();
	}

  
   public function login() {
        if ($this->Auth->user()) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            if (Validation::email($this->request->data['username'])) {
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }
            $user = $this->Auth->identify();

            if ($user) {
                if ($user['status'] == 1) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error('This user account is currently disabled by administrator.');
                }
            } else {
                $this->Flash->error('Your username or password is incorrect.');
            }
        }
        ini_set('memory_limit', '-1'); 

    }

    public function logout()
        {
            $this->Flash->success('You are now logged out.');
            return $this->redirect($this->Auth->logout());
            ini_set('memory_limit', '-1'); 

        }

    public function status()
        {
                if ($this->request->is('ajax')) {
                    
                    $datasuccess= $this->Users->query()->update()
                            ->set(['status' => $this->request['data']['status']])
                            
                            ->where(['id' => $this->request['data']['id']])
                            ->execute();
                           
                    if($datasuccess){

                    echo 'Status changed';
                    }
                    else{
                        echo 'Status unchanged';
                    }

                    die();
                                //$dataStatus=$this->UsersController->query()->update

                }

        }
        /**
     * Allow a user to request a password reset.
     * @return
     */
    public function forgotPassword() {
        if ($this->Auth->user()) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {

            $user = $this->Users->findAllByUsernameOrEmail($this->request->data['username'], $this->request->data['username'])->first();
            if (empty($user)) {

                $this->Flash->error('Sorry, the username or email entered was not found.');
                return $this->redirect('/users/forgot_password');
            } else {
                //$user_array = $user->toArray();
                $user->activation_key = $this->__generatePasswordToken();

                $reset_link=  Router::url(['controller'=>'Users','action'=>'forgot',$this->encode($user->id),$user->activation_key],true);
                $reset_link='<a href="'.$reset_link.'" target="_blank">'.$reset_link.'</a>';
                 $to=$user->email;
                 $from='sunnymaharjan22@gmail.com';
                 
                 $username=$user->username;
                 $body='Hello'.$username.'<br />';
                 $body.='To Reset the password Please click the link below'.'<br />';
                 $body.=$reset_link.'<br /><br /><br />';
                 $body.='Powered by Lumbini Insurance'.'<br /><br />';
                 $subject='Reset Password';
                 
//                 $email = new Email('default');
//                        $email->from($from)
//                        ->to($to)
//                        ->emailFormat('html')
//                        ->subject($subject)
//                        ->send($body);
                if ($this->Users->save($user)){

                    $this->Flash->success('Password reset instructions have been sent to your email address.
                        You have 24 hours to complete the request.'.$reset_link);
                   
                    return $this->redirect('/users/login');
                }
            }
            die();


        }
    }

    function forgot($user_id, $code) {
        $user_id = $this->decode($user_id);
        
        //check user
        $user = $this->Users->find()->contain([])->where(['id' => $user_id, 'activation_key' => $code, 'status' => 1])->first();
        $success = false;

        if (empty($user)) {
            $this->Flash->error(__('Invalid User!'));

            $this->set(compact('success', 'user'));

            return;
        } else
            $success = true;



        if ($this->request->is(['post'])) {



            if ($this->request->data['password'] != $this->request->data['confirm_password']) {
                $this->Flash->error(__('Passwords do not match!'));
            } else {

                $user = $this->Users->get($user_id, [
                    'contain' => []
                ]);





                $user = $this->Users->patchEntity($user, $this->request->data);
                //change activation code

                $user->activation_key = $this->__generatePasswordToken();
                
                if ($this->Users->save($user)) {

                    $this->Flash->success(__('Password changed successfully. Please, log in.'));
                    $success = true;

                    return $this->redirect(['action' => 'login']);
                } else {

                    $this->Flash->error(__('Password could not be changed. Please, try again.'));
                }
            }
        }


        $this->set(compact('success', 'user'));
    }

    /**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    private function __generatePasswordToken() {
       
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
       
//        $user['User']['token_created_at']     = date('Y-m-d H:i:s');
        return $hash;
    }

    /**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    private function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    private function __sendForgotPasswordEmail($id = null) {
        if (!empty($id)) {
            $this->Users->id = $id;
            $User = $this->Users->read();
            $this->Email->to = $User['User']['email'];
            $this->Email->subject = 'Password Reset Request - DO NOT REPLY';
            $this->Email->replyTo = 'do-not-reply@example.com';
            $this->Email->from = 'Do Not Reply <do-not-reply@example.com>';
            $this->Email->template = 'reset_password_request';
            $this->Email->sendAs = 'both';
            $this->set('User', $User);
            $this->Email->send();
            return true;
        }
        return false;
    }

    /**
     * Notifies user their password has changed.
     * @param $id
     * @return
     */
    private function __sendPasswordChangedEmail($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();
            $this->Email->to = $User['User']['email'];
            $this->Email->subject = 'Password Changed - DO NOT REPLY';
            $this->Email->replyTo = 'do-not-reply@example.com';
            $this->Email->from = 'Do Not Reply <do-not-reply@example.com>';
            $this->Email->template = 'password_reset_success';
            $this->Email->sendAs = 'both';
            $this->set('User', $User);
            $this->Email->send();
            return true;
        }
        return false;
    }
    public function register() 
     {
                $this->viewBuilder()->setLayout('home');

        $user = $this->Users->newEntity();
        
        
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
           
            if ($this->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

}
