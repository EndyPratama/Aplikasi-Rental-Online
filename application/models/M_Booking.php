<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Booking extends CI_Model
{
    public function getBooking()
    {
        $this->db->select("*");
        $this->db->from("booking");
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
    public function getHistoryBooking($id)
    {
        $this->db->select("*");
        $this->db->from("booking");
        // select * from pesan JOIN akun on pesan.user_id=akun.id join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6' 
        $query = $this->db->get();
        return $query->result();
    }
    public function getIdKendaraan($id)
    {

        $this->db->select("id_kendaraan");
        $this->db->from("kendaraan");
        $this->db->join('booking', 'kendaraan.nama = booking.kendaraan', 'right');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row()->id_kendaraan;
    }
    public function getHarga($id)
    {
        $this->db->select("harga");
        $this->db->from("booking");
        $this->db->where("id", $id);
        // select * from pesan JOIN akun on pesan.user_id=akun.id join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6' 
        $query = $this->db->get();
        return $query->row()->harga;
    }
    public function getIdUser($id)
    {
        $this->db->select("id_user");
        $this->db->from("booking");
        $this->db->where("id", $id);
        // select * from pesan JOIN akun on pesan.user_id=akun.id join jawaban on pesan.id_pesan = jawaban.id_pesan where pesan.user_id='6' 
        $query = $this->db->get();
        return $query->row()->id_user;
    }
}
