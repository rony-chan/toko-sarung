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
					<h3>Edit Data Sarung</h3>
					<hr/>
					<form method="POST" action="<?php echo site_url('manage/editsarung');?>" enctype="multipart/form-data">
						<input type="hidden" name="idsarung" value="<?php echo $view['id_sarung'];?>">
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
										<input type="text" name="inputnama" class="form-control" id="inputPassword1" value="<?php echo $view['nama'];?>">
									</div>
								</div>
								<br/><br/>
								<div class="form-group">
									<label for="inputPassword1" class="col-lg-2 control-label">Jumlah <br/><small>dalam satuan kodi</small></label>
									<div class="col-lg-10">
										<input type="number" name="inputjumlah" class="form-control" id="inputPassword1" value="<?php echo $view['jumlah'];?>">
									</div>
								</div>
								<br/><br/>
								<div class="form-group">
									<label for="inputPassword1" class="col-lg-2 control-label">Harga</label>
									<div class="col-lg-10">
										<input type="number" name="inputharga" class="form-control" id="inputPassword1" placeholder="masukan angka tanpa titik" value="<?php echo $view['harga'];?>">
									</div>
								</div>
								<br/><br/>
								<div class="form-group">
									<label for="inputPassword1" class="col-lg-2 control-label">Deskripsi</label>
									<div class="col-lg-10">
										<textarea class="form-control" name="inputdeskripsi" id="inputPassword1"><?php echo $view['deskripsi'];?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
