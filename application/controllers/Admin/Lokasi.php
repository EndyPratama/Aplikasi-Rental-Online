<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Lokasi');
    }
    public function index()
    {
        $user = $this->M_Lokasi->getUser();
        $data = array(
            'user' => $user,
            'lokasi' => '112.1891442, -7.7655118',
            'title' => 'Lokasi Kendaraan',
            'css' => 'lokasi.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/lokasi', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function cari($id)
    {
        $user = $this->M_Lokasi->getUser();

        $alamat = $this->M_Lokasi->getLokasiId($id);
        $alamat = json_decode(json_encode($alamat), true);
        $alamat = $alamat["0"];
        $alamat = $alamat['alamat'];

        $data = array(
            'lokasi' => $alamat,
            'user' => $user,
            'title' => 'Lokasi Kendaraan',
            'css' => 'lokasi.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/lokasi', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function keyword($text)
    {
        $data = array(
            'data' => $this->M_Lokasi->getUserById($text)
        );
        // $data = $this->M_Lokasi->getUserById($text);

        // echo "<pre>";
        print_r($data);
        // echo "</pre>";
        // echo json_encode($data);
        // echo $data;
    }
    public function ambilData($key)
    {
        echo $key;
        // $data = $this->M_Lokasi->ambilData('user')->result();
        $data = $this->M_Lokasi->ambilData2($key);
        echo json_encode($data);
    }
}
