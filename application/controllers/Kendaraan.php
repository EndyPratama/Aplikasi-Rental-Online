<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
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
        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/kendaraan', $data);
        $this->load->view('/admin/layout/footer');
    }

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

    public function insert()
    {
        // insert data barang


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
            'gambar' => htmlspecialchars($this->input->post('gambar', true))
        ];
        $this->db->insert('kendaraan', $data);
        redirect(base_url() . 'Kendaraan');
    }

    public function tambah()
    {
        // insert data kendaraan
        $data = array(
            'title' => 'List Kendaraan',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/tambah', $data);
        $this->load->view('/admin/layout/footer');
    }

    public function edit()
    {
        $data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        // edit data kendaraan
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
        $this->db->where('id_kendaraan', $id);
        $this->db->update('kendaraan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Kendaraan');
    }

    public function ubah($id)
    {
        // insert data kendaraan
        $kendaraan = $this->M_Kendaraan->getKendaraanbyid($id);
        $data = array(
            'id_kendaraan' => $id,
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'kendaraan.css'
        );

        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/ubah', $data);
        $this->load->view('/admin/layout/footer');
    }

    public function hapus($id_kendaraan)
    {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Hapus data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button></div>');
        $this->db->delete("kendaraan", array("id_kendaraan" => $id_kendaraan));
        redirect('Kendaraan');
    }

    public function transaksi()
    {
        $transaksi = $this->M_Kendaraan->getTransaksi();
        $data = array(
            'transaksi' => $transaksi,
            'title' => 'Histori Transaksi',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/transaksi', $data);
        $this->load->view('/admin/layout/footer');
    }

    public function selesai($kendaraan_id)
    {
        $data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        // edit data kendaraan

        $ketersediaan = '1';

        $this->db->set('ketersediaan', $ketersediaan);
        $this->db->where('id_kendaraan', $kendaraan_id);
        $this->db->update('kendaraan');

        $data['trans'] = $this->db->get('transaksi')->result_array();

        // edit data kendaraan

        $status = 'Selesai';

        $this->db->set('status', $status);
        $this->db->where('kendaraan_id', $kendaraan_id);
        $this->db->update('transaksi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Kendaraan/transaksi');
    }


    public function booking2()
    {
        $book = $this->M_Kendaraan->getBooking();
        $data = array(
            'booking' => $book,
            'title' => 'Daftar Booking',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/booking', $data);
        $this->load->view('/admin/layout/footer');
    }

    public function terima($id)
    {
        // Update Action
        $data['booking'] = $this->db->get('booking')->result_array();

        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $action = '1';

        $this->db->set('action', $action);
        $this->db->where('id', $id);
        $this->db->update('booking');

        // Update Ketersediaan
        $data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $ketersediaan = '0';
        $id_kendaraan = $this->M_Kendaraan->getIdKendaraan($id);

        $this->db->set('ketersediaan', $ketersediaan);
        $this->db->where('id_kendaraan', $id_kendaraan);
        $this->db->update('kendaraan');

        // Insert Transaksi
        $data['booking'] = $this->db->get('booking')->result_array();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $status = 'Tersewakan';
        $harga = $this->M_Kendaraan->getHarga($id);
        $id = $this->M_Kendaraan->getIdUser($id);
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d H:i:s");

        $databaru = [
            'user_id' => $id,
            'kendaraan_id' => $id_kendaraan,
            'tanggal' => $tanggal,
            'status' => $status,
            'harga' => $harga,
        ];
        // echo "<pre>";
        // print_r($databaru);
        // echo "</pre>";
        $this->db->insert('transaksi', $databaru);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        // redirect('Kendaraan/booking2');
        redirect(base_url('/kendaraan/booking2'));
    }


    public function tolak($id)
    {
        $data['booking'] = $this->db->get('booking')->result_array();

        $action = '2';

        $this->db->set('action', $action);
        $this->db->where('id', $id);
        $this->db->update('booking');
        redirect('Kendaraan/booking2');
    }

    public function list()
    {
        $keyword = $this->input->post('keyword');
        if ($keyword) {
            $kendaraan = $this->M_Kendaraan;
        } else {
            $kendaraan = $this->M_Kendaraan;
        }
        // session
        $this->session->set_userdata('id', '6');

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
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan', $data);
        $this->load->view('/user/layout/footer');
    }
    public function detail($id)
    {
        $kendaraan = $this->M_Kendaraan->getDetailById($id);
        // cek user apakah ada di whislist

        $data = array(
            'detail' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'detail.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/detail', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function mobil($id)
    {
        $merk = $this->M_Kendaraan->cekData($id);
        $merk = json_decode(json_encode($merk), true);
        $merk = $merk["0"];
        $merk = $merk['merk'];

        // echo "<pre>";
        // print_r($merk);
        // echo "</pre>";

        $kendaraan = $this->M_Kendaraan->getDetailById($id);
        $iklan = $this->M_Kendaraan->getIklan($merk);


        $user = $this->session->userdata('id');
        $whislist = $this->M_Kendaraan->getWhislist($user, $id);
        if ($whislist == NULL) {
            $love = 'love1.png';
        } else {
            $love = 'love2.png';
        }
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        $data = array(
            'detail' => $kendaraan,
            'iklan' => $iklan,
            'title' => 'List Kendaraan',
            'whislist' => $love,
            'css' => 'kendaraan2.css'
        );
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/detail', $data);
        $this->load->view('/user/layout/footer');
    }
    public function booking()
    {
        $id = $this->input->post('idUser');
        $cekUser = $this->M_Kendaraan->cekUser($id);
        $user = json_decode(json_encode($cekUser), true);
        if ($user == NULL) {
            $data = array(
                'status' => 'Gagal',
                'title' => 'Laporan Booking',
                'css' => 'laporan.css'
            );
            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/laporan', $data);
            $this->load->view('/user/layout/footer');
        } else {
            $user = $user["0"];
            $user = $user['id'];

            $peminjam = $this->input->post('peminjam');
            $alamat = $this->input->post('alamat');
            $kendaraan = $this->input->post('kendaraan');
            $durasi = $this->input->post('durasi');
            $total = $this->input->post('total');

            $data = array(
                'id_user' => $user,
                'peminjam' => $peminjam,
                'alamat' => $alamat,
                'kendaraan' => $kendaraan,
                'durasi' => $durasi,
                'harga' => $total,
                'action' => 0
            );
            $this->M_Kendaraan->bookingOrder($data);
            $data = array(
                'status' => 'Berhasil',
                'title' => 'Laporan Booking',
                'css' => 'laporan.css'
            );
            // echo "<pre>";
            // print_r($user);
            // print_r($data);
            // echo "</pre>";
            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/laporan', $data);
            $this->load->view('/user/layout/footer');
        }
    }
    public function filter()
    {
        $model = $this->input->post('model');
        $tahun = $this->input->post('tahun');
        $mesin = $this->input->post('mesin');
        $warna = $this->input->post('warna');
        $data = array(
            'model' => $model,
            'tahun' => $tahun,
            'mesin' => $mesin,
            'warna' => $warna
        );
        $kendaraan = $this->M_Kendaraan->getKendaraanByFilter($model, $tahun, $mesin, $warna);
        $merk = $this->M_Kendaraan->getMerk();
        $model = $this->M_Kendaraan->getModel();
        $tahun = $this->M_Kendaraan->getTahun();
        $mesin = $this->M_Kendaraan->getMesin();
        $warna = $this->M_Kendaraan->getWarna();
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
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan', $data);
        $this->load->view('/user/layout/footer');
    }
    public function whislist($id)
    {
        $user = $this->session->userdata('id');
        $whislist = $this->M_Kendaraan->getWhislist($user, $id);
        if ($whislist == NULL) {
            $user = $this->session->userdata('id');
            $kendaraan = $id;
            $data = array(
                'id_user' => $user,
                'id_kendaraan' => $kendaraan
            );
            $this->M_Kendaraan->saveWhislist($data);
        } else {
            $whislist = json_decode(json_encode($whislist), true);
            $whislist = $whislist["0"];
            $whislist = $whislist['id'];
            // echo "<pre>";
            // print_r($whislist);
            // echo "</pre>";
            $this->M_Kendaraan->deleteWhislist($whislist);
        }

        // $user = $this->session->userdata('id');
        // $kendaraan = $id;
        // $data = array(
        //     'id_user' => $user,
        //     'id_kendaraan' => $kendaraan
        // );
        // $this->M_Kendaraan->saveWhislist($data);

        redirect(base_url('/kendaraan/mobil/' . $id));
        /*
            id whislist
            id_user
            id_kendaraan

            cek id _user dan id_kendaraan apakah sudah ada di whistlist?
            jika blm maka insert
            jika sudah maka delete
        */
    }
}
