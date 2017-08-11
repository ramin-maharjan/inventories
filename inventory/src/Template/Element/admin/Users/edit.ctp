<?php
/*
  * @var \App\View\AppView $this
  
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
*/ ?>

<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($user,['class'=>'','id' => 'add_form']); ?>
<div class="course_contents">
    <div class="detail-content">
        <table class="table table-striped table-hover">
            <tbody>
                <tr><th>
                        <h3>Add User</h3>
                </th></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Username</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('username',['label' => false, 'placeholder'=>'Username','id'=>'username', 'class'=>'form-control','required'=>false ]);?>
                                <div id="category_title_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Email</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('email',['label' => false, 'placeholder'=>'Email','id'=>'email', 'class'=>'form-control','required'=>false ]);?>
                                <div id="category_title_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Password</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('password',['label' => false,'type'=>'password', 'placeholder'=>'Password','id'=>'password', 'class'=>'form-control','required'=>false ]);?>
                                <div id="category_title_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                
               
           </tbody>
        </table>
    </div>
</div>
 <?php $cancel_url= \Cake\Routing\Router::url(
            array('action' => 'index')
         )
        
        ?>
    <div id="button_position">
        <?php echo $this->Form->button( 'Cancel' ,['onclick' =>"location.href='$cancel_url'",'class' => 'btn btn-cancel uppercase magnificCancel', 'div' => false,'form'=>'']);?>
        
         <?php echo $this->Form ->submit( 'Save' , array('class' => 'btn btn-success uppercase', 'div' => false)); ?>
        
    </div>
    
<?php echo $this->Form->end() ?>
</div>
<style>
    #button_position{
            display: inline-block;
        
    }
    .submit{
            padding:0px 5px;
            float: right;
    }
   
    </style>