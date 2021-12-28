<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mutasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_mutasi");
        $this->load->model("m_jenismutasi");
        $this->load->model("m_unitkerja");
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

        if ( ! file_exists(APPPATH.'views/admin/mutasi/'.$page.'.php'))
        {	
                show_404();
        }

        if ($this->session->userdata('level')=='admin'){
			$data = $this->m_mutasi->daftar();
        }
        elseif ($this->session->userdata('level')=='operator') {
        	$id = $this->session->userdata('id_unitkerja');
        	$data = $this->m_mutasi->daftar_o($id);
        }
		

		$data = array(
			'title' 	=> 'Data Mutasi',
			'isi'		=> 'admin/mutasi/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','pegawai Harus di isi','required');
		$this->form_validation->set_rules('id_jenis_mutasi','id_jenis_mutasi Harus di isi','required');
		$this->form_validation->set_rules('id_unitkerja','id_unitkerja Harus di isi','required');
		$this->form_validation->set_rules('tmt_mutasi','tahun_mutasi Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$id_pegawai			= $this->input->post('id_pegawai');
			$id_pegawai 		= base64_decode($id_pegawai);
			$id_pegawai 		= (($id_pegawai/8/42*2)*2);

			$id_jenis_mutasi	= $this->input->post('id_jenis_mutasi');
			$asal_instansi		= $this->input->post('asal_instansi');
			$id_unitkerja		= $this->input->post('id_unitkerja');
			$tmt_mutasi			= $this->input->post('tmt_mutasi');
	
			$data = array(
				'id_pegawai'		=> $id_pegawai,
				'id_jenis_mutasi'	=> $id_jenis_mutasi,
				'asal_instansi'		=> $asal_instansi,
				'id_unitkerja'		=> $id_unitkerja,
				'tmt_mutasi'		=> $tmt_mutasi
			);
        
			$this->m_mutasi->tambah('tb_mutasi',$data);
			redirect(base_url('mutasi'));
			
        }else{
			if ($this->session->userdata('level')=='admin') {
				$pegawai = $this->m_datapegawai->daftar();
			}
			elseif ($this->session->userdata('level')=='operator') {
				$id = $this->session->userdata('id_unitkerja');
				$pegawai = $this->m_datapegawai->daftar_o($id);
			}
			$jenismutasi 	= $this->m_jenismutasi->daftar('tb_jenis_mutasi')->result();
			$unitkerja 		= $this->m_unitkerja->daftar('tb_unitkerja')->result();
			
			$data = array(
				'title' 		=> 'Tambah Data Mutasi',
				'isi'			=> 'admin/mutasi/v_tambah',
				'pegawai'		=> $pegawai,
				'unitkerja'		=> $unitkerja,
				'jenismutasi'	=> $jenismutasi
			);
			$this->load->view('layout/wrapper.php',$data);
		}
	}


	public function edit($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$data = $this->m_mutasi->daftar_detail($id);
		if ($this->session->userdata('level')=='admin') {
			$pegawai = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$pegawai = $this->m_datapegawai->daftar_o($id);
		}
		$jenismutasi 	= $this->m_jenismutasi->daftar('tb_jenis_mutasi')->result();
		$unitkerja 		= $this->m_unitkerja->daftar('tb_unitkerja')->result();
		$data = array(
			'title' 		=> 'Edit Data Mutasi',
			'isi'			=> 'admin/mutasi/v_edit',
			'pegawai'		=> $pegawai,
			'data'			=> $data,
			'unitkerja'		=> $unitkerja,
			'jenismutasi'	=> $jenismutasi
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
		
		$id_jenis_mutasi			= $this->input->post('id_jenis_mutasi');
		$asal_instansi				= $this->input->post('asal_instansi');
		$id_unitkerja				= $this->input->post('id_unitkerja');
		$tmt_mutasi					= $this->input->post('tmt_mutasi');
		// echo $id_unitkerja;
		$data = array(
			'id_pegawai'			=> $id_pegawai,
			'id_jenis_mutasi'		=> $id_jenis_mutasi,
			'asal_instansi'			=> $asal_instansi,
			'id_unitkerja'			=> $id_unitkerja,
			'tmt_mutasi'			=> $tmt_mutasi
		);
		$this->m_mutasi->edit('tb_mutasi',$data,$id);
		redirect(base_url('mutasi'));
	}

	public function hapus_proses($id)
	{
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$this->m_mutasi->hapus('tb_mutasi',$id);
		redirect(base_url('mutasi'));
	}
}
