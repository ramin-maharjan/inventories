<div class="login-box">
    <div class="login-logo">
        <p>Forget Password</p>
    </div>

    <div class="login-box-body">

        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>

        <div class="form-group has-feedback">
            
            <?= $this->Form->text('username', ['class' => 'form-control', 'placeholder' => 'UserName or Email', 'id' => 'username', 'required' => true]);
            ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>


        <div class="row">

            <!-- /.col -->
            <div class="col-xs-12 text-center">
                <?= $this->Form->button('Continue', ['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat']); ?>

            </div>
            <!-- /.col -->
        </div>

        <?= $this->Form->end() ?>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box --
