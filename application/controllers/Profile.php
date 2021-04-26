<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profile');
    }
    public function index()
    {
        $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');

        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];

        $nama = $this->M_Profile->cekNama($user);
        $nama = json_decode(json_encode($nama), true);
        $nama = $nama["0"];
        $nama = $nama['name'];
        $role_id = $this->M_Profile->cekRole($user);
        $role_id = json_decode(json_encode($role_id), true);
        $role_id = $role_id["0"];
        $role_id = $role_id['role_id'];
        if ($role_id == 1) {
            $role = 'Admin';
        } else {
            $role = 'User';
        }
        $pesanan = $this->M_Profile->getDataPesanan($user);
        $favorite = $this->M_Profile->getWhislist($user);
        $data = array(
            'title' => 'Profile',
            'gambar_profile' => $profile,
            'user' => $nama,
            'role' => $role,
            'pesanan' => $pesanan,
            'whislist' => $favorite,
            'css' => 'profile2.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/profile', $data);
        $this->load->view('/user/layout/footer');
    }
}
