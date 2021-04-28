<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	var $API ="";


    function __construct() {
        parent::__construct();
        $this->API="http://dev.rsudcibinong.com/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index()
	{
        // $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $data['title'] = 'Absen';

		$insNull = 'all';	
        $params = array('setIns'=> $insNull);
        $getData = json_decode($this->curl->simple_get($this->API.'/Absen',$params));
        $data['listAbsen'] = json_decode($this->curl->simple_get($this->API.'/Absen'));
        $data['listAbsen'] = $getData;
		$data['sumAbsen1'] = count($getData);

		$insNull1 = 'null';	
        $params1 = array('setIns'=> $insNull1);
        $getData1 = json_decode($this->curl->simple_get($this->API.'/Absen',$params1));
        $data['listAbsenNull'] = $getData1;
		$data['sumAbsen'] = count($getData1);

		// echo count($getData);

		// $this->template->display('sigmes/listAbsen',$data);
		$this->load->view('absen',$data);
	}

	public function tidakAbsen()
	{
        // $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $data['title'] = 'Absen';

		$insNull = 'null';	
        $params = array('setIns'=> $insNull);
        $getData = json_decode($this->curl->simple_get($this->API.'/Absen',$params));
        $data['listAbsen'] = json_decode($this->curl->simple_get($this->API.'/Absen'));
        $data['listAbsenNull'] = $getData;
		$data['sumAbsen'] = count($getData);


		// $this->template->display('sigmes/listAbsen',$data);
		$this->load->view('tabsen',$data);
	}

	public function logempy()
	{
		$email = $this->input->post('nip',TRUE);
		$password = $this->input->post('password');
        $params = array('id'=>  $email);
        $getUser = json_decode($this->curl->simple_get($this->API.'/user',$params));
        // print_r($getUser);

        foreach ($getUser as $key) {
        	$getfullname = $key->fullname;
        	$getNickname = $key->nickname;
        	$getNip = $key->nip;
        	$getEmail = $key->email;
        	$getGender = $key->gender;
        	$getRole = $key->role;
        	$getPass = $key->password;
        	$getIdUser = $key->id;
        }

        // $hash = '$2y$10$3gXOSEgeWf74hqdZvzYflenuEuT3towB7vIQ21eYVxVMQdAe2G8/i';
        $hash = $getPass;
     	if (password_verify($password, $hash)) {
		    // echo 'Password is valid!';
		    // $data = $validate->row_array();
			$iduser = $getIdUser;
			$fullname = $getfullname;
			$nickname = $getNickname;
			$nip = $getNip;
			$email = $getEmail;
			$gender = $getGender;
			$role = $getRole;
			$sesdata = array(
				'iduser' => $iduser, 
				'fullname' => $fullname, 
				'nickname' => $nickname, 
				'nip' => $nip, 
				'email' => $email, 
				'gender' => $gender, 
				'role' => $role, 
				'logged_in' => TRUE, 
			);
			$this->session->set_userdata('sData', $sesdata);
			redirect('page/karIndex');

		} else {
		   	echo $this->session->set_flashdata('msg', '<span class="badge badge-danger">Username or Password is wrong</span>');
			redirect('login');
		}

	}


	public function auth()
	{
		$email = $this->input->post('nip',TRUE);
		$password = $this->input->post('password');
        $params = array('id'=>  $email);
        $getUser = json_decode($this->curl->simple_get($this->API.'/user',$params));

        // print_r($getUser);

        foreach ($getUser as $key) {
        	$getId = $key->id;
        	$getNickname = $key->nickname;
        	$getEmail = $key->email;
        	$getRole = $key->role;
        	$getPass = $key->password;
        }

        // $hash = '$2y$10$3gXOSEgeWf74hqdZvzYflenuEuT3towB7vIQ21eYVxVMQdAe2G8/i';
        $hash = $getPass;
     	if (password_verify($password, $hash)) {
		    // echo 'Password is valid!';
		    // $data = $validate->row_array();
			$name = $getNickname;
			$email = $getEmail;
			$role = $getRole;
			$id = $getId;
			$sesdata = array(
				'iduser' => $id, 
				'username' => $name, 
				'email' => $email, 
				'role' => $role, 
				'logged_in' => TRUE, 
			);
			$this->session->set_userdata($sesdata);

			if ($role == 'sysdev') {
				$this->session->set_userdata($sesdata);
				redirect('page/index');
			}

		} else {
		   	echo $this->session->set_flashdata('msg', '<span class="badge badge-danger">Username or Password is wrong</span>');
			redirect('login');
		}
		
	}

	public function search()
	{
        // $data['datauser'] = json_decode($this->curl->simple_get($this->API.'/user'));
		$date = $this->input->post('datef');
		// echo $date;

		if ($date == '') {
			$this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Perhatian!</strong> Pilih Unit Terlebih Dahulu.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');

			$this->index();
			// echo 'kosong';
		}else{
			$insNull = 'scdate';	
			$params = array('setIns'=> $insNull, 'setDatef'=> $date);
			$getData = json_decode($this->curl->simple_get($this->API.'/Absen',$params));
			$data['listAbsen'] = json_decode($this->curl->simple_get($this->API.'/Absen'));
			$data['listAbsen'] = $getData;
			$data['sumAbsen1'] = count($getData);

			// print_r($getData);

			$insNull1 = 'scdatenull';	
			$params1 = array('setIns'=> $insNull1, 'setDatef'=> $date);
			$getData1 = json_decode($this->curl->simple_get($this->API.'/Absen',$params1));
			
			function compare_objects($getData1, $getData) {
				return $getData1->nip - $getData->nip;
			}

			$diff = array_udiff($getData1, $getData, 'compare_objects');

			$data['listAbsenNull'] = $diff;
			$data['sumAbsen'] = count($diff);
			$data['tglselect'] = $date;

			// print_r($diff);
			// var_dump($result);

			$this->load->view('absen',$data);
		}

	}
}
