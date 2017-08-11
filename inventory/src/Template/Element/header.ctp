    <?php
//debug($this->Auth->user());
//die();

$product_name=isset($_GET['product_name'])?$_GET['product_name']:'';
$pid=isset($_GET['pid'])?$_GET['pid']:'';
?>
 <?= $this->Html->css('home/css/bootstrap.min.css') ?>
     <?= $this->Html->css('home/css/bootstrap-theme.min.css') ?>
     <?= $this->Html->css('home/css/main.css') ?>
<?= $this->Html->script('home/vendor/modernizr-2.8.3-respond-1.4.2.min.js') ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>




<div>
    
    <div class="clearfix"></div>
  
   
    <header class="top-header">
        <!-- nav-menu section open -->
        <section class='top-nav'>
            <div class='container'>
                <div class='row'>
                    <div class="navigation clearfix">
                        <div class="col-md-3 project-img">
                            <figure class="logo">
                                <img src="/inventory/home/logo2.png" class="logo_img" />
                            </figure>
                        </div>
                        <div class="col-md-6 project-search">
                            <form id="searchbox" action="/inventory/products/search">
                                <?php //echo $this->Form->input('Products.name',['id'=>"search",'label' => false, 'placeholder'=>'Enter a keyword to search products', 'class'=>'form-control','required'=>'required','title' => isset($title) ? $title : 'Title', 'value' => isset($title) ? $title : '']);?>
                                 <?php //echo $this->Form->input('title',['type'=>'hidden','id'=>"hiddenTitle"]);?>
                                <input type="text" name="product_name" id="search" placeholder="Enter a keyword to search products" class="form-control ui-autocomplete-input" required="required" title="Title" value="<?php echo $product_name; ?>" autocomplete="off">
                                <input type="hidden" name="pid" value='<?php echo $pid; ?>' id='hidden_pid' />
                                <input id="submit" type="submit" value="Search">
                            </form>
                        </div>
                         <div class="col-md-3 project-login">
                             <?php
                             $logged_in = $this->request->session()->read('Auth.User');
//                             debug($logged_in);
//                             die();
                             //$logged_in=false;
                             if($logged_in=='') {?>
                             <ul class="nav navbar-nav navbar-sub" style=" padding-left:     50px;cursor: pointer;">
                                 <li>
                                     <li class="btn_log" data-toggle="modal" data-target="#myModal" style=" color: white;  padding: 11.5px;">Register </li>
                                     <li class="btn_log" style=" margin-left: 5px;"> <?php   echo $this->Html->link(
                                    'Login',
                                    ['controller' => 'Users', 'action' => 'login','prefix'=>'admin']
                        
                            );
                                            ?>  
                            </li>
                        </ul>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h2 class="modal-title">Register</h2>
                                                      </div>
                                                      <div class="modal-body">
                                                      
                                                          <!------add -->
                            <?= $this->Form->create($user,['type'=>'file','class'=>'','id' => 'add_form','autocomplete'=>'false']); ?>
                            <div class="course_contents">
                                <div class="detail-content">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                           
                                            <tr><td>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3"><label>First Name</label></div>
                                                        <div class="form-group col-md-9">
                                                            <?php echo $this->Form->input('first_name',['label' => false, 'placeholder'=>'First Name','id'=>'first_name', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                                            <div id="first_name_error"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                             </td></tr>
                                            <tr><td>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3"><label>Last Name</label></div>
                                                        <div class="form-group col-md-9">
                                                            <?php echo $this->Form->input('last_name',['label' => false, 'placeholder'=>'Last Name','id'=>'fullname', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                                        </div>
                                                    </div>
                                                </div>
                                             </td></tr>
                                            <tr><td>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3"><label>Username</label></div>
                                                        <div class="form-group col-md-9">
                                                            <?php echo $this->Form->input('username',['label' => false, 'placeholder'=>'Username','id'=>'username', 'class'=>'form-control','required'=>false,array('autocomplete'=>'off')]);?>
                                                            <div id="username_error"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                             </td></tr>

                                            <tr><td>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3"><label>Password</label></div>
                                                        <div class="form-group col-md-9">
                                                            <?php echo $this->Form->input('password',['label' => false,'type'=>'password', 'placeholder'=>'Password','id'=>'password', 'class'=>'form-control','required'=>false,array('autocomplete'=>'off')]);?>
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
                                                            <?php echo $this->Form->input('email',['label' => false, 'placeholder'=>'Email','id'=>'email', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
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
                                                            <?php echo $this->Form->input('phone_number',['label' => false,'type'=>'number', 'placeholder'=>'Phone Number','id'=>'phonenumber', 'class'=>'form-control','required'=>false ]);?>
                                                            <div id="phonenumber_error"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                             </td></tr>

                                                            <?php echo $this->Form->input('role_id',['label' => false,'type'=>'hidden','class'=>'form-control','required'=>false,'value'=>3 ]);?>


                                                            <?php echo $this->Form->input('status',['label' => false,'type'=>'hidden','class'=>'form-control','required'=>false,'value'=>1 ]);?>

                                       </tbody>
                                    </table>
                                </div>
                                <?php $cancel_url= \Cake\Routing\Router::url(
                                        array('action' => 'index')
                                     )

                                    ?>
                                <div id="button_position">
                                    <?php echo $this->Form->button( 'Cancel' ,['onclick' =>"location.href=''",'class' => 'btn btn-cancel uppercase magnificCancel', 'div' => false,'form'=>'']);?>

                                     <?php echo $this->Form ->submit( 'Save' , array('class' => 'btn btn-success uppercase', 'div' => false)); ?>

                                </div>

                            <?php echo $this->Form->end() ?>
                                                          
                                                          <!--finish -->
                                                          
                                                      </div>
                                                     
                                                    </div>

                                                  </div>
                                                </div>
                             
                             
                             
                           
                             
                             <?php } elseif($logged_in['role_id']==1){?>
                             
                             
                             
                               
                            <ul class="nav navbar-nav navbar-sub" style=" padding-left: 50px;">
                            <li class="btn_log"> <?php   echo $this->Html->link(
                                    'Admin',
                                    ['controller' => 'Users', 'action' => 'index','prefix'=>'admin']
                                     
                        
                                    );     ?>  </li>
                           <li class="btn_log" style=" margin-left: 5px;"> <?php   echo $this->Html->link(
                                    'Logout',
                                    ['controller' => 'Users', 'action' => 'customerLogout','prefix'=>'admin']
                        
                            );
                           ?></li></ul>
                             
                             
                             <?php } else { ?>
                                
                                 <ul class="nav navbar-nav navbar-sub" style=" padding-left: 100px;">
                            <li class="btn_log"> <?php   echo $this->Html->link(
                                    'Logout',
                                    ['controller' => 'Users', 'action' => 'customerLogout','prefix'=>'admin']
                                     
                        
                                    );     ?>  </li>
                             <?php } ?>
                         
                         </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- nav-menu section close -->
        <section class='nav-menu'>
            <div class='container'>
                <div class='row'>
                    <div class="navigation clearfix">
                        <div class="col-md-10 project-menu">
                            <div class=" col-md-10 pull-left nav-menu" >
                                <ul class="nav nav-pills ">
                                    <li role="presentation"><?php   echo $this->Html->link(
                        'Home',
                        ['controller' => 'Products', 'action' => 'home','prefix'=>false]
                        
);
                ?></li>
                                    <li role="presentation" ><?php   echo $this->Html->link(
                        'Products',
                        ['controller' => 'Products', 'action' => 'home','prefix'=>false]
                        
);
                ?></li>
                                    <li role="presentation" class="categories_subcategories" style="position: relative;"><?php   echo $this->Html->link(
                                                'Categories',
                                                ['controller' => 'Products', 'action' => 'categories','prefix'=>false]

                                        ); ?>
                                        
                                        
                                        
                                        
                                        <div class="categories"> <ul class="sub_categories">     
                                          <li role="presentation"><?php   echo $this->Html->link(
                                                'Electronics',
                                                ['controller' => 'Products', 'action' => 'electronics','prefix'=>false]

                                        ); ?></li>
                                            <li role="presentation" ><?php   echo $this->Html->link(
                                                'Clothing',
                                                ['controller' => 'Products', 'action' => 'clothing','prefix'=>false]

                                        );?></li>
                                    </li>
                                     
                                            </ul>
                              </div>
                                    <li role="presentation"><a href="#">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <br />
</div>
<style>
    .sub_categories{
        
        padding: 0px;
    margin-left: 30px;
    margin-right: 30px;
    }
    .categories{
         padding-top: 8px;
    font-size: 16px;    
      display:none;  
    background-color: #292c2f;
    position: absolute;
    z-index: 9;
}
.categories_subcategories{
     transition: 0.3s all;
}
.categories_subcategories:hover .categories{
    
    display:block;
}
 .categories a {
       
    color: white;
    text-decoration: none;
}
.categories_subcategories{
    
}
        
    
    .btn_log:hover{
            color: #f2c560 !important;

         border-radius: 18px;
    width: 85px;
    height: 45px;
    padding: 0px 0px;
    border: 1px solid #9e8338;
    background-color: transparent;
    }
    .btn_log{
		text-align: center;
		transition:all 0.3s;
                       border: 1px solid #9e8338;
                           border-radius: 5px;
                           width: 85px;
                               letter-spacing: 0.5px;

	}
       
        .li.ui-menu-item {
    padding: 5px;
}
.ui-autocomplete.ui-front.ui-menu.ui-widget.ui-widget-content.ui-corner-all{
        position: absolute;
    top: -70.2px;
    left: 497.1px;
    width: 1520px;
    z-index: 99999999999;
    background-color: white;
    width: 28.2%;
    list-style:none;
        overflow-y: scroll;
    height: 100px;
        border-top-left-radius: 1em;
    margin-left: 2px;
        cursor: pointer;

    
}
.ui-helper-hidden-accessible{
    display:none;
}
#button_position{
            display: inline-block;
        
    }
    .submit{
            padding:0px 5px;
            float: right;
    }
    #title_error,#first_name_error,#email_error,#password_error,#role_error,#phonenumber_error,#address_error,#username_error{
        padding-top:5px;
        color:red;
        font-size:14px;
    }
    ul li{
  
}


    
    </style>
    <script>
    
    $( "#search" ).autocomplete({
     //source: availableTags,
     source: function( request, response ) {
        $.ajax( {
            url: '<?php echo\Cake\Routing\Router::url(array('controller' => 'Products', 'action' => 'productNameAutocomplete')); ?>',
       
          dataType: "json",
            data: {
                query: $( "#search" ).val()
            },
            beforeSend: function () {
               // $('.loader_img').show();
            },
            complete: function () {
               // $('.loader_img').hide();
            },        
            success: function( datas ) {
              
                response(datas);
               $('#hidden_pid').val('');
            }
        });
      },
      select: function( event, ui ) {
      //  var $status =   $("#clientAutoComplete").val();
        $('#hidden_pid').val(ui.item.id);
      }
    });
    
     $(document).ready(function() {
        
       // $('input').attr('autocomplete', 'false');
        $('#add_form').submit(function(){
            
            var fullname=$('#first_name').val();
            var email=$('#email').val();
            var password=$('#password').val();
            var role=$('#role').val();
            var username=$('#username').val();
            
            if(username=="" || email == "" || password =="" || role=="" || fullname==""){
                if($('#first_name').val()=="")
                {
                        $('#first_name_error').html("First name is required.");
                        $('#first_name_error').slideDown();
                        $('#first_name').focus();
                        
                }
                if (($('#username').val().length) < 6)
                {
                        $('#username_error').html("Username must be at least 6 characters long.");
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
                if($('#username').val()=="")
                {
                        $('#username_error').html("Username is required.");
                        $('#username_error').slideDown();
                        $('#username').focus();
                        
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
                if (($('#username').val().length) < 6)
                {
                        $('#username_error').html("Username must be at least 6 characters long.");
                        $('#username_error').slideDown();
                        $('#username').focus();
                        
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
               
               $('#first_name').blur(function(){
                              if($('#first_name').val()=="")
                              {
                                      $('#first_name_error').html("First name is required.");
                                      $('#first_name_error').slideDown();
                                     // $('#password').attr('class','form-control uniqueness_error');
                              }
                              else
                                      {
                                                      $('#first_name_error').html("");
                                                      $('#first_name_error').slideUp();
                                                     // $('#password').attr('class', 'form-control');
                                      }
               });
              
        
    });
    
    
</script>
