<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';


class Admin extends Base {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin');
	}

	//login page
	public function index(){
		$data = array(
			'title'=>'Admin Login',
			'script'=>'<script type="text/javascript">$(document).ready(function(){$("#login-form").toggle("slow");});</script>',
			);
		$this->displayAdmin('admin/login',$data);
	}
	//admin login and validation
	public function login(){
		$this->load->library('form_validation');
		//set rules
		$this->form_validation->set_rules('input_username','Username','required|trim|callback_validate_credentials');//rules for email
		$this->form_validation->set_rules('input_password','Password','trim|required');//rules for password
		if($this->form_validation->run()){//form validation is valid
			$username = $_POST['input_username'];
			$password = md5(md5($_POST['input_password']));
			//get al userdata
			$userdata  = $this->m_admin->can_login($username,$password);
			//cek jika data pelanggan ditemukan
			if(!empty($userdata)){
				$sessiondata['adminlogin'] = $userdata;
				//set session
				$this->session->set_userdata($sessiondata);
				redirect(site_url('manage').'?success=login success');
			}else{
				echo 'can\'t login';
			}
		}else{
			redirect(site_url('admin?error=password dan username tidak cocok'));
			$data['title'] = 'Login Error';
			$data['script'] = '<script>$("#slider1_container").hide();</script>';
			$data['error'] = validation_errors();
			$this->displayUser('user/loginerror',$data);
		}
	}
	//login validation credentials
	public function validate_credentials(){
		$username = $this->input->post('input_username');
		$password = md5(md5($this->input->post('input_password')));
		//cek apakah tersedia di database
		if($this->m_admin->can_login($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials','email dan password tidak cocok');
			return false;
		}
	}
	//logout
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url(),'refresh');
	}
}