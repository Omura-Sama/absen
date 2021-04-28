<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal_type extends CI_Controller {

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


	public function index()
	{
		// print_r($sesdata);
		// $this->load->view('sigmes/dashboard');
		$data['listTypeSoal'] = json_decode($this->curl->simple_get($this->API.'/Type_soal_sigmes'));
		$this->template->display('sigmes/listTypeSoal',$data);

	}

	public function kuis()
	{
		$this->load->view('sigmes/kuisoner');
	}

	public function addSigmes()
	{
		// $nameSet = 'sigmes';
        // $params = array('soal_group'=> $nameSet);
        // $data['listSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_sigmes',$params));
        $data['title'] = 'Tambah Soal';

		$this->template->display('sigmes/addSoal',$data);
	}

	// insert data type soal
    function create(){

    	// print_r($_POST);
        if(isset($_POST['submit'])){
            $data = array(
                // 'id_soal_type'       =>  $this->input->post('id'),
                'typeSoal'      =>  $this->input->post('typeSoal'));

            // print_r($data);
            $insert =  $this->curl->simple_post($this->API.'/Type_soal_sigmes', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','<span class="badge badge-success">Insert Data Berhasil</span>');
            }else
            {
               $this->session->set_flashdata('hasil','<span class="badge badge-warning">Insert Data Gagal</span>');
            }
            redirect('Soal_type');
        }else{
            // $this->load->view('kontak/create');
            // $this->Soal_type();
            $data['listTypeSoal'] = json_decode($this->curl->simple_get($this->API.'/Type_soal_sigmes'));
			$this->template->display('sigmes/listTypeSoal',$data);
        }
    }

    // edit data type soal
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'setid'       =>  $this->input->post('id'),
                'setdesk'      =>  $this->input->post('desk'));
            $update =  $this->curl->simple_put($this->API.'/Type_soal_sigmes', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','<span class="badge badge-success">Insert Data Berhasil</span>');
            }else
            {
               $this->session->set_flashdata('hasil','<span class="badge badge-warning">Insert Data Gagal</span>');
            }
            redirect('Soal_type');
        }else{
            $data['listTypeSoal'] = json_decode($this->curl->simple_get($this->API.'/Type_soal_sigmes'));
			$this->template->display('sigmes/listTypeSoal',$data);
        }
    }

     // delete data type soal
    function delete(){
        $id = $this->input->post('id');
        if(empty($id)){
            redirect('Soal_type');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/Type_soal_sigmes', array('id_soal_type'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <strong>Delete Data Berhasil !</strong>
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
            }else
            {
               $this->session->set_flashdata('hasil','<div class="alert alert-danger" role="alert"> Delete Data Gagal </div>');
            }
            redirect('Soal_type');
        }
    }


}
