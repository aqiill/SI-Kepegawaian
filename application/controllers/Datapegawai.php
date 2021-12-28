<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_datapegawai");
        $this->load->model("m_unitkerja");
        $this->load->model("m_pasutri");
        $this->load->model("m_anak");
        $this->load->model("m_ortu");
        $this->load->model("m_sekolah");
        $this->load->model("m_bahasa");
        $this->load->model("m_sertifikasi");
        $this->load->model("m_tugas");
        $this->load->model("m_pangkat");
        $this->load->model("m_kgb");
        $this->load->model("m_sppd");
        $this->load->model("m_penghargaan");
        $this->load->model("m_hukuman");
        $this->load->model("m_cuti");
        $this->load->model("m_tunjangan");
        $this->load->model("m_kawin");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	}

	public function index($page='v_daftar')
	{

        if ( ! file_exists(APPPATH.'views/admin/datapegawai/'.$page.'.php'))
        {	
                show_404();
        }

		if ($this->session->userdata('level')=='admin') {
			$data = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$id =str_replace('-', ' ', $id);
			$data = $this->m_datapegawai->daftar_o($id);
		}
		elseif ($this->session->userdata('level')=='guru') {
			$id = $this->session->userdata('nama_user');
			$id =str_replace('-', ' ', $id);
			$data = $this->m_datapegawai->daftar_g($id);
		}

		$data = array(
			'title' 	=> 'Data Pegawai',
			'isi'		=> 'admin/datapegawai/'.$page,
			'data'		=> $data
		);

		$this->load->view('layout/wrapper.php',$data);


	}

	public function tambah()
	{

		$this->form_validation->set_rules('nama_pegawai','Nama Harus di isi','required');
		$this->form_validation->set_rules('jk_pegawai','Jenis Kelamin Harus di isi','required');
		$this->form_validation->set_rules('tempatlahir_pegawai','Tempat Lahir Harus di isi','required');
		$this->form_validation->set_rules('tgllahir_pegawai','Tanggal Lahir Harus di isi','required');
		$this->form_validation->set_rules('agama','Agama Harus di isi','required');
		$this->form_validation->set_rules('hp','Hp Harus di isi','required');
		$this->form_validation->set_rules('email_pegawai','Email Harus di isi','required');
		$this->form_validation->set_rules('alamat_pegawai','Alamat Harus di isi','required');
		$this->form_validation->set_rules('pendidikan_terakhir','Alamat Harus di isi','required');
		$this->form_validation->set_rules('status_pegawai','Status Harus di isi','required');
		// $this->form_validation->set_rules('foto','Foto Harus di isi','required');

		if($this->form_validation->run() != false){
			$foto 	= $_FILES['foto'];
			if($foto =''){}else{
				$nama = 'simpeg_'.time();
				$config['upload_path']          = './assets/foto';
	            $config['allowed_types']        = 'jpeg|jpg|png';
	            $config['max_size']             = 0.1;
	            $config['file_name']			= $nama;

	            $this->load->library('upload', $config);

	            if(!$this->upload->do_upload('foto')){
	            	redirect(base_url('datapegawai?pesan=Size%20Terlalu%20Besar'));
	            }
	            else{
	            	$foto=$this->upload->data('file_name');
					
					if ($this->session->userdata('level')=="admin") {
						$id_unitkerja	= $this->input->post('id_unitkerja');
						$id_unitkerja = base64_decode($id_unitkerja);
						$id_unitkerja = (($id_unitkerja/8/42*2)*2);
					}
					elseif ($this->session->userdata('level')=="operator"){
						$id_unitkerja	= $this->session->userdata('id_unitkerja');
					}

					$nama_pegawai		= $this->input->post('nama_pegawai');
					$nip_pegawai		= $this->input->post('nip_pegawai');
					$jk_pegawai			= $this->input->post('jk_pegawai');
					$tempatlahir_pegawai= $this->input->post('tempatlahir_pegawai');
					$tgllahir_pegawai	= $this->input->post('tgllahir_pegawai');
					$goldarah			= $this->input->post('goldarah');
					$agama				= $this->input->post('agama');
					$hp					= $this->input->post('hp');
					$email				= $this->input->post('email_pegawai');
					$alamat				= $this->input->post('alamat_pegawai');
					$status				= $this->input->post('status_pegawai');
					$pendidikan_terakhir= $this->input->post('pendidikan_terakhir');
			
					$data = array(
						'id_pegawai' 			=> NULL,
						'id_unitkerja'			=> $id_unitkerja,
						'nama_pegawai'			=> strtolower($nama_pegawai),
						'nip_pegawai'			=> $nip_pegawai,
						'jk_pegawai'			=> $jk_pegawai,
						'tempatlahir_pegawai'	=> $tempatlahir_pegawai,
						'tgllahir_pegawai'		=> $tgllahir_pegawai,
						'goldarah'				=> $goldarah,
						'agama'					=> $agama,
						'hp'					=> $hp,
						'email_pegawai'			=> $email,
						'alamat_pegawai'		=> $alamat,
						'status_pegawai'		=> $status,
						'pendidikan_terakhir'	=> $pendidikan_terakhir,
						'foto'					=> $foto
					);
	            }
				$this->m_datapegawai->tambah('tb_pegawai',$data);
				redirect(base_url('datapegawai'));
			}
        }else{
				if ($this->session->userdata('level')=='admin') {
					$unitkerja = $this->m_unitkerja->daftar('tb_unitkerja')->result();
				}
				elseif ($this->session->userdata('level')=='operator') {
					$id = $this->session->userdata('id_unitkerja');
					$unitkerja = $this->m_unitkerja->daftar_o('tb_unitkerja',$id)->result();
				}
				
				$data = array(
					'title' 	=> 'Tambah Data Pegawai',
					'isi'		=> 'admin/datapegawai/v_tambah',
					'unitkerja'	=> $unitkerja
				);

				$this->load->view('layout/wrapper.php',$data);
			}


	}

	public function detailpegawai($id)
	{
		error_reporting(0);
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);
		// echo $id;

		$data 			= $this->m_datapegawai->daftar_detail($id);
		$pasutri 		= $this->m_pasutri->view($id);
		$anak			= $this->m_anak->view($id);
		$ortu 			= $this->m_ortu->view($id);
		$sekolah 		= $this->m_sekolah->view($id);
		$bahasa 		= $this->m_bahasa->view($id);
		$sertifikasi 	= $this->m_sertifikasi->view($id);
		$tugas 			= $this->m_tugas->view($id);
		$pangkat 		= $this->m_pangkat->view($id);
		$kgb 			= $this->m_kgb->view($id);
		$sppd 			= $this->m_sppd->view($id);
		$penghargaan 	= $this->m_penghargaan->view($id);
		$hukuman 		= $this->m_hukuman->view($id);
		$cuti 			= $this->m_cuti->view($id);
		$tunjangan 		= $this->m_tunjangan->view($id);
		$kawin 			= $this->m_kawin->view($id);
		$unitkerja 		= $this->m_unitkerja->daftar('tb_unitkerja')->result();

		$data = array(
			'title' 		=> 'Info Data Pegawai',
			'isi'			=> 'admin/datapegawai/v_detail',
			'data'			=> $data,
			'pasutri'		=> $pasutri,
			'anak'			=> $anak,
			'ortu'			=> $ortu,
			'sekolah'		=> $sekolah,
			'bahasa'		=> $bahasa,
			'unitkerja'		=> $unitkerja,
			'sertifikasi'	=> $sertifikasi,
			'tugas'			=> $tugas,
			'pangkat'		=> $pangkat,
			'kgb'			=> $kgb,
			'sppd'			=> $sppd,
			'penghargaan'	=> $penghargaan,
			'hukuman'		=> $hukuman,
			'cuti'			=> $cuti,
			'tunjangan'		=> $tunjangan,
			'kawin'			=> $kawin
		);

		$this->load->view('layout/wrapper.php',$data);
	}

	public function edit($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$data = $this->m_datapegawai->daftar_detail($id);
		
		if ($this->session->userdata('level')=='admin') {
			$unitkerja = $this->m_unitkerja->daftar('tb_unitkerja')->result();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$unitkerja = $this->m_unitkerja->daftar_o('tb_unitkerja',$id)->result();
		}

		$data = array(
			'title' 	=> 'Edit Data Pegawai',
			'isi'		=> 'admin/datapegawai/v_edit',
			'data'		=> $data,
			'unitkerja'	=> $unitkerja
		);

		$this->load->view('layout/wrapper.php',$data);

	}

	public function edit_proses($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$foto 	= $_FILES['foto'];
		$poto 	= $_FILES['foto']['name'];

		if($poto != ""){

			$foto['data'] = $this->m_datapegawai->daftar_detail($id);
			$nama_foto = './assets/foto/'.$foto['data']['foto'];

			if(is_readable($nama_foto) && unlink($nama_foto)){
				
				$nama = 'simpeg_'.time();
				$config['upload_path']          = './assets/foto';
	            $config['allowed_types']        = 'jpeg|jpg|png';
	            $config['max_size']             = 0.1;
	            $config['file_name']			= $nama;

	            $this->load->library('upload', $config);

	            if(!$this->upload->do_upload('foto')){
	            	redirect(base_url('datapegawai?pesan=Size%20Terlalu%20Besar'));
	            }
	            else{
	            	$foto=$this->upload->data('file_name');
			
					if ($this->session->userdata('level')=="admin") {
						$id_unitkerja	= $this->input->post('id_unitkerja');
						$id_unitkerja = base64_decode($id_unitkerja);
						$id_unitkerja = (($id_unitkerja/8/42*2)*2);
					}
					elseif ($this->session->userdata('level')=="operator"){
						$id_unitkerja	= $this->session->userdata('id_unitkerja');
					}
					
					$nama_pegawai		= $this->input->post('nama_pegawai');
					$nip_pegawai		= $this->input->post('nip_pegawai');
					$jk_pegawai			= $this->input->post('jk_pegawai');
					$tempatlahir_pegawai= $this->input->post('tempatlahir_pegawai');
					$tgllahir_pegawai	= $this->input->post('tgllahir_pegawai');
					$goldarah			= $this->input->post('goldarah');
					$agama				= $this->input->post('agama');
					$hp					= $this->input->post('hp');
					$email				= $this->input->post('email_pegawai');
					$alamat				= $this->input->post('alamat_pegawai');
					$status				= $this->input->post('status_pegawai');
					$pendidikan_terakhir= $this->input->post('pendidikan_terakhir');
			
					$data = array(
						'id_unitkerja'			=> $id_unitkerja,
						'nama_pegawai'			=> strtolower($nama_pegawai),
						'nip_pegawai'			=> $nip_pegawai,
						'jk_pegawai'			=> $jk_pegawai,
						'tempatlahir_pegawai'	=> $tempatlahir_pegawai,
						'tgllahir_pegawai'		=> $tgllahir_pegawai,
						'goldarah'				=> $goldarah,
						'agama'					=> $agama,
						'hp'					=> $hp,
						'email_pegawai'			=> $email,
						'alamat_pegawai'		=> $alamat,
						'status_pegawai'		=> $status,
						'pendidikan_terakhir'	=> $pendidikan_terakhir,
						'foto'					=> $foto
					);
	            }
	            $this->m_datapegawai->edit('tb_pegawai',$data,$id);
				redirect(base_url('datapegawai'));
				
			}
			else{
				redirect(site_url('admin/datapegawai?pesan=Yah%20Gagal'));
			}			
			
		}
		else{
			if ($this->session->userdata('level')=="admin") {
				$id_unitkerja	= $this->input->post('id_unitkerja');
				$id_unitkerja = base64_decode($id_unitkerja);
				$id_unitkerja = (($id_unitkerja/8/42*2)*2);
			}
			elseif ($this->session->userdata('level')=="operator"){
				$id_unitkerja	= $this->session->userdata('id_unitkerja');
			}
			$nama_pegawai		= $this->input->post('nama_pegawai');
			$nip_pegawai		= $this->input->post('nip_pegawai');
			$jk_pegawai			= $this->input->post('jk_pegawai');
			$tempatlahir_pegawai= $this->input->post('tempatlahir_pegawai');
			$tgllahir_pegawai	= $this->input->post('tgllahir_pegawai');
			$goldarah			= $this->input->post('goldarah');
			$agama				= $this->input->post('agama');
			$hp					= $this->input->post('hp');
			$email				= $this->input->post('email_pegawai');
			$alamat				= $this->input->post('alamat_pegawai');
			$status				= $this->input->post('status_pegawai');
			$pendidikan_terakhir= $this->input->post('pendidikan_terakhir');

			$data = array(
				'id_unitkerja'			=> $id_unitkerja,
				'nama_pegawai'			=> strtolower($nama_pegawai),
				'nip_pegawai'			=> $nip_pegawai,
				'jk_pegawai'			=> $jk_pegawai,
				'tempatlahir_pegawai'	=> $tempatlahir_pegawai,
				'tgllahir_pegawai'		=> $tgllahir_pegawai,
				'goldarah'				=> $goldarah,
				'agama'					=> $agama,
				'hp'					=> $hp,
				'email_pegawai'			=> $email,
				'alamat_pegawai'		=> $alamat,
				'pendidikan_terakhir'	=> $pendidikan_terakhir,
				'status_pegawai'		=> $status
			);
			$this->m_datapegawai->edit('tb_pegawai',$data,$id);
			redirect(base_url('datapegawai'));
		}

	}


	public function hapus_proses($id)
	{
		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);
		
		$foto['data'] = $this->m_datapegawai->daftar_detail($id);
		$nama_foto = './assets/foto/'.$foto['data']['foto'];

		if(is_readable($nama_foto) && unlink($nama_foto)){
			$this->m_datapegawai->hapus('tb_pegawai',$id);
			redirect(base_url('datapegawai'));
		}
		else{
			redirect(site_url('admin/datapegawai?pesan=Yah%20Gagal'));
		}
	}

	public function download(){

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Simpeg Data Pegawai.xls");

		if ($this->session->userdata('level')=='admin') {
			$data = $this->m_datapegawai->daftar();
		}
		elseif ($this->session->userdata('level')=='operator') {
			$id = $this->session->userdata('id_unitkerja');
			$data = $this->m_datapegawai->daftar_o($id);
		}

		echo "
		<table border='1'>
			<tr>
				<th>No</th>
				<th>Nama Pegawai</th>
				<th>NIP Pegawai</th>
				<th>Tempat, Tanggal Lahir</th>				
				<th>Golongan Darah</th>				
				<th>Agama</th>				
				<th>Handphone</th>				
				<th>Email</th>				
				<th>Pendidikan Terakhir</th>				
				<th>Alamat</th>				
				<th>Status</th>				
				<th>Unit Kerja</th>				
				<th>Kepala</th>				
				<th>Status Unit Kerja</th>				
				<th>NPSN</th>				
				<th>Alamat Unit Kerja</th>				
				<th>Latitude</th>				
				<th>Longitude</th>				
				<th>Email Sekolah</th>				
				<th>Website</th>				
			</tr>
		";
		$no=1;
		foreach ($data as $value) {
			echo "
			<tr>
				<td>".$no++."</td>
				<td>".ucwords($value->nama_pegawai)."</td>
				<td>".$value->nip_pegawai."</td>
				<td>".ucwords($value->tempatlahir_pegawai.", ".date('d-m-Y', strtotime($value->tgllahir_pegawai)))."</td>
				<td>".ucwords($value->goldarah)."</td>
				<td>".ucwords($value->agama)."</td>
				<td>".ucwords($value->hp)."</td>
				<td>".ucwords($value->email_pegawai)."</td>
				<td>".ucwords($value->pendidikan_terakhir)."</td>
				<td>".ucwords($value->alamat_pegawai)."</td>
				<td>".strtoupper($value->status_pegawai)."</td>
				<td>".strtoupper($value->nama_unitkerja)."</td>
				<td>".ucwords($value->kepsek)."</td>
				<td>".strtoupper($value->status_unitkerja)."</td>
				<td>".$value->npsn."</td>
				<td>".ucwords($value->alamat)."</td>
				<td>".$value->latitude."</td>
				<td>".$value->longitude."</td>
				<td>".strtolower($value->email_sekolah)."</td>
				<td>".strtolower($value->website)."</td>
			</tr>
			";
		}
		exit;
	}

	public function download_detail($id)
	{

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Simpeg Data Pegawai.xls");

		$id = base64_decode($id);
		$id = (($id/8/42*2)*2);

		$data 	= $this->m_datapegawai->download_detail($id);


		echo "
		<table border='1'>
			<tr>
				<th>No</th>
				<th>Nama Pegawai</th>
				<th>NIP Pegawai</th>
				<th>Tempat, Tanggal Lahir</th>				
				<th>Golongan Darah</th>				
				<th>Agama</th>				
				<th>Handphone</th>				
				<th>Email</th>				
				<th>Pendidikan Terakhir</th>				
				<th>Alamat</th>				
				<th>Status</th>				
				<th>Unit Kerja</th>				
				<th>Kepala</th>				
				<th>Status Unit Kerja</th>				
				<th>NPSN</th>				
				<th>Alamat Unit Kerja</th>				
				<th>Latitude</th>				
				<th>Longitude</th>				
				<th>Email Sekolah</th>				
				<th>Website</th>				
			</tr>
		";
		$no=1;
		foreach ($data as $value) {
			echo "
			<tr>
				<td>".$no++."</td>
				<td>".ucwords($value->nama_pegawai)."</td>
				<td>".$value->nip_pegawai."</td>
				<td>".ucwords($value->tempatlahir_pegawai.", ".date('d-m-Y', strtotime($value->tgllahir_pegawai)))."</td>
				<td>".ucwords($value->goldarah)."</td>
				<td>".ucwords($value->agama)."</td>
				<td>".ucwords($value->hp)."</td>
				<td>".ucwords($value->email_pegawai)."</td>
				<td>".ucwords($value->pendidikan_terakhir)."</td>
				<td>".ucwords($value->alamat_pegawai)."</td>
				<td>".strtoupper($value->status_pegawai)."</td>
				<td>".strtoupper($value->nama_unitkerja)."</td>
				<td>".ucwords($value->kepsek)."</td>
				<td>".strtoupper($value->status_unitkerja)."</td>
				<td>".$value->npsn."</td>
				<td>".ucwords($value->alamat)."</td>
				<td>".$value->latitude."</td>
				<td>".$value->longitude."</td>
				<td>".strtolower($value->email_sekolah)."</td>
				<td>".strtolower($value->website)."</td>
			</tr>
			";
		}
		exit;
	}
}
