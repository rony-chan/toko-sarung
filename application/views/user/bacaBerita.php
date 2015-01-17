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