<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[] paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }
    
    public function home()
    {
//        $logged_inuser=false;
//        if ($this->Auth->user()){
//            $logged_inuser=true;
//        }
//      if($logged_inuser){
//          echo 'loggedin';
//      }else{
//          echo 'not logged in';
//      }
//      die();
        $logged_inuser=$this->Auth->user();
        
        $this->viewBuilder()->setLayout('home');
        //$this->viewBuilder()->setLayout();
        $user = $this->Products->Users->newEntity();
        
        
        if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->paginate = [
            'order'=>['Products.id'=>'DESC'],
            'limit' => 12
            
        ];
        $products = $this->paginate($this->Products);
        
        $this->set(compact('products','logged_inuser','user'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         $this->viewBuilder()->setLayout('home');
        $id=$this->decode($id);
        $logged_inuser=$this->Auth->user();
        
        //$this->viewBuilder()->setLayout();
      //  debug($logged_inuser);die();
        
        
        
        $orders = $this->Products->Orders->newEntity();
        $user = $this->Products->Users->newEntity();
        
        
        if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            //$this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        if ($this->request->is('post')) {
            $orders = $this->Products->Orders->patchEntity($orders, $this->request->data);
//           debug($orders);die();
            $quantitychange=$this->Products->find()
                    ->select(['quantity'])
                    ->where(['id'=>$id])
                    ->first();
            
            //$quantitychange=$quantitychange->toArray();
//    debug($quantitychange); debug($orders);
//                die();
          //  var $qty[]='';
            
            
           // $qtys=$orders['quantity']-$quantitychange['quantity'];
            
            
          //  echo $orders['quantity']-$quantitychange['quantity'];die();
            
            $result = $quantitychange->quantity - $orders->quantity  ;
//            echo $result; die();
            if ($this->Products->Orders->save($orders)) {
               
                $quantitychange=$this->Products->updateAll(['quantity'=>$result],['id'=>$id]);
//                        ->select(['quantity'])
//                        ->update(['quantity'=>$result])
                       // ->where(['id'=>$id]);
                       // ->execute();
               // $quantitychange=$this->$quantitychange->toArray();
                
//                $quantitychange=$quantitychange->toArray();
//                debug($quantitychange);
//                die();
                $this->Flash->customer(__('Congratulation ! Your product has been ordered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            else{
                 
//                debug($this->validationErrors); die();
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        }
        $product = $this->Products->get($id, [
            'contain' => [ 'Users','ProductCategories','ProductSubCategories']
        ]);
       
//        debug($product);
//        die();
        //$this->set('product', $product,'orders','logged_inuser');
        
         $this->set(compact('product','logged_inuser','orders','user'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $products = $this->Products->Products->find('list', ['limit' => 200]);
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'products', 'users'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $products = $this->Products->Products->find('list', ['limit' => 200]);
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'products', 'users'));
        $this->set('_serialize', ['product']);
    }
    public function categories()
    {
        
                $this->viewBuilder()->setLayout('home');
$user = $this->Products->Users->newEntity();
        $productCategories = $this->Products->ProductCategories->find()
                ->select(['id','title','image']);
//        ->combine('id','id');
//         $productCategories=$productCategories->toArray();
    
        
      
        
        
        if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
//       $productSubCategories = $this->Products->ProductSubCategories->find()
//                ->select(['title'])
//                ->where(['product_category_id in'=> $productCategories]);
//        $productSubCategories=$productSubCategories->toArray();
//        
        
        
        $productSubCategories = $this->Products->ProductSubCategories->find();
//                ->select(['title']);
        $productSubCategories=$productSubCategories->toArray();
//        debug($productSubCategories);
//        die();
        $this->set(compact('productCategories','productSubCategories','user'));
        $this->set('_serialize', ['productCategories']);
    }
    public function subcategories($id = null)
    {
            
                $this->viewBuilder()->setLayout('home');
                
                $id=$this->decode($id);
$user = $this->Products->Users->newEntity();
        $productSubCategories = $this->Products->ProductSubCategories->find()
                //->select(['id','title','image'])
                ->where(['product_category_id'=>$id]);
        
        $productSubCategories=$productSubCategories->toArray();
        
         if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        
        
//        debug($productSubCategories);
//        die();
        $this->set(compact('productSubCategories','user'));
        $this->set('_serialize', ['productCategories']);
    }
    public function electronics($id = null)
    {
              $this->viewBuilder()->setLayout('home');
               $user = $this->Products->Users->newEntity(); 
                $id=$this->decode($id);
                
                
                 $this->paginate = [
            'order'=>['Products.id'=>'DESC'],
            'limit' => 12
            
        ];
       // $products = $this->paginate($this->Products);
 if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
                
        $electronics = $this->Products->find()
                //->select(['id','title','image'])
                ->where(['product_category_id'=>1])
                ->limit(12);
        $electronics=$this->paginate($electronics);
//        $electronics=$electronics->toArray();
        
        
//        debug($productSubCategories);
//        die();
        $this->set(compact('electronics','user'));
        $this->set('_serialize', ['electronics']);
    }
    public function clothing($id = null)
    {
            
                $this->viewBuilder()->setLayout('home');
                $user = $this->Products->Users->newEntity();
                $id=$this->decode($id);
                  $this->paginate = [
            'order'=>['Products.id'=>'DESC'],
            'limit' => 12
            
        ];
 if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $clothings = $this->Products->find()
                //->select(['id','title','image'])
                ->where(['product_category_id'=>2]);
        
        $clothings=$this->paginate($clothings);
        
        
//        debug($productSubCategories);
//        die();
        $this->set(compact('clothings','user'));
        $this->set('_serialize', ['clothings']);
    }
    

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function productNameAutocomplete()
    {
       
            $query=$_GET['query'];
            
            $list=$this->Products->find('all')
                    ->select(['id','name'])
//                    ->where(function ($exp, $query1) use ($query) {
//         $conc = $query1->func()->concat([
//            'first_name' => 'identifier', ' ',
//            'last_name' => 'identifier'
//         ]);
//         return $exp->like($conc, "%$query%");
//       })
                    ->where(['name like '=>'%'.$query.'%' ])
                    ->limit(10);
                
               
          $jarr=[];
                    foreach($list as  $data)
                    {
                         $each=[];
                         $each['id']=$data->id;
//                         $each['value']=$data->first_name;
//                         $each['value2']=$data->email;
                        // $each['value']=$data->first_name . ' '. $data->last_name .' ('.$data->email.')';
                         $each['value']=$data->name;
                         $jarr[]=$each;
                    }
                    
          
            
            echo json_encode($jarr);
            
            die();
  
    }
    public function search(){
        $this->viewBuilder()->setLayout('home');
      
                $this->autoRender = false;
              $user = $this->Products->Users->newEntity();

              //$this->_redirectQueryToNamed(); 
                $conditions =array();
                        
                        $productname= isset($this->request->query['product_name']) ? $this->request->query['product_name'] : ''; 
                        $productID= isset($this->request->query['pid']) ? $this->request->query['pid'] : ''; 
                      if ($this->request->is('post')) {
            $user = $this->Products->Users->patchEntity($user, $this->request->data);
           
            if ($this->Products->Users->save($user)) {
               
                $this->Flash->customer(__('Congratulation ! You have been registered.'));

                return $this->redirect(['controller'=>'Products','action' => 'home','prefix'=>false]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
                        
                   
            
                if(!empty($productID)){
                 $products = $this->Products->find()  
                        ->where(['id'=>$productID]);
                }
                else{
                    
                     $products = $this->Products->find()  
                        ->where(['name LIKE' => '%'.$productname.'%']);
                }
                  
                 

            $products = $this->paginate($products);
            $products= $products->toArray();
          
   
               if(empty($products)){
                     
                     $this->Flash->noresult('No results found.');
                 } 
            $this->set(compact('products','user'));
            $this->set('_serialize', ['products']);
              $this->render('home');
            
         }
    
        
}

