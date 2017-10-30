<?php
error_reporting(0);
class Service extends CI_Controller {

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
		
		$this->load->model('admin/service_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->service_model->getService();
		
		
		$memberdata['main_content'] = 'admin/service/list';
		
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	
    public function add(){
		
		$data['title'] = 'Create Service';
		//load the view		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			$categoryid = $this->input->post('CategoryId');
			$AccountID = $this->input->post('AccountID');	
			
			$ServiceName = $this->input->post('name');
			$DeviceType = $this->input->post('devicetype');
			$AppTypeID = $this->input->post('apptype');
			$PackageName = $this->input->post('packagename');
			$MessageText = $this->input->post('comment');
			
			$AccountId = $this->input->post('AccountId');
			
			$PlayStoreImageURL = $this->input->post('url');
					
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
				'ServiceName' => $ServiceName,
				'DeviceType' => $DeviceType,
				'AppTypeID' => $AppTypeID,
				'AccountID' => $AccountId, 	
				'PackageName' => $PackageName,
				'MessageText' => $MessageText,				
				'PlayStoreImageURL' => $PlayStoreImageURL,
				'IsActive' => $active,				
				'CreatedDate' => date('Y-m-d H:i:s'),	
			);
			
			if(isset($_FILES['logoimg']['name']) && $_FILES['logoimg']['name'] != '' ) 
			{
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/logo/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('logoimg')){
					
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					
					$data_to_store['LogoImage'] = $upload_data['file_name'];												
				}
			}
			else
			{	
				$data_to_store['LogoImage'] = '';
			}
			
			if(isset($_FILES['bannerimg']['name']) && $_FILES['bannerimg']['name'] != '' ) 
			{
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('bannerimg')){
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					$data_to_store['BannerImage'] = $upload_data['file_name'];												
				}
			}
			else
			{
				$data_to_store['BannerImage'] = '';
			}
			if(isset($_FILES['banneradimg']['name']) && $_FILES['banneradimg']['name'] != '' ) 
			{
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('banneradimg')){
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					$data_to_store['BannerAdImage'] = $upload_data['file_name'];												
				}
			}
			else
			{
				$data_to_store['BannerAdImage'] = '';
			}
			if(isset($_FILES['fulladimg']['name']) && $_FILES['fulladimg']['name'] != '' ) 
			{
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('fulladimg')){
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					$data_to_store['FullAdImage'] = $upload_data['file_name'];												
				}
			}
			else
			{
				$data_to_store['FullAdImage'] = '';
			}

			$qry = $this->service_model->addService($data_to_store);
			
			$cateidArr = array();
			foreach($categoryid as $catval)
			{
				$cate['CategoryID'] = $catval;
				$cate['ServiceID'] = $qry; 
				$cate['IsActive'] = '1';				
				$cate['CreatedDate'] = date('Y-m-d H:i:s');				
				$cateidArr[] = $cate;
			}
			$AccountArr = array();
			foreach($AccountID as $accval)
			{
				$acc['AccountID'] = $accval;
				$acc['ServiceID'] = $qry; 
				$acc['IsActive'] = '1';				
				$acc['CreatedDate'] = date('Y-m-d H:i:s');				
				$AccountArr[] = $acc;
			}			
			$this->db->insert_batch('fl_servicecategory',$cateidArr);
			$this->db->insert_batch('fl_serviceaccounttype',$AccountArr);
			
			$this->session->set_flashdata('flash_success_msg','service add Successfully');	
			redirect('admin/service');	
		}	
		$data['accountDrp'] = $this->service_model->getAccount();
		$data['categoryDrp'] = $this->service_model->getCategory();
        $data['main_content'] = 'admin/service/add';
        $this->load->view('includes/template', $data);  
	}
	public function edit($id){
		
		$data['title'] = 'Edit Service';
		//load the view	
		$serviceData = $this->service_model->getServiceById($id);
		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			/*echo "<pre>";
			print_r($_FILES);
			print_r($_POST);exit;*/
			
			$categoryid = $this->input->post('CategoryId');
			$AccountID = $this->input->post('AccountID');	

			$AccountId = $this->input->post('AccountId');
			
			$ServiceName = $this->input->post('name');
			$DeviceType = $this->input->post('devicetype');
			$AppTypeID = $this->input->post('apptype');
			$PackageName = $this->input->post('packagename');
			$MessageText = $this->input->post('comment');			
			$PlayStoreImageURL = $this->input->post('url');
						
			$categoryid = $this->input->post('categoryid');
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
				'ServiceName' => $ServiceName,
				'DeviceType' => $DeviceType,
				'AppTypeID' => $AppTypeID,	
				'PackageName' => $PackageName,
				'MessageText' => $MessageText,				
				'PlayStoreImageURL' => $PlayStoreImageURL,
				'AccountID' => $AccountId,
				'IsActive' => $active,				
				'CreatedDate' => date('Y-m-d H:i:s'),	
			);
			$oldLogoImage = $serviceData[0]['LogoImage'];
			$oldBannerImage = $serviceData[0]['BannerImage'];
			$oldBannerAdImage = $serviceData[0]['BannerAdImage'];
			$oldFullAdImage = $serviceData[0]['FullAdImage'];
			if(isset($_FILES['logoimg']['name']) && $_FILES['logoimg']['name'] != '' ) 
			{
				if(file_exists('./uploads/logo/'.$oldLogoImage))
				{
					unlink('./uploads/logo/'.$oldLogoImage);
				}
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/logo/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('logoimg')){
					
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					
					$data_to_store['LogoImage'] = $upload_data['file_name'];												
				}
			}
			else
			{	
				$data_to_store['LogoImage'] = $oldLogoImage;
			}
			
			if(isset($_FILES['bannerimg']['name']) && $_FILES['bannerimg']['name'] != '' ) 
			{
				if(file_exists('./uploads/'.$oldBannerImage))
				{
					unlink('./uploads/'.$oldBannerImage);
				}
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('bannerimg')){
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					$data_to_store['BannerImage'] = $upload_data['file_name'];												
				}
			}
			else
			{
				$data_to_store['BannerImage'] = $oldBannerImage;
			}
			if(isset($_FILES['banneradimg']['name']) && $_FILES['banneradimg']['name'] != '' ) 
			{
				if(file_exists('./uploads/'.$oldBannerAdImage))
				{
					unlink('./uploads/'.$oldBannerAdImage);
				}
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('banneradimg')){
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					$data_to_store['BannerAdImage'] = $upload_data['file_name'];												
				}
			}
			else
			{
				$data_to_store['BannerAdImage'] = $oldBannerAdImage;
			}
			if(isset($_FILES['fulladimg']['name']) && $_FILES['fulladimg']['name'] != '' ) 
			{
				if(file_exists('./uploads/'.$oldFullAdImage))
				{
					unlink('./uploads/'.$oldFullAdImage);
				}
				$upload_conf = array(
				'upload_path'   => realpath('./uploads/'),
				'allowed_types' => 'gif|jpg|jpeg|png',
				'max_size'      => '30000',
				'encrypt_name'  => true,
				);		
				$this->upload->initialize( $upload_conf );
				$field_name = 'LogoImage';
				
				if ( !$this->upload->do_upload('fulladimg')){
					$error['upload']= $this->upload->display_errors();				
				}else{
					$upload_data = $this->upload->data();
					$data_to_store['FullAdImage'] = $upload_data['file_name'];												
				}
			}
			else
			{
				$data_to_store['FullAdImage'] = $oldFullAdImage;
			}

			$qry = $this->service_model->updateService($data_to_store,$id);
			
			$this->service_model->deleteCategoryById($id);
			$this->service_model->deleteAccountById($id);
			$cateidArr = array();
			foreach($categoryid as $catval)
			{					
				$cate['CategoryID'] = $catval;
				$cate['ServiceID'] = $id; 
				$cate['IsActive'] = '1';				
				$cate['CreatedDate'] = date('Y-m-d H:i:s');				
				$cateidArr[] = $cate;
			
			}
			$AccountArr = array();
			foreach($AccountID as $accval)
			{
				
				$acc['AccountID'] = $accval;
				$acc['ServiceID'] = $id; 
				$acc['IsActive'] = '1';				
				$acc['CreatedDate'] = date('Y-m-d H:i:s');				
				$AccountArr[] = $acc;
				
			}		
				
			$this->db->insert_batch('fl_servicecategory',$cateidArr);
			$this->db->insert_batch('fl_serviceaccounttype',$AccountArr);	
			
			
			
			
			$this->session->set_flashdata('flash_success_msg','Service update Successfully');			
			redirect('admin/service');	
		}	
		$data['serviceData'] = $this->service_model->getServiceById($id);
		$data['accountDrp'] = $this->service_model->getAccount();
		$data['categoryDrp'] = $this->service_model->getCategory();
		$data['categorySelected'] = $this->service_model->getCategoryDrpByServiceId($id);
		$data['accountSelected'] = $this->service_model->getAccountDrpByServiceId($id);
		
		$data['selected'] = $serviceData[0]['AccountID'];
		$data['id'] = $id;
        $data['main_content'] = 'admin/service/edit';
        $this->load->view('includes/template', $data);  
	}
	public function delete($id){
		$serviceData = $this->service_model->getServiceById($id);
		$oldLogoImage = $serviceData[0]['LogoImage'];
		$oldBannerImage = $serviceData[0]['BannerImage'];
		$oldBannerAdImage = $serviceData[0]['BannerAdImage'];
		$oldFullAdImage = $serviceData[0]['FullAdImage'];
		if(file_exists('./uploads/'.$oldBannerImage))
		{
			unlink('./uploads/'.$oldBannerImage);
		}
		if(file_exists('./uploads/'.$oldFullAdImage))
		{
			unlink('./uploads/'.$oldFullAdImage);
		}
		if(file_exists('./uploads/logo/'.$oldLogoImage))
		{
			unlink('./uploads/logo/'.$oldLogoImage);
		}
		if(file_exists('./uploads/'.$oldBannerAdImage))
		{
			unlink('./uploads/'.$oldBannerAdImage);
		}
		$this->service_model->deleteServiceById($id);
		$this->session->set_flashdata('flash_success_msg','Service deleted Successfully');
		redirect('admin/service');	
	}
}
?>
