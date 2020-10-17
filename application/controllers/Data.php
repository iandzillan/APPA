<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->library('PHPExcel');

		$user = $this->session->userdata('penduduk');

		if ($this->session->userdata('penduduk') == null) {
			redirect('Login');
		}
	}

	public function index()
	{

		$url = "http://data.bandung.go.id/beta/index.php/portal/api/25a93b2b-7599-4369-bb2b-011d927019c8";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url, true);

		$data['judul'] 		= 'APPA >> Data Pengaduan Bandung 2017';
		$data['aktif'] 		= 'data';
		$this->load->view('data/index', $data);
	}

	public function index2()
	{

		$url = "http://data.bandung.go.id/beta/index.php/portal/api/f1bf5986-0b33-4c53-baee-bdb3e34cf105";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url, true);

		$data['judul'] 		= 'APPA >> Data Pengaduan Bandung 2008 - 2016';
		$data['aktif'] 		= 'data';
		$this->load->view('data/index2', $data);
	}

	public function index3()
	{

		$url = "http://data.bandung.go.id/beta/index.php/portal/api/cfffa160-c5ee-429e-b95d-05208f4586be";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url, true);

		$data['judul'] 		= 'APPA >> Data Pengaduan Bandung 2018';
		$data['aktif'] 		= 'data';
		$this->load->view('data/index3', $data);
	}
}