<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Contact');
        $this->load->model('M_Profile');
    }
    public function index()
    {
        // $kendaraan = $this->M_Kendaraan->getKendaraan();
        $user = $this->session->userdata('id');
        $history = $this->M_Contact->getHistoryPesan($user);
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];

        $nama = $this->M_Profile->cekNama($user);
        $nama = json_decode(json_encode($nama), true);
        $nama = $nama["0"];
        $nama = $nama['name'];

        $data = array(
            // 'kendaraan' => $kendaraan,
            'nama' => $nama,
            'title' => 'Contact Us',
            'css' => 'contact.css',
            'history' => $history,
            'profile' => $profile,
            'notif' => ''
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/contact', $data);
        $this->load->view('/user/layout/footer');
    }
    public function save()
    {
        $nama = $this->input->post('nama');
        $pesan = $this->input->post('pesan');
        $id = $this->M_Profile->cekId($nama);
        $id = json_decode(json_encode($id), true);
        $id = $id["0"];
        $id = $id['id'];

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'user_id' => $id,
            'pesan' => $pesan,
            'tanggal' => date("Y-m-d H:i:s"),
            'notif' => 1
        );
        $page = array(
            'title' => 'Contact Us',
            'css' => 'contact.css',
            'notif' => 'Terimakasih telah menghubungi kami'
        );

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->M_Contact->insertPesan($data);

        redirect(base_url('user/contact'));
    }
}
