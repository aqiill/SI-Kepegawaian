<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_cuti");
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

        if ( ! file_exists(APPPATH.'views/admin/cuti/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_cuti->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_cuti->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Cuti',
			'isi'		=> 'admin/cuti/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('perihal_cuti','perihal cuti Harus di isi','required');
		$this->form_validation->set_rules('t_mulai_cuti','tanggal mulai cuti Harus di isi','required');
		$this->form_validation->set_rules('t_selesai_cuti','tanggal selesai cuti Harus di isi','required');
		$this->form_validation->set_rules('no_surat_izin_cuti','no surat izin cuti Harus di isi','required');
		$this->form_validation->set_rules('pengesah_surat_cuti','pengesah surat cuti Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$perihal_cuti		= $this->input->post('perihal_cuti');
			$t_mulai_cuti		= $this->input->post('t_mulai_cuti');
			$t_selesai_cuti		= $this->input->post('t_selesai_cuti');
			$no_surat_izin_cuti	= $this->input->post('no_surat_izin_cuti');
			$pengesah_surat_cuti= $this->input->post('pengesah_surat_cuti');
	
			$data = array(
				'id_cuti' 				=> NULL,
				'id_pegawai'			=> $id_pegawai,
				'perihal_cuti'			=> $perihal_cuti,
				't_mulai_cuti'			=> $t_mulai_cuti,
				't_selesai_cuti'		=> $t_selesai_cuti,
				'no_surat_izin_cuti'	=> $no_surat_izin_cuti,
				'pengesah_surat_cuti'	=> $pengesah_surat_cuti
			);
        
			$this->m_cuti->tambah('tb_cuti',$data);
			redirect(base_url('cuti'));
			
        }else{
        	echo validation_errors();
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}

			$data = array(
				'title' 	=> 'Tambah Data Cuti',
				'isi'		=> 'admin/cuti/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);		

		$data = $this->m_cuti->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Cuti',
			'isi'		=> 'admin/cuti/v_edit',
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
		
		$perihal_cuti			= $this->input->post('perihal_cuti');
		$t_mulai_cuti			= $this->input->post('t_mulai_cuti');
		$t_selesai_cuti			= $this->input->post('t_selesai_cuti');
		$no_surat_izin_cuti		= $this->input->post('no_surat_izin_cuti');
		$pengesah_surat_cuti	= $this->input->post('pengesah_surat_cuti');

		$data = array(
			'id_pegawai'			=> $id_pegawai,
			'perihal_cuti'			=> $perihal_cuti,
			't_mulai_cuti'			=> $t_mulai_cuti,
			't_selesai_cuti'		=> $t_selesai_cuti,
			'no_surat_izin_cuti'	=> $no_surat_izin_cuti,
			'pengesah_surat_cuti'	=> $pengesah_surat_cuti
		);
		$this->m_cuti->edit('tb_cuti',$data,$id);
		redirect(base_url('cuti'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_cuti->hapus('tb_cuti',$id);
		redirect(base_url('cuti'));
	}
}
