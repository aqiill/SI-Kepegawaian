<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ortu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_ortu");
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

        if ( ! file_exists(APPPATH.'views/admin/ortu/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_ortu->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_ortu->daftar_o($id);
        }

		$data = array(
			'title' 	=> 'Data Orang Tua',
			'isi'		=> 'admin/ortu/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','Orang Tua Harus di isi','required');
		$this->form_validation->set_rules('nama_ortu','Nama Anak Harus di isi','required');
		$this->form_validation->set_rules('tempat_lahir_ortu','Tempat Lahir Harus di isi','required');
		$this->form_validation->set_rules('tgl_lahir_ortu','Tanggal Lahir Harus di isi','required');
		$this->form_validation->set_rules('jk_ortu','Jenis Kelamin Harus di isi','required');
		$this->form_validation->set_rules('pendidikan_ortu','Jenis Kelamin Harus di isi','required');
		$this->form_validation->set_rules('status_hub_ortu','Status Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$nama_ortu			= $this->input->post('nama_ortu');
			$tempat_lahir_ortu	= $this->input->post('tempat_lahir_ortu');
			$tgl_lahir_ortu		= $this->input->post('tgl_lahir_ortu');
			$jk_ortu			= $this->input->post('jk_ortu');
			$pendidikan_ortu	= $this->input->post('pendidikan_ortu');
			$status_hub_ortu	= $this->input->post('status_hub_ortu');
	
			$data = array(
				'id_ortu' 				=> NULL,
				'id_pegawai'			=> $id_pegawai,
				'nama_ortu'				=> $nama_ortu,
				'tempat_lahir_ortu'		=> $tempat_lahir_ortu,
				'tgl_lahir_ortu'		=> $tgl_lahir_ortu,
				'jk_ortu'				=> $jk_ortu,
				'pendidikan_ortu'		=> $pendidikan_ortu,
				'status_hub_ortu'		=> $status_hub_ortu
			);
        
		$this->m_ortu->tambah('tb_ortu',$data);
		redirect(base_url('ortu'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data Orang Tua',
				'isi'		=> 'admin/ortu/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_ortu->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Anak',
			'isi'		=> 'admin/ortu/v_edit',
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
		
		$nama_ortu			= $this->input->post('nama_ortu');
		$tempat_lahir_ortu	= $this->input->post('tempat_lahir_ortu');
		$tgl_lahir_ortu		= $this->input->post('tgl_lahir_ortu');
		$jk_ortu			= $this->input->post('jk_ortu');
		$pendidikan_ortu	= $this->input->post('pendidikan_ortu');
		$status_hub_ortu	= $this->input->post('status_hub_ortu');

		$data = array(
			'id_pegawai'			=> $id_pegawai,
			'nama_ortu'				=> $nama_ortu,
			'tempat_lahir_ortu'		=> $tempat_lahir_ortu,
			'tgl_lahir_ortu'		=> $tgl_lahir_ortu,
			'jk_ortu'				=> $jk_ortu,
			'pendidikan_ortu'		=> $pendidikan_ortu,
			'status_hub_ortu'		=> $status_hub_ortu
		);
		$this->m_ortu->edit('tb_ortu',$data,$id);
		redirect(base_url('ortu'));
	}


	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_ortu->hapus('tb_ortu',$id);
		redirect(base_url('ortu'));
	}
}
