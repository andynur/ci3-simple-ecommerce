<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('group') != '1') {
            $this->session->set_flashdata('pesan', array('message' => 'Maaf, Anda belum login!', 'class' => 'error', 'title' => 'Warning'));
            redirect('auth/login');
        }

        $this->load->model('products_model');
        $this->load->library('form_validation');    

        $this->form_validation->set_rules('name', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi Produk', 'trim|required');
        $this->form_validation->set_rules('price', 'Harga Produk', 'trim|required|numeric|integer');
        $this->form_validation->set_rules('stock', 'Harga Produk', 'trim|required|numeric|integer');         
        if (empty($_FILES['userfile']['name'])) {
            $this->form_validation->set_rules('userfile', 'Gambar Produk', 'trim');
        } else{
            $this->form_validation->set_rules('userfile', 'Gambar Produk', 'trim|callback_file_selected_test');
        }
    }

	public function index()
	{
        $data = array(
            'main_view'     => 'products/view_products',
            'link'          => 'dashboard/products',
            'judul'         => 'Daftar Produk',            
            'query'         =>  $this->db->order_by('id', 'DESC')->get('products')->result()
    	);

		$this->load->view('dashboard/template', $data);		
	}

    public function add()
    {
        $data = array(
            'main_view'     => 'products/form_products',
            'link'          => 'dashboard/products',
            'judul'         => 'Tambah Produk',
            'aksi'          => 'dashboard/products/add',
            'btn'           => 'Simpan'
        );          

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('dashboard/template', $data);

        } else {

            $config['upload_path']      = './uploads/';
            $config['allowed_types']    = 'jpg|jpeg|png';
            $config['max_size']         = 500; // kb
            $config['max_width']        = 2000; // pixels
            $config['max_height']       = 2000;
            $config['encrypt_name']     = TRUE;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile') ) {
                $err = $this->upload->display_errors();

                $this->session->set_flashdata('pesan', array('message' => strip_tags($err), 'class' => 'error', 'title' => 'Warning'));

                $this->load->view('dashboard/template', $data);
            } else {
                $gambar = $this->upload->data();

                $this->products_model->save($gambar);   

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', array('message' => 'Berhasil Menyimpan Data Produk', 'class' => 'success', 'title' => 'Sukses'));
                }
                else {
                    $this->session->set_flashdata('pesan', array('message' => 'Gagal Menyimpan Data Produk', 'class' => 'error', 'title' => 'Warning'));
                }
                
                redirect('dashboard/products');
            }   

        }        
    }

    public function edit($id)
    {
        $data = array(
            'main_view'     => 'products/form_products',
            'link'          => 'dashboard/products',
            'judul'         => 'Ubah Produk',
            'aksi'          => 'dashboard/products/edit/' . $id,
            'btn'           => 'Ubah',
            'query'         => $this->products_model->getBy($id)
        );            

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dashboard/template', $data);
        } else {

            if ($_FILES['userfile']['name'] != '') {
                $config['upload_path']      = './uploads/';
                $config['allowed_types']    = 'jpg|jpeg|png';
                $config['max_size']         = 500; // mb
                $config['max_width']        = 2000; // pixels
                $config['max_height']       = 2000;
                $config['encrypt_name']     = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile') ) {
                    $err = $this->upload->display_errors();

                    $this->session->set_flashdata('pesan', array('message' => strip_tags($err), 'class' => 'error', 'title' => 'Warning'));                

                    $this->load->view('dashboard/template', $data);
                } else {
                    unlink('uploads/' . $data['query']->image);

                    $gambar = $this->upload->data();

                    $this->products_model->update($id, $gambar);

                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan', array('message' => 'Berhasil Mengubah Data Produk', 'class' => 'success', 'title' => 'Sukses'));
                    } else {
                        $this->session->set_flashdata('pesan', array('message' => 'Gagal Mengubah Data Produk', 'danger' => 'info','title' => 'Warning!'));
                    }
                    
                    redirect('dashboard/products');
                }   
            } else {
                $this->products_model->update($id, $gambar="");
                
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('pesan', array('message' => 'Berhasil Mengubah Data Produk', 'class' => 'success', 'title' => 'Sukses'));
                } else {
                    $this->session->set_flashdata('pesan', array('message' => 'Gagal Mengubah Data Produk', 'danger' => 'info','title' => 'Warning!'));
                }
                
                redirect('dashboard/products');                
            }

        }   
    }

    public function delete($id)
    {
        $data['query'] = $this->products_model->getBy($id);

        unlink('uploads/' . $data['query']->image);
        $hapus = $this->db->delete('products', array('id' => $id)); 

        if($hapus) {
            $this->session->set_flashdata('pesan', array('message' => 'Berhasil Menghapus Data Produk', 'class' => 'success', 'title' => 'Sukses'));
        } else {
            $this->session->set_flashdata('pesan', array('message' => 'Gagal Menghapus Data Produk', 'class' => 'danger', 'title' => 'Warning!'));
        }

        redirect('dashboard/products');
    }

    public function file_selected_test()
    {
        $this->form_validation->set_message('file_selected_test', 'Pilih gambar produk.');

        if (empty($_FILES['userfile']['name'])) {
            return false;
        } else{
            return true;
        }
    }

}
