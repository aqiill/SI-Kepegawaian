<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sppd extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_sppd");
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

        if ( ! file_exists(APPPATH.'views/admin/sppd/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_sppd->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_sppd->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data SPPD',
			'isi'		=> 'admin/sppd/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('no_sppd','no sppd Harus di isi','required');
		$this->form_validation->set_rules('dari','dari Harus di isi','required');
		$this->form_validation->set_rules('tujuan','tujuan Harus di isi','required');
		$this->form_validation->set_rules('perihal','perihal Harus di isi','required');
		$this->form_validation->set_rules('uang_jalan','uang_jalan Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$no_sppd			= $this->input->post('no_sppd');
			$dari				= $this->input->post('dari');
			$tujuan				= $this->input->post('tujuan');
			$perihal			= $this->input->post('perihal');
			$uang_jalan			= $this->input->post('uang_jalan');
	
			$data = array(
				'id_sppd' 			=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'no_sppd'			=> $no_sppd,
				'dari'				=> $dari,
				'tujuan'			=> $tujuan,
				'perihal'			=> $perihal,
				'uang_jalan'		=> $uang_jalan
			);
        
			$this->m_sppd->tambah('tb_sppd',$data);
			redirect(base_url('sppd'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data SPPD',
				'isi'		=> 'admin/sppd/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_sppd->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data SPPD',
			'isi'		=> 'admin/sppd/v_edit',
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
		
		$no_sppd			= $this->input->post('no_sppd');
		$dari				= $this->input->post('dari');
		$tujuan				= $this->input->post('tujuan');
		$perihal			= $this->input->post('perihal');
		$uang_jalan			= $this->input->post('uang_jalan');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'no_sppd'			=> $no_sppd,
			'dari'				=> $dari,
			'tujuan'			=> $tujuan,
			'perihal'			=> $perihal,
			'uang_jalan'		=> $uang_jalan
		);
		$this->m_sppd->edit('tb_sppd',$data,$id);
		redirect(base_url('sppd'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_sppd->hapus('tb_sppd',$id);
		redirect(base_url('sppd'));
	}
}
