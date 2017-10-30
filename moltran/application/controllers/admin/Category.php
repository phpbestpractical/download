<?php
error_reporting(0);
class Category extends CI_Controller {

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
		
		$this->load->model('admin/category_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->category_model->getCategory();
		$memberdata['main_content'] = 'admin/category/list';
		
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	
    public function add(){
		
		$data['title'] = 'Create Category';
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
				
			
			$qry = $this->category_model->addCategory($data_to_store);
			$this->session->set_flashdata('flash_success_msg','Category Add Successfully');	 	
			redirect('admin/category');	
		}	

        $data['main_content'] = 'admin/category/add';
        $this->load->view('includes/template', $data);  
	}
	public function edit($id){
		$data['title'] = 'Edit Category';
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
			
			$this->category_model->updateCategory($data_to_store,$id);			
			$this->session->set_flashdata('flash_success_msg','Category update Successfully');	 
			redirect('admin/category');	
		}	
		$data['data'] = $this->category_model->getCatebyId($id);
		$data['id'] = $id;
		$data['main_content'] = 'admin/category/edit';		
		$this->load->view('includes/template', $data);    
	} 
	
	/*
    * Delete by his id
    * @return void
    */
    public function delete($id)
    {		
		$result = $this->category_model->deleteCategory($id);
		if($result)
			$this->session->set_flashdata('flash_success_msg', 'DeleteSuccess');
		else
			$this->session->set_flashdata('flash_error_msg', 'DeleteFailed');
		redirect('admin/category');		
	}
}
?>
