<html>
   <head>
      <title>Cetak Bukti Order</title>
      <style media="screen">
         h1 .title{text-align:center;font-size:20px;}
         p{line-height:1.5}
         table{border:1px solid gray;width:100%}
         table td,table th{padding-right:20px;text-align:left}
      </style>
   </head>
   <body>
      <center>
      <h1 class="title">Bukti Order</h1>
      <h2>Rony Sarung - Sedia Semua Sarung</h2>
   </center>
   <hr/>
      <p>
         <strong>Dengan detail pembelian sebagai berikut :<br/></strong>
         Tanggal Order : <?php echo $order['tanggalOrder']?><br/>
         <?php if($order['status']=='lunas'){?>
            Status : <span style="color:green"><?php echo $order['status']?></span><br/>
            Tanggal Lunas : <?php echo $order['tanggalLunas']?><br/>
         <?php }else{?>
            Status : <span style="color:orange"><?php echo $order['status']?></span><br/>
         <?php } ?>
         Nama : <?php echo $pelanggan['nama_lengkap']?><br/>
         Alamat : <?php echo $pelanggan['alamat']?><br/>
      </p>
      <p>
         Dengan detail item sebagai berikut :<br/>
         <table>
            <tr>
               <th>No</th>
               <th>Nama</th>
               <th>Q</th>
               <th>Harga</th>
            </tr>
            <?php $total=0;foreach($item as $i):?>
            <tr>
               <td><?php echo $i['id_sarung']?></td>
               <td><?php echo $i['nama']?></td>
               <td><?php echo $i['jumlah']?></td>
               <td>Rp <?php echo number_format($i['subtotal'])?>,-</td>
            </tr>
         <?php $total = $total+$i['subtotal'];endforeach;?>
         </table>
      </p>
      <h3 class="teks-bawah">Total Harga Rp <?php echo number_format($total);?>,-</h3>
   </body>
</html>
