<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('usermodel');
	}

	public function index()
	{
		if(isset($_SESSION['username'])) {
			$data['data'] = $this->usermodel->getData()->result_array();
		
			$this->load->view('user/listing', $data);
		} else {
			$this->load->view('login');
		}
	}

	public function create()
	{
		if(isset($_SESSION['username'])) {
			if ($this->input->post()) 
			{
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				// $this->form_validation->set_rules('department', 'Department', 'trim|required');
				$this->form_validation->set_rules('level', 'Level', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				// Jika validasi berhasil
				if ($this->form_validation->run() == FALSE) 
				{
					$this->load->view('user/create');
				} 
				else 
				{
					$datas = array(
						'username'		=> $this->input->post('username'),
						'department'	=> $this->input->post('department'),
						'level'			=> $this->input->post('level'),
						'password'		=> md5($this->input->post('password'))
					);

					$query = $this->usermodel->insert($datas);

					if ($query) 
					{
						$this->session->set_flashdata('info', 'Success');
						redirect('user');
					}
				}
			}
			else
			{
				$data['dc'] = $this->db->select('*')->get('tbl_dc')->result_array();

				$this->load->view('user/create', $data);
			}
		
		} else {
			$this->load->view('login');
		}
	}

	public function update($idUser)
	{
		if(isset($_SESSION['username'])) {
			$id = $idUser;

			if ($this->input->post()) 
			{
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				// $this->form_validation->set_rules('department', 'Department', 'trim|required');
				$this->form_validation->set_rules('level', 'Level', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				// Jika validasi berhasil
				if ($this->form_validation->run() == FALSE) 
				{
					$data['editdata'] = $this->db->get_where('user', array('id' => $id))->row();
					$this->load->view('user/update', $data);
				}
				else
				{
					$datas = array(
						'username'		=> $this->input->post('username'),
						'department'	=> $this->input->post('department'),
						'level'			=> $this->input->post('level'),
						'password'		=> md5($this->input->post('password'))
					);


					// melempar data ke model
					$this->usermodel->update($id,$datas);
				
					if ($this->db->affected_rows()) 
					{
						$this->session->set_flashdata('info', 'Success');
						redirect('user');
					} else {
						$this->session->set_flashdata('info', 'Success');
						redirect('user');
					}
				}

			}
			else
			{
				$data['editdata'] = $this->db->get_where('user', array('id' => $id))->row();
				$this->load->view('user/update', $data);
			}
		} else {
			$this->load->view('login');
		}

	}

	public function delete($idUser)
	{
		$id = $idUser;
		$this->usermodel->delete($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Success');
			redirect('user');
		}
		else 
		{
			$this->session->set_flashdata('info', 'Failed');
			redirect('user');	
		}
	}
}
