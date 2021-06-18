<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Profile extends CI_Model
{
    public function getProfileUser($user)
    {
        $this->db->select("*");
        $this->db->from("user,profile");
        $where = "user.id = profile.userid and profile.userid = $user";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getGambar($user)
    {
        $this->db->select("gambar");
        $this->db->from("profile");
        $this->db->where('userid', $user);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekId($nama)
    {
        $this->db->select("id");
        $this->db->from("user");
        $this->db->where('name', $nama);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekIdByEmail($email)
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekNama($user)
    {
        $this->db->select("name");
        $this->db->from("user");
        // $this->db->join('akun', 'pesan.user_id = akun.id', 'left');
        $this->db->where('id', $user);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekRole($user)
    {
        $this->db->select("role_id");
        $this->db->from("user");
        $this->db->where('id', $user);
        $query = $this->db->get();
        return $query->result();
    }
    // public function getDataPesanan($user)
    // {
    //     // gambar, user, harga, tanggal, status
    //     // SELECT kendaraan.gambar, user.name,transaction.status,transaction.harga, transaction.tanggal
    //     // from transaction,kendaraan,user
    //     // WHERE transaction.kendaraan_id = kendaraan.id_kendaraan and transaction.user_id = user.id
    //     $this->db->select("kendaraan.gambar, user.username, transaction.status, transaction.harga, transaction.tanggal");

    //     $this->db->from("transaction,kendaraan,user");
    //     $where = "transaction.kendaraan_id = kendaraan.id_kendaraan and transaction.user_id = user.id and user.id=$user";
    //     // $this->db->where('transaction.kendaraan_id', 'kendaraan.id_kendaraan');
    //     // $this->db->where('transaction.user_id', 'user.id');
    //     // $this->db->where('user.id', $user);
    //     $this->db->where($where);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function getDataPesanan($id)
    {
        // $this->db->distinct();
        // // $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga As total, transaction.tanggal, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi");
        // $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga as total, transaction.tanggal,transaction.invoice, transaction.metode_pembayaran, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi, booking.peminjam");
        // $this->db->from("transaction");
        // $this->db->join('kendaraan', 'transaction.kendaraan_id = kendaraan.id_kendaraan', 'left');
        // $this->db->join('booking', 'transaction.user_id = booking.id_user', 'left');
        $this->db->select("*");
        $this->db->from("booking,transaction, kendaraan");
        $where = ("transaction.user_id=booking.id_user AND transaction.user_id='$id' AND kendaraan.id_kendaraan = transaction.kendaraan_id AND booking.kendaraan = kendaraan.nama AND booking.id = transaction.id_booking");
        $this->db->where($where);
        $this->db->order_by('transaction.tanggal', 'DESC');
        // $this->db->where('id_user', $id);
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
    public function getWhislist($user)
    {
        // $this->db->select("kendaraan.harga,kendaraan.gambar,kendaraan.nama");
        $this->db->select("*");
        $this->db->from("whislist,kendaraan");
        $where = "whislist.id_kendaraan = kendaraan.id_kendaraan and whislist.id_user = $user";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
