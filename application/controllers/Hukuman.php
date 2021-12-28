<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hukuman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_hukuman");
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

        if ( ! file_exists(APPPATH.'views/admin/hukuman/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_hukuman->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_hukuman->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Hukuman',
			'isi'		=> 'admin/hukuman/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('masalah','masalah Harus di isi','required');
		$this->form_validation->set_rules('tgl_hukuman','tgl hukuman Harus di isi','required');
		$this->form_validation->set_rules('sanksi','sanksi Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$masalah			= $this->input->post('masalah');
			$tgl_hukuman		= $this->input->post('tgl_hukuman');
			$sanksi				= $this->input->post('sanksi');
	
			$data = array(
				'id_hukuman' 		=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'masalah'			=> $masalah,
				'tgl_hukuman'		=> $tgl_hukuman,
				'sanksi'			=> $sanksi
			);
        
			$this->m_hukuman->tambah('tb_hukuman',$data);
			redirect(base_url('hukuman'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data Hukuman',
				'isi'		=> 'admin/hukuman/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_hukuman->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Hukuman',
			'isi'		=> 'admin/hukuman/v_edit',
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
		
		$masalah			= $this->input->post('masalah');
		$tgl_hukuman		= $this->input->post('tgl_hukuman');
		$sanksi				= $this->input->post('sanksi');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'masalah'			=> $masalah,
			'tgl_hukuman'		=> $tgl_hukuman,
			'sanksi'			=> $sanksi
		);
		$this->m_hukuman->edit('tb_hukuman',$data,$id);
		redirect(base_url('hukuman'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_hukuman->hapus('tb_hukuman',$id);
		redirect(base_url('hukuman'));
	}
}
