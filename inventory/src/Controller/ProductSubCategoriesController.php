<?php
namespace App\Controller;

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
         $this->viewBuilder()->setLayout('home');
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
         $this->viewBuilder()->setLayout('home');

        $id=$this->decode($id);
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => []
        ]);

        $this->set('productSubCategory', $productSubCategory);
        $this->set('_serialize', ['productSubCategory']);
    }

     public function listsubcategories($id = null)
    {
            
                $this->viewBuilder()->setLayout('home');
                $this->loadModel('Users');

                        $user = $this->Users->newEntity();

                $id=$this->decode($id);

        $productSubCategories = $this->ProductSubCategories->Products->find()
                //->select(['id','title','image'])
                ->where(['product_sub_category_id'=>$id]);
        
        $productSubCategories=$productSubCategories->toArray();
        
        
//        debug($productSubCategories);
//        die();
        $this->set(compact('productSubCategories','user'));
        $this->set('_serialize', ['productCategories']);
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
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $this->set(compact('productSubCategory'));
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
        $productSubCategory = $this->ProductSubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productSubCategory = $this->ProductSubCategories->patchEntity($productSubCategory, $this->request->getData());
            if ($this->ProductSubCategories->save($productSubCategory)) {
                $this->Flash->success(__('The product sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product sub category could not be saved. Please, try again.'));
        }
        $this->set(compact('productSubCategory'));
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
}
