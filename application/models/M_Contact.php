<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Contact extends CI_Model
{
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    public function insertPesan($data)
    {
        $this->db->insert('pesan', $data);
    }
    public function getHistoryPesan($id)
    {
        $this->db->select("*");
        $this->db->from("pesan");
        $this->db->join('jawaban', 'pesan.id_pesan = jawaban.id_pesan', 'left');
        $this->db->where('pesan.user_id', $id);
        // select * from pesan join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6'
        $query = $this->db->get();
        return $query->result();
    }
}
