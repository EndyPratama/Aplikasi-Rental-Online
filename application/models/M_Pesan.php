<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pesan extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function getPesan()
    {
        $this->db->select("*");
        $this->db->from("pesan");
        // $this->db->join('jawaban', 'pesan.id_pesan = jawaban.id_pesan', 'left');
        $this->db->join('akun', 'pesan.user_id = akun.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function getJawaban()
    {
        $this->db->select("*");
        $this->db->from("pesan");
        $this->db->join('jawaban', 'pesan.id_pesan = jawaban.id_pesan', 'left');
        // $this->db->join('akun', 'pesan.user_id = akun.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }


    // select pesan.id_pesan,akun.nama,pesan.pesan,pesan.status,pesan.tanggal
    // from pesan,akun
    // LEFT JOIN jawaban on pesan.jawaban_id=jawaban.id_pesan
    // where pesan.user_id=akun.id



    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    // public function getHistoryPesan($id)
    // {
    //     $this->db->select("*");
    //     $this->db->from("pesan");
    //     $this->db->join('akun', 'pesan.user_id = akun.id', 'left');
    //     $this->db->join('jawaban', 'pesan.id_pesan = jawaban.id_pesan', 'left');
    //     $this->db->where('pesan.user_id', $id);
    //     // select * from pesan JOIN akun on pesan.user_id=akun.id join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6' 
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function insertJawaban($data)
    {
        $this->db->insert('jawaban', $data);
    }
    public function updatePesan($id)
    {
        $data = array(
            'status' => 1,
            'jawaban_id' => $id
        );
        $this->db->set($data);
        $this->db->where('id_pesan', $id);
        $this->db->update('pesan');
    }
}
