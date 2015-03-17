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
						<li id="semua"><a href="<?php echo site_url('manage/pesanan');?>">Semua Pesanan</a></li>
						<li id="diproses"><a href="<?php echo site_url('manage/pesanan/act/diproses');?>">Pesanan Diproses</a></li>
						<li id="selesai"><a href="<?php echo site_url('manage/pesanan/act/selesai');?>">Pesanan Selesai</a></li>
					</ul>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Id Pesan</th>
								<th>Pemesan</th>
								<th>Total Harga</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($view as $v):?>
							<tr>
								<td>1</td>
								<td><?php echo $v['id_pesan'];?></td>
								<td><?php echo $v['nama_lengkap'];?></td>
								<td>Rp<?php echo number_format($v['harga']);?>,-</td>

									<?php
	                        switch ($v['status']) {
	                           case 'menunggu pembayaran':
	                           echo '<td><span class="label label-warning">'.$v['status'].'</span></td>';
							   echo '<td><a href="'.site_url('manage/ubahStatus/'.$v['id_pesan']).'/lunas" class="btn btn-primary btn-xs">ubah lunas</a></td>';
	                           break;
	                           case 'lunas':
		                          echo '<td><span class="label label-success">'.$v['status'].'</span>';
		                           switch ($v['barangDiambil']){
								  	case '0':
								  		echo '<span style="color:orange"> barang belum diambil</span>';
								  		break;
								  	case '1':
								  		echo '<span style="color:green"> barang sudah diambil</span>';
								  		break;						  	
								  	
								  }
		                          echo '</td>';
								  echo '<td>';
								  echo '<a href="'.site_url('manage/ubahStatus/'.$v['id_pesan']).'/menunggu-pembayaran" class="btn btn-primary btn-xs">ubah tidak lunas</a> ';
								  echo '<a href="'.site_url('manage/statusBarang/'.$v['id_pesan']).'/1" class="btn btn-default btn-xs">barang diambil</a>';
								  echo '</td>';
	                           break;	                          
	                        }
	                        ?>

							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
