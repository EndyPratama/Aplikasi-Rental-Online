<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';
    public function getTransaksi()
    {
        $this->db->select("
            user.id, user.name, 
            kendaraan.id_kendaraan, 
            kendaraan.gambar, 
            kendaraan.nama, 
            transaction.id_transaksi, 
            transaction.tanggal, 
            transaction.harga, 
            transaction.status, 
            booking.bukti_transaksi,
            booking.invoice
            ");
        $this->db->from("transaction,user,kendaraan, booking");
        $where = ("
            transaction.user_id = user.id AND 
            transaction.kendaraan_id = kendaraan.id_kendaraan AND 
            booking.id_user = user.id AND 
            booking.kendaraan = kendaraan.nama AND 
            booking.id = transaction.id_booking
            ");
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    // public function getRating()
    // {
    //     $this->db->select("
    //         user.id, user.name, 
    //         kendaraan.id_kendaraan, 
    //         kendaraan.gambar, 
    //         kendaraan.nama, 
    //         transaction.id_transaksi, 
    //         transaction.tanggal, 
    //         transaction.harga, 
    //         transaction.status, 
    //         booking.bukti_transaksi,
    //         booking.invoice,
    //         review.ulasan, 
    //         review.rating
    //         ");
    //     $this->db->from("transaction,user,kendaraan, booking, review");
    //     $where = ("
    //         transaction.user_id = user.id AND 
    //         transaction.kendaraan_id = kendaraan.id_kendaraan AND 
    //         transaction.id_booking = booking.id AND
    //         booking.id_user = user.id AND 
    //         booking.kendaraan = kendaraan.nama AND
    //         review.transaksi = transaction.id_transaksi AND 
    //         review.userid = user.id AND 
    //         review.kendaraanid = kendaraan.id_kendaraan
    //         ");
    //     $this->db->where($where);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function getRating()
    {
        $this->db->select("
            transaction.id_transaksi,
            review.ulasan, 
            review.rating
            ");
        $this->db->from("transaction, review");
        $where = ("review.transaksi = transaction.id_transaksi");
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getHistoryTransaksi($id)
    {
        $this->db->select("*");
        $this->db->from("transaction");
        $query = $this->db->get();
        return $query->result();
    }
    public function getHarga($id_user)
    {
        $this->db->select("harga");
        $this->db->from("booking");
        $this->db->where("id_user", $id_user);
        $query = $this->db->get();
        return $query->row()->harga;
    }
    public function getTransaksiKendaraan($id, $filter = NULL)
    {
        $this->db->select("*");
        $this->db->from("booking,transaction, kendaraan");
        if ($filter != NULL) {
            $where = ("
                    transaction.user_id = booking.id_user AND 
                    transaction.user_id='$id' AND 
                    kendaraan.id_kendaraan = transaction.kendaraan_id AND 
                    booking.kendaraan = kendaraan.nama AND 
                    (transaction.status='$filter' OR booking.action = -1) AND 
                    booking.id = transaction.id_booking
                    ");
        } else {
            $where = ("transaction.user_id = booking.id_user AND transaction.user_id='$id' AND kendaraan.id_kendaraan = transaction.kendaraan_id AND booking.kendaraan = kendaraan.nama AND booking.id = transaction.id_booking");
        }
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getTransaksiKendaraanBatal($id)
    {
        $this->db->select("*");
        $this->db->from("booking, kendaraan");
        $where = ("
                    booking.id_user = '$id' AND 
                    booking.kendaraan = kendaraan.nama AND 
                    booking.action = -1
                ");
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getDurasiPeminjaman($user)
    {
        echo $user;
        $this->db->select("*");
        $this->db->from("booking");
        $this->db->where("id_user", '2');
        $query = $this->db->get();
        return $query->result();
    }
    public function cekPendapatan()
    {
        $this->db->select("SUM(harga)");
        $this->db->from("transaction");
        $this->db->where('status', 'Selesai');
        $query = $this->db->get();
        return $query->result();
    }
    public function getIdTransaksi($id)
    {
        $this->db->select("id_transaksi");
        $this->db->from("transaction");
        $this->db->where('id_booking', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekInvoice($keyword)
    {
        $this->db->select("*");
        $this->db->from("booking");
        $this->db->where('invoice', $keyword);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekInvoiceTransaksi($keyword)
    {
        $this->db->select("*");
        $this->db->from("booking,transaction");
        $where = ("
                    booking.id = transaction.id_booking AND
                    booking.invoice = '$keyword'
                ");
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
