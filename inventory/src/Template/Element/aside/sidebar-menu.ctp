<div class="user-panel">
            <div class="pull-left image">

                <?= $this->Html->image('admin/avatar5.png', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
            </div>
            <div class="pull-left info">
                <p><?= $username; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>


<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            
            
            
            
            <i class="glyphicon glyphicon-user"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>    <?php
                        echo $this->Html->link(
                                '<i class="fa fa-circle-o"></i> All Users', ['controller' => 'Users', 'action' => 'index'], ['escape' => false]
                        );
                        ?>
</li>
            
            <li><?php echo $this->Html->link(
                        '<i class="fa fa-circle-o"></i> Customers', ['controller' => 'Users', 'action' => 'customer'], ['escape' => false]

                        
); ?></li>
        </ul>
    </li>
    
    
    <li class="treeview">
        <a href="#">
            
            
            
            
            <i class="glyphicon glyphicon-th"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>    <?php echo $this->Html->link(
                        '<i class="fa fa-circle-o"></i>View Product',
                        ['controller' => 'Products', 'action' => 'index'], ['escape' => false]
                        
); ?>
</li>
            <li><?php echo $this->Html->link(
                        '<i class="fa fa-circle-o"></i>Add New Product',
                        ['controller' => 'Products', 'action' => 'add'], ['escape' => false]
                        
); ?></li>
            
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            
            
            
            
            <i class="glyphicon glyphicon-th-list"></i> <span>Product Categories</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>    <?php echo $this->Html->link(
                        '<i class="fa fa-circle-o"></i>Categories',
                        ['controller' => 'ProductCategories', 'action' => 'index'], ['escape' => false]
                        
); ?>
</li>
            <li><?php echo $this->Html->link(
                        '<i class="fa fa-circle-o"></i>Sub Categories',
                        ['controller' => 'ProductSubCategories', 'action' => 'index'], ['escape' => false]
                        
); ?></li>
            
        </ul>
    </li>
    
    
    
    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="label label-primary pull-right">4</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/pages/layout/top-nav'); ?>"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/layout/boxed'); ?>"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/layout/fixed'); ?>"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="<?php echo $this->Url->build('/pages/layout/collapsed-sidebar'); ?>"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
    </li>
    <li>
        <a href="<?php echo $this->Url->build('/pages/widgets'); ?>">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <small class="label pull-right bg-green">Hot</small>
        </a>
    </li>
    
  
  

  
   
   
</ul>

<style>
    
    .main-sidebar,
.left-side {
  position: absolute;
  top: 0;
  left: 0;
  padding-top: 70px;
  min-height: 100%;
  width: 230px;
  z-index: 810;
  -webkit-transition: -webkit-transform 0.3s ease-in-out, width 0.3s ease-in-out;
  -moz-transition: -moz-transform 0.3s ease-in-out, width 0.3s ease-in-out;
  -o-transition: -o-transform 0.3s ease-in-out, width 0.3s ease-in-out;
  transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
}
    </style>