<?php //debug($products); die(); ?>
<div class='container'>
    <div class='row'>
      <div class="col-md-12 product-detail">
        <ul>
             <?php foreach ($electronics as $electronic): ?>

         
            <li>
                <figure id="size-img" >
                        <?php echo $this->Html->image('uploads/product_images/'.$electronic['image'], array('width'=>'200px')); ?>
                    <div id="txt_background_color">  <div class="text-center"><div class="head_title"><b> <?= $this->Html->link(__( ($electronic->name) ), ['action' => 'view', base64_encode($electronic->id)]) ?></b></div></div>
                        <div></div>   <div class="text-center"><div class="sub_head_title">NRs <?= ($electronic->price) ?></div></div> </div>

                </figure>
            </li>


            <?php endforeach ; ?>

        </ul>

    </div>
  </div>
    <div class="paginator text-center">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>
   
</div>
<style>
    #txt_background_color{
        background-color:white;
    }
    .product-detail ul{
        padding: 0;
        margin:0 -15px;
        list-style: none;
    }
    .product-detail ul li{
       display: inline-block;
       max-width: 280px;
       width: 100%;
       padding: 0 15px 15px;
       margin-right: 17px;
       margin-top: 30px;
    }
    .product-detail ul li img{
       width: 500px;
       max-width: 100%;
       padding-bottom: 5px;
       height: 290px;
    }
    .product-detail{
        background: #f5f5f5;
        padding:30px 0;
    }

    .text-center{
        padding: 10px;
        
    }
    #txt_background_colorcat{
        background-color: white;
        margin-top: -6px;
            height: 70px;
    }
    body {
        
        background-color: #f5f5f5;
    }
    #size-img{
        
        box-shadow: 0 2px 1px rgba(188, 207, 219, 0.35);
            
    }
    #size-img:hover{
        
    box-shadow: rgba(0,0,0,0.12) 0px 4px 4px;

    }
    .head_title{
        font-size:16px;
        height: 35px;
    }
    .sub_head_title{
         color: #b49440;
    }
    a {
        color: #000000;
        text-decoration: none;
    }
    a:hover{
    
        color: #b49440;
        text-decoration: none;
        transition: all 0.3s;
}
    a:focus {
    color: #000000;
    text-decoration: none;
}
   a:active, a:hover {
    outline: 0;
    color: #b49440;
}

</style>