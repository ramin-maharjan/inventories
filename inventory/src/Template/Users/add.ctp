<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($user,['type'=>'file','class'=>'','id' => 'add_form']); ?>
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
                                <?php echo $this->Form->input('username',['label' => false, 'placeholder'=>'Username','id'=>'username', 'class'=>'form-control','required' ]);?>
                                <div id="username_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Email</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('email',['label' => false, 'placeholder'=>'Email','id'=>'email', 'class'=>'form-control','required' ]);?>
                                <div id="email_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Password</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('password',['label' => false,'type'=>'password', 'placeholder'=>'Password','id'=>'password', 'class'=>'form-control','required']);?>
                                <div id="password_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <
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
    #title_error,#username_error,#email_error,#password_error{
        padding-top:5px;
        color:red;
        font-size:14px;
    }
   
    </style>
   <script src="scripts/jquery.js"></script>
    <script>
    $(document).ready(function() {
        console.log('this');
        
        $('#add_form').submit(function(){
            
            var username=$('#username').val();
            var email=$('#email').val();
            var password=$('#password').val();
            
            if(username=="" || email = "" || password = ||){
                if($('#username').val()=="")
                {
                        $('#username_error').html("Username is required.");
                        $('#username_error').slideDown();
                        $('#username').focus();
                        
                } 
                if($('#email').val()=="")
                {
                        $('#email_error').html("Email is required.");
                        $('#email_error').slideDown();
                        $('#email').focus();
                        
                } 
                if($('#password').val()=="")
                {
                        $('#password_error').html("Password is required.");
                        $('#password_error').slideDown();
                        $('#password').focus();
                        
                } 
                
                return false;
            }
        
        });
        
        $('#username').blur(function(){
                if($('#username').val()=="")
                {
                        $('#username_error').html("Username is required.");
                        $('#username_error').slideDown();
                }
                else
                        {
                                        $('#username_error').html("");
                                        $('#username_error').slideUp();
                        }
 });
                $('#email').blur(function(){
                              if($('#email').val()=="")
                              {
                                      $('#email_error').html("Title is required.");
                                      $('#email_error').slideDown();
                              }
                              else
                                      {
                                                      $('#email_error').html("");
                                                      $('#email_error').slideUp();
                                      }
               });
                $('#password').blur(function(){
                              if($('#password').val()=="")
                              {
                                      $('#password_error').html("Title is required.");
                                      $('#password_error').slideDown();
                                     // $('#password').attr('class','form-control uniqueness_error');
                              }
                              else
                                      {
                                                      $('#password_error').html("");
                                                      $('#password_error').slideUp();
                                                     // $('#password').attr('class', 'form-control');
                                      }
               });
        
    });
</script>