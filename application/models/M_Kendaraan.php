<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kendaraan extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';
    public function getIdKendaraan($nama)
    {
        $this->db->select("id_kendaraan");
        $this->db->from("kendaraan");
        $this->db->where('nama', $nama);
        $query = $this->db->get();
        return $query->result();
    }
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
        $this->db->from("kendaraan");
        $where = "id_kendaraan = $id";
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
        $where = "kendaraanid = $id AND rating!=0";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getReviewRating($id)
    {
        $this->db->select("avg(rating)");
        $this->db->from("review");
        $where = "kendaraanid = $id AND rating !=0";
        $this->db->where($where);
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
        $this->db->where('action = 1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getBookingById($user)
    {

        // $this->db->select("id, peminjam, alamat, kendaraan, durasi, booking.harga");
        $this->db->select("*");
        $this->db->from("booking,transaction");
        // $this->db->join('kendaraan', 'booking.kendaraan = kendaraan.nama', 'left');
        $this->db->where("booking.id_user = transaction.user_id AND (booking.action = 1 OR booking.action = 0) AND booking.id_user = $user");
        $query = $this->db->get();
        return $query->result();
        /*
        SELECT *
FROM booking, transaction
WHERE booking.id_user = transaction.user_id AND (booking.action = 1 OR booking.action = 0) AND booking.id_user = 21
        */
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
        $this->db->select("kendaraan.id_kendaraan, kendaraan.nama, kendaraan.tahun, kendaraan.harga, kendaraan.ketersediaan, kendaraan.gambar, SUM(review.rating)/COUNT(NULLIF(0,review.rating)) AS rating, COUNT(CASE WHEN review.rating != 0 THEN review.rating END) AS review");
        $this->db->from("kendaraan");
        $this->db->join('review', 'kendaraan.id_kendaraan = review.kendaraanid', 'LEFT');
        if ($model != NULL) {
            $this->db->where('kendaraan.model', $model);
        }
        if ($tahun != NULL) {
            $this->db->where('kendaraan.tahun', $tahun);
        }
        if ($mesin != NULL) {
            $this->db->where('kendaraan.mesin', $mesin);
        }
        if ($warna != NULL) {
            $this->db->where('kendaraan.warna', $warna);
        }
        // $this->db->where($array);
        $this->db->group_by("kendaraan.nama");
        $this->db->order_by('review', 'DESC');
        $query = $this->db->get();
        return $query->result();

        // $this->db->select("kendaraan.id_kendaraan, kendaraan.nama, kendaraan.tahun, kendaraan.harga, kendaraan.ketersediaan, kendaraan.gambar, SUM(review.rating)/COUNT(NULLIF(0,review.rating)) AS rating, COUNT(CASE WHEN review.rating != 0 THEN review.rating END) AS review");
        // $this->db->from("kendaraan");
        // $this->db->join('review', 'kendaraan.id_kendaraan = review.kendaraanid', 'LEFT');
        // $where = "kendaraan.nama LIKE '%$keyword%' OR kendaraan.merk LIKE '%$keyword%'";
        // // $this->db->like('merk', $keyword);
        // // $this->db->or_like('model', $keyword);
        // $this->db->where($where);
        // $this->db->group_by("kendaraan.nama");
        // $this->db->order_by('review', 'DESC');
        // $query = $this->db->get();
        // return $query->result();
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
    public function search($keyword = NULL)
    {
        $this->db->select("kendaraan.id_kendaraan, kendaraan.nama, kendaraan.tahun, kendaraan.harga, kendaraan.ketersediaan, kendaraan.gambar, SUM(review.rating)/COUNT(NULLIF(0,review.rating)) AS rating, COUNT(CASE WHEN review.rating != 0 THEN review.rating END) AS review");
        $this->db->from("kendaraan");
        $this->db->join('review', 'kendaraan.id_kendaraan = review.kendaraanid', 'LEFT');
        $where = "kendaraan.nama LIKE '%$keyword%' OR kendaraan.merk LIKE '%$keyword%'";
        // $this->db->like('merk', $keyword);
        // $this->db->or_like('model', $keyword);
        $this->db->where($where);
        $this->db->group_by("kendaraan.nama");
        $this->db->order_by('review.rating', 'DESC');
        $query = $this->db->get();
        return $query->result();
        /*
        SELECT kendaraan.nama, kendaraan.tahun, kendaraan.harga, kendaraan.gambar, SUM(review.rating)/COUNT(NULLIF(0,review.rating)) AS rating, COUNT(CASE WHEN review.rating != 0 THEN review.rating END) AS review 
        FROM kendaraan 
        LEFT JOIN review ON kendaraan.id_kendaraan = review.kendaraanid 
        WHERE kendaraan.nama LIKE '%a%' 
        GROUP BY kendaraan.nama
        ORDER BY review DESC
        */
    }
    public function getKendaraanUser($id)
    {
        // // $this->db->distinct();
        // // $this->db->select("transaction.id_transaksi, transaction.user_id,transaction.status, transaction.harga As total, transaction.tanggal, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar, booking.durasi");
        // $this->db->select("transaction.id_transaksi, transaction.user_id, kendaraan.nama, kendaraan.model, kendaraan.merk, kendaraan.harga, kendaraan.gambar");
        // $this->db->from("transaction");
        // $this->db->join('kendaraan', 'transaction.kendaraan_id = kendaraan.id_kendaraan', 'left');
        // // if ($filter != NULL) {
        // //     $where = ("transaction.user_id='$id' AND booking.action='1' AND transaction.harga=(kendaraan.harga*booking.durasi) AND transaction.status='$filter'");
        // // } else {
        // // $where = ("transaction.user_id='$id' AND booking.action='1' AND transaction.harga=(kendaraan.harga*booking.durasi)");
        // $where = ("transaction.user_id='$id' AND kendaraan.userid = transaction.user_id");
        // // }
        // $this->db->where($where);
        // $query = $this->db->get();

        $this->db->select("user.id, kendaraan.id_kendaraan, kendaraan.nama, kendaraan.gambar, kendaraan.harga");
        $this->db->from("user,kendaraan");
        $where = ("user.id = kendaraan.userid AND user.id = $id");
        $this->db->where($where);
        $query = $this->db->get();
        // $sql = "SELECT user.id, kendaraan.id_kendaraan, kendaraan.nama\n"

        //     . "FROM user, kendaraan\n"

        //     . "WHERE user.id = kendaraan.userid AND user.id = 2";
        return $query->result();
    }
    public function menungguUlasan($id)
    {
        $this->db->select("booking.id_user, kendaraan.id_kendaraan, transaction.id_transaksi, booking.invoice, kendaraan.nama, transaction.status, kendaraan.gambar, transaction.tanggal");
        $this->db->from("transaction, kendaraan, booking");
        $where = "transaction.user_id = booking.id_user AND transaction.kendaraan_id = kendaraan.id_kendaraan AND TRANSACTION.user_id = '$id' AND booking.kendaraan = kendaraan.nama AND transaction.ulasan = 0";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
        /*
        SELECT user.id, kendaraan.id_kendaraan, transaction.id_transaksi, transaction.invoice, kendaraan.nama, transaction.status, kendaraan.gambar, transaction.tanggal 
        FROM transaction,user, kendaraan 
        WHERE transaction.user_id = user.id AND transaction.kendaraan_id = kendaraan.id_kendaraan AND TRANSACTION.user_id = 2 AND transaction.ulasan = 0
        */
    }
    public function ulasanSaya($id)
    {
        $this->db->select("booking.id, kendaraan.id_kendaraan, transaction.id_transaksi, booking.invoice, kendaraan.nama, transaction.status, kendaraan.gambar, review.rating, transaction.tanggal, review.ulasan");
        $this->db->from("transaction, kendaraan, review, booking");
        $where = "transaction.user_id = booking.id_user AND 
                  transaction.kendaraan_id = kendaraan.id_kendaraan AND 
                  TRANSACTION.user_id = $id AND 
                  transaction.ulasan = 1 AND 
                  booking.kendaraan = kendaraan.nama AND
                  transaction.id_transaksi = review.transaksi";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
        /*
        SELECT user.id, kendaraan.id_kendaraan, transaction.id_transaksi, transaction.invoice, kendaraan.nama, transaction.status, kendaraan.gambar, review.rating, transaction.tanggal
        FROM transaction,user, kendaraan, review
        WHERE transaction.user_id = user.id AND transaction.kendaraan_id = kendaraan.id_kendaraan AND TRANSACTION.user_id = 2 AND transaction.ulasan = 1 AND transaction.id_transaksi = review.transaksi
        */
    }
    public function ulasan_kendaraan($transaksiID)
    {
        $this->db->select("booking.id, kendaraan.id_kendaraan, transaction.id_transaksi, booking.invoice, kendaraan.nama, kendaraan.gambar, transaction.tanggal");
        $this->db->from("kendaraan,booking,transaction");
        $where = "transaction.user_id = booking.id_user AND transaction.kendaraan_id = kendaraan.id_kendaraan AND transaction.id_transaksi = $transaksiID AND booking.kendaraan = kendaraan.nama";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
        /*
        SELECT user.id, transaction.id_transaksi, kendaraan.nama, kendaraan.gambar, transaction.tanggal 
        FROM transaction,user, kendaraan 
        WHERE transaction.user_id = user.id AND transaction.kendaraan_id = kendaraan.id_kendaraan AND transaction.id_transaksi = 2
        */
    }
}
