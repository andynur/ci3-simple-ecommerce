<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }

		$this->load->model('customer_model');
        $this->load->model('orders_model');
	}

	public function payment_confirmation($invoice_id)
	{
        if ($this->uri->segment(3) == '' || $this->uri->segment(3) == 0) {
            redirect('customer/shopping_history');
        }
        
        $data = array(
            'main_view'     => 'customer/form_confirmation',
            'page_title'    => 'Konfirmasi Pembayaran | Pizza Hot Delivery',
            'history'       =>  $this->db->select('SUM(qty * price) AS total')
                                         ->from('orders')
                                         ->where('invoice_id', $invoice_id)
                                         ->get()
        );

        $this->form_validation->set_rules('invoice_id', 'Invoice ID', 'trim|numeric|integer');
        $this->form_validation->set_rules('bank_name', 'Nama Bank', 'trim|required');
        $this->form_validation->set_rules('account_name', 'Nama Akun', 'trim|required');
        $this->form_validation->set_rules('bank_destination', 'Bank Tujuan', 'callback_bank_selected');
        $this->form_validation->set_rules('amount', 'Nominal Transfer', 'trim|required|numeric');         

        if ($this->form_validation->run() == FALSE) {
        	if ($this->input->post('invoice_id')) {
        		$data['invoice_id'] = set_value('invoice_id');
        	} else {
        		$data['invoice_id'] = $invoice_id;	
        	}
            
            $this->load->view('layout/template', $data);	
        } else {
         	$isValid = $this->customer_model->mark_invoice_confirmed($invoice_id);

         	if ($isValid) {
         		$this->session->set_flashdata('pesan', array('message' => 'Kami akan mengecek pembayaran Anda dalam 1x24 jam.', 'class' => 'success', 'title' => 'Berhasil'));    	

         		redirect('customer/shopping_history');
         	} else {
                $this->session->set_flashdata('pesan', array('message' => 'Nominal Transfer kurang dari Total Pesanan.', 'class' => 'error', 'title' => 'Peringatan!'));   	

         		redirect('customer/payment_confirmation/' . $invoice_id);
         	}         	         	         	
        }
	}
	
	public function shopping_history()
	{
		$user = $this->session->userdata('username');

        $data = array(
            'main_view'     => 'customer/view_history',
            'page_title'    => 'Riwayat Belanja | Pizza Hot Delivery',            
            'history'      =>  $this->customer_model->get_shopping_history($user)
    	);

		$this->load->view('layout/template', $data);		
	}

    public function detail($invoice_id)
    {
        $data = array(
            'main_view'     => 'customer/view_history_detail',
            'page_title'    => 'Riwayat Belanja | Pizza Hot Delivery',             
            'invoice_id'    => $invoice_id,         
            'invoices'      => $this->orders_model->getInvoiceById($invoice_id),
            'orders'        => $this->orders_model->getOrdersByInvoice($invoice_id)
        );

        $this->load->view('layout/template', $data);             
    }    

    public function cancel($invoice_id)
    {
        $isValid = $this->customer_model->mark_invoice_canceled($invoice_id);

        if ($isValid) {
           $this->session->set_flashdata('pesan', array('message' => 'Faktur #' . $invoice_id . ' berhasil dibatalkan!.', 'class' => 'success', 'title' => 'Berhasil'));     
        } else {
            $this->session->set_flashdata('pesan', array('message' => 'Faktur #' . $invoice_id . ' gagal dibatalkan!.', 'class' => 'error', 'title' => 'Error!'));    
        }  

        redirect('customer/shopping_history');       
    }

    public function delete($invoice_id)
    {
        $hapus = $this->db->delete('invoices', array('id' => $invoice_id)); 

        if($hapus) {
            $this->session->set_flashdata('pesan', array('message' => 'Berhasil Menghapus Faktur #' . $invoice_id, 'class' => 'success', 'title' => 'Sukses'));
        } else {
            $this->session->set_flashdata('pesan', array('message' => 'Gagal Menghapus Faktur #' . $invoice_id, 'class' => 'danger', 'title' => 'Warning!'));
        }

        redirect('customer/shopping_history');         
    }

    public function bank_selected()
    {
        $this->form_validation->set_message('bank_selected', 'Pilih Bank tujuan.');

        if (empty($this->input->post('bank_destination'))) {
            return false;
        } else{
            return true;
        }
    }

}
