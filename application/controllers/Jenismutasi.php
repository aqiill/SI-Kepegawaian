<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenismutasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_jenismutasi");
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
        if ( ! file_exists(APPPATH.'views/admin/jenismutasi/'.$page.'.php'))
        {   
                show_404();
        }

        $data = $this->m_jenismutasi->daftar('tb_jenis_mutasi')->result();

        $data = array(
          'title' => 'Jenis Mutasi',
          'isi'   => 'admin/jenismutasi/'.$page,
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }
    
    public function tambah()
    {
      $this->form_validation->set_rules('nama_jenis_mutasi','Nama mutasi Harus di isi','required');

      if($this->form_validation->run() != false){

       $nama_jenis_mutasi      = $this->input->post('nama_jenis_mutasi');

       $data = array(
            'nama_jenis_mutasi'    => $nama_jenis_mutasi
       );

       $this->m_jenismutasi->tambah('tb_jenis_mutasi',$data);
       redirect(base_url('jenismutasi'));

      }else{
        $data = array(
          'title' => 'Tambah mutasi',
          'isi'   => 'admin/jenismutasi/v_tambah'
        );

        $this->load->view('layout/wrapper.php',$data);
      }
    }

    public function edit($id){
        $id = base64_decode($id);
        $id = (($id/8/42*2)*2);

        $data = $this->m_jenismutasi->daftar_detail('tb_jenis_mutasi',$id)->row_array();

        $data = array(
          'title' => 'Edit mutasi',
          'isi'   => 'admin/jenismutasi/v_edit',
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }

    public function edit_proses($id){
      $id = base64_decode($id);
      $id = (($id/8/42*2)*2);
       $nama_jenis_mutasi      = $this->input->post('nama_jenis_mutasi');

       $data = array(
            'nama_jenis_mutasi'    => $nama_jenis_mutasi
       );

       $this->m_jenismutasi->edit('tb_jenis_mutasi',$data,$id);
       redirect(base_url('jenismutasi'));
    }

    public function hapus_proses($id){
    $id = base64_decode($id);
    $id = (($id/8/42*2)*2);
        $this->m_jenismutasi->hapus('tb_jenis_mutasi',$id);
        redirect(base_url('jenismutasi'));
    }

}