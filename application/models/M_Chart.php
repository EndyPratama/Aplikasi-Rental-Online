<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Chart extends CI_Model
{
    public function graph()
    {
        // $data = $this->db->query("SELECT * from kendaraan");
        $data = $this->db->query("SELECT merk, COUNT( * ) AS total FROM kendaraan GROUP BY merk");
        // SELECT merk, COUNT( * ) AS total FROM kendaraan GROUP BY merk
        return $data->result();
    }
}
