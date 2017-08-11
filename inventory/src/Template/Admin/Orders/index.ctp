<link  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

<div class="users index large-9 medium-8 columns content">
    <div class='message_div' style='color:green'></div>
                                      <?= $this->Flash->render() ?>

  <h2 class="mainfont clearfix pull-left"><?= __('Products') ?></h2>   
        
    <table class="table table-striped table-hover datatable">
        <thead>
            <tr id="title_head">
                <th scope="col"><?= $this->Paginator->sort('sno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordered by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Action') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $sno='1'; ?>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $sno++; ?></td>
                <td style="width:20%;"><?= h($order->user->username) ?></td>
                <td><?= h($order->product->name) ?></td>
                <td><?= h($order->product->price) ?></td>
                <td><?= h($order->product->quantity) ?></td>
                <td><?= h($order->created) ?></td>
               
                <td class="actions">
                   
                    <?php // $this->Html->link(__('View order details'), ['action' => 'view',  base64_encode($order->id)]), array('title'=>'Edit','class' => 'fa fa-file-text') ?> 
                    <?php // echo $this->Html->link(__(' '), array( 'controller'=>'Orders','action' => 'view', base64_encode($order['id'])), array('title'=>'View log','class' => 'fa fa-file-text'));?>
                    &nbsp;
                    <?php // $this->Form->postLink(__('Clear this log'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete this log?', $order->id)]) ?>
                   <?= $this->Form->postLink(__(''), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete this log?', $order->title),'title'=>'Delete','class' => 'fa fa-remove']) ?>   

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