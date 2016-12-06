<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_home extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //get last flock.
    public function current_flock()
    {
         $this->db->select('*');
         $this->db->from('flock');
         $this->db->where('status',1);
         $this->db->limit(1,'desc');
         $query = $this->db->get();
         $data = $query->result_array();
         return $data;
    }
    //get all flock.
    public function get_flock()
    {
         $this->db->select('*');
         $this->db->from('flock');
         $query = $this->db->get();
         $data = $query->result_array();
         return $data;
    }
     //get all visit accoarding to flock.
    public function get_f_visit($f_id)
    {
         $this->db->select('*');
         $this->db->from('visit');
         $this->db->join('flock','flock.f_id=visit.fkf_id');
         $this->db->where('flock.f_id',$f_id);
         $query = $this->db->get();
         $data = $query->result();
        //echo '<pre>';print_r($data);die;
        return $data;
    }
     //create  flock.
    public function create_flock($data)
    {
        // check if flock exist than disable it and than create new flock
        $this->db->select('*');
        $this->db->from('flock');
        $this->db->where('status',1);
        $this->db->order_by('f_id');
        $this->db->limit(1,'desc');
        $query = $this->db->get();
        $result = $query->result();
        if($result){
            $this->db->set('status', 0);
            $this->db->update('flock');
             $this->db->insert('flock', $data);
        } else{
             $this->db->insert('flock', $data);

        }
 
    }
    //-----------------------------------
      public function close_flock($f_id)
    {
                
                $this->db->set('status', 0);
                $this->db->where('f_id', $f_id);
                $this->db->update('flock');
    }

    //-----------------------------------
      public function delete_flock($f_id)
    {
                $this->db->where('f_id', $f_id);
         $this->db->delete('flock');
        
    }
     //-----------------------------------
      public function get_edit($f_id)
    {
                
          $this->db->select('*');
         $this->db->from('flock');
         $this->db->where('f_id', $f_id);
          $query = $this->db->get();
        $data = $query->result_array();
        return $data;
        
    }
     //-----------------------------------
      public function update_edit($data,$update_id)
    {
                 $this->db->where('f_id',$update_id);
                 $this->db->update('flock',$data);
    }
     //-----------------------------------
      public function inactive_status($data,$update_id)
    {
                 $this->db->where('f_id',$update_id);
                 $this->db->update('flock',$data);
    }
     //-----------------------------------
      public function active_status($data,$update_id)
    {
                 $this->db->where('f_id',$update_id);
                 $this->db->update('flock',$data);
    }
      
      
    // -----------------------------------------------------------------------

    public function get_serail_no(){
        
                  $this->db->where('status',1);
        $query  = $this->db->get('flock');
        $result = $query->result();
        if( $result != 0 ){
                        $this->db->order_by('visit_id','desc');
                        $this->db->limit(1);
                        $this->db->where('fkf_id',$result[0]->f_id);
            $query_v  = $this->db->get('visit');
            $result_v = $query_v->result();

            if( $result_v != 0 ){
                return $result_v[0]->serial_number + 1;
            }else{
                return 0;
            }
        }
    }
    // -----------------------------------------------------------------------

    public function get_visit_chicken_weight(){
        
                   $this->db->select('*');
                   $this->db->from('visit'); 
                   $this->db->join('flock', 'flock.f_id=visit.fkf_id'); 
                   $this->db->where('flock.status',1);
        $query   = $this->db->get();
        $result  = $query->result_array();
        $sum = 0;
        if($result){
            foreach($result as $row){
                $sum = $sum + $row['chicken_weight'];
            }
            return $sum;
        }else{
            return 0;
        }
         
    }

    //   ---------------------------------------------------------------------
}


?>