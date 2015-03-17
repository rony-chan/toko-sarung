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
					<ul class="nav nav-tabs" id="myTab">
						<li id="semua"><a href="<?php echo site_url('manage/pesanan');?>">Semua Sarung</a></li>
						<li id="habis"><a href="<?php echo site_url('manage/pesanan/act/diproses');?>">Stok Habis</a></li>
					</ul>
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
							<td><a href="#" class="btn btn-primary btn-xs">edit</a></td>
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
