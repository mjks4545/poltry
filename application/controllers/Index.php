<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if(!$_SESSION['username'] ){
          redirect('c_login');
        }  
    }
    // redirected to my home controller

	public function index()
	{
		 redirect('home');

	}
    
    
}