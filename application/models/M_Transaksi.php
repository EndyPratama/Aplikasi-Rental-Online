<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transaksi extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function getTransaksi()
    {
        $this->db->select("*");
        $this->db->from("transaksi");
        $query = $this->db->get();
        return $query->result();
    }
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    public function getHistoryTransaksi($id)
    {
        $this->db->select("*");
        $this->db->from("transaksi");
        // select * from pesan JOIN akun on pesan.user_id=akun.id join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6' 
        $query = $this->db->get();
        return $query->result();
    }
    public function getHarga($id_user)
    {
        $this->db->select("harga");
        $this->db->from("booking");
        $this->db->where("id_user", $id_user);
        // select * from pesan JOIN akun on pesan.user_id=akun.id join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6' 
        $query = $this->db->get();
        return $query->row()->harga;
    }
}
