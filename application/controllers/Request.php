<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model("requestmodel");	

	}

	public function index()
	{
		if($_SESSION['level'] == 'Member' ){
			$data['data'] = $this->db->select('*')
                    ->where('submitted', $_SESSION['username'])
                    ->get('request')->result_array();
		} else {
			$data['data'] = $this->requestmodel->getData()->result_array();
		}

		$this->load->view('request/list', $data);
	}

	public function add()
	{

		if(isset($_SESSION['username'])) {
			if ($this->input->post()) 
			{
				// Validasi
				$this->form_validation->set_rules('DCName', 'DC Name', 'trim|required');
				$this->form_validation->set_rules('floor', 'Floor', 'trim|required');

				// Jika validasi berhasil
				if ($this->form_validation->run() == FALSE) 
				{
					$data['datadc']=$this->requestmodel->get_dc();
					$this->load->view('request/add', $data);
				} 
				else 
				{
					$submitted = $_SESSION['username'];

					if ($_SESSION['level'] == 'Member'){
						$datas = array(
								'DCName'	=> $this->input->post('DCName'),
		    					'floor'		=> $this->input->post('floor'),
		    					'subject'	=> $this->input->post('subject'),
		    					'deskripsi'	=> $this->input->post('deskripsi'),
		    					'submitted'	=> $submitted
							);

					} else {
						$datas = array(
								'DCName'	=> $this->input->post('DCName'),
		    					'floor'		=> $this->input->post('floor'),
		    					'subject'	=> $this->input->post('subject'),
		    					'deskripsi'	=> $this->input->post('deskripsi'),
		    					'status'	=> $this->input->post('status'),
		    					'remark'	=> $this->input->post('remark'),
		    					'submitted'	=> $submitted
							);
					}

					$query = $this->requestmodel->insert($datas);

					if ($query) 
					{
						$this->session->set_flashdata('info', 'Success');
						redirect('request');
					}
				}
			}
			else
			{
				// data dc untuk admin
		        $data['datadc'] = $this->requestmodel->get_dc();

		        // Mengambil data lantai berdasarkan departement user
		        $data['floor'] = $this->db->select('*')
		                    ->where('DCName', $_SESSION['department'])
		                    ->get('tbl_capacity')->result_array();

				$this->load->view('request/add', $data);
			}
		} 
		else 
		{
			$this->load->view('login');
		}
	}

	public function edit($idrequest)
	{
		if(isset($_SESSION['username'])) {
		
			$id = $idrequest;

			if ($this->input->post()) 
			{
				if ($_SESSION['level'] == 'Member'){

					$datas = array(
							'DCName'	=> $this->input->post('DCName'),
	    					'floor'		=> $this->input->post('floor'),
	    					'subject'	=> $this->input->post('subject'),
	    					'deskripsi'	=> $this->input->post('deskripsi'),
	    					'status'	=> $this->input->post('status'),
	    					'remark'	=> $this->input->post('remark'),
	    					'submitted'	=> $this->input->post('submitted'),
	    					'approved'	=> $this->input->post('approved')
						);

				} else {
					$approved = $_SESSION['username'];

					$datas = array(
							'DCName'	=> $this->input->post('DCName'),
	    					'floor'		=> $this->input->post('floor'),
	    					'subject'	=> $this->input->post('subject'),
	    					'deskripsi'	=> $this->input->post('deskripsi'),
	    					'status'	=> $this->input->post('status'),
	    					'remark'	=> $this->input->post('remark'),
	    					'submitted'	=> $this->input->post('submitted'),
	    					'approved'	=> $approved
						);
				}

				// melempar data ke model
				$this->requestmodel->update($id,$datas);
			
				if ($this->db->affected_rows()) 
				{
					$this->session->set_flashdata('info', 'Success');
					redirect('request');
				}
			}
			else
			{
				// Menampilkan data
				$data['editdata'] = $this->db->get_where('request', array('id' => $id))->row();
				$this->load->view('request/edit', $data);
			}
		} else {
			$this->load->view('login');
		}

	}

	public function delete($idrequest)
	{
		$id = $idrequest;
		$this->requestmodel->delete($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Success');
			redirect('request');
		}
		else 
		{
			$this->session->set_flashdata('info', 'Failed');
			redirect('request');	
		}
	}


 	// Mengambil data floor berdasarkan DC
    function get_floor(){
        $namadc = $this->input->post('DCName');
        $data = $this->requestmodel->get_floor($namadc);
        echo json_encode($data);
    }

    function get_rack(){

    	$rack = $this->input->post('id');
    	
    	$data = $this->db->select('*')
                    ->where('rack', $rack)
                    ->get('inventory')->result_array();

		echo json_encode($data);
    }

	
}
