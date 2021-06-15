<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Chart');
        if ($this->session->userdata('id') == 0) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $data = array(
            'graph' => $this->M_Chart->graph(),
            'css' => 'chart.css',
            'title' => 'Graph'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        // $this->load->view('chart', $data);

        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/chart', $data);
        $this->load->view('/admin/layout/footer');
    }
}
