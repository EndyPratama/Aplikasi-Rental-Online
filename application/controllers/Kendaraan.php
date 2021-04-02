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
        // session
        $this->session->set_userdata('id', '7');


        $kendaraan = $this->M_Kendaraan->getKendaraan();
        $data = array(
            'kendaraan' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'list.css'
        );
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/kendaraan', $data);
        $this->load->view('/user/layout/footer');
    }
    public function detail($id)
    {
        $kendaraan = $this->M_Kendaraan->getDetailById($id);
        $data = array(
            'detail' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'detail.css'
        );
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

        // echo "<pre>";
        // print_r($iklan);
        // echo "</pre>";

        $data = array(
            'detail' => $kendaraan,
            'iklan' => $iklan,
            'title' => 'List Kendaraan',
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
}
