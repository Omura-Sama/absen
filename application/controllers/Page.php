<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

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

	function __construct(){
        parent::__construct();
    
        $this->load->library(array('template','pagination','form_validation','upload'));
        $this->API="http://dev.rsudcibinong.com/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        
        // if(!$this->session->userdata('username')){
        //     redirect('login');
        // }
	}
	
	public function output_json($data, $encode = true)
	{
        if($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
	}


	public function index()
	{
		// print_r($sesdata);
		// $this->load->view('sigmes/dashboard');
		$this->template->display('sigmes/dashboard');

	}

	public function result()
	{
		$post_array = $this->session->userdata('sData');
		$cekDataSheet = array(
            'id_user'=> $post_array['iduser'],
		);

		// print_r($post_array);

		$getResultExam = json_decode($this->curl->simple_get($this->API.'/Score',$cekDataSheet));
		$getDataProfile = json_decode($this->curl->simple_get($this->API.'/User',$cekDataSheet));

		// print_r($getDataProfile);

		$data['title'] = "Result Test";
		$data['profil'] = $post_array;
		$data['profil'] = $getDataProfile;
		$data['dataHasil'] = $getResultExam;
		$this->template->displaykar('sigmes/resultExam',$data);
	}

	public function karIndex()
	{
		$data['title'] = "Dashboard";
		$data['profil'] = $this->session->userdata('sData');

		$this->template->displaykar('sigmes/dashboardkar',$data);
	}

	public function listtestKar()
	{
		$post_array = $this->session->userdata('sData');

		$cekDataSheet = array(
                    'id_user'=> $post_array['iduser'],
                    // 'setStatus'=>'1'
				);
		$getDataExam = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekDataSheet));
		if (!empty($getDataExam)) {
        	$data['statusSheet'] = $getDataExam[0]->status;		
		}else{
        	$data['statusSheet'] = '0';		
		}
		$data['title'] = "Soal";
		$data['profil'] = $this->session->userdata('sData');
		$data['listExam'] = json_decode($this->curl->simple_get($this->API.'/Exam'));
		$data['listGroupSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_group'));

		$this->template->displaykar('sigmes/listSoal',$data);
	}

	public function token($id)
	{
        $params = array('id_exam'=> $id);
		$data['title'] = "Verifikasi Token";
		$data['profil'] = $this->session->userdata('sData');
		$data['listExam'] = json_decode($this->curl->simple_get($this->API.'/Exam',$params));
		// $data['listGroupSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_group'));

		$this->template->displaykar('sigmes/token',$data);
	}

	public function kuis()
	{
		$this->load->view('sigmes/kuisoner');
	}

	public function cektoken()
	{
		$id = $this->input->post('id_exam', true);
		$token = $this->input->post('token', true);

        $params = array('id_exam'=> $id);
		$dataToken = json_decode($this->curl->simple_get($this->API.'/Exam',$params));

		foreach ($dataToken as $key ) {
			$getDBtoken = $key->token;
		}

		$data['status'] = $token === $getDBtoken ? TRUE : FALSE;
		$this->output_json($data);

	}

	public function typeSoal()
	{
		// $nameSet = 'sigmes';
        // $params = array('soal_group'=> $nameSet);
        $data['listTypeSoal'] = json_decode($this->curl->simple_get($this->API.'/Type_soal_sigmes'));

		$this->template->display('sigmes/listTypeSoal',$data);
	}

	public function listExam()
	{
		 $data['listExam'] = json_decode($this->curl->simple_get($this->API.'/Exam'));
		 $data['listGroupSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_group'));

		$this->template->display('sigmes/listExam',$data);
	}

	public function listSigmes()
	{
		$nameSet = '1';
        $params = array('id_soal_group'=> $nameSet);
        $data['listSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_sigmes',$params));
        $data['listSoalGroup'] = json_decode($this->curl->simple_get($this->API.'/Soal_group'));
        $data['listTypeSoal'] = json_decode($this->curl->simple_get($this->API.'/Type_soal_sigmes'));

		$this->template->display('sigmes/listSigmes',$data);
	}

	public function addSigmes()
	{
		// $nameSet = 'sigmes';
        // $params = array('soal_group'=> $nameSet);
        // $data['listSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_sigmes',$params));
        $data['title'] = 'Tambah Soal';

		$this->template->display('sigmes/addSoal',$data);
	}

}
