<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_agreement extends CI_Model {

	public function __construct(){
		parent::__construct();
    }
    public function getTable($table)
    {
        $data = $this->db->get($table);
        return $data;
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
    public function update($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }
    public function delete($table,$where)
    {
        $this->db->delete($table,$where);
    }
    public function getAgreementUsers()
    {
        $this->db->select();
        $this->db->from('opportunities');
        $this->db->join('agreements','opportunities.ID_OPPORTUNITY=agreements.ID_OPPORTUNITY');
        $this->db->order_by('agreements.ID_OPPORTUNITY','asc');
        return $this->db->get();
    }
    public function getLastID()
    {
        return $this->db->query("SELECT max(ID_AGREEMENT) as id FROM `agreements`");
    }

}
?>