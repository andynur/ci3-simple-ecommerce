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
            'query'         =>  $this->orders_model->getAllInvoices()
    	);

		$this->load->view('dashboard/template', $data);		
	}

    public function detail($invoice_id)
    {
        $data = array(
            'main_view'     => 'invoices/view_invoices_detail',
            'link'          => 'dashboard/invoices',
            'judul'         => 'Daftar Belanja di Faktur #' . $invoice_id,            
            'invoices'      => $this->orders_model->getInvoiceById($invoice_id),
            'orders'        => $this->orders_model->getOrdersByInvoice($invoice_id)
        );

        $this->load->view('dashboard/template', $data);             
    }

    public function approve($invoice_id)
    {
        $approve = $this->orders_model->approveOrder($invoice_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', array('message' => 'Faktur #' . $invoice_id . ' berhasil disetujui.', 'class' => 'success', 'title' => 'Sukses'));
        } else {
            $this->session->set_flashdata('pesan', array('message' => 'Faktur #' . $invoice_id . ' gagal disetujui.', 'danger' => 'info','title' => 'Warning!'));
        }

        redirect('dashboard/invoices');
    }

}
