<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_anak");
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

        if ( ! file_exists(APPPATH.'views/admin/anak/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_anak->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_anak->daftar_o($id);
        }


		$data = array(
			'title' 	=> 'Data Anak',
			'isi'		=> 'admin/anak/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','Orang Tua Harus di isi','required');
		$this->form_validation->set_rules('nama_anak','Nama Anak Harus di isi','required');
		$this->form_validation->set_rules('tempat_lahir_anak','Tempat Lahir Harus di isi','required');
		$this->form_validation->set_rules('tgl_lahir_anak','Tanggal Lahir Harus di isi','required');
		$this->form_validation->set_rules('jk_anak','Jenis Kelamin Harus di isi','required');
		$this->form_validation->set_rules('status_hub_anak','Status Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$nama_anak			= $this->input->post('nama_anak');
			$tempat_lahir_anak	= $this->input->post('tempat_lahir_anak');
			$tgl_lahir_anak		= $this->input->post('tgl_lahir_anak');
			$jk_anak			= $this->input->post('jk_anak');
			$pendidikan_anak	= $this->input->post('pendidikan_anak');
			$pekerjaan_anak		= $this->input->post('pekerjaan_anak');
			$status_hub_anak	= $this->input->post('status_hub_anak');
	
			$data = array(
				'id_anak' 				=> NULL,
				'id_pegawai'			=> $id_pegawai,
				'nama_anak'				=> $nama_anak,
				'tempat_lahir_anak'		=> $tempat_lahir_anak,
				'tgl_lahir_anak'		=> $tgl_lahir_anak,
				'jk_anak'				=> $jk_anak,
				'pendidikan_anak'		=> $pendidikan_anak,
				'pekerjaan_anak'		=> $pekerjaan_anak,
				'status_hub_anak'		=> $status_hub_anak
			);
        
		$this->m_anak->tambah('tb_anak',$data);
		redirect(base_url('anak'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data Anak',
				'isi'		=> 'admin/anak/v_tambah',
				'pegawai'	=> $pegawai
			);

			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_anak->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Anak',
			'isi'		=> 'admin/anak/v_edit',
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
		
		$nama_anak			= $this->input->post('nama_anak');
		$tempat_lahir_anak	= $this->input->post('tempat_lahir_anak');
		$tgl_lahir_anak		= $this->input->post('tgl_lahir_anak');
		$jk_anak			= $this->input->post('jk_anak');
		$pendidikan_anak	= $this->input->post('pendidikan_anak');
		$pekerjaan_anak		= $this->input->post('pekerjaan_anak');
		$status_hub_anak	= $this->input->post('status_hub_anak');

		$data = array(
			'id_pegawai'			=> $id_pegawai,
			'nama_anak'				=> $nama_anak,
			'tempat_lahir_anak'		=> $tempat_lahir_anak,
			'tgl_lahir_anak'		=> $tgl_lahir_anak,
			'jk_anak'				=> $jk_anak,
			'pendidikan_anak'		=> $pendidikan_anak,
			'pekerjaan_anak'		=> $pekerjaan_anak,
			'status_hub_anak'		=> $status_hub_anak
		);
		$this->m_anak->edit('tb_anak',$data,$id);
		redirect(base_url('anak'));
	}


	public function hapus_proses($id){
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_anak->hapus('tb_anak',$id);
		redirect(base_url('anak'));
	}
}
