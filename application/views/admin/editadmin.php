<div class="row">
	<div class="col-md-12">
		<div class="left-sidebar col-md-2">
			<!-- sidebar -->
			<?php echo $this->load->view('admin/sidebar')?>
			<!-- end of sidebar -->
		</div>
		<div class="col-md-10">
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title">Manajemen Data Pesanan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<h3>Edit Data Admin</h3>
					<hr/>
					<form method="POST" action="">
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Nama Lengkap</label>
							<div class="col-lg-10">
								<input type="text" name="inputnama" class="form-control" id="inputPassword1" value="<?php echo $view['nama_lengkap'];?>">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Telp</label>
							<div class="col-lg-10">
								<input type="text" name="inputnotelp" class="form-control" id="inputPassword1" value="<?php echo $view['notelp'];?>">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Alamat</label>
							<div class="col-lg-10">
								<textarea style="min-height:80px" class="form-control" name="inputalamat" id="inputPassword1"><?php echo $view['alamat'];?></textarea>
							</div>
						</div>
						<br/><br/><br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Username</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="inputusername" value="<?php echo $view['username'];?>">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Password<br/><small>jika tidak ingin ubah password, kosongkan password</small></label>
							<div class="col-lg-10">
								<input type="password"class="form-control" name="inputpassword" >
								<input type="hidden" class="form-control" name="oldpassword" value="<?php echo $view['password'];?>">
							</div>
						</div>		
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
