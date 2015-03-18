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
					<h3 class="box-title">Manajemen Data Berita</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<br/>
					<a data-toggle="modal" class="btn btn btn-primary" href="#addsarung">Tambah Admin</a>
					<br/><br/>
					<table class="table table-striped">
						<tr>
							<th>id admin</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Alamat</th>
							<th>Telp</th>
							<th></th>
						</tr>
						<?php foreach($view as $v):?>
							<tr>
								<td><?php echo $v['id_admin'];?></td>
								<td><?php echo $v['nama_lengkap'];?></td>
								<td><?php echo $v['username'];?></td>
								<td><?php echo $v['alamat'];?></td>
								<td><?php echo $v['notelp'];?></td>
								<td><a class="btn btn-primary btn-xs" href="<?php echo site_url('manage/editadmin/'.$v['id_admin']) ?>">edit</a> <a onclick="return confirm('anda yakin!')" class="btn btn-danger btn-xs" href="<?php echo site_url('manage/deleteadmin/'.$v['id_admin']) ?>">hapus</a></td>
							</tr>
						<?php endforeach; ?>
					</table>
				</div><!-- /.box-body -->				
			</div>
			<center>
					<?php echo $this->pagination->create_links() ?>
				</center>
		</div>
	</div>
</div>

<!-- modal add sarung -->
<div class="modal fade" id="addsarung" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Admin</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Nama Lengkap</label>
							<div class="col-lg-10">
								<input type="text" name="inputnama" class="form-control" id="inputPassword1">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Telp</label>
							<div class="col-lg-10">
								<input type="text" name="inputnotelp" class="form-control" id="inputPassword1">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Alamat</label>
							<div class="col-lg-10">
								<textarea style="min-height:80px" class="form-control" name="inputalamat" id="inputPassword1"></textarea>
							</div>
						</div>
						<br/><br/><br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Username</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="inputusername">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password"class="form-control" name="inputpassword">
							</div>
						</div>		
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end of modal add sarung -->
