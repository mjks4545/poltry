<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_visit extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
     //-------------------------------------------------------

    //get all visit.
    public function get_visit()
    {

         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','visit.fkf_id=flock.f_id');
       $this->db->where('flock.status',1);
          $query = $this->db->get();
        $data = $query->result_array();
       // echo '<pre>'; print_r($data);die;
        return $data;
    }

      
   
     //-------------------------------------------------------
    public function get_edit($id)
    
     {
         $this->db->where('v_id',$id);
        $query = $this->db->get('visit');
         return $query->result_array();
         
     }
     //-------------------------------------------------------
     function add_visit( $data = array() )
        {
        
            $this->db->insert('visit', $data);
            // get last inserted data with active flock
            $insert_id= $this->db->insert_id();
          
              $this->db->select('*');
              $this->db->from('flock');
              $this->db->where('status',1);
            
             $query = $this->db->get();
             
             $data_1 = $query->result_array();
            
             // udating accoading to active status
              $f_id = $data_1[0]['f_id'];
              $paid_flock = $data_1[0]['paid_flock'];
              $sum = $data['advance'] + $paid_flock;

              $this->db->where('visit_id', $insert_id);
              $this->db->set('fkf_id', $f_id);
              $this->db->update('visit');

              $this->db->where('f_id', $f_id);
              $this->db->set('paid_flock', $sum);
              $this->db->update('flock');
        }

     //-------------------------------------------------------
      function update_visit($data = array(),$id)
    {

        $this->db->update('visit', $data, array('visit_id'=>$id));
        //changing total weight in flock table

        $this->db->select('*');
              $this->db->from('flock');
              $this->db->where('status',1);
              $query = $this->db->get();
              $data_1 = $query->result_array();
              $f_id = $data_1[0]['f_id'];
              $sum = 0;
              $visit_id = $params['visit_id'];
              $this->db->set( 'advance', $params['advance'] );
              $this->db->where('visit_id', $visit_id);
              $this->db->update('visit');
              $this->db->select('*');
              $this->db->from('visit');
              $this->db->where('fkf_id',$f_id);
              $query_1 = $this->db->get();
              $visits = $query_1->result_array();
              foreach ($visits as $visit) {
                $sum = $sum + $visit['advance'];
                $sum = $sum + $visit['paid_visit'];
              }
              $this->db->set( 'paid_flock', $sum );
              $this->db->where('f_id', $f_id);
              $this->db->update('flock');

        $this->db->select('*');
        $this->db->from('visit');
        
        $this->db->join('flock','flock.f_id=visit.fkf_id');
        $this->db->where('visit_id', $id);
        $this->db->where('visit_status',1);
      
        $query = $this->db->get();
        $data = $query->result();
      //echo '<pre>';print_r($data);die;
        //return $data;die;
        if($data)
        {
        $loaded_weight = $data[0]->loaded_weight;
        $empty_weight = $data[0]->empty_weight;
        $fkf_id = $data[0]->fkf_id;
        $flock_weight = $data[0]->total_weight;
        $visit_weight = $loaded_weight-$empty_weight;
        $flock_net_weight = $flock_weight-$visit_weight;
       // $paid_flock = $data[0]->paid_visit+$data[0]->paid_flock;
 
        //update flock table
        
        //$this->db->set(array('total_weight' => $flock_net_weight)); //'paid_flock'=>
        // $paid_flock));
        //$this->db->where('f_id', $fkf_id);
        //$this->db->update('flock');
        return 1;
       }else{
        return 0;
       }
       
        
     } 
      //----------------------------------------------------------------
        public function update_flock($paid_visit,$visit_id)
        {
          $this->db->select('*');
          $this->db->from('visit');
          $this->db->join('flock','flock.f_id=visit.fkf_id');
          $this->db->where('visit.visit_id',$visit_id);
          $query = $this->db->get();
          $data = $query->result();

          $old_paid = $data[0]->paid_flock;
          $new_paid =$paid_visit+$old_paid;
          $f_id = $data[0]->fkf_id;

          $this->db->set('paid_flock', $new_paid);
          $this->db->where('f_id', $f_id);
          $this->db->update('flock');

        }  
     //----------------------------------------------------------------
        public function unpaid_visit($visit_id)
        {
             $this->db->set('visit_status',4);
             $this->db->where('visit_id', $visit_id);
             $this->db->update('visit');

        }  
      //-------------------------------------------------------
     public function delete($id)
    {
         
         $this->db->where('visit_id',$id);
         $this->db->delete('visit');
    }
     //-------------------------------------------------------
 

    public function update_remaning_weight( $chicken, $visit ){

      $visit_data = $this->db->get('visit')->result();

      $total_sold_chicken = 0;
      foreach ($visit_data as $chicken) {
        $total_sold_chicken += $chicken->chicken_weight;
      }


      $this->db->where('visit_id', $visit);
      $result = $this->db->get('visit')->result_array();

      $this->db->where('f_id',$result[0]['fkf_id']);
      $data = $this->db->get('flock')->result_array();
      $total_sold_chicken = $total_sold_chicken * 40;
      $chicken = $data[0]['actual_weight'] - $total_sold_chicken;
      $array = [

          'total_weight' => $chicken

      ];

      $this->db->where('f_id', $result[0]['fkf_id']);
      $this->db->update('flock',$array);
      $this->db->where('visit_id', $visit);
      $this->db->update('visit', [ 'v_status' => 1 ] );
          
    }
      

}


?>