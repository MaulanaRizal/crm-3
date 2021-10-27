<?php 

/**
 * 
 */
class M_sbu extends CI_Model{
    public $NO_SBU;
	
	public function __construct(){
		parent::__construct();
	}
	public function show(){
		$data = $this->db->query("select * from sbu");
		return $data;
	}
    public function getTableLimit($limit,$offset){  
        $this->db->select();
        $this->db->from('sbu');
        $this->db->limit($limit,$offset);
        return $this->db->get();
    }


	public function insert($table, $data){
        $this->db->insert($table, $data);
    }
    public function search($keyword){
        $data = $this->db->query("select * from sbu where SBU_OWNER like '$keyword' or SBU_REGION like '$keyword'");
        return $data;
    }
    public function delete($id_sbu){
    	$hasil = $this->db->query("delete from sbu where ID_SBU = '$id_sbu'");
    	return $hasil;
    }
    public function update($data, $id_sbu){
    	$this->db->where('id_sbu',$id_sbu);
    	$this->db->update('sbu', $data);
    	return true;
    }
}
?>