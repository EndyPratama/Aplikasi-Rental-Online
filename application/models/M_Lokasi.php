<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Lokasi extends CI_Model
{
    public function getUser()
    {
        $this->db->select("*");
        $this->db->from("user");
        // $this->db->where("role_id", "2");
        $where = "user.id != 1";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLokasiId($id)
    {
        $this->db->select("alamat");
        $this->db->from("user");
        $this->db->where("id", $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function ambilData($table)
    {
        return $this->db->get($table);
    }
    public function ambilData2($key)
    {
        $this->db->select("*");
        $this->db->from("user");
        // $this->db->where("id", $id);
        $this->db->like("name", $key);
        $query = $this->db->get();
        return $query->result();
    }
    public function getUserById($text)
    {
        $this->db->select("*");
        $this->db->from("kendaraan");
        $this->db->join('user', 'kendaraan.userid = user.id', 'left');
        $where = ("user.name LIKE '" . $text . "%' or kendaraan.nama='" . $text . "%'");
        $this->db->where($where);
        // $this->db->select("*");
        // $this->db->from("kendaraan,user");
        // // $where = ("kendaraan.userid = user.id and kendaraan.nama = " . $text . "or user.name = like%" . $text);
        // $this->db->where("kendaraan.userid", "user.id");
        // $this->db->like('kendaraan.nama', $text);
        // $this->db->like('user.name', $text);

        // WHERE user.name LIKE 'end%' or kendaraan.nama='end%'

        // $this->db->where($where);
        // $this->db->where("kendaraan.nama", $text);
        $query = $this->db->get();
        return $query->result();
    }
}
