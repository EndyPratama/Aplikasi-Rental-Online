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
}
