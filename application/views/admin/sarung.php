<div>
	<?php $this->load->view('admin/sidebar');?>
	<div class="col-md-10 admin-content">
		<div style="display:block">
			<div class="col-md-6"><h1><?php echo $title;?></h1></div>
			<div class="col-md-6"><p class="userpanel-admin">Login as username <a href="#">logout</a></p></div>
		</div>
		<hr/>
		<br/>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Semua <span style="margin-left:10px" class="badge pull-right">42</span></a></li>
			<li><a href="#profile" data-toggle="tab">Stok Habis <span style="margin-left:10px" class="badge pull-right">0</span></a></li>
		</ul>
		<br/>
		<a href="#" class="btn btn-primary">+ sarung</a>
		<div class="form-add">
			<br/>
			<strong>Tambah Sarung</strong>
			<form role="form">
			</form>
			<br/>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>id sarung</th>
					<th>Merek</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>...</td>
					<td>...</td>
					<td>...</td>
					<td>...</td>
					<td>...</td>
					<td><a href="#">edit</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>