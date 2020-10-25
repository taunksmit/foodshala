<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
{
    public function check_login($email, $pass)
    {
        $sql = "SELECT cust_id as id, cust_name AS fn,  cust_email as email, 'customers' AS user_type FROM customers WHERE cust_email = '$email' AND cust_password = '$pass' UNION SELECT  res_id as id, res_owner AS fn,   res_email as email, 'restaurants' AS user_type FROM restaurants WHERE res_email = '$email' AND res_password = '$pass'";
        $query = $this->db->query($sql);
        return $query->result_array();
        return $this->db->get()->result_array();
    }
    public function verify_restaurant($uname, $pass)
    {
        $this->db->select('*');
        $this->db->from('restaurant');
        $this->db->where('username', $uname);
        $this->db->where('password', $pass);
        return $this->db->get()->result_array();
    }
    public function check_username($username)
    {
        $sql = "select * from customers  where username = '$username'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function check_restaurant($username)
    {
        $sql = "select * from restaurant   where username = '$username'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
}
