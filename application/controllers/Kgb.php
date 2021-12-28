<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kgb extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_kgb");
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

        if ( ! file_exists(APPPATH.'views/admin/kgb/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_kgb->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_kgb->daftar_o($id);
        }
				

		$data = array(
			'title' 	=> 'Data KGB',
			'isi'		=> 'admin/kgb/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('golongan','golongan Harus di isi','required');
		$this->form_validation->set_rules('tmt_kgb','tmt kgb Harus di isi','required');
		$this->form_validation->set_rules('gaji','gaji Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$golongan			= $this->input->post('golongan');
			$tmt_kgb			= $this->input->post('tmt_kgb');
			$gaji				= $this->input->post('gaji');
	
			$data = array(
				'id_kgb' 			=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'golongan'			=> $golongan,
				'tmt_kgb'			=> $tmt_kgb,
				'gaji'				=> $gaji
			);
        
			$this->m_kgb->tambah('tb_kgb',$data);
			redirect(base_url('kgb'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$data = array(
				'title' 	=> 'Tambah Data KGB',
				'isi'		=> 'admin/kgb/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_kgb->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data KGB',
			'isi'		=> 'admin/kgb/v_edit',
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
		
		$golongan			= $this->input->post('golongan');
		$tmt_kgb			= $this->input->post('tmt_kgb');
		$gaji				= $this->input->post('gaji');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'golongan'			=> $golongan,
			'tmt_kgb'			=> $tmt_kgb,
			'gaji'				=> $gaji
		);
		$this->m_kgb->edit('tb_kgb',$data,$id);
		redirect(base_url('kgb'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_kgb->hapus('tb_kgb',$id);
		redirect(base_url('kgb'));
	}
}
