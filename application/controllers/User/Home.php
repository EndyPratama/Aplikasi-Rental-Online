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
            $data = array(
                'title' => 'Home',
                'profile' => 'default.jpg',
                'foto_profile' => 'default.jpg',
                'css' => 'home.css'
            );
            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/home', $data);
            $this->load->view('/user/layout/footer');
        } else {
            $user = $this->session->userdata('id');

            $profile = $this->M_Profile->getGambar($user);
            $profile = json_decode(json_encode($profile), true);
            $profile = $profile["0"];
            $profile = $profile['gambar'];

            // $rating = $this->M_Kendaraan->getReviewRating($id);
            // $rating = json_decode(json_encode($rating), true);
            // $rating = $rating["0"];
            // $rating = $rating['avg(rating)'];
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
                'css' => 'home2.css'
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";

            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/home', $data);
            $this->load->view('/user/layout/footer');
        }
    }
    public function cekinvoice()
    {
        $keyword = $this->input->post('keyword');
        $invoice = $this->M_Transaksi->cekInvoice($keyword);
        // echo "<pre>";
        // print_r($invoice);
        // echo "</pre>";
        echo json_encode($invoice);
    }
}
