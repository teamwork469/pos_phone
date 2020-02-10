<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index()
	{   $this->session->unset_userdata('user_id');
		$this->load->view('login/login_frm');
	}
	public function check_user_login(){
		$user = $this->input->post("txt_user");
		$pass = $this->input->post("txtpass");
        $this->session->unset_userdata('user_id');

		if($user=="admin" && $pass=="123"){
            $data = $this->session->set_userdata('user_id','1');
            echo json_encode("1");
            //redirect("Dashboard");
            
		}else{
			echo json_encode("0");
			//redirect("Welcome");
		}
	
	}
}
