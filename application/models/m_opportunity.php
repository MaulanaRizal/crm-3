<?php
class M_opportunity extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function show(){
		$data = $this->db->query("select * from opportunities inner join users on opportunities.PEMILIK=users.ID_USER inner join sbu on opportunities.SBU = sbu.ID_SBU");
		return $data;
	}

	public function getNo_Opportunity(){
		$sql = $this->db->query("select max(right(NO_OPPORTUNITY,4)) as no_opportunity from opportunities where date(TGL) = curdate()");
		$kd = "";
		if ($sql->num_rows() > 0) {
			foreach ($sql->result() as $key) {
				$tmp = ((int)$key->no_opportunity) + 1;
				$kd = sprintf("%04s", $tmp);
			}
		}
		else{
			$kd = "0001";
		}
		date_default_timezone_set('Asia/Jakarta');
		return date('dmy')."/".$kd;
	}

    public function getData($table,$data)
    {
        $result = $this->db->get_where($table,$data);
        return $result;
    }

	public function insert($table, $data){
		$this->db->insert($table, $data);
	}

	public function getTableLimit($limit,$offset){  
        $this->db->select();
        $this->db->from('opportunities');
        $this->db->limit($limit,$offset);
        return $this->db->get();
    }
    public function update($table,$data,$where)
    {
        $this->db->update($table,$data,$where);
    }
}
?>