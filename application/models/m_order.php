<?php

class m_order extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

   ////////////////////
   // ALL ABOUT ORDER
   ////////////////////
   public function detailOrder($idorder){
      $this->db->where('id_pesan',$idorder);
      $query = $this->db->get('pesan');
      return $query->row_array();
   }
   //check pesanan yang tidak dieksekusi dalam waktu 1x24 jam

   //get last id order by id pelanggan
   public function getLastIdOrder($iduser){
      $this->db->where('id_pelanggan',$iduser);
      $this->db->order_by('id_pesan','DESC');
      $query = $this->db->get('pesan');
      $result = $query->row_array();
      return $result['id_pesan'];
   }
   //my order
   public function myOrder(){
      $iduser = $this->session->userdata['userlogin'][0]['id_pelanggan'];//get id pelanggan
      $this->db->where('id_pelanggan',$iduser);
      $order = $this->db->get('pesan');
      return $order->result_array();//get result
   }
	//show custom order
	public function myCustomOrder($status){
      $iduser = $this->session->userdata['userlogin'][0]['id_pelanggan'];//get id pelanggan
      $this->db->where('id_pelanggan',$iduser);
      $this->db->where('status',$status);
		$order = $this->db->get('pesan');
      return $order->result_array();//get result
   }
   ////////////////////
   // ALL ABOUT STUFF
   ////////////////////
   //mengurangi jumlah stok
   public function getStock($idsarung,$qty){
      $params = array($qty,$idsarung);
      $sql = "UPDATE sarung SET jumlah = jumlah - ?
      WHERE id_sarung = ?";
      return $this->db->query($sql,$params);//execute query
   }
	//cek all item by id order
	public function getOrderItem($idorder){
		$sql = "SELECT sarung.id_sarung AS 'id_sarung',sarung.nama, sarung.harga, pesan_item.subtotal, pesan_item.jumlah
		FROM sarung
		INNER JOIN pesan_item ON pesan_item.id_sarung = sarung.id_sarung
		WHERE pesan_item.id_pesan = ?";
		$items = $this->db->query($sql,$idorder);
		return $items->result_array();
	}

}
