<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function login()
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
			$valid_user = $this->users_model->check_credential();

			if ($valid_user == FALSE) {
            	$this->session->set_flashdata('pesan', array('message' => 'Username atau Password salah!', 'class' => 'error', 'title' => 'Warning'));            
            		          	
            	redirect('auth/login');
			} else {
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('fullname', $valid_user->fullname);
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
		redirect('auth/login');
	}

	public function register() 
	{
        $data = array(
            'main_view'     => 'form_register',
            'page_title'    => 'Daftar | Pizza Hot Delivery'
    	);

		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|is_unique[users.username]');
		$this->form_validation->set_rules('fullname', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('confirm', 'Konfirmasi Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('phone', 'No Hp', 'trim|required');
		$this->form_validation->set_rules('zip', 'Kode Pos', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/template', $data);
		} else {
			$this->users_model->register();

            if ($this->db->affected_rows() > 0) {
				$this->session->set_userdata('username', set_value('username'));
				$this->session->set_userdata('fullname', set_value('fullname'));
				$this->session->set_userdata('group', 2);

                $this->session->set_flashdata('pesan', array('message' => 'Akun anda berhasil dibuat.', 'class' => 'success', 'title' => 'Selamat'));
            }
            else {
                $this->session->set_flashdata('pesan', array('message' => 'Gagal membuat akun.', 'class' => 'error', 'title' => 'Warning'));
            }                

			redirect(base_url());
		}
	}

}