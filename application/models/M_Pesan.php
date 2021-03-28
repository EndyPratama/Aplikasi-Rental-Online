<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pesan extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function getPesan()
    {
        $this->db->select("akun.nama,pesan.pesan,pesan.tanggal");
        $this->db->from("pesan,akun");
        $this->db->where('pesan.user_id=akun.id');
        $query = $this->db->get();
        return $query->result();
    }
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
}
