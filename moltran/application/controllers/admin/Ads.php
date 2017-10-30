<?php
error_reporting(0);
class Ads extends CI_Controller {

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
		
		$this->load->model('admin/ads_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->ads_model->getAds();
		$memberdata['main_content'] = 'admin/ads/list';
		
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	
    public function add(){
		
		$data['title'] = 'Add Ads';
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
				
			
			$qry = $this->ads_model->addAds($data_to_store);
			$this->session->set_flashdata('flash_success_msg','Ads Type add Successfully');	 	
			redirect('admin/ads');	
		}	

        $data['main_content'] = 'admin/ads/add';
        $this->load->view('includes/template', $data);  
	}
	public function edit($id){
		$data['title'] = 'Edit Ads';
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
			
			$this->ads_model->updateAds($data_to_store,$id);			
			$this->session->set_flashdata('flash_success_msg','Ads Type update Successfully');	 
			redirect('admin/ads');	
		}	
		$data['data'] = $this->ads_model->getAdsbyId($id);
		$data['id'] = $id;
		$data['main_content'] = 'admin/ads/edit';		
		$this->load->view('includes/template', $data);    
	} 
	
	/*
    * Delete by his id
    * @return void
    */
    public function delete($id)
    {		
		$result = $this->ads_model->deleteAds($id);
		if($result)
			$this->session->set_flashdata('flash_success_msg', 'DeleteSuccess');
		else
			$this->session->set_flashdata('flash_error_msg', 'DeleteFailed');
		redirect('admin/ads');		
	}
}
?>
