<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_pangkatgolongan");
        $this->load->model("m_unitkerja");
        $this->load->model("m_sertifikasi");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->cek_login();
    }

    public function cek_login(){
    	if ($this->session->userdata('level') =="guru") {
    		$this->session->set_flashdata('gagal','Aktivitas Anda Dicurigai! <i class="fas fa-user-secret"></i>');
    		redirect(base_url('datapegawai'));
    	}
    }

	public function index()
	{
		if ($this->session->userdata('level')=='admin'){
			$pangkatgolongan 	= $this->m_pangkatgolongan->rekapitulasi()->result();
			$pendidikan 		= $this->m_datapegawai->rekapitulasi()->result();
			$unitkerja 			= $this->m_unitkerja->rekapitulasi()->result();
			$pnssertifikasi 	= $this->m_sertifikasi->rekapitulasi()->result();
			$pns 				= $this->m_datapegawai->rekapitulasi_pns()->result();
			$honor 				= $this->m_datapegawai->rekapitulasi_honor()->result();
		}
		elseif ($this->session->userdata('level')=='operator'){
			$id = $this->session->userdata('id_unitkerja');

			$pangkatgolongan 	= $this->m_pangkatgolongan->rekapitulasi_o($id)->result();
			$pendidikan 		= $this->m_datapegawai->rekapitulasi_o($id)->result();
			$unitkerja 			= $this->m_unitkerja->rekapitulasi_o($id)->result();
			$pnssertifikasi 	= $this->m_sertifikasi->rekapitulasi_o($id)->result();
			$pns 				= $this->m_datapegawai->rekapitulasi_pns_o($id)->result();
			$honor 				= $this->m_datapegawai->rekapitulasi_honor_o($id)->result();
		}

		$data = array(
			'title' 				=> 'Data Rekapitulasi',
			'isi'					=> 'admin/rekapitulasi/v_daftar',
			'pangkatgolongan'		=> $pangkatgolongan,
			'pendidikan'			=> $pendidikan,
			'unitkerja'				=> $unitkerja,
			'pnssertifikasi'		=> $pnssertifikasi,
			'pns'					=> $pns,
			'honor'					=> $honor,
		);

		// echo "<pre>";
		// print_r($honor);
		// echo "</pre>";
		$this->load->view('layout/wrapper.php',$data);

	}

}
