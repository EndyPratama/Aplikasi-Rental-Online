<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Profile');
        $this->load->model('M_Transaksi');
        $this->load->model('M_Kendaraan');
    }
    public function index()
    {
        // $this->session->set_userdata('id', '1');
        $user = $this->session->userdata('id');
        $profile = $this->M_Profile->getProfileUser($user);

        $gambar = $this->M_Profile->getGambar($user);
        $gambar = json_decode(json_encode($gambar), true);
        $gambar = $gambar["0"];
        $gambar = $gambar['gambar'];
        $data = array(
            'foto_profile' => $gambar,
            'profile' => $profile,
            'title' => 'Setting',
            'css' => 'setting.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/setting', $data);
        $this->load->view('/admin/layout/footer');
    }
}
