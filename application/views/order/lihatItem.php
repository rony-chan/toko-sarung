<div class="row">
   <div class="col-md-9">
      <br/>
      <ol class="breadcrumb">
         <li><a href="<?php echo site_url(); ?>">Home</a></li>
         <li><a href="<?php echo site_url('order/lihatOrder');?>">My Order</a></li>
         <li class="active">My Items</li>
      </ol>
      <h1>Order Item <small>Daftar item order saya</small></h1>
      <div class="panel panel-default">
         <!-- Default panel contents -->
         <ul class="nav nav-tabs">
            <li class="active"><a href="<?php echo site_url('order/lihatOrder');?>">Semua Items</a></li>
         </ul>
         <!-- Table -->
         <?php if(!empty($view)){?>
            <table class="table">
               <tr>
                  <th>Nama Barang</th>
                  <th>qty</th>
                  <th>Harga</th>
                  <th>Subtotal</th>
               </tr>
               <?php foreach($view as $v):?>
                  <tr>
                     <td><?php echo $v['nama'] ?></td>
                     <td><?php echo $v['jumlah'] ?></td>
                     <td>Rp<?php echo number_format($v['harga'])?>,-</td>
                     <td>Rp<?php echo number_format($v['subtotal']) ?>,-</td>
                  </tr>
               <?php endforeach; ?>
            </table>
            <?php } else { ?>
               <center><h4>order tidak ditemukan</h4></center>
               <?php } ?>
            </div>
         </div>
         <div class="col-md-3">
            <?php $this->load->view('user/sidebar');?>
         </div>
      </div>
