<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			redirect('auth/login');
		}
		
		$this->load->model('orders_model');
	}

	public function index()
	{
		$is_processed = $this->orders_model->process();
		if ($is_processed) {
			$this->cart->destroy();
			
			redirect('order/success');
		} else {
			$this->session->set_flashdata('pesan', array('message' => 'Gagal memproses belanja, silahkan ulangi kembali!', 'class' => '	error', 'title' => 'Warning'));
			
			redirect('welcome/cart');
		}
	}

	public function success()
	{
        $data = array(
            'main_view'     => 'order_success',
            'page_title'    => 'Checkout | Pizza Hot Delivery'
    	);

		$this->load->view('layout/template', $data);		
	}

}