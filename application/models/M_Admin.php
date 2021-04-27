<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function cekNama($user)
    {
        $this->db->select("name");
        $this->db->from("user");
        // $this->db->join('akun', 'pesan.user_id = akun.id', 'left');
        $this->db->where('id', $user);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekRole($user)
    {
        $this->db->select("role_id");
        $this->db->from("user");
        $this->db->where('id', $user);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekPendapatan()
    {
        $this->db->select("SUM(harga)");
        $this->db->from("transaction");
        $this->db->where('status', 'Selesai');
        $query = $this->db->get();
        return $query->result();
    }
    public function getJumlahKendaraan()
    {
        $this->db->select("COUNT(id_kendaraan)");
        $this->db->from("kendaraan");
        $query = $this->db->get();
        return $query->result();
    }
    public function getMember()
    {
        $this->db->select("COUNT(id)");
        $this->db->from("user");
        $this->db->where("role_id", 2);
        $query = $this->db->get();
        return $query->result();
    }
    public function getBookingTerima()
    {
        $this->db->select("COUNT(id)");
        $this->db->from("booking");
        $this->db->where("action", 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getBookingTolak()
    {
        $this->db->select("COUNT(id)");
        $this->db->from("booking");
        $this->db->where("action", 2);
        $query = $this->db->get();
        return $query->result();
    }
}
