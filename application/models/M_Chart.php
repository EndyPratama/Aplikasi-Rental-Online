<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Chart extends CI_Model
{
    public function kendaraan()
    {
        // $data = $this->db->query("SELECT * from kendaraan");
        $data = $this->db->query("SELECT merk, COUNT( * ) AS total FROM kendaraan GROUP BY merk");
        // SELECT merk, COUNT( * ) AS total FROM kendaraan GROUP BY merk
        return $data->result();
    }
    public function transaksi()
    {
        // $data = $this->db->query("SELECT * from kendaraan");
        $data = $this->db->query("
        SELECT kendaraan.merk, count(booking.action) AS total
        FROM kendaraan, booking
        WHERE booking.kendaraan = kendaraan.nama AND booking.action != 1
        GROUP BY kendaraan.merk");
        // SELECT merk, COUNT( * ) AS total FROM kendaraan GROUP BY merk
        return $data->result();
        //         SELECT kendaraan.merk, count(booking.action) AS Terpinjam
        // FROM kendaraan, booking
        // WHERE booking.kendaraan = kendaraan.nama AND booking.action = 1
        // GROUP BY kendaraan.merk
    }
}
