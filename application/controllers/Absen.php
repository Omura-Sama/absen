<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

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
        $this->load->helper('string');
        
        // if(!$this->session->userdata('username')){
        //     redirect('login');
        // }
    }


	public function index()
	{	
        $insNull = 'null';	
        $params = array('setIns'=> $insNull);
        $getData = json_decode($this->curl->simple_get($this->API.'/Absen',$params));
        $data['listAbsen'] = json_decode($this->curl->simple_get($this->API.'/Absen'));
        $data['listAbsenNull'] = $getData;

		$this->template->display('sigmes/listAbsen',$data);

    }

    public function dataAbsen()
	{	
        $insNull = 'all';	
        $params = array('setIns'=> $insNull);
        $getData = json_decode($this->curl->simple_get($this->API.'/Absen',$params));
        $data['listAbsen'] = $getData;
        // $data['listAbsenNull'] = $getData;

		$this->template->display('sigmes/listAbsenAll',$data);

    }
    
    public function cekToken()
    {
        $id = $this->input->post('idExam');
        $tokenUser = $this->input->post('tokenUsr');

        $params = array('id_exam'=> $id);
        $getData = json_decode($this->curl->simple_get($this->API.'/Exam',$params));

        foreach ($getData as $key ) {
            $getToken = $key->token;
            $getJumlah = $key->total_exam;
        }

        if ($tokenUser == $getToken) {
            $dataUser = $this->session->userdata('sData');
            $idUser = $dataUser['iduser'];

            $cekparams = array('id_user'=> $idUser);
            $getCekData = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams));

            // print_r($getCekData);

            if (empty($getCekData)) {
                $data['title'] = "Ujian";
                $nameSet = '1';
                $params = array(
                    'id_soal_group'=> $nameSet,
                    'limit'=> $getJumlah,
                );
                $data['listSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_sigmes',$params));
                // print_r($data);
                $no=1;
                // $idUser = $dataUser['iduser'];
                $data = json_decode($this->curl->simple_get($this->API.'/Soal_sigmes',$params));

                foreach ($data as $key)  {
                    $desksoal = $key->desk_soal;
                    $bobot = $key->bobot;
                    $durasi = $key->durasi;
                    $idsoalgroup = $key->id_soal_group;
                    $idsoaltype = $key->id_soal_type;
                    $idsoaljwb = $key->id_soal_jwb;
                    $opsiA = $key->opsi_a;
                    $opsiB = $key->opsi_b;
                    $opsiC = $key->opsi_c;
                    $opsiD = $key->opsi_d;
                    $opsiE = $key->opsi_e;
                    $jwb = $key->jawaban;
                    $nourut = $no; 

                    $dataSet = array(
                        'setNoUrut'      =>  $nourut,
                        'setDeskSoal'      =>  $desksoal,
                        'setBobot'      =>  $bobot,
                        'setDurasi'      =>  $durasi,
                        'setSoalgroup'      =>  $idsoalgroup,
                        'setSoaltype'      =>  $idsoaltype,
                        'setSoaljwb'      =>  $idsoaljwb,
                        'setOpsiA'      =>  $opsiA,
                        'setOpsiB'      =>  $opsiB,
                        'setOpsiC'      =>  $opsiC,
                        'setOpsiD'      =>  $opsiD,
                        'setOpsiE'      =>  $opsiE,
                        'setJwb'      =>  $jwb,
                        'setIduser'      => $idUser
                    );
                    $no++;
                    $insert =  $this->curl->simple_post($this->API.'/Sheet', $dataSet, array(CURLOPT_BUFFERSIZE => 10));
                }
                    
                $cekparams = array('id_user'=> $idUser);
                $data['exam'] = $getData;
                $data['profil'] = $this->session->userdata('sData');
                $data['soal'] = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams));
                $this->template->displaykar('sigmes/sheet',$data);
                
            }else{
                    $cekparams = array('id_user'=> $idUser);
                    $data['exam'] = $getData;
                    $data['profil'] = $this->session->userdata('sData');
                    $data['soal'] = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams));
                    $this->template->displaykar('sigmes/sheet',$data);
                    // echo 'not insert';

            }
                           
        }else{
            $params = array('id_exam'=> $id);
            $data['title'] = "Verifikasi Token";
            $data['exam'] = $getData;
            $data['profil'] = $this->session->userdata('sData');
            $data['listExam'] = json_decode($this->curl->simple_get($this->API.'/Exam',$params));
            $this->session->set_flashdata('notif','<span class="badge badge-warning">Token Salah</span>');

            $this->template->displaykar('sigmes/token',$data);
        }
    }

	// insert data type soal
    function create(){
        // print_r($_POST);
        $uniq = random_string('alnum', 5);
        if(isset($_POST['submit'])){
            $data = array(
                'setExamName'      =>  $this->input->post('examName'),
                'setSoalType'      =>  $this->input->post('soalType'),
                'setTotalExam'      =>  $this->input->post('totalExam'),
                'setDuration'      =>  $this->input->post('duration'),
                'setSDate'      =>  $this->input->post('sDate'),
                'setEDate'      =>  $this->input->post('eDate'),
                'setToken'      =>  strtoupper($uniq)
            );
            // print_r($data);
            $insert =  $this->curl->simple_post($this->API.'/Exam', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','<span class="badge badge-success">Insert Data Berhasil</span>');
            }else
            {
               $this->session->set_flashdata('hasil','<span class="badge badge-warning">Insert Data Gagal</span>');
            }
            redirect('Page/listExam');
        }else{
            // $this->load->view('kontak/create');
            // $this->Soal_type();
            $nameSet = '1';
            $params = array('id_soal_group'=> $nameSet);
            $data['listSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_sigmes',$params));
            $data['listSoalGroup'] = json_decode($this->curl->simple_get($this->API.'/Soal_group'));
            $data['listTypeSoal'] = json_decode($this->curl->simple_get($this->API.'/Type_soal_sigmes'));

			$this->template->display('sigmes/listSigmes',$data);
        }
    }

    // edit data type soal
    function edit(){
        // print_r($_POST);

        $data['profil'] = $this->session->userdata('sData');
        $lastDurasi = $this->input->post('lastdrs');
        $tes = $this->uri->segment(3);

         if(!empty($_POST)){

            // print_r($_POST);
            $jawaban = $this->input->post('jwbuser');
            $nourut123 = $this->input->post('urutanke');

            $id = $nourut123;
            $dataUser = $this->session->userdata('sData');
            $idUser = $dataUser['iduser'];
            $nourut = $id;

            $cekparams = array('id_user'=> $idUser);
            $getDataSheet = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams));
            // print_r($getDataSheet);

            foreach ($getDataSheet as $key ) {
                $getUserGroup = $key->id_soal_group;
            }
            // echo $id;
            // echo $getUserGroup;

            $params = array('id_soal_group'=> $getUserGroup);
            $getData = json_decode($this->curl->simple_get($this->API.'/Exam',$params));

            foreach ($getData as $key ) {
                $getJumlah = $key->total_exam;
            }
            $urutan = array(
                'pertama'=> '1',
                'terakhir'=> $getJumlah
            );
            $cekparams1 = array(
                'id_user'=> $idUser,
                'nourut'=> $nourut
            );

            // print_r($cekparams1);
            // echo "<br>";

            $currentNo = $nourut123-1;

            $uparams = array(
                'setIduser'=> $idUser,
                'setId'=> $currentNo,
                'setJawaban_user'=>$jawaban,
                'setDurasi' => $lastDurasi
            );
            $setDataSheet = json_decode($this->curl->simple_put($this->API.'/Sheet',$uparams));

            // print_r($setDataSheet);

            // $uparamsDurasi = array(
            //     'id_user'=> $idUser,
            //     'setDurasi' => $lastDurasi
            // );
            // $setDurasi = json_decode($this->curl->simple_put($this->API.'/Sheet',$uparamsDurasi));

            if (isset($_POST['submit'])) { // cek tombol lanjut atau selesai / menekan tombol selesai
                $paramsDone = array(
                    'setIduser'=> $idUser,
                    'setStatus'=>'1'
                );
                $setDoneSheet = json_decode($this->curl->simple_put($this->API.'/Sheet',$paramsDone));
                $cekDataSheet = array(
                    'id_user'=> $idUser,
                    // 'setStatus'=>'1'
                );
                $getDataExam = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekDataSheet));
                $no = 0;
                foreach ($getDataExam as $key ) {
                    // echo $key->bobot;
                    $bobot = $key->bobot;
                    $answer = $key->jawaban;
                    $userAnswer = $key->jawaban_user;
                    if ($answer == $userAnswer) {
                        $no++;
                        // $totalNo = $no*$key->bobot;
                    }else{
                        
                    }
                }

                $totalNo = $no*$bobot;
                $sumWrong = $getJumlah-$no;

                $dataScore = array(
                    'setId_user' => $idUser, 
                    'setDate' => date(DATE_ATOM, time()), 
                    'setCorrect' => $no, 
                    'setWrong' => $sumWrong,
                    'setScore' => $totalNo
                );
                $setScore = json_decode($this->curl->simple_post($this->API.'/Score',$dataScore));

                // print_r($getDataExam);
                // echo $getDataExam[0]->status;
                // $data['title'] = "Soal";
                $data['title'] = $getData;
                $data['statusSheet'] = $getDataExam[0]->status;
                $data['profil'] = $this->session->userdata('sData');
                $data['listExam'] = json_decode($this->curl->simple_get($this->API.'/Exam'));
                $data['listGroupSoal'] = json_decode($this->curl->simple_get($this->API.'/Soal_group'));

                $this->template->displaykar('sigmes/listSoal',$data);
            }else{ //menekan tombol lanjut
                $data['title'] = $getData;
                $data['urutStart'] = '1';
                $data['urutEnd'] = $getJumlah;
                $data['soal'] = $getDataSheet;
                $data['soalInt'] = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams1));
                // $tes = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams1));
                // print_r($tes);
                $data['dataNosoal'] = $urutan;
                $this->template->displaykar('sigmes/sheetMid',$data);
            }         

        }else{

            $lastDurasi  = $this->input->get('tesVal');
        	$id = $this->input->get('id');
        	// $id = $this->uri->segment(3);

            // echo $lastDurasi;
            // echo '<br>';
            // echo $id;
            $dataUser = $this->session->userdata('sData');
            $idUser = $dataUser['iduser'];
            $nourut = $id;

            $cekparams = array('id_user'=> $idUser);
            $getDataSheet = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams));
            // print_r($cekparams);

            foreach ($getDataSheet as $key ) {
                $getUserGroup = $key->id_soal_group;
            }
            // echo $id;
            // echo $getUserGroup;

            $params = array('id_soal_group'=> $getUserGroup);
            $getData = json_decode($this->curl->simple_get($this->API.'/Exam',$params));
            // print_r($getData);

            foreach ($getData as $key ) {
                $getJumlah = $key->total_exam;
            }
            $urutan = array(
                'pertama'=> '1',
                'terakhir'=> $getJumlah
            );
            // print_r($urutan);
            $cekparams1 = array(
                'id_user'=> $idUser,
                'nourut'=> $nourut
            );
            // print_r($cekparams);

            $paramsDone = array(
                    'setIduser'=> $idUser,
                    'setDurasi' => $lastDurasi
                    // 'setStatus'=>'1'
                );
                        
            $setDoneSheet = json_decode($this->curl->simple_put($this->API.'/Sheet',$paramsDone));

            $data['urutStart'] = '1';
            $data['urutEnd'] = $getJumlah;
            $data['soal'] = $getDataSheet;
            $data['soalInt'] = json_decode($this->curl->simple_get($this->API.'/Sheet',$cekparams1));
            $data['title'] = $getData;
            $data['dataNosoal'] = $urutan;
            echo $lastDurasi;

            $this->template->displaykar('sigmes/sheetMid',$data);
        }       
    }

    public function saveSheet()
    {
        // Decrypt Id
		$id_tes = $this->input->post('id', true);
        $data = $this->session->userdata('sData');
        $dataUser = $this->session->userdata('sData');
        $idUser = $dataUser['iduser'];

        $uparams = array(
            'setStatus' => 1,
            'setIduser' => $idUser,
            'setDurasi' => '0'
        );  
        
        // print_r($uparams);
        $setDataSheet = json_decode($this->curl->simple_put($this->API.'/Sheet',$uparams));
        // print_r($setDataSheet);

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

     // delete data type soal
    function delete($id){
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
