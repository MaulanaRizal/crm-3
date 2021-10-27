<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_Target_Tahunan_Pusat extends CI_Model {

	public function __construct(){
		parent::__construct();
    }
    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }
    public function getTable($table)
    {
        return $this->db->get($table);
    }
    public function getData($table,$where){
        return $this->db->get_where($table,$where);
    }
    public function getDaftarSBU($period)
    {
        $this->db->select('*');
        $this->db->from('annual_target');
        $this->db->join('sbu','sbu.ID_SBU=ANNUAL_TARGET.SBU','left');
        $this->db->where('PERIODE',$period);
        return $this->db->get();
        // $this->db->query("SELECT * from ANNUAL_TARGET JOIN sbu on ANNUAL_TARGET.ID_SBU=sbu.ID_SBU");
    }
    public function update($table,$data,$where)
    {
        $this->db->where($where);
       $this->db->update($table,$data);
    }
    public function getSalesSBU($periode)
    {
        // mengambil banyak sales padasetiap SBU dan mengambil targetsbu pada periode tertentu
        return $this->db->query("SELECT * from sbu join (SELECT count(ID_ROLE=2) as sales, ID_SBU from users group by ID_SBU) as sales on sales.id_sbu=sbu.ID_SBU join annual_target on annual_target.SBU=sbu.ID_SBU where annual_target.PERIODE=$periode");
    }
    public function getPeriode()
    {
        return $this->db->query("select PERIODE from annual_target GROUP BY PERIODE ORDER BY `annual_target`.`PERIODE` DESC");
    }
    public function delete($table,$where)
    {
        $this->db->delete($table,$where);
    }
    public function sbuannual($periode)
    {
        return $this->db->query("SELECT * FROM sbu LEFT JOIN (SELECT * FROM annual_target WHERE periode=$periode) as annual ON annual.SBU=sbu.ID_SBU");
    }
}
?>