<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jabatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_jabatan");
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
        if ( ! file_exists(APPPATH.'views/admin/jabatan/'.$page.'.php'))
        {   
                show_404();
        }

        $data = $this->m_jabatan->daftar('tb_jabatan')->result();

        $data = array(
          'title' => 'Jabatan',
          'isi'   => 'admin/jabatan/'.$page,
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }
    
    public function tambah()
    {
      $this->form_validation->set_rules('nama_jabatan','Nama Jabatan Harus di isi','required');

      if($this->form_validation->run() != false){

       $nama_jabatan      = $this->input->post('nama_jabatan');

       $data = array(
            'nama_jabatan'    => $nama_jabatan
       );

       $this->m_jabatan->tambah('tb_jabatan',$data);
       redirect(base_url('jabatan'));

      }else{
        $data = array(
          'title' => 'Tambah Jabatan',
          'isi'   => 'admin/jabatan/v_tambah'
        );

        $this->load->view('layout/wrapper.php',$data);
      }
    }

    public function edit($id){
      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
        $data = $this->m_jabatan->daftar_detail('tb_jabatan',$id)->row_array();

        $data = array(
          'title' => 'Edit Jabatan',
          'isi'   => 'admin/jabatan/v_edit',
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }

    public function edit_proses($id){
      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
       $nama_jabatan      = $this->input->post('nama_jabatan');

       $data = array(
            'nama_jabatan'    => $nama_jabatan
       );

       $this->m_jabatan->edit('tb_jabatan',$data,$id);
       redirect(base_url('jabatan'));
    }


    public function hapus_proses($id){
      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
      
        $this->m_jabatan->hapus('tb_jabatan',$id);
        redirect(base_url('jabatan'));
    }

}