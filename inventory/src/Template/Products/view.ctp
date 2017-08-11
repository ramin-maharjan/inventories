              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <div class="backbtn">
      <?= $this->Html->link(__('Back'), ['action' => 'home']) ?> 
    </div> 
</nav>
<div class="col-md-12">  
    <div class="col-md-6">
         <div class='vertical_border'>
       <div class="img">
            <?php echo $this->Html->image('uploads/product_images/'.$product['image'], array('alt' => 'story image','height'=>'474px','width'=>'474px')); ?>
       </div>
         </div></div>
   <div class="col-md-6">
     
        <h2><b>  <?= h($product->name) ?> </b></h2>
        <h3> <b>Rs. <?= $this->Number->format($product->price) ?></b></h3>
          <hr>
          <h4><b><?= __('Description') ?></b></h4>
        <?php echo html_entity_decode($this->Text->autoParagraph(h($product->description))); ?>
          
          <?php // echo html_entity_decode($product->description); ?>
          
          
          <div class='quantity'>
              <label>Stock Available:</label> <?= h($product->quantity) ?><br />
              <label> Quantity: </label>
              <form class='form_arrange'>
                    <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                    <input type="number" name="get_quantity" id="number" value="1" readonly="readonly"  />
                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                  </form>

          </div>
          
        
           <button class="btn btn-4 btn-4a icon-arrow-right" data-toggle="modal" data-target="#myModal">Order</button>
           
           <div class="modal fade" id="myModal" role="dialog">

           
           <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content" style='margin-top:220px;'>
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h2 class="modal-title">Order Product</h2>
                                                      </div>
                                                      <div class="modal-body">
                                                       
                                                         <!------add -->
                            <?= $this->Form->create($orders,['type'=>'file','class'=>'','id' => 'add_form','autocomplete'=>'false']); ?>
                            <div class="course_contents">
                                <div class="detail-content">
                               <div class='content'>
                                    Are you sure you want to order this item?
                               </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-md-9">
                                                            <?php echo $this->Form->input('quantity',['label' => false, 'type'=>'hidden','id'=>'quantity', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>

                                                            <?php echo $this->Form->input('product_id',['label' => false,'type'=>'hidden', 'value'=>$product['id'] , 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                                            <?php echo $this->Form->input('price',['label' => false,'type'=>'hidden', 'value'=>$product['price'],'id'=>'fullname', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                                            <?php echo $this->Form->input('customer_id',['label' => false,'type'=>'hidden', 'value'=>$logged_inuser['id'],'id'=>'fullname', 'class'=>'form-control','required'=>false,'autocomplete'=>'off' ]);?>
                                                        </div>
                                                    </div>
                                                </div>
                   
                                </div>
                                <?php $cancel_url= \Cake\Routing\Router::url(
                                        array('action' => 'index')
                                     )

                                    ?>
                                <div id="button_position" class='button_position_order'>
                                    <?php echo $this->Form->button( 'No' ,['onclick' =>"location.href=''",'class' => 'btn btn-cancel uppercase magnificCancel', 'div' => false,'form'=>'']);?>

                                    <div class="submit_btn">  <?php echo $this->Form ->submit( 'Yes' , array('class' => 'btn btn-success uppercase', 'div' => false)); ?></div>

                                </div>

                            <?php echo $this->Form->end() ?>
                                                          
                                                          <!--finish -->
                                                          
                                                      </div>
                                                     
                                                    </div>

                                                  </div>
                                                </div>
           </div>
           
           
           
           
           
           
           
           
           
           
       
    </div>
   </div>
</div>
   
<style>
        
    .button_position_order{
                padding-top: 5px;
                    padding-bottom: 5px;


    }   
    #button_position {
    display: block;
    text-align: center;
}
.submit{
    float:none;
    display: inline-block !important;
        
}
.submit_btn{
        display: inline-block !important;

}
    .content{
            font-size: 20px;
            text-align: center;
    }
    hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 2px solid #eee;
}
.verticalLine {
  border-left: thick solid #ff0000;
}
.btn-4 {
    border-radius: 10px;
    border: 3px solid #fff;
    color: #fff;
    overflow: hidden;
    background-color: #e9bb4a;
    /* background: red; */
    border: none;
    /* background: none; */
    cursor: pointer;
    display: inline-block;
    letter-spacing: 1px;
    outline: none;
    position: relative;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
        width: 95px;
            height: 42px;
    font-size: 17px;
        margin-top: 20px;

}
.btn-4:hover {
    background: #292c2f;
    color: #f0ad4e;
    border: 1px solid;

}


.value-button {
  display: inline-block;
  border: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
  text-align: center;
  vertical-align: middle;
  padding: 11px 0;
  background: #eee;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.value-button:hover {
  cursor: pointer;
}

form #decrease {
  margin-right: -4px;
  border-radius: 8px 0 0 8px;
}

form #increase {
  margin-left: -4px;
  border-radius: 0 8px 8px 0;
}

form #input-wrap {
  margin: 0px;
  padding: 0px;
}

input#number {
  text-align: center;
  border: none;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
  margin: 0px;
  width: 40px;
  height: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
label{
    margin-top: 10px;
    display: inline-block;
    max-width: 100%;
    font-size: 16px;
}
.form_arrange{
        display: inline-block;
}
.vertical_border{
          border-right: 2px solid #eeeeee;
    padding-right: 50px;
}
    </style>
    
    <script>
        function increaseValue() {
            var limitvalue= <?php echo $product->quantity ?> 
            console.log(limitvalue);
          
            var value = parseInt(document.getElementById('number').value, 10);
            if(value<limitvalue){
            value = isNaN(value) ? 0 : value;
            value++;
        }
        $('#number').val(value);
       $('#quantity').val(value);
          }

          function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
           if(value!==1){ value--;}
            $('#number').val(value);
       $('#quantity').val(value);

          }
        
        $(document).ready(function() {
                var contents = $("#number").val();
                $("#quantity").val(contents);
           
        });
        
        </script>