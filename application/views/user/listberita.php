      <div class="row">
        <!-- list barang -->
        <div class="col-md-9">
        <br/>
         <ol class="breadcrumb">
          <li><a href="<?php echo site_url()?>">Home</a></li>
          <li class="active">Berita</li>
        </ol>
        <?php foreach($view AS $v):?>
          <div class="item row">
            <div class="col-md-2"><p><small><?php echo $v['updatedate']?></small></p><p>oleh <?php echo $v['username']?></p></div>
            <div class="col-md-10">
              <h4><a href="<?php echo site_url('p/berita/'.$v['id_berita']);?>"><?php echo $v['judul']?></a></h4>
              <p><?php
                echo substr($v['konten'], 0,100)?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- end of list barang -->

        <!-- sidebar -->
        <div class="col-md-3"> <?php $this->load->view('user/sidebar');?></div>
        <!-- end of sidebar -->
      </div>
      <div class="large-12 columns">
        <center><?php echo $this->pagination->create_links();?></center>
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
