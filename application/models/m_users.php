<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_users extends CI_Model {

	public function __construct(){
		parent::__construct();
        
    }
    public function getTable()
    {
        $data = $this->db->query('SELECT * FROM users INNER JOIN sbu on users.ID_SBU=sbu.ID_SBU INNER JOIN roles on users.ID_SBU=roles.ID_ROLE');
        return $data;
    }
    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
        
    }
}
?>