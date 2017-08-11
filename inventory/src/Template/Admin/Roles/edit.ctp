<div class="col-md-12" style="padding: 100px 300px;">
<?= $this->Form->create($role,['type'=>'file','class'=>'','id' => 'add_form']); ?>
<div class="course_contents">
    <div class="detail-content">
        <table class="table table-striped table-hover">
            <tbody>
                <tr><th>
                        <h3>Edit Role</h3>
                </th></tr>
                <tr><td>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"><label>Title</label></div>
                            <div class="form-group col-md-9">
                                <?php echo $this->Form->input('title',['label' => false, 'placeholder'=>'Title','id'=>'title', 'class'=>'form-control','required'=>false ]);?>
                                <div id="title_error"></div>
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
    #title_error{
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
            
            var title=$('#title').val();
          
            if(title==""){
                if($('#title').val()=="")
                {
                        $('#title_error').html("Title is required.");
                        $('#title_error').slideDown();
                        $('#title').focus();
                        
                } 
                  
                
                
                return false;
            }
        
        });
        
        $('#title').blur(function(){
                if($('#title').val()=="")
                {
                        $('#title_error').html("Title is required.");
                        $('#title_error').slideDown();
                }
                else
                        {
                                        $('#title_error').html("");
                                        $('#title_error').slideUp();
                        }
 });
        
    });
</script>