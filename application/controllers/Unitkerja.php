<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unitkerja extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_unitkerja");
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
        if ( ! file_exists(APPPATH.'views/admin/cabangdinas/'.$page.'.php'))
        {   
                show_404();
        }
        
        $data = $this->m_unitkerja->daftar('tb_unitkerja')->result();

        $data = array(
          'title' => 'Unit Kerja',
          'isi'   => 'admin/unitkerja/'.$page,
          'data'  => $data
        );

        $this->load->view('layout/wrapper.php',$data);
    }
    
    public function tambah()
    {
      $this->form_validation->set_rules('nama_unitkerja','Nama Unit Kerja Harus di isi','required');
      $this->form_validation->set_rules('id_wilayah','wilayah Harus di isi','required');
      $this->form_validation->set_rules('kepsek','Kepala Sekolah Harus di isi','required');
      $this->form_validation->set_rules('status_unitkerja','Status Harus di isi','required');
      $this->form_validation->set_rules('npsn','NPSN Harus di isi','required');
      $this->form_validation->set_rules('alamat','Alamat Harus di isi','required');
      $this->form_validation->set_rules('email','Email Harus di isi','required');

      if($this->form_validation->run() != false){

       $id_wilayah          = $this->input->post('id_wilayah');
       $id_wilayah          = base64_decode($id_wilayah);
       $id_wilayah          = (($id_wilayah/8/42*2)*2);

       $nama_unitkerja      = $this->input->post('nama_unitkerja');
       $kepsek              = $this->input->post('kepsek');
       $status_unitkerja    = $this->input->post('status_unitkerja');
       $npsn                = $this->input->post('npsn');
       $alamat              = $this->input->post('alamat');
       $latitude            = $this->input->post('latitude');
       $longitude           = $this->input->post('longitude');
       $email_sekolah       = $this->input->post('email');
       $website             = $this->input->post('website');

       $data = array(
            'nama_unitkerja'    => $nama_unitkerja,
            'id_wilayah'        => $id_wilayah,
            'kepsek'            => $kepsek,
            'status_unitkerja'  => $status_unitkerja,
            'npsn'              => $npsn,
            'alamat'            => $alamat,
            'latitude'          => $latitude,
            'longitude'         => $longitude,
            'email_sekolah'     => $email_sekolah,
            'website'           => $website
       );

       $this->m_unitkerja->tambah('tb_unitkerja',$data);
       redirect(base_url('unitkerja'));

      }else{

        $wilayah = $this->m_wilayah->daftar('tb_wilayah')->result();

        $data = array(
          'title'   => 'Tambah Unit Kerja',
          'isi'     => 'admin/unitkerja/v_tambah',
          'wilayah' => $wilayah
        );

        $this->load->view('layout/wrapper.php',$data);
      }
    }

    public function edit($id){
        $id = base64_decode($id);
        $id = (($id/8/42*2)*2);

        $wilayah = $this->m_wilayah->daftar('tb_wilayah')->result();
        $data = $this->m_unitkerja->daftar_detail('tb_unitkerja',$id)->row_array();

        $data = array(
          'title'   => 'Edit Unit Kerja',
          'isi'     => 'admin/unitkerja/v_edit',
          'data'    => $data,
          'wilayah' => $wilayah
        );

        $this->load->view('layout/wrapper.php',$data);
    }

    public function edit_proses($id){

       $id = base64_decode($id);
       $id = (($id/8/42*2)*2);

       $id_wilayah          = $this->input->post('id_wilayah');
       $id_wilayah          = base64_decode($id_wilayah);
       $id_wilayah          = (($id_wilayah/8/42*2)*2);

       $nama_unitkerja      = $this->input->post('nama_unitkerja');
       $kepsek              = $this->input->post('kepsek');
       $status_unitkerja    = $this->input->post('status_unitkerja');
       $npsn                = $this->input->post('npsn');
       $alamat              = $this->input->post('alamat');
       $latitude            = $this->input->post('latitude');
       $longitude           = $this->input->post('longitude');
       $email_sekolah       = $this->input->post('email');
       $website             = $this->input->post('website');

       $data = array(
            'id_wilayah'        => $id_wilayah,
            'nama_unitkerja'    => $nama_unitkerja,
            'kepsek'            => $kepsek,
            'status_unitkerja'  => $status_unitkerja,
            'npsn'              => $npsn,
            'alamat'            => $alamat,
            'latitude'          => $latitude,
            'longitude'         => $longitude,
            'email_sekolah'     => $email_sekolah,
            'website'           => $website
       );

       $this->m_unitkerja->edit('tb_unitkerja',$data,$id);
       redirect(base_url('unitkerja'));
    }


    public function hapus_proses($id){
    $id = base64_decode($id);
    $id = (($id/8/42*2)*2);
      
        $this->m_unitkerja->hapus('tb_unitkerja',$id);
        redirect(base_url('unitkerja'));
    }

}