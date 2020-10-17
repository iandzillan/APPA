<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

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
		$data['judul'] 		= 'APPA >> Data Keluhan';
		$data['aktif'] 		= 'pengaduan';
		$data['pengaduan'] = $this->model_app->get_allPengaduan()->result();
		$this->load->view('pengaduan/index', $data);
	}

	public function data()
    {
        $user = $this->session->userdata('penduduk');
        $data['judul']      = "APPA >> Data Keluhan ".$user['nama'];
        $data['aktif']      = 'data';
        $data['pengaduan'] = $this->model_app->get_pelapor($user['nik'])->result();
        $this->load->view('pengaduan/index', $data);
    }

    public function tambah()
    {
        $data['judul']      = 'APPA >> Input Data Keluhan';
        $data['aktif']      = 'input';
        $this->load->view('pengaduan/input', $data);
    }

    public function tambah_proses()
    {
        $this->form_validation->set_rules('pengaduan', 'Pengaduan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger">Gagal! Form Pengaduan Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']      = 'APPA >> Input Data Keluhan';
            $data['aktif']      = 'input';
            $this->load->view('pengaduan/input', $data);
        }else{
            //setting config untuk library upload
            $config['upload_path']      = './upload';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']         = 1000000000;
            $config['max_width']        = 1024000;
            $config['max_height']       = 768000;

            //pemanggilan librabry upload
            $this->load->library('upload', $config);

            //jika upload gagal
            if ( ! $this->upload->do_upload('foto'))
            {
                $data['judul']      = 'APPA >> Input Data Keluhan';
                $data['aktif']      = 'input';
                $this->session->set_flashdata('gagal_tambah','1');
                $this->load->view('pengaduan/input', $data);
                //jika upload berhasil
            }else{
                $gambar = $this->upload->data();
                $this->model_app->tambahPengaduan($gambar['file_name']);
                $this->session->set_flashdata('sukses_tambah','1');
                redirect('pengaduan/data');
            }
        }
    }

    public function detail($id_pengaduan)
    {
        $data['judul']      = 'APPA >> Keluhan >> Detail';
        $data['aktif']      = 'data';
        $data['pengaduan']  = $this->model_app->get_idPengaduan($id_pengaduan)->row_array();
        $this->load->view('pengaduan/detail', $data);
    }

    public function edit($id_pengaduan)
    {
        $data['judul']      = 'APPA >> Edit Data Keluhan';
        $data['aktif']      = 'data';
        $data['pengaduan']  = $this->model_app->get_idPengaduan($id_pengaduan)->row_array();
        $this->load->view('pengaduan/edit', $data);
    }

    public function edit_proses2($id_pengaduan)
    {
        $this->form_validation->set_rules('pengaduan', 'Pengaduan', 'required|trim',
                array(
                    'required' => '<div class="alert alert-danger">Gagal! Form Pengaduan Tidak Boleh Kosong.</div>'
                    )
            );

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data['judul']      = 'APPA >> Edit Data Keluhan';
            $data['aktif']      = 'input';
            $data['pengaduan']  = $this->model_app->get_idPengaduan($id_pengaduan)->row_array();
            $this->load->view('pengaduan/input', $data);
        }else{
            if ($_FILES["foto"]["name"] == "") {
                $foto_lama = $this->input->post('foto_lama');
                $this->model_app->edit_proses($id_pengaduan, $foto_lama);
                $this->session->set_flashdata('sukses_edit','1');
                redirect('pengaduan/data');
            } else {
                //setting config untuk library upload
                $config['upload_path']      = './upload';
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = 1000000000;
                $config['max_width']        = 1024000;
                $config['max_height']       = 768000;

                //pemanggilan librabry upload
                $this->load->library('upload', $config);

                //jika upload gagal
                if ( ! $this->upload->do_upload('foto'))
                {
                    $data['judul']      = 'APPA >> Edit Data Keluhan';
                    $data['aktif']      = 'data';
                    $data['pengaduan']  = $this->model_app->get_idPengaduan($id_pengaduan)->row_array();
                    $this->load->view('pengaduan/edit', $data);
                    //jika upload berhasil
                }else{
                    $foto_lama = $this->input->post('foto_lama');
                    $query = $this->db->query("SELECT * FROM pengaduan WHERE file = '$foto_lama' ")->row()->file;
                    $file = './upload/'.$query;
                    unlink($file);

                    $gambar = $this->upload->data();
                    $file   = $gambar['file_name']; 
                    $this->model_app->edit_proses($id_pengaduan, $file);


                    $this->session->set_flashdata('sukses_edit','1');
                    redirect('pengaduan/data');
                }
            }
        }
    }

    public function edit_proses($id_pengaduan)
    {
        $admin = $this->session->userdata('penduduk');

        $status = $this->model_app->get_idPengaduan($id_pengaduan)->row()->status;

        if ($status == 1) {
            $data = array(
                'status'    => 0,
                'id_admin'  => $admin['id_admin']
            );
        } else {
            $data = array(
                'status'    => 1,
                'id_admin'  => $admin['id_admin']
            );
        }

            $this->db->where('id_pengaduan', $id_pengaduan);
            $this->db->update('pengaduan', $data);

            redirect('Pengaduan');
    }

    public function hapus($id_pengaduan)
    {
        $query = $this->db->query("SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan' ")->row()->file;
        // $file = base_url('upload/'.$q);
        $file = './upload/'.$query;
        unlink($file);

        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->delete('pengaduan');

        $this->session->set_flashdata('sukses_hapus','1');
        $user = $this->session->userdata('penduduk');
        if ($user['akses'] == 'admin') {
            redirect('pengaduan');
        } else {
            redirect('pengaduan/data');
        }
    }

}