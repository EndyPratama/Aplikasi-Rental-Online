<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function getTransaksi()
    {
        $this->db->select("user.name, kendaraan.id_kendaraan, kendaraan.nama, transaction.tanggal, transaction.harga, transaction.status");
        $this->db->from("transaction,user,kendaraan");
        $where = ("transaction.user_id = user.id AND transaction.kendaraan_id = kendaraan.id_kendaraan");
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
        $this->db->distinct();
        // $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga As total, transaction.tanggal, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi");
        $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga as total, transaction.tanggal,transaction.invoice, transaction.metode_pembayaran, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi");
        $this->db->from("transaction");
        $this->db->join('kendaraan', 'transaction.kendaraan_id = kendaraan.id_kendaraan', 'left');
        $this->db->join('booking', 'transaction.user_id = booking.id_user', 'left');
        if ($filter != NULL) {
            $where = ("transaction.user_id='$id' AND booking.action='1' AND transaction.harga=(kendaraan.harga*booking.durasi) AND transaction.status='$filter'");
        } else {
            $where = ("transaction.user_id='$id' AND booking.action='1' AND transaction.harga=(kendaraan.harga*booking.durasi)");
        }
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
        /*
        select DISTINCT transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga, transaction.tanggal, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga AS total, kendaraan.gambar, booking.durasi
        from transaction
        join kendaraan on transaction.kendaraan_id = kendaraan.id_kendaraan
        JOIN booking on transaction.user_id = booking.id_user
        where transaction.user_id="2" AND booking.action="1" AND transaction.harga=kendaraan.harga*booking.durasi
        */
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
}
