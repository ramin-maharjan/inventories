<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($customer,['type'=>'file','class'=>'','id' => 'add_form']); ?>
<div class="course_contents">
    <div class="detail-content">
        <table class="table table-striped table-hover">
            <tbody>
                <tr><th>
                        <h3>Add Customer</h3>
                </th></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Full Name</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('full_name',['label' => false, 'placeholder'=>'Username','id'=>'fullname', 'class'=>'form-control','required'=>false ]);?>
                                <div id="fullname_error"></div>
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
                            <div class="col-md-3"><label>Email</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('email',['label' => false, 'placeholder'=>'Email','id'=>'email', 'class'=>'form-control','required'=>false ]);?>
                                <div id="email_error"></div>
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
                                <?php echo $this->Form->input('phone_number',['label' => false,'type'=>'tel', 'placeholder'=>'Phone Number','id'=>'phonenumber', 'class'=>'form-control','required'=>false ]);?>
                                <div id="phonenumber_error"></div>
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
    #title_error,#fullname_error,#email_error,#password_error,#role_error,#phonenumber_error,#address_error{
        padding-top:5px;
        color:red;
        font-size:14px;
    }
   
    </style>
  
    <script>
    $(document).ready(function() {
        
        
        $('#add_form').submit(function(){
            
            var username=$('#fullname').val();
            var email=$('#email').val();
            var password=$('#password').val();
            var role=$('#role').val();
            
            if(username=="" || email == "" || password =="" || role==""){
                if($('#fullname').val()=="")
                {
                        $('#fullname_error').html("Full name is required.");
                        $('#fullname_error').slideDown();
                        $('#fullname').focus();
                        
                }
                if (($('#fullname').val().length) < 6)
                {
                        $('#fullname_error').html("Name must be at least 6 characters long.");
                        $('#fullname_error').slideDown();
                        $('#fullname').focus();
                        
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
        
        $('#fullname').blur(function(){
                if($('#fullname').val()=="")
                {
                        $('#fullname_error').html("Full name is required.");
                        $('#fullname_error').slideDown();
                }
                else
                        {
                                        $('#fullname_error').html("");
                                        $('#fullname_error').slideUp();
                        }
                if (($('#fullname').val().length) < 6)
                {
                        $('#fullname_error').html("Name must be at least 6 characters long.");
                        $('#fullname_error').slideDown();
                        $('#fullname').focus();
                        
                }
                 else
                        {
                                        $('#fullname_error').html("");
                                        $('#fullname_error').slideUp();
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
              
        
    });
</script>