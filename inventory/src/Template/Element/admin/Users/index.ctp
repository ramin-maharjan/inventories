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
  <h2 class="mainfont clearfix pull-left"><?= __('Users') ?></h2>   
        
        <div class="pull-right" style=" margin-top: 20px;">  <?php  echo $this->Html->link('Add New User',['controller' => 'Users', 'action' => 'add'],['class' => 'btn btn-info']);?> </div>
    <table class="table table-striped table-hover datatable">
        <thead>
            <tr id="title_head">
                <th><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->created) ?></td>
              
                <td>
                <?php
                $check='';
                if ($user->status == '1'){
                $check='checked';
                   }
                      ?><input type="checkbox" name="status" rel='<?php echo $user->id; ?>' class="change" <?php echo $check; ?> />
                </td>

                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',  base64_encode($user->id)]) ?> &nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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