<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Contact extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function cekData($nama)
    {
        $this->db->select("id");
        $this->db->from("akun");
        $this->db->where('nama', $nama);
        $query = $this->db->get();
        return $query->result();
    }
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    public function insertPesan($data)
    {
        $this->db->insert('pesan', $data);
    }
}
