<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Member extends CI_Model
{
    // protected $komik = 'komik';
    // protected $member = 'member';

    public function getMember()
    {
        $this->db->select("*");
        $this->db->from("user,profile");
        // $this->db->where("role_id", "2");
        $where = "user.id = profile.userid";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    // SELECT akun.nama, pesan.pesan, pesan.tanggal
    //         FROM pesan, akun
    //         WHERE pesan.user_id=akun.id 
    public function getJumlahMember()
    {
        $this->db->select("COUNT(id)");
        $this->db->from("user");
        $this->db->where("role_id", 2);
        $query = $this->db->get();
        return $query->result();
    }
}
