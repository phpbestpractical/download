<?php
error_reporting(0);
class Display extends CI_Controller {

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
		
		$this->load->model('admin/display_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->display_model->getDisplay();
		$memberdata['main_content'] = 'admin/display/list';
		
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	
    public function add(){
		
		$data['title'] = 'Create Display';
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
				'Name' => $this->input->post('name'),
				'Description' => $this->input->post('comment'),
				'IsActive' => $active,	
				'IsDeleted' => 1,							
				'CreatedDate' => date('Y-m-d H:i:s'),	
			);
				
			
			$qry = $this->display_model->addDisplay($data_to_store);
			$this->session->set_flashdata('flash_success_msg','Display type add Successfully');	 	
			redirect('admin/display');	
		}	

        $data['main_content'] = 'admin/display/add';
        $this->load->view('includes/template', $data);  
	}
	public function edit($id){
		$data['title'] = 'Edit Display';
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
				'Name' => $this->input->post('name'),
				'Description' => $this->input->post('comment'),
				'IsActive' => $active,	
				'IsDeleted' => 1,							
				'ModifiedDate' => date('Y-m-d H:i:s'),	
			);
			
			$this->display_model->updateDisplay($data_to_store,$id);			
			$this->session->set_flashdata('flash_success_msg','Display type update Successfully');	
			redirect('admin/display');	
		}	
		$data['data'] = $this->display_model->getDisplaybyId($id);
		$data['id'] = $id;
		$data['main_content'] = 'admin/display/edit';		
		$this->load->view('includes/template', $data);    
	} 
	
	/*
    * Delete by his id
    * @return void
    */
    public function delete($id)
    {		
		$result = $this->display_model->deleteDisplay($id);
		if($result)
			$this->session->set_flashdata('flash_success_msg', 'DeleteSuccess');
		else
			$this->session->set_flashdata('flash_error_msg', 'DeleteFailed');
		redirect('admin/display');		
	}
}
?>
