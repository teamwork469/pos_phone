<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library('session');
        if(empty($this->session->userdata('user_id'))){
           redirect('Userlogin');
		}

    }

	public function index()
	{
		$this->load->view("dashboard/master");
	}

}
