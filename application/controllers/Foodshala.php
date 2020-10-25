<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Foodshala extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->session->set_userdata('last_page', current_url());
		$sessiondata = array(
			'last_url' => current_url(),
		);
		$this->session->set_userdata('last_page', $sessiondata);
		$last_page = $this->session->userdata['last_page'];
		$this->load->model('Foodshala_model', 'foodshala');
		date_default_timezone_set('Asia/Kolkata');
		// if (!$this->session->login_session)
		// 	redirect('Login');
		// if ($this->session->login_session['role'] != 'admin') {
		// 	unset($_SESSION['login_session']);
		// 	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismiss "> Invalid Role Access! Please Login Again</div>');
		// 	redirect("Login");
		// }
	}
	public function index()
	{
		$data['food'] = $this->foodshala->get_featured_list();
		$this->load->view('header');
		$this->load->view('index', $data);
		$this->load->view('footer');
	}
	public function customer_registration()
	{
		$this->load->view('header');
		$this->load->view('customer_registration');
		$this->load->view('footer');
	}
	public function restaurant_registration()
	{
		$this->load->view('header');
		$this->load->view('restaurant_registration');
		$this->load->view('footer');
	}
	public function add_user()
	{
		$data = array();
		$user_type = $this->input->post("user_type");
		if ($user_type == 'customers') {
			$data = array(
				'cust_name' => $this->input->post("cust_name"),
				'cust_contact' => $this->input->post("cust_contact"),
				'cust_email' => $this->input->post("cust_email"),
				'cust_password' => md5($this->input->post("cust_password")),
				'food_choice' => $this->input->post("food_choice"),
			);
		} else {
			$data = array(
				'res_name' => $this->input->post("res_name"),
				'res_owner' => $this->input->post("res_owner"),
				'res_contact' => $this->input->post("res_contact"),
				'res_email' => $this->input->post("res_email"),
				'res_password' => md5($this->input->post("res_password")),
				'res_address' => $this->input->post("res_address"),
				// 'res_password' => $this->input->post("res_password"),
			);
		}
		$result = $this->db->insert($user_type, $data);
		$this->session->set_flashdata('msg', "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
			Account successfully created Please Login to access all features.
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			  <span aria-hidden=\"true\">&times;</span>
			</button>
		  </div>");
		redirect('Foodshala', "refresh");
	}
	public function restaurants()
	{
		$data['restaurants'] = $this->foodshala->get_restaurant_list();
		$this->load->view('header');
		$this->load->view('restaurants', $data);
		$this->load->view('footer');
	}
	public function dishes()
	{
		$data['dishes'] = $this->foodshala->get_dishes_list();
		$this->load->view('header');
		$this->load->view('dishes', $data);
		$this->load->view('footer');
	}
	public function restaurant($id)
	{
		$data['dishes'] = $this->foodshala->get_dish_from_restaurant($id);
		$data['details'] = $this->foodshala->get_restaurant_details($id);
		$this->load->view('header');
		$this->load->view('menu', $data);
		$this->load->view('footer');
	}
	public function cart()
	{
		$id =  $this->session->login_session['id'];
		$data['cart_items'] = $this->foodshala->get_cart_item($id);
		// $data['details'] = $this->foodshala->get_restaurant_details($id);
		$this->load->view('header');
		$this->load->view('cart', $data);
		$this->load->view('footer');
	}
	public function remove_from_cart($id)
	{
		$result = $this->db->delete("user_cart", array("id" => $id));
		if ($result) {
			$this->session->set_flashdata('msg', "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
			   Food Dish Removed from cart.
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			  <span aria-hidden=\"true\">&times;</span>
			</button>
		  </div>");
			redirect('Foodshala/cart', "refresh");
		} else {
			$this->session->set_flashdata('msg', "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
			   Something went wrong.
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			  <span aria-hidden=\"true\">&times;</span>
			</button>
		  </div>");
			redirect('Login/logout', "refresh");
		}
	}
	public function add_to_cart($food_id)
	{
		$cart = array(
			'food_id' => $food_id,
			'user_id' => $this->session->login_session['id'],
		);
		$result = $this->db->insert('user_cart', $cart);
		if ($result) {
			$this->session->set_flashdata('msg', "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
			<strong>Yay!!</strong>  Food added to cart.
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			  <span aria-hidden=\"true\">&times;</span>
			</button>
		  </div>");
			redirect('Foodshala/cart', "refresh");
		} else {
			$this->session->set_flashdata('msg', "<div class='alert alert-danger alert-dismissible   text-center'>Someting went wrong. Please try again</div>");
			redirect('Login/logout');
		}
	}
	public function place_order()
	{

		for ($i = 0; $i < count($this->input->post("food_id[]")); $i++) {
			$cart = array(
				'customer_id' => $this->session->login_session['id'],
				'food_id' => $this->input->post("food_id")[$i],
				'order_status' => 'order placed'
			);

			$result = $this->db->insert('orders', $cart);
			$result = $this->db->delete("user_cart", array(
				"user_id" => $this->session->login_session['id'],
				"food_id" => $this->input->post("food_id")[$i],
			));
		}
		$this->session->set_flashdata('msg', "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
			<strong>Yay!!</strong>  Order Placed. will be delivered Soon
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			  <span aria-hidden=\"true\">&times;</span>
			</button>
		  </div>");
		redirect('Foodshala/all_orders');
	}
	public function all_orders()
	{
		$id = $this->session->login_session['id'];
		$data['all_orders'] = $this->foodshala->get_all_orders($id);
		$this->load->view('header');
		$this->load->view('all_orders', $data);
		$this->load->view('footer');
	}
	/* restaurant admin function starts here */

	public function menu()
	{
		$restaurant_id = $this->session->login_session['id'];
		$data['menu'] = $this->foodshala->get_menu($restaurant_id);
		$this->load->view('restaurant/header');
		$this->load->view('restaurant/ress_menu', $data);
	}
	public function dashboard()
	{
		if (!$this->session->login_session)
			redirect('Foodhsala');
		$type =  $this->session->login_session['user_type'];
		if ($type == "customer") {
			redirect('Login/rlogin');
		}
		$this->load->view('restaurant/header');
		$this->load->view('restaurant/dashboard');
	}
	public function add_food()
	{
		$this->load->view('restaurant/header');
		$this->load->view('restaurant/add_food');
	}
	public function save_food()
	{
		$val = $this->foodshala->uploadImage('atta1');
		$val == TRUE || redirect('Foodshala/add_food');
		$document_data['logo'] = $val['path'];
		$restaurant_id = $this->session->login_session['id'];
		$data = array(
			'restaurant_id' => $restaurant_id,
			'food_name' => $this->input->post("food_name"),
			'dish_type' => $this->input->post("dish_type"),
			'serves' => $this->input->post("serves"),
			'cost' => $this->input->post("cost"),
			'picture'     => $document_data['logo'],
		);
		$result = $this->db->insert("food_items", $data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismiss ">Food item Details Saved Successfully!</div>');
		if ($result) redirect("Foodshala/menu");
	}
	public function delete_food($id)
	{
		$result = $this->db->delete("food_items", array("food_id" => $id));
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismiss ">Food Item Deleted Sucessfully!</div>');
		if ($result) {
			redirect("Foodshala/menu");
		}
	}
	public function orders()
	{
		$restaurant_id = $this->session->login_session['id'];
		$data['list'] = $this->foodshala->get_restarants_orders($restaurant_id);
		$this->load->view('restaurant/header');
		$this->load->view('restaurant/order', $data);
	}
}
