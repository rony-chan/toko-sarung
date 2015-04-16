<div class="row">
	<div class="col-md-12">
		<div class="left-sidebar col-md-2">
			<!-- sidebar -->
			<?php echo $this->load->view('admin/sidebar')?>
			<!-- end of sidebar -->
		</div>
		<div class="col-md-10">
			<div class="box box-solid box-primary">				
				<?php if(!empty($_GET['act']) && $_GET['act']=='editview'){?>
				<div class="box-header">
					<h3 class="box-title">Ubah Data Pemasok <a href="<?php echo site_url('manage/pemasok') ?>">X</a></h3>
				</div><!-- /.box-header -->
				<form style="padding:20px" class="form" method="POST" action="<?php echo site_url('manage/pemasokaction?act=edit&id='.$_GET['id']);?>">
					<?php $data = $this->m_pasokan->pemasokById($_GET['id']);?>
					<label>Nama :</label><input class="form-control" type="text" name="inputnama" value="<?php echo $data['nama_pemasok'];?>" placeholder="masukan nama pemasok"><br/>
					<label>Alamat : </label><textarea class="form-control" type="text" name="inputalamat" placeholder="masukan alamat pemasok"><?php echo $data['alamat_pemasok'];?></textarea><br/>
					<label>No Telp : </label><input class="form-control" type="text" name="inputtelp" placeholder="masukan no telp pemasok" value="<?php echo $data['no_telp'];?>"><br/>
					<button class="btn btn-primary" type="submit">Simpan Perubahan</button>
				</form>
				<?php } ?>
				<div class="box-header">
					<h3 class="box-title">Manajemen Data Pemasok dan Pasokan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<ul class="nav nav-tabs">
						<li id="tabpasokan"><a href="<?php echo site_url('manage/pasokan');?>">Manajemen Pasokan</a></li>
						<li id="tabpemasok"><a href="<?php echo site_url('manage/pemasok');?>">Manajemen Pemasok</a></li>
					</ul>
					<br/>
					<a class="btn btn-primary" data-toggle="modal" href="#modalpemasok">Tambah Pemasok</a>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Id Pemasok</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($view as $v):?>
								<tr>
									<td><?php echo $v['id_pemasok'];?></td>								
									<td><?php echo $v['nama_pemasok'];?></td>
									<td><?php echo $v['alamat_pemasok'];?></td>
									<td><?php echo $v['no_telp'];?></td>
									<td>
										<a class="btn btn-xs btn-primary" href="<?php echo site_url('manage/pemasok?act=editview&id='.$v['id_pemasok']);?>">edit</a>
										<a class="btn btn-xs btn-danger" href="<?php echo site_url('manage/pemasokaction?act=delete&id='.$v['id_pemasok']);?>">hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>
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

<!-- Modal tambah pemasok-->
<div class="modal fade" id="modalpemasok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Pemasok</h4>
			</div>
			<div class="modal-body">
				<form class="form" method="POST" action="<?php echo site_url('manage/pemasokaction?act=add');?>">
					<label>Nama :</label><input class="form-control" type="text" name="inputnama" placeholder="masukan nama pemasok"><br/>
					<label>Alamat : </label><textarea class="form-control" type="text" name="inputalamat" placeholder="masukan alamat pemasok"></textarea><br/>
					<label>No Telp : </label><input class="form-control" type="text" name="inputtelp" placeholder="masukan no telp pemasok"><br/>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
