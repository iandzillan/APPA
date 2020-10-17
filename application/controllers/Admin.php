<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$data['judul'] 		= 'APPA >> Data Admin';
		$data['aktif'] 		= 'admin';
		$data['admin']	    = $this->model_app->get_allAdmin()->result();
		$this->load->view('admin/index', $data);
	}

	public function tambah_proses()
    {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Username Tidak Boleh Kosong.</div>',
                    'is_unique' => '<div class="alert alert-danger"><strong>Error!</strong> Username Sudah Digunakan.</div>',
                    )
            );
        $this->form_validation->set_rules('password', 'Password', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password]|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password Tidak Boleh Kosong.</div>',
                    'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Sama.</div>',
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']      = 'APPA >> Data Admin';
            $data['aktif']      = 'admin';
            $data['admin']      = $this->model_app->get_allAdmin()->result();
            $data['modal_show'] = "$('#modal-fade').modal('show');";
            $this->load->view('admin/index', $data);
        }else{
            $this->model_app->tambahAdmin();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('admin');
        }
    }

    public function edit($id_admin)
    {
        $data['judul']      = 'APPA >> Edit Data admin';
        $data['aktif']      = 'admin';
        $data['admin']      = $this->model_app->get_idAdmin($id_admin)->row_array();
        $this->load->view('admin/edit', $data);
    }

    public function edit_proses($id_admin)
    {
        $this->form_validation->set_rules('nama_admin', 'Nama Admin', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Admin Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tempat Lahir Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Tanggal Lahir Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']      = 'APPA >> Edit Data admin';
            $data['aktif']      = 'admin';
            $data['admin']      = $this->model_app->get_idAdmin($id_admin)->row_array();
            $this->load->view('admin/edit', $data);
        }else{
            $this->model_app->editAdmin($id_admin);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('admin');
        }
    }

    public function hapus($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
        
        $this->session->set_flashdata('sukses_hapus','1');
        redirect('admin');
    }
}