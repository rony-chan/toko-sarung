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
					<h3 class="box-title">Tambah Pasokan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<h4>Tambah Pasokan</h4>
					<form class="form" action="<?php echo site_url('manage/pasokancart')?>" method="POST">
						<label>Id Sarung <small>Jika id Sarung belum tersedia, silahkan <a target="_blank" href="<?php echo site_url('manage/sarung') ?>">Tambah Sarung</a></small></label>	
						<input class="form-control" type="number" name="idsarung" required>
						<label>Jumlah Sarung (kodi)<small></label>	
						<input class="form-control" type="number" name="jumlah" required>
						<br/>
						<button class="btn btn-primary">Masukan Ke Cart</button>
					</form>
					<?php
					$cartcontents = $this->cart->contents();
					if(!empty($cartcontents)):
						?>
					<hr/>
					<h4>Data Cart</h4>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Merek Sarung</th>
								<th>Nama Sarung</th>
								<th>Id Sarung</th>
								<th>Jumlah (kodi)</th>
								<th>Subtotal (Rp)</th>
								<!-- <th></th> -->
							</tr>
						</thead>
						<tbody>
							<?php $i=1;foreach($this->cart->contents() as $item):?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $item['merk'];?></td>
								<td><?php echo $item['name'];?></td>
								<td><?php echo $item['id'];?></td>
								<td><?php echo $item['qty'];?></td>
								<td><?php echo number_format($item['qty']*$item['price']);?></td>	
								<!-- <td><a href="#" class="btn btn-xs">x</a></td>						 -->
							</tr>
						<?php $i++;endforeach;?>
					</tbody>
				</table>				
				<div class="row">
					<div class="col-md-6">
						<h3><strong>Rp <?php echo $this->cart->format_number($this->cart->total());?> ,-</strong></h3>
						<form action="<?php echo site_url('manage/carttodb') ?>" method="POST">
							<div class="col-md-5">
								<label>Id Pemasok</label>
								<input class="form-control" name="idpemasok" name="idpemasok" placeholder="masukan id pemasok" required>
							</div>
							<div class="col-md-3">
								<label></label>
								<button type="submit" class="btn btn-primary">Masukan Ke Gudang</button>
							</div>
						</form>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- /.box-body -->				
	</div>
	<center>
		<?php //echo $this->pagination->create_links() ?>
	</center>
</div>
</div>
</div>
