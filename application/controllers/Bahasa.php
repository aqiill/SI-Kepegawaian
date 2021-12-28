<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_bahasa");
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

        if ( ! file_exists(APPPATH.'views/admin/bahasa/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_bahasa->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_bahasa->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Bahasa',
			'isi'		=> 'admin/bahasa/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('jenis_bahasa','Jenis Sekolah Harus di isi','required');
		$this->form_validation->set_rules('bahasa','Bahasa Harus di isi','required');
		$this->form_validation->set_rules('kemampuan_bicara','Tingkat Sekolah Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$jenis_bahasa		= $this->input->post('jenis_bahasa');
			$bahasa				= $this->input->post('bahasa');
			$kemampuan_bicara	= $this->input->post('kemampuan_bicara');
	
			$data = array(
				'id_bahasa' 		=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'jenis_bahasa'		=> $jenis_bahasa,
				'bahasa'			=> $bahasa,
				'kemampuan_bicara'	=> $kemampuan_bicara
			);
        
			$this->m_bahasa->tambah('tb_bahasa',$data);
			redirect(base_url('bahasa'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data Bahasa',
				'isi'		=> 'admin/bahasa/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_bahasa->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Bahasa',
			'isi'		=> 'admin/bahasa/v_edit',
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
		
		$jenis_bahasa		= $this->input->post('jenis_bahasa');
		$bahasa				= $this->input->post('bahasa');
		$kemampuan_bicara	= $this->input->post('kemampuan_bicara');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'jenis_bahasa'		=> $jenis_bahasa,
			'bahasa'			=> $bahasa,
			'kemampuan_bicara'	=> $kemampuan_bicara
		);
		$this->m_bahasa->edit('tb_bahasa',$data,$id);
		redirect(base_url('bahasa'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_bahasa->hapus('tb_bahasa',$id);
		redirect(base_url('bahasa'));
	}
}
