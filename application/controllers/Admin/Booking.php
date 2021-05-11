<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Booking');
    }
    public function index()
    {
        $book = $this->M_Booking->getBooking();
        $data = array(
            'booking' => $book,
            'title' => 'Daftar Booking',
            'css' => 'kendaraan.css'
        );
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/booking', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function terima($id)
    {
        // Update Action
        $data['booking'] = $this->db->get('booking')->result_array();

<<<<<<< HEAD
        echo "<pre>";
        print_r($data);
        echo "</pre>";
=======
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
>>>>>>> aabdc87f02435e7ff25dc265fcb2a53470efe998

        $action = '1';

        $this->db->set('action', $action);
        $this->db->where('id', $id);
        $this->db->update('booking');

        // Update Ketersediaan
        $data['kendaraans'] = $this->db->get('kendaraan')->result_array();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $ketersediaan = '0';
        $id_kendaraan = $this->M_Booking->getIdKendaraan($id);

        $this->db->set('ketersediaan', $ketersediaan);
        $this->db->where('id_kendaraan', $id_kendaraan);
        $this->db->update('kendaraan');

        // Insert Transaksi
        $data['booking'] = $this->db->get('booking')->result_array();

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $status = 'Berlangsung';
        $harga = $this->M_Booking->getHarga($id);
        $id = $this->M_Booking->getIdUser($id);
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d H:i:s");

        $databaru = [
            'user_id' => $id,
            'kendaraan_id' => $id_kendaraan,
            'tanggal' => $tanggal,
            'status' => $status,
            'harga' => $harga,
<<<<<<< HEAD
=======
            'ulasan' => 0,
>>>>>>> aabdc87f02435e7ff25dc265fcb2a53470efe998
        ];
        // echo "<pre>";
        // print_r($databaru);
        // echo "</pre>";
        $this->db->insert('transaction', $databaru);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . 'Edit data kendaraan berhasil' . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect(Base_url('/admin/booking'));
    }

    public function tolak($id)
    {
        $data['booking'] = $this->db->get('booking')->result_array();

        $action = '2';

        $this->db->set('action', $action);
        $this->db->where('id', $id);
        $this->db->update('booking');
        redirect(Base_url('/admin/booking'));
    }
}
