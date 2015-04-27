<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cek Data Pemasok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('resource/css/bootstrap.css'); ?>" rel="stylesheet">
</head>
<body>
	
	<div class="container">

		<div class="header">
			<h3 class="text-center">Cek Data Pemasok</h3>

			<div class="main">

				<div class="middle">
					<h4 class="text-center">Data Pemasok</h4>
					<table class="table table-bordered">
						<thead>
							<tr class="success">
								<th class="text-center">Perusahaan</th>
								<th class="text-center">Pasokan</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_pemasok as $row) { ?>
							<?php if($row['subtotal'] > 0):?>
							<tr class="danger">
								<th><?php echo $row['nama_pemasok'] ?></th>
								<th><?php echo $row['nama'] ?></th>
								<th><?php echo $row['jumlah'] ?> Kodi</th>
								<th>Rp <?php echo number_format($row['subtotal']) ?></th>
							</tr>
							<?php endif; ?>
							<?php }?>
						</tbody>
					</table>
				</div> <!--/ .left -->

			</div> <!--/ .main -->

			<div class="footer">
				<p>Copyright &copy; 2015 <a href="http://192.168.137.1/project/Hasaniyyin-Grosir/">Toko Grosir Sarung Hasaniyyin</a></p>
			</div> <!--/ .footer -->

		</div> <!--/ .header -->
	</div>

</body>
</html>