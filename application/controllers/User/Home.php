<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Profile');
        $this->load->model('M_Transaksi');
        $this->load->model('M_Transaksi');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }
}