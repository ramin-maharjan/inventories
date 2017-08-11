<?php
/**
 * Admin Layout  
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$this->layout = false;
?>
<!DOCTYPE html>
<html>
    <head>
<?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            CakePHP | Dashboard
        </title>
<?= $this->Html->meta('icon') ?>


<?= $this->fetch('meta') ?> 


<?= $this->Html->css('../plugins/bootstrap/css/bootstrap.min.css') ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') ?>
        <?= $this->Html->css('admin/AdminLTE.css') ?>
        <?= $this->Html->css('../plugins/iCheck/square/blue.css') ?>
        <?= $this->Html->css('../plugins/morris/morris.css') ?>
        <?= $this->Html->css('../plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>
        <?= $this->Html->css('../plugins/datepicker/datepicker3.css') ?>
        <?= $this->Html->css('../plugins/daterangepicker/daterangepicker.css') ?>
        <?= $this->Html->css('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>
        <?= $this->Html->css('admin/skins/_all-skins.min.css') ?>
        <?= $this->Html->css('admin/custom.css') ?>
        <?= $this->Html->css('admin/print.css') ?>
        <?= $this->fetch('css') ?>

         <!-- ./wrapper -->
        <?php //$this->Html->script('jquery-3.1.1.min.js'); ?>
        <?= $this->Html->script('../plugins/jQuery/jquery-2.2.3.min.js') ?>
        <?= $this->Html->script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'); ?>
        <?= $this->Html->scriptBlock("$.widget.bridge('uibutton', $.ui.button);", ['block' => true]); ?>

        <?= $this->Html->script('../plugins/bootstrap/js/bootstrap.min.js') ?>
        <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'); ?>

        
        <?= $this->Html->script('../plugins/sparkline/jquery.sparkline.min.js') ?>
        <?= $this->Html->script('../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>
        <?= $this->Html->script('../plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>
        <?= $this->Html->script('../plugins/knob/jquery.knob.js') ?>
        <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') ?>
        <?= $this->Html->script('../plugins/daterangepicker/daterangepicker.js') ?>
        <?= $this->Html->script('../plugins/datepicker/bootstrap-datepicker.js') ?>
        <?= $this->Html->script('../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>
        <?= $this->Html->script('../plugins/slimScroll/jquery.slimscroll.min.js') ?>
        <?= $this->Html->script('../plugins/fastclick/fastclick.js') ?>
        <?= $this->Html->script('admin/app.min.js') ?>
        <?= $this->Html->script('admin/pages/dashboard.js') ?>
<?= $this->Html->script('admin/demo.js') ?>
<?= $this->Html->script('../plugins/custom.js') ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">
<?php
$loguser = $this->request->session()->read('Auth.User');
$username = 'Alexander Pierce';
if ($loguser) {
    $username = $loguser['username'];
}
?>
            <?php
            echo $this->element('admin/nav-top', [
                "username" => $username
            ]);
            ?>
            <!-- Left side column. contains the logo and sidebar -->

            <?php
            echo $this->element('admin/aside-main-sidebar', [
                "username" => $username
            ]);
            ?>


            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Users</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Content Wrapper. Contains page content -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="box box-primary">
                                <div class="box-header with-border">
<?= $this->fetch('content') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- /.content -->
            </div>




            <!-- /.content-wrapper -->
<?php echo $this->element('admin/footer'); ?>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
       
<?= $this->fetch('script') ?>
    </body>
</html>
