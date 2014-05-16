<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    
    function new_user($email, $password,$name,$city,$country) {
       $data = array(
            'email' => $email,
            'password' => $password,
            'city' => $city,
            'country' => $country,
            'name' => $name,
        );
        return $this->db->insert('users', $data);    
    }

    function login_user($email,$password){
        $this->db->select('id,name');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        if($query->num_rows() == 1)
        {
            return $query->row();
        }else{
            return false;
        }
    }
}