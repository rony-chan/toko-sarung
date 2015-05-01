<script src="<?php echo base_url('resource/js/tinymce/tinymce.min.js')?>"></script>
<script>
tinymce.init({plugins: "image",selector:'textarea'});
$(document).on('focusin', function(e) {
    if ($(event.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});
</script>
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
								<td><?php echo $v['judul'];?></td>
								<td><?php echo $v['username'];?></td>
								<td><?php echo $v['postdate'];?></td>
								<td><?php echo $v['updatedate'];?></td>
								<td>
									<a class="btn btn-primary btn-xs" href="<?php echo site_url('manage/editberita/'.$v['id_berita']) ?>">edit</a>
									<a onclick="return confirm('anda yakin')" class="btn btn-danger btn-xs" href="<?php echo site_url('manage/hapusberita/'.$v['id_berita']) ?>">hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
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
			<form method="POST" action="<?php echo site_url('manage/addberita');?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Berita</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Judul</label>
							<div class="col-lg-10">
								<input type="text" name="inputjudul" class="form-control" id="inputPassword1">
							</div>
						</div>
						<br/><br/>
						<div class="form-group">
							<label for="inputPassword1" class="col-lg-2 control-label">Berita</label>
							<div class="col-lg-10">
								<a target="_blank" class="btn btn-default" href="<?php echo site_url('manage/uploadgambar');?>">Tambah Gambar</a>
								<br/>
								<br/>
								<textarea style="height:350px" class="form-control" name="inputisi" id="inputPassword1"></textarea>
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
