<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function check_credential()
    {
    	$username = set_value('username');
    	$password = set_value('password');

    	$hasil = $this->db->where('username', $username)
    					  ->where('password', $password)
    					  ->limit(1)
    					  ->get('users');

    	if ($hasil->num_rows() > 0) {
    		return $hasil->row();
    	} else {
    		return false;
    	}
    }

    public function register()
    {
        $data = array(
            'username'      => $this->input->post('username'),
            'fullname'      => $this->input->post('fullname'),
            'email'         => $this->input->post('email'),
            'password'      => $this->input->post('password'),
            'address'       => $this->input->post('address'),
            'phone'         => $this->input->post('phone'),
            'zip'           => $this->input->post('zip'),
            'group_id'      => 2,
        );

        $this->db->insert('users', $data); 
    }

}