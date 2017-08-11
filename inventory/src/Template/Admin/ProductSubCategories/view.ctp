<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Sub Category'), ['action' => 'edit', $productSubCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Sub Category'), ['action' => 'delete', $productSubCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productSubCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Sub Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Sub Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productSubCategories view large-9 medium-8 columns content">
    <h3><?= h($productSubCategory->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($productSubCategory->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descriptions') ?></th>
            <td><?= h($productSubCategory->descriptions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productSubCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productSubCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($productSubCategory->modified) ?></td>
        </tr>
    </table>
</div>
