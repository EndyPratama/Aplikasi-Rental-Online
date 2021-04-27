<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin');
    }
    public function index()
    {
        $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');
        $nama = $this->M_Admin->cekNama($user);
        $nama = json_decode(json_encode($nama), true);
        $nama = $nama["0"];
        $nama = $nama['name'];
        $role_id = $this->M_Admin->cekRole($user);
        $role_id = json_decode(json_encode($role_id), true);
        $role_id = $role_id["0"];
        $role_id = $role_id['role_id'];
        if ($role_id == 1) {
            $role = 'Admin';
        } else {
            $role = 'User';
        }
        $pendapatan = $this->M_Admin->cekPendapatan();
        $pendapatan = json_decode(json_encode($pendapatan), true);
        $pendapatan = $pendapatan["0"];
        $pendapatan = $pendapatan['SUM(harga)'];
        // select sum(harga) where 1;
        $kendaraan = $this->M_Admin->getJumlahKendaraan();
        $kendaraan = json_decode(json_encode($kendaraan), true);
        $kendaraan = $kendaraan["0"];
        $kendaraan = $kendaraan['COUNT(id_kendaraan)'];
        $member = $this->M_Admin->getMember();
        $member = json_decode(json_encode($member), true);
        $member = $member["0"];
        $member = $member['COUNT(id)'];
        $diterima = $this->M_Admin->getBookingTerima();
        $diterima = json_decode(json_encode($diterima), true);
        $diterima = $diterima["0"];
        $diterima = $diterima['COUNT(id)'];
        $ditolak = $this->M_Admin->getBookingTolak();
        $ditolak = json_decode(json_encode($ditolak), true);
        $ditolak = $ditolak["0"];
        $ditolak = $ditolak['COUNT(id)'];
        $data = array(
            'title' => 'Account',
            'nama' => $nama,
            'role' => $role,
            'pendapatan' => $pendapatan,
            'kendaraan' => $kendaraan,
            'member' => $member,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'css' => 'user.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/admin', $data);
        $this->load->view('/admin/layout/footer');
    }
}
