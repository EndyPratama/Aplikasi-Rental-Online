<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pesan');
    }
    public function index()
    {
        $user = $this->session->userdata('id');
        $pesan = $this->M_Pesan->getPesan();
        $jawaban = $this->M_Pesan->getJawaban();
        $this->db->set('notif', 0);
        $this->db->update('pesan');
        $data = array(
            'nama' => $user,
            'pesan' => $pesan,
            'jawaban' => $jawaban,
            'title' => 'Pesan Masuk',
            'css' => 'pesan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/pesan', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function pesan()
    {
        $user = $this->session->userdata('id');
        $pesan = $this->M_Pesan->getPesan();
        $jawaban = $this->M_Pesan->getJawaban();
        $jmlhPesan = $this->M_Pesan->getJmlhPesan();
        $jmlhPesan = json_decode(json_encode($jmlhPesan), true);
        $jmlhPesan = $jmlhPesan["0"];
        $jmlhPesan = $jmlhPesan['count(id_pesan)'];
        $jmlhJawaban = $this->M_Pesan->getJmlhJawaban();
        $jmlhJawaban = json_decode(json_encode($jmlhJawaban), true);
        $jmlhJawaban = $jmlhJawaban["0"];
        $jmlhJawaban = $jmlhJawaban['count(id)'];
        $data = array(
            'nama' => $user,
            'pesan' => $pesan,
            'jawaban' => $jawaban,
            'jmlhPesan' => $jmlhPesan,
            'jmlhJawaban' => $jmlhJawaban
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        echo json_encode($data);
    }
    public function jmlhPesanBaru()
    {
        $notif = $this->M_Pesan->getJmlhPesanBaru();
        $notif = json_decode(json_encode($notif), true);
        $notif = $notif["0"];
        $notif = $notif['count(id_pesan)'];

        // $jumlah = $this->M_Pesan->getJmlhPesan();
        // // $result['total'] = $jumlah;
        // $jumlah = json_decode(json_encode($jumlah), true);
        // $jumlah = $jumlah["0"];
        // $jumlah = $jumlah['count(id_pesan)'];
        // $data = array(
        //     'pesan' => $pesan,
        //     'jmlah' => $jumlah
        // );
        // echo "<pre>";
        // print_r($notif);
        // echo "</pre>";
        echo json_encode($notif);
        // echo json_encode($data);
    }
    public function list()
    {
        echo "Haiii";
    }
    public function tanggapan()
    {
        $id = $this->input->post('id_pesan');
        $jawaban = $this->input->post('jawaban');
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_pesan' => $id,
            'jawaban' => $jawaban,
            'tanggal' => date("Y-m-d H:i:s")
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->M_Pesan->insertJawaban($data);
        $this->M_Pesan->updatePesan($id);

        redirect(base_url('Admin/pesan'));
    }
    public function delete($id)
    {
        // echo $id;
        $this->db->delete("jawaban", array("id_pesan" => $id));
        $this->db->delete("pesan", array("id_pesan" => $id));
        redirect('admin/pesan');
    }
}
