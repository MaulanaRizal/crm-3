<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_Target_Tahunan extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }
    public function getData($table,$where){
        return $this->db->get_where($table,$where);
    }
    public function tampilSalesSBUTarget($where)
    {
        $this->db->select();
        $this->db->from('annual_target_sbu');
        $this->db->join('users','annual_target_sbu.ID_SALES=users.ID_USER');
        $this->db->join('sbu','users.ID_SBU=sbu.ID_SBU');
        $this->db->where($where);
        return $this->db->get();
    }
    public function update($table,$data,$where)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function getPeriode()
    {
        $arr = $this->db->query("select PERIODE FROM annual_target_sbu GROUP BY PERIODE ORDER BY `annual_target_sbu`.`PERIODE` DESC")->result();
        foreach($arr as $periode){
            $tahun[] = $periode->PERIODE;
        }
        return $tahun;
    }
    public function delete($table,$where)
    {
        
        $this->db->delete($table,$where);
    }

}
?>