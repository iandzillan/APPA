<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_server extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        $data['judul'] 		= 'APPA >> API Data APPA';
		$data['aktif'] 		= 'api';
        $this->load->view('api/index', $data);
    }
}
