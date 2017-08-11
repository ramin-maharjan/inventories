<?php
/**
 * Login Layout  
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

   

    <?= $this->fetch('meta') ?> 
    

   <?= $this->Html->css('../plugins/bootstrap/css/bootstrap.min.css') ?>
   <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') ?>
   <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') ?>
   <?= $this->Html->css('admin/AdminLTE.css') ?>
    <?= $this->Html->css('../plugins/iCheck/square/blue.css') ?>
 <?= $this->Html->script('jquery-3.1.1.min.js') ?>

    <?= $this->fetch('css') ?>
 
</head>
<body class="hold-transition login-page">

   
        <?= $this->fetch('content') ?>

    <footer>
    </footer>
       
        <?= $this->Html->script('../plugins/bootstrap/js/bootstrap.min.js') ?>
        <?= $this->Html->script('../plugins/iCheck/icheck.min.js') ?>
        <?= $this->Html->scriptBlock(" $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });"); ?>
    
</body>
</html>
