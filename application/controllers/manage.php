<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';

class Manage extends Base {

	public function __construct(){
		parent::__construct();
		$this->adminOnly();
		$this->load->model('m_order');
		// Your own constructor code
	}

	public function index(){
		redirect(site_url('manage/pesanan'));
	}

	//olah data pesanan
	public function pesanan(){
		//start pagination
		$this->load->library('pagination');
		$config['per_page'] = 15;
		$config['num_link'] = 5;
		//pagination bersambung
		if(!empty($this->uri->segment(4))){//get custom order
			//pagination
			$config['uri_segment'] = 5;
			$uri = $this->uri->segment(5);
			if(!$uri) {
				$uri = 0;
			}
			//end of pagination
			$act = $this->uri->segment(4);
			switch ($act) {
				case 'diproses':
				//pagination
				$config['total_rows'] = $this->m_order->countAllOrder('menunggu pembayaran');
				$this->pagination->initialize($config);
				//end of pagination
				$data = array(
					'script'=>'<script>$(document).ready(function(){$("#diproses").addClass("active");$("#pesanan").addClass("active")});</script>',
					'title'=>'Pesanan Diproses',
				);
				break;
				case 'selesai':
				//pagination
				$config['total_rows'] = $this->m_order->countAllOrder('lunas');
				$this->pagination->initialize($config);
				//end of pagination
				$data = array(
					'script'=>'<script>$(document).ready(function(){$("#selesai").addClass("active");$("#pesanan").addClass("active")});</script>',
					'title'=>'Pesanan Selesai',
				);
				break;
			}
		}else{//get lattest order
			//pagination
			$config['uri_segment'] = 4;
			$uri = $this->uri->segment(4);
			if(!$uri) {
				$uri = 0;
			}
			$config['total_rows'] = $this->m_order->countAllOrder();
			$this->pagination->initialize($config);
			//end of pagination
			$data = array(
				'script'=>'<script>$(document).ready(function(){$("#semua").addClass("active");$("#pesanan").addClass("active")});</script>',
				'title'=>'Semua Pesanan',
				'view'=>$this->m_order->allOrder($config['per_page'],$uri,''),
			);
		}
		$this->displayAdmin('admin/pesanan',$data);
	}

	//olah data sarung
	public function sarung(){
		//start pagination
		$config = array(
			'per_page'=>6,
			'uri_segment'=>3,
			'num_link'=>4,
			'base_url'=>site_url('p/sarung'),//get lattest location
			'total_rows'=>$this->db->count_all('sarung'),//total berita on database
		);
		//end of pagination
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$uri = $this->uri->segment(4);
		if(!$uri){
			$uri = 0;
		}
		$data = array(
			'script'=>'<script>$(document).ready(function(){$("#sarung").addClass("active")});</script>',
			'title'=>'sarung',
		);
		$this->displayAdmin('admin/pesanan',$data);
	}

	//olah data berita
	public function berita(){

	}

	//olah data admin
	public function admin(){

	}

}
