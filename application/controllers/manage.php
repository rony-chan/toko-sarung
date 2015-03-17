<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';

class Manage extends Base {

	public function __construct(){
		parent::__construct();
		$this->adminOnly();
		$this->load->model(array('m_order','m_sarung','m_admin','m_berita','m_user'));
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
		$this->db->update('pesan',array('barangDiambil'=>$status));
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
		$data['merek'] = $this->m_sarung->semuaMerk();
		$this->displayAdmin('admin/sarung',$data);
	}
	//add sarung
	public function addSarung(){
		$merek = $_POST['inputmerek'];
		$nama = $_POST['inputnama'];
		$jumlah = $_POST['inputjumlah'];
		$harga = $_POST['inputharga'];
		$deskripsi = $_POST['inputdeskripsi'];
		$gambar = $_FILES['inputgambar'];
		//upload gambar process
		$config['upload_path'] = './resource/img/sarung';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '200';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//end of upload gambar process
		if (!$this->upload->do_upload('inputgambar')){//gagal upload
			echo $this->upload->display_errors();
		} else {
			$pp =$this->upload->data('file_name');
			$pp = $pp['file_name'];
			//add to database
			$newsarung = array(//data to insert
				'id_merk'=>$merek,
				'nama'=>$nama,
				'jumlah'=>$jumlah,
				'harga'=>$harga,
				'deskripsi'=>$deskripsi
				);
			$this->db->insert('sarung',$newsarung);//insert new sarung data to database
			//get last id_sarung
			$lastid = $this->m_sarung->getLastIdSarung();
			//insert gambar sarung
			$gambar = array(
				'id_sarung'=>$lastid,
				'gambar'=>$pp
				);
			$this->db->insert('gambar',$gambar);//insert gambar to database
			//end of add to database
			redirect($this->agent->referrer());//kembali ke halaman utama
		}
	}
	//delete sarung
	public function deleteSarung(){
		$id = $this->uri->segment(3);
		$data = array('id_sarung'=>$id);
		$this->db->delete('sarung',$data);
		$this->db->delete('gambar',$data);
		redirect($this->agent->referrer());
	}
	//edit data sarung
	public function editSarung(){
		if(!empty($_POST)){//process update sarung
			$idsarung = $_POST['idsarung'];
			$merek = $_POST['inputmerek'];
			$nama = $_POST['inputnama'];
			$jumlah = $_POST['inputjumlah'];
			$harga = $_POST['inputharga'];
			$deskripsi = $_POST['inputdeskripsi'];
			//update database process
			$this->db->where('id_sarung',$idsarung);
			$data = array(
				'id_merk'=>$merek,
				'nama'=>$nama,
				'jumlah'=>$jumlah,
				'harga'=>$harga,
				'deskripsi'=>$deskripsi
				);
			$this->db->update('sarung',$data);
			//end of update database
			redirect($this->agent->referrer());
		}
		$id = $this->uri->segment(3);
		$data = array(
			'title'=>'edit data sarung',
			'script'=>'<script>$(document).ready(function(){$("#sarung").addClass("active")});</script>',
			'merek'=>$this->m_sarung->semuaMerk(),
			'view'=>$this->m_sarung->detailSarung($id),
			);
		$this->displayAdmin('admin/editsarung',$data);
	}
	///////////////////////////
	// EDIT BERITA
	///////////////////////////

	//olah data berita
	public function berita(){
		//start pagination
		$config = array(
			'per_page'=>6,
			'uri_segment'=>3,
			'num_link'=>4,
			'base_url'=>site_url('manage/berita'),//get lattest location
			'total_rows'=>$this->db->count_all('berita'),//total berita
			);
		//end of pagination
		$this->load->library('pagination');
		$uri = $this->uri->segment(3);
		if(!$uri){
			$uri = 0;
		}
		$this->pagination->initialize($config);
		$data['title'] = 'Manajemen Berita';
		$data['script'] = '<script>$(document).ready(function(){$("#berita").addClass("active")});</script>';
		$data['view'] = $this->m_berita->listBerita($config['per_page'],$uri);
		$this->displayAdmin('admin/berita',$data);
	}
	//add berita
	public function addberita(){
		$judul = $_POST['inputjudul'];
		$isi = $_POST['inputisi'];
		$data = array(
			'judul'=>$judul,
			'konten'=>$isi,
			'postdate'=>date('d-m-y H:i:s'),
			'updatedate'=>date('d-m-y H:i:s'),
			'id_admin'=>$this->session->userdata['adminlogin']['id_admin'],
			);
		// print_r($data);
		$this->db->insert('berita',$data);
		redirect($this->agent->referrer());
	}
	//edit berita
	public function editberita(){
		if(!empty($_POST)){//process data
			$judul = $_POST['inputjudul'];
			$isi = $_POST['inputisi'];
			$idberita = $_POST['idberita'];
			$this->db->where('id_berita',$idberita);
			$data = array(
				'judul'=>$judul,
				'konten'=>$isi,
				'updatedate'=>date('d-m-y H:i:s'),
				'id_admin'=>$this->session->userdata['adminlogin']['id_admin']
				);
			$this->db->update('berita',$data);
			redirect($this->agent->referrer());
		}else{//view
			$id = $this->uri->segment(3);
			$data['title'] = 'Edit Berita';
			$data['script'] = '<script>$(document).ready(function(){$("#berita").addClass("active")});</script>';
			$data['view'] = $this->m_berita->bacaBerita($id);
			$this->displayAdmin('admin/editberita',$data);
		}
	}
	//hapus berita
	public function hapusberita(){
		$this->db->delete('berita',array('id_berita'=>$this->uri->segment(3)));
		redirect($this->agent->referrer());
	}

	////////////////////////
	//ALL ABOUT MEMBER
	///////////////////////
	//lihat data member
	public function member(){
		//start pagination
		$config = array(
			'per_page'=>6,
			'uri_segment'=>3,
			'num_link'=>4,
			'base_url'=>site_url('manage/member'),//get lattest location
			'total_rows'=>$this->db->count_all('pelanggan'),//total berita
			);
		//end of pagination
		$this->load->library('pagination');
		$uri = $this->uri->segment(3);
		if(!$uri){
			$uri = 0;
		}
		$this->pagination->initialize($config);
		$data['title'] = 'Manajemen Member';
		$data['script'] = '<script>$(document).ready(function(){$("#berita").addClass("active")});</script>';
		$data['view'] = $this->m_user->listMember($config['per_page'],$uri);
		$this->displayAdmin('admin/member',$data);
	}

	//olah data admin
	public function admin(){

	}
	//logout
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}

}
