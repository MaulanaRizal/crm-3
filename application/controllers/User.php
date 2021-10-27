<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();	
	}

	public function dashboard()
	{
        $data['title']      = 'Dashboard';
		
		$this->load->view('page/dashboard',$data);
	}
	public function opportunity()
	{
		$this->load->view('page/opportunity/indexOpportunity');
	}
	public function agreements()
	{
		$this->load->view('page/agreement/tampil');
	}
	public function services()
	{
		$this->load->view('page/service');
	}
}
