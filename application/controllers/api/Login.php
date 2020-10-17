<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}

	public function index_get()
	{
		$data    = $this->model_app->all_login();
		$this->response($data);
	}

	public function index_post(){
		$response = $this->model_app->userLogin($this->post('username'), md5($this->post('password')));
		$this->response($response);
	}

	public function id_post(){
		$response = $this->model_app->get_login($this->post('nik'));
		$this->response($response);
	}
}