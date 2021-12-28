<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sertifikasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_sertifikasi");
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

        if ( ! file_exists(APPPATH.'views/admin/sertifikasi/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_sertifikasi->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_sertifikasi->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Sertifikasi',
			'isi'		=> 'admin/sertifikasi/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('no_sertifikat_sertifikasi','no_sertifikat_sertifikasi Harus di isi','required');
		$this->form_validation->set_rules('no_peserta','no_peserta Harus di isi','required');
		$this->form_validation->set_rules('mapel_sertifikasi','mapel_sertifikasi Harus di isi','required');
		$this->form_validation->set_rules('tahun_sertifikasi','tahun_sertifikasi Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$no_sertifikat_sertifikasi	= $this->input->post('no_sertifikat_sertifikasi');
			$no_peserta					= $this->input->post('no_peserta');
			$mapel_sertifikasi			= $this->input->post('mapel_sertifikasi');
			$tahun_sertifikasi			= $this->input->post('tahun_sertifikasi');
	
			$data = array(
				'id_sertifikasi' 			=> NULL,
				'id_pegawai'				=> $id_pegawai,
				'no_sertifikat_sertifikasi'	=> $no_sertifikat_sertifikasi,
				'no_peserta'				=> $no_peserta,
				'mapel_sertifikasi'			=> $mapel_sertifikasi,
				'tahun_sertifikasi'			=> $tahun_sertifikasi
			);
        
			$this->m_sertifikasi->tambah('tb_sertifikasi',$data);
			redirect(base_url('sertifikasi'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}

			$data = array(
				'title' 	=> 'Tambah Data Sertifikasi Tambah',
				'isi'		=> 'admin/sertifikasi/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_sertifikasi->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data sertifikasi',
			'isi'		=> 'admin/sertifikasi/v_edit',
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
		
		$no_sertifikat_sertifikasi	= $this->input->post('no_sertifikat_sertifikasi');
		$no_peserta					= $this->input->post('no_peserta');
		$mapel_sertifikasi			= $this->input->post('mapel_sertifikasi');
		$tahun_sertifikasi			= $this->input->post('tahun_sertifikasi');

		$data = array(
			'id_pegawai'				=> $id_pegawai,
			'no_sertifikat_sertifikasi'	=> $no_sertifikat_sertifikasi,
			'no_peserta'				=> $no_peserta,
			'mapel_sertifikasi'			=> $mapel_sertifikasi,
			'tahun_sertifikasi'			=> $tahun_sertifikasi
		);
		$this->m_sertifikasi->edit('tb_sertifikasi',$data,$id);
		redirect(base_url('sertifikasi'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_sertifikasi->hapus('tb_sertifikasi',$id);
		redirect(base_url('sertifikasi'));
	}
}
