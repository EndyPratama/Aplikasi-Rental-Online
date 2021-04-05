<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->library('session');
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
    public function list()
    {
        $keyword = $this->input->post('keyword');
        if ($keyword) {
            $kendaraan = $this->M_Kendaraan;
        } else {
            $kendaraan = $this->M_Kendaraan;
        }
        // session
        $this->session->set_userdata('id', '7');

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
