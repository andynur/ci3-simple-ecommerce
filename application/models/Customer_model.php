<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function get_shopping_history($user)
    {	
    	$hasil = $this->db->select('i.id, i.date, i.due_date, SUM(o.qty * o.price) AS total, i.status')
    					  ->from('invoices i, users u, orders o')
                          ->where('u.username', $user)
                          ->where('o.invoice_id = i.id')
    					  ->where('u.id = i.user_id')
                          ->group_by('o.invoice_id')
    					  ->get();

		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
            return false;
        }
	}

    public function mark_invoice_confirmed($invoice_id, $amount)
    {        
        // check invoice
        $invoice = $this->db->where('id', $invoice_id)->limit(1)->get('invoices');
        if ($invoice->num_rows() == 0) {
            $ret = false;
        } else {
            // check the amoount
            $hasil = $this->db->select('SUM(qty * price) AS total')
                              ->from('orders')
                              ->where('invoice_id', $invoice_id)
                              ->get();

            if ((int)$hasil->row()->total > (int)$amount) { 
                $ret = false;
            } else {
                $this->db->where('id', $invoice_id)->update('invoices', array('status' => 'confirmed'));
                
                $ret = true;
            }
        }

        return $ret;
    }

    public function mark_invoice_canceled($invoice_id)
    {
        $invoice = $this->db->where('id', $invoice_id)->limit(1)->get('invoices');

        if ($invoice->num_rows() != 0) {
            $this->db->where('id', $invoice_id)->update('invoices', array('status' => 'canceled'));

            return true;
        } else {
            return false;
        }
    }

}