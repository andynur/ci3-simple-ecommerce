<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('group') != '1') {
            $this->session->set_flashdata('pesan', array('message' => 'Maaf, Anda belum login!', 'class' => 'error', 'title' => 'Warning'));
            redirect('auth/login');
        }

        $this->load->model('orders_model');
    }

	public function index()
	{
        $data = array(
            'main_view'     => 'invoices/view_invoices',
            'link'          => 'dashboard/invoices',
            'judul'         => 'Daftar Faktur',            
            'query'         =>  $this->db->get('invoices')->result()
    	);

		$this->load->view('dashboard/template', $data);		
	}

    public function detail($invoice_id)
    {
        $data = array(
            'main_view'     => 'invoices/view_invoices_detail',
            'link'          => 'dashboard/invoices',
            'judul'         => 'Daftar Belanja di Faktur #',            
            'invoices'      => $this->orders_model->getInvoiceById($invoice_id),
            'orders'        => $this->orders_model->getOrdersByInvoice($invoice_id)
        );

        $this->load->view('dashboard/template', $data);             
    }

}
