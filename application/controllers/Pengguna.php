<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('m_pengguna','model');
		check_not_login();
    }
	public function index()
	{
		$user =  $this->model->getTable('users');
		$config = pagination('http://localhost/crm/pengguna/index/',$user->num_rows(),10);

		$this->pagination->initialize($config);
		$data['start']	= $this->uri->segment(3);
		$data['title'] 	= 'Pengguna';
		$data['user'] 	= $this->model->getTableLimit($config['per_page'],$data['start'])->result();
		$this->load->view('page/users/tampil', $data);
	}

	public function tambah()
	{
		// $data = $this->model->getTable('ROLES')->result();
		$data['title']	= 'Tambah Pengguna';
		$data['roles'] 	= $this->model->getRole()->result();
		$data['sbu'] 	= $this->model->getSBU()->result();
		$this->load->view('page/users/tambah',$data);
	}
	public function insert()
	{
		$data = array (
			'CRM_EMAIL' =>$_POST['email'].'@iconplus.com'
		);
		$check = $this->model->getData('users',$data)->num_rows();
		echo $check;
		if($check>0){
			// echo 'Tersedia';
			$this->session->set_flashdata('message','Email sudah tersedia. Silahkan masukan email yang lain');
			redirect('pengguna/tambah');
		}else{
			if(isset($_POST['status'])==true){
				$status = true;
			} else {
				$status = false;
			}
			$data = array(
				'ID_SBU' 		=> $_POST['sbu'],
				'ID_ROLE'		=> $_POST['role'],
				'CRM_EMAIL'		=> $_POST['email'].'@iconplus.com',
				'CRM_PASSWORD'	=> md5($_POST['password']),
				'NAMA_LENGKAP'	=> $_POST['nama'],
				'TELEPON'		=> $_POST['telepon'],
				'CRM_STATUS'	=> $status
			);
			$this->model->insert('users',$data);
			$this->session->set_flashdata('message','Data berhasil dimasukan');
			redirect('pengguna');
			// echo 'Tidak Tersedia';
		}
	}
	public function edit($id)
	{
		$where = array (
			'ID_USER' =>$id
		);
		$data['title']	= 'Edit Pengguna';
		$data['roles'] 	= $this->model->getTable('ROLES')->result();
		$data['sbu'] 	= $this->model->getTable('SBU')->result();
		$data['user']	= $this->model->getData('users',$where)->result();
		$data['id']		= $id;
		$this->load->view('page/users/edit',$data);
	}
	public function update($id)
	{
			if(isset($_POST['status'])==true){
				$status = true;
			} else {
				$status = false;
			}
			$data = array(
				'ID_SBU' 		=> $_POST['sbu'],
				'ID_ROLE'		=> $_POST['role'],
				'CRM_PASSWORD'	=> md5($_POST['password']),
				'NAMA_LENGKAP'	=> $_POST['nama'],
				'TELEPON'		=> $_POST['telepon'],
				'CRM_EMAIL'		=> $_POST['email'],
				'CRM_STATUS'	=> $status
			);
			$this->model->update('users',$data,$id);
			$this->session->set_flashdata('message','Data berhasil diubah');
			redirect('/pengguna');
			// echo 'Tidak Tersedia';
		
	}
	public function delete($id)
	{
		// echo $id;
		$this->model->delete('users',$id);
		$this->session->set_flashdata('message','Data berhasil dihapus');
		redirect('/pengguna');
	}
}
