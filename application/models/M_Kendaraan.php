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
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    public function getDetailById($id)
    {
        $this->db->select("*");
        $this->db->from("kendaraan");
        $this->db->where('id_kendaraan', $id);
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
        $this->db->from("akun");
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function bookingOrder($data)
    {
        $this->db->insert('booking', $data);
    }
}
