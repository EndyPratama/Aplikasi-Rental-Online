<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kendaraan extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function getKendaraan()
    {
        $this->db->select("id_kendaraan,nama,gambar,tahun,harga");
        $this->db->from("kendaraan");
        // $this->db->where('pesan.user_id=akun.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getJumlahKendaraan()
    {
        $this->db->select("COUNT(id_kendaraan)");
        $this->db->from("kendaraan");
        $query = $this->db->get();
        return $query->result();
    }
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    public function getKendaraanbyid($id)
    {
        $this->db->select("*");
        $this->db->from("kendaraan");
        $this->db->where('id_kendaraan', $id);
        // $this->db->where('pesan.user_id=akun.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function deleteKendaraanbyid($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kendaraan');
        // $this->db->where('pesan.user_id=akun.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getDetailById($id)
    {
        $this->db->select("*");
        $this->db->from("kendaraan, user");
        $where = "kendaraan.userid = user.id and kendaraan.id_kendaraan = $id";
        $this->db->where($where);
        // $this->db->where('kendaraan.id_kendaraan', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getReviewUser($id)
    {
        $this->db->select("user.name, review.ulasan, review.rating, review.tanggal, profile.gambar");
        $this->db->from("review,kendaraan,user, profile");
        $where = "review.userid = user.id AND review.userid = profile.userid AND review.kendaraanid = kendaraan.id_kendaraan AND review.kendaraanid = $id";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
        // SELECT user.name, review.ulasan, review.rating
        //FROM review,kendaraan,user
        //WHERE review.userid = user.id AND review.kendaraanid = kendaraan.id_kendaraan AND review.kendaraanid = 1
    }
    public function getReviewTotal($id)
    {
        $this->db->select("Count(id)");
        $this->db->from("review");
        $this->db->where("kendaraanid", $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getReviewRating($id)
    {
        $this->db->select("avg(rating)");
        $this->db->from("review");
        $this->db->where("kendaraanid", $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getTransaksi()
    {
        $this->db->select("*");
        $this->db->from("transaction");

        // $this->db->where('pesan.user_id=akun.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getBooking()
    {

        $this->db->select("id, peminjam, alamat, kendaraan, durasi, booking.harga");
        $this->db->from("booking");
        $this->db->join('kendaraan', 'booking.kendaraan = kendaraan.nama', 'left');
        $this->db->where('action = 0');
        $query = $this->db->get();
        return $query->result();
    }

    public function getIklan($merk)
    {
        $this->db->select("*");
        $this->db->from("kendaraan");
        $this->db->where('merk', $merk);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekData($id)
    {
        $this->db->select("merk");
        $this->db->from("kendaraan");
        $this->db->where('id_kendaraan', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekUser($id)
    {
        $this->db->select("id");
        $this->db->from("user");
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function bookingOrder($data)
    {
        $this->db->insert('booking', $data);
    }
    // $model = $this->input->post('model');
    //     // SELECT DISTINCT model, merk FROM `kendaraan` WHERE 1
    //     $tahun = $this->input->post('tahun');
    //     // SELECT DISTINCT tahun FROM `kendaraan` WHERE 1
    //     $mesin = $this->input->post('mesin');
    //     // SELECT DISTINCT mesin FROM `kendaraan` WHERE 1
    //     $warna = $this->input->post('warna');
    //     // SELECT DISTINCT warna FROM `kendaraan` WHERE 1
    public function getMerk()
    {
        $this->db->select("DISTINCT(merk)");
        $this->db->from("kendaraan");
        // $this->db->where('pesan.user_id=akun.id');
        $this->db->order_by("merk", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getModel()
    {
        $this->db->select("DISTINCT(model),merk");
        $this->db->from("kendaraan");
        // $this->db->where('pesan.user_id=akun.id');
        $this->db->order_by("model", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getTahun()
    {
        $this->db->select("DISTINCT(tahun)");
        $this->db->from("kendaraan");
        // $this->db->where('pesan.user_id=akun.id');
        $this->db->order_by("tahun", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getMesin()
    {
        $this->db->select("DISTINCT(mesin)");
        $this->db->from("kendaraan");
        // $this->db->where('pesan.user_id=akun.id');
        $this->db->order_by("mesin", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getWarna()
    {
        $this->db->select("DISTINCT(warna)");
        $this->db->from("kendaraan");
        // $this->db->where('pesan.user_id=akun.id');
        $this->db->order_by("warna", "asc");
        $query = $this->db->get();
        return $query->result();
    }
    public function getKendaraanByFilter($model = '', $tahun = '', $mesin = '', $warna = '')
    {
        $this->db->select("*");
        $this->db->from("kendaraan");
        if ($model != NULL) {
            $this->db->where('model', $model);
        }
        if ($tahun != NULL) {
            $this->db->where('tahun', $tahun);
        }
        if ($mesin != NULL) {
            $this->db->where('mesin', $mesin);
        }
        if ($warna != NULL) {
            $this->db->where('warna', $warna);
        }
        // $this->db->where($array);
        $query = $this->db->get();
        return $query->result();
    }
    public function getWhislist($user, $kendaraan)
    {
        $this->db->select("*");
        $this->db->from("whislist");
        $this->db->where('id_user', $user);
        $this->db->where('id_kendaraan', $kendaraan);
        $query = $this->db->get();
        return $query->result();
    }
    public function saveWhislist($data)
    {
        $this->db->insert('whislist', $data);
    }
    public function deleteWhislist($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('whislist');
    }
    public function search($keyword)
    {
        $this->db->select("*");
        $this->db->from("kendaraan");
        $this->db->like('merk', $keyword);
        $this->db->or_like('model', $keyword);
        $query = $this->db->get();
        return $query->result();
        // return $this->table('komik')->like('judul', $keyword);
    }
    public function getKendaraanUser($id)
    {
        $this->db->distinct();
        // $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga As total, transaction.tanggal, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi");
        $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga as total, transaction.tanggal,transaction.invoice, transaction.metode_pembayaran, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi");
        $this->db->from("transaction");
        $this->db->join('kendaraan', 'transaction.kendaraan_id = kendaraan.id_kendaraan', 'left');
        $this->db->join('booking', 'transaction.user_id = booking.id_user', 'left');
        // if ($filter != NULL) {
        //     $where = ("transaction.user_id='$id' AND booking.action='1' AND transaction.harga=(kendaraan.harga*booking.durasi) AND transaction.status='$filter'");
        // } else {
        $where = ("transaction.user_id='$id' AND booking.action='1' AND transaction.harga=(kendaraan.harga*booking.durasi)");
        // }
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
