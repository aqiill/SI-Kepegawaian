<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_tugas");
        $this->load->model("m_jabatan");
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

        if ( ! file_exists(APPPATH.'views/admin/tugas/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_tugas->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_tugas->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Tugas Tambahan',
			'isi'		=> 'admin/tugas/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('jabatan','jabatan Harus di isi','required');
		$this->form_validation->set_rules('no_sk','no sk Harus di isi','required');
		$this->form_validation->set_rules('tgl_sk','tgl sk Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$jabatan		= $this->input->post('jabatan');
			$no_sk			= $this->input->post('no_sk');
			$tgl_sk_tugas	= $this->input->post('tgl_sk');
	
			$data = array(
				'id_tugastam' 		=> NULL,
				'id_pegawai'		=> $id_pegawai,
				'id_jabatan'		=> $jabatan,
				'no_sk'				=> $no_sk,
				'tgl_sk_tugas'		=> $tgl_sk_tugas
			);
        
			$this->m_tugas->tambah('tb_tugastam',$data);
			redirect(base_url('tugas'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$jabatan = $this->m_jabatan->daftar('tb_jabatan')->result();
			$data = array(
				'title' 	=> 'Tambah Data Tugas Tambahan',
				'isi'		=> 'admin/tugas/v_tambah',
				'pegawai'	=> $pegawai,
				'jabatan'	=> $jabatan
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_tugas->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$jabatan = $this->m_jabatan->daftar('tb_jabatan')->result();	
		$data = array(
			'title' 	=> 'Edit Data Tugas',
			'isi'		=> 'admin/tugas/v_edit',
			'pegawai'	=> $pegawai,
			'data'		=> $data,
			'jabatan'	=> $jabatan
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
		
		$jabatan			= $this->input->post('jabatan');
		$no_sk				= $this->input->post('no_sk');
		$tgl_sk_tugas		= $this->input->post('tgl_sk');

		$data = array(
			'id_pegawai'		=> $id_pegawai,
			'id_jabatan'			=> $jabatan,
			'no_sk'				=> $no_sk,
			'tgl_sk_tugas'		=> $tgl_sk_tugas
		);
		$this->m_tugas->edit('tb_tugastam',$data,$id);
		redirect(base_url('tugas'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_tugas->hapus('tb_tugastam',$id);
		redirect(base_url('tugas'));
	}
}
