<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class M_alamat extends CI_Model {

	public function __construct(){
		parent::__construct();
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
        $this->db->join('addreess',"users.ID_USER=addreess.CREATED_BY");
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
    public function update($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }
    public function delete($table,$where)
    {
        $this->db->delete($table,$where);
    }
    public function getAlamat()
    {
        $db = $this->db->get('addreess');
        if($db->num_rows()==0){
            return $db;
        }else{
            return $this->db->query("SELECT addreess.*,users.NAMA_LENGKAP  FROM `addreess` INNER JOIN users where addreess.CREATED_BY=users.ID_USER ORDER BY addreess.CREATED_ON DESC");
        }
    }
    public function search($key)
    {
        
        $this->db->select();
        $this->db->from('addreess ');
        $this->db->like('NAMA',$key,'both');
        $this->db->or_like('NO_ADDRESS ', $key);
        $this->db->or_like('KATEGORI ', $key);
        $this->db->or_like('TIPE ', $key);
        $this->db->or_like('PROVINSI ', $key);
        $this->db->or_like('KABUPATEN ', $key);
        $this->db->or_like('KECAMATAN ', $key);
        $this->db->or_like('CRM_STATUS ', $key);
        return $this->db->get();
    }
    public function getLastID()
    {
        return $this->db->query("SELECT max(ID_ADDRESS) as id FROM `addreess`");
    }
}
?>