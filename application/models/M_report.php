<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_report extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
     
    //-------------------------------------------------------
     // advance search.
    public function advance_search($data_posted)
    {
         
        //var_dump($data_posted);die;
                
        //$to_date = $data_posted->to_date;
        
        $this->db->select('*');
        $this->db->from('flock');
        $this->db->join('visit','visit.fkf_id = flock.f_id');
        
        if( isset( $data_posted->driver_name ) ){
            $this->db->where('visit.driver_name', $data_posted->driver_name);
        }

        if( isset( $data_posted->vehicle_number ) ){
            $this->db->where('visit.vehicle_number', $data_posted->vehicle_number);
        }
        if( isset( $data_posted->driver_cnic ) ){
            $this->db->where('visit.driver_cnic', $data_posted->driver_cnic);
        }
         if( isset( $data_posted->broker_name ) ){
            $this->db->where('visit.broker_name', $data_posted->broker_name);
        }
          if( isset( $data_posted->f_id ) ){
            $this->db->where('visit.fkf_id', $data_posted->f_id);
        }
 

        if( isset( $data->from_date ) ){
            $new_f = strtotime( $data->from_date );
            $f_date = date('d-m-Y',$new_f);
            $this->db->where('visit_date >=', $f_date);
        }

        if( isset( $data->to_date ) ){
            $date1 = str_replace('-', '/', $data->to_date );
            $to_date = date('d-m-Y',strtotime($date1 . "+1 days"));
            $this->db->where('visit_date <=', $to_date);
        }

         $query = $this->db->get();
         $data = $query->result_array();
          
             if($data){
                return $data;
             }else{
                return 0;
             }
           
    }
     
    //get flock wise report.
    public function complete_report()
    {

         $this->db->select('*');
         $this->db->from('flock');
        // $this->db->join('visit','visit.fkf_id=flock.f_id');
         $query  = $this->db->get();
         $data   = $query->result();
        $result = [];
         $i      = 0;
         foreach ( $data as $element ){
                        $this->db->where('fkf_id',$element->f_id);
            $query_1  = $this->db->get('visit');
            $data_1   = $query_1->result();
            $sum      = 0;
            foreach ($data_1 as $element_1) {
                $sum += $element_1->chicken_weight;
            }

            $data[$i]->sum      = $sum * 40; 
            $data[$i]->remaning = $element->actual_weight - ( $sum * 40 );
            $i++;
         }
         // echo '<pre>'; print_r($data);
         // die;
         return $data;
    }

     //get flock wise report.
    public function update_report($visit_id,$current_paid)
    {
         
         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','flock.f_id=visit.fkf_id');
         $this->db->where('visit.visit_id',$visit_id);
         $query = $this->db->get();
         $data = $query->result();

         $net_balance = $data[0]->balance-$current_paid;
         $paid_visit = $data[0]->paid_visit+$current_paid; 
         $f_id = $data[0]->f_id;
         $paid_flock = $data[0]->paid_flock+$current_paid;
         $this->db->set('balance',$net_balance);
         $this->db->set('paid_visit',$paid_visit);
         $this->db->set('visit_status',2);
         $this->db->where('visit_id',$visit_id);
         $this->db->update('visit');

         $this->db->set('paid_flock',$paid_flock);
         $this->db->where('f_id', $f_id);
         $this->db->update('flock');
         
       // echo '<pre>'; print_r($data);die;
       // return $data;
    }

    //----------------------------------------------------------
     public function flock_detail($f_id)
    {

         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','flock.f_id=visit.fkf_id');
          $this->db->where('flock.f_id',$f_id);
          $query = $this->db->get();
        $data = $query->result_array();
       // echo '<pre>'; print_r($data);die;
        return $data;
    }
    //----------------------------------------------------------
     public function flock($f_id)
    {

         $this->db->select('*');
         $this->db->from('flock');
        // $this->db->join('flock','flock.f_id=visit.fkf_id');
          $this->db->where('f_id',$f_id);
          $query = $this->db->get();
        $data = $query->result_array();
       // echo '<pre>'; print_r($data);die;
        return $data;
    }

     //----------------------------------------------------------
     public function all_visits_detail($id)
    {

         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','flock.f_id=visit.fkf_id');
          $this->db->where('visit.visit_id',$id);
          $query = $this->db->get();
        $data = $query->result_array();
        if( isset( $data[0] )){
            $data[0]['balance2'] = $data[0]['balance']; 
        }
        // echo '<pre>'; print_r($data);die;
        return $data;
    }
    //----------------------------------------------------------
     public function unpaid()
    {

         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','flock.f_id=visit.fkf_id');
         
         $this->db->where('visit_status', 4);
         $this->db->or_where('balance >', 0);
          
          $query = $this->db->get();
        $data = $query->result_array();
       // echo '<pre>'; print_r($data);die;
        return $data;
    }
     //----------------------------------------------------------------
    public function flock_chicken_weight($f_id)
    {
         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','flock.f_id=visit.fkf_id');
         $this->db->where('f_id',$f_id);
         $query = $this->db->get();
         $data = $query->result_array();
         $sum = 0;
         if($data){
            foreach($data as $row){
                $sum = $sum + $row['chicken_weight'];
            }
            return $sum;
            
        }else{
                return 0;
                }
    }
     //----------------------------------------------------------------
    // public function all_flock_chicken_weight()
    // {
    //      $this->db->select('*');
    //      $this->db->from('visit');
    //      $this->db->join('flock','flock.f_id=visit.fkf_id');
         
    //      $query = $this->db->get();
    //      $data = $query->result_array();
    //      $sum = 0;
    //      if($data){
    //         foreach($data as $row){
    //             $sum = $sum + $row['chicken_weight'];
    //         }
    //         return $sum;
            
    //     }else{
    //             return 0;
    //             }
    // }
    //----------------------------------------------------------
        
}


?>