<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cek Data Sarung</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo base_url('resource/css/bootstrap.css'); ?>" rel="stylesheet">
</head>
<body>
	
	<div class="container">

		<div class="header">
			<h3 class="text-center">Cek Data Sarung</h3>

			<div class="main">

				<div class="left">
					<h4 class="text-center">Stok Tersisa</h4>
					<table class="table table-bordered">
						<thead>
							<tr class="success">
								<th class="text-center">Merek</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_sarung as $row) { ?>
							<?php if($row['jumlah'] > 0):?>
							<tr class="danger">
								<th><?php echo $row['merek'] ?></th>
								<th><?php echo $row['nama'] ?></th>
								<th class="text-center"><?php echo $row['jumlah'] ?> Kodi</th>
							</tr>
							<?php endif; ?>
							<?php }?>
						</tbody>
					</table>
				</div> <!--/ .left -->

				<div class="right">
					<h4 class="text-center">Stok Habis</h4>
					<table class="table table-bordered">
						<thead>
							<tr class="success">
								<th class="text-center">Merek</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($sarung_habis as $row) { ?>
							<?php if($row['jumlah'] <= 0):?>
								<tr class="danger">
									<th><?php echo $row['merek'] ?></th>
									<th><?php echo $row['nama'] ?></th>
									<th class="text-center"><?php echo $row['jumlah'] ?> Kodi</th>
								</tr>
							<?php endif; ?>
							<?php }?>
						</tbody>
					</table>
				</div> <!--/ .right -->

			</div> <!--/ .main -->

			<div class="footer">
				<p>Copyright &copy; 2015 <a href="http://www.hasaniyyin-sarung.com">Toko Sarung Hasaniyyin</a></p>
			</div> <!--/ .footer -->

		</div> <!--/ .header -->
	</div>

</body>
</html>