
<div class="users index large-9 medium-8 columns content">
    <div class='message_div' style='color:green'></div>
                                      <?= $this->Flash->render() ?>

  <h2 class="mainfont clearfix pull-left"><?= __('Products') ?></h2>   
        
        <div class="pull-right" style=" margin-top: 20px;">  <?php  echo $this->Html->link('Add New Product',['controller' => 'Products', 'action' => 'add'],['class' => 'btn btn-info']);?> </div>
    <table class="table table-striped table-hover datatable">
        <thead>
            <tr id="title_head">
                <th scope="col"><?= $this->Paginator->sort('sno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
        
            </tr>
        </thead>
        <tbody>
            <?php $sno='1'; ?>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $sno++; ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->description) ?></td>
                <td><?= h($product->price) ?></td>
                <td><?= h($product->quantity) ?></td>
              
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',  base64_encode($product->id)]) ?> &nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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