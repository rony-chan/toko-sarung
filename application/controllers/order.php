<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';
class Order extends Base {
   public function __construct(){
      parent::__construct();
      $this->load->model('m_order');
      // Your own constructor code
   }
   ///////////////////////////
   // ALL ABOUT CUSTOMER
   ///////////////////////////
   public function lihatKeranjang(){
      $data = array(
         'title'=>'Lihat Keranjang',
         );
      $this->displayUser('order/lihatKeranjang',$data);
   }
   //lihat status order
   public function lihatOrder(){
      $data = array(
         'title'=>'Status Order',
         'view'=>$this->m_order->myOrder(),
      );
      $this->displayUser('order/lihatOrder',$data);
   }

   ///////////////////////////
   // ALL ABOUT CART
   ///////////////////////////
   //add to cart
   public function addToCart(){
      $link = explode('?',$this->agent->referrer());
      $link = $link[0];
      if(empty($_POST)){
         redirect(site_url());//tidak melakukan tambah barang ke cart
      } else {
         $idBarang = $_POST['idbarang'];
         $jumlah = $_POST['jumlah'];
         //is jumlah stok = di database
         $sarung = $this->m_sarung->detailSarung($idBarang);//total stok sarung di database
         if($jumlah <= $sarung['jumlah']){//pesanan lebih kecil/ sama dengan di gudang
            //masukan ke cart
            $data = array(
               'id'=>$idBarang,
               'qty'=>$jumlah,
               'price'=>$sarung['harga'],
               'name'=>$sarung['nama']
            );
            $this->cart->insert($data);//insert to cart session
            redirect($link.'?success=berhasil dimasukan ke cart');//balik ke halaman sebelumnya
         }else{//pesanan lebih besar daripada stok
            redirect($link.'?error=stok tidak mencukupi');//balik ke halaman sebelumnya
         }
      }
   }
   //delete cart
   public function deleteCart(){
      $link = explode('?',$this->agent->referrer());
      $link = $link[0];
      echo $id = $this->uri->segment(3);
      $data = array('rowid'=>$id,'qty'=>0);//kembali ke 0
   	$this->cart->update($data);
      redirect($link.'?success=berhasil hapus dari cart');//balik ke halaman sebelumnya
   }

   //////////////////////////////////////////
   //ALL ABOUT ORDER
   //////////////////////////////////////////
   public function addOrder(){
      //create new order
      $data = array(
         'id_pelanggan'=>$this->session->userdata['userlogin'][0]['id_pelanggan'],
         'id_admin'=>null,
         'tanggalOrder'=>date('d-m-y H:i:s'),
         'tanggalLunas'=>null,
         'harga'=>$this->cart->total(),
         'status'=>'menunggu pembayaran'
      );
      //ada to order
      $this->db->insert('pesan',$data);
      //get lattest id order by user
      $idOrder = $this->m_order->getLastIdOrder($this->session->userdata['userlogin'][0]['id_pelanggan']);
      //masukan order item
      foreach($this->cart->contents() as $i):
         $item = array(
            'id_pesan' => $idOrder,
            'id_sarung' => $i['id'],
            'jumlah' => $i['qty'],
            'subtotal' => $i['subtotal']
         );
         //memasukan ke order item
         $this->db->insert('pesan_item',$item);
         //mengurangi jumlah sarung yang ditampilkan
         $this->m_order->getStock($i['id'],$i['qty']);
         //clear cart
         $this->cart->destroy();
      endforeach;
      redirect(site_url('order/lihatOrder').'?success=order sudah dimasukan, silahkan melakukan pembayaran untuk lanjut ke langkah berikutnya');//balik ke halaman sebelumnya
   }
}