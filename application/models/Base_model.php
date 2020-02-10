<?php
class Base_model extends CI_Model {

    private $permission_id;
    private $performance = 'v_most_sale_qty_rms';

    public function __construct() {
        parent::__construct();
    }
    public function sale_offline($var){
        $return="";
        $feild="";
        if($var=="cashier")
            $feild="cashier_id";
        else if($var=="dates")
            $feild="sale_offline_date";
        else if($var=="cash_id")
            $feild="sale_offline_cash_id";
        
        $return=$this->get_value_sql("select $feild as val from branch where branch_id=".$this->branch_id()." ","val");
        return $return;

    }
    public function cut_stock($qtys,$stock_location_id,$stock_item_id,$sale_detail_id,$item_detail_id,$cut_stock){
         $costing = 0 ;
         $json = array();
        if($cut_stock==0){    
            $this->cut_stock_ingredient($item_detail_id,$stock_location_id,$qtys,$sale_detail_id);
                    
        }else{

            $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$stock_item_id and branch_id=".$this->branch_id()." and stock_location_id=$stock_location_id order by stock_created_date asc");
                //
               
                for($i=0;$i<count($rd_stock);$i++){
                    //rd ingredient
                    
                    if($qtys<=$rd_stock[$i]->stock_qty || $i==count($rd_stock)-1){
                        $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>$rd_stock[$i]->stock_qty-$qtys));
                        $costing +=$rd_stock[$i]->stock_costing*$qtys;
                        array_push($json,array(
                            "StockId"=>$rd_stock[$i]->stock_id,
                            "Qty"=>$qtys,
                            "Costing"=>$rd_stock[$i]->stock_costing,
                            "ing"=>0
                        ));
                        break;
                    }else{
                        if(($rd_stock[$i]->stock_qty)>0){
                            $qtys=$qtys-$rd_stock[$i]->stock_qty;
                            $this->Base_model->update('stock','stock_id',$rd_stock[$i]->stock_id,array('stock_qty'=>0));
                            $costing +=$rd_stock[$i]->stock_costing*$rd_stock[$i]->stock_qty;
                            array_push($json,array(
                                "item_detail_id"=>$item_detail_id,
                                "StockId"=>$rd_stock[$i]->stock_id,
                                "Qty"=>$rd_stock[$i]->stock_qty,
                                "Costing"=>$rd_stock[$i]->stock_costing,
                                "ing"=>0
                            ));
                        } 
                    }

                }
                $data = array(
                    'sale_detail_costing' => $costing,
                    'sale_detail_costing_json' => json_encode($json), 
                );
                $this->update("sale_detail","sale_detail_id",$sale_detail_id,$data);
        }
        
        //return $costing;
        
    }
    public function cut_stock_ingredient($item_detail_id,$stock_location_id,$qty,$sale_detail_id){
        $rd_ing=$this->Base_model->loadToListJoin("SELECT ingredient_qty, ingredient_item_ingredient_id as item_detail_id from ingredient where ingredient_item_detail_id=$item_detail_id");
            $costing = 0;
            $json = array();
        foreach($rd_ing as $rdi){
                $qtys=$rdi->ingredient_qty*$qty;
                $rd_stock_ing=$this->Base_model->loadToListJoin("SELECT * FROM stock WHERE stock_item_id=$rdi->item_detail_id AND branch_id=".$this->branch_id()." and stock_location_id=$stock_location_id order by stock_created_date asc");
               
                for($k=0;$k<count($rd_stock_ing);$k++){
                    //rd ingredient
                    

                    if($qtys<=$rd_stock_ing[$k]->stock_qty){
                        $this->Base_model->update('stock','stock_id',$rd_stock_ing[$k]->stock_id,array('stock_qty'=>$rd_stock_ing[$k]->stock_qty-$qtys));
                        $costing +=$rd_stock_ing[$k]->stock_costing*$qtys;
                        array_push($json,array(
                            "item_detail_id"=>$rdi->item_detail_id,
                            "StockId"=>$rd_stock_ing[$k]->stock_id,
                            "Qty"=>$qtys,
                            "Costing"=>$rd_stock_ing[$k]->stock_costing,
                            "ing"=>1
                        ));
                        break;
                    }else{
                        if(($rd_stock_ing[$k]->stock_qty)>0){
                            $qtys=$qtys-$rd_stock_ing[$k]->stock_qty;
                            $this->Base_model->update('stock','stock_id',$rd_stock_ing[$k]->stock_id,array('stock_qty'=>0));
                            $costing +=$rd_stock_ing[$k]->stock_costing*$rd_stock_ing[$k]->stock_qty;
                            array_push($json,array(
                                "item_detail_id"=>$rdi->item_detail_id,
                                "StockId"=>$rd_stock_ing[$k]->stock_id,
                                "Qty"=>$rd_stock_ing[$k]->stock_qty,
                                "Costing"=>$rd_stock_ing[$k]->stock_costing,
                                "ing"=>1
                            ));
                        } 
                    }

                    

                }
        }
        
        $data = array(
                'sale_detail_costing' => $costing,
                'sale_detail_costing_json' => json_encode($json), 
            );
            $this->update("sale_detail","sale_detail_id",$sale_detail_id,$data);
    }
    public function return_stock($product_id,$branch_id,$stock_location,$qty){
        $rd_stock=$this->Base_model->loadToListJoin("select * from stock where stock_item_id=$product_id and branch_id=$branch_id and stock_location_id=$stock_location order by stock_created_date desc limit 1");   
        if($rd_stock!=""){
            foreach($rd_stock as $rd){
                $update_stock=array(
                     'stock_qty'           => $rd->stock_qty+$qty
                );
                 $this->Base_model->update('stock','stock_id',$rd->stock_id,$update_stock);
                
            }
        }
    }
    public function save($tblname, $data) {
        $this->db->insert($tblname, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


    

    public function update($tblname, $field, $id, $data) {
        $this->db->where($field, $id);
        $this->db->update($tblname, $data);
    }



    public function updates($tbname, $cond, $data) {
        $this->db->where($cond);
        $this->db->update($tbname, $data);
        return $this->db->affected_rows();
    }
    public function update_array($tblname, $update, $condition) {
        //$condition = array('a' => 1, 'b' => 2)
        while ($d = current($condition)) {
            $this->db->where($condition, $d);
            next($condition);
        }
        $this->db->update($tblname, $update);
    }
    public function update_2field($tblname, $field1, $field2, $id1, $id2, $data) {
        $this->db->where($field1, $id1);
        $this->db->where($field2, $id2);
        $this->db->update($tblname, $data);
    }
    
    public function update_pay($tblname, $field, $id, $data) {
        $this->db->where($field, $id);
        $this->db->where('status', 'ACTIVE');
        $this->db->update($tblname, $data);
    }
    
    public function get_data($tblname) {

        $result = array();
        $this->db->select('*');
        $this->db->from($tblname);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        //todo clear from memory
        $query->free_result();
        return $result;
    }

    public function get_data_by($sql) {
        $result = array();
        //$this->db->select('qty');
//			$this->db->from($tblname);
//			$this->db->where($field,$value);
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_field($tblname, $field, $id) {
        $this->db->select('*');
        $this->db->from($tblname);
        $this->db->where($field, $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    //List
    public function loadToList($tblname){
        $query = $this->db->get($tblname);
        return $query->result();
    }

    public function loadToListJoin($query) {
        $qu = $this->db->query($query);
        return $qu->result();
    }
    public function loadStoreProcedure($sql){
        $query    = $this->db->query($sql);
        $res      = $query->result();
        //add this two line 
        $query->next_result(); 
        $query->free_result(); 
        //end of new code
        return $res;
    }

    ////////////////////////////////////////

    public function delete_by($tblname, $field, $id) {
        $this->db->where($field, $id);
        $this->db->delete($tblname);
    }
     public function delete($tblname, $condition) {
        //$condition = array('a' => 1, 'b' => 2)

            while ($d = current($condition)) {
                $this->db->where($condition, $d);
                next($condition);
            }
            $this->db->delete($tblname);


    }

    public function checkValidation($field, $tblname, $txt) {
        $this->db->select($field);
        $this->db->from($tblname);
        $this->db->where($field, $txt);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return;
        }
    }

    public function setp_id($id) {
        $this->permission_id = $id;
    }

    public function getp_id() {
        return $this->permission_id;
    }

//            function backup($fileName='db_backup.zip'){
//                    // Load the DB utility class
//                    $this->load->dbutil();
//                    $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
//                    // Backup your entire database and assign it to a variable
//                    $backup =& $this->dbutil->backup();
//
//                    // Load the file helper and write the file to your server
//                    $this->load->helper('file');
//                    write_file(FCPATH.'/downloads/'.$fileName.$date->format('Y-m-d H:i:s'), $backup);
//                    
//                    // Load the download helper and send the file to your desktop
//                    $this->load->helper('download');
//                    force_download($fileName, $backup);
//          }

    function backup() {
        $this->load->dbutil();
        $this->load->helper('download');
        $tanggal = date('Ymd-His');
        $namaFile = $tanggal . '.sql.zip';
        $this->load->dbutil();
        $backup = & $this->dbutil->backup();
        force_download($namaFile, $backup);
    }

    public function record_count($tbl_name) {
        return $this->db->count_all($tbl_name);
    }
//    public function record_count_by($tblname, $field, $id) {
//        $this->db->select('count(*)');
//        $this->db->from($tblname);
//        $this->db->where($field, $id);
//        $query = $this->db->get();
//
//        if ($query->num_rows() > 0) {
//            return $query->result();
//        }
//    }

    public function pagenation($limit, $start, $tbl_name) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($tbl_name);

//                if ($query->num_rows() > 0) {
//                    foreach ($query->result() as $row) {
//                        $data[] = $row;
//                    }
//                    return $data;
//                }
//                return false; 
        return $query->result();
    }

    public function count_page($query_str) {
        return $this->db->query($query_str);
    }

    public function pagingationhighpoint($limit, $start, $str_query) {
        $this->db->limit($limit, $start);
        $query = $this->db->query($str_query);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;
    }

//            function restoredb(){
//                
//                $isi_file = file_get_contents('downloads/db_backup.zip.sql');
//                $string_query = rtrim($isi_file, "\n;" );
//                $array_query = explode(";", $string_query);
//                
//                foreach($array_query as $query)
//                {
//                    $this->db->query($query);
//                }
//                
//            }   

    public function get_value($tblname, $field, $wherefield, $wherecondition) {
        $qu = "select " . $field . " from " . $tblname . " where " . $wherefield . "='" . $wherecondition . "' limit 1";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->$field;
        }
        return $return_val;
    }

    public function get_value_sql($sql, $field) {
        $query = $this->db->query($sql);
        $return_val = '';
        foreach ($query->result() as $sql) {
            $return_val = $sql->$field;
        }
        return $return_val;
    }

    public function get_value_two_cond($tblname, $field, $wherefield1, $wherecondition1, $wherefield2, $wherecondition2) {
        $qu = "select " . $field . " from " . $tblname . " where " . $wherefield1 . "='" . $wherecondition1 . "' AND  " . $wherefield2 . "='" . $wherecondition2 . "' limit 1";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->$field;
        }
        return $return_val;
    }

    public function get_count_value($tblname, $field, $wherefield, $wherecondition) {
        $qu = "select count(" . $field . ") as " . $field . " from " . $tblname . " where " . $wherefield . "='" . $wherecondition . "'";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->$field;
        }
        return $return_val;
    }
    
    public function get_count_value_int($tblname, $field, $wherefield, $wherecondition) {
        $qu = "select count(" . $field . ") as " . $field . " from " . $tblname . " where " . $wherefield . "=" . $wherecondition . "";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->$field;
        }
        return $return_val;
    }

    public function get_value_byQuery($qu, $field) {
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->$field;
        }
        return $return_val;
    }

    public function run_query($query) {
        $this->db->query($query);
    }

    function get_chart_data() {
        $query = $this->db->get($this->performance);
        $results['chart_data'] = $query->result();
        return $results;
    }
    
    public function select($query, $condition) {
        //$condition = array(1,2,3,array(4,5))
        //$query = select a,b,c where d=? and e=? and f=? and g in ?
        //=> select a,b,c where d=1 and e=1 and f=3 and g in (4,5)
        $qu = $this->db->query($query, $condition);
        return $qu->result();
    }

    public function check_exists($field,$tbname,$cond){
        $this->db->select($field);
        $this->db->from($tbname);
        $this->db->where($cond);
     
        $query=$this->db->get();
        if($query->num_rows()>0){
            return TRUE;
        }
        return FALSE;
    }
    // public function user_id(){
    //     $user_data = $this->input->cookie('user_id', TRUE);
    //     $qu = "select cookie_user_id from cookie where cookie_status = 1 and cookie_user_data = '$user_data' limit 1";
    //     $query = $this->db->query($qu);
    //     $return_val = '';
    //     foreach ($query->result() as $qu) {
    //         $return_val = $qu->cookie_user_id;
    //     }
    //     return $return_val;
    // }

    public function user_id(){
        $result='';
        if(isset($_SESSION['user_id'])){
            $result = $_SESSION['user_id'];
        }

        return $result;
    }


    public function check_loged_in(){      
        if(!isset($_SESSION['loged_in'])){            
            redirect('/userlogin');
        }else{
           if(!$_SESSION['loged_in']){                
                redirect('/userlogin');
           }
        }        
    }

    public function position_id(){
        $qu = "select employee_position_id from employee where employee_id = ".$this->user_id()." limit 1";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->employee_position_id;
        }
        return $return_val;
    }

    
    public function branch_id(){
        $qu = "select employee_brand_id from employee where employee_id = ".$this->user_id()." limit 1";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->employee_brand_id;
        }
        return $return_val;
    }


    public function stock_location_id(){
        $qu = "select employee_stock_location_id from employee where employee_id = ".$this->user_id()." limit 1";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->employee_stock_location_id;
        }
        return $return_val;
    }
    public function remember(){
        $user_data = $this->input->cookie('user_id', TRUE);
        $qu = "select cookie_user_id from cookie where cookie_status = 1 and cookie_user_data = '$user_data' and cookie_remember = 1 limit 1";
        $query = $this->db->query($qu);
        $return_val = '';
        foreach ($query->result() as $qu) {
            $return_val = $qu->cookie_user_id;
        }
        return $return_val;
    }
    public function current_date($date_format) {
        $date = new DateTime("now", new DateTimeZone('Asia/Phnom_Penh'));
        return $date->format($date_format);
    }
     public function execute_query($query, $condition) {
        //$condition = array(1,2,3)
        //$query = select a,b,c where d=? and e=? and f=?
        //=> select a,b,c where d=1 and e=1 and f=3
        $this->db->query($query, $condition);
    }
    public function check_exist_sql($sql) {

        $query = $this->db->query($sql);
        //$query=$this->db->get();
        if($query->num_rows()>0){
            return TRUE;
        }
        return FALSE;
    }
    public function select_value($query, $condition, $column) {
        //$condition = array(1,2,3,array(4,5))
        //$query = select a,b,c where d=? and e=? and f=? and g in ?
        //=> select a,b,c where d=1 and e=1 and f=3 and g in (4,5)
        $qu = $this->db->query($query, $condition);
        $return_val = '';
        foreach ($qu->result() as $q) {
            $return_val = $q->$column;
        }
        return $return_val;
    }
    public function is_supper_user(){
        $id=$this->user_id();
        $val=$this->get_value_byQuery("select is_supper_user from v_user where employee_id=$id","is_supper_user");
        
        if($val==1){
            return true;
        }else{
            return false;
        }
    }

    public function get_permission($controller){
        $result=$this->loadToListJoin("select * from permission where permission_control='".$controller."' and position_id=".$this->position_id()." limit 1");
        return $result;
    }
    public function dots($var){
        if($var=='0'){
            return '00';
        }else if($var=='num'){
            return 2;
        }
    }

}
//
