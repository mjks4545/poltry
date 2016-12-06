<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visit extends CI_Controller {

    function __construct()
    {
        parent::__construct();   
       // $this->load->model('m_Home');
       // $this->load->model('m_subjects');
    }
    //-----------------------------------------------------------------------------
	public function index()
	{
       $data['current_flock'] = $this->m_home->current_flock();
       $this->load->view('templates/header');
       $this->load->view('visit/v_visit_view', $data);
       $this->load->view('templates/footer');
	}
    //-----------------------------------------------------------------------------
  public function detail()
  {

       $this->load->view('templates/header');
       $this->load->view('visit/v_visit_detail');
       $this->load->view('templates/footer');
       
    
  }
    //-----------------------------------------------------------------------------
     function getAllvisitJSON()
   {  
      print_r(json_encode($this->m_visit->get_visit()));       
  }
   
  //-----------------------------------------------------------------------------
     
    function ngCreate()
    { 
        $data_posted = json_decode(file_get_contents( "php://input",true ) ); 
      
        //var_dump($data_posted);die;
        if($data_posted->vehicle_number == ''){
          redirect('visit');
        }
      
        if(count($data_posted) > 0)

          
        {
           
            $data = array(
                
            'vehicle_number' => $data_posted->vehicle_number,
            'driver_name' => $data_posted->driver_name,
            'driver_cnic' => $data_posted->driver_cnic,
            'broker_name' => $data_posted->broker_name,
            'empty_weight' => $data_posted->empty_weight,
            'rate' => $data_posted->rate,
            'advance' => $data_posted->advance
            //'paid_visit' => $data_posted->advance
                
              
            );
            $this->m_visit->add_visit($data);
 
           } 
        else
        {
            echo 'no data for new entry';die;
        }
    }

    //-----------------------------------------------------------------------------
    
    function ngcallitwhenupdate(){
        $data_posted = json_decode(file_get_contents("php://input",true)); 
    }
    //-----------------------------------------------------------------------------
    function ngEdit()
    {
         
        $data_posted = json_decode(file_get_contents("php://input",true)); 
        //print_r($data_posted);die;
        $vehicle_number= $data_posted->vehicle_number;
        $visit_id=$data_posted->visit_id;
       
        if(count($data_posted) > 0)
        {
           if(!empty($data_posted->loaded_weight))
              {
                if($data_posted->current_paid > 0) 
                  {

        
            $balance = $data_posted->balance;
            $paid_visit = $data_posted->current_paid+$data_posted->paid_visit2;
            //print_r( $data_posted );die;
            $chicken_weight = ($data_posted->loaded_weight-$data_posted->empty_weight)/40; 
           $status=2;
           $data = array(
            
              'empty_weight' => $data_posted->empty_weight,
              'rate' => $data_posted->rate,
              'advance' => $data_posted->advance,
               'vehicle_number' => $vehicle_number,
              'driver_name' => $data_posted->driver_name,
              'driver_cnic' => $data_posted->driver_cnic,
               'loaded_weight' => $data_posted->loaded_weight,
               'balance' => $balance,
                'broker_name' => $data_posted->broker_name,
               'visit_status' => $status,
               'paid_visit'  => $paid_visit,
               'chicken_weight' => $chicken_weight
               
            );
           
            
            $this->m_visit->update_visit($data,$visit_id);
            if( $data_posted->v_status != '1' ){
              $this->m_visit->update_remaning_weight($chicken_weight,$visit_id);
            }
                     }else{

          $current_total = ($data_posted->loaded_weight-$data_posted->empty_weight)
          /40*($data_posted->rate);
          $balance = $current_total-$data_posted->advance;

          $chicken_weight = ($data_posted->loaded_weight-$data_posted->empty_weight)/40; 

           $status = 1;
           $data = array(
            
          'empty_weight' => $data_posted->empty_weight,
          'rate' => $data_posted->rate,
           'advance' => $data_posted->advance,
          'vehicle_number' => $vehicle_number,
          'driver_name' => $data_posted->driver_name,
          'driver_cnic' => $data_posted->driver_cnic,
          'loaded_weight' => $data_posted->loaded_weight,
          'balance' =>$balance,
          'broker_name' => $data_posted->broker_name,
          'visit_status' => $status,
          //'paid_visit'  => $paid_visit,
          'chicken_weight' => $chicken_weight
            );
    
            $this->m_visit->update_visit($data,$visit_id);

                           } // inner most if
            }else{
           $data = array(
            
           'empty_weight' => $data_posted->empty_weight,
           'rate' => $data_posted->rate,
           'advance' => $data_posted->advance,
           'vehicle_number' => $vehicle_number,
           'driver_name' => $data_posted->driver_name,
           'driver_cnic' => $data_posted->driver_cnic,
           'broker_name' => $data_posted->broker_name
               
            );
    
            $this->m_visit->update_visit($data,$visit_id);
              }
    }// main if end
        else
            {
            echo 'no data';
            }
}

    //----------------------------------------------------------------
        public function unPaid()
        {
            $data_posted = json_decode(file_get_contents("php://input",true));
            $visit_id = $data_posted->visit_id; 
            
           print_r(json_encode($this->m_visit->unpaid_visit($visit_id)));
            
        }
   
//----------------------------------------------------------------
        public function delete()
        {
            $params = json_decode(file_get_contents('php://input'),true);
           // print_r($params);die;
            $this->m_visit->delete($params['v_id']);
            // redirect('visit/index');

        }
        //----------------------------------------------------------------
        public function close_flock()
        {
            $f_id = $this->uri->segment('3');
             $this->m_home->close_flock($f_id);
             redirect('home');
        }
  //----------------------------------------------------------------
        public function iamnewfunction(){
              
              $params = json_decode(file_get_contents('php://input'),true);
              
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
              $newbalance = $params->balance - $params->advance;
              $this->db->where('visit_id', $params->visit_id);
              $this->db->update('visit',[ 'balance' => $newbalance ]);

        }
        //---------------------------------------------------
        public function vehicle(){
           $vehicles = json_decode(file_get_contents('php://input'),true);

        }
        //---------------------------------------------------
        public function name(){
          $names = json_decode(file_get_contents('php://input'),true);
          
        }
        //---------------------------------------------------
        public function cnic(){
            $cnices = json_decode(file_get_contents('php://input'),true);
          
        }
        //---------------------------------------------------
        public function broker(){
           $broker = json_decode(file_get_contents('php://input'),true);
          
        }
        //---------------------------------------------------
        public function emptys(){
           $emptys = json_decode(file_get_contents('php://input'),true);
          
        }
        //---------------------------------------------------
        public function loaded(){
           $loaded = json_decode(file_get_contents('php://input'),true);
          
        }

        //---------------------------------------------------
       
}