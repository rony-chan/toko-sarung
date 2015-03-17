      <div class="row">
        <!-- list barang -->
        <div class="col-md-9">
          <br/>
          <ol class="breadcrumb">
            <li><a href="<?php echo site_url()?>">Home</a></li>
            <li><a href="<?php echo site_url('p/berita')?>">Berita</a></li>
            <li class="active">Baca</li>
          </ol>
          <div class="item row">
            <div class="col-md-2"><p><small><?php echo $view['updatedate']?></small></p><p>oleh <?php echo $view['username']?></p></div>
            <div class="col-md-10">
              <h1 style="font-size:20px"><a href="<?php echo site_url('p/berita/'.$view['id_berita']);?>"><?php echo $view['judul']?></a></h1>
              <p><?php
                $konten = nl2br($view['konten']);
                echo $konten;?></p>
              </div>
            </div>
            
          </div>
          <!-- end of list barang -->

          <!-- sidebar -->
          <div class="col-md-3">
            <?php $this->load->view('user/sidebar');?>
          </div>
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