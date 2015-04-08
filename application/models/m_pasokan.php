<?php

class m_pasokan extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	//MANAJEMEN PASOKAN
	public function getPasokan($limit,$offset){
		$this->db->limit($limit,$offset);
		$query = $this->db->get('pasokan');
		if($query->row_array()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}

	//MANAJEMEN PEMASOK
	//menampilkan seluruh pemasok
	public function getPemasok($limit,$offset){
		$this->db->limit($limit,$offset);
		$query = $this->db->get('pemasok');
		if($query->row_array()>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	//pemasok berdasarkan id pemasok
	public function pemasokById($idpemasok){
		$this->db->where('id_pemasok',$idpemasok);
		$query = $this->db->get('pemasok');
		return $query->row_array();
	}
	//mendapatkan pasokan terakhir
	public function latestPasokan(){
		$this->db->limit(1,0);
		$this->db->order_by('id_pasokan','desc');
		$query = $this->db->get('pasokan');
		return $query->row_array();
	}
	//detail pasokan
	public function detailPasokan($id){//lihat detail pasokan
		$sql = "SELECT id_pasokan,pasokan.tanggal AS 'tanggal',pemasok.nama_pemasok AS 'pemasok' FROM pasokan
		INNER JOIN pemasok ON pemasok.id_pemasok = pasokan.id_pemasok WHERE id_pasokan = $id";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	//pasokan item
	public function itemPasokan($id){//lihat semua item di pasokan
		$sql = "SELECT id_pasokan,pasokan_item.id_sarung AS 'id_sarung',pasokan_item.harga AS 'harga',pasokan_item.subtotal AS 'subtotal',pasokan_item.jumlah AS 'jumlah',sarung.nama AS 'nama'
		FROM pasokan_item INNER JOIN sarung ON pasokan_item.id_sarung = sarung.id_sarung
		WHERE id_pasokan = $id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}