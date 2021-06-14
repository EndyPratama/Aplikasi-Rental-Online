<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kendaraan');
        $this->load->model('M_Profile');
    }
    public function index()
    {
        $user = $this->session->userdata('id');
        
        $profile = $this->M_Profile->getGambar($user);
        $profile = json_decode(json_encode($profile), true);
        $profile = $profile["0"];
        $profile = $profile['gambar'];

        // $rating = $this->M_Kendaraan->getReviewRating($id);
        // $rating = json_decode(json_encode($rating), true);
        // $rating = $rating["0"];
        // $rating = $rating['avg(rating)'];

        $data = array(
            'title' => 'Home',
            'profile' => $profile,
            'foto_profile' => $profile,
            'css' => 'home.css'
        );
        $this->load->view('/user/layout/header', $data);
        $this->load->view('/user/home', $data);
        $this->load->view('/user/layout/footer');
    }
}