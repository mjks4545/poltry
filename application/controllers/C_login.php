<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller{
    
    function __construct()
    {
        parent:: __construct();
        $this->load->model('M_login');
        
    }
    
    function index()
    {
        
        $data['title'] = "Login ";
        $data['main'] = 'Login';
        // $data['menus'] = $this->m_subjects->get_detail();//for all subjects
        //$data['menus'] = $this->m_subjects->get_subjects();//for all subjects both working
        $this->load->view('templates/header', $data);
        $this->load->view('v_login', $data);
        $this->load->view('templates/footer');
    }
    
    function logout()
    {
        
        //unset($_SESSION['username']);
         
        $this->session->unset_userdata('username');
       
        $this->session->set_flashdata('error', 'You ve Have Been Log Out.!');
         redirect('index');
    }
    
    //verify username and password
    public function verify()
    {
        $data['title'] = "Login ";
        //$data['nav_list'] = $this->M_category->get_category();
        $data['main'] = 'Login';
        
         
        if($this->input->post('username'))
        {
            $username = $this->input->post('username');
            $pass = $this->input->post("password");
            
            $this->M_login->verify($username,$pass);
            
            if(isset($_SESSION['username']))
            {
                redirect('Index','refresh');

            }
            
            
        }
        
        //$this->load->view('admin/templates/header',$data);
        $this->load->view('v_login',$data);
        //$this->load->view('admin/templates/footer');
    }
}