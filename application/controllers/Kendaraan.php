<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
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
    public function detail($id)
    {
        $kendaraan = $this->M_Kendaraan->getDetailById($id);
        $data = array(
            'detail' => $kendaraan,
            'title' => 'List Kendaraan',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/admin/layout/header', $data);
        $this->load->view('/admin/detail', $data);
        $this->load->view('/admin/layout/footer');
    }
}
