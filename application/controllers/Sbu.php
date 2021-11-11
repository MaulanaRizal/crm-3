<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SBU extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_sbu', 'sbu');
		check_not_login();
	}
	public function index()
	{
		$sbu =  $this->sbu->show();
		// var_dump($sbu);
		$config = pagination('http://localhost/crm/sbu/index/', $sbu->num_rows(), 10);

		$this->pagination->initialize($config);
		$data['start']	= $this->uri->segment(3);
		$data['title'] 	= 'Sbu';
		$data['sbu'] 	= $this->sbu->getTableLimit($config['per_page'], $data['start'])->result();
		log_message('error', 'Some variable did not contain a value.');
		$this->load->view('page/sbu/tampil', $data);
	}
	// $data["sbu"] = $this->sbu->show()->result();
	// $this->load->view('page/sbu/tampil', $data);
	public function tambah()
	{
		$data = array(
			'NO_SBU' 		=> $_POST['no_sbu'],
			'SBU_REGION' 	=> $_POST['sbu_region'],
			'DESKRIPSI'		=> $_POST['deskripsi']
		);
		$this->sbu->insert('sbu',$data);
		$this->session->set_flashdata('message', "<div class='alert alert-success'>" . 'SBU berhasil ditambah' . "</div>");
		redirect('sbu');
	}
	public function ubah()
	{
		$id_sbu = $this->input->post('id_sbu');
		$data = array(
			'SBU_REGION' => $this->input->post('sbu_region'),
			'DESKRIPSI' => $this->input->post('deskripsi')
		);
		$this->sbu->update($data, $id_sbu);
		$this->session->set_flashdata('message', "<div class='alert alert-success'>" . 'SBU berhasil diubah.' . "</div>");
		redirect('sbu');
	}

	public function cari()
	{
		$keyword = $this->input->post('keyword');
		$data = $this->sbu->search($keyword);
		$hasil = $this->load->view('page/sbu/view', array('sbu' => $data), true);
		$callback = array(
			'hasil' => $hasil
		);
		echo json_encode($callback);
	}

	public function hapus()
	{
		$id_sbu = $this->input->post('id_sbu');
		$this->sbu->delete($id_sbu);
		$this->session->set_flashdata('message', "<div class='alert alert-success'>" . 'SBU berhasil dihapus.' . "</div>");
		redirect('sbu');
	}

	public function check()
	{
		var_dump($_POST);
	}
}
