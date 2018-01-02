<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model("aksesdatabase");
		// $this->load->model("requestmodel");

		$this->load->library('grocery_CRUD');
	}

	function index() {
		if(isset($_SESSION['username'])) {
			$dataDCName = $this->aksesdatabase->getListDCName();
			$dataFloor = $this->aksesdatabase->getListFloor($dataDCName[0]->DCName);
			$dataCapacity = $this->aksesdatabase->getDataCapacity($dataDCName[0]->DCName, $dataFloor[0]->floor);
			$dataUtilization = $this->aksesdatabase->getListData($dataDCName[0]->DCName, $dataFloor[0]->floor);

			$viewData['listDCName'] = $dataDCName;
			$viewData['listFloor'] = $dataFloor;
			$viewData['listCapacity'] = $dataCapacity;
			$viewData['listUtilization'] = $dataUtilization[sizeof($dataUtilization) - 1];

			//echo sizeof($dataUtilization);
			//print_r($dataUtilization[sizeof($dataUtilization) - 1]);

			$this->load->view('dashboard', $viewData);
		}
		else {
			$this->load->view('login');
		}
	}

	function inputDC() {
		if(isset($_SESSION['username'])) {
			$crud = new grocery_CRUD();
			$crud->set_table('tbl_dc');
			$crud->required_fields('DCName');
			$crud->callback_before_insert(array($this,'_check_contents'));

			$state = $crud->getState();

			if($state == 'edit') {
				$crud->field_type('DCName', 'readonly');
			}

			$output = $crud->render();
			$this->load->view('inputDC', $output);
		}
		else {
			$this->load->view('login');
		}
	}

	function inputFlCap() {
		if(isset($_SESSION['username'])) {
			$crud = new grocery_CRUD();
			$crud->set_table('tbl_capacity');
			$crud->required_fields('DCName', 'floor');
			$crud->set_relation('DCName','tbl_dc','DCName');
			$crud->callback_before_insert(array($this,'_check_duplicate_cap'));

			$state = $crud->getState();

			if($state == 'edit') {
				$crud->field_type('DCName', 'readonly');
				$crud->field_type('floor', 'readonly');
			}

			$output = $crud->render();
			$this->load->view('inputFlCap', $output);
		}
		else {
			$this->load->view('login');
		}
	}

	function inputData() {
		if(isset($_SESSION['username'])) {
			$crud = new grocery_CRUD();
			$crud->set_table('tbl_data');
			$crud->required_fields('date','DCName', 'floor');
			$crud->set_relation('DCName', 'tbl_dc', 'DCName');
			$crud->callback_before_insert(array($this, '_check_duplicate_util'));
			$crud->callback_add_field('floor',array($this,'_cb_element_floor'));

			$state = $crud->getState();

			if($state == 'edit') {
				$crud->field_type('date', 'readonly');
				$crud->field_type('DCName', 'readonly');
				$crud->field_type('floor', 'readonly');
			}

			$output = $crud->render();

			$this->load->view('inputData', $output);
		}
		else {
			$this->load->view('login');
		}
	}

	function _cb_element_floor()
	{
	    $hasil ='<select name="floor" id="floor">';
        $hasil .='<option></option>';
	    return $hasil.'</select>';
	}

	function _check_contents($post_array) {
		// Check any whitespace in DCName
		if (preg_match('/\s/',$post_array['DCName'])) {
			$status = new stdClass();
			$status->status = false;
			$status->message = 'DCName must not contain whitespace';

			return $status;
		}
		else {
			return true;
		}
	}

	function _check_duplicate_cap($post_array) {

		$data = $this->aksesdatabase->getDataCapacity($post_array['DCName'], $post_array['floor']);

		if ($data) {
			$status = new stdClass();
			$status->status = false;
			$status->message = 'DCName and Floor are already exist';

			return $status;
		}
		else {
			return true;
		}
	}

	function _check_duplicate_util($post_array) {
		// Convert date for mysql format
		$date = str_replace('/', '-', $post_array['date']);
		$date_event = date('Y-m-d', strtotime($date));

		$data = $this->aksesdatabase->getDataUtil($date_event, $post_array['DCName'], $post_array['floor']);

		if ($data) {
			$status = new stdClass();
			$status->status = false;
			$status->message = 'Data on the date is already exist';

			return $status;
		}
		else {
			return true;
		}
	}

	function getListFloor() {
		if ($this->uri->segment(3)) {
			$data = $this->aksesdatabase->getListFloor($this->uri->segment(3));

			if ($data) {
				$dataJson = json_encode($data);
				echo $dataJson;
			}
			else {
				echo '[]';
			}
		}
		else {
			echo '[]';
		}
	}

	function getCapacitySpare() {
		if ($this->uri->segment(3) && $this->uri->segment(4)) {
			$dataCapacity = $this->aksesdatabase->getDataCapacity($this->uri->segment(3), $this->uri->segment(4));
			$dataUtilization = $this->aksesdatabase->getListData($this->uri->segment(3), $this->uri->segment(4));

			if ($dataCapacity && $dataUtilization) {
				$powerSpare = $dataCapacity[0]->power - $dataUtilization[sizeof($dataUtilization) - 1]->power;
				$coolingSpare = $dataCapacity[0]->cooling - $dataUtilization[sizeof($dataUtilization) - 1]->cooling;
				$spaceSpare = $dataCapacity[0]->space - $dataUtilization[sizeof($dataUtilization) - 1]->space;

				echo '{ "power": { "capacity": '.$dataCapacity[0]->power.', "spare": '.$powerSpare.' }, "cooling": { "capacity": '.$dataCapacity[0]->cooling.', "spare": '.$coolingSpare.' }, "space": { "capacity": '.$dataCapacity[0]->space.', "spare": '.$spaceSpare.' }}';				
			}
			else {
				echo '{}';
			}
		}
		else {
			echo '{}';
		}
	}

	function getListData() {
		if ($this->uri->segment(3) && $this->uri->segment(4)) {
			$data = $this->aksesdatabase->getListData($this->uri->segment(3), $this->uri->segment(4));

			if ($data) {
				$dataJson = json_encode($data);
				echo $dataJson;
			}
			else {
				echo '[]';
			}
		}
		else {
			echo '[]';
		}
	}

	function login() {
		//$fileLog = '/Users/aditiasap/Works/RAM/DashboardProject/facilityoperationsupport_tso/application/logs/trace.log';
		//file_put_contents($fileLog, $response, FILE_APPEND | LOCK_EX);
		//file_put_contents($fileLog, json_encode($response), FILE_APPEND | LOCK_EX);

		//DO NOT ECHO ANYTHING ON THIS PAGE OTHER THAN RESPONSE
		//'true' triggers login success
		ob_start();
		include 'plugin_helpers/config.php';
		require 'plugin_helpers/includes/functions.php';

		require_once 'plugin_helpers/includes/dbconn.php';
		require_once 'plugin_helpers/includes/loginform.php';
		require_once 'plugin_helpers/includes/globalconf.php';
		require_once 'plugin_helpers/includes/respobj.php';

		// Define $myusername and $mypassword
		$username = $_POST['myusername'];
		$password = $_POST['mypassword'];

		// echo "<pre>";
		// print_r($_POST);
		// exit();

		// To protect MySQL injection
		$username = stripslashes($username);
		$password = stripslashes($password);

		$response = '';
		$loginCtl = new LoginForm;
		$conf = new GlobalConf;
		$lastAttempt = checkAttempts($username);
		$max_attempts = $conf->max_attempts;

		//First Attempt
		if ($lastAttempt['lastlogin'] == '') {

			$lastlogin = 'never';
			$loginCtl->insertAttempt($username);
			$response = $loginCtl->checkLogin($username, $password);

		} elseif ($lastAttempt['attempts'] >= $max_attempts) {

			//Exceeded max attempts
			$loginCtl->updateAttempts($username);
			$response = $loginCtl->checkLogin($username, $password);

		} else {

			$response = $loginCtl->checkLogin($username, $password);

		};

		if ($lastAttempt['attempts'] < $max_attempts && $response != 'true') {

			$loginCtl->updateAttempts($username);
			$resp = new RespObj($username, $response);
			$jsonResp = json_encode($resp);

		} else {

			// updateAttempts Added by Adit
			$loginCtl->updateAttempts($username);
			$resp = new RespObj($username, $response);
			$jsonResp = json_encode($resp);

		}

		echo $jsonResp;

		unset($resp, $jsonResp);
		ob_end_flush();
	}

	function logout() {
	    session_start();
	    session_destroy();
	    header("location:http://10.47.150.143/facilityoperationsupport_tso");
	}

	function signup() {
		if (isset($_SESSION['username'])) {
			session_start();
			session_destroy();
		}

		$this->load->view('signup');
	}

	function createuser() {
		include 'plugin_helpers/config.php';
		require 'plugin_helpers/includes/functions.php';

		require_once 'plugin_helpers/includes/dbconn.php';
		require_once 'plugin_helpers/includes/newuserform.php';

		//Pull username, generate new ID and hash password
		$newid = uniqid(rand(), false);
		$newuser = $_POST['newuser'];
		$newpw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
		$pw1 = $_POST['password1'];
		$pw2 = $_POST['password2'];

		//Validation rules
		if ($pw1 != $pw2) {

		    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password fields must match</div><div id="returnVal" style="display:none;">false</div>';

		} elseif (strlen($pw1) < 4) {

		    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password must be at least 4 characters</div><div id="returnVal" style="display:none;">false</div>';

		} else {
		    //Validation passed
		    if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1']))) {

		        //Tries inserting into database and add response to variable

		        $a = new NewUserForm;

		        $response = $a->createUser($newuser, $newid, $newpw);

		        //Success
		        if ($response == 'true') {

		            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'. $signupthanks .'</div><div id="returnVal" style="display:none;">true</div>';

		        } else {
		            //Failure
		            mySqlErrors($response);

		        }
		    } else {
		        //Validation error from empty form variables
		        echo 'An error occurred on the form... try again';
		    }
		}
	}

	// Modofy Wahyu Pribadi
	// 11/12/2017
	function request() {
		if (isset($_SESSION['username'])) {
	        $crud = new grocery_CRUD();
	        $crud->set_table('request');
			$crud->required_fields('DCName','floor', 'subject');
			$crud->set_relation('DCName', 'tbl_dc', 'DCName');
			$crud->callback_add_field('floor',array($this,'_cb_element_floor'));
			$crud->unset_texteditor('deskripsi','full_text');
			$crud->field_type('status','dropdown',
				array(
					'1' => 'Approve',
					'2' => 'Pending',
					'3' => 'Reject'
				));

			// $crud->edit_fields('equip_status_id', 'site_id', 
   //                      'name', 'barcode_no','equip_status_id'); 

			// $crud->fields('equip_status_id', 'site_id', 'name',
   //               'barcode_no','equip_status_id');
	        
	        $state = $crud->getState();

			if($state == 'edit') {
				$crud->field_type('DCName', 'readonly');
				$crud->field_type('floor', 'readonly');
				$crud->field_type('subject', 'readonly');
				// $crud->field_type('equip_type_id', 'hidden');
			}

	        $output = $crud->render();
			

	        // $output = 'okeokeokeoke';
			// $output['simpan'] = 'oke';

	        $this->load->view('inputReq', $output);
		} 
		else {
			$this->load->view('login');
		}
    }

    public function listing() {

  //   	 $dataIssue = $this->db->select('*')
  //                   ->get('request')->result_array();

		// $data['data'] = $this->requestmodel->getData()->result_array();

		// echo "<pre>";
        // print_r($data['data']);
        // print_r($dataIssue);
        // exit();

		$this->load->view('request/list');

			// $this->load->view('login');
    	
		// $oke = $this->db->get('request');

    	// print_r($oke);
    	// exit()
	        // $this->load->view('add');

    }
}
