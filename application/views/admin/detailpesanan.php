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
					<h3 class="box-title">Detail Data Pesanan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				<a class="btn btn-default btn-md" href="<?php echo base_url('manage/pesanan');?>">kembali</a>
				<h3>Data Transaksi</h3>
				<table class="table">
					<tr>
						<th style="width:200px">Id Pesan</th><td><?php echo $detail['id_pesan'];?></td>
					</tr>
					<tr>
						<th style="width:200px">Nama Pelanggan</th><td><?php echo $detail['nama_lengkap'];?></td>
					</tr>
					<tr>
						<th style="width:200px">Tgl Order</th><td><?php echo $detail['tanggalOrder'];?></td>
					</tr>
					<tr>
						<th style="width:200px">Tgl Lunas</th><td><?php echo $detail['tanggalLunas'];?></td>
					</tr>
					<tr>
						<th style="width:200px">Alamat Lengkap</th><td><?php echo $detail['alamat'];?></td>
					</tr>
					<tr>
						<th style="width:200px">No Telp</th><td><?php echo $detail['notelp'];?></td>
					</tr>
					<tr>
						<th style="width:200px">Harga Total</th><td><?php echo number_format($detail['harga']);?></td>
					</tr>
					<tr>
						<th style="width:200px">Bayar Via</th><td><?php echo strtoupper($detail['rekening']);?></td>
					</tr>
					<tr>
						<th style="width:200px">Status Bayar</th><td><?php echo $detail['status'];?></td>
					</tr>
					<tr>
						<th style="width:200px">Barang Diambil</th><td><?php echo $detail['barang'];?></td>
					</tr>
				</table>
				<h3>Item Pesanan</h3>
				<table class="table">
					<tr>
						<th>Nama Sarung</th>
						<th>Harga (Rp)</th>
						<th>Jumlah Beli</th>
						<th>Subtotal (Rp)</th>
					</tr>
					<?php $totalbeli=0;foreach($item as $i):?>
					<tr>
						<td><?php echo $i['nama'];?></td>
						<td><?php echo $i['harga'];?></td>
						<td><?php echo $i['jumlah'];?></td>
						<td><?php echo number_format($i['subtotal']);?></td>
					</tr>
				<?php $totalbeli = $totalbeli + $i['subtotal'];endforeach;?>
					<tr>
						<td colspan="3"><strong>Jumlah</strong></td>
						<td><strong><?php echo 'Rp '.number_format($totalbeli);?></strong></td>
					</tr>
				</table>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
