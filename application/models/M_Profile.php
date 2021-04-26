<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Profile extends CI_Model
{
    public function getGambar($user)
    {
        $this->db->select("gambar");
        $this->db->from("user");
        $this->db->where('id', $user);
        $query = $this->db->get();
        return $query->result();
    }
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
    public function getDataPesanan($user)
    {
        // gambar, user, harga, tanggal, status
        // SELECT kendaraan.gambar, user.name,transaction.status,transaction.harga, transaction.tanggal
        // from transaction,kendaraan,user
        // WHERE transaction.kendaraan_id = kendaraan.id_kendaraan and transaction.user_id = user.id
        $this->db->select("kendaraan.gambar, user.username, transaction.status, transaction.harga, transaction.tanggal");

        $this->db->from("transaction,kendaraan,user");
        $where = "transaction.kendaraan_id = kendaraan.id_kendaraan and transaction.user_id = user.id and user.id=$user";
        // $this->db->where('transaction.kendaraan_id', 'kendaraan.id_kendaraan');
        // $this->db->where('transaction.user_id', 'user.id');
        // $this->db->where('user.id', $user);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function getWhislist($user)
    {
        $this->db->select("kendaraan.harga,kendaraan.gambar,kendaraan.nama");
        $this->db->from("whislist,kendaraan");
        $where = "whislist.id_kendaraan = kendaraan.id_kendaraan and whislist.id_user = $user";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
