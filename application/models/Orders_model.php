<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model
{

    public function __construct() 
    {
        parent::__construct();
    }

    public function process()
    {
    	// create new invoice
    	$invoice = array(
    		'date'		=> date('Y-m-d H:i:s'),
    		'due_date'	=> date('Y-m-d H:i:s', 
    					   mktime( date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y') )),
            'user_id'   => $this->getLoggedUserId(),
    		'status'	=> 'unpaid'            
    	);

    	$this->db->insert('invoices', $invoice);
    	$invoice_id = $this->db->insert_id(); // mengambil id terakhir

    	// put ordered item in orders table
    	foreach ($this->cart->contents() as $item) {
    		$data = array(
    			'invoice_id'	=> $invoice_id,
    			'product_id'	=> $item['id'],
    			'product_name'	=> $item['name'],
    			'qty'			=> $item['qty'],
    			'price'			=> $item['price']
    		);

    		$this->db->insert('orders', $data);
    	}

    	return TRUE;
    }

    public function getAllInvoices()
    {
        $hasil = $this->db->select('i.id, i.date, i.due_date, u.fullname, i.status')
                          ->from('invoices i, users u')
                          ->where('i.user_id = u.id')
                          ->get();

        if ($hasil->num_rows() > 0) {
            return $hasil->result();            
        } else {
            return false;
        }
    }

    public function getInvoiceById($invoice_id)
    {
        $hasil = $this->db->where('id', $invoice_id)
                          ->limit(1)
                          ->get('invoices');

        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return false;
        }
    }

    public function getOrdersByInvoice($invoice_id)
    {
        $hasil = $this->db->where('invoice_id', $invoice_id)
                          ->get('orders');

        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function getLoggedUserId()
    {
        $hasil = $this->db->select('id')
                          ->where('username', $this->session->userdata('username'))
                          ->limit(1)
                          ->get('users');

        if ($hasil->num_rows() > 0) {
            return $hasil->row()->id;   
        } else {
            return 0;
        }
    }

    public function approveOrder($invoice_id)
    {
        // ubah status
        $this->db->where('id', $invoice_id);
        $this->db->update('invoices', array('status' => 'paid')); 

        // check konfirmasi
        $check = $this->db->select('confirmation_id')
                          ->where('id', $invoice_id)
                          ->limit(1)
                          ->get('invoices');

        if ($check->num_rows() > 0) {
            // konfirmasi diterima
            $this->db->where('id', $check->row()->confirmation_id);
            $this->db->update('confirmations', array('check' => 1)); 
        } else {
            return 0;
        }
        
    }

}