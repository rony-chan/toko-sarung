<div class="row">
   <div class="col-md-9">
      <br/>
      <ol class="breadcrumb">
         <li><a href="<?php echo site_url(); ?>">Home</a></li>
         <li class="active">My Order</li>
      </ol>
      <h1>Order <small>Daftar order saya</small></h1>
      <div class="panel panel-default">
         <!-- Default panel contents -->
         <div class="panel-body">
            <div class="alert alert-warning fade in">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <strong>Penting</strong> gunakan halaman ini untuk konfirmasi pembayar dan cek statu pemeasanan.
            </div>
         </div>
         <ul class="nav nav-tabs">
            <li id="semua"><a href="<?php echo site_url('order/lihatOrder');?>">Semua Order</a></li>
            <li id="menunggu"><a href="<?php echo site_url('order/lihatOrder/sort/menunggu');?>">Order Menunggu</a></li>
            <li id="lunas"><a href="<?php echo site_url('order/lihatOrder/sort/lunas');?>">Order Lunas</a></li>
         </ul>
         <!-- Table -->
         <?php if(!empty($view)){?>
            <table class="table">
               <tr>
                  <th>id order</th>
                  <th>tgl order</th>
                  <th>tgl lunas</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th></th>
               </tr>
               <?php foreach($view as $v):?>
                  <tr>
                     <td><?php echo $v['id_pesan']; ?></td>
                     <td><?php echo $v['tanggalOrder']; ?></td>
                     <td><?php echo $v['tanggalLunas']; ?></td>
                     <td>Rp<?php echo number_format($v['harga']);?>,-</td>
                     <td>
                        <?php
                        switch ($v['status']) {
                           case 'menunggu pembayaran':
                           echo '<span class="label label-warning">'.$v['status'].'</span>';
                           break;
                           case 'lunas':
                           echo '<span class="label label-success">'.$v['status'].'</span>';
                           break;
                           default:
                           echo '<span class="label label-default">tidak ada status</span>';
                           break;
                        }
                        ?>
                     </td>
                     <td><a class="btn btn-primary btn-xs" href="<?php echo site_url('order/lihatItem/'.$v['id_pesan']) ?>">detail</a></td>
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
