<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmations extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('group') != '1') {
            $this->session->set_flashdata('pesan', array('message' => 'Maaf, Anda belum login!', 'class' => 'error', 'title' => 'Warning'));
            redirect('auth/login');
        }

        $this->load->model('confirmations_model');
    }

	public function index()
	{
        $data = array(
            'main_view'     => 'confirmations/view_confirmations',
            'link'          => 'dashboard/confirmations',
            'judul'         => 'Daftar Konfirmasi Pembayaran',            
            'query'         =>  $this->confirmations_model->getAll()
        );

		$this->load->view('dashboard/template', $data);		
	}

}
