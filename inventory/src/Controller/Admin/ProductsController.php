<?php
namespace App\Controller\admin;

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
       
        $this->paginate = [
            'order'=>['Products.id'=>'DESC'],
           'limit' => 12,
            'contain'=>['ProductCategories','ProductSubCategories']
            
        ];
        $products = $this->paginate($this->Products);
        
     

//        debug($products);
//        die();
        $this->set(compact('products'));
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
        $product = $this->Products->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('product', $product);
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
            $logged_in_user=$this->Auth->user();
            $product['user_id']=$logged_in_user['id'];
            
            //------------- FOR IMAGE -------------------
            
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                
                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/uploads/product_images/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry 
                    $imageFileName = $setNewFileName . '.' . $ext;
                    
                    }
                }
            
            $product['image']=$imageFileName;
            //------------- FOR IMAGE -------------------
            
            
            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productCategory=$this->Products->ProductCategories->find('list')
                ->select(['id','title']);
//        debug($productCategory);
//        die();
        $productSubCategory=$this->Products->ProductSubCategories->find('list')
                ->select(['id','title']);
        $this->set(compact('product','productCategory','productSubCategory'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
     function decode($id = NULL)
	{
		//$this->autoRender = false;
		return base64_decode($id);
		//die();
	}
    public function edit($id = null)
    {
        $id=$this->decode($id);
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            
            //------------- FOR IMAGE -------------------
            if (!empty($this->request->data['image']['name'])) {
                $file = $this->request->data['image']; //put the data into a var for easy use

                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                $setNewFileName = time() . "_" . rand(000000, 999999);

                //only process if the extension is valid
                if (in_array($ext, $arr_ext)) {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is 
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/uploads/product_images/' . $setNewFileName . '.' . $ext);

                    //prepare the filename for database entry 
                    $imageFileName = $setNewFileName . '.' . $ext;
                    $product['image']=$imageFileName;
                    }
                }
            //------------- FOR IMAGE -------------------
     
            
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productCategory=$this->Products->ProductCategories->find('list')
                ->select(['id','title']);
//        debug($productCategory);
//        die();
        $productSubCategory=$this->Products->ProductSubCategories->find('list')
                ->select(['id','title']);
        $this->set(compact('product', 'productSubCategory', 'productCategory'));
        $this->set('_serialize', ['product']);
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
}
