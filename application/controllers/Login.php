<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model("m_login");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username','username Harus di isi','required');
		$this->form_validation->set_rules('password','password Harus di isi','required');

		if($this->form_validation->run() != false){
						
			$username			= $this->input->post('username');
			$password			= sha1(md5(md5($this->input->post('password').'simpeg')));
	
			$data = $this->m_login->login($username,$password)->row_array();
			$cek = $this->m_login->login($username,$password)->num_rows();
			// print_r($data);
			if($cek>0){
				if($data['level']=='admin'){
					if($data['status']=="1"){

						$data_user = array(
							'id_unitkerja' 	=> $data['id_unitkerja'],
							'id_user'	 	=> $data['id_user'],
							'id_pegawai'	=> $data['id_pegawai'],
							'level'	 	 	=> $data['level'],
							'nama_user'	 	=> $data['nama_pegawai'],
							'username'	 	=> $data['username']
							
						);

						$this->session->set_userdata($data_user);

						redirect(base_url('beranda'),'refresh');
					}
					elseif($data['status']=="0"){
						$this->session->set_flashdata('nonaktif','Akun Anda Belum diaktifkan');
						redirect(base_url('login'),'refresh');
					}
				}
				elseif($data['level']=='cabdin'){
					if($data['status']=="1"){

						$data_user = array(
							'id_unitkerja' 	=> $data['id_unitkerja'],
							'id_user'	 	=> $data['id_user'],
							'id_pegawai'	=> $data['id_pegawai'],
							'level'	 	 	=> $data['level'],
							'nama_user'	 	=> $data['nama_pegawai'],
							'username'	 	=> $data['username']

						);

						$this->session->set_userdata($data_user);

						redirect(base_url('beranda'),'refresh');
					}
					elseif($data['status']=="0"){
						$this->session->set_flashdata('nonaktif','Akun Anda Belum diaktifkan');
						redirect(base_url('login'),'refresh');
					}
				}
				elseif($data['level']=='operator'){
					if($data['status']=="1"){

						$data_user = array(
							'id_unitkerja' 	=> $data['id_unitkerja'],
							'id_user'	 	=> $data['id_user'],
							'id_pegawai'	=> $data['id_pegawai'],
							'level'	 		=> $data['level'],
							'nama_user'	 	=> $data['nama_pegawai'],
							'username'	 	=> $data['username']
						);

						$this->session->set_userdata($data_user);

						redirect(base_url('beranda'),'refresh');
					}
					elseif($data['status']=="0"){
						$this->session->set_flashdata('nonaktif','Akun Anda Belum diaktifkan');
						redirect(base_url('login'),'refresh');
					}
				}
				elseif($data['level']=='guru'){
					if($data['status']=="1"){

						$data_user = array(
							'id_unitkerja' 	=> $data['id_unitkerja'],
							'id_user'	 	=> $data['id_user'],
							'id_pegawai'	=> $data['id_pegawai'],
							'level'	 	 	=> $data['level'],
							'nama_user'	 	=> $data['nama_pegawai'],
							'username'	 	=> $data['username']

						);

						$this->session->set_userdata($data_user);

						redirect(base_url('datapegawai'),'refresh');
					}
					elseif($data['status']=="0"){
						$this->session->set_flashdata('nonaktif','Akun Anda Belum diaktifkan');
						redirect(base_url('login'),'refresh');
					}
				}
				else{
					redirect(base_url('login'),'refresh');
				}
			}
			else{
				$this->session->set_flashdata('gagal','Username atau Password Salah');
				redirect(base_url('login'),'refresh');
			}
			
        }else{
	        $data = array ('title' => 'Login Administrator');
	        $this->load->view('v_login',$data, FALSE);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
