<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('products_model');
	}

	public function index()
	{
        $data = array(
            'main_view'     => 'home',
            'page_title'    => 'Pizza Hot Delivery',            
            'products'      =>  $this->db->order_by('id', 'DESC')->get('products', 5, 0)->result()
    	);

		$this->load->view('layout/template', $data);		
	}

	public function menu()
	{
        $data = array(
            'main_view'     => 'home_menu',
            'page_title'    => 'Daftar Menu | Pizza Hot Delivery',            
            'products'      =>  $this->db->get('products')->result()
    	);

		$this->load->view('layout/template', $data);
	}

	public function add_to_cart($product_id)
	{	
		$product = $this->products_model->getBy($product_id);
		$data = array(
		        'id'      => $product->id,
		        'qty'     => 1,
		        'price'   => $product->price,
		        'name'    => $product->name,
		        'image'   => $product->image
		);

		$this->cart->insert($data);

		$this->session->set_flashdata('pesan', array('message' => $data['name'] . ' berhasil dipesan. \n Silahkan cek menu keranjang diatas.', 'class' => 'success', 'title' => 'Berhasil'));    	         		

		redirect('menu');
	}

	public function cart()
	{
        $data = array(
            'main_view'     => 'show_cart',
            'page_title'    => 'Keranjang | Pizza Hot Delivery'
    	);

		$this->load->view('layout/template', $data);	
	}

	public function update_cart($id)
	{
		$data = array(
		        'rowid' => $this->input->post('rowid'),
		        'qty'   => $this->input->post('qty')
		);	
			
		$this->cart->update($data);

		$this->session->set_flashdata('pesan', array('message' => 'Jumlah pesanan berhasil diubah.', 'class' => 'success', 'title' => 'Berhasil'));  

		redirect('home/cart');
	}

	public function remove_cart($id)
	{
		$this->cart->remove($id);

		$this->session->set_flashdata('pesan', array('message' => 'Menu pesanan berhasil dihapus.', 'class' => 'success', 'title' => 'Berhasil'));  

		redirect('home/cart');
	}

	public function clear_cart()
	{
		$this->cart->destroy();

		$this->session->set_flashdata('pesan', array('message' => 'Keranjang berhasil dibersihkan.', 'class' => 'success', 'title' => 'Berhasil')); 		
		redirect(base_url());
	}

}
