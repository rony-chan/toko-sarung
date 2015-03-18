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
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Member</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($view as $v):?>
							<tr>
								<td><?php echo $v['id_pelanggan'];?></td>
								<td><?php echo $v['nama_lengkap'];?></td>
								<td><?php echo $v['alamat'];?></td>
								<td><?php echo $v['notelp'];?></td>
								<td><?php echo $v['email'];?></td>								
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
