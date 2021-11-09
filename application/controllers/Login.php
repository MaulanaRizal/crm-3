<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		check_already_login();
		$this->load->view('auth/login');
	}

	public function proses()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('login_message', 'Terjadi kesalahan, lakukan login kembali');
			redirect('login');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->load->model('m_login');
			$query = $this->m_login->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$data = $this->m_login->get($row->ID_USER)->row();
				$params = array(
					'ID_USER'	 	=> $data->ID_USER,
					'ID_ROLE' 		=> $data->ID_ROLE,
					'ID_SBU' 		=> $data->ID_SBU,
					'CRM_EMAIL' 	=> $data->CRM_EMAIL,
					'NAMA_LENGKAP' 	=> $data->NAMA_LENGKAP,
					'TELEPON' 		=> $data->TELEPON,
					'CRM_ROLE' 		=> $data->CRM_ROLE,
					'SBU_REGION'    => $data->SBU_REGION
				);
				$this->session->set_userdata($params);
				redirect('user/dashboard');
			} else {
				$this->session->set_flashdata('login_message', 'Maaf, Email atau Password salah');
				$this->load->view('auth/login');
			}
		}
	}



	public function logout()
	{
		// $params = array('ID_USER', 'ID_ROLE');
		// $this->session->unset_userdata($params);
		session_destroy();
		redirect('login');
	}
}
