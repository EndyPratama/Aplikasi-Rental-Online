<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Profile');
        $this->load->model('M_Transaksi');
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Admin');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ($this->session->userdata('id') == NULL) {
            redirect(base_url('auth'));
        }
    }

    public function index()
    {
        // $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');

        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];

        $nama = $this->M_Profile->cekNama($user);
        $nama = json_decode(json_encode($nama), true);
        $nama = $nama["0"];
        $nama = $nama['name'];
        $role_id = $this->M_Profile->cekRole($user);
        $role_id = json_decode(json_encode($role_id), true);
        $role_id = $role_id["0"];
        $role_id = $role_id['role_id'];
        if ($role_id == 1) {
            $role = 'Admin';
        } else {
            $role = 'User';
        }
        $pesanan = $this->M_Profile->getDataPesanan($user);

        $favorite = $this->M_Profile->getWhislist($user);

        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];

        $data = array(
            'title' => 'Profile',
            'gambar_profile' => $profile,
            'user' => $nama,
            'role' => $role,
            'pesanan' => $pesanan,
            'profile' => $profile,
            'foto_profile' => $profile,
            'whislist' => $favorite,
            'css' => 'profile3.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/profile', $data);
        $this->load->view('/user/layout/footer');
    }
    public function history($data = NULL)
    {
        $user = $this->session->userdata('id');
        // echo $user;
        $kendaraan = $this->M_Transaksi->getTransaksiKendaraan($user, $data);
        $merk = $this->M_Kendaraan->getMerk();
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'kendaraan' => $kendaraan,
            'merk' => $merk,
            'foto_profile' => $profile,
            'title' => 'Daftar Transaksi',
            'css' => 'transaksi_user.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/history', $data);
        $this->load->view('/user/layout/footer');
    }

    public function menunggu_ulasan()
    {
        // $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');
        $menunggu_ulasan = $this->M_Kendaraan->menungguUlasan($user);

        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'title' => 'Ulasan Anda',
            'profile' => $profile,
            'ulasan' => $menunggu_ulasan,
            // 'ulasan' => "menunggu_ulasan",
            'title' => 'Menunggu Ulasan',
            'foto_profile' => $profile,
            'css' => 'ulasan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/menunggu_ulasan', $data);
        $this->load->view('/user/layout/footer');
    }
    public function ulasan_saya()
    {
        // $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');
        $ulasan_saya = $this->M_Kendaraan->ulasanSaya($user);
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'ulasan' => $ulasan_saya,
            // 'ulasan' => "ulasan_saya",
            'title' => 'Ulasan Anda',
            'foto_profile' => $profile,
            'css' => 'ulasan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/ulasan_saya', $data);
        $this->load->view('/user/layout/footer');
    }
    public function ulasan_kendaraan($transaksiID)
    {
        /*
            gambar, nama, tanggal, penjual(opsional), id kendaraan, id user.
        */
        // $this->session->set_userdata('id', '2');
        $user = $this->session->userdata('id');
        $ulasan = $this->M_Kendaraan->ulasan_kendaraan($transaksiID);
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];
        $data = array(
            'ulasan' => $ulasan,
            'title' => 'Ulasan Anda',
            'foto_profile' => $profile,
            'css' => 'ulasan.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/ulasan', $data);
        $this->load->view('/user/layout/footer');
    }
    public function kirim_ulasan()
    {
        $transaksi = $this->input->post('transaksi');
        $userid =  $this->input->post('userid');
        $kendaraanid =  $this->input->post('kendaraanid');
        $ulasan =  $this->input->post('ulasan');
        $rating =  $this->input->post('rating');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d H:i:s");
        // $data = array(
        //     'transaksi' => $transaksi,
        //     'userid' => $userid,
        //     'kendaraanid' => $kendaraanid,
        //     'ulasan' => $ulasan,
        //     'rating' => $rating,
        //     'tanggal' => $tanggal
        // );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->db->set('ulasan', $ulasan);
        $this->db->set('rating', $rating);
        $this->db->set('tanggal', $tanggal);
        $this->db->where('transaksi', $transaksi);
        $this->db->update('review');

        $this->db->set('ulasan', "1");
        $this->db->where('id_transaksi', $transaksi);
        $this->db->update('transaction');
        redirect(base_url('/user/profile/ulasan_saya'));
    }
    public function setting()
    {
        $user = $this->session->userdata('id');
        $profile = $this->M_Profile->getProfileUser($user);
        $role = $this->M_Profile->cekRole($user);
        $role = json_decode(json_encode($role), true);
        $role = $role["0"];
        $role = $role['role_id'];
        if ($role == "1") {
            $role = "Admin";
        } else {
            $role = "User";
        }
        $gambar = $this->M_Profile->getGambar($user);
        $gambar = json_decode(json_encode($gambar), true);
        $gambar = $gambar["0"];
        $gambar = $gambar['gambar'];
        $data = array(
            'profile' => $profile,
            'role' => $role,
            'foto_profile' => $gambar,
            'title' => 'Setting',
            'css' => 'setting2.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/setting', $data);
        $this->load->view('/user/layout/footer');
    }
    public function update($user)
    {
        $nama = $this->input->post('nama');
        $image = $this->input->post('image');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $ttl = $this->input->post('ttl');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $provinsi = $this->input->post('provinsi');
        $zip_code = $this->input->post('zip_code');

        // update user
        $data = [
            'name' => $nama,
            'username' => $username,
            'email' => $email
        ];
        $this->db->where('id', $user);
        $this->db->update('user', $data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        // update profile
        $data = [
            'nama' => $nama,
            'phone' => $phone,
            'ttl' => $ttl,
            'alamat' => $alamat,
            'kota' => $kota,
            'provinsi' => $provinsi,
            'kode_pos' => $zip_code,
        ];
        $this->db->where('userid', $user);
        $this->db->update('profile', $data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        redirect(base_url('/user/profile/setting'));
    }
    public function transaksi()
    {
        $user = $this->session->userdata('id');
        $gambar = $this->M_Profile->getGambar($user);
        $gambar = json_decode(json_encode($gambar), true);
        $gambar = $gambar["0"];
        $gambar = $gambar['gambar'];

        $profile = $this->M_Profile->getProfileUser($user);

        $getBooking = $this->M_Kendaraan->getBookingById($user);
        if ($getBooking == Null) {
            $data = array(
                'booking' => 0,
                'profile' => $profile,
                'foto_profile' => $gambar,
                'title' => 'Pembayaran',
                'css' =>  'pembayaran.css'
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/transaksi', $data);
            $this->load->view('/user/layout/footer');
        } else {
            $pembayaran = json_decode(json_encode($getBooking), true);
            $pembayaran = $pembayaran["0"];
            $pembayaran = $pembayaran['metode_pembayaran'];

            $bank = array("BCA", "BNI", "MANDIRI", "BRI", "COD");
            for ($i = 0; $i < 4; $i++) {
                if ($pembayaran == $bank[$i]) {
                    $rekening = $this->M_Admin->getRekening($bank[$i]);
                }
            }
            $rekening = json_decode(json_encode($rekening), true);
            $rekening = $rekening["0"];
            $nomer = $rekening['nomer'];
            $an = $rekening['a/n'];
            $data = array(
                'booking' => $getBooking,
                'metode_pembayaran' => $pembayaran,
                'an' => $an,
                'rekening' => $nomer,
                'profile' => $profile,
                'foto_profile' => $gambar,
                'title' => 'Pembayaran',
                'css' =>  'pembayaran.css'
            );
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $this->load->view('/user/layout/header', $data);
            $this->load->view('/user/transaksi', $data);
            $this->load->view('/user/layout/footer');
        }
    }
    public function uploadbukti($id)
    {
        // echo $id;
        $data['bookings'] = $this->db->get('booking')->result_array();

        $bukti_transaksi = $_FILES['bukti_transaksi'];
        // echo $bukti_transaksi;
        if ($bukti_transaksi = '') {
            // echo "Masuk If ";
        } else {
            // echo "Masuk Else ";
            $config['upload_path'] = './vendor/public/img';
            $config['allowed_types'] = 'jpg|png|jfif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_transaksi')) {
                echo "Upload gagal";
                die();
            } else {
                $bukti_transaksi = $this->upload->data('file_name');
            }

            // echo $id;
            // echo $bukti_transaksi;
        }

        $this->db->set('bukti_transaksi', $bukti_transaksi);
        $this->db->where('id', $id);
        $this->db->update('booking');

        $user = $this->session->userdata('id');
        $getBooking = $this->M_Transaksi->getIdTransaksi($id);
        $getBooking = json_decode(json_encode($getBooking), true);
        $getBooking = $getBooking["0"];
        $id_transaksi = $getBooking['id_transaksi'];
        // $data = array(
        //     'id_transaksi' => $id_transaksi,
        //     'booking' => $getBooking
        // );
        $this->db->set('status', 'Menunggu Verifikasi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaction');

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">' .
                'Edit data kendaraan berhasil' .
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect(base_url('user/profile'));
    }
}
