<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_produk', 'model');
    }


	public function index()
	{
        $data['title'] 	= 'Daftar Produk';
        $data['products'] = $this->model->getTable('product')->result();
		$this->load->view('page/produk/index',$data);
	}

    public function tambah()
    {
        $data['title'] 	= 'Tambah Produk';
		$this->load->view('page/produk/tambah',$data);
    }
    public function insert()
    {
        $data = array(
            'NAMA_PRODUCT'      => $_POST['nama_produk'],
            'SEKALI_PAKAI'      => $_POST['sekali_pakai'],
            'AWAL_PENGGUNAAN'   => $_POST['awal_penggunaan'],
            'AKHIR_PENGGUNAAN'  => $_POST['akhir_penggunaan'],
            'HARGA_DEFAULT'     => $_POST['harga_produk']
        );
        $this->model->insert('product',$data);
        redirect('produk');
    }

    public function edit($id)
    {
        $data['title'] 	= 'Edit Produk';
        $data['product'] = $this->model->getData('product',array('ID_PRODUCT'=>$id))->result();
        $this->load->view('page/produk/edit',$data);

    }

    public function update($id)
    {
        $data = array(
            'NAMA_PRODUCT'      => $_POST['nama_produk'],
            'SEKALI_PAKAI'      => $_POST['sekali_pakai'],
            'AWAL_PENGGUNAAN'   => $_POST['awal_penggunaan'],
            'AKHIR_PENGGUNAAN'  => $_POST['akhir_penggunaan'],
            'HARGA_DEFAULT'     => $_POST['harga_produk']
        );
        $this->model->update('product',$data,array('ID_PRODUCT'=>$id));
        redirect('produk');
    }

    public function delete($id)
    {
        $this->model->delete('product',array('ID_PRODUCT'=>$id));
        redirect('produk');

    }
}
?>