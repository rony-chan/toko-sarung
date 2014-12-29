<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';


class Beranda extends Base {

	public function __construct(){
		parent::__construct();
        // memanggil model m_beranda

		$this->load->library(array('form_validation', 'session'));
	}

	public function index(){

		//menyimpan judul halaman dengan variabel title
		$data['title']= 'Selamat Datang';
		//load data pada controller base dan menyisipkan file header.php
		$this->header('base/header', $data);
		//load modal
		$this->load->view('user/beranda');
		//load data pada controller base dan menyisipkan file footer.php
		$this->footer('base/footer', $data);
	}
	

}
?>