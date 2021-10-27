<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_login extends CI_Model {


	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('CRM_EMAIL', $post['email']);
		$this->db->where('CRM_PASSWORD', md5($post['password']));
		$query = $this->db->get();
		return $query;
	}
	public function get($id){
		$data = $this->db->query("SELECT * FROM users INNER JOIN sbu ON users.ID_SBU = sbu.ID_SBU INNER JOIN roles ON users.ID_ROLE = roles.ID_ROLE WHERE users.ID_USER = $id");
		return $data;
	}
}
?>