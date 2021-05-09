<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profile');
        $this->load->model('M_Transaksi');
        $this->load->model('M_Kendaraan');
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
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'title' => 'Profile',
            'gambar_profile' => $profile,
            'user' => $nama,
            'role' => $role,
            'pesanan' => $pesanan,
            'profile' => $profile,
            'whislist' => $favorite,
            'css' => 'profile3.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/profile', $data);
        $this->load->view('/user/layout/footer');
    }
    public function history($data = NULL)
    {
        $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');
        // echo $user;
        $kendaraan = $this->M_Transaksi->getTransaksiKendaraan($user, $data);
        $merk = $this->M_Kendaraan->getMerk();
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'kendaraan' => $kendaraan,
            'merk' => $merk,
            'profile' => $profile,
            'title' => 'Daftar Transaksi',
            'css' => 'transaksi_user.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/history', $data);
        $this->load->view('/user/layout/footer');
    }
    public function ulasan_user()
    {
        $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'title' => 'Ulasan Anda',
            'profile' => $profile,
            'css' => 'ulasan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/ulasan', $data);
        $this->load->view('/user/layout/footer');
    }
}
