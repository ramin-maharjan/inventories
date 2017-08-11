<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($product,['type'=>'file','class'=>'','id' => 'add_form']); ?>
<div class="course_contents">
    <div class="detail-content">
        <table class="table table-striped table-hover">
            <tbody>
                <tr><th>
                        <h3>Add Product</h3>
                </th></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Product Category</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('product_category_id',['options' => $productCategory,'label' => false, 'placeholder'=>'Choose a category','empty'=>'Select a Category','id'=>'product_category', 'class'=>'form-control','required'=>false ]);?>
                                <div id="product_category_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Product Sub Category</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('product_sub_category_id',['options' => $productSubCategory,'label' => false, 'placeholder'=>'Choose a Sub category','empty'=>'Select a Category','id'=>'product_sub_category', 'class'=>'form-control','required'=>false ]);?>
                                <div id="product_sub_category_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Product Name</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('name',['label' => false, 'placeholder'=>'Product Name','id'=>'product_name', 'class'=>'form-control','required'=>false ]);?>
                                <div id="product_name_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                     <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Description</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->textarea('description',['label' => false, 'placeholder'=>'Description', 'class'=>'form-control']);?>
                            </div>
                        </div>
                    </div>    
                        
                        
                </td></tr>
                                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Price</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('price',['label' => false, 'placeholder'=>'Price','id'=>'price', 'class'=>'form-control','required'=>false]);?>
                                <div id="price_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Quantity</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('quantity',['label' => false, 'placeholder'=>'Quantity','id'=>'quantity', 'class'=>'form-control','required'=>false ]);?>
                                <div id="quantity_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr class='hover_image'><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Image</label></div>
                            <div class="form-group col-md-9">
                        <?php echo $this->Form->input('image',['label' => false, 'placeholder'=>'Product Image', 'class'=>'form-control image','type'=>'file']);?>                                <div id="description_error"></div>
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
    #title_error,#product_name_error,#description_error,#price_error,#product_category_error,#quantity_error,#product_sub_category_error{
        padding-top:5px;
        color:red;
        font-size:14px;
    }
    
    
    .form-control.image{
        
        border:0px;
        
    }
    tr.hover_image:hover{
        
        background-color: transparent !important;
    }
    
   
    </style>
  
    <script>
    $(document).ready(function() {
        $("#product_category").change(function(){
           
  	$('#product_sub_category').children().remove().end();
		var category=$("#product_category option:selected").val();
                
                
                 
                 $.ajax({
                            url: '<?php  echo\Cake\Routing\Router::url(array('controller' => 'ProductSubCategories', 'action' => 'getCategory', 'prefix' => 'admin', 'plugin' => false)); ?>/'+category,
                            dataType: 'JSON',
                             beforeSend: function(){
//                             $('.loader_img').show();
//				console.clear();
                            },
                            complete: function () {
//                               $('.loader_img').hide();
                           },
                            success: function(data){
                                 $.each(data, function(i,item){
                                  $("#product_sub_category").append('<option value='+i+'>'+item+'</option>');
                                     });
                                    
                                    
                            }
                    });
                    
                
    });
        
        
        $('#add_form').submit(function(){
            
            var productname=$('#product_name').val();
            var description=$('#description').val();
            var price=$('#price').val();
            var quantity=$('#quantity').val();
            var productcategory=$('#product_category');
            var product_sub_category=$('#product_sub_category');
            
            if(productname=="" || description == "" || price =="" || quantity == "" || productcategory == "" || product_sub_category == ""){
                if($('#product_name').val()=="")
                {
                        $('#product_name_error').html("Product name is required.");
                        $('#product_name_error').slideDown();
                        $('#product_name').focus();
                        
                } 
                if($('#description').val()=="")
                {
                        $('#description_error').html("Description is required.");
                        $('#description_error').slideDown();
                        $('#description').focus();
                        
                } 
                if($('#price').val()=="")
                {
                        $('#price_error').html("Price is required.");
                        $('#price_error').slideDown();
                        $('#price').focus();
                        
                } 
                 if($('#quantity').val()=="")
                {
                        $('#price_error').html("Quantity is required.");
                        $('#price_error').slideDown();
                        $('#quantity').focus();
                        
                } 
                 if($('#product_category').val()=="")
                {
                        $('#product_category_error').html("Please choose a category.");
                        $('#product_category_error').slideDown();
                        $('#product_category').focus();
                        
                } 
                 if($('#product_sub_category').val()=="")
                {
                        $('#product_sub_category_error').html("Please choose a sub category.");
                        $('#product_sub_category_error').slideDown();
                        $('#product_sub_category').focus();
                        
                } 
                
                return false;
            }
        
        });
        
        $('#product_name').blur(function(){
                if($('#product_name').val()=="")
                {
                        $('#product_name_error').html("Product name is required.");
                        $('#product_name_error').slideDown();
                }
                else
                        {
                                        $('#product_name_error').html("");
                                        $('#product_name_error').slideUp();
                        }
 });
                $('#description').blur(function(){
                              if($('#description').val()=="")
                              {
                                      $('#description_error').html("Description is required.");
                                      $('#description_error').slideDown();
                              }
                              else
                                      {
                                                      $('#description_error').html("");
                                                      $('#description_error').slideUp();
                                      }
               });
                $('#price').blur(function(){
                              if($('#price').val()=="")
                              {
                                      $('#price_error').html("Price is required.");
                                      $('#price_error').slideDown();
                                     // $('#password').attr('class','form-control uniqueness_error');
                              }
                              else
                                      {
                                                      $('#price_error').html("");
                                                      $('#price_error').slideUp();
                                                     // $('#password').attr('class', 'form-control');
                                      }
               });
               $('#quantity').blur(function(){
                              if($('#quantity').val()=="")
                              {
                                      $('#quantity_error').html("Quantity is required.");
                                      $('#quantity_error').slideDown();
                              }
                              else
                                      {
                                                      $('#quantity_error').html("");
                                                      $('#quantity_error').slideUp();
                                      }
               });
                $('#product_category').blur(function(){
                              if($('#product_category').val()=="")
                              {
                                      $('#product_category_error').html("Please choose a category.");
                                      $('#product_category_error').slideDown();
                              }
                              else
                                      {
                                                      $('#product_category_error').html("");
                                                      $('#product_category_error').slideUp();
                                      }
               });
                $('#product_sub_category').blur(function(){
                              if($('#product_sub_category').val()=="")
                              {
                                      $('#product_sub_category_error').html("Please choose a sub category.");
                                      $('#product_sub_category_error').slideDown();
                              }
                              else
                                      {
                                                      $('#product_sub_category_error').html("");
                                                      $('#product_sub_category_error').slideUp();
                                      }
               });
        
    });
</script>