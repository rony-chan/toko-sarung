<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('resource/img/icons/favicon.png'); ?>">

  <title><?php echo $title ?> | Sarung Hasaniyyin</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('resource/css/bootstrap.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('resource/css/AdminLTE.min.css'); ?>" rel="stylesheet">
  <!-- Sarung -->
  <link href="<?php echo base_url('resource/css/admin.css'); ?>" rel="stylesheet">
  <!-- Style -->
  <link href="<?php echo base_url('resource/css/style.css'); ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('resource/css/dashboard.css'); ?>" rel="stylesheet">
   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="<?php echo base_url('resource/js/jquery-1.9.1.min.js'); ?>"></script>
   <!-- main_jquery must placed bottom jquery core -->
   <script src="<?php //echo base_url('resource/js/main_jquery.js'); ?>"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="<?php echo base_url('resource/js/bootstrap.js'); ?>"></script>
   <script src="<?php echo base_url('resource/js/docs.min.js'); ?>"></script>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="<?php echo base_url('resource/js/ie10-viewport-bug-workaround.js'); ?>"></script>
   <!-- 3 js untuk slider -->
   <script src="<?php echo base_url('resource/js/jssor.js'); ?>"></script>
   <script src="<?php echo base_url('resource/js/jssor.slider.js'); ?>"></script>
  <?php if(!empty($script)):echo $script;endif;?>
   <script>$('.dropdown-toggle').dropdown()</script>
   <body>

    <header style="background-color:rgb(210, 210, 210)" class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url('manage/pesanan') ?>" class="logo"><b>Admin</b>SARUNG</a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Navbar Right Menu -->
        <?php if(!empty($this->session->userdata('adminlogin'))):?>
         <ul class="nav navbar-nav navbar-right">
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php echo $this->session->userdata['adminlogin']['username'];?></strong><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
             <!-- <li class="divider"></li> -->
             <li><a href="<?php echo site_url('manage/logout');?>">logout</a></li>
           </ul>
         </li>
       </ul>
     <?php endif;?>
   </nav>
 </header>
 <br/>