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
                  <strong>Rp<?php echo number_format($this->cart->total());?>,-</strong>
               </td>
               <td></td>
            </tr>
         </table>
         <div class="row">
            <div class=" col-md-12">
               <br/>
               <a class="btn btn-primary" href="<?php echo site_url('order/addOrder') ?>">Masukan Ke Order <i class="glyphicon glyphicon-arrow-right"></i></a>
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
