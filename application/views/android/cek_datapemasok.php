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
			<h3>Cek Data Pemasok</h3>

			<div class="main">

				<div class="center">
					<h3>Data Pemasok</h3>
					<table class="table">
						<thead>
							<tr>
								<th>Merek</th>
								<th>Nama</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_sarung as $row) { ?>
							<?php if($row['jumlah'] > 0):?>
							<tr>
								<th><?php echo $row['merek'] ?></th>
								<th><?php echo $row['nama'] ?></th>
								<th><?php echo $row['jumlah'] ?></th>
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