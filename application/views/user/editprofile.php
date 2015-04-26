</div>
<div class="modal-body">
  <form method="POST" action="" class="form-horizontal" role="form">
    <input type="hidden" name="id" value="<?php echo $view['id_pelanggan']?>">
    <div class="form-group">
      <label for="inputnama" class="col-sm-3 control-label">Nama Lengkap</label>
      <div class="col-sm-9">
      <input name="inputnama" type="text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $view['nama_lengkap'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputalamat" class="col-sm-3 control-label">Alamat Lengkap</label>
      <div class="col-sm-9">
        <textarea style="height:150px" name="inputalamat" type="text" class="form-control" placeholder="Alamat Lengkap"><?php echo $view['alamat'];?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputtelepon" class="col-sm-3 control-label">Nomor Telepon / Handphone</label>
      <div class="col-sm-9">
        <input name="inputtelp" type="text" class="form-control" placeholder="Nomor Telepon / Handphone" value="<?php echo $view['notelp'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputemail" class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
        <input name="inputemail" type="email" class="form-control" placeholder="Email" value="<?php echo $view['email'];?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-3 control-label">Password<br/><small>kosongkan jika tidak ingin ubah password</small></label>
      <div class="col-sm-9">
        <input name="inputpassword" type="password" class="form-control" id="inputPassword3" placeholder="Password">
        <input name="oldpassword" type="hidden" class="form-control" id="inputPassword3" placeholder="Password" value="<?php echo $view['password']?>">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Edit Profile</button>
  </div>
</div>
