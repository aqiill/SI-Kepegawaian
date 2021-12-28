<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabangdinas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_cabangdinas");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->cek_login();
    }

    public function cek_login(){
    	if ($this->session->userdata('level') !="admin") {
    		$this->session->set_flashdata('gagal','Aktivitas Anda Dicurigai! <i class="fas fa-user-secret"></i>');
    		redirect(base_url('beranda'));
    	}
    }

	public function index($page='v_daftar')
	{

        if ( ! file_exists(APPPATH.'views/admin/cabangdinas/'.$page.'.php'))
        {	
                show_404();
        }

		$data = $this->m_cabangdinas->daftar('tb_cabdin')->result();

		$data = array(
			'title' => 'Cabang Dinas',
			'isi'	=> 'admin/cabangdinas/'.$page,
			'data'	=> $data
		);
		$this->load->view('layout/wrapper',$data);

	}

	public function tambah()
	{
		$this->form_validation->set_rules('cabdin','Nama Harus diisi','required');
		$this->form_validation->set_rules('pimpinan','Pimpinan Harus diisi','required');
		$this->form_validation->set_rules('alamat','Alamat Harus diisi','required');
		$this->form_validation->set_rules('email','Email Harus diisi','required');
		$this->form_validation->set_rules('telp','Telp Harus diisi','required');

		if($this->form_validation->run() != false){			

		$cabdin		= $this->input->post('cabdin');
		$pimpinan	= $this->input->post('pimpinan');
		$alamat		= $this->input->post('alamat');
		$email		= $this->input->post('email');
		$telp		= $this->input->post('telp');
		$website	= $this->input->post('website');

		$data = array(
			'id_cabdin' 		=> NULL,
			'cabdin'			=> $cabdin,
			'pimpinan_cabdin'	=> $pimpinan,
			'alamat_cabdin'		=> $alamat,
			'email_cabdin'		=> $email,
			'telp_cabdin'		=> $telp,
			'website_cabdin'	=> $website
		);

		$this->m_cabangdinas->tambah('tb_cabdin',$data);
		redirect(base_url('cabangdinas'));

		}else{
			$data = array(
				'title' => 'Tambah Cabang Dinas',
				'isi'	=> 'admin/cabangdinas/v_tambah'
			);
			$this->load->view('layout/wrapper',$data);
		}
	}

	public function edit($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$data = $this->m_cabangdinas->daftar_detail('tb_cabdin',$id)->row_array();
		$data = array(
			'title' => 'Edit Cabang Dinas',
			'isi'	=> 'admin/cabangdinas/v_edit',
			'data'	=> $data
		);
		
		$this->load->view('layout/wrapper',$data);
	}

	public function edit_proses($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$cabdin 	= $this->input->post('cabdin');
		$pimpinan 	= $this->input->post('pimpinan');
		$alamat 	= $this->input->post('alamat');
		$email 		= $this->input->post('email');
		$telp 		= $this->input->post('telp');
		$website 	= $this->input->post('website');

		// echo $pimpinan;
		$data = array(
			'cabdin'			=> $cabdin,
			'pimpinan_cabdin'	=> $pimpinan,
			'alamat_cabdin'		=> $alamat,
			'email_cabdin'		=> $email,
			'telp_cabdin'		=> $telp,
			'website_cabdin'	=> $website
		);
		$this->m_cabangdinas->edit('tb_cabdin',$data,$id);
		redirect(base_url('cabangdinas'));
	}


	public function hapus_proses($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);
		
		$this->m_cabangdinas->hapus('tb_cabdin',$id);
		redirect(base_url('cabangdinas'));
	}
}
