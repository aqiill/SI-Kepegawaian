<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_tunjangan");
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

        if ( ! file_exists(APPPATH.'views/admin/tunjangan/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_tunjangan->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_tunjangan->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Tunjangan',
			'isi'		=> 'admin/tunjangan/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('no_tunjangan','no_tunjangan Harus di isi','required');
		$this->form_validation->set_rules('tgl_tunjangan','tgl_tunjangan Harus di isi','required');
		$this->form_validation->set_rules('jenis_tunjangan','jenis tunjangan Harus di isi','required');
		$this->form_validation->set_rules('tmt_tunjangan','tmt tunjangan Harus di isi','required');
		$this->form_validation->set_rules('perkawinan_dari','perkawinan dari Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$no_tunjangan		= $this->input->post('no_tunjangan');
			$tgl_tunjangan		= $this->input->post('tgl_tunjangan');
			$jenis_tunjangan	= $this->input->post('jenis_tunjangan');
			$tmt_tunjangan		= $this->input->post('tmt_tunjangan');
			$perkawinan_dari	= $this->input->post('perkawinan_dari');
	
			$data = array(
				'id_tunjangan' 		=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'no_tunjangan'		=> $no_tunjangan,
				'tgl_tunjangan'		=> $tgl_tunjangan,
				'jenis_tunjangan'	=> $jenis_tunjangan,
				'tmt_tunjangan'		=> $tmt_tunjangan,
				'perkawinan_dari'	=> $perkawinan_dari
			);
        
			$this->m_tunjangan->tambah('tb_tunjangan',$data);
			redirect(base_url('tunjangan'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data Tunjangan',
				'isi'		=> 'admin/tunjangan/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_tunjangan->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Tunjangan',
			'isi'		=> 'admin/tunjangan/v_edit',
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
		
		$no_tunjangan		= $this->input->post('no_tunjangan');
		$tgl_tunjangan		= $this->input->post('tgl_tunjangan');
		$jenis_tunjangan	= $this->input->post('jenis_tunjangan');
		$tmt_tunjangan		= $this->input->post('tmt_tunjangan');
		$perkawinan_dari	= $this->input->post('perkawinan_dari');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'no_tunjangan'		=> $no_tunjangan,
			'tgl_tunjangan'		=> $tgl_tunjangan,
			'jenis_tunjangan'	=> $jenis_tunjangan,
			'tmt_tunjangan'		=> $tmt_tunjangan,
			'perkawinan_dari'	=> $perkawinan_dari
		);
		$this->m_tunjangan->edit('tb_tunjangan',$data,$id);
		redirect(base_url('tunjangan'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_tunjangan->hapus('tb_tunjangan',$id);
		redirect(base_url('tunjangan'));
	}
}
