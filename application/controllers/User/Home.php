<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Profile');
        $this->load->model('M_Transaksi');
        // if ($this->session->userdata('id') == NULL) {
        //     // redirect(base_url('auth'));
        //     echo "Loh kok";
        // }
    }
    public function index()
    {
        if ($this->session->userdata('id') == 0) {
            $merk = $this->M_Kendaraan->getMerk();
            $model = $this->M_Kendaraan->getModel();
            $tahun = $this->M_Kendaraan->getTahun();
            $mesin = $this->M_Kendaraan->getMesin();
            $warna = $this->M_Kendaraan->getWarna();

            $kendaraan = $this->M_Kendaraan->search();

            $data = array(
                'title' => 'Home',
                'merk' => $merk,
                'model' => $model,
                'tahun' => $tahun,
                'mesin' => $mesin,
                'warna' => $warna,
                'kendaraan' => $kendaraan,
                'profile' => 'default.jpg',
                'foto_profile' => 'default.jpg',
                'css' => 'home3.css'
            );
            $this->load->view('/User/layout/header', $data);
            $this->load->view('/User/home', $data);
            $this->load->view('/User/layout/footer');
        } else {
            $user = $this->session->userdata('id');

            $profile = $this->M_Profile->getGambar($user);
            $profile = json_decode(json_encode($profile), true);
            $profile = $profile["0"];
            $profile = $profile['gambar'];

            $merk = $this->M_Kendaraan->getMerk();
            $model = $this->M_Kendaraan->getModel();
            $tahun = $this->M_Kendaraan->getTahun();
            $mesin = $this->M_Kendaraan->getMesin();
            $warna = $this->M_Kendaraan->getWarna();

            $kendaraan = $this->M_Kendaraan->search();

            $data = array(
                'title' => 'Home',
                'merk' => $merk,
                'model' => $model,
                'tahun' => $tahun,
                'mesin' => $mesin,
                'warna' => $warna,
                'profile' => $profile,
                'kendaraan' => $kendaraan,
                'foto_profile' => $profile,
                'css' => 'home3.css'
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";

            $this->load->view('/User/layout/header', $data);
            $this->load->view('/User/home', $data);
            $this->load->view('/User/layout/footer');
        }
    }
    public function cekinvoice()
    {
        $keyword = $this->input->post('keyword');
        // $keyword = "INV/MBL/2021/06/18/217/113356";
        // $keyword = "INV/MBL/2021/06/18/216/120115";
        $invoice = $this->M_Transaksi->cekInvoice($keyword);
        $action = json_decode(json_encode($invoice), true);
        $action = $action["0"];
        $action = $action['action'];
        if ($action != -1 && $action != 0) {    //jika sudah diterima dan masuk transaksi
            // echo "Masuk If";
            $invoice = $invoice = $this->M_Transaksi->cekInvoiceTransaksi($keyword);
        } else if ($action == 0) {
            // echo "Masuk Else If";
            $invoice = $this->M_Transaksi->cekInvoice($keyword);
            $invoice = json_decode(json_encode($invoice), true);
            $invoice["0"]["status"] = "Mengajukan Pesanan";
        } else if ($action == -1) {
            // echo "Masuk Else";
            $invoice = $this->M_Transaksi->cekInvoice($keyword);
            $invoice = json_decode(json_encode($invoice), true);
            $invoice["0"]["status"] = "Dibatalkan";
        }
        // echo "<pre>";
        // print_r($invoice);
        // echo "</pre>";
        echo json_encode($invoice);
    }
}
