<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghargaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_penghargaan");
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

	public function index($page='v_daftar')
	{

        if ( ! file_exists(APPPATH.'views/admin/penghargaan/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_penghargaan->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_penghargaan->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Penghargaan',
			'isi'		=> 'admin/penghargaan/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('perihal','perihal Harus di isi','required');
		$this->form_validation->set_rules('tingkat','tingkat Harus di isi','required');
		$this->form_validation->set_rules('ranking','ranking Harus di isi','required');
		$this->form_validation->set_rules('tgl_penghargaan','tgl_penghargaan Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$perihal			= $this->input->post('perihal');
			$tingkat			= $this->input->post('tingkat');
			$ranking			= $this->input->post('ranking');
			$tgl_penghargaan	= $this->input->post('tgl_penghargaan');
	
			$data = array(
				'id_penghargaan' 	=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'perihal'			=> $perihal,
				'tingkat'			=> $tingkat,
				'ranking'			=> $ranking,
				'tgl_penghargaan'	=> $tgl_penghargaan
			);
        
			$this->m_penghargaan->tambah('tb_penghargaan',$data);
			redirect(base_url('penghargaan'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data Penghargaan',
				'isi'		=> 'admin/penghargaan/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_penghargaan->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Penghargaan',
			'isi'		=> 'admin/penghargaan/v_edit',
			'pegawai'	=> $pegawai,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);		

	}

	public function edit_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$id_pegawai			= $this->input->post('id_pegawai');
		$id_pegawai 		= base64_decode($id_pegawai);
		$id_pegawai 		= (($id_pegawai/8/42*2)*2);
		
		$perihal			= $this->input->post('perihal');
		$tingkat			= $this->input->post('tingkat');
		$ranking			= $this->input->post('ranking');
		$tgl_penghargaan	= $this->input->post('tgl_penghargaan');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'perihal'			=> $perihal,
			'tingkat'			=> $tingkat,
			'ranking'			=> $ranking,
			'tgl_penghargaan'	=> $tgl_penghargaan
		);
		$this->m_penghargaan->edit('tb_penghargaan',$data,$id);
		redirect(base_url('penghargaan'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_penghargaan->hapus('tb_penghargaan',$id);
		redirect(base_url('penghargaan'));
	}
}
