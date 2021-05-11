<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Member');
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
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/member', $data);
        $this->load->view('/admin/layout/footer');
    }
    public function detail($id)
    {
        $profile = $this->M_Member->getMember($id);
        $data = array(
            'title' => 'Profile member',
<<<<<<< HEAD
            'profile' => $profile,
=======
            'foto_profile' => $profile,
>>>>>>> aabdc87f02435e7ff25dc265fcb2a53470efe998
            'css' => 'user.css'
        );
        $this->load->view('/admin/layout/sidebar', $data);
        $this->load->view('/admin/member', $data);
        $this->load->view('/admin/layout/footer');
    }
}
