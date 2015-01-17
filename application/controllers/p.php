<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';


class P extends Base {
	public function index(){
		echo 'forbidden';
	}
	//////////////////////////
	/// ALL ABOUT BERITA
	//////////////////////////
	public function berita(){
		$this->load->model('m_berita');
		if(empty($this->uri->segment(3))){//list berita
			//pagination setup
			$config = array(
				'per_page'=>6,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('p/berita'),//get lattest location
				'total_rows'=>$this->db->count_all('berita'),//total berita on database
				);
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$uri = $this->uri->segment(4);
			if(!$uri){
				$uri = 0;
			}
			//$this->pagination->create_links();
			// end of pagination setup
			$data = array(
				'title'=>'berita',
				'view'=>$this->m_berita->listBerita($config['per_page'],$uri),
				);
			$this->displayUser('user/listberita',$data);
		}else{//baca berita
			$idberita = $this->uri->segment(3);
			$data = array(
				'title'=>'Baca Berita',
				'view'=>$this->m_berita->bacaBerita($idberita),
				);
			$this->displayUser('user/bacaBerita',$data);
		}
	}
	//////////////////////////
	/// ALL ABOUT SARUNG
	//////////////////////////
	public function sarung(){
		
	}

}