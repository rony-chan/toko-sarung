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
				<img class="logo" src="<?php echo base_url('resource/img/logo.jpg'); ?>"/>
			</div>
			<div class="col-md-7 mg-l-30">
				<div class="pull-right">
					<input type="text" class="cari">
					<button class="btn btn-primary btn-xs">Search</button>
				</div>
			</div>
		</div>
		<div class="row">
			<ul class="nav nav-tabs">
				<li ><a href="#"><span class="glyphicon glyphicon-home"></span>
					Beranda</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-shopping-cart"></span> Produk <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Wadimor</a></li>
							<li><a href="#">Gajah Duduk</a></li>
							<li><a href="#">Pulau Mas</a></li>
						</ul>
					</li>
					<li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> Tentang Kami</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-exclamation-sign"></span>	Info Penting <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Baca Saya</a></li>
							<li><a href="#">Garansi</a></li>
							<li><a href="#">Cara Belanja</a></li>
						</ul>
					</li>
					<li><a href="#"><span class="glyphicon glyphicon-phone-alt"></span> Hubungi Kami</a></li>
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
					slideshow transition twins
				</div>
			</div>
			<div>
				<a u=image href="#"><img src="<?php echo base_url('resource/img/slider/02.jpg'); ?>" /></a>
				<div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
					random caption transition
				</div>
			</div>
			<div>
				<a u=image href="#"><img src="<?php echo base_url('resource/img/slider/03.jpg'); ?>" /></a>
				<div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
					mobile ready, touch swipe
				</div>
			</div>
			<div>
				<a u=image href="#"><img src="<?php echo base_url('resource/img/slider/04.jpg'); ?>" /></a>
				<div u=caption t="*" class="captionOrange"  style="position:absolute; left:20px; top: 30px; width:300px; height:30px;"> 
					responsive, scale smoothly
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

<div class="row">
	<!-- list barang -->
	<div class="col-md-9">
		<div class="item row">
			<div class="col-md-2"><p><small>23/01/2014</small></p><img class="item-img" src="<?php echo base_url('resource/img/sarung/IMG-20140630-01243.jpg') ?>"></div>
			<div class="col-md-7">
				<h4><a href="#">Wadimor Batik</a></h4>
				<p>Bahan: Katun Woll. Warna: Biru. Motif: Batik Hujan dengan kombinasi awan yang terpadu dengan suasana sunset</p>
			</div>
			<div class="harga-stok col-md-3">
				<p><strong>Stok 11 Kodi</strong></p>
				<p><strong>Rp 10.000.000</p>
			</div>
		</div>
		<div class="item row">
			<div class="col-md-2"><p><small>23/01/2014</small></p><img class="item-img" src="<?php echo base_url('resource/img/sarung/IMG-20140630-01245.jpg') ?>"></div>
			<div class="col-md-7">
				<h4><a href="#">nama barang</a></h4>
				<p>Deskripsi Barang</p>
			</div>
			<div class="harga-stok col-md-3">
				<p><strong>Stok 11 Kodi</strong></p>
				<p><strong>Rp 10.000.000</p>
			</div>
		</div>
		<div class="item row">
			<div class="col-md-2"><p><small>23/01/2014</small></p><img class="item-img" src="<?php echo base_url('resource/img/sarung/IMG-20140626-01231.jpg') ?>"></div>
			<div class="col-md-7">
				<h4><a href="#">nama barang</a></h4>
				<p>Deskripsi Barang</p>
			</div>
			<div class="harga-stok col-md-3">
				<p><strong>Stok 11 Kodi</strong></p>
				<p><strong>Rp 10.000.000</p>
			</div>
		</div>
		<div class="item row">
			<div class="col-md-2"><p><small>23/01/2014</small></p><img class="item-img" src="<?php echo base_url('resource/img/sarung/IMG-20140630-01246.jpg') ?>"></div>
			<div class="col-md-7">
				<h4><a href="#">nama barang</a></h4>
				<p>Deskripsi Barang</p>
			</div>
			<div class="harga-stok col-md-3">
				<p><strong>Stok 11 Kodi</strong></p>
				<p><strong>Rp 10.000.000</p>
			</div>
		</div>
	</div>
	<!-- end of list barang -->

	<!-- sidebar -->
	<div class="col-md-3">lkllo</div>
	<!-- end of sidebar -->
</div>

<!-- Footer -->
<center><br/>
	<div class="page-footer">
		<h5>Didukung oleh :</h5><br/>
		<div class="row" >
			<div class="col-xs-6 col-md-3">
				<a href="#" class="thumbnail">
					<img data-src="holder.js/100%x120" alt="...">
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#" class="thumbnail">
					<img data-src="holder.js/100%x120" alt="...">
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#" class="thumbnail">
					<img data-src="holder.js/100%x120" alt="...">
				</a>
			</div>
			<div class="col-xs-6 col-md-3">
				<a href="#" class="thumbnail">
					<img data-src="holder.js/100%x120" alt="...">
				</a>
			</div>
		</div>
		fhghhf
	</div>
</center>

</div>
</div>
</div>

<!-- Modal Login -->
<div class="modal fade" id="id_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Login Anggota</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" style="float: left; margin-right: 5px;">Login</button>
							<span><p style="margin-top: 5px;">Lupa Password? <a href="#">Klik di sini</a></p></span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="id_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Daftar Member</h4>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" placeholder="Nama Lengkap"><br/>
				<input type="text" class="form-control" placeholder="Email"><br/>
				<input type="text" class="form-control" placeholder="Nomor Telepon / Handphone"><br/>
				<input type="text" class="form-control" placeholder="Password">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Daftar</button>
			</div>
		</div>
	</div>
</div>