<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Member');
        if ($this->session->userdata('id') == 0) {
            redirect(base_url('auth'));
        }
    }
    public function index()
    {
        $member = $this->M_Member->getMember();
        $data = array(
            'title' => 'Member Area',
            'member' => $member,
            'css' => 'user.css'
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->load->view('/Admin/layout/sidebar', $data);
        $this->load->view('/Admin/member', $data);
        $this->load->view('/Admin/layout/footer');
    }
    public function detail($id)
    {
        $profile = $this->M_Member->getMember($id);
        $data = array(
            'title' => 'Profile member',
            'profile' => $profile,
            'foto_profile' => $profile,
            'foto_profile' => $profile,
            'profile' => $profile,
            'css' => 'user.css'
        );
        $this->load->view('/Admin/layout/sidebar', $data);
        $this->load->view('/Admin/member', $data);
        $this->load->view('/Admin/layout/footer');
    }
}
