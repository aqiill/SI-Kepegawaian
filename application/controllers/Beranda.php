<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_unitkerja");
        $this->load->model("m_kgb");
        $this->load->model("m_penghargaan");
        $this->load->model("m_hukuman");
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

	public function index()
	{
    

    if ($this->session->userdata('level')=='admin'){
      $pegawai  = $this->m_datapegawai->daftar();
      $kgb      = $this->m_kgb->masakgb();

      $jlmpegawai   = $this->m_datapegawai->perdaftar('tb_pegawai')->num_rows();
      $jlmpegawai   = $jlmpegawai-1;

      $jlmunitkerja = $this->m_unitkerja->daftar('tb_unitkerja')->num_rows();
      $jlmpeng      = $this->m_penghargaan->jlmdaftar('tb_penghargaan')->num_rows();
      $jlmhukuman   = $this->m_hukuman->jlmdaftar('tb_hukuman')->num_rows();
    }
    elseif ($this->session->userdata('level')=='operator') {
      $id = $this->session->userdata('id_unitkerja');

      $pegawai  = $this->m_datapegawai->daftar_o($id);
      $kgb      = $this->m_kgb->masakgb_o($id);

      $jlmpegawai   = $this->m_datapegawai->perdaftar_o('tb_pegawai',$id)->num_rows();
      $jlmunitkerja = $this->m_unitkerja->daftar_o('tb_unitkerja',$id)->num_rows();
      $jlmpeng      = $this->m_penghargaan->jlmdaftar_o('tb_penghargaan',$id)->num_rows();
      $jlmhukuman   = $this->m_hukuman->jlmdaftar_o('tb_hukuman',$id)->num_rows();
    }
		
    $data = array (
                  'title' 		    => 'Beranda Administrator',
                  'isi'   		    => 'admin/beranda/v_beranda',
                  'pegawai'       => $pegawai,
                  'kgb'           => $kgb,
                  'jlmpegawai'    => $jlmpegawai,
                  'jlmunitkerja'  => $jlmunitkerja,
                  'jlmpeng'       => $jlmpeng,
                  'jlmhukuman'    => $jlmhukuman
               );
    $this->load->view('layout/wrapper',$data, FALSE);
	}
}
