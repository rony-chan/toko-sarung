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
					<h3>Edit Data Berita</h3>
					<hr/>
					<form method="POST" action="">
						<input type="hidden" name="idberita" value="<?php echo $view['id_berita'];?>">
						<div class="modal-body">
							<div class="row">
								<div class="form-group">
									<label for="inputPassword1" class="col-lg-2 control-label">Judul</label>
									<div class="col-lg-10">
										<input type="text" name="inputjudul" class="form-control" id="inputPassword1" value="<?php echo $view['judul'];?>">
									</div>
								</div>								
								<br/><br/>
								<div class="form-group">
									<label for="inputPassword1" class="col-lg-2 control-label">Isi</label>
									<div class="col-lg-10">
										<textarea style="height:200px" class="form-control" name="inputisi" id="inputPassword1"><?php echo $view['konten'];?></textarea>
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
