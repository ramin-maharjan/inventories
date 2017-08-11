<?php
namespace App\Controller\admin;

use App\Controller\AppController;

/**
 * ProductSubCategories Controller
 *
 * @property \App\Model\Table\ProductSubCategoriesTable $ProductSubCategories
 *
 * @method \App\Model\Entity\ProductSubCategory[] paginate($object = null, array $settings = [])
 */
class ProductSubCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $productSubCategories = $this->paginate($this->ProductSubCategories);

        $this->set(compact('productSubCategories'));
        $this->set('_serialize', ['productSubCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => ['ProductCategories']
        ]);

        $this->set('productSubCategory', $productSubCategory);
        $this->set('_serialize', ['productSubCategory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productSubCategory = $this->ProductSubCategories->newEntity();
        if ($this->request->is('post')) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            
            
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
            
            $productSubCategory['image']=$imageFileName;
            
            
            
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $productCategory=$this->ProductSubCategories->ProductCategories->find('list')
                ->select(['id','title']);
        
        $this->set(compact('productSubCategory','productCategory'));
        $this->set('_serialize', ['productSubCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $id=$this->decode($id);
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            
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
                    $productSubCategory['image']=$imageFileName;
                    }
                }
            
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $productCategory=$this->ProductSubCategories->ProductCategories->find('list')
                ->select(['id','title']);
        $this->set(compact('productSubCategory','productCategory'));
        $this->set('_serialize', ['productSubCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productSubCategory = $this->ProductSubCategories->get($id);
        if ($this->ProductSubCategories->delete($productSubCategory)) {
            $this->Flash->success(__('The product sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The product sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function getCategory($id=null) {
                 
                    $this->autoRender = false;
                    $this->loadModel('ProductSubCategories');
                      $category=$this->ProductSubCategories->find()->select()
                              ->where(['ProductSubCategories.product_category_id'=>$id])
                            ->contain([])
                            ->combine('id','title')->toArray();
                    $category = array(""=>"Please Select")+$category;

                    echo json_encode($category);
                    die();
	
        }
}
