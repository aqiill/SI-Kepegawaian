<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasutri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_pasutri");
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

        if ( ! file_exists(APPPATH.'views/admin/pasutri/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_pasutri->daftar();	
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_pasutri->daftar_o($id);
        }

		$data = array(
			'title' => 'Data Suami / Istri',
			'isi'	=> 'admin/pasutri/'.$page,
			'data'	=> $data
		);

		$this->load->view('layout/wrapper.php',$data);

	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_pasutri','Nama Harus di isi','required');
		$this->form_validation->set_rules('tgl_nikah','Tanggal Nikah Harus di isi','required');
		$this->form_validation->set_rules('no_kartu','No Kartu Harus di isi','required');

		if($this->form_validation->run() != false){

		$id_pegawai			= $this->input->post('id_pegawai');
		$id_pegawai 		= base64_decode($id_pegawai);
		$id_pegawai 		= (($id_pegawai/8/42*2)*2);

		$nama_pasutri		= $this->input->post('nama_pasutri');
		$tgl_nikah			= $this->input->post('tgl_nikah');
		$no_kartu			= $this->input->post('no_kartu');

		$data = array(
			'id_pasutri' 			=> NULL,
			'id_pegawai'			=> $id_pegawai,
			'nama_pasutri'			=> $nama_pasutri,
			'tgl_nikah'				=> $tgl_nikah,
			'no_kartu'				=> $no_kartu
		);

		$this->m_pasutri->tambah('tb_pasutri',$data);
		redirect(base_url('pasutri'));
		}else{

			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			
			$data = array(
				'title' => 'Tambah Data Suami / Istri',
				'isi'	=> 'admin/pasutri/v_tambah',
				'pegawai'	=> $pegawai
			);

			$this->load->view('layout/wrapper.php',$data);
		}

	}

	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_pasutri->daftar_detail($id);
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' => 'Edit Data Suami / Istri',
			'isi'	=> 'admin/pasutri/v_edit',
			'data'	=> $data,
			'pegawai'	=> $pegawai
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
		
		$nama_pasutri		= $this->input->post('nama_pasutri');
		$tgl_nikah			= $this->input->post('tgl_nikah');
		$no_kartu			= $this->input->post('no_kartu');

		$data = array(
			'id_pegawai'			=> $id_pegawai,
			'nama_pasutri'			=> $nama_pasutri,
			'tgl_nikah'				=> $tgl_nikah,
			'no_kartu'				=> $no_kartu
		);

		$this->m_pasutri->edit('tb_pasutri',$data,$id);
		redirect(base_url('pasutri'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_pasutri->hapus('tb_pasutri',$id);
		redirect(base_url('pasutri'));
	}
}
