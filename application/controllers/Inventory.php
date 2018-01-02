<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        $this->load->database();

		$this->load->model("inventorymodel");

	}

	public function index()
	{
		if(isset($_SESSION['username'])) {
			$data['data']	= $this->inventorymodel->getData()->result_array();
			
			$this->load->view('inventory/map', $data);
		} else {
			$this->load->view('login');
		}
		
	}

	public function listing()
	{
		if(isset($_SESSION['username'])) {
			$data['data']	= $this->inventorymodel->getData()->result_array();
			
			$this->load->view('inventory/listing', $data);
		} else {
			$this->load->view('login');
		}
	}

	public function create()
	{
		if(isset($_SESSION['username'])) {
			if ($this->input->post()) 
			{
				$this->form_validation->set_rules('coor_rack', 'Koordinat Rack', 'trim|required');
				$this->form_validation->set_rules('type_hardware', 'Type Hardware', 'trim|required');

				// Jika validasi berhasil
				if ($this->form_validation->run() == FALSE) 
				{
					$this->load->view('inventory/create', $data);
				} 
				else 
				{
					$datas = array(
						'coor_rack'		=> $this->input->post('coor_rack'),
						'type_hardware'	=> $this->input->post('type_hardware'),
						'sn'			=> $this->input->post('sn'),
						'hostname'		=> $this->input->post('hostname'),
						'pic'			=> $this->input->post('pic'),
						'po_number'		=> $this->input->post('po_number')
					);

					$query = $this->inventorymodel->insert($datas);

					if ($query) 
					{
						$this->session->set_flashdata('info', 'Success');
						redirect('inventory/listing');
					}
				}
			}
			else
			{
				$this->load->view('inventory/create', $data);
			}
		} else {
			$this->load->view('login');
		}
	}

	public function update($idserver)
	{
		$id = $idserver;

		if(isset($_SESSION['username'])) {

			if ($this->input->post()) 
			{
				// validasi
				$this->form_validation->set_rules('coor_rack', 'Koordinat Rack', 'trim|required');
				$this->form_validation->set_rules('type_hardware', 'Type Hardware', 'trim|required');

				// Jika validasi berhasil
				if ($this->form_validation->run() == FALSE) 
				{
					$data['editdata'] = $this->db->get_where('inventory', array('id' => $id))->row();
					$this->load->view('inventory/update', $data);
				}
				else
				{
					$datas = array(
						'coor_rack'		=> $this->input->post('coor_rack'),
						'type_hardware'	=> $this->input->post('type_hardware'),
						'sn'			=> $this->input->post('sn'),
						'hostname'		=> $this->input->post('hostname'),
						'pic'			=> $this->input->post('pic'),
						'po_number'		=> $this->input->post('po_number')
					);

					// melempar data ke model
					$this->inventorymodel->update($id,$datas);
				
					if ($this->db->affected_rows()) 
					{
						$this->session->set_flashdata('info', 'Success');
						redirect('inventory/listing');
					}
					else 
					{
						redirect('inventory/listing');	
					}
				}

			}
			else
			{
				// Menampilkan data
				$data['editdata'] = $this->db->get_where('inventory', array('id' => $id))->row();

				$this->load->view('inventory/update', $data);
			}
		} else {
			$this->load->view('login');
		}

	}

	public function delete($idserver)
	{
		$id = $idserver;
		$this->inventorymodel->delete($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Success');
			redirect('inventory/listing/');
		}
	}

	
}
