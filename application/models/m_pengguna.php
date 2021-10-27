<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_pengguna extends CI_Model {

	public function __construct(){
		parent::__construct();
    }
    public function getRole()
    {
        $this->db->select();
        $this->db->from('roles');
        $this->db->order_by('CRM_ROLE', 'ASC');
       return $this->db->get();
    }
    public function getSBU()
    {
        $this->db->select();
        $this->db->from('sbu');
        $this->db->order_by('SBU_REGION', 'ASC');
       return $this->db->get();
    }
    public function getTable($table)
    {
        $data = $this->db->get($table);
        return $data;
    }
    public function getTableLimit($limit,$offset)
    {  
        $this->db->select();
        $this->db->from('users');
        $this->db->join('sbu','users.ID_SBU=sbu.ID_SBU');
        $this->db->join('roles','users.ID_SBU=roles.ID_ROLE');
        $this->db->limit($limit,$offset);
        return $this->db->get();
    }
    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }
    public function getData($table,$data)
    {
        $result = $this->db->get_where($table,$data);
        return $result;
    }
    public function update($table,$data,$id)
    {
        $where = array(
            'ID_USER' => $id
        );
        $this->db->update($table,$data,$where);
    }
    public function delete($table,$id)
    {
        $data = array(
            'ID_USER' => $id
        );
        $this->db->delete($table,$data);
    }
    public function SBUandROLE()
    {
            $data = $this->db->query("SELECT * FROM users INNER JOIN sbu on users.ID_SBU=sbu.ID_SBU INNER JOIN roles on users.ID_SBU=roles.ID_ROLE");
            return $data;
    }

}
?>