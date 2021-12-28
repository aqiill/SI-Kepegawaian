<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkatgolongan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_pangkatgolongan");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->cek_login();
    }

    public function cek_login(){
    	if ($this->session->userdata('level') !="admin") {
    		$this->session->set_flashdata('gagal','Aktivitas Anda Dicurigai! <i class="fas fa-user-secret"></i>');
    		redirect(base_url('beranda'));
    	}
    }

	public function index($page='v_daftar')
	{

        if ( ! file_exists(APPPATH.'views/admin/pangkatgolongan/'.$page.'.php'))
        {	
        		// redirect('https://wpklik.com/wp-content/uploads/2019/03/A-404-Page-Best-Practices-and-Design-Inspiration.jpg');
                show_404();
        }

		$data = $this->m_pangkatgolongan->daftar('tb_pangkatgolongan')->result();

		$data = array(
			'title' => 'Pangkat Golongan',
			'isi'	=> 'admin/pangkatgolongan/'.$page,
			'data'	=> $data
		);
		$this->load->view('layout/wrapper',$data);

	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama_pangkatgolongan','Nama Harus diisi','required');

		if($this->form_validation->run() != false){			

		$nama_pangkatgolongan		= $this->input->post('nama_pangkatgolongan');

		$data = array(
			'id_pangkatgolongan' 		=> NULL,
			'nama_pangkatgolongan'			=> $nama_pangkatgolongan
		);

		$this->m_pangkatgolongan->tambah('tb_pangkatgolongan',$data);
		redirect(base_url('pangkatgolongan'));

		}else{
			$data = array(
				'title' => 'Tambah Pangkat Golongan',
				'isi'	=> 'admin/pangkatgolongan/v_tambah'
			);
			$this->load->view('layout/wrapper',$data);
		}
	}

	public function edit($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$data = $this->m_pangkatgolongan->daftar_detail('tb_pangkatgolongan',$id)->row_array();
		$data = array(
			'title' => 'Edit Pangkat Golongan',
			'isi'	=> 'admin/pangkatgolongan/v_edit',
			'data'	=> $data
		);
		
		$this->load->view('layout/wrapper',$data);
	}

	public function edit_proses($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$nama_pangkatgolongan 	= $this->input->post('nama_pangkatgolongan');

		// echo $pimpinan;
		$data = array(
			'nama_pangkatgolongan'			=> $nama_pangkatgolongan
		);
		$this->m_pangkatgolongan->edit('tb_pangkatgolongan',$data,$id);
		redirect(base_url('pangkatgolongan'));
	}

	public function hapus_proses($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);
		
		$this->m_pangkatgolongan->hapus('tb_pangkatgolongan',$id);
		redirect(base_url('pangkatgolongan'));
	}
}
