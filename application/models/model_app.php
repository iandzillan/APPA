<?php

class Model_app extends CI_Model{

    public $variable;

    function __construct()
    {
        parent::__construct();
    }



    //Model For Login
    public function cek($u, $p)
    {
        $this->db->where('username', $u);
        $this->db->where('password', $p);

        return $this->db->get('admin');
    }

    public function cek_user($u, $p)
    {
        $this->db->where('username', $u);
        $this->db->where('password', $p);

        return $this->db->get('penduduk');
    }

    public function cek_register($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get('penduduk');
    }

    public function register($nik)
    {
        $data = array(
            'username'  => $this->input->post('val-username'),
            'password'  => MD5($this->input->post('val-password'))
        );

        $this->db->where('nik', $nik);
        $this->db->update('penduduk', $data);
    }
    // End Login Model



    //Model For Home
    public function get_aduan_all()
    {
        return $this->db->get('pengaduan');
    }

    public function get_aduan_nik($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get('pengaduan');
    }

    public function get_aduan_id($status)
    {
        $this->db->where('status', $status);
        return $this->db->get('pengaduan');
    }

    public function get_aduan_id_nik($nik, $status)
    {
        $this->db->where('nik', $nik);
        $this->db->where('status', $status);
        return $this->db->get('pengaduan');
    }
    //End Home Model



    //Model For Penduduk
    public function get_allPenduduk()
    {
        $query = $this->db->query("SELECT * FROM penduduk"); 
        return $query;
    }

    public function get_nik($nik)
    {
        $query = $this->db->query("SELECT * FROM penduduk A
            WHERE A.nik = '$nik'
            "); 
        return $query;
    }

    public function tambahPenduduk()
    {
        $data = array(
            'nik'           => $this->input->post('nik'),
            'nama'          => $this->input->post('nama'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk'            => $this->input->post('jk'),
            'alamat'        => $this->input->post('alamat'),
            'nohp'          => $this->input->post('nohp'),
        );

        $this->db->insert('penduduk', $data);
    }

    public function editPenduduk($nik)
    {
        $data = array(
            'nama'          => $this->input->post('nama'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk'            => $this->input->post('jk'),
            'alamat'        => $this->input->post('alamat'),
            'nohp'          => $this->input->post('nohp'),

        );

        $this->db->where('nik', $nik);
        $this->db->update('penduduk', $data);
    }
    //End Penduduk Model



    //Model for Pengaduan
    public function get_allPengaduan()
    {
        $query = $this->db->query("SELECT * FROM penduduk A, pengaduan B
            WHERE A.nik = B.nik
            ");
        return $query;
    }

    public function get_pelapor($nik)
    {
        $query = $this->db->query("SELECT * FROM penduduk A, pengaduan B
            WHERE A.nik = B.nik
            AND A.nik = '$nik'
            ");
        return $query;
    }

    public function get_idPengaduan($id_pengaduan)
    {
        $query = $this->db->query("SELECT * FROM pengaduan A
            LEFT JOIN penduduk B ON B.nik = A.nik
            LEFT JOIN admin C ON C.id_admin = A.id_admin
            WHERE A.id_pengaduan = $id_pengaduan
            ");    
        return $query;
    }

    public function tambahPengaduan($file)
    {
        $user       = $this->session->userdata('penduduk');
        $nik        = $user['nik'];
        $tanggal    = date('d-m-Y');
        $pengaduan  = $this->input->post('pengaduan');
        $kategori   = $this->input->post('kategori');
        $lat        = $this->input->post('lat');
        $long       = $this->input->post('long');
        $lokasi     = $this->input->post('lokasi');
        $status     = 1;

        $data = array(
            'nik'       => $nik,
            'tanggal'   => $tanggal,
            'pengaduan' => $pengaduan,
            'kategori'  => $kategori,
            'lat'       => $lat,
            'long'      => $long,
            'lokasi'    => $lokasi,
            'file'      => $file,
            'status'    => $status
        );

        $this->db->insert('pengaduan', $data);
    }

    public function edit_proses($id_pengaduan, $file)
    {
        $data = array(
            'pengaduan' => $this->input->post('pengaduan'),
            'kategori'  => $this->input->post('kategori'),
            'lat'       => $this->input->post('lat'),
            'long'      => $this->input->post('long'),
            'lokasi'    => $this->input->post('lokasi'),
            'file'      => $file
        );

        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('pengaduan', $data);
    }
    //End Pengaduan Model



    //Model For Admin
    public function get_allAdmin()
    {
        return $this->db->get('admin');
    }

    public function get_idAdmin($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        return $this->db->get('admin');
    }

    public function tambahAdmin()
    {
        $data = array(
            'nama_admin'    => $this->input->post('nama_admin'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk'            => $this->input->post('jk'),
            'username'      => $this->input->post('username'),
            'password'      => MD5($this->input->post('password')),
        );

        $this->db->insert('admin', $data);
    }

    public function editAdmin($id_admin)
    {
        $data = array(
            'nama_admin'    => $this->input->post('nama_admin'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk'            => $this->input->post('jk')
        );

        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $data);
    }
    //End Admin Model



    //Model For API Penduduk
    public function get_Penduduk($nik = null)
    {
        if ($nik === null){            
            $query = $this->db->query("SELECT nik, nama, tempat_lahir, tanggal_lahir, jk, alamat, nohp FROM penduduk");
            return $query;
        }else{
            $query = $this->db->query("SELECT nik, nama, tempat_lahir, tanggal_lahir, jk, alamat, nohp FROM penduduk
                WHERE nik = $nik
                ");
            return $query;
        }
    }

    public function hapusPenduduk($nik)
    {

        $this->db->where('nik', $nik);
        $this->db->delete('penduduk');

        return $this->db->affected_rows();
    }

    public function tambahData($data){
        $this->db->insert('penduduk' ,$data);
        return $this->db->affected_rows();
    }

    public function editData($data, $nik){
       $this->db->where('nik', $nik);
        $this->db->update('penduduk', $data);
        return $this->db->affected_rows();
    }
    // End API Penduduk model



    //Model For API Pengaduan
    public function get_pengaduan($id_pengaduan = null)
    {
        if ($id_pengaduan === null){            
            $query = $this->db->query("SELECT A.id_pengaduan, B.nama, B.nohp, A.tanggal, A.kategori, A.pengaduan, A.status, A.lat, A.long, A.lokasi FROM pengaduan A, penduduk B
                WHERE A.nik = B.nik
                AND A.status = 1;
                ");
            return $query;
        }else{
            $query = $this->db->query("SELECT A.id_pengaduan, B.nama, B.nohp, A.tanggal, A.kategori, A.pengaduan, A.status, A.lat, A.long, A.lokasi FROM pengaduan A, penduduk B
                WHERE A.nik = B.nik
                AND A.id_pengaduan = $id_pengaduan
                AND A.status = 1;
                ");
            return $query;
        }
    }


    //Model For Login API
    public function all_login()
    {
        $query = $this->db->get("penduduk")->result();
        $response['status']=200;
        $response['error']=false;
        $response['login']=$query;
        return $response;
    }

    public function userLogin($username, $password)
    {
        $query = $this->db->get_where('penduduk',array('username'=>$username, 'password'=>$password));
        if ($query->num_rows() > 0) {
            $response['status']=200;
            $response['error']=false;
            $response['data']=$query->result();
            $response['message']='success';  
        } else {
          $response['status']=502;
          $response['error']=true;
          $response['data']=null;
          $response['message']='Email atau password salah';
      }
        return $response;
    }

    // mengambil data login tertentu
  public function get_login($nik){
    $query = $this->db->get_where('penduduk',array('nik'=>$nik));
    $response['status']=200;
    $response['error']=false;
    $response['data']=$query->result();
    $response['message']='success';
    return $response;

  }
}