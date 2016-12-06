<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();   
        
    }
    //-------------------------------------------------
    public function index()
    {

       
       $this->load->view('templates/header');
        
       $this->load->view('templates/footer');
       
    
    }
    //-----------------------------------
	public function get_flock()
	{

	    $data['flock'] = $this->m_home->get_flock();

        //echo '<pre>';print_r($data);die;
       $this->load->view('templates/header');
       $this->load->view('home/v_home', $data);
       $this->load->view('templates/footer');
       
    
	}
    ////////////////////////////////////////////////////////////------
    public function flock_wise_visit()
    {
          $f_id = $this->uri->segment('3');
 
       $data['flock_visit'] = $this->m_home->get_f_visit($f_id);
        //echo '<pre>';print_r($data);die;
       $this->load->view('templates/header');
       $this->load->view('visit/v_flock_visit', $data);
       $this->load->view('templates/footer');
 
    }
    
    ////////////////////////////////////////////////////////////------
    public function create_flock()
    {
         $data['active_flock'] = $this->m_home->current_flock();

       $this->load->view('templates/header');
       $this->load->view('home/v_home_create', $data);
       $this->load->view('templates/footer');
       
    
    }

    ////////////////////////////////////////////////////////////------

  public function insert_flock()
  {
      if($this->input->post('rate')=='') {
        $this->session->set_flashdata('msg','Please Select Rate');
        redirect('home/create_flock');
      }
      // calculating total weight...
      $weight_per_bird = $this->input->post('total_weight');
      $total_bird      = $this->input->post('total_bird');
      $total_weight    = ( $weight_per_bird * $total_bird ) / 1000;


         
         //echo $date;die;
        $data = array(
                  'actual_weight' => $total_weight,
                  'total_bird' => $this->input->post('total_bird'),
                  'total_weight' => $total_weight,
                  'rate' =>$this->input->post('rate'),
                  'per_bird_weight' => $weight_per_bird / 1000,
                  'f_date' =>date('d-m-Y ')
                 );
        
        $this->m_home->create_flock($data);
        redirect('visit');

    }
     ////////////////////////////////////////////////////////////------

      public function delete_flock($f_id)
    {
                
         $this->m_home->delete_flock($f_id);
         redirect('index');
        
    }
     ////////////////////////////////////////////////////////////------
      public function edit_flock($f_id)
    {
                
         $data['flock']=$this->m_home->get_edit($f_id);
         //echo'<pre>';print_r($data);die;
         $this->load->view('templates/header');
       $this->load->view('home/v_edit', $data);
       $this->load->view('templates/footer');
        
    }
     ////////////////////////////////////////////////////////////------
      public function update_flock()
    {
        $total_weight =$this->input->post('total_weight');
      $total_bird =$this->input->post('total_bird');
      $total_weight = ($total_weight/1000)*1000;
         $t = time();
         
         $time = date('h:i:s:a',$t);
        $update_id = $this->input->post('update_id');
                 $data = array(
                        'total_weight' => $total_weight,
                        'total_bird' => $total_bird,
                         'f_name' =>$this->input->post('f_name'),
                        'rate' =>$this->input->post('rate'),
                        'status' =>$this->input->post('status'),
                        'f_date' =>date('d-m-Y h:i:s a')
                         

                     );

         $this->m_home->update_edit($data,$update_id);
         redirect('home/get_flock');
        
    }
     
     
     //-----------------------------------
      public function report()
    {
         
         $this->load->view('templates/header');
       $this->load->view('report/v_report');
       $this->load->view('templates/footer');
        
    }
    
    
    //------------------------------------------------------------------
    function uploadPicture($id)
    {
        //upload an image options
            $config = array();
            $config['upload_path'] = './assets/Home/picture';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size']      = '2048';
            $config['overwrite']     = FALSE;
            $config['file_name'] = $id."_".time(); //teacher id plus current time
        
            $this->upload->initialize($config);
            
            if(!$this->upload->do_upload('upload_pic'))
            {
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('Home/profile','refresh');
            }
            else
            {
                $upload_data = $this->upload->data();
                
                        //creating thumbnail image of the uploaded image.
                        $config['image_library'] = 'gd2';
                        $config['source_image']	= './assets/Home/picture/'.$upload_data['file_name'];
                        $config['new_image'] = './assets/Home/picture/thumb';
                        //$config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']	= 200;
                        $config['height']	= 200;
                        
                        //$this->load->library('image_lib', $config); 
                        $this->image_lib->initialize($config); 
                        $this->image_lib->resize();
                        
                        
                $this->m_Home->uploadPicture($id);
                $this->session->set_flashdata('message','Picture Uploaded Successfully');
                redirect('Home/profile','refresh');
            }
            

    }
    
    //-------------------------------------------------------
}