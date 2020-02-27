<?php

class Page extends CI_Controller {

        public function __construct() {
          parent:: __construct();
          $this->load->helper('url');
          $this->load->model("Base_model");
          $this->load->library('session');
          if(empty($this->session->userdata('user_id'))){
            redirect('Userlogin');
      }

      }

        public function index()
        {
          // $this->$data['page_title'] = 'Your title';
          $data['header']  = 'dashboard/header';
          $data['sidebar'] = 'dashboard/sidebar';
          $data['content'] = 'dashboard/page/home';
          $data['footer'] = 'dashboard/footer';
          $this->load->view('dashboard/master',$data);
        }

        public function load_add_phone(){
          $data['header']  = 'dashboard/header';
          $data['sidebar'] = 'dashboard/sidebar';
          $data['content'] = 'dashboard/phone/load_add_phone';
          $data['footer'] = 'dashboard/footer';
          $this->load->view('dashboard/master',$data);
        }


        public function load_edit_phone($id){
          $data['mb_rd'] = $this->Base_model->loadToListJoin("SELECT * FROM mobile_number mb WHERE mb.`status` =1 AND mb.mobile_id =$id");
          $data['header']  = 'dashboard/header';
          $data['sidebar'] = 'dashboard/sidebar';
          $data['content'] = 'dashboard/phone/load_edit_phone';
          $data['footer'] = 'dashboard/footer';
          $this->load->view('dashboard/master',$data);
        }

        

}