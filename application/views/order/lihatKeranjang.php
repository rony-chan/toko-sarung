<script>

</script>
<div class="row">
   <div class="col-md-9">
      <h1>Keranjang <small>cek keranjang belanja sebelum mulai pesan</small></h1>
      <div class="panel panel-default">
         <!-- Default panel contents -->
         <div class="panel-body">
            <div class="alert alert-warning fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Penting</strong> gunakan halaman ini untuk merubah dan menghapus daftar belanja anda dari cart.
            </div>
         </div>

         <!-- Table -->
         <table class="table">
            <tr>
               <th>Nama Barang</th>
               <th>Jumlah (Kodi)</th>
               <th>Harga Satuan</th>
               <th>Harga Total</th>
               <th></th>
            </tr>
            <?php foreach($this->cart->contents() as $list):?>
               <tr>
                  <td><?php echo $list['name'] ?></td>
                  <td><?php echo $list['qty'] ?></td>
                  <td>Rp <?php echo number_format($list['subtotal']/$list['qty']);?>,-</td>
                  <td>Rp <?php echo number_format($list['subtotal']);?>,-</td>
                  <td>
                     <a class="btn btn-xs btn-primary" href="<?php echo site_url('p/sarung/'.$list['id']) ?>">edit</a>
                     <a onclick="return confirm('anda yakin')" class="btn btn-xs btn-danger" href="<?php echo site_url('order/deleteCart/'.$list['rowid']) ?>">hapus</a>
                  </td>
               </tr>
            <?php endforeach; ?>
            <tr>
               <td><strong>Total</strong></td>
               <td></td>
               <td></td>
               <td>
                  <strong>Rp <?php echo number_format($this->cart->total());?>,-</strong>
               </td>
               <td></td>
            </tr>
         </table>
         <div class="row">
            <div class=" col-md-12">
               <br/>
               <h4>Masukan Data Pengiriman</h4>
               <p>Pastikan data yang dimasukan sesuai dengan data sebenar, benarnya agar paket sampai tujuan.<br/>Jika pembayaran tidak dilunasi sampai batas waktu 1x24 jam maka pemesanan akan di cancel, dan stok barang dikembalikan.</p>
               <hr/>
               <form class="" action="<?php echo site_url('order/addOrder') ?>" method="post">
                  <div class="row">
                     <div class=" col-md-12">
                        <div class="col-md-3"><label>Alamat Tujuan</label></div>
                        <div class="col-md-9">
                           <p>
                              Lengkapi dengan data provinsi, kota, kecamatan, nama jalan dan kode pos.<br/>
                              Otomatis terisi dari data <a href="<?php echo site_url('p/editProfile')?>">edit profile</a>.
                           </p>
                           <textarea name="inputalamat" class="form-control" style="height:100px"><?php echo $user['alamat'];?></textarea></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <br/>
                        <p>Pilih metode pembayaran</p>
                     </div>
                     <div class="col-md-6">
                     <label><input data-toggle="tooltip" title="pilih bank untuk transfer" onclick="return $('#pilihtransfer').show('fast');" type="radio" name="carabayar" value="transfer" required> Via Transfer</label>
                     </div>
                     <div class="col-md-6">
                     <label><input data-toggle="tooltip" title="langsung bayar dan ambil barang ditoko kami" onclick="return $('#pilihtransfer').hide('fast');" type="radio" name="rekening" value="langsung" required> Bayar Langsung</label>
                     </div>
                     <div style="display:none" id="pilihtransfer" class="col-md-12">
                        <br/>
                        <div class="col-md-12">
                           <div class="col-md-4"><center><img style="width:80%" src="<?php echo base_url('resource/img/logo/logo_bca.jpg')?>"></center><p>No Rek: xxx-xxxx</p><p><center><input type="radio" name="rekening" value="bca"></center></p></div>
                           <div class="col-md-4"><center><img style="width:80%" src="<?php echo base_url('resource/img/logo/logo_bri.png')?>"></center><p>No Rek: xxx-xxxx</p><p><center><input type="radio" name="rekening" value="bri"></center></p></div>
                           <div class="col-md-4"><center><img style="width:80%" src="<?php echo base_url('resource/img/logo/logo_mandiri.jpg')?>"></center><p>No Rek: xxx-xxxx</p><center><input type="radio" name="rekening" value="mandiri"></center></div>
                        </div>
                     </div>
                  </div>
                  <br/>
                  <button type="submit" class="btn btn-primary">Masukan Ke Order <i class="glyphicon glyphicon-arrow-right"></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <?php $this->load->view('user/sidebar');?>
   </div>
</div>
<!-- Footer -->
<center><br/>
   <div class="page-footer">
      <h5>Didukung oleh :</h5><br/>
      <div class="row" >
         <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
               <img data-src="holder.js/100%x120" alt="...">
            </a>
         </div>
         <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
               <img data-src="holder.js/100%x120" alt="...">
            </a>
         </div>
         <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
               <img data-src="holder.js/100%x120" alt="...">
            </a>
         </div>
         <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
               <img data-src="holder.js/100%x120" alt="...">
            </a>
         </div>
      </div>
      fhghhf
   </div>
</center>

</div>
</div>
</div>
