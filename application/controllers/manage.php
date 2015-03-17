<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';

class Manage extends Base {

	public function __construct(){
		parent::__construct();
		$this->adminOnly();
		$this->load->model(array('m_order','m_sarung','m_admin'));
		// Your own constructor code
	}

	public function index(){
		redirect(site_url('manage/pesanan'));
	}

	//ubah status pesanan
	public function ubahStatus(){
		$idpesanan = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		$this->m_admin->ubahStatusPesanan($idpesanan,$status);
		redirect($this->agent->referrer());//kembali ke halaman sebelumnya
	}
	//ubah barang sudah diambil
	public function statusBarang(){
		$idpesanan = $this->uri->segment(3);
		$status = $this->uri->segment(4);//status barang
		$this->db->where('id_pesan',$idpesanan);
		$this->db->update('pesan',array('barangDiambil',$status));
		redirect($this->agent->referrer());//ubah status barang
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
					'view'=>$this->m_order->allOrder($config['per_page'],$uri,'menunggu pembayaran'),
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
					'view'=>$this->m_order->allOrder($config['per_page'],$uri,'lunas'),
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
			);
		//end of pagination
		$this->load->library('pagination');
		$act = $this->uri->segment(4);
		if(!empty($act)){
			switch ($act) {
				case 'habis':
				$uri = $this->uri->segment(5);
				if(!$uri){
					$uri = 0;
				}
				//pagination
				$config ['total_rows'] = $this->m_sarung->countDaftarSarungHabis();//total sarun habis
				//end of pagonation
				$data = array(
					'script'=>'<script>$(document).ready(function(){$("#sarung").addClass("active");$("#habis").addClass("active")});</script>',
					'title'=>'sarung',
					'view'=>$this->m_sarung->daftarSarungHabis($config['per_page'],$uri),
					);
				break;
			}
		}else{
			$uri = $this->uri->segment(4);
			if(!$uri){
				$uri = 0;
			}
			//pagination
			$config ['total_rows']=$this->db->count_all('sarung');//total berita on database
				//end of pagonation
			$data = array(
				'script'=>'<script>$(document).ready(function(){$("#sarung").addClass("active");$("#semua").addClass("active")});</script>',
				'title'=>'sarung',
				'view'=>$this->m_sarung->daftarSarung($config['per_page'],$uri),
				);
		}
		$this->pagination->initialize($config);		
		$this->displayAdmin('admin/sarung',$data);
	}

	//edit data sarung
	public function editSarung(){
		$data = array(
			'title'=>'edit data sarung';
			'script'=>'<script></script>',
			);
	}

	//olah data berita
	public function berita(){

	}

	//olah data admin
	public function admin(){

	}

}
