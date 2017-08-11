    <div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Inventories</b></a>
  </div>
 
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
       <?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    
      <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" id="username" placeholder="UserName or Email" required autocomplete="off">
       
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" id="password" required autocomplete="off">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    <div class="form-group has-feedback">
         
    </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
 
<?= $this->Form->end() ?>
  
    <!-- /.social-auth-links -->

   
      <?php
                        echo $this->Html->link(
                                'I forgot my password', ['controller' => 'Users', 'action' => 'forgotPassword'], ['escape' => false]
                        );
                        ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


