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
					<a data-toggle="modal" class="btn btn btn-primary" href="#addsarung">Tambah Berita</a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Judul</th>
								<th>Oleh</th>
								<th>Dibuat</th>
								<th>Diupdate</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($view as $v):?>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div>

<!-- modal add sarung -->
<div class="modal fade" id="addsarung" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="<?php echo site_url('manage/addsarung');?>" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Sarung</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Merek</label>
							<div class="col-lg-10">
								<select class="form-control" name="inputmerek" required>
									<option value="">Pilih merek</option>
									<?php foreach($merek as $m):?>
										<option value="<?php echo $m['id_sarung_merk'] ?>"><?php echo $m['merek'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Nama</label>
							<div class="col-lg-10">
								<input type="text" name="inputnama" class="form-control" id="inputPassword1">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Jumlah</label>
							<div class="col-lg-10">
								<input type="number" name="inputjumlah" class="form-control" id="inputPassword1">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Harga</label>
							<div class="col-lg-10">
								<input type="number" name="inputharga" class="form-control" id="inputPassword1" placeholder="masukan angka tanpa titik">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Deskripsi</label>
							<div class="col-lg-10">
								<textarea class="form-control" name="inputdeskripsi" id="inputPassword1"></textarea>
							</div>
						</div>
						<br/><br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Gambar</label>
							<div class="col-lg-10">
								<input class="form-control" type="file" name="inputgambar" required>
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
