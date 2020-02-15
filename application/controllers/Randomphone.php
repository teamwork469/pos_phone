<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Randomphone extends CI_Controller {
    
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
     $mobile['rd'] = $this->Base_model->loadToListJoin("SELECT m.mobie_id,m.mobile_name FROM mobile_number m  WHERE m.`status`=1");
    $this->load->view("front/random_frm",$mobile);
	}

    // public function load_phone_select(){
    //     $mobile['rd'] = $this->Base_model->loadToListJoin("SELECT m.mobie_id,m.mobile_name FROM mobile_number m  WHERE m.`status`=1");

    //     // $selection = $this->Base_model->loadToListJoin("SELECT (select `m`.`mobile_name` from `mobile_number` `m` where (`m`.`mobie_id` = `sp`.`mobile_id`)) AS `phone_from_selection` from `select_phone` `sp`");
    //     $this->load->view("front/random_frm",$mobile);
    // }

    public function count_phone_select(){
        $count = $this->Base_model->loadToListJoin("SELECT  COUNT(sp.select_id) AS count_select FROM select_phone sp WHERE sp.`status`=1 AND sp.`no` = (SELECT  MAX(`no`)  FROM select_phone s WHERE  s.`status`=1)");
        echo json_encode($count);
    }

    public function list_winer(){
        $list_winer = $this->Base_model->loadToListJoin("SELECT DISTINCT (SELECT mb.mobile_name FROM mobile_number mb WHERE mb.mobie_id = sp.mobile_id)AS mobile_winer FROM select_phone sp WHERE sp.`status` = 2");
        echo json_encode($list_winer);
    }

    public function reset_selection(){
        $reset_selection = $this->Base_model->run_query("DELETE FROM select_phone");
        //$reset_selection = $this->Base_model->run_query("DELETE FROM mobile_number");
        echo json_encode($reset_selection); 
    }

    public function insert_select_phone_win(){
        $mobile_id = $this->input->post("id_mobile");
        $no = $this->input->post("no");
           $this->Base_model->run_query("INSERT INTO `pos_random_phone`.`select_phone` (`mobile_id`, `no`, `status`) VALUES ('$mobile_id', '$no', '1')");
           echo json_encode("done");
    }

    public function insert_select_phone(){
          $mobile_name = $this->input->post("phone_number");
           $this->Base_model->run_query("INSERT INTO `pos_random_phone`.`mobile_number` (`mobile_name`, `status`) VALUES ('$mobile_name', '1')");
           echo json_encode("done");
    }

    public function add_to_selection(){
          $add_to_selection = $this->input->post("mobile");
          $select_id = $this->Base_model->get_value_sql("SELECT m.mobie_id FROM mobile_number m WHERE m.`status` =1 AND m.mobile_name='$add_to_selection'","mobie_id");
           $this->Base_model->run_query("INSERT INTO `pos_random_phone`.`select_phone` (`mobile_id`, `no`, `status`) VALUES ('$select_id', '0', '2')");
           echo json_encode("done");
    }

    public function get_phone_all(){

        $data = $this->Base_model->loadToListJoin("SELECT m.mobile_name FROM mobile_number m WHERE m.`status`=1 order by m.mobile_name ASC");
        echo json_encode($data);
    }
    public function get_phone_select(){
         $data = $this->Base_model->loadToListJoin("SELECT  COUNT(sp.select_id) AS count_select,(SELECT mb.mobile_name FROM mobile_number mb WHERE mb.mobie_id = sp.mobile_id)AS mobile
         FROM select_phone sp WHERE sp.`status`=1 AND sp.`no` = (SELECT  MAX(`no`)  FROM select_phone s WHERE  s.`status`=1)");
        echo json_encode($data);
    }

    public function update_phone_select(){
        $phone = $this->input->post('phone');
        $select_id = $this->Base_model->get_value_sql("SELECT s.select_id FROM select_phone s INNER JOIN mobile_number m ON m.mobie_id = s.mobile_id WHERE m.mobile_name ='$phone'","select_id");

        $data  = $this->Base_model->run_query("UPDATE select_phone  SET `status` = '2' WHERE select_id =$select_id");
        echo json_encode("done");
    }

}
