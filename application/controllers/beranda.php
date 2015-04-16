<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';


class Beranda extends Base {

	public function __construct(){
		parent::__construct();
        // memanggil model m_beranda

		$this->load->model('m_admin');
		$this->load->library(array('form_validation', 'session'));
	}

	public function index(){
		$this->load->model('m_berita');
		//menyimpan judul halaman dengan variabel title
		$data = array(
			'title'=>'Toko Grosir',
			'sarung'=>$this->m_sarung->daftarSarung(5,0),//10 sarung terbaru
			'berita'=>$this->m_berita->listBerita(4,0),//4 berita terbaru
			);
		//load data pada controller base dan menyisipkan file header.php
		$this->displayUser('user/beranda',$data);
	}

	//register user
	public function register(){
		//is password same
		if($_POST['inputpassword'] == $_POST['inputpassword2']){//password confirmation true
			$data = array(
				'nama_lengkap'=>$_POST['inputnama'],
				'alamat'=>$_POST['inputalamat'],
				'notelp'=>$_POST['inputtelp'],
				'password'=>md5(md5($_POST['inputpassword'])),
				'email'=>$_POST['inputemail'],
				);
		//insert to database
			$this->db->insert('pelanggan',$data);
			echo '
			<script>
			alert("register berhasil\n silahkan login dengan email dan password anda");
			window.location="'.site_url().'";
			</script>
			';
		//echo succes
		}else{
			echo '
			<script>
			alert("password tidak sama");
			window.location="'.site_url().'";
			</script>
			';
		}
	}

	//View Android [Data Sarung]
	public function view_android_sarung() {
		$data['data_sarung'] = $this->m_admin->data_sarung();
		$data['sarung_habis'] = $this->m_admin->data_sarung_habis();
		$this->load->view('android/cek_datasarung', $data);
	}

	//View Android [Data Pemasok]
	public function view_android_pemasok() {
		$data['data_pemasok'] = $this->m_admin->data_pemasok();
		$this->load->view('android/cek_datapemasok', $data);
	}

	//View Android [Data Penjualan]
	public function view_android_penjualan() {
		$data['data_penjualan'] = $this->m_admin->data_penjualan();
		$this->load->view('android/cek_datapenjualan', $data);
	}

}