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
						<li class="active"><a href="#home">Semua Pesanan</a></li>
						<li><a href="#profile">Pesanan Diproses</a></li>
						<li><a href="#profile">Pesanan Selesai</a></li>
					</ul>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Id Pemesan</th>
								<th>Pemesan</th>
								<th>Total Harga</th>
								<th>Total barang</th>
								<th>Berat(gr)</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>345-567</td>
								<td>Yusuf Akhsan</td>
								<td>Rp45.000,-</td>
								<td>34</td>
								<td>45gr</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div>