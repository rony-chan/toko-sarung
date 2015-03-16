<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';

class Manage extends Base {

	public function __construct(){
		parent::__construct();
		$this->adminOnly();
      // Your own constructor code
	}

	public function index(){
		redirect(site_url('manage/pesanan'));
	}

	//olah data pesanan
	public function pesanan(){
		$data = array(
			'script'=>'<script>$(document).ready(function(){$("#pesanan").addClass("active")});</script>',
			'title'=>'pesanan',
			);
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
