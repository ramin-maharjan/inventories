
<div class="users index large-9 medium-8 columns content">
    <div class='message_div' style='color:green'></div>
    <?= $this->Flash->render() ?>
  <h2 class="mainfont clearfix pull-left"><?= __('Product Categories') ?></h2>   
        
        <div class="pull-right" style=" margin-top: 20px;">  <?php  echo $this->Html->link('Add New Category',['controller' => 'ProductCategories', 'action' => 'add'],['class' => 'btn btn-info']);?> </div>
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
            <?php foreach ($productCategories as $productCategory): ?>
            <tr>
                <td><?= $sno++; ?></td>
                <td><?= h($productCategory->title) ?></td>
                <td><?= h($productCategory->description) ?></td>
                <td><?= h($productCategory->created) ?></td>
              
               
                <td class="actions">
                   
                    <?php echo $this->Html->link(__(' '), array( 'controller'=>'ProductCategories','action' => 'edit', base64_encode($productCategory['id'])), array('title'=>'Edit','class' => 'fa fa-file-text'));?>&nbsp;&nbsp;
                   <?= $this->Form->postLink(__(''), ['action' => 'delete', $productCategory->id], ['confirm' => __('Are you sure you want to delete this category?', $productCategory->title),'title'=>'Delete','class' => 'fa fa-remove']) ?>   
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