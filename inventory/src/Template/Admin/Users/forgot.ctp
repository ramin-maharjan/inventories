<?php if ($success): ?>
  
<div class="login-box verify-account">
    <div class="login-logo">
        <p>Create New Password</p>
    </div>

    <div class="login-box-body">

        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>

           <?php $user_id=  base64_encode($user->id)?>     
    
        <?= $this->Form->create(null,['url'=>['action'=>'forgot','controller'=>'Users',$user_id,$user->activation_key],'class'=>'form-horizontal col-md-4 col-md-offset-4','id'=>'form-forgot']) ?> 
        <div class="form-group has-feedback">
            
    
    
                <div class="form-group">
                            <input class="form-control"  id="password" name="password" placeholder="New Password" type="password" required="">
                   
                </div>
               
               
            <span class="glyphicon glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            
    
    
                <div class="form-group">
                            <input class="form-control"  id="confirm_password" name="confirm_password" placeholder="Confirm New Password" type="password" required="">
                   
                </div>
               
               
            <span class="glyphicon glyphicon glyphicon-pencil form-control-feedback"></span>
        </div>


        <div class="row">

            <!-- /.col -->
            <div class="col-xs-12 text-center">
                <?= $this->Form->button('Set Password', ['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat']); ?>

            </div>
            <!-- /.col -->
        </div>

        <?= $this->Form->end() ?>


    </div>
    <!-- /.login-box-body -->
</div>











<?php endif ?>