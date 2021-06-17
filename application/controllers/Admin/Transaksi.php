<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transaksi');
        if ($this->session->userdata('id') == 0) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $transaksi = $this->M_Transaksi->getTransaksi();
        $data = array(
            'transaksi' => $transaksi,
            'title' => 'Histori Transaksi',
            'css' => 'kendaraan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/transaksi', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function selesai($kendaraan_id, $user_id, $transaksi_id)
    {
        $data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        // edit data kendaraan

        $ketersediaan = '1';

        $this->db->set('ketersediaan', $ketersediaan);
        $this->db->where('id_kendaraan', $kendaraan_id);
        $this->db->update('kendaraan');

        $data['trans'] = $this->db->get('transaction')->result_array();

        // Masukkan data ke review
        // id user, id kendaraan, transaksi, ulasan = null, rating = null, tanggal = null
        // date_default_timezone_set('Asia/Jakarta');
        // $tanggal = date("Y-m-d H:i:s");

        $data = [
            'transaksi' => $transaksi_id,
            'userid' => $user_id,
            'kendaraanid' => $kendaraan_id,
            'ulasan' => "",
            'rating' => "",
            'tanggal' => "",
        ];
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $this->db->insert('review', $data);



        $status = 'Selesai';

        $this->db->set('status', $status);
        $this->db->where('transaction.kendaraan_id', $kendaraan_id);
        $this->db->where('transaction.id_transaksi', $transaksi_id);
        $this->db->update('transaction');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect(base_url('admin/transaksi'));
    }

    public function cek($kendaraan_id)
    {
    }

    public function lunas($kendaraan_id, $user_id, $transaksi_id)
    {
        $data['trans'] = $this->db->get('transaction')->result_array();

        $status = 'Lunas';

        $this->db->set('status', $status);
        $this->db->where('transaction.kendaraan_id', $kendaraan_id);
        $this->db->where('transaction.id_transaksi', $transaksi_id);
        $this->db->update('transaction');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect(base_url('admin/transaksi'));
    }

    public function batal($kendaraan_id, $user_id, $transaksi_id)
    {
        $$data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        // edit data kendaraan

        $ketersediaan = '1';

        $this->db->set('ketersediaan', $ketersediaan);
        $this->db->where('id_kendaraan', $kendaraan_id);
        $this->db->update('kendaraan');

        $data['trans'] = $this->db->get('transaction')->result_array();

        // Masukkan data ke review
        // id user, id kendaraan, transaksi, ulasan = null, rating = null, tanggal = null
        // date_default_timezone_set('Asia/Jakarta');
        // $tanggal = date("Y-m-d H:i:s");

        $data = [
            'transaksi' => $transaksi_id,
            'userid' => $user_id,
            'kendaraanid' => $kendaraan_id,
            'ulasan' => "",
            'rating' => "",
            'tanggal' => "",
        ];
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $this->db->insert('review', $data);

        $status = 'Dibatalkan';

        $this->db->set('status', $status);
        $this->db->where('transaction.kendaraan_id', $kendaraan_id);
        $this->db->where('transaction.id_transaksi', $transaksi_id);
        $this->db->update('transaction');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect(base_url('admin/transaksi'));
    }


    public function diterima($kendaraan_id, $user_id, $transaksi_id)
    {
        $data['trans'] = $this->db->get('transaction')->result_array();

        $status = 'Berlangsung';

        $this->db->set('status', $status);
        $this->db->where('transaction.kendaraan_id', $kendaraan_id);
        $this->db->where('transaction.id_transaksi', $transaksi_id);
        $this->db->update('transaction');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect(base_url('admin/transaksi'));
    }

    public function review($kendaraan_id, $user_id, $transaksi_id)
    {

        $data['trans'] = $this->db->get('transaction')->result_array();

        // Masukkan data ke review
        // id user, id kendaraan, transaksi, ulasan = null, rating = null, tanggal = null
        // date_default_timezone_set('Asia/Jakarta');
        // $tanggal = date("Y-m-d H:i:s");

        $data = [
            'transaksi' => $transaksi_id,
            'userid' => $user_id,
            'kendaraanid' => $kendaraan_id,
            'ulasan' => "",
            'rating' => "",
            'tanggal' => "",
        ];
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $this->db->insert('review', $data);

        redirect(base_url('admin/transaksi'));
    }
}
