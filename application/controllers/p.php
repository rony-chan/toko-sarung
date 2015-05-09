<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';


class P extends Base {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_order');
		// Your own constructor code
	}

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
		//cek yang lewat jatuh tempo
		$jatuhtempo = $this->m_order->cekOrder();
		if(!empty($jatuhtempo))
		{
			foreach($jatuhtempo as $jt):
				$this->db->where('id_pesan',$jt['id_pesan']);
				$this->db->update('pesan',array('status'=>'Batal','barang'=>'batal'));//ubah status transaksi menjadi batal
				//mengembalikan stok
				$detail = $this->m_order->getOrderItem($jt['id_order']);
				foreach($detail as $d):
					$sql = "UPDATE sarung SET jumlah = jumlah + ".$d['jumlah']." WHERE id_sarung = ".$d['id_sarung'];
					$this->db->query($sql);
				endforeach;
			endforeach;
		}
		//end of cek jatuh tempo
		if(!empty($this->uri->segment(4))){//lihat detai sarung
			$idsarung = $this->uri->segment(4);
			$data = array(
				'view'=>$this->m_sarung->detailSarung($idsarung),
				'gambar'=>$this->m_sarung->gambarBySarung($idsarung),//menampilkan semua gambar berdasarkan id sarung
				'sarung'=>$this->m_sarung->daftarSarung(5,0),//5 sarung terbaru
				);
			$data['title'] = $data['view']['nama'];
			$this->displayUser('user/detailSarung',$data);
		}else{//lihat daftar sarung
			//pagination setup
			$config = array(
				'per_page'=>5,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('p/sarung'),//get lattest location
				'total_rows'=>$this->db->count_all('sarung'),//total berita on database
				);
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$uri = $this->uri->segment(3);
			if(!$uri && !is_numeric($uri)){
				$uri = 0;
			}
			//$this->pagination->create_links();
			// end of pagination setup
			$data = array(
				'title'=>'Semua Merek',
				'sarung'=>$this->m_sarung->daftarSarung($config['per_page'],$uri),
				);
			$this->displayUser('user/listSarung',$data);
		}
	}

	//merek
	public function merek(){
		if(empty($this->uri->segment(3))){
			redirect(site_url('p/sarung'));
		}else{
			$idmerek = $this->uri->segment(3);
			//start pagination
			$this->db->where('id_merk',$idmerek);
			$config = array(
				'per_page'=>6,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('p/merek'),//get lattest location
				'total_rows'=>$this->db->count_all_results('sarung'),//total berita on database
				);
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$uri = $this->uri->segment(4);
			if(!$uri){
				$uri = 0;
			}
			//end of pagination
			$data = array(
				'sarung'=> $this->m_sarung->daftarSarungByMerek($config['per_page'],$uri,$idmerek),
				);
			$data['title'] = $this->m_sarung->merek($idmerek);
			$this->displayUser('user/listSarung',$data);
		}
	}
	//pencarian sarung
	public function cari(){
		if(!empty($_GET['q'])){
			redirect(site_url('p/cari/'.$_GET['q']));
		} else{
			$q = $this->uri->segment(3);
			$keyword = str_replace('%20', ' ', $q);
			//start pagination
			$this->db->like('nama',$keyword);
			$this->db->or_like('deskripsi',$keyword);
			$config = array(
				'per_page'=>6,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('p/cari'),//get lattest location
				'total_rows'=>$this->db->count_all_results('sarung'),//total berita on database
				);
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$uri = $this->uri->segment(4);
			if(!$uri){
				$uri = 0;
			}
			//end of pagination
			$data = array(
				'title' => $keyword,
				'sarung' =>$this->m_sarung->cariSarung($config['per_page'],$uri,$keyword),
				'keyword'=>$keyword
				);
			$this->displayUser('user/listSarung',$data);
		}
	}
	//login user
	public function login(){
		$this->load->library('form_validation');
		//set rules
		$this->form_validation->set_rules('input_email','Email','required|trim|callback_validate_credentials');//rules for email
		$this->form_validation->set_rules('input_password','Password','trim|required');//rules for password
		if($this->form_validation->run()){//form validation is valid
			$email = $_POST['input_email'];
			$password = md5(md5($_POST['input_password']));
			//get al userdata
			$userdata  = $this->m_user->can_login($email,$password);
			//cek jika data pelanggan ditemukan
			if(!empty($userdata)){
				$sessiondata['userlogin'] = $userdata;
				//set session
				$this->session->set_userdata($sessiondata);
				redirect(site_url().'?success=login success');
			}else{
				$data['title'] = 'Login Error';
				$data['script'] = '<script>$("#slider1_container").hide();</script>';
				$data['error'] = 'email dan password tidak cucok';
				$this->displayUser('user/loginerror',$data);
			}
		}else{
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
		if($this->m_user->can_login($username,$password)){
			return true;
		}else{
			$this->form_validation->set_message('validate_credentials','email dan password tidak cocok');
			return false;
		}
	}
	//edit profile
	public function editprofile(){
		if(!empty($_POST)){
			if(!empty($_POST['inputpassword'])){//jika update password
				$pasword = md5(md5($_POST['inputpassword']));
			}else{//tidak update password
				$password = $_POST['oldpassword'];
			}
			//update db
			$this->db->where('id_pelanggan',$_POST['id']);
			$data = array(
				'nama_lengkap'=>$_POST['inputnama'],
				'alamat'=>$_POST['inputalamat'],
				'notelp'=>$_POST['inputtelp'],
				'password'=>$password,
				'email'=>$_POST['inputemail'],
				);
			$this->db->update('pelanggan',$data);
			echo '
			<script>
			alert("update profile berhasil");
				window.location="'.$this->agent->referrer().'";
			</script>
			';
		}
		$data = array(
			'title'=>'Edit Profile',
			'view'=>$this->m_user->userbyId($this->session->userdata['userlogin'][0]['id_pelanggan']),
			);
		$this->displayUser('user/editprofile',$data);
	}
	//logout
	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url(),'refresh');
	}

}
