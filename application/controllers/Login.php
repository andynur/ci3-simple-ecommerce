<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data = array(
            'main_view'     => 'form_login',
            'page_title'    => 'Masuk | Pizza Hot Delivery'
    	);

		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/template', $data);
		} else {
			$this->load->model('users_model');
			$valid_user = $this->users_model->check_credential();

			if ($valid_user == FALSE) {
            	$this->session->set_flashdata('pesan', array('message' => 'Username atau Password salah!', 'class' => 'error', 'title' => 'Warning'));            
            		          	
            	redirect('login');
			} else {
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('group', $valid_user->group_id);

				switch ($valid_user->group_id) {
					case 1:  redirect('dashboard/products'); 
							 break;
					case 2:  redirect(base_url());
							 break;
					default: break;
				}
			}	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}