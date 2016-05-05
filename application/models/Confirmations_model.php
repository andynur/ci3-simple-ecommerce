<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmations_model extends CI_Model
{

	public function getAll() 
	{
		$hasil = $this->db->select('i.id AS invoice_id, c.*')
		                  ->from('invoices i, confirmations c')
		                  ->where('c.id = i.confirmation_id')
		                  ->group_by('c.id')
		                  ->get();
	
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
	        return false;
	    }    
	}

}