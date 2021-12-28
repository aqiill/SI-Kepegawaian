<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wilayah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_wilayah");
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
        if ( ! file_exists(APPPATH.'views/admin/wilayah/'.$page.'.php'))
        {   
                show_404();
        }

        $data = $this->m_wilayah->daftar('tb_wilayah')->result();

        $data = array(
          'title' => 'Wilayah',
          'isi'   => 'admin/wilayah/'.$page,
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }
    
    public function tambah()
    {
      $this->form_validation->set_rules('nama_wilayah','Nama Jabatan Harus di isi','required');

      if($this->form_validation->run() != false){

       $nama_wilayah      = $this->input->post('nama_wilayah');

       $data = array(
            'nama_wilayah'    => $nama_wilayah
       );

       $this->m_wilayah->tambah('tb_wilayah',$data);
       redirect(base_url('wilayah'));

      }else{
        $data = array(
          'title' => 'Tambah Jabatan',
          'isi'   => 'admin/wilayah/v_tambah'
        );

        $this->load->view('layout/wrapper.php',$data);
      }
    }

    public function edit($id=null){
      if (!isset($id)) show_404();
      

      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
        $data = $this->m_wilayah->daftar_detail('tb_wilayah',$id)->row_array();

        $data = array(
          'title' => 'Edit Jabatan',
          'isi'   => 'admin/wilayah/v_edit',
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }

    public function edit_proses($id){
      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
       $nama_wilayah      = $this->input->post('nama_wilayah');

       $data = array(
            'nama_wilayah'    => $nama_wilayah
       );

       $this->m_wilayah->edit('tb_wilayah',$data,$id);
       redirect(base_url('wilayah'));
    }


    public function hapus_proses($id){
      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
      
        $this->m_wilayah->hapus('tb_wilayah',$id);
        redirect(base_url('wilayah'));
    }

}