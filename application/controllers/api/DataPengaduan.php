<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class DataPengaduan extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}

	public function index_get()
	{
		$id_pengaduan = $this->get('id_pengaduan');
		if($id_pengaduan === null){
			$data = $this->model_app->get_pengaduan()->result_array();
		} else {
			$data = $this->model_app->get_pengaduan($id_pengaduan)->result_array();
		}

		if ($data){
			$this->response([
				'status' 			=> TRUE,
				'data' 				=> 'API Data Pengaduan APPA',
				'Keterangan Status'	=> 'Pengaduan Yang Belum ditindak',
				'message'			=> $data
			], REST_Controller::HTTP_OK); 
		}else{
			$this->response([
				'status' 	=> FALSE,
				'data' 		=> 'API Data Pengaduan APPA',
				'message'	=> 'ID Tidak Ditemukan'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}