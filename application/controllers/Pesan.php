<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pesan');
    }
    public function index()
    {
        // $pesan = $this->M_Pesan->getPesan();
        // $user = $this->session->userdata('id');
        // $history = $this->M_Pesan->getHistoryPesan($user);
        $pesan = $this->M_Pesan->getPesan();
        $jawaban = $this->M_Pesan->getJawaban();
        $data = array(
            'pesan' => $pesan,
            'jawaban' => $jawaban,
            'title' => 'Pesan Masuk',
            'css' => 'pesan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/pesan', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function list()
    {
        echo "Haiii";
    }
    public function tanggapan()
    {
        $id = $this->input->post('id_pesan');
        $jawaban = $this->input->post('jawaban');
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_pesan' => $id,
            'jawaban' => $jawaban,
            'tanggal' => date("Y-m-d H:i:s")
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->M_Pesan->insertJawaban($data);
        $this->M_Pesan->updatePesan($id);

        redirect(base_url('/pesan'));
    }
}
