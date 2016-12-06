<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// CodeIgniter i18n library by Jérôme Jaglale
// http://maestric.com/en/doc/php/codeigniter_i18n
// version 10 - May 10, 2012

class MY_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		//$this->ci =& get_instance();
        
        //check for language
		//$this->session->set_userdata('lang',$this->lang->lang());	
        
         //$chk_admin = $this->uri->segment(2);
        
        //check the admin user or public website
        //if(strtolower($chk_admin) == 'admin')
        //{
        
        define('FY_YEAR', '2016');
        
         //-----------Check Admin User Authentication-------------------------
        session_start();
        if(!isset($_SESSION['username']))
        {
             
            redirect('c_login','refresh');
        
            
        }
        //---------------End------------------------------------
        
        
        //----------------Check Allowed Module------------------ 
       // $module_name = $this->uri->segment(3);
//        
//        $_3rd_name = $this->uri->segment(4);
//        if($module_name == 'login' && $_3rd_name == 'logout')
//        {
//            redirect('admin/login/logout','refresh');     
//        }                
//        //get module id via module name.
//        $module = $this->M_module->get_module_id($module_name);
//        
//        $module_id =  $module[0]['id'];
//        
//        //check user whether he got permisson of the module or not.
//        $module_chk = $this->M_employee->has_permission($module_id,$_SESSION['user_id']);
//        
//        if(!$module_chk)
//        {
//            redirect('admin/no_access','refresh');
//        }
       
        //----------------End--------------------------------
       //}
	}
}