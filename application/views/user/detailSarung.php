      <div class="row">
      	<!-- list barang -->
      	<div class="col-md-9">
      		<!-- start detail barang -->
      		<br/>
      		<div class="col-md-12">
      			<?php
				//get thumbnails
      			$thumb = $this->m_sarung->fotoSarung($view['id_sarung']);
      			if(!empty($thumb)){
      				$thumb = base_url('resource/img/sarung/'.$thumb['gambar']);
      			}else{
      				$thumb = base_url('resource/img/sarung/efaultthumb.png');
      			}
      			?>
      			<div class="col-md-4">
      				<img class="thumbdetail_primary" src="<?php echo $thumb?>" class="item_gambar">
      				<!-- semua gambar sarung -->
      				<?php foreach($gambar as $g):?>
      					<a href="#"><img class="thumbdetail" src="<?php echo base_url('resource/img/sarung/'.$g['gambar'])?>"/></a>
      				<?php endforeach;?>
      			</div>
      			<div class="col-md-8"><h3><a href="#"><?php echo $view['nama']?></a></h3><h4>Rp <?php echo number_format($view['harga'])?>/kodi</h4>
      				<h4>Stok <?php echo $view['jumlah']?> Kodi</h4>
      				<form method="POST" action="<?php echo site_url('order/addToCart') ?>" class="form-inline" role="form">
      					<div class="form-group">
      						<label class="sr-only" for="exampleInputEmail2">Jumlah Kodi</label>
      						<input name="jumlah" style="width:200px" type="number" min="1" max="<?php echo $view['jumlah']?>" class="form-control" id="exampleInputEmail2" placeholder="Jumlah Kodi" required>
      					             <input type="hidden" name="idbarang" value="<?php echo $view['id_sarung'] ?>">
                     </div>
                                    <?php if(!empty($this->session->userdata('userlogin'))){?>
                                    <button type="submit" class="btn btn-info">Booking</button>
                                    <?php } else {?>
                                    <a class="btn btn-primary" data-toggle="modal" href="#id_login">Booking</a>
                                    <?php } ?>
      				</form>
      				<hr/>
      				<p><?php echo nl2br($view['deskripsi'])?></p>
      			</div>
      		</div>
      		<div class="col-md-12">
      			<hr/>
      			<strong>Sarung terbaru</strong>
      			<?php foreach($sarung as $s):?>
      				<?php
			//get thumbnails
      				$thumb = $this->m_sarung-> fotoSarung($s['id_sarung']);
      				if(!empty($sarung)){
      					$thumb = base_url('resource/img/sarung/'.$thumb['gambar']);
      				}else{
      					$thumb = base_url('resource/img/sarung/defaultthumb.png');
      				}
      				?>
      				<div class="item row">
      					<div class="col-md-2"><p><small>23/01/2014</small></p><img class="item-img" src="<?php echo $thumb ?>"></div>
      					<div class="col-md-6">
      						<small><a style="color:#A1A1A1" href="<?php echo site_url('p/merek/'.$s['id_merk'])?>"><?php echo $s['merek']?></a></small>
      						<h4><a href="<?php echo site_url('p/sarung/'.$s['id_sarung'])?>"><?php echo $s['nama']?></a></h4>
      						<p><?php echo substr($s['deskripsi'], 0,200);?>...</p>
      					</div>
      					<div class="harga-stok col-md-2">
      						<center>
      							<span style="font-size:25px" class="glyphicon glyphicon-shopping-cart"></span><br/>
      							<strong><?php echo $s['jumlah']?> Kodi</strong>
      						</center>
      					</div>
      					<div class="harga-stok col-md-2">
      						<center>
      							<span style="font-size:21px">Rp</span><br/>
      							<strong><?php echo number_format($s['harga'])?></strong>
      						</center>
      					</div>
      				</div>
      			<?php endforeach;?>
      		</div>

      		<!-- end detail barang -->
      	</div>
      	<!-- end of list barang -->

      	<!-- sidebar -->
      	<div class="col-md-3"> <?php $this->load->view('user/sidebar');?></div>
      	<!-- end of sidebar -->
      </div>

      <!-- Footer -->
      <center><br/>
            <div class="page-footer">
                  <h5>Didukung oleh :</h5><br/>
                  <div class="row" >
                        <div class="col-xs-6 col-md-3">
                              <a href="#" class="thumbnail">
                                    <img src="<?php echo base_url('resource/img/sponsor/BHS.png'); ?>" alt="Sarung Merk BHS">
                              </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                              <a href="#" class="thumbnail">
                                    <img src="<?php echo base_url('resource/img/sponsor/gajah duduk.png'); ?>" alt="Sarung Gajah Duduk">
                              </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                              <a href="#" class="thumbnail">
                                    <img src="<?php echo base_url('resource/img/sponsor/wadimor.jpg'); ?>" alt="Sarung Wadimor">
                              </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                              <a href="#" class="thumbnail">
                                    <img src="<?php echo base_url('resource/img/sponsor/cendana.png'); ?>" alt="Sarung Cendana">
                              </a>
                        </div>
                  </div>
                  <p>© 2015 Toko Sarung Hasaniyyin</p>
                  <p>
                        Toko Grosir Sarung Hasaniyyin Webstore </br>
                        Jl. Cempaka 5 No. 3, Kel. Poncol, Kab. Pekalongan </br>
                        Jawa Tengah Indonesia </br>
                        Telp Toko (0274)-998877 </br></br> 

                        HOTLINE 087733498000 (Senin s/d Sabtu :  08:30 WIB s/d 18:15 WIB) </br>
                        Informasi : info@hasaniyyin.net   |   Marketing : sales@hasaniyyin.net   |   SMS : 087733498000
                  </p>
            </div>
      </center>

  </div>
</div>
</div>
