<?php
error_reporting(0);
class Account extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */
	public function __construct()
    {
        parent::__construct();
		if($this->session->userdata('is_logged_in')!= 'true')
		{
			redirect('admin');
		}
		$this->load->helper(array('form','url'));
		$this->load->library('upload');		
		
		$this->load->model('admin/account_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->account_model->getAccount();
		$memberdata['main_content'] = 'admin/account/list';
		
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	
    public function add(){
		
		$data['title'] = 'Create Account';
		//load the view		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			$active = $this->input->post('active');
			if(isset($active) && $active == 'on')
			{
				$active = 1;
			}
			else
			{
				$active = 0;
			}
			
			$data_to_store = array(				
				'AccountName' => $this->input->post('name'),
				'Description' => $this->input->post('comment'),
				'IsActive' => $active,	
				'IsDeleted' => 1,							
				'CreatedDate' => date('Y-m-d H:i:s'),	
			);
				
			
			$qry = $this->account_model->addAccount($data_to_store);
			$this->session->set_flashdata('flash_success_msg','Account add Successfully');			
			redirect('admin/account');	
		}	

        $data['main_content'] = 'admin/account/add';
        $this->load->view('includes/template', $data);  
	}
	public function edit($id){
		$data['title'] = 'Edit Account';
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			$active = $this->input->post('active');
			if(isset($active) && $active == '1')
			{
				$active = 1;
			}
			else
			{
				$active = 0;
			}
			
			$data_to_store = array(				
				'AccountName' => $this->input->post('name'),
				'Description' => $this->input->post('comment'),
				'IsActive' => $active,	
				'IsDeleted' => 1,							
				'ModifiedDate' => date('Y-m-d H:i:s'),	
			);
			
			$this->account_model->updateAccount($data_to_store,$id);			
			$this->session->set_flashdata('flash_success_msg','Account update Successfully');	
			redirect('admin/account');	
		}	
		$data['data'] = $this->account_model->getAccountbyId($id);
		$data['id'] = $id;
		$data['main_content'] = 'admin/account/edit';		
		$this->load->view('includes/template', $data);    
	} 
	
	/*
    * Delete by his id
    * @return void
    */
    public function delete($id)
    {		
		$result = $this->account_model->deleteAccount($id);
		if($result)
			$this->session->set_flashdata('flash_success_msg', 'DeleteSuccess');
		else
			$this->session->set_flashdata('flash_error_msg', 'DeleteFailed');
		redirect('admin/account');		
	}
}
?>
