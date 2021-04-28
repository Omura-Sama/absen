<?php 
/**
* 
*/
class Template {
	protected $_CI;
	function __construct()
	{
		$this->_CI=&get_instance();
	}

	function display($template,$data=null){
		$data['_content']=$this->_CI->load->view($template,$data,true);
		$data['_header']=$this->_CI->load->view('template/header',$data,true);
		$data['_notif']=$this->_CI->load->view('template/notification',$data,true);
		$data['_footer']=$this->_CI->load->view('template/footer',$data,true);
		$data['_sidebar']=$this->_CI->load->view('template/sidebar',$data,true);
		$this->_CI->load->view('/template.php',$data);
	}

	function displaykar($template,$data=null){
		$data['_content']=$this->_CI->load->view($template,$data,true);
		$data['_header']=$this->_CI->load->view('template/header',$data,true);
		$data['_notif']=$this->_CI->load->view('template/notification',$data,true);
		$data['_footer']=$this->_CI->load->view('template/footer',$data,true);
		$data['_sidebar']=$this->_CI->load->view('template/sidebarkar',$data,true);
		$this->_CI->load->view('/template.php',$data);
	}

}


 ?>