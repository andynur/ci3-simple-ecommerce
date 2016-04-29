<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{

	protected $data;

    public function __construct() 
    {
        parent::__construct();

		$this->data = array(
			'name' 			=> $this->input->post('name'),
			'description'	=> $this->input->post('description'),
			'price' 		=> $this->input->post('price'),
			'stock' 		=> $this->input->post('stock')
		);        

    }

    public function getBy($id)
    {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row();   
    }

	public function save($gambar)
    {
    	$this->data['image'] = $gambar['file_name'];
        $this->db->insert('products', $this->data); 
    }

    public function update($id, $gambar)
    {
    	if ($gambar != "") {
	    	$this->data['image'] = $gambar['file_name'];
	    }
        
        $this->db->where('id', $id);
        $this->db->update('products', $this->data); 	    	
    }

}