<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class DataPenduduk extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}

	public function index_get()
	{
		$nik = $this->get('nik');
		if($nik === null){
			$data = $this->model_app->get_Penduduk()->result_array();
		} else {
			$data = $this->model_app->get_Penduduk($nik)->result_array();
		}

		if ($data){
			$this->response([
				'status' 	=> TRUE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> $data
			], REST_Controller::HTTP_OK); 
		}else{
			$this->response([
				'status' 	=> FALSE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> 'NIK Tidak Ditemukan'
			], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_delete()
	{
		$nik = $this->delete('nik');

		if($nik === null){
			$this->response([
				'status' 	=> FALSE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> 'Masukkan NIK!'
			], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if($this->model_app->hapusPenduduk($nik) > 0){
				$this->response([
					'status' 	=> TRUE,
					'data' 		=> 'API Data Penduduk APPA',
					'nik' 		=> $nik,
					'message'	=> 'NIK Terhapus'
				], REST_Controller::HTTP_OK);
			} else { 
				$this->response([
					'status' 	=> FALSE,
					'data' 		=> 'API Data Penduduk APPA',
					'message'	=> 'NIK Tidak Ditemukan'
				], REST_Controller::HTTP_BAD_REQUEST);
			}

		}
	}

	public function index_post()
	{
		$data = [
			'nik'        	=> $this->post('nik'),
			'nama'  		=> $this->post('nama'),
			'tempat_lahir'  => $this->post('tempat_lahir'),
			'tanggal_lahir'	=> $this->post('tanggal_lahir'),
			'jk'     		=> $this->post('jk'),
			'alamat'     	=> $this->post('alamat'),
			'nohp'   		=> $this->post('nohp'),
			'username'      => $this->post('username'),
			'password'      => MD5($this->post('password')),
		];

		if($this->model_app->tambahData($data) > 0){
			$this->response([
				'status' 	=> TRUE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> 'Data Berhasil Ditambahkan'
			], REST_Controller::HTTP_CREATED);
		}else{
			$this->response([
				'status' 	=> FALSE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> 'Gagal Menambahkan Data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function index_put()
	{
		$nik = $this->put('nik');

		$data = [
			'nama'  		=> $this->put('nama'),
			'tempat_lahir'  => $this->put('tempat_lahir'),
			'tanggal_lahir'	=> $this->put('tanggal_lahir'),
			'jk'     		=> $this->put('jk'),
			'alamat'     	=> $this->put('alamat'),
			'nohp'   		=> $this->put('nohp'),
			'username'      => $this->put('username'),
			'password'      => MD5($this->put('password')),
		];

		if($this->model_app->editData($data, $nik) > 0){
			$this->response([
				'status' 	=> TRUE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> 'Data Berhasil Diubah'
			], REST_Controller::HTTP_OK);
		}else{
			$this->response([
				'status' 	=> FALSE,
				'data' 		=> 'API Data Penduduk APPA',
				'message'	=> 'Gagal Mengubah Data'
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}