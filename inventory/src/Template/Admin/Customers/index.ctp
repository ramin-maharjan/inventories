<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
      <?php /*              <ul class="side-nav">
                        <li class="heading"><?= __('Actions') ?></li>
                        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
                    </ul>
       * 
       */ ?>
</nav>
<div class="users index large-9 medium-8 columns content">
    <div class='message_div' style='color:green'></div>
     <?= $this->Flash->render() ?>
  <h2 class="mainfont clearfix pull-left"><?= __('Customers') ?></h2>   
       
        <div class="pull-right" style=" margin-top: 20px;">  <?php  echo $this->Html->link('Add New Customer',['controller' => 'Customers', 'action' => 'add'],['class' => 'btn btn-info']);?> </div>
    <table class="table table-striped table-hover datatable">
        <thead>
            <tr id="title_head">
                <th scope="col"><?= $this->Paginator->sort('s.no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('added_by') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>

                <th scope="col"><?= $this->Paginator->sort('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $sno=1; ?>
            <?php foreach ($customers as $customer): ?>
            <tr>
                
                
                <td><?php  echo $sno++; ?></td>
                <td><?= h($customer->full_name) ?></td>
                <td><?= h($customer->address) ?></td>
                <td><?= h($customer->phone_number) ?></td>
                <td><?= h($customer->added_by) ?></td>
                <td><?= h($customer->created) ?></td>

              
                
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',  base64_encode($customer->id)]) ?> &nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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


<script type="text/javascript">

$(function(){
    $(".change").change (function(){
        var $status='';
        var $id=$(this).attr('rel');
    if($(this).is(":checked")) {
        $status='1';
    }
    else{
        $status='0';
    }

   
    jQuery.ajax({ 
        type: 'POST',
        data: {
                status: $status,
                id: $id
            },
        url: "<?php echo \Cake\Routing\Router::url(array('controller' => 'Users', 'action' => 'status')); ?>",
        success: function(result){
            //console.log($('.message_div'));
            $('.message_div').html(result);
            setTimeout(function(){ $('.message_div').html('')}, 3000);
      
        }});

    });
});

</script>
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