<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Profile');
<<<<<<< HEAD
        $this->load->model('M_Transaksi');
=======
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
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
        // session
<<<<<<< HEAD
        // $this->session->set_userdata('id', '2');
=======
        $this->session->set_userdata('id', '2');
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
        $user = $this->session->userdata('id');

        $kendaraan = $kendaraan->search($keyword);
        $merk = $this->M_Kendaraan->getMerk();
        $model = $this->M_Kendaraan->getModel();
        $tahun = $this->M_Kendaraan->getTahun();
        $mesin = $this->M_Kendaraan->getMesin();
        $warna = $this->M_Kendaraan->getWarna();
<<<<<<< HEAD
=======
        // $tahun = $this->M_Kendaraan->getTahun();
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'merk' => $merk,
            'model' => $model,
            'tahun' => $tahun,
            'mesin' => $mesin,
            'warna' => $warna,
<<<<<<< HEAD
            'user' => $user,
            'foto_profile' => $profile,
=======
            'profile' => $profile,
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
            'css' => 'list.css'
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

        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];

        $data = array(
            'detail' => $kendaraan,
            'iklan' => $iklan,
            'review' => $review,
            'total' => $total,
            'rating' => $rating,
<<<<<<< HEAD
            'foto_profile' => $profile,
=======
            'profile' => $profile,
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
            'title' => 'List Kendaraan',
            'whislist' => $love,
            'css' => 'kendaraan6.css'
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

            $profile = $this->M_Profile->getGambar($user);
            $profile = json_decode(json_encode($profile), true);
            $profile = $profile["0"];
            $profile = $profile['gambar'];

            $data = array(
                'id_user' => $user,
                'peminjam' => $peminjam,
                'alamat' => $alamat,
                'kendaraan' => $kendaraan,
                'durasi' => $durasi,
                'harga' => $total,
                'action' => 0
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $this->M_Kendaraan->bookingOrder($data);
            $data = array(
                'status' => 'Berhasil',
                'title' => 'Laporan Booking',
<<<<<<< HEAD
                'foto_profile' => $profile,
=======
                'profile' => $profile,
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
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
        redirect(base_url('/kendaraan/mobil/' . $id));
    }
    public function kendaraan_user($id)
    {
<<<<<<< HEAD
        $this->session->userdata('id', '2');
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
=======
        $kendaraan_user = $this->M_Kendaraan->getKendaraanUser($id);
        $data = array(
            'kendaraan' => $kendaraan_user,
            'title' => 'Kendaraan anda',
            'css' => 'transaksi_user.css'
        );
>>>>>>> 181a83630296c21c7f2f4e62a7c8f079652d106d
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan_user', $data);
        $this->load->view('/user/layout/footer');
    }
}
