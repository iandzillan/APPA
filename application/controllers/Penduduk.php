<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penduduk extends CI_Controller {
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
		$data['judul'] 		= 'APPA >> Data Penduduk';
		$data['aktif'] 		= 'penduduk';
		$data['penduduk']	= $this->model_app->get_allPenduduk()->result();
		$this->load->view('penduduk/index', $data);
	}

	public function tambah_proses()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',
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
        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']      = 'APPA >> Data Penduduk';
            $data['aktif']      = 'penduduk';
            $data['penduduk']   = $this->model_app->get_allPenduduk()->result();
            $data['modal_show'] = "$('#modal-fade').modal('show');";
            $this->load->view('penduduk/index', $data);
        }else{
            $this->model_app->tambahPenduduk();
            $this->session->set_flashdata('sukses_tambah','1');
            redirect('penduduk');
        }
    }

    public function detail($nik)
    {
        $data['judul']      = 'APPA >> Penduduk >> Detail';
        $data['aktif']      = 'penduduk';
        $data['penduduk']   = $this->model_app->get_nik($nik)->row_array();
        $data['keluhan']    = $this->model_app->get_pelapor($nik)->num_rows();
        $data['belum']      = $this->model_app->get_aduan_id_nik($nik, 1)->num_rows();
        $data['sudah']      = $this->model_app->get_aduan_id_nik($nik, 0)->num_rows();
        $this->load->view('penduduk/detail', $data);
    }

    public function edit($nik)
    {
        $data['judul']      = 'APPA >> Edit Data penduduk';
        $data['aktif']      = 'penduduk';
        $data['penduduk']  = $this->model_app->get_nik($nik)->row_array();
        $this->load->view('penduduk/edit', $data);
    }

    public function edit_proses($nik)
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger"><strong>Error!</strong> NIK Tidak Boleh Kosong.</div>'
                    )
            );
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',
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

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']      = 'APPA >> Edit Data penduduk';
            $data['aktif']      = 'penduduk';
            $data['penduduk']   = $this->model_app->get_nik($nik)->row_array();
            $this->load->view('penduduk/edit', $data);
        }else{
            $this->model_app->editPenduduk($nik);
            $this->session->set_flashdata('sukses_edit','1');
            redirect('penduduk');
        }
    }

    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('penduduk');
        
        $this->session->set_flashdata('sukses_hapus','1');
        redirect('penduduk');
    }
}