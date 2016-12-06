<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct()
    {
        parent::__construct();   
      
    }
    //-------------------------------------------------------------
	public function index()
	{
        
       $this->load->view('templates/header');
       $this->load->view('report/v_report');
       $this->load->view('templates/footer');
       
    
	}
  //-------------------------------------------------------------
   public function unpaid_search()
    {

       $data['advance_result'] = $this->m_report->unpaid();
       
         if($data['advance_result'] != 0)
         {

       $this->load->view('templates/header');
        
       $this->load->view('report/v_unpaid_search', $data);
       $this->load->view('templates/footer');
 
       }else{
       $this->session->set_flashdata('msg','No Record Found! plz try again');
         
        redirect('report');
       }
     
  }
  //-----------------------------------------------------------------------------
     function getAllUnpaidJSON()
   {
      
     
    print_r( json_encode( $this->m_report->unpaid(  ) ) );     

  }
  //-----------------------------------------------------------------------------

    function ngUnpaidUpdate()
    {
        // get posted data from angularjs purchases 
        $data_posted = json_decode(file_get_contents("php://input",true)); 
       // print_r($data_posted);die;
       $vehicle_number= $data_posted->vehicle_number;
       $visit_id=$data_posted->visit_id;
       
        if(count($data_posted) > 0)
        {
           if(!empty($data_posted->loaded_weight))
       {
              if($data_posted->current_paid > 0) 
              {

        
            $balance =$data_posted->balance-$data_posted->current_paid;
            $paid_visit = $data_posted->current_paid+$data_posted->paid_visit;
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
               'balance' =>$balance,
                'broker_name' => $data_posted->broker_name,
               'visit_status' => $status,
               'paid_visit'  =>$paid_visit,
               'chicken_weight' => $chicken_weight
               
            );
           
            $this->m_visit->update_flock($paid_visit,$visit_id);
            $this->m_visit->update_visit($data,$visit_id);
           
          }else{

             $current_total = ($data_posted->loaded_weight-$data_posted->empty_weight)/40*($data_posted->rate);
       $balance =$current_total-$data_posted->advance;
       $paid_visit = $data_posted->advance;
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
               'paid_visit'  => $paid_visit,
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
    
            $this->m_visit->update_visit($data,$visit_id,$vehicle_number);

        }
      }// main if end
        else
        {
            echo 'no data';
        }
    }
   //-------------------------------------------------------------
    public function complete_report()
    {
        
        $data['complete']=$this->m_report->complete_report();
       // $data['visit_data']=$this->m_report->all_flock_chicken_weight();
        //print_r($data['visit_data']);die;
        if(!$data)
        {
          redirect('visit');
        }
        
       $this->load->view('templates/header');
       $this->load->view('report/v_complete_r', $data);
       $this->load->view('templates/footer');
        
    }
    
  //-----------------------------------------------------------------------------
     function flock_detail()
   {
      $f_id = $this->uri->segment('3');
      $data['specific_flock'] = $this->m_report->flock($f_id);
       $data['visit_data'] = $this->m_report->flock_chicken_weight($f_id);
       $this->load->view('templates/header');
       $this->load->view('report/v_flock_search', $data);
       $this->load->view('templates/footer');

  }

  //-----------------------------------------------------------------------------
     function getAllreportJSON()
   {
      
    $id = $this->uri->segment(3);
    print_r( json_encode( $this->m_report->flock_detail( $id ) ) );     

  }
  //-----------------------------------------------------------------------------
     function getAllreportsJSON()
   {
       $id = $this->uri->segment(3);
       print_r( json_encode( $this->m_report->all_visits_detail( $id ) ) );     

  }
   //-----------------------------------------------------------------------------
     function update_report()
   {
       $f_id = $this->input->post('f_id');
        
        $visit_id = $this->input->post('id');
         $current_paid = $this->input->post('current_paid');  
       $this->m_report->update_report( $visit_id ,$current_paid); 
       redirect('report/flock_detail/'.$f_id);    

  }
   
  //-----------------------------------------------------------------------------
     
    function ngEdit()

    {
        
        $data_posted = json_decode(file_get_contents("php://input",true)); 
        $id = $data_posted->visit_id;
        if(count($data_posted) > 0)
 
        {
           
            $data = array(
                
                'vehicle_number' => $data_posted->vehicle_number,
            'driver_name' => $data_posted->driver_name,
              'driver_cnic' => $data_posted->driver_cnic,
               'broker_name' => $data_posted->broker_name,
            'empty_weight' => $data_posted->empty_weight,
            'rate' => $data_posted->rate,
              'advance' => $data_posted->advance,
              'paid_visit' =>$data_posted->advance,
                
              
            );
       
           $this->m_report->update_report($data ,$id);
        }
        else
        {
            echo 'no data for new entry';
        }
    }

    //-----------------------------------------------------------------------------

    function advancePostdataJSON(){

       $data_posted = json_decode(file_get_contents("php://input",true));

       print_r( json_encode($this->m_report->advance_search($data_posted) ) );
        
    }

    //-----------------------------------------------------------------------------

    function updateSearchJson()
    {
        // get posted data from angularjs purchases 
        $data_posted = json_decode(file_get_contents("php://input",true)); 
       // print_r($data_posted);die;
       $vehicle_number= $data_posted->vehicle_number;
       $visit_id=$data_posted->visit_id;
       
        if(count($data_posted) > 0)
        {
           if(!empty($data_posted->loaded_weight))
       {
              if($data_posted->current_paid > 0) 
              {

        
            $balance =$data_posted->balance-$data_posted->current_paid;
            $paid_visit = $data_posted->current_paid+$data_posted->paid_visit;
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
               'balance' =>$balance,
                'broker_name' => $data_posted->broker_name,
               'visit_status' => $status,
               'paid_visit'  =>$paid_visit,
               'chicken_weight' => $chicken_weight
               
            );
           
            $this->m_visit->update_flock($paid_visit,$visit_id);
            $this->m_visit->update_visit($data,$visit_id);
           
          }else{

             $current_total = ($data_posted->loaded_weight-$data_posted->empty_weight)/40*($data_posted->rate);
       $balance =$current_total-$data_posted->advance;
       $paid_visit = $data_posted->advance;
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
               'paid_visit'  => $paid_visit,
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
    
            $this->m_visit->update_visit($data,$visit_id,$vehicle_number);

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
       
     
    
   //-------------------------------------- 
}