<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';
class Order extends Base {
   //add to cart
   public function addToCart(){
      if(empty($_POST)){
         redirect(site_url());//tidak melakukan tambah barang ke cart
      } else {
         $idBarang = $_POST['idbarang'];
         $jumlah = $_POST['jumlah'];
         //is jumlah stok = di database
         $sarung = $this->m_sarung->detailSarung($idBarang);//total stok sarung di database
         if($jumlah <= $sarung['stok']){//pesanan lebih kecil/ sama dengan di gudang
            //masukan ke cart
            $data = array(
               'id'=>$idBarang,
               'qty'=>$jumlah,
               'price'=>$sarung['harga'],
               'name'=>$sarung['nama']
            );
            $this->cart->insert($insert);//insert to cart session
            redirect($this->agent->referrer().'?success=berhasil dimasukan ke cart');//balik ke halaman sebelumnya
         }else{//pesanan lebih besar daripada stok
            redirect($this->agent->referrer().'?error=stok tidak mencukupi');//balik ke halaman sebelumnya
         }
      }
   }
   //edit cart
   public function editCart(){

   }
   //delete cart
   public function deleteCart(){

   }
}
