<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Inventorymodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getData()
	{
		$data = $this->db->select('*')
                ->order_by('coor_rack ASC')
                ->get('inventory');

		return $data;

	}

	public function insert($datas)
	{
		return $this->db->insert('inventory', $datas);
	}

	function update($id,$datas)
	{
		$this->db->where('id', $id);
		$this->db->update('inventory', $datas);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('inventory');
	}

}
