<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($productCategory,['type'=>'file','class'=>'','id' => 'add_form']); ?>
<div class="course_contents">
    <div class="detail-content">
        <table class="table table-striped table-hover">
            <tbody>
                <tr><th>
                        <h3>Add New Category</h3>
                </th></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Category Title</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('title',['label' => false, 'placeholder'=>'Category Title','id'=>'category_title', 'class'=>'form-control','required'=>false ]);?>
                                <div id="category_title_error"></div>
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

                                   <?php echo $this->Html->image('uploads/product_images/'.$productCategory['image'], array('alt' => 'story image','height'=>'150px','width'=>'150px')); ?>

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
    #category_title_error{
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
            
            var category_title_error=$('#category_title').val();
          
            if(category_title_error==""){
                if($('#category_title').val()=="")
                {
                        $('#category_title_error').html("Category Title is required.");
                        $('#category_title_error').slideDown();
                        $('#category_title').focus();
                        
                } 
                  
                 
                
                return false;
            }
        
        });
        
        $('#category_title').blur(function(){
                if($('#category_title').val()=="")
                {
                        $('#category_title_error').html("Category Title is required.");
                        $('#category_title_error').slideDown();
                }
                else
                        {
                                        $('#category_title_error').html("");
                                        $('#category_title_error').slideUp();
                        }
 });
        
    });
</script>