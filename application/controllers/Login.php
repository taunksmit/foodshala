<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('date');
		$this->load->model('Login_model', 'login_model');
		$this->load->library('user_agent');
	}
	public function check_login()
	{
		$email = trim($this->input->post('email'));
		$password = md5(trim($this->input->post('password')));
		$usr_result = $this->login_model->check_login($email, $password);
		if ($usr_result != null) {
			$login_ip = $this->input->ip_address();
			$login_time = mdate('%Y-%m-%d %H:%i%:%s', now('Asia/Kolkata'));
			$login_platform = $this->agent->platform();
			$login_device = ($this->agent->is_mobile()) ? $this->agent->mobile() : 'Desktop';
			$login_browser = $this->agent->agent_string();
			$sessiondata = array(
				'id' => $usr_result[0]['id'],
				'name' => $usr_result[0]['fn'],
				'email' => $usr_result[0]['email'],
				'user_type' => $usr_result[0]['user_type'],
				'login_ip' => $login_ip,
				'login_platform' => $login_platform,
				'login_device' => $login_device,
				'login_browser' => $login_browser,
				'login_time' => $login_time,
			);
			$this->session->set_userdata('login_session', $sessiondata);
			redirect($this->session->userdata['last_page']['last_url'], "refresh");
		} else {
			$this->session->set_flashdata('msg', "<div class='alert alert-danger text-center'>Invalid Login Id or Password! Please Try Again</div>");
			redirect('Foodshala', "refresh");
		}
	}
	public function register_user()
	{
		$username = $this->input->post("username");
		$data['username'] = $this->login_model->check_username($username);
		if (count($data['username']) > 0) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismiss ">Sorry username: "' . $username . '" is  already taken. <br> Please register with some other username.</div>');
			redirect("Login/register");
		} else {
			$data = array(
				'first_name' => $this->input->post("first_name"),
				'last_name' => $this->input->post("last_name"),
				'contact' => $this->input->post("contact"),
				'email' => $this->input->post("email"),
				'username' => $this->input->post("username"),
				'password' => md5($this->input->post("password")),
				'food_preference' => $this->input->post("food_preference"),
				'address' => $this->input->post("address"),
				'city' => $this->input->post("city"),
				'state' => $this->input->post("state")
			);
			$result = $this->db->insert("customers", $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismiss ">Registed Successfully.  Please Login  </div>');
			if ($result) redirect("Login");
		}
	}
	public function logout()
	{
		unset($_SESSION['login_session']);
		redirect('Foodshala', 'refresh');
	}
}
