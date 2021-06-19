<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Profile');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Login Page';
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'Login'
			);
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					$id = $this->M_Profile->cekIdByEmail($email);
					$id = json_decode(json_encode($id), true);
					$id = $id["0"];
					$id = $id['id'];
					$this->session->set_userdata('id', $id);
					if ($user['role_id'] == 1) {
						//$this->session->set_data('id', $id);
						redirect(base_url('/Admin/dashboard/'));
					} else {
						// $this->session->set_userdata('id', $id);
						redirect(base_url('/User/Home/'));
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">This email has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already registered!']);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] =  'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			// Menyiapkan Token
			// $token = base64_encode(random_bytes(32));
			$token = rand();
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success"
			role="alert">Congratulation! Your account has been created. Please Activate Your Account!</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			// 'protocol'  => 'mail',
			'protocol'  => 'smtp',
			// 'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'k.08.framework.par.c@gmail.com',
			'smtp_pass' => 'framework-123',
			'smtp_crypto' => 'ssl',
			// 'smtp_port' => '587',
			'smtp_port' => '465',
			'mailtype'  => 'html',
			'starttls'  => true,
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('k.08.framework.par.c@gmail.com', 'K 08 Framework');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verifiy your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// $user = $this->db->get_where('user', ['email' => $email])->row_array();
		// $user = $this->db->get_where('user', ['email' => $email]);
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("email", $email);
		$user = $this->db->get()->result();
		echo $email;
		echo $token;
		// print_r($user);
		if ($user != null) {
			// $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			// echo "Masuk User";
			$this->db->select("*");
			$this->db->from("user_token");
			// $this->db->where("token", $token);
			$user_token = $this->db->get()->result();
			$user_token = json_decode(json_encode($user_token), true);
			$user_token = $user_token["0"];
			// echo "<pre>";
			// print_r($user_token);
			// echo "</pre>";
			if ($user_token != NULL) {
				// echo "Masuk user_token";
				// echo time();
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					// echo "Masuk sini bang";
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success"
								role="alert">' . $email . ' has been activated! Please Login!.</div>');

					$id = $this->M_Profile->cekIdByEmail($email);
					$id = json_decode(json_encode($id), true);
					$id = $id["0"];
					$id_user = $id['id'];
					$nama = $id['name'];
					// echo "<pre>";
					// print_r($id_user);
					// print_r($nama);
					// echo "</pre>";
					$data = [
						'userid' => $id_user,
						'nama' => $nama,
						'gambar' => "default.jpg",
						'ttl' => "",
						'provinsi' => "",
						'kota' => "",
						'alamat' => "",
						'kode_pos' => "",
						'jenis_kelamin' => "",
						'phone' => "",
					];
					// echo "<pre>";
					// print_r($data);
					// echo "</pre>";

					$this->db->insert('profile', $data);
					redirect(base_url('auth'));
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger"
								role="alert">Account activation failed! Token Expired.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger"
						role="alert">Account activation failed! Wrong Token. Hmmm....</div>');
				redirect(base_url('auth'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger"
			role="alert">Account activation failed! Wrong Email.</div>');
			redirect(base_url('auth'));
		}
	}

	public function logout()
	{
		$this->session->set_userdata('id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect(base_url('auth'));
	}
	public function skip()
	{

		$this->session->set_userdata('id', 0);
		// echo $this->session->userdata('id');
		redirect(base_url('/User/Home/'));
	}
}
