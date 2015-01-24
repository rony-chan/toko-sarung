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
  <!-- Sarung -->
  <link href="<?php echo base_url('resource/css/sarung.css'); ?>" rel="stylesheet">
  <!-- Style -->
  <link href="<?php echo base_url('resource/css/style.css'); ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('resource/css/dashboard.css'); ?>" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?php echo base_url('resource/js/ie-emulation-modes-warning.js'); ?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->


          <!-- Caption Style -->
          <style> 
            .captionOrange, .captionBlack
            {
              color: #fff;
              font-size: 20px;
              line-height: 30px;
              text-align: center;
              border-radius: 4px;
            }
            .captionOrange
            {
              background: #EB5100;
              background-color: rgba(235, 81, 0, 0.6);
            }
            .captionBlack
            {
              font-size:16px;
              background: #000;
              background-color: rgba(0, 0, 0, 0.4);
            }
            a.captionOrange, A.captionOrange:active, A.captionOrange:visited
            {
              color: #ffffff;
              text-decoration: none;
            }
            a.captionOrange:hover
            {
              color: #eb5100;
              text-decoration: underline;
              background-color: #eeeeee;
              background-color: rgba(238, 238, 238, 0.7);
            }
            .bricon
            {
              background: url(../img/browser-icons.png);
            }
          </style>

        </head>
        <body>
         <div class="col-md-12">
          <div class="col-md-offset-1 col-md-10 wrapper-beranda">
            <div class="row">
              <ul class="list-inline navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#id_register">Register</a></li> /
                <li><a href="#" data-toggle="modal" data-target="#id_login">Login</a></li>
              </ul>
            </div>
            <div class="row mg-b-10">
              <div class="col-md-5 row">
                <img class="logo" src="<?php echo base_url('resource/img/logo/logo.png')?>"/>
              </div>
              <div class="col-md-7 mg-l-30">
                <div class="pull-right">
                <form method="GET" action="<?php echo site_url('p/cari')?>">
                    <input name="q" type="text" class="cari">
                    <button class="btn btn-primary btn-xs">Cari</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <ul class="nav nav-tabs">
                <li ><a href="<?php echo site_url()?>"><span class="glyphicon glyphicon-home"></span>
                  Beranda</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="glyphicon glyphicon-shopping-cart"></span> Produk <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('p/sarung')?>">Semua Merek</a></li>
                      <?php 
                      $merk = $this->m_sarung->semuaMerk();
                      foreach($merk as $m):
                        echo ' <li><a href="'.site_url('p/merek/'.$m['id_sarung_merk']).'">'.$m['merek'].'</a></li>';
                      endforeach;
                      ?>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url('p/berita')?>"><span class="glyphicon glyphicon-bullhorn"></span> Berita</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <span class="glyphicon glyphicon-exclamation-sign"></span>  Info Penting <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo site_url('p/berita/5')?>">Baca Saya</a></li>
                      <li><a href="<?php echo site_url('p/berita/6')?>">Garansi</a></li>
                      <li><a href="<?php echo site_url('p/berita/3')?>">Cara Belanja</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url('p/berita/7')?>"><span class="glyphicon glyphicon-phone-alt"></span> Hubungi Kami</a></li>
                </ul>

                <div>
                  <!-- Jssor Slider Begin -->
                  <!-- You can move inline styles to css file or css block. -->
                  <div id="slider1_container" style="position: relative; width: 1050px;
                  height: 300px; overflow: hidden;">

                  <!-- Loading Screen -->
                  <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                    background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
                  </div>
                  <div style="position: absolute; display: block; background: url(resource/img/slider/loading.gif) no-repeat center center;
                  top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
              </div>

              <!-- Slides Container -->
              <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1050px; height: 300px;
              overflow: hidden;">
              <div>
                <a u=image href="#"><img src="<?php echo base_url('resource/img/slider/01.jpg'); ?>" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                  Terbuat dari bahan berkualitas
                </div>
              </div>
              <div>
                <a u=image href="#"><img src="<?php echo base_url('resource/img/slider/02.jpg'); ?>" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                  Tidak mudah luntur
                </div>
              </div>
              <div>
                <a u=image href="#"><img src="<?php echo base_url('resource/img/slider/03.jpg'); ?>" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                  Nyaman dipakai 24 jam
                </div>
              </div>
              <div>
                <a u=image href="#"><img src="<?php echo base_url('resource/img/slider/04.jpg'); ?>" /></a>
                <div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
                  Multifungsi, bisa dipakai siapapun
                </div>
              </div>
            </div>

            <!-- Bullet Navigator Skin Begin -->
            <!-- jssor slider bullet navigator skin 01 -->
            <style>
            /*
            .jssorb01 div           (normal)
            .jssorb01 div:hover     (normal mouseover)
            .jssorb01 .av           (active)
            .jssorb01 .av:hover     (active mouseover)
            .jssorb01 .dn           (mousedown)
            */
            .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av
            {
              filter: alpha(opacity=70);
              opacity: .7;
              overflow:hidden;
              cursor: pointer;
              border: #000 1px solid;
            }
            .jssorb01 div { background-color: gray; }
            .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
            .jssorb01 .av { background-color: #fff; }
            .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }
          </style>
          <!-- bullet navigator container -->
          <div u="navigator" class="jssorb01" style="position: absolute; bottom: 16px; right: 450px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
          </div>
          <!-- Bullet Navigator Skin End -->

          <!-- Arrow Navigator Skin Begin -->
          <style>
            /* jssor slider arrow navigator skin 05 css */
            /*
            .jssora05l              (normal)
            .jssora05r              (normal)
            .jssora05l:hover        (normal mouseover)
            .jssora05r:hover        (normal mouseover)
            .jssora05ldn            (mousedown)
            .jssora05rdn            (mousedown)
            */
            .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
            {
              position: absolute;
              cursor: pointer;
              display: block;
              background: url(../img/a17.png) no-repeat;
              overflow:hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05ldn { background-position: -250px -40px; }
            .jssora05rdn { background-position: -310px -40px; }
          </style>
          <!-- Arrow Left -->
          <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 123px; left: 8px;">
          </span>
          <!-- Arrow Right -->
          <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 123px; right: 8px">
          </span>
          <!-- Arrow Navigator Skin End -->
          <a style="display: none" href="http://www.jssor.com">javascript</a>
        </div>
        <!-- Jssor Slider End -->
      </div>