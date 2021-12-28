<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_sekolah");
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

        if ( ! file_exists(APPPATH.'views/admin/sekolah/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_sekolah->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_sekolah->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Sekolah',
			'isi'		=> 'admin/sekolah/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','Orang Tua Harus di isi','required');
		$this->form_validation->set_rules('tingkat_sekolah','Tingkat Sekolah Anak Harus di isi','required');
		$this->form_validation->set_rules('nama_sekolah_pendidikan','Nama Sekolah Harus di isi','required');
		$this->form_validation->set_rules('alamat_sekolah','Alamat Harus di isi','required');
		$this->form_validation->set_rules('jurusan','Jurusan Harus di isi','required');
		$this->form_validation->set_rules('nomor_ijazah','No Ijazah Harus di isi','required');
		$this->form_validation->set_rules('tgl_ijazah','Tanggal Harus di isi','required');
		$this->form_validation->set_rules('nama_kepsek_rektor','Kepsek / Rektor Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$tingkat_sekolah			= $this->input->post('tingkat_sekolah');
			$nama_sekolah_pendidikan	= $this->input->post('nama_sekolah_pendidikan');
			$alamat_sekolah				= $this->input->post('alamat_sekolah');
			$jurusan					= $this->input->post('jurusan');
			$nomor_ijazah				= $this->input->post('nomor_ijazah');
			$tgl_ijazah					= $this->input->post('tgl_ijazah');
			$nama_kepsek_rektor			= $this->input->post('nama_kepsek_rektor');
	
			$data = array(
				'id_sekolahpegawai' 		=> NULL,
				'id_pegawai'				=> $id_pegawai,
				'tingkat_sekolah'			=> $tingkat_sekolah,
				'nama_sekolah_pendidikan'	=> $nama_sekolah_pendidikan,
				'alamat_sekolah'			=> $alamat_sekolah,
				'jurusan'					=> $jurusan,
				'nomor_ijazah'				=> $nomor_ijazah,
				'tgl_ijazah'				=> $tgl_ijazah,
				'nama_kepsek_rektor'		=> $nama_kepsek_rektor
			);
        
		$this->m_sekolah->tambah('tb_sekolah',$data);
		redirect(base_url('sekolah'));
			
        }else{

			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			
			$data = array(
				'title' 	=> 'Tambah Data Sekolah',
				'isi'		=> 'admin/sekolah/v_tambah',
				'pegawai'	=> $pegawai
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_sekolah->daftar_detail($id);

		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Sekolah',
			'isi'		=> 'admin/sekolah/v_edit',
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
		
		$tingkat_sekolah			= $this->input->post('tingkat_sekolah');
		$nama_sekolah_pendidikan	= $this->input->post('nama_sekolah_pendidikan');
		$alamat_sekolah				= $this->input->post('alamat_sekolah');
		$jurusan					= $this->input->post('jurusan');
		$nomor_ijazah				= $this->input->post('nomor_ijazah');
		$tgl_ijazah					= $this->input->post('tgl_ijazah');
		$nama_kepsek_rektor			= $this->input->post('nama_kepsek_rektor');

		$data = array(
			'id_pegawai'				=> $id_pegawai,
			'tingkat_sekolah'			=> $tingkat_sekolah,
			'nama_sekolah_pendidikan'	=> $nama_sekolah_pendidikan,
			'alamat_sekolah'			=> $alamat_sekolah,
			'jurusan'					=> $jurusan,
			'nomor_ijazah'				=> $nomor_ijazah,
			'tgl_ijazah'				=> $tgl_ijazah,
			'nama_kepsek_rektor'		=> $nama_kepsek_rektor
		);
		$this->m_sekolah->edit('tb_sekolah',$data,$id);
		redirect(base_url('sekolah'));
	}


	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_sekolah->hapus('tb_sekolah',$id);
		redirect(base_url('sekolah'));
	}
}
