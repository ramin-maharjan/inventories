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
                                <?php echo $this->Form->input('username',['label' => false, 'placeholder'=>'Username','id'=>'username', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                <div id="username_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>First Name</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('first_name',['label' => false, 'placeholder'=>'First Name','id'=>'firstname', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                <div id="firstname_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Last Name</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('last_name',['label' => false, 'placeholder'=>'Last Name','id'=>'lastname', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                <div id="lastname_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Email</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('email',['label' => false, 'placeholder'=>'Email','id'=>'email', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
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
                                <?php echo $this->Form->input('password',['label' => false,'type'=>'password', 'placeholder'=>'Password','id'=>'password', 'class'=>'form-control','required'=>false]);?>
                                <div id="password_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Address</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('address',['label' => false, 'placeholder'=>'Address','id'=>'address', 'class'=>'form-control','required'=>false ]);?>
                                <div id="address_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Phone No.</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('phone_number',['label' => false,'type'=>'number', 'placeholder'=>'Phone Number','id'=>'phonenumber', 'class'=>'form-control','required'=>false ]);?>
                                <div id="phonenumber_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Assign Role</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('role_id',['options' => $role,'label' => false, 'placeholder'=>'Choose a category','empty'=>'Select a Role','id'=>'role', 'class'=>'form-control','required'=>false ]);?>
                                <div id="role_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
            <?php echo $this->Form->input('status',['label' => false, 'value'=>'1','type'=>'hidden','required'=>false ]);?>

               
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
    #title_error,#username_error,#email_error,#password_error,#role_error{
        padding-top:5px;
        color:red;
        font-size:14px;
    }
   
    </style>
  
    <script>
    $(document).ready(function() {
        
        
        $('#add_form').submit(function(){
            
            var username=$('#username').val();
            var email=$('#email').val();
            var password=$('#password').val();
            var role=$('#role').val();
            
            if(username=="" || email == "" || password =="" || role==""){
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
                if($('#role').val()=="")
                {
                        $('#role_error').html("Please select a role.");
                        $('#role_error').slideDown();
                        $('#role').focus();
                        
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
                                      $('#email_error').html("Email is required.");
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
                                      $('#password_error').html("Password is required.");
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
               $('#role').blur(function(){
                              if($('#role').val()=="")
                              {
                                      $('#role_error').html("Please select a role.");
                                      $('#role_error').slideDown();
                                     // $('#password').attr('class','form-control uniqueness_error');
                              }
                              else
                                      {
                                                      $('#role_error').html("");
                                                      $('#role_error').slideUp();
                                                     // $('#password').attr('class', 'form-control');
                                      }
               });
        
    });
</script>