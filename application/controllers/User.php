<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_user");
        $this->load->model("m_unitkerja");
        $this->load->model("m_datapegawai");
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
		$operator 	= $this->m_user->sekolah('tb_user')->result();

		if ($this->session->userdata('level')=="admin") {
			$guru 		= $this->m_user->guru('tb_user')->result();
		}
		elseif ($this->session->userdata('level')=="operator") {
			$id 		= $this->session->userdata('id_unitkerja');
			$guru 		= $this->m_user->guru_o('tb_user',$id)->result();
		}

		$data = array(
			'title' 	=> 'Data User',
			'isi'		=> 'admin/user/v_daftar',
			'operator'	=> $operator,
			'guru'		=> $guru
		);

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->load->view('layout/wrapper.php',$data);

	}

	public function tambah()
	{

		$this->form_validation->set_rules('id_pegawai','id_pegawai Harus di isi','required');
		$this->form_validation->set_rules('status','status Harus di isi','required');
		// $this->form_validation->set_rules('level','level Harus di isi','required');
		$this->form_validation->set_rules('username','username Harus di isi','required');
		$this->form_validation->set_rules('password','Password Harus di isi','required');

		if($this->form_validation->run() != false){

			$id_pegawai 	= $this->input->post('id_pegawai');

			if ($this->session->userdata('level')=="admin") {
				$level 			= $this->input->post('level');
				$level 			= base64_decode($level);
			}
			elseif ($this->session->userdata('level')=="operator") {
				$level 			= "guru";
			}

			$status 		= $this->input->post('status');
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');	

		    $id_pegawai = base64_decode($id_pegawai);
		    $id_pegawai = (($id_pegawai/8/42*2)*2);
	        

			$data = array(
				'nama_user'		=> $id_pegawai,
				'level'			=> $level,
				'status'		=> $status,
				'username'		=> $username,
				'password'		=> sha1(md5(md5($password.'simpeg')))
			);

			// echo $level;
			$this->m_user->tambah('tb_user',$data);
			redirect(base_url('user'));

		}else{

	        if ($this->session->userdata('level')=='admin'){
				$unitkerja = $this->m_unitkerja->daftar('tb_unitkerja')->result();
				$pegawai = $this->m_datapegawai->daftar();
	        }
	        elseif ($this->session->userdata('level')=='operator') {
	        	$id 		= $this->session->userdata('id_unitkerja');
	        	$id_pegawai = $this->session->userdata('id_pegawai');
	        	$unitkerja 	= $this->m_unitkerja->daftar_o('tb_unitkerja',$id)->result();
				$pegawai 	= $this->m_datapegawai->daftar_user($id,$id_pegawai);

	        }
			

			$data = array(
				'title' 	=> 'Tambah Data User',
				'isi'		=> 'admin/user/v_tambah',
				'unitkerja'	=> $unitkerja,
				'pegawai'	=> $pegawai
			);

			$this->load->view('layout/wrapper.php',$data);
		}

	}

	public function edit($id){
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);

		$status = $_GET['status'];
		// echo $id;

		if($status=='1'){
			$data = array(
				'status' => '0'
			);
		}
		elseif ($status=='0') {
			$data = array(
				'status' => '1'
			);
		}

		$this->m_user->edit('tb_user',$data,$id);
		redirect(base_url('user'));
	}

	public function hapus($id){
	    $id = base64_decode($id);
	    $id = (($id/8/42*2)*2);
	    
		$this->m_user->hapus('tb_user',$id);
		redirect(base_url('user'));
	}

	public function gantipassword()
	{

		$this->form_validation->set_rules('passwordlama','passwordlama Harus di isi','required');
		$this->form_validation->set_rules('passwordbaru','passwordbaru Harus di isi','required');
		$this->form_validation->set_rules('konfirmasipasswordbaru','konfirmasipasswordbaru Harus di isi','required');

		if($this->form_validation->run() != false){
			$id = $this->session->userdata('id_user');
			$user = $this->m_user->detail('tb_user',$id)->row_array();

			$passwordlama 			= sha1(md5(md5($this->input->post('passwordlama').'simpeg')));
			$passwordbaru 			= $this->input->post('passwordbaru');
			$konfirmasipasswordbaru = $this->input->post('konfirmasipasswordbaru');

			if($passwordlama != $user['password']){
				$this->session->set_flashdata('gagal', 'Password Lama Salah!');
				redirect(base_url('user/gantipassword'));
			}
			elseif ($passwordbaru != $konfirmasipasswordbaru) {
				$this->session->set_flashdata('gagal', 'Password Baru Tidak Sama!');
				redirect(base_url('user/gantipassword'));
			}
			else{
				$data = array(
					'password' => sha1(md5(md5($passwordbaru.'simpeg')))
				);

				$this->m_user->edit('tb_user',$data,$id);
				redirect(base_url('login/logout'));
			}

		}else{
			$id = $this->session->userdata('id_user');

			$user = $this->m_user->detail('tb_user',$id)->row_array();

			$data = array(
				'title' 	=> 'Ganti Password',
				'isi'		=> 'admin/user/v_ganti',
				'user'		=> $user
			);

			$this->load->view('layout/wrapper.php',$data);
		}

	}
}
