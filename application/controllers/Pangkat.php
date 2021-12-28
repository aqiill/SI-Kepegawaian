<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_pangkat");
        $this->load->model("m_pangkatgolongan");
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

        if ( ! file_exists(APPPATH.'views/admin/pangkat/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_pangkat->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_pangkat->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Pangkat',
			'isi'		=> 'admin/pangkat/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('pangkat','Pangkat Harus di isi','required');
		$this->form_validation->set_rules('tmt_pangkat','tmt pangkat Sekolah Harus di isi','required');
		$this->form_validation->set_rules('pengesah_sk','pengesah sk Sekolah Harus di isi','required');
		$this->form_validation->set_rules('no_sk','no sk  Harus di isi','required');
		$this->form_validation->set_rules('tgl_sk','tgl sk  Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$pangkat			= $this->input->post('pangkat');
			$tmt_pangkat		= $this->input->post('tmt_pangkat');
			$pengesah_sk		= $this->input->post('pengesah_sk');
			$no_sk				= $this->input->post('no_sk');
			$tgl_sk				= $this->input->post('tgl_sk');
	
			$data = array(
				'id_pangkat' 		=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'pangkat'			=> $pangkat,
				'tmt_pangkat'		=> $tmt_pangkat,
				'pengesah_sk'		=> $pengesah_sk,
				'no_sk'				=> $no_sk,
				'tgl_sk'			=> $tgl_sk
			);
        
			$this->m_pangkat->tambah('tb_pangkat',$data);
			redirect(base_url('pangkat'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$pangkat = $this->m_pangkatgolongan->daftar('tb_pangkatgolongan')->result();

			$data = array(
				'title' 	=> 'Tambah Data Pangkat',
				'isi'		=> 'admin/pangkat/v_tambah',
				'pegawai'	=> $pegawai,
				'pangkat'	=> $pangkat
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_pangkat->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$pangkat = $this->m_pangkatgolongan->daftar('tb_pangkatgolongan')->result();

		$data = array(
			'title' 	=> 'Edit Data Pangkat',
			'isi'		=> 'admin/pangkat/v_edit',
			'pegawai'	=> $pegawai,
			'data'		=> $data,
			'pangkat'	=> $pangkat
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
		
		$pangkat			= $this->input->post('pangkat');
		$tmt_pangkat		= $this->input->post('tmt_pangkat');
		$pengesah_sk		= $this->input->post('pengesah_sk');
		$no_sk				= $this->input->post('no_sk');
		$tgl_sk				= $this->input->post('tgl_sk');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'pangkat'			=> $pangkat,
			'tmt_pangkat'		=> $tmt_pangkat,
			'pengesah_sk'		=> $pengesah_sk,
			'no_sk'				=> $no_sk,
			'tgl_sk'			=> $tgl_sk
		);
		$this->m_pangkat->edit('tb_pangkat',$data,$id);
		redirect(base_url('pangkat'));
	}


	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_pangkat->hapus('tb_pangkat',$id);
		redirect(base_url('pangkat'));
	}
}
