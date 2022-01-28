<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	var $tmMedia = "vm_media";

	var $txCreate = "tx_regist";
	var $txDetail = "tx_regist_detail";
	var $txHistory = "tx_regist_history";
	var $txEmailRegistran = "vx_email_registran";

	Public Function __Construct()
	{
		Parent::__Construct();
		$this -> load -> model(array('SiteModel'));
	}

	public function index()
	{
		$Datas = array(
			'media' => 	$this -> SiteModel -> getData($this -> tmMedia),
			'code' => $this -> SiteModel -> GenerateNumber($this -> txCreate, 'RegistCode', 'PUBG')
		);
		$this -> load -> view('site/index', $Datas);
	}

	public function create_2()
	{
		$response = ['result' => 0];
		$post = $this->input->post();

		$dateNow = date('YmdHis');
		$target_dir1 = 'assets/images/upload/team/';
		$target_dir2 = 'assets/images/upload/player/';

		// BUAT SAVE DATA HEADER
		$data_header = [
			'RegistCode' => '',
			'MediaID' => $post['fm-company'],
			'TeamName' => $post['fm-team-name'],
			'StatusID' => 0,
			'TeamPhoto' => '',
			'RegistDateTs' => date('Y-m-d H:i:s')
		];

		// BUAT SAVE GAMBAR TEAM
		if ( isset($_FILES['fm-photo-team']) && $_FILES['fm-photo-team']['name'] != '' ) {
			$temp_name = $_FILES['fm-photo-team']['name'];
			$ext = explode('.', $temp_name);
			$end = strtolower(end($ext));
			$filename_team = md5('team_'.$dateNow.'_'.$post['fm-company'].'_'.$post['fm-team-name'].'_'.$_FILES['fm-photo-team']['name']).'.'.$end;

			if ( !file_exists($target_dir1) ) {
				mkdir($target_dir1, 0777, true);
			}

			move_uploaded_file($_FILES['fm-photo-team']['tmp_name'], $target_dir1.$filename_team);
			$data_header['TeamPhoto'] = $filename_team;
		}
		$RegistCode = $this->SiteModel->GenerateNumber($this->txCreate, 'RegistCode', 'PUBG');
		$data_header['RegistCode'] = $RegistCode;
		$result = $this ->SiteModel->save($this->txCreate, $data_header);
		if($result == TRUE) {
			$status = "success";
			$response = array('result' => 1, 'status' => $status, 'msg' => 'Data telah berhasil disimpan. ');
		}

		// BUAT SAVE DATA DETAIL
		for ( $j = 0; $j < sizeof($post['anggota']); $j++) { 

			$data_member = [
				'RegistCode' 	=> $RegistCode,
				'PlayerName' 	=> $post['anggota'][$j]['grid_fm-player-name'],
				'PubgID' 		=> $post['anggota'][$j]['grid_fm-pubg-id'],
				'NickPubgID' 	=> $post['anggota'][$j]['grid_fm-nick-pubg'],
				'EmployeeID' 	=> $post['anggota'][$j]['grid_fm-id-office'],
				'Email' 		=> $post['anggota'][$j]['grid_fm-email'],
				'PhotoWithID' 	=> '',
				'PhotoFullBody' => '',
				'CreateDateTs' 	=> date('Y-m-d H:i:s'),
			];

			// PHOTO ID
			if ( $_FILES['anggota']['name'][$j]['grid_fm-photo-id'] != '' ) {
				$temp_name = $_FILES['anggota']['name'][$j]['grid_fm-photo-id'];
				$ext = explode('.', $temp_name);
				$end = strtolower(end($ext));
				$filename_member_photoId = md5('player_photoId_'.$dateNow.'_'.$post['fm-company'].'_'.$post['fm-team-name'].'_'.$_FILES['anggota']['name'][$j]['grid_fm-photo-id']).'.'.$end;

				if ( !file_exists($target_dir2) ) {
					mkdir($target_dir2, 0777, true);
				}

				move_uploaded_file($_FILES['anggota']['tmp_name'][$j]['grid_fm-photo-id'], $target_dir2.$filename_member_photoId);
				$data_member['PhotoWithID'] = $filename_member_photoId;
			}

			// CLOSE UP
			if ( $_FILES['anggota']['name'][$j]['grid_fm-close-up'] != '' ) {
				$temp_name = $_FILES['anggota']['name'][$j]['grid_fm-close-up'];
				$ext = explode('.', $temp_name);
				$end = strtolower(end($ext));
				$filename_member_closeUp = md5('player_closeUp_'.$dateNow.'_'.$post['fm-company'].'_'.$post['fm-team-name'].'_'.$_FILES['anggota']['name'][$j]['grid_fm-close-up']).'.'.$end;

				if ( !file_exists($target_dir2) ) {
					mkdir($target_dir2, 0777, true);
				}

				move_uploaded_file($_FILES['anggota']['tmp_name'][$j]['grid_fm-close-up'], $target_dir2.$filename_member_closeUp);
				$data_member['PhotoFullBody'] = $filename_member_closeUp;
			}

			$result = $this ->SiteModel->save($this->txDetail, $data_member);
			if($result == TRUE) {
				$status = "success";
				$response = array('result' => 1, 'status' => $status, 'msg' => 'Data telah berhasil disimpan. ');
			}
		}

		// Save History
		$data_history = [
			'RegistCode' => $RegistCode,
			'StatusID' => 1
		];
		$result = $this ->SiteModel->save($this->txHistory, $data_history);

		// Send Email
		$email_list = $this -> SiteModel -> getData($this -> txEmailRegistran);
		// $content = 'test email yaaa';

		// echo "<pre>";
		// print_r($content);
		// echo "</pre>";

		/* foreach($email_list as $rows => $val) {
			if( preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($val['email'])) ) {
				sendEmail($val['email'], $subject, $content);
				$this -> SiteModel -> update($this -> txDetail, array(
					'SentDate' => date('Y-m-d H:i:s'),
					'SentStatus' => 1
				), array('Email' => $val['email']));
			} else {
				$this -> SiteModel -> update($this -> txDetail, array(
					'SentDate' => date('Y-m-d H:i:s'),
					'SentStatus' => 0
				), array('Email' => $val['email']));
			}
		} */

		for( $n = 0; $n < sizeof($email_list); $n++ ) {
			if( preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", trim($email_list[$n]['email'])) ) {
				$subject = 'PENDAFTARAN BERHASIL - METROFEST CUP';
				$content = $this->load->view('email/template-email-regist', [], TRUE);
				$isSent = sendEmail($email_list[$n]['email'], $subject, $content);

				if (! $isSent) {
					$msg['msg'] = "Oops, we failed to send an email to." . $email_list[$n]['email'];
					echo json_encode($msg);
					return;
				}
				$this -> SiteModel -> update($this -> txDetail, array(
					'SentDate' => date('Y-m-d H:i:s'),
					'SentStatus' => 1
				), array('Email' => $email_list[$n]['email']));
			} else {
				$this -> SiteModel -> update($this -> txDetail, array(
					'SentDate' => date('Y-m-d H:i:s'),
					'SentStatus' => 0
				), array('Email' => $email_list[$n]['email']));
			}
		}

		// echo json_encode($response);

	}

	// public function create()
	// {		$response = array('result' => 0);

	// 	$Post = $this -> input -> post();

	// 	$dateNow = date('Ymd');
	// 	$filename = 'team-'.$dateNow.'-'.$Post['fm-company'].'-'.$Post['fm-team-name'].'-'.$_FILES['fm-photo-team']['name'];
		
	// 	/** Insert data team & upload foto team */
	// 	$config['file_name'] = $filename;
	// 	$config['upload_path'] = './assets/images/upload/team';
	// 	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	// 	$config['max_size']  = '6000';
	// 	$config['max_width']  = '7000';
	// 	$config['max_height']  = '7000';

	// 	$this -> load -> library('upload', $config);

	// 	if ( ! $this -> upload -> do_upload('fm-photo-team')){
	// 		$status = "error";
	// 		$msg = $this -> upload -> display_errors();
	// 		$response = array('result' => 0, 'status' => $status, 'msg' => $msg);
	// 	} else {
	// 		$dataupload = $this -> upload-> data();
	// 		$Datas = array(
	// 			'RegistCode' => $this -> SiteModel -> GenerateNumber($this -> txCreate, 'RegistCode', 'PUBG'),
	// 			'MediaID' => $Post['fm-company'],
	// 			'TeamName' => $Post['fm-team-name'],
	// 			'TeamPhoto' => $dataupload['full_path'],
	// 			'RegistDateTs' => date('Y-m-d H:i:s')
	// 		);

	// 		$result = $this -> SiteModel -> save($this -> txCreate, $Datas);
	// 		if($result == TRUE) {
	// 			$status = "success";
	// 			$response = array('result' => 1, 'status' => $status, 'msg' => 'Data telah berhasil disimpan. ');
	// 		}
	// 	}

	// 	/** Insert data detail player & upload foto id card + close up */
	// 	$config['file_name'] = $filename;
	// 	$config['upload_path'] = './assets/images/upload/player';
	// 	$config['allowed_types'] = 'jpg|png|jpeg';
	// 	$config['max_size']  = '6000';
	// 	$config['max_width']  = '7000';
	// 	$config['max_height']  = '7000';

	// 	$this -> load -> library('upload', $config);

	// 	$Grid = array();
	// 	foreach($_FILES['anggota'] as $index => $value){
	// 		if(preg_match("/^grid_/i", $index)) {
	// 			$index = preg_replace("/^grid_/i","",$index);
	// 			$arr = explode('_',$index);
	// 			$rnd = $arr[count($arr)-1];
	// 			array_pop($arr);
	// 			$idx = implode('_',$arr);
				
	// 			$Grid[$rnd][$idx] = $value;
	// 			if(!isset($Grid[$rnd]['fm-regist-code'])){
	// 				$Grid[$rnd]['fm-regist-code'] = $this->input->post('fm-regist-code');
	// 			}
	// 		}
	// 	}

	// 	foreach($Grid as $rnd => $rows) {
	// 		if( !empty($rows['fm-photo-id']['name']) ) {
	// 			$this -> upload -> do_upload('fm-photo-id');
	// 			$photo_id = $this -> upload -> data();
	// 			// $file_id = $photo_id['file_name'];
	// 		}
			
	// 		if( !empty($rows['fm-close-up']['name']) ) {
	// 			$this -> upload -> do_upload('fm-close-up');
	// 			$photo_selfie = $this -> upload -> data();
	// 			// $file_id = $photo_id['file_name'];
	// 		}
	// 	}

	// 	echo json_encode($response);
	// }

	// public function createHeader($Posts, $Files)
	// {
		
	// }

	// public function createDetail($Posts, $Files)
	// {
	// 	$this -> uploadDetail($Posts, $Files);

	// 	$Grid = array();

	// 	foreach($Posts as $index => $value){
	// 		if(preg_match("/^grid_/i", $index)) {
	// 			$index = preg_replace("/^grid_/i","",$index);
	// 			$arr = explode('_',$index);
	// 			$rnd = $arr[count($arr)-1];
	// 			array_pop($arr);
	// 			$idx = implode('_',$arr);
				
	// 			$Grid[$rnd][$idx] = $value;
	// 			if(!isset($Grid[$rnd]['fm-regist-code'])){
	// 				$Grid[$rnd]['fm-regist-code'] = $this->input->post('fm-regist-code');
	// 			}
	// 		}
	// 	}

	// 	foreach($Grid as $rnd => $rows) {
	// 		$DataDetail = array(
	// 			'RegistCode'	=> $rows['fm-regist-code'],
	// 			'PlayerName'	=> $rows['fm-player-name'],
	// 			'PubgID'		=> $rows['fm-pubg-id'],
	// 			'NickPubgID'	=> $rows['fm-nick-pubg'],
	// 			'EmployeeID'	=> $rows['fm-id-office'],
	// 			'Email'			=> $rows['fm-email'],
	// 			'CreateDateTs'	=> date('Y-m-d H:i:s')
	// 		);
	// 		$this -> SiteModel -> save($this -> txDetail, $DataDetail);
	// 	}
	// }

	// public function uploadDetail($Posts, $Files)
	// {
	// 	$dateNow = date('Ymd');
	// 	// $filename = 'player-'.$dateNow.'-'.$Posts['fm-company'].'-'.$Posts['fm-team-name'].'-'.$rows['fm-photo-team']['name'];
		
	// 	// $config['file_name'] = $filename;
	// 	$config['upload_path'] = './assets/images/upload/player';
	// 	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	// 	$config['max_size']  = '6000';
	// 	$config['max_width']  = '6000';
	// 	$config['max_height']  = '6000';
	// 	// $config['encrypt_name']  = TRUE;

	// 	$this->load->library('upload', $config);

	// 	$Grid = array();
	// 	foreach($Files as $index => $value){
	// 		if(preg_match("/^grid_/i", $index)) {
	// 			$index = preg_replace("/^grid_/i","",$index);
	// 			$arr = explode('_',$index);
	// 			$rnd = $arr[count($arr)-1];
	// 			array_pop($arr);
	// 			$idx = implode('_',$arr);
				
	// 			$Grid[$rnd][$idx] = $value;
	// 			if(!isset($Grid[$rnd]['fm-regist-code'])){
	// 				$Grid[$rnd]['fm-regist-code'] = $this->input->post('fm-regist-code');
	// 			}
	// 		}
	// 	}

	// 	foreach($Grid as $rnd => $rows) {
	// 		if( !empty($rows['fm-photo-id']['name']) ) {
	// 			$this -> upload -> do_upload('fm-photo-id');
	// 			$photo_id = $this -> upload -> data();
	// 			// $file_id = $photo_id['file_name'];
	// 		}
			
	// 		if( !empty($rows['fm-close-up']['name']) ) {
	// 			$this -> upload -> do_upload('fm-close-up');
	// 			$photo_selfie = $this -> upload -> data();
	// 			// $file_id = $photo_id['file_name'];
	// 		}
	// 	}

	// }

	public function sysadmin()
	{
		$this -> load -> view('site/sysadmin');
	}

	public function all()
	{
		$this -> load -> view('site/registran');
	}

	public function regist()
	{
		$this -> load -> view('site/registran');
	}

	public function approve()
	{
		$this -> load -> view('site/approved_team');
	}

	public function reject()
	{

	}

	public function registDetail()
	{

	}

	public function sendMail()
	{
		
	}

}