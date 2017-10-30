<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();        
        if($this->session->userdata('is_logged_in')!= 'true')
		{
			redirect('admin');
		}
       // $this->load->model('admin/dashboard_model', 'ci_model');
        
        $this->load->helper(array('form', 'url'));
    }

    function index() {
		
		$memberdata['main_content'] = 'admin/dashboard';		
        $this->load->view('includes/template', $memberdata);  	  		
    }
}
