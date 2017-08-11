<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

      <?= $this->Html->link(__('Back'), ['action' => 'home']) ?> 
      
</nav>
<div class="col-md-12" style="padding: 50px 300px;">    <table class="table table-striped table-hover datatable">
       <tr>
            <th scope="row"><h3><?= __('Product') ?></h3></th>
            <td><?= $product->has('product') ? $this->Html->link($product->name, ['controller' => 'Products', 'action' => 'view', $product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Category') ?></th>
            <td><?= h($product->product_category->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Sub Category') ?></th>
            <td><?= h($product->product_sub_category->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?php echo $this->Html->image('uploads/product_images/'.$product['image'], array('alt' => 'story image','height'=>'150px','width'=>'150px')); ?>
</td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td>Rs. <?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($product->quantity) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
</div>
