<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kawin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_kawin");
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

        if ( ! file_exists(APPPATH.'views/admin/kawin/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_kawin->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_kawin->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Kawin',
			'isi'		=> 'admin/kawin/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','id_pegawai Harus di isi','required');
		$this->form_validation->set_rules('no_izin_kawin','no_izin_kawin Harus di isi','required');
		$this->form_validation->set_rules('tgl_izin_kawin','tgl_izin_kawin Harus di isi','required');
		$this->form_validation->set_rules('kebangsaan','kebangsaan Harus di isi','required');
		$this->form_validation->set_rules('nama_ayah','nama_ayah Harus di isi','required');
		$this->form_validation->set_rules('pekerjaan_ayah','pekerjaan_ayah Harus di isi','required');
		$this->form_validation->set_rules('alamat_ayah','alamat_ayah Harus di isi','required');
		$this->form_validation->set_rules('nama_ibu','nama_ibu Harus di isi','required');
		$this->form_validation->set_rules('pekerjaan_ibu','pekerjaan_ibu Harus di isi','required');
		$this->form_validation->set_rules('alamat_ibu','alamat_ibu Harus di isi','required');
		$this->form_validation->set_rules('nama_dia','nama_dia Harus di isi','required');
		$this->form_validation->set_rules('tempat_lahir_dia','tempat_lahir_dia Harus di isi','required');
		$this->form_validation->set_rules('tgl_lahir_dia','tgl_lahir_dia Harus di isi','required');
		$this->form_validation->set_rules('pekerjaan_dia','pekerjaan_dia Harus di isi','required');
		$this->form_validation->set_rules('nik_dia','nik_dia Harus di isi','required');
		$this->form_validation->set_rules('kebangsaan_dia','kebangsaan_dia Harus di isi','required');
		$this->form_validation->set_rules('nama_ayah_dia','nama_ayah_dia Harus di isi','required');
		$this->form_validation->set_rules('pekerjaan_ayah_dia','pekerjaan_ayah_dia Harus di isi','required');
		$this->form_validation->set_rules('alamat_ayah_dia','alamat_ayah_dia Harus di isi','required');
		$this->form_validation->set_rules('nama_ibu_dia','nama_ibu_dia Harus di isi','required');
		$this->form_validation->set_rules('pekerjaan_ibu_dia','pekerjaan_ibu_dia Harus di isi','required');
		$this->form_validation->set_rules('alamat_ibu_dia','alamat_ibu_dia Harus di isi','required');
		$this->form_validation->set_rules('tempat_kawin','tempat_kawin Harus di isi','required');
		$this->form_validation->set_rules('tanggal_kawin','tanggal_kawin Harus di isi','required');

		if($this->form_validation->run() != false){

			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$no_izin_kawin			= $this->input->post('no_izin_kawin');
			$tgl_izin_kawin			= $this->input->post('tgl_izin_kawin');
			$kebangsaan 			= $this->input->post('kebangsaan');
			$nama_ayah				= $this->input->post('nama_ayah');
			$pekerjaan_ayah			= $this->input->post('pekerjaan_ayah');
			$alamat_ayah			= $this->input->post('alamat_ayah');
			$nama_ibu				= $this->input->post('nama_ibu');
			$pekerjaan_ibu			= $this->input->post('pekerjaan_ibu');
			$alamat_ibu				= $this->input->post('alamat_ibu');
			$nama_dia				= $this->input->post('nama_dia');
			$tempat_lahir_dia		= $this->input->post('tempat_lahir_dia');
			$tgl_lahir_dia			= $this->input->post('tgl_lahir_dia');
			$pekerjaan_dia			= $this->input->post('pekerjaan_dia');
			$nik_dia				= $this->input->post('nik_dia');
			$kebangsaan_dia			= $this->input->post('kebangsaan_dia');
			$nama_ayah_dia			= $this->input->post('nama_ayah_dia');
			$pekerjaan_ayah_dia		= $this->input->post('pekerjaan_ayah_dia');
			$alamat_ayah_dia		= $this->input->post('alamat_ayah_dia');
			$nama_ibu_dia			= $this->input->post('nama_ibu_dia');
			$pekerjaan_ibu_dia		= $this->input->post('pekerjaan_ibu_dia');
			$alamat_ibu_dia			= $this->input->post('alamat_ibu_dia');
			$tempat_kawin			= $this->input->post('tempat_kawin');
			$tanggal_kawin			= $this->input->post('tanggal_kawin');
			
				$data = array(
					'id_izin_kawin' 		=> NULL,
					'id_pegawai'			=> $id_pegawai,
					'no_izin_kawin'			=> $no_izin_kawin,
					'tgl_izin_kawin'		=> $tgl_izin_kawin,
					'kebangsaan'			=> $kebangsaan,
					'nama_ayah'				=> $nama_ayah,
					'pekerjaan_ayah'		=> $pekerjaan_ayah,
					'alamat_ayah'			=> $alamat_ayah,
					'nama_ibu'				=> $nama_ibu,
					'pekerjaan_ibu'			=> $pekerjaan_ibu,
					'alamat_ibu'			=> $alamat_ibu,
					'nama_dia'				=> $nama_dia,
					'tempat_lahir_dia'		=> $tempat_lahir_dia,
					'tgl_lahir_dia'			=> $tgl_lahir_dia,
					'pekerjaan_dia'			=> $pekerjaan_dia,
					'nik_dia'				=> $nik_dia,
					'kebangsaan_dia'		=> $kebangsaan_dia,
					'nama_ayah_dia'			=> $nama_ayah_dia,
					'pekerjaan_ayah_dia'	=> $pekerjaan_ayah_dia,
					'alamat_ayah_dia'		=> $alamat_ayah_dia,
					'nama_ibu_dia'			=> $nama_ibu_dia,
					'pekerjaan_ibu_dia'		=> $pekerjaan_ibu_dia,
					'alamat_ibu_dia'		=> $alamat_ibu_dia,
					'tempat_kawin'			=> $tempat_kawin,
					'tanggal_kawin'			=> $tanggal_kawin
				);
	            
			$this->m_kawin->tambah('tb_izin_kawin',$data);
			redirect(base_url('kawin'));
			
        }else{

				if ($this->session->userdata('level')=='admin') {
					$pegawai = $this->m_datapegawai->daftar();
				}
				elseif ($this->session->userdata('level')=='operator') {
					$id = $this->session->userdata('id_unitkerja');
					$pegawai = $this->m_datapegawai->daftar_o($id);
				}
				$data = array(
					'title' 	=> 'Tambah Data Kawin',
					'isi'		=> 'admin/kawin/v_tambah',
					'pegawai'	=> $pegawai
				);

				$this->load->view('layout/wrapper.php',$data);
			}


	}

	public function detailkawin($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data 	= $this->m_kawin->daftar_detail($id);
		$pegawai = $this->m_datapegawai->daftar();

		$data = array(
			'title' => 'Info Data Kawin',
			'isi'	=> 'admin/kawin/v_detail',
			'data'	=> $data
		);

		$this->load->view('layout/wrapper.php',$data);
	}

	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$data 		= $this->m_kawin->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}

		$data = array(
			'title' 	=> 'Edit Data Kawin',
			'isi'		=> 'admin/kawin/v_edit',
			'data'		=> $data,
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
		
		$no_izin_kawin			= $this->input->post('no_izin_kawin');
		$tgl_izin_kawin			= $this->input->post('tgl_izin_kawin');
		$kebangsaan				= $this->input->post('kebangsaan');
		$nama_ayah 				= $this->input->post('nama_ayah');
		$pekerjaan_ayah			= $this->input->post('pekerjaan_ayah');
		$alamat_ayah			= $this->input->post('alamat_ayah');
		$nama_ibu				= $this->input->post('nama_ibu');
		$pekerjaan_ibu			= $this->input->post('pekerjaan_ibu');
		$alamat_ibu				= $this->input->post('alamat_ibu');
		$nama_dia				= $this->input->post('nama_dia');
		$tempat_lahir_dia		= $this->input->post('tempat_lahir_dia');
		$tgl_lahir_dia			= $this->input->post('tgl_lahir_dia');
		$pekerjaan_dia			= $this->input->post('pekerjaan_dia');
		$nik_dia				= $this->input->post('nik_dia');
		$kebangsaan_dia			= $this->input->post('kebangsaan_dia');
		$nama_ayah_dia			= $this->input->post('nama_ayah_dia');
		$pekerjaan_ayah_dia		= $this->input->post('pekerjaan_ayah_dia');
		$alamat_ayah_dia		= $this->input->post('alamat_ayah_dia');
		$nama_ibu_dia			= $this->input->post('nama_ibu_dia');
		$pekerjaan_ibu_dia		= $this->input->post('pekerjaan_ibu_dia');
		$alamat_ibu_dia			= $this->input->post('alamat_ibu_dia');
		$tempat_kawin			= $this->input->post('tempat_kawin');
		$tanggal_kawin			= $this->input->post('tanggal_kawin');

		$data = array(
			'id_pegawai'			=> $id_pegawai,
			'no_izin_kawin'			=> $no_izin_kawin,
			'tgl_izin_kawin'		=> $tgl_izin_kawin,
			'kebangsaan'			=> $kebangsaan,
			'nama_ayah'				=> $nama_ayah,
			'pekerjaan_ayah'		=> $pekerjaan_ayah,
			'alamat_ayah'			=> $alamat_ayah,
			'nama_ibu'				=> $nama_ibu,
			'pekerjaan_ibu'			=> $pekerjaan_ibu,
			'alamat_ibu'			=> $alamat_ibu,
			'nama_dia'				=> $nama_dia,
			'tempat_lahir_dia'		=> $tempat_lahir_dia,
			'tgl_lahir_dia'			=> $tgl_lahir_dia,
			'pekerjaan_dia'			=> $pekerjaan_dia,
			'nik_dia'				=> $nik_dia,
			'kebangsaan_dia'		=> $kebangsaan_dia,
			'nama_ayah_dia'			=> $nama_ayah_dia,
			'pekerjaan_ayah_dia'	=> $pekerjaan_ayah_dia,
			'alamat_ayah_dia'		=> $alamat_ayah_dia,
			'nama_ibu_dia'			=> $nama_ibu_dia,
			'pekerjaan_ibu_dia'		=> $pekerjaan_ibu_dia,
			'alamat_ibu_dia'		=> $alamat_ibu_dia,
			'tempat_kawin'			=> $tempat_kawin,
			'tanggal_kawin'			=> $tanggal_kawin,
		);
		$this->m_kawin->edit('tb_izin_kawin',$data,$id);
		redirect(base_url('kawin'));
		

	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
		
		$this->m_kawin->hapus('tb_izin_kawin',$id);
		redirect(base_url('kawin'));
	}
}
