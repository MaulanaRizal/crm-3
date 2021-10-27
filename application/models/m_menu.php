<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_menu extends CI_Model {

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
    public function update($table,$data,$id)
    {
        $where = array(
            'ID_MENU' => $id
        );
        $this->db->update($table,$data,$where);
    }
    public function delete($id)
    {
        $data = array(
            'ID_MENU' => $id
        );
        $this->db->delete('menus',$data);
    }
    public function deleteAll($table)
    {
        $this->db->empty_table($table);
    }

}
?>