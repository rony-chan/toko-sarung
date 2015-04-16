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
					<h3 class="box-title">Detail Pasokan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<h4>Detail Pasokan</h4>
					<p>Id Pasokan : <?php echo $view['id_pasokan'];?></p>
					<p>Pemasok : <?php echo $view['pemasok'];?></p>
					<p>Tanggal Pasokan : <?php echo $view['tanggal'];?></p>
					<hr/>
					<h4>Item Pasokan</h4>
					<table class="table table-striped">
					<thead>
						<tr>
							<th>Id Sarung</th>
							<th>Nama</th>
							<th>Jumlah (Kodi)</th>
							<th>Harga (Rp)</th>
							<th>Subtotal (Rp)</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$subtotal =0;
					foreach($item as $i):?>
						<tr>
							<td><?php echo $i['id_pasokan'];?></td>
							<td><?php echo $i['nama'];?></td>
							<td><?php echo $i['jumlah'];?></td>
							<td><?php echo number_format($i['harga']);?></td>
							<td><?php echo number_format($i['subtotal']);?></td>
						</tr>
					<?php $subtotal = $subtotal+$i['subtotal'];endforeach;?>
					<tr>
						<td><strong>Total</strong></td>
						<td></td>
						<td></td>
						<td></td>
						<td><strong><?php echo number_format($subtotal);?></strong></td>
					</tr>						
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
