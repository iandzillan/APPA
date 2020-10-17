<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		if ($this->session->userdata('penduduk') == null) {
			redirect('Login');
		}
	}

	public function index()
	{
		$user = $this->session->userdata('penduduk');

		if ($user['akses'] == 'admin') {
			redirect('Home/dashboard_admin');
		} else if ($user['akses'] == 'user') {
			redirect('Home/dashboard');
		}
	}

	public function dashboard_admin()
	{
		$data['judul'] 	= 'Aplikasi Pengaduan Kekerasan Perempuan dan Anak';
		$data['aktif'] 	= 'home';
		$data['semua'] 	= $this->model_app->get_aduan_all()->num_rows();
		$data['sudah'] 	= $this->model_app->get_aduan_id(0)->num_rows();
		$data['belum'] 	= $this->model_app->get_aduan_id(1)->num_rows();

		$this->load->view('home/index', $data);
	}

	public function dashboard()
	{
		$user = $this->session->userdata('penduduk');

		$data['judul'] 	= 'Aplikasi Pengaduan Kekerasan Perempuan dan Anak';
		$data['aktif'] 	= 'home';
		$data['semua'] 	= $this->model_app->get_aduan_nik($user['nik'])->num_rows();
		$data['sudah'] 	= $this->model_app->get_aduan_id_nik($user['nik'], 0)->num_rows();
		$data['belum'] 	= $this->model_app->get_aduan_id_nik($user['nik'], 1)->num_rows();

		$this->load->view('home/index', $data);
	}
}