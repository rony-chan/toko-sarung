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
					<h3 class="box-title">Manajemen Data Sarung</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<ul class="nav nav-tabs" id="myTab">
						<li id="semua"><a href="<?php echo site_url('manage/sarung');?>">Semua Sarung</a></li>
						<li id="habis"><a href="<?php echo site_url('manage/sarung/act/habis');?>">Stok Habis</a></li>
					</ul>
					<br/>
					<a data-toggle="modal" class="btn btn btn-primary" href="#addsarung">Tambah Sarung</a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Sarung</th>
								<th>Merek</th>
								<th>Nama</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach($view as $v):?>
									<tr>
										<td><?php echo $v['id_sarung']?></td>
										<td><?php echo $v['merek']?></td>
										<td><?php echo $v['nama']?></td>
										<td><?php echo $v['jumlah']?></td>
										<td>Rp<?php echo number_format($v['harga'])?>,-</td>
										<td>
										<a href="<?php echo site_url('manage/editsarung/'.$v['id_sarung']);?>" class="btn btn-primary btn-xs">edit</a> <a onclick="return confirm('anda yakin')" href="<?php echo site_url('manage/deletesarung/'.$v['id_sarung']);?>" class="btn btn-danger btn-xs">delete</a>
										</td>
										<tr>
										<?php endforeach; ?>
									</tr>
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
