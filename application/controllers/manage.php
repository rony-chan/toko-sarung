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
	//cari pesanan
	public function caripesanan(){
		$noref = $_POST['noref'];
		$this->db->where('noref',$noref);
		echo $noref;
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
	//manage detail pesanan
	public function detailpesanan()
	{
		$this->load->model('m_order');
		$idpesanan = $this->uri->segment(3);
		$data = array
		(
		'title'=>'Detail Pesanan',
		'script'=>'<script>$(document).ready(function(){$("#selesai").addClass("active");$("#pesanan").addClass("active")});</script>',
		'detail'=>$this->m_order->detailOrder($idpesanan),
		'item'=>$this->m_order->getOrderItem($idpesanan)
		);
		$this->displayAdmin('admin/detailpesanan',$data);
	}
	//olah data sarung
	public function sarung(){
		//start pagination
		$config = array(
			'per_page'=>20,
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
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '5000';
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
			//cek apakah ada duplikasi nama sarung
			if($this->m_sarung->foundName($nama)){//jika nama ditemukan
				echo '
				<script>
					alert("duplikat nama sarung");
					window.location="'.site_url('manage/sarung').'";
				</script>
				';
			}else{
				if($this->db->insert('sarung',$newsarung)){//insert new sarung data to database
			//get last id_sarung
					$lastid = $this->m_sarung->getLastIdSarung();
			//insert gambar sarung
					$gambar = array(
						'id_sarung'=>$lastid,
						'gambar'=>$pp
						);
			$this->db->insert('gambar',$gambar);//insert gambar to database
			//end of add to database
			echo '
			<script>
				alert("tambah sarung berhasil");
				window.location="'.site_url('manage/sarung').'";
			</script>
			';
		}else{
				//end of add to database
			echo '
			<script>
				alert("duplikat nama sarung");
				window.location="'.site_url('manage/sarung').'";
			</script>
			';
		}
	}
}
}
	//delete sarung
public function deleteSarung(){
	$id = $this->uri->segment(3);
	$data = array('id_sarung'=>$id);
	$this->db->delete('sarung',$data);
	$this->db->delete('gambar',$data);
	echo '
	<script>
		alert("Hapus Sarung Berhasil");
		window.location="'.site_url('manage/sarung').'";
	</script>
	';
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
			echo '
			<script>
				alert("Edit Sarung Berhasil");
				window.location="'.site_url('manage/sarung').'";
			</script>
			';
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
		echo '
		<script>
			alert("Tambah Berita Berhasil");
			window.location="'.site_url('manage/berita').'";
		</script>
		';
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
			echo '
			<script>
				alert("Edit Berita Berhasil");
				window.location="'.site_url('manage/berita').'";
			</script>
			';
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
		redirect(site_url('manage/berita'));
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
		$data['script'] = '<script>$(document).ready(function(){$("#member").addClass("active")});</script>';
		$data['view'] = $this->m_user->listMember($config['per_page'],$uri);
		$this->displayAdmin('admin/member',$data);
	}

	//olah data admin
	public function admin(){
		if(!empty($_POST)){//process form
			$data = array(
				'nama_lengkap'=>$_POST['inputnama'],
				'alamat'=>$_POST['inputalamat'],
				'notelp'=>$_POST['inputnotelp'],
				'username'=>$_POST['inputusername'],
				'password'=>md5(md5($_POST['inputpassword']))
				);
			$this->db->insert('admin',$data);
			redirect($this->agent->referrer());//kembali ke halaman utama
		}else{//display
			$this->load->library('pagination');
			$config = array(
				'per_page'=>6,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('manage/admin'),//get lattest location
				'total_rows'=>$this->db->count_all('admin'),//total berita
				);
			$uri = $this->uri->segment(3);
			if(!$uri){
				$uri = 0;
			}
			$this->pagination->initialize($config);
			$data = array(
				'title'=>'Manajemen Admin',
				'script'=>'<script>$(document).ready(function(){$("#admin").addClass("active")});</script>',
				'view'=>$this->m_admin->listAdmin($config['per_page'],$uri),
				);
			$this->displayAdmin('admin/admin',$data);
		}
	}
	//hapus admin
	public function deleteadmin(){
		$id=$this->uri->segment(3);
		$this->db->where('id_admin',$id);
		$this->db->delete('admin');
		redirect($this->agent->referrer());//kembali ke halaman sebelumnya
	}
	//edit admin
	public function editadmin(){
		if(!empty($_POST)){
			if(!empty($_POST['inputpassword'])){
				$password = md5(md5($_POST['inputpassword']));
			}else{
				$password = $_POST['oldpassword'];
			}
			//update database
			$this->db->where('id_admin',$this->uri->segment(3));
			$data = array(
				'nama_lengkap'=>$_POST['inputnama'],
				'alamat'=>$_POST['inputalamat'],
				'notelp'=>$_POST['inputnotelp'],
				'username'=>$_POST['inputusername'],
				'password'=>$password
				);
			$this->db->update('admin',$data);
			redirect(site_url('manage/admin'));
		}else{
			$id = $this->uri->segment(3);//get id admin
			$data = array(
				'title'=>'Edit Data Admin',
				'script'=>'<script>$(document).ready(function(){$("#admin").addClass("active")});</script>',
				'view'=>$this->m_admin->detailAdmin($id),
				);
			$this->displayAdmin('admin/editadmin',$data);
		}
	}
	//manajemen pemasok
	public function pemasok(){
		$this->load->model(array('m_pasokan'));
		if(!empty($_POST)){//post

		}else{//only show
			//start pagination
			$config = array(
				'per_page'=>20,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('manage/pemasok'),//get lattest location
				'total_rows'=>$this->db->count_all('pemasok'),//total berita
				);
			//end of pagination
			$this->load->library('pagination');
			$uri = $this->uri->segment(3);
			if(!$uri){
				$uri = 0;
			}
			$data = array(
				'title'=>'Edit Data Admin',
				'script'=>'<script>$(document).ready(function(){$("#pemasok").addClass("active");$("#tabpemasok").addClass("active")});</script>',
				'view'=>$this->m_pasokan->getPemasok($config['per_page'],$uri),
				);
			$this->displayAdmin('admin/pemasok',$data);
		}
	}
	//action untuk pemasok
	public function pemasokaction(){
		switch ($_GET['act']) {
			case 'add':
			$merek = $_POST['mereksarung'];
			$data = array
			(
				'nama_pemasok'=>$_POST['inputnama'],
				'alamat_pemasok'=>$_POST['inputalamat'],
				'no_telp'=>$_POST['inputtelp'],
				);
				if($this->db->insert('pemasok',$data)){//memasukan data pemasok baru
					//mendapatkan id pemasok terakhir
					$sqlpemasok = "SELECT * FROM pemasok WHERE nama_pemasok = '".$_POST['inputnama']."'";
					$querypemasok = $this->db->query($sqlpemasok);
					$querypemasok = $querypemasok->row_array();
					$idpemasok = $querypemasok['id_pemasok'];
					//memasukan data merek sarung
					$sqlsarung = "INSERT INTO sarung_merk(id_pemasok,merek) VALUES($idpemasok,'$merek')";
					$querysarung = $this->db->query($sqlsarung);
				}
				break;
				case 'edit':
				$id = $_GET['id'];
				$this->db->where('id_pemasok',$id);
				$data = array
				(
					'nama_pemasok'=>$_POST['inputnama'],
					'alamat_pemasok'=>$_POST['inputalamat'],
					'no_telp'=>$_POST['inputtelp'],
					);
			$this->db->update('pemasok',$data);//update database
			$data = array('merek'=>$_POST['inputmerk']);
			$this->db->where('id_pemasok',$id);
			$this->db->update('sarung_merk',$data);
			break;
			case 'delete':
			$id = $_GET['id'];
			$this->db->where('id_pemasok',$id);
			$this->db->delete('pemasok');//delte pemaok
			break;
		}
		echo '
		<script>
			alert("Olah Pemasok Berhasil");
			window.location="'.$this->agent->referrer().'";
		</script>
		';
	}
	//manajemen pasokan
	public function pasokan(){
		$this->load->library('cart');
		$this->load->model(array('m_pasokan'));
		if(!empty($_POST)){//post

		}else{//only show
			//start pagination
			$config = array(
				'per_page'=>20,
				'uri_segment'=>3,
				'num_link'=>4,
				'base_url'=>site_url('manage/pasokan'),//get lattest location
				'total_rows'=>$this->db->count_all('pasokan'),//total berita
				);
			//end of pagination
			$this->load->library('pagination');
			$uri = $this->uri->segment(3);
			if(!$uri){
				$uri = 0;
			}
			$data = array(
				'title'=>'Edit Data Admin',
				'script'=>'<script>$(document).ready(function(){$("#pemasok").addClass("active");$("#tabpasokan").addClass("active")});</script>',
				'view'=>$this->m_pasokan->getPasokan($config['per_page'],$uri),
				);
			$this->displayAdmin('admin/pasokan',$data);
		}
	}
	//menampilkan pasokan
	public function pasokanitem(){
		$this->load->model(array('m_pasokan'));
		$data = array
		(
			'title'=>'Pasokan Item',
			);
	}
	//tambah pasokan
	public function tambahpasokan(){
		$this->load->model(array('m_pasokan'));
		$this->load->library('cart');
		$data = array
		(
			'title'=>'Tambah Pasokan',
			'script'=>'<script>$(document).ready(function(){$("#pemasok").addClass("active");$("#tabpasokan").addClass("active")});</script>',
			'pemasok'=>$this->m_pasokan->getPemasok(10,0),
			);
		$this->displayAdmin('admin/tambahpasokan',$data);//view untuk admin tambah pasokan
	}
	//pasokan cart
	public function pasokancart(){
		$this->load->model(array('m_sarung'));
		$this->load->library('cart');
		//detail sarung berdasarkan id sarung
		$sarung = $this->m_sarung->detailSarung($_POST['idsarung']);
		//memasukan data ke cart
		$insert = array(
			'id'=>$this->input->post('idsarung'), //id barang untuk dimasukan kedalam session
			'qty'=>$this->input->post('jumlah'),//jumlah barang yang dibeli
			'price'=>$sarung['harga'],//harga jual barang = (HB*10%) + HB
			'merk'=>$sarung['merek'],//nama barang yang dimasukan
			'name'=>$sarung['nama'],//nama barang yang dimasukan
			);
		$this->cart->insert($insert);//memasukan ke cart
		redirect($this->agent->referrer());
	}
	//hapus cart item
	public function resetcart(){
		$this->load->library('cart');
		$this->cart->destroy();
		redirect($this->agent->referrer());//kambali ke halaman sebelumnya
	}
	//memasukan cart item ke stok
	public function carttodb(){
		$this->load->model(array('m_sarung','m_pasokan'));
		$this->load->library('cart');
		//mendapatkan data transaksi
		$total = $this->cart->total();
		//insert data pasokan
		$now = date('Y-m-d H:i:s');
		$idpemasok = $_POST['idpemasok'];
		$sql = "INSERT INTO pasokan(id_pemasok,tanggal) VALUES($idpemasok,'$now')";
		$this->db->query($sql);
		//mendapatkan id terakhir pasokan
		$latestpasokan = $this->m_pasokan->latestPasokan();
		//memasukan item pasokan
		foreach($this->cart->contents() as $item):
			$data =array
		(
			'id_pasokan'=>$latestpasokan['id_pasokan'],
			'id_sarung'=>$item['id'],
			'jumlah'=>$item['qty'],
			'harga'=>$item['price'],
			'subtotal'=>$item['price']*$item['qty'],
			);
		//memasukan ke pasokan_item
		$this->db->insert('pasokan_item',$data);
		endforeach;
		$this->cart->destroy();//reset cart
		redirect(site_url('manage/pasokan'));
	}
	//lihat detail pasokan
	public function detailpasokan(){
		$this->load->model('m_pasokan');
		$id = $this->uri->segment(3);
		$data = array
		(
			'title'=>'Detail Pasokan',
			'view'=>$this->m_pasokan->detailPasokan($id),
			'item'=>$this->m_pasokan->itemPasokan($id),
			);
		$this->displayAdmin('admin/detailpasokan',$data);//view untuk admin tambah pasokan
	}
	//hapus pasokan
	public function hapuspasokan(){
		$id = $this->uri->segment(3);
		$this->db->where('id_pasokan',$id);
		$this->db->delete('pasokan');
		redirect($this->agent->referrer());;
	}
	//logout
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}

}
