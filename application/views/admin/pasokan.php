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
					<h3 class="box-title">Manajemen Data Pemasok dan Pasokan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<ul class="nav nav-tabs">
						<li id="tabpasokan"><a href="<?php echo site_url('manage/pasokan');?>">Manajemen Pasokan</a></li>
						<li id="tabpemasok"><a href="<?php echo site_url('manage/pemasok');?>">Manajemen Pemasok</a></li>
					</ul>
					<br/>
					<a href="<?php echo site_url('manage/tambahpasokan') ?>" class="btn btn-primary">Tambah Pasokan</a>
					<br/>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Pasokan</th>
								<th>Id Pemasok</th>
								<th>Tanggal</th>
								<th></th>
							</tr>
						</thead>
						<tbody>					
							<?php foreach($view as $v):?>
								<tr>
									<td><?php echo $v['id_pasokan'];?></td>								
									<td><?php echo $v['nama_pemasok'];?></td>								
									<td><?php echo $v['tanggal'];?></td>								
									<td>
										<a class="btn btn-xs btn-primary" href="<?php echo site_url('manage/detailpasokan/'.$v['id_pasokan']) ?>">detail</a>
										<a onclick="return confirm('anda yakin')" class="btn btn-xs btn-danger" href="<?php echo site_url('manage/hapuspasokan/'.$v['id_pasokan']) ?>">delete</a>
									</td>							
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div><!-- /.box-body -->				
			</div>
			<center>
				<?php //echo $this->pagination->create_links() ?>
			</center>
		</div>
	</div>
</div>
