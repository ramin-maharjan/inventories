<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($productSubCategory,['type'=>'file','class'=>'','id' => 'add_form']); ?>
<div class="course_contents">
    <div class="detail-content">
        <table class="table table-striped table-hover">
            <tbody>
                <tr><th>
                        <h3>Add New SubCategory</h3>
                </th></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Choose Category</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('product_category_id',['options' => $productCategory,'label' => false, 'placeholder'=>'Choose a category','empty'=>'Select a Category','id'=>'product_category', 'class'=>'form-control','required'=>false ]);?>

                                <div id="product_category_title_error"></div>
                            </div>
                        </div>
                    </div>
                 </td></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Sub Category Title</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('title',['label' => false, 'placeholder'=>' Sub Category Title','id'=>'sub_category_title', 'class'=>'form-control','required'=>false ]);?>
                                <div id="sub_category_title_error"></div>
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
                    </td>
                </tr>
                  <tr class='hover_image'><td>
                    <div class="col-md-12">
                        <div class="row">
                            
                            <div class="col-md-3"><label>Image</label></div>
                            <div class="form-group col-md-9">
                                
                                <?php //echo $this->Html->image('webroot/uploads/product_images' .$product['image'], array('alt' => 'story image')); ?>

                                   <?php echo $this->Html->image('uploads/product_images/'.$productSubCategory['image'], array('alt' => 'story image','height'=>'150px','width'=>'150px')); ?>

                        <?php echo $this->Form->input('image',['label' => false, 'placeholder'=>'Product Category Image', 'class'=>'form-control image','type'=>'file']);?>                                <div id="description_error"></div>
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
    #sub_category_title_error,#sub_category_title_error,#product_category_title_error{
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
        
        
        $('#add_form').submit(function(){
            
            var sub_category_title=$('#sub_category_title').val();
            var product_category_title=$('#product_category_title')
            if(sub_category_title=="" || product_category_title ==""){
                if($('#category_title').val()=="")
                {
                        $('#sub_category_title_error').html("Sub Category Title is required.");
                        $('#sub_category_title_error').slideDown();
                        $('#sub_category_title').focus();
                        
                }
                if($('#product_category_title').val()=="")
                {
                        $('#product_category_title_error').html("Please choosee a category.");
                        $('#product_category_title_error').slideDown();
                        $('#product_category_title').focus();
                        
                } 
                  
                
                
                return false;
            }
        
        });
        
        $('#sub_category_title').blur(function(){
                if($('#sub_category_title').val()=="")
                {
                        $('#sub_category_title_error').html("Sub Category Title is required.");
                        $('#sub_category_title_error').slideDown();
                }
                else
                        {
                                        $('#sub_category_title_error').html("");
                                        $('#sub_category_title_error').slideUp();
                        }
 });
 $('#product_category_title').blur(function(){
                if($('#product_category_title').val()=="")
                {
                        $('#product_category_title_error').html("Please choosee a category.");
                        $('#product_category_title_error').slideDown();
                }
                else
                        {
                                        $('#product_category_title_error').html("");
                                        $('#product_category_title_error').slideUp();
                        }
 });
        
    });
</script>