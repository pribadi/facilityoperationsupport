<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Requestmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
        $this->load->database();

		//Do your magic here
	}		

	public function getData()
	{

		return $this->db->get('request');
	}

	public function insert($datas)
	{
		return $this->db->insert('request', $datas);
	}

	function update($id,$datas)
	{
		$this->db->where('id', $id);
		$this->db->update('request', $datas);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('request');
	}

	function get_dc(){
        $hasil=$this->db->query("SELECT * FROM tbl_dc");
        return $hasil;
    }
 
    function get_floor($namadc){
        $hasil=$this->db->query("SELECT * FROM tbl_capacity WHERE DCName='$namadc'");
        return $hasil->result();
    }

}
