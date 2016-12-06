<?php
class M_login extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
    }
    
    public function verify($username, $pass)
    {
        $this->db->select('id, username, password,name');
        $query = $this->db->get_where('admin',array('username'=>$username, 'password'=>$pass));
     
        if($query->num_rows() > 0)
        {  
            $rows = $query->row_array();
            
            //$this->M_admin->get_positions($rows['job_title_id']); Category id
            $_SESSION['admin_id'] = $rows['id'];
            $_SESSION['username'] = $rows['username'];
            $_SESSION['name'] = $rows['name'];
            
            
        }
        
        else
        {
            $this->session->set_flashdata('error','Your Username or Password is not Correct');
            redirect('c_login','refresh');
        }
             
    }
    
    
    
}