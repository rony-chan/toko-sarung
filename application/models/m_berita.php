<?php

class m_berita extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	//list berita
	public function listBerita($limit,$offset){
		$params = array($offset,$limit);
		$sql = "SELECT id_berita, admin.username AS 'username',judul,postdate,updatedate,konten
		FROM berita 
		INNER JOIN admin ON admin.id_admin = berita.id_admin
		ORDER BY berita.updatedate ASC
		LIMIT ?,?";
		$query = $this->db->query($sql,$params);
		if($query->num_rows>0){
			return $query->result_array();
		}else{
			return array();
		}
	}
	//baca berita
	public function bacaBerita($id){
		$sql = "SELECT id_berita, admin.username AS 'username',judul,postdate,updatedate,konten
		FROM berita 
		INNER JOIN admin ON admin.id_admin = berita.id_admin
		WHERE id_berita = ?
		";
		$query = $this->db->query($sql,$id);
		if($query->num_rows>0){
			return $query->row_array();
		}else{
			return array();
		}	
	}
}