<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users index large-9 medium-8 columns content">
    <div class='message_div' style='color:green'></div>
    <?= $this->Flash->render() ?>
  <h2 class="mainfont clearfix pull-left"><?= __('Product Sub Categories') ?></h2>   
        
        <div class="pull-right" style=" margin-top: 20px;">  <?php  echo $this->Html->link('Add New Sub Category',['controller' => 'ProductSubCategories', 'action' => 'add'],['class' => 'btn btn-info']);?> </div>
    <table class="table table-striped table-hover datatable">
        <thead>
            <tr id="title_head">
                <th scope="col"><?= $this->Paginator->sort('sno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
        
            </tr>
        </thead>
        <tbody>
            <?php $sno='1'; ?>
            <?php foreach ($productSubCategories as $productSubCategory): ?>
            <tr>
                <td><?= $sno++; ?></td>
                <td><?= h($productSubCategory->title) ?></td>
                <td><?= h($productSubCategory->description) ?></td>
                <td><?= h($productSubCategory->created) ?></td>
              
               
                <td class="actions">
                   
                    <?php echo $this->Html->link(__(' '), array( 'controller'=>'ProductSubCategories','action' => 'edit', base64_encode($productSubCategory['id'])), array('title'=>'Edit','class' => 'fa fa-file-text'));?>&nbsp;&nbsp;
                   <?= $this->Form->postLink(__(''), ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete this category?', $productSubCategory->title),'title'=>'Delete','class' => 'fa fa-remove']) ?>   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
</div>



<style>
    #title_head{
        
        font-size: 24px;
    }
    .btn.btn-info{
        
        font-size: 18px;
    }
    .btn-info {
    background-color: #3c8dbc;
    border-color: #9ec8d3;
}
    
</style>    