<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function getRekening($nama)
    {
        $this->db->select("nomer,a/n");
        $this->db->from("rekening");
        $this->db->where('bank', $nama);
        $query = $this->db->get();
        return $query->result();
    }
}
