<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_laporan");
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

	public function pensiun($page='v_pensiun')
	{

        if ( ! file_exists(APPPATH.'views/admin/laporan/'.$page.'.php'))
        {	
                show_404();
        }

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}
		// $pegawai = $this->m_datapegawai->daftar();

		$data = array(
			'title' 	=> 'Data Laporan Pensiun',
			'isi'		=> 'admin/laporan/'.$page,
			'pegawai'		=> $pegawai
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function bazeting($page='v_bazeting')
	{

        if ( ! file_exists(APPPATH.'views/admin/laporan/'.$page.'.php'))
        {	
                show_404();
        }

		if ($this->session->userdata('level')=='admin') {
			$bazeting = $this->m_laporan->bazeting();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$bazeting = $this->m_laporan->bazeting_o($id);
		}
		

		$data = array(
			'title' 	=> 'Data Laporan Bazeting',
			'isi'		=> 'admin/laporan/'.$page,
			'bazeting'	=> $bazeting
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function nominatif($page='v_nominatif')
	{

        if ( ! file_exists(APPPATH.'views/admin/laporan/'.$page.'.php'))
        {	
                show_404();
        }

		if ($this->session->userdata('level')=='admin') {
			$nominatif = $this->m_laporan->bazeting();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$nominatif = $this->m_laporan->bazeting_o($id);
		}
		

		$data = array(
			'title' 	=> 'Data Laporan Nominatif',
			'isi'		=> 'admin/laporan/'.$page,
			'nominatif'	=> $nominatif
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function duk($page='v_duk')
	{

        if ( ! file_exists(APPPATH.'views/admin/laporan/'.$page.'.php'))
        {	
                show_404();
        }

		
		if ($this->session->userdata('level')=='admin') {
			$nominatif = $this->m_laporan->bazeting();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$nominatif = $this->m_laporan->bazeting_o($id);
		}
		

		$data = array(
			'title' 	=> 'Data Laporan DUK',
			'isi'		=> 'admin/laporan/'.$page,
			'nominatif'	=> $nominatif
		);

		$this->load->view('layout/wrapper.php',$data);


	}
}
