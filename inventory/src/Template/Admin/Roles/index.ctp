<div class="users index large-9 medium-8 columns content">
    <div class='message_div' style='color:green'></div>
  <h2 class="mainfont clearfix pull-left"><?= __('Roles') ?></h2> 
<?= $this->Flash->render() ?>  
        
        <div class="pull-right" style=" margin-top: 20px;">  <?php  echo $this->Html->link('Add New Role',['controller' => 'Roles', 'action' => 'add'],['class' => 'btn btn-info']);?> </div>
    <table class="table table-striped table-hover datatable">
        <thead>
            <tr id="title_head">
                <th scope="col"><?= $this->Paginator->sort('sno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>

                <th scope="col"><?= $this->Paginator->sort('action') ?></th>
        
            </tr>
        </thead>
        <tbody>
            <?php $sno='1'; ?>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $sno++; ?></td>
                <td><?= h($role->title) ?></td>
                <td><?= h($role->description) ?></td>
          
              
               
                <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit',  base64_encode($role->id)]) ?> &nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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