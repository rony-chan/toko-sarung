<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';
class Order extends Base {

   ///////////////////////////
   // ALL ABOUT CUSTOMER
   ///////////////////////////
   public function lihatKeranjang(){
      $data = array(
         'title'=>'Lihat Keranjang',
         );
      $this->displayUser('order/lihatKeranjang',$data);
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
   //edit cart
   public function editCart(){

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
}
