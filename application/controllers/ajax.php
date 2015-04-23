<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//manage page for admin after login
//memanggil class base pada controller/base.php
require_once 'application/controllers/base.php';

class AJax extends Base {
	function getSarungByPemasok(){
		$idpemasok = $_POST['idpemasok'];
		//get merek by id pemasok
		$merek = $this->m_sarung->merekByPemasok($idpemasok);
		$idmerek = $merek['id_sarung_merk'];
		//show all sarung by  merek
		$sarung = $this->m_sarung->daftarSarungByMerek(10,0,$idmerek);
		echo '<select name="idsarung" class="form-control">';
		foreach($sarung as $s):
			echo '<option value="'.$s['id_sarung'].'">'.$s['nama'].'</option>';
		endforeach;
		echo '</select>';
	}
}