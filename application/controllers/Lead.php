<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_lead');
		$this->load->model('m_opportunity');
		check_not_login();	

	}

	public function index(){
		$lead = $this->m_lead->show();
		$config = pagination('http://localhost/crm/lead/index/', $lead->num_rows(),20);
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'Lead';
		$data['lead'] = $this->m_lead->getTableLimit($config['per_page'],$data['start'])->result();		
		$this->load->view('page/lead/tampil', $data);
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$lead = $this->m_lead->search($keyword);
		$hasil = $this->load->view('page/lead/view', array('leads' => $lead), true);
		$callback = array(
			'hasil' => $hasil,
		);
		echo json_encode($callback);
	}

	public function tambahLead(){
		$data['title'] = 'Tambah Lead';
		$this->load->view('page/lead/tambah', $data);
	}

	public function qualify($id_leads){
		$data['title'] = 'Tambah Opportunity';
		$data['no_opportunity'] = $this->m_opportunity->getNo_Opportunity();
		$data['lead'] = $this->m_lead->getQualify($id_leads);
		$this->load->view('page/opportunity/qualify', $data);
	}

	public function simpan(){
		$this->form_validation->set_rules('topic', 'topic', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if ($this->form_validation->run() == false) {
			$error = array(
				'topic_error' => form_error('topic'),
				'nama_error' => form_error('nama')			
			);
			echo json_encode(['error' => $error]);
		}
		else{
			echo json_encode(['success' => 'Record added successfully.']);
			$data = array(
				'SUMBER_LEAD' => $this->input->post('sumber_lead'),
				'RATING' => $this->input->post('rating'),
				'CRM_STATUS' => $this->input->post('status'),
				'ID_USER' => $this->input->post('crm_owner'),
				'PEMILIK' => $this->input->post('pemilik'),
				'TOPIC' => $this->input->post('topic'),
				'NAMA' => $this->input->post('nama'),
				'PEKERJAAN' => $this->input->post('pekerjaan'),
				'TELEPON' => $this->input->post('telepon'),
				'COORDINAT' => $this->input->post('coordinat'),
				'ALAMAT' => $this->input->post('alamat'),
				'PENAWARAN' => $this->input->post('penawaran'),
				'PENAWARAN_KEMBALI' => $this->input->post('penawaran_kembali')
			);
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Lead berhasil ditambahkan</div>");
			$this->m_lead->insert('leads', $data);
		}
	}

	public function updateLead($id_leads){
		$data['title'] = 'Update Lead';
		$data['lead'] = $this->m_lead->getId($id_leads);
		$this->load->view('page/lead/update', $data);
	}

	public function update(){
		$this->form_validation->set_rules('topic', 'topic', 'required');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if ($this->form_validation->run() == false) {
			$error = array(
				'topic_error' => form_error('topic'),
				'nama_error' => form_error('nama')			
			);
			echo json_encode(['error' => $error]);
		}
		else{
			echo json_encode(['success' => 'Record added successfully.']);
			$id_leads = $this->input->post('id_leads');
			$data = array(
				'SUMBER_LEAD' => $this->input->post('sumber_lead'),
				'RATING' => $this->input->post('rating'),
				'CRM_STATUS' => $this->input->post('status'),
				'ID_USER' => $this->input->post('crm_owner'),
				'PEMILIK' => $this->input->post('pemilik'),
				'TOPIC' => $this->input->post('topic'),
				'NAMA' => $this->input->post('nama'),
				'PEKERJAAN' => $this->input->post('pekerjaan'),
				'TELEPON' => $this->input->post('telepon'),
				'COORDINAT' => $this->input->post('coordinat'),
				'ALAMAT' => $this->input->post('alamat'),
				'PENAWARAN' => $this->input->post('penawaran'),
				'PENAWARAN_KEMBALI' => $this->input->post('penawaran_kembali')	
			);
			$this->m_lead->update($data, $id_leads);
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Lead berhasil diubah</div>");

		}
	}

	public function disqualify(){
		$id_lead = $this->input->post('id_lead');
		$this->m_lead->disqualify($id_lead);
		redirect('lead');
	}
}
?>