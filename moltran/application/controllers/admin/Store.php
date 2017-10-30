<?php
error_reporting(0);
class Store extends CI_Controller {

    /**
    * Check if the user is logged in, if he's not, 
    * send him to the login page
    * @return void
    */
	public function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('is_logged_in'))
		{
			redirect('admin');
		}
		$this->load->helper(array('form','url'));
		$this->load->library('upload');		
		
		$this->load->model('admin/store_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->store_model->getStore();
		$memberdata['main_content'] = 'admin/store/list';
		
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	
    public function add(){
		
		$data['title'] = 'Create Store';
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
				'StoreURL' => $this->input->post('url'),		
				'CreatedDate' => date('Y-m-d H:i:s'),	
			);
				
			
			$qry = $this->store_model->addStore($data_to_store);
			$this->session->set_flashdata('flash_success_msg','Store add Successfully');			
			redirect('admin/store');	
		}	

        $data['main_content'] = 'admin/store/add';
        $this->load->view('includes/template', $data);  
	}
	public function edit($id){
		$data['title'] = 'Edit Store';
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
				'StoreURL' => $this->input->post('url'),		
				'ModifiedDate' => date('Y-m-d H:i:s'),	
			);
			
			$this->store_model->updateStore($data_to_store,$id);			
			$this->session->set_flashdata('flash_success_msg','Store update Successfully');	
			redirect('admin/store');	
		}	
		$data['data'] = $this->store_model->getStorebyId($id);
		$data['id'] = $id;
		$data['main_content'] = 'admin/store/edit';		
		$this->load->view('includes/template', $data);    
	} 
	
	/*
    * Delete by his id
    * @return void
    */
    public function delete($id)
    {		
		$result = $this->store_model->deleteStore($id);
		if($result)
			$this->session->set_flashdata('flash_success_msg', 'DeleteSuccess');
		else
			$this->session->set_flashdata('flash_error_msg', 'DeleteFailed');
		redirect('admin/store');		
	}
}
?>
