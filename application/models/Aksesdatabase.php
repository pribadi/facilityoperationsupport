<?php
class Aksesdatabase extends CI_Model {
    public function __construct()
    {
    	parent::__construct();
        $this->load->database();
    }

    function getListDCName() {
		$this->db->select("DCName")
				->from("tbl_dc");
		$rec = $this->db->get();
		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		return FALSE;
    }

	function getListFloor($dcName) {
		$this->db->select("floor")
				->from("tbl_capacity")
				->where("DCName",$dcName);
		$rec = $this->db->get();

		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		return FALSE;
	}

	function getDataCapacity($dcName, $floor) {
		$where = "DCName='".$dcName."' AND floor='".$floor."'";
		$this->db->select('power, cooling, space')
				->from("tbl_capacity")
				->where($where);
		$rec = $this->db->get();
		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		return FALSE;
	}

	function getListData($dcName, $floor) {
		$where = "DCName='".$dcName."' AND floor='".$floor."'";
		$this->db->select('date, power, cooling, space')
				->from("tbl_data")
				->where($where);
		$rec = $this->db->get();
		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		return FALSE;
	}

	function getDataUtil($date, $dcName, $floor) {
		$where = "date='".$date."' AND DCName='".$dcName."' AND floor='".$floor."'";
		$this->db->select('power, cooling, space')
				->from("tbl_data")
				->where($where);
		$rec = $this->db->get();
		if($rec->num_rows()>0)
		{
			return $rec->result();
		}
		return FALSE;
	}
}
?>
