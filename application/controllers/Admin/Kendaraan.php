<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Profile');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $kendaraan = $this->M_Kendaraan->getKendaraan();
        $data = array(
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/Admin/layout/sidebar', $data);
        $this->load->view('/Admin/kendaraan', $data);
        $this->load->view('/Admin/layout/footer');
    }

    // CRUD
    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
    // Page Insert Data
    public function tambah()
    {
        $data = array(
            'title' => 'List Kendaraan',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/Admin/layout/sidebar', $data);
        $this->load->view('/Admin/tambah', $data);
        $this->load->view('/Admin/layout/footer');
    }
    // Pengolahan Insert Data
    public function insert()
    {
        $gambar = $_FILES['gambar'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './vendor/public/img';
            $config['allowed_types'] = 'jpg|png|jfif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Upload gagal";
                die();
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'mesin' => htmlspecialchars($this->input->post('mesin', true)),
            'bahan_bakar' => htmlspecialchars($this->input->post('bahan_bakar', true)),
            'model' => htmlspecialchars($this->input->post('model', true)),
            'warna' => htmlspecialchars($this->input->post('warna', true)),
            'merk' => htmlspecialchars($this->input->post('merk', true)),
            'tahun' => htmlspecialchars($this->input->post('tahun', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),
            'ketersediaan' => htmlspecialchars($this->input->post('ketersediaan', true)),
            'gambar' => $gambar
        ];
        $this->db->insert('kendaraan', $data);
        redirect(base_url('Admin/kendaraan'));
    }

    // Page Edit Data
    public function ubah($id)
    {
        $kendaraan = $this->M_Kendaraan->getKendaraanbyid($id);
        $data = array(
            'id_kendaraan' => $id,
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'kendaraan.css'
        );

        $this->load->view('/Admin/layout/sidebar', $data);
        $this->load->view('/Admin/ubah', $data);
        $this->load->view('/Admin/layout/footer');
    }
    // Pengolahan Edit Data
    public function edit()
    {
        $data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        $id = $this->input->post('id_kendaraan');
        $nama = $this->input->post('nama');
        $mesin = $this->input->post('mesin');
        $bahan_bakar = $this->input->post('bahan_bakar');
        $model = $this->input->post('model');
        $warna = $this->input->post('warna');
        $merk = $this->input->post('merk');
        $tahun = $this->input->post('tahun');
        $deskripsi = $this->input->post('deskripsi');
        $harga = $this->input->post('harga');
        $ketersediaan = $this->input->post('ketersediaan');
        $gambar = $this->input->post('gambar');

        $this->db->set('nama', $nama);
        $this->db->set('mesin', $mesin);
        $this->db->set('bahan_bakar', $bahan_bakar);
        $this->db->set('model', $model);
        $this->db->set('warna', $warna);
        $this->db->set('merk', $merk);
        $this->db->set('tahun', $tahun);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('harga', $harga);
        $this->db->set('ketersediaan', $ketersediaan);
        // $this->db->set('gambar', $gambar);
        $this->db->where('id_kendaraan', $id);
        $this->db->update('kendaraan');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">' .
                'Edit data kendaraan berhasil' .
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect(base_url('Admin/kendaraan'));
    }
    // Hapus Data
    public function hapus($id_kendaraan)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Hapus data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button></div>');
        $this->db->delete("kendaraan", array("id_kendaraan" => $id_kendaraan));
        redirect('Kendaraan');
    }
    // Read Data
    public function list()
    {
        $keyword = $this->input->post('keyword');
        if ($keyword) {
            $kendaraan = $this->M_Kendaraan;
        } else {
            $kendaraan = $this->M_Kendaraan;
        }
        // session
        // $this->session->set_userdata('id', '2');
        // $this->session->set_userdata('id', '2');
        // $this->session->set_userdata('id', '2');

        $kendaraan = $kendaraan->search($keyword);
        $merk = $this->M_Kendaraan->getMerk();
        $model = $this->M_Kendaraan->getModel();
        $tahun = $this->M_Kendaraan->getTahun();
        $mesin = $this->M_Kendaraan->getMesin();
        $warna = $this->M_Kendaraan->getWarna();
        // $tahun = $this->M_Kendaraan->getTahun();
        $data = array(
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'merk' => $merk,
            'model' => $model,
            'tahun' => $tahun,
            'mesin' => $mesin,
            'warna' => $warna,
            'css' => 'list.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/User/layout/header', $data);
        $this->load->view('/User/kendaraan', $data);
        $this->load->view('/User/layout/footer');
    }
    // Detail Kendaraan
    public function detail($id)
    {
        $kendaraan = $this->M_Kendaraan->getDetailById($id);

        $data = array(
            'detail' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'detail2.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/Admin/layout/sidebar', $data);
        $this->load->view('/Admin/detail', $data);
        $this->load->view('/Admin/layout/footer');
    }
}
