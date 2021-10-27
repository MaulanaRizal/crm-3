<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fungsi{
	protected $ci;
	function __construct(){
		$this->ci =& get_instance();
	}
	function user_login(){
		$this->ci->db->select('*');
		$this->ci->db->from('users');
		$this->ci->db->join('sbu', 'users.ID_SBU = sbu.ID_SBU');
		$this->ci->db->join('roles', 'users.ID_ROLE = roles.ID_ROLE');
		$query = $this->ci->db->get()->row();
		return $query;
	}
}
?>