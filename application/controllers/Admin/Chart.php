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
        $jenis = $this->input->post('jenis');
        $diagram = $this->input->post('diagram');
        if ($diagram == null) {
            $diagram = 'pie';
        }
        if ($jenis == null || $jenis == 'kendaraan') {
            $data = array(
                'graph' => $this->M_Chart->kendaraan(),
                'nama' => 'kendaraan',
                'diagram' => $diagram,
                'css' => 'chart.css',
                'title' => 'Graph'
            );
        } else if ($jenis == 'transaksi') {
            $data = array(
                'graph' => $this->M_Chart->transaksi(),
                'nama' => 'transaksi',
                'diagram' => $diagram,
                'css' => 'chart.css',
                'title' => 'Graph'
            );
        }

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        // $this->load->view('chart', $data);

        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/chart', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function Graphdata()
    {
        $jenis = $this->input->post('graph');
        if ($jenis == 'kendaraan') {
            $notif = $this->M_Chart->kendaraan();
            $notif = json_decode(json_encode($notif), true);
            $notif = $notif["0"];
            echo json_encode($notif);
        } else {
            $notif = $this->M_Chart->transaksi();
            // $notif = json_decode(json_encode($notif), true);
            // $notif = $notif["0"];
            echo json_encode($notif);
        }
        // echo $id;
        // $data = array(
        //     'kendaraan' => 
        //     'transaksi' => 
        //     'css' => 'chart.css',
        //     'title' => 'Graph'
        // );
    }
}
