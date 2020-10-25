<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Foodshala_model extends CI_Model
{
    public function get_restaurant_list()
    {
        $sql = "select * from restaurants";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_dish_from_restaurant($id)
    {
        $sql = "select * from food_items where restaurant_id = $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_restaurant_details($id)
    {
        $sql = "select res_id, res_name,res_contact , res_address from restaurants where res_id = $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_dishes_list()
    {
        $sql = "select f.food_id, f.restaurant_id,  food_name, dish_type, serves, picture, cost, res_id, res_name, res_address  from food_items f join restaurants r on f.restaurant_id = r.res_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_featured_list()
    {
        $sql = "select f.food_id, f.restaurant_id,  food_name, dish_type, serves, picture, cost, res_id, res_name, res_address  from food_items f join restaurants r on f.restaurant_id = r.res_id order by rand() limit 2";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_cart_item($id)
    {
        $sql = "select id, f.food_id, user_id, added_on, restaurant_id, food_name, dish_type, serves, picture, cost, res_name, res_owner, res_contact,  res_address from user_cart c join food_items f on c.food_id = f.food_id join restaurants r on f.restaurant_id = r.res_id where user_id = $id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_all_orders($id)
    {
        $sql = "select   f.food_id, customer_id,  res_name, order_status,creation_dt,   food_name, dish_type, serves, picture, cost from orders o join food_items f on o.food_id = f.food_id join restaurants r on r.res_id = f.restaurant_id where customer_id = $id order by creation_dt desc";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_order_list($id)
    {
        $sql = "select * fROM orders o  join food_items f  on f.food_id = o.food_id join customers c on o.customer_id = c.cust_id  where f.restaurant_id = '$id' and o.order_status = 'ordered';";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_menu($restaurant_id)
    {
        $sql = "select * from food_items f where restaurant_id = '$restaurant_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function uploadImage($field)
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx';
        $config['max_size'] = '2024';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)) {
            $error = $this->upload->display_errors();
            $type = "error";
            $message = $error;
            return FALSE;
        } else {
            $fdata = $this->upload->data();
            $img_data['path'] = $config['upload_path'] . $fdata['file_name'];
            $img_data['fullPath'] = $fdata['full_path'];
            return $img_data;
        }
    }
    public function get_restarants_orders($restaurant_id)
    {
        $sql = "select * from orders o join food_items f on f.food_id = o.food_id join restaurants r on f.restaurant_id = r.res_id join customers c on  o.customer_id = c.cust_id   where restaurant_id = $restaurant_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
