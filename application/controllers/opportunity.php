<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Opportunity extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_opportunity');
		check_not_login();
	}

	public function index(){
		$opportunity = $this->m_opportunity->show();
		$config = pagination('http://localhost/crm/opportunity/index/', $opportunity->num_rows(),10);
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'Opportunity';
		$data['opportunities'] = $this->m_opportunity->getData('Opportunities',array('SBU'=>$_SESSION['ID_SBU']))->result();
		// $data['opportunities'] = $this->m_opportunity->getTableLimit($config['per_page'],$data['start'])->result();		
		$this->load->view('page/opportunity/index', $data);
	}

	public function tambahOpportunity(){
		$data['title'] = 'Tambah Opportunity';
		$data['no_opportunity'] = $this->m_opportunity->getNo_Opportunity();
		$this->load->view('page/opportunity/tambah', $data);
	}

	public function simpan(){
		$this->form_validation->set_rules('topic', 'topic', 'required');
		$this->form_validation->set_rules('nama_pelanggan', 'nama pelanggan', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal opportunity', 'required');
		$this->form_validation->set_rules('tanggal_target', 'tanggal target penjualan', 'required');
		if($this->form_validation->run() == false){
			$error = array(
				'topic_error' => form_error('topic'),
				'nama_pelanggan_error' => form_error('nama_pelanggan'),
				'tanggal_error' => form_error('tanggal'),
				'tanggal_target_error' => form_error('tanggal_target')
			);
			echo json_encode(['error' => $error]);
		}
		else{
			
			echo json_encode(['success' => 'Record added successfully.']);
			$data = array(
				'KATEGORI' 			=> $this->input->post('kategori'),
				'CRM_STATUS' 		=> $this->input->post('status'),
				'NO_OPPORTUNITY' 	=> $this->input->post('no_opportunity'),
				'TOPIC' 			=> $this->input->post('topic'),
				'NAMA_PELANGGAN' 	=> $this->input->post('nama_pelanggan'),
				'TANGGAL' 			=> $this->input->post('tanggal'),
				'TANGGAL_TARGET' 	=> $this->input->post('tanggal_target'),
				'TIPE_SURVEY' 		=> $this->input->post('tipe_survey'),
				'WAKTU_PEMESANAN' 	=> $this->input->post('waktu_pemesanan'),
				'PENDAPATAN' 		=> str_replace( array('Rp','.'), '', $this->input->post('rupiah1')),
				'ANGGARAN' 			=> str_replace( array('Rp','.'), '', $this->input->post('rupiah2')),
				'PROSES_PEMESANAN' 	=> $this->input->post('proses_pemesanan'),
				'DESKRIPSI' 		=> $this->input->post('deskripsi'),
				'SITUASI_SEKARANG' 	=> $this->input->post('situasi_sekarang'),
				'KEBUTUHAN_PELANGGAN' => $this->input->post('kebutuhan_pelanggan'),
				'SOLUSI' 			=> $this->input->post('solusi'),
				'SBU' 				=> $this->input->post('id_sbu'),
				'PEMILIK' 			=> $this->input->post('crm_owner')
			);
			$this->m_opportunity->insert('opportunities', $data);
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Opportunity berhasil ditambah</div>");
		}
	}

	public function edit($id){
		$data['title'] = 'Update Opportunity';
		$data['opportunities'] = $this->m_opportunity->getData('opportunities',array('ID_OPPORTUNITY'=> $id))->result();
		$this->load->view('page/opportunity/update',$data);
	}

	public function update($id)
	{
		var_dump($_POST);
		$data = array(
			'KATEGORI' 			=> $this->input->post('kategori'),
			'CRM_STATUS' 		=> $this->input->post('status'),
			'NO_OPPORTUNITY' 	=> $this->input->post('no_opportunity'),
			'TOPIC' 			=> $this->input->post('topic'),
			'NAMA_PELANGGAN' 	=> $this->input->post('nama_pelanggan'),
			'TANGGAL' 			=> $this->input->post('tanggal'),
			'TANGGAL_TARGET' 	=> $this->input->post('tanggal_target'),
			'TIPE_SURVEY' 		=> $this->input->post('tipe_survey'),
			'WAKTU_PEMESANAN' 	=> $this->input->post('waktu_pemesanan'),
			'PENDAPATAN' 		=> str_replace( array('Rp','.'), '', $this->input->post('rupiah1')),
			'ANGGARAN' 			=> str_replace( array('Rp','.'), '', $this->input->post('rupiah2')),
			'PROSES_PEMESANAN' 	=> $this->input->post('proses_pemesanan'),
			'DESKRIPSI' 		=> $this->input->post('deskripsi'),
			'SITUASI_SEKARANG' 	=> $this->input->post('situasi_sekarang'),
			'KEBUTUHAN_PELANGGAN' => $this->input->post('kebutuhan_pelanggan'),
			'SOLUSI' 			=> $this->input->post('solusi'),
			'SBU' 				=> $this->input->post('id_sbu'),
			'PEMILIK' 			=> $this->input->post('crm_owner')
		);
		$this->m_opportunity->update('opportunities',$data,array('ID_OPPORTUNITY' => $id));
		$this->session->set_flashdata('message', "<div class='alert alert-success'>Opportunity berhasil diubah.</div>");
		redirect('opportunity');
	}
	public function delete($id)
	{
		$this->m_opportunity->delete('opportunities',$id);
		$this->session->set_flashdata('message', "<div class='alert alert-success'>Opportunity berhasil dihapus.</div>");
		redirect('opportunity');
	}
}
?>