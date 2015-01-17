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
		$data = array(
			'title'=>'hai',
			'sarung'=>$this->m_sarung->daftarSarung(10,0),//10 sarung terbaru
			);
		//load data pada controller base dan menyisipkan file header.php
		$this->displayUser('user/beranda',$data);
	}
	

}
?>