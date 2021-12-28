<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_wilayah");
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$data = $this->m_wilayah->hitung('tb_wilayah')->result();

		$data = array('data' => $data);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->load->view('welcome',$data);
	}
}
