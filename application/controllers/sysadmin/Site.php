<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiteModel');
		$this->load->model('Regist_model');
		$this->load->model('Approved_model');
		$this->load->model('Reject_model');
	}

	public function index()
	{

		if ( isLogin() == FALSE ) {
			redirect('sysadmin/site/login');
		}
		$this->load->view('site/sysadmin/index');
	}

	public function regist()
	{

		if ( isLogin() == FALSE ) {
			redirect('sysadmin/site/login');
		}
		$this->load->view('site/sysadmin/regist');
	}

	public function view_regist()
	{
		$data = array();
		$res = $this->Regist_model->get_datatable();
		$q = $this->db->last_query();

		foreach ($res as $row) {
			$col = array();
			$col[] = $row->RegistID;
			$col[] = $row->MediaName;
			$col[] = $row->TeamName;
			$col[] = $row->ZoneName;
			$col[] = '<button class="btn btn-info btn-detail" data-id="'.$row->RegistCode.'">Detail</button>';
			$data[] = $col;
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Regist_model->get_datatable_count_all(),
			"recordsFiltered" 	=> $this->Regist_model->get_datatable_count_filtered(),
			"data" 				=> $data,
			"q"					=> $q

		);
		echo json_encode($output);
		exit;
	}

	public function detail_regist()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$response['msg'] = "Invalid parameters.";echo json_encode($response);exit;}
		/*** Params ***/
		/*** Required Area ***/
		$key = $this->input->post("key");
		/*** Optional Area ***/
		/*** Validate Area ***/
		if ( empty($key) ){$response['msg'] = "Invalid parameter.";echo json_encode($response);exit;}
		/*** Accessing DB Area ***/
		$check = $this->Regist_model->find($key);
		$check_2 = $this->Regist_model->get_RegistID($key);
		if (!$check) {$response['msg'] = "No data found.";echo json_encode($response);exit;}
		/*** Result Area ***/
		$response['type'] = 'done';
		$response['msg'] = $check;
		$response['msg_2'] = $check_2[0]->RegistID;
		echo json_encode($response);
		exit;
	}

	public function approve_team()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$response['msg'] = "Invalid parameters.";echo json_encode($response);exit;}
		/*** Params ***/
		/*** Required Area ***/
		$key = $this->input->post("key");
		/*** Optional Area ***/
		/*** Validate Area ***/
		if ( empty($key) ){$response['msg'] = "Invalid parameter.";echo json_encode($response);exit;}
		/*** Accessing DB Area ***/
		$check = $this->Regist_model->find_by_id($key);
		if (!$check) {$response['msg'] = "No data found.";echo json_encode($response);exit;}
		$data = [
			"StatusID" => 3
		];

		$approve = $this->Regist_model->update('tx_regist', $data, ['RegistID'=>$key]);
		/*** Result Area ***/
		$response['type'] = 'done';
		$response['msg'] = "Successfully approve team.";
		echo json_encode($response);
		exit;
	}

	public function reject_team()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$response['msg'] = "Invalid parameters.";echo json_encode($response);exit;}
		/*** Params ***/
		/*** Required Area ***/
		$key = $this->input->post("key");
		/*** Optional Area ***/
		/*** Validate Area ***/
		if ( empty($key) ){$response['msg'] = "Invalid parameter.";echo json_encode($response);exit;}
		/*** Accessing DB Area ***/
		$check = $this->Regist_model->find_by_id($key);
		if (!$check) {$response['msg'] = "No data found.";echo json_encode($response);exit;}
		$data = [
			"StatusID" => 4
		];

		$reject = $this->Regist_model->update('tx_regist', $data, ['RegistID'=>$key]);
		/*** Result Area ***/
		$response['type'] = 'done';
		$response['msg'] = "Successfully reject team.";
		echo json_encode($response);
		exit;
	}

	public function approve()
	{

		if ( isLogin() == FALSE ) {
			redirect('sysadmin/site/login');
		}
		$this->load->view('site/sysadmin/approve');
	}

	public function view_approved()
	{
		$data = array();
		$res = $this->Approved_model->get_datatable();
		$q = $this->db->last_query();

		foreach ($res as $row) {
			$col = array();
			$col[] = $row->RegistID;
			$col[] = $row->MediaName;
			$col[] = $row->TeamName;
			$col[] = $row->ZoneName;
			$col[] = '<button class="btn btn-info btn-detail" data-id="'.$row->RegistCode.'">Detail</button>';
			$data[] = $col;
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Approved_model->get_datatable_count_all(),
			"recordsFiltered" 	=> $this->Approved_model->get_datatable_count_filtered(),
			"data" 				=> $data,
			"q"					=> $q

		);
		echo json_encode($output);
		exit;
	}

	public function detail_approved()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$response['msg'] = "Invalid parameters.";echo json_encode($response);exit;}
		/*** Params ***/
		/*** Required Area ***/
		$key = $this->input->post("key");
		/*** Optional Area ***/
		/*** Validate Area ***/
		if ( empty($key) ){$response['msg'] = "Invalid parameter.";echo json_encode($response);exit;}
		/*** Accessing DB Area ***/
		$check = $this->Approved_model->find($key);
		if (!$check) {$response['msg'] = "No data found.";echo json_encode($response);exit;}
		/*** Result Area ***/
		$response['type'] = 'done';
		$response['msg'] = $check;
		echo json_encode($response);
		exit;
	}

	public function reject()
	{

		if ( isLogin() == FALSE ) {
			redirect('sysadmin/site/login');
		}
		$this->load->view('site/sysadmin/reject');
	}

	public function view_reject()
	{
		$data = array();
		$res = $this->Reject_model->get_datatable();
		$q = $this->db->last_query();

		foreach ($res as $row) {
			$col = array();
			$col[] = $row->RegistID;
			$col[] = $row->MediaName;
			$col[] = $row->TeamName;
			$col[] = $row->ZoneName;
			$col[] = '<button class="btn btn-info btn-detail" data-id="'.$row->RegistCode.'">Detail</button>';
			$data[] = $col;
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Reject_model->get_datatable_count_all(),
			"recordsFiltered" 	=> $this->Reject_model->get_datatable_count_filtered(),
			"data" 				=> $data,
			"q"					=> $q

		);
		echo json_encode($output);
		exit;
	}

	public function detail_reject()
	{
		/*** Check POST or GET ***/
		if ( !$_POST ){$response['msg'] = "Invalid parameters.";echo json_encode($response);exit;}
		/*** Params ***/
		/*** Required Area ***/
		$key = $this->input->post("key");
		/*** Optional Area ***/
		/*** Validate Area ***/
		if ( empty($key) ){$response['msg'] = "Invalid parameter.";echo json_encode($response);exit;}
		/*** Accessing DB Area ***/
		$check = $this->Reject_model->find($key);
		if (!$check) {$response['msg'] = "No data found.";echo json_encode($response);exit;}
		/*** Result Area ***/
		$response['type'] = 'done';
		$response['msg'] = $check;
		echo json_encode($response);
		exit;
	}
	


	// FOR LOGIN AND LOGOUT
	public function login()
	{
		if( $this->hasLogin() ) redirect();
		$this->load->view('site/sysadmin/login');
	}

	public function signin()
	{
		if ( !$_POST ){$response['msg'] = "Invalid parameters.";echo json_encode($response);exit;}

		$user_name = trim($this->input->post('user_name'));
		$user_pass = md5($this->input->post('user_pass'));

		if ( empty($user_name) ) {$response['type'] = "Failed";$response['msg'] = "Please input a valid username";echo json_encode($response);exit;}
		if ( empty($user_pass) ) {$response['type'] = "Failed";$response['msg'] = "Please input a valid password";echo json_encode($response);exit;}

		$res = $this->SiteModel->view('tm_user', '*', ['user_name'=>$user_name]);

		if ($res) {
			$pwd = '';
			$data_sess = array();

			foreach ($res as $row) {
				$data_sess['log_id'] = $row->user_id;
				$data_sess['log_user'] = '';
				$data_sess['log_name'] = '';
				$pwd = $row->user_pass;
			}

			if ($user_pass !== $pwd) {
				$response['type'] = "Failed";
				$response['msg'] = "Wrong Password";
				echo json_encode($response);
				exit;
			}

			$this->session->set_userdata(SESS, (object)$data_sess);
			
			$response['type'] = 'done';
			$msg['msg'] = 'Successfully login. We will redirect you shortly.';
			$msg['debug'] = $this->session->userdata(SESS);
			$msg['debug2'] = isLogin() ? 'login' : 'no login';
			echo json_encode($response);

		}else{
			$response['type'] = "Failed";
			$response['msg'] = "No Data Found";
			echo json_encode($response);
			exit;
		}
	}

	public function signout()
	{

		$this->session->unset_userdata(SESS);
		
		redirect( base_url() );
	}

}