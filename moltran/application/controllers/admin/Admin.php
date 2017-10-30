<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();        
        
        $this->load->model('admin/users_model', 'ci_model');
        
        $this->load->helper(array('form', 'url'));
    }

    function index() {
		
		$this->session->userdata('is_logged_in') ? redirect('admin/dashboard') : $this->load->view('admin/login');
		
    }
/**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
        return md5($password);
    }	
    function validate_credentials() {
		
        
        $userName = $this->input->post('email');
		$password = $this->__encrip_password($this->input->post('password'));
		
		$is_valid = $this->ci_model->validate($userName, $password);
		
		//$remember_me = $this->input->post('remember_me');
		if( !empty($userName) && !empty($password) )
		{	
			 if (!empty($is_valid)) {
				
				$userid = $this->ci_model->user_by_user_name($userName);
				
				$data = array(
					'username' => $userid[0]['Username'],
					'id' => $userid[0]['PersonID'],										
					'is_logged_in' => true
				);
				
				$this->session->set_userdata($data);
						
				if($this->session->userdata('redirecturl')!=""){
					
					redirect('admin');
				}else{		
					
					//redirect('admin/profile');
					
					redirect('admin/dashboard');
				}
			}else{ // incorrect username or password
				$this->session->set_flashdata('flash_errorlogin_msg','Incorrect username or password');	
				$data['message_error'] = 'wrong';
				redirect('admin');
			}
		}
		else
		{
			$this->session->set_flashdata('flash_errorlogin_msg','Please enter username and password');		
			$data['message_error'] = 'blank';
			$this->load->view('admin/', $data);
		}
    }
    function register(){
		
        //$data['main_content'] = 'admin/register';
		if($this->input->server('REQUEST_METHOD') === 'POST')
		{			
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->__encrip_password($this->input->post('password'));			
			
			$udId = rand('1000','9999');
			
			$data_to_store = array(				
				'Email' => $email,
				'Username' => $username,
				'PasswordHash' => $password,	
				'PersonGUID' => $udId,						
				'CreatedDate' => date('Y-m-d H:i:s'),	
			);
			$qry = $this->ci_model->addUser($data_to_store);			
			
			redirect('admin');	
		}			
        $this->load->view('admin/register');
	} 
    function profile() {
        $data['page_title'] = 'Update Profile' . " | " . SITE_NAME;

        if (!$this->session->userdata('is_logged_in')) {
            redirect('admin');
        }

        $data['profile'] = $this->ci_model->get_admin_by_id($this->session->userdata('userID'));
        $data['main_content'] = 'admin/profile';
        $this->load->view('includes/template', $data);
    }

    public function update() {
        $data['page_title'] = 'Update Profile' . " | " . SITE_NAME;

        if (!$this->session->userdata('is_logged_in')) {
            redirect('admin');
        }

        $adminID = $this->session->userdata('userID');

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $OldPassword = $this->input->post('OldPassword');

            if ($this->ci_model->checkOldPass($OldPassword, $adminID)) {
                $data_to_store = array(
                    'first_name' => $this->input->post('FirstName'),
                    'last_name' => $this->input->post('LastName'),
                    'password' => sha1($this->input->post('Password'))
                );

                if ($this->ci_model->update_user('id', $adminID, $data_to_store, 'user') == TRUE) {
                    $data['message_error'] = 'True';
                } else {
                    $data['message_error'] = 'Wrong';
                }
            } else {
                $data['message_error'] = 'oldWrong';
            }
        }
        $data['profile'] = $this->ci_model->get_admin_by_id($adminID);
        $data['main_content'] = 'admin/profile';
        $this->load->view('includes/template', $data);
    }

   function logout(){
		
		$array_items = array('userName' => '', 'id' => '', 'is_logged_in' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('admin');
	}

}
