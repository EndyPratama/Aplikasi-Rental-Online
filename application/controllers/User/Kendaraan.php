<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Profile');
        $this->load->model('M_Transaksi');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    public function akses()
    {
        if ($this->session->userdata('id') == NULL) {
            redirect(base_url('auth'));
        } else {
            return;
        }
    }
    private function _gambar()
    {
        if ($this->session->userdata('id') == 0) {
            $profile = 'default.jpg';
            return $profile;
        } else {
            $user = $this->session->userdata('id');
            $profile = $this->M_Profile->getGambar($user);
            $profile = json_decode(json_encode($profile), true);
            $profile = $profile["0"];
            $profile = $profile['gambar'];
            return $profile;
        }
    }
    // Read Data
    public function index()
    {
        $keyword = $this->input->post('keyword');
        if ($keyword) {
            $kendaraan = $this->M_Kendaraan;
        } else {
            $kendaraan = $this->M_Kendaraan;
        }
        $user = $this->session->userdata('id');

        $kendaraan = $kendaraan->search($keyword);
        $merk = $this->M_Kendaraan->getMerk();
        $model = $this->M_Kendaraan->getModel();
        $tahun = $this->M_Kendaraan->getTahun();
        $mesin = $this->M_Kendaraan->getMesin();
        $warna = $this->M_Kendaraan->getWarna();

        // if ($this->session->userdata('id') == 0) {
        // $profile = 'default.jpg';
        // } else {
        $profile = $this->_gambar();
        // }

        $data = array(
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'merk' => $merk,
            'model' => $model,
            'tahun' => $tahun,
            'mesin' => $mesin,
            'warna' => $warna,
            'profile' => $profile,
            'user' => $user,
            'foto_profile' => $profile,
            'css' => 'list2.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan', $data);
        $this->load->view('/user/layout/footer');
    }
    // Detail Kendaraan View User
    public function mobil($id)
    {
        $merk = $this->M_Kendaraan->cekData($id);
        $merk = json_decode(json_encode($merk), true);
        $merk = $merk["0"];
        $merk = $merk['merk'];

        $kendaraan = $this->M_Kendaraan->getDetailById($id);
        $iklan = $this->M_Kendaraan->getIklan($merk);

        $user = $this->session->userdata('id');

        if ($user == 0) {
            $nama = '';
        } else {
            $nama = $this->M_Profile->cekNama($user);
            $nama = json_decode(json_encode($nama), true);
            $nama = $nama["0"];
            $nama = $nama['name'];
        }

        $whislist = $this->M_Kendaraan->getWhislist($user, $id);
        if ($whislist == NULL) {
            $love = 'love1.png';
        } else {
            $love = 'love2.png';
        }

        $review = $this->M_Kendaraan->getReviewUser($id);
        $total = $this->M_Kendaraan->getReviewTotal($id);
        $total = json_decode(json_encode($total), true);
        $total = $total["0"];
        $total = $total['Count(id)'];

        $rating = $this->M_Kendaraan->getReviewRating($id);
        $rating = json_decode(json_encode($rating), true);
        $rating = $rating["0"];
        $rating = $rating['avg(rating)'];

        $profile = $this->_gambar();

        $data = array(
            'detail' => $kendaraan,
            'nama' => $nama,
            'iklan' => $iklan,
            'review' => $review,
            'total' => $total,
            'rating' => $rating,
            'profile' => $profile,
            'foto_profile' => $profile,
            'title' => 'List Kendaraan',
            'whislist' => $love,
            'css' => 'kendaraan7.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/detail', $data);
        $this->load->view('/user/layout/footer');
    }
    // Booking Kendaraan
    public function booking()
    {
        $this->akses();
        $id = $this->input->post('idUser');
        $cekUser = $this->M_Kendaraan->cekUser($id);
        $user = json_decode(json_encode($cekUser), true);

        $profile = $this->_gambar();

        $nama = $this->input->post('peminjam');
        $alamat = $this->input->post('alamat');
        $kendaraan = $this->input->post('kendaraan');
        $gambar = $this->input->post('gambar');
        $durasi = $this->input->post('durasi');
        $harga = $this->input->post('harga');

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'durasi' => $durasi,
            'profile' => $profile,
            'kendaraan' => $kendaraan,
            'gambar' => $gambar,
            'harga' => $harga,
            'foto_profile' => $profile,
            'title' => 'Detail Pesanan',
            'css' => 'laporan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/detail_booking', $data);
        $this->load->view('/user/layout/footer');
    }
    // Pesan kendaraan
    public function pesan()
    {
        $user = $this->session->userdata('id');


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

            // 
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $tgl_pnjm = $this->input->post('tgl_pnjm');
            $tgl_kmbl = $this->input->post('tgl_kmbl');
            $metode_pembayaran = $this->input->post('metode_pembayaran');
            $durasi = $this->input->post('quant[2]');
            $kendaraan = $this->input->post('nama_kendaraan');

            $supir = $this->input->post('supir');
            if ($supir == NULL) {
                $supir = 0;
            }

            $profile = $this->_gambar();

            $harga_kendaraan = $this->input->post('kendaraan');
            $total = $this->input->post('total');

            $d = date('d');
            $m = date('m');
            $y = date('Y');
            $iduser = $this->M_Profile->cekId($nama);
            $iduser = json_decode(json_encode($iduser), true);
            $iduser = $iduser["0"];
            $iduser = $iduser['id'];

            $idmbl = $this->M_Kendaraan->getIdKendaraan($kendaraan);
            $idmbl = json_decode(json_encode($idmbl), true);
            $idmbl = $idmbl["0"];
            $idmbl = $idmbl['id_kendaraan'];
            $kode = "$iduser$idmbl";

            $invoice = "INV/MBL/$y/$m/$d/$kode";

            $data = array(
                'id_user' => $this->session->userdata('id'),
                'peminjam' => $nama,
                'alamat' => $alamat,
                'kendaraan' => $kendaraan,
                'durasi' => $durasi,
                'tgl_pnjm' => $tgl_pnjm,
                'tgl_kmbl' => $tgl_kmbl,
                'metode_pembayaran' => $metode_pembayaran,
                'harga' => $harga_kendaraan,
                'supir' => $supir,
                'total' => $total,
                'bukti_transaksi' => "",
                'invoice' => $invoice,
                'action' => 0
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $this->M_Kendaraan->bookingOrder($data);
            $data = array(
                'status' => 'Berhasil',
                'title' => 'Laporan Booking',
                'profile' => $profile,
                'foto_profile' => $profile,
                'profile' => $profile,
                'css' => 'laporan.css'
            );
            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/laporan', $data);
            $this->load->view('/user/layout/footer');
        }
    }
    // Cek Filter Kendaraan
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

        // function gambar();

        $profile = $this->_gambar();

        $data = array(
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'merk' => $merk,
            'model' => $model,
            'tahun' => $tahun,
            'mesin' => $mesin,
            'warna' => $warna,
            'foto_profile' => $profile,
            'css' => 'list.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan', $data);
        $this->load->view('/user/layout/footer');
    }
    // Tampilkan Whislist Kendaraan User
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
        redirect(base_url('/user/kendaraan/mobil/' . $id));
    }
    public function kendaraan_user($id)
    {
        $user = $this->session->userdata('id');
        $kendaraan_user = $this->M_Kendaraan->getKendaraanUser($id);
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'kendaraan' => $kendaraan_user,
            'foto_profile' => $profile,
            'title' => 'Kendaraan anda',
            'css' => 'transaksi_user.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan_user', $data);
        $this->load->view('/user/layout/footer');
    }
}
