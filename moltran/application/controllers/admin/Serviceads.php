<?php
error_reporting(1);
class Serviceads extends CI_Controller {

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
		
		$this->load->model('admin/serviceads_model');
	}
	public function index(){
		
		$memberdata['data'] = $this->serviceads_model->getService();
		
		$memberdata['accountdata'] = $this->serviceads_model->getAccount();
		$memberdata['adsdata'] = $this->serviceads_model->getAdsType();
		$memberdata['main_content'] = 'admin/serviceads/list';
		$memberdata['servicearr'] = '';
        $this->load->view('includes/template', $memberdata);  	  			    
	}
	public function service(){
		
		
		$accountid = $this->input->post('accountid');
		$adsid = $this->input->post('adsid');
		$devicetype = $this->input->post('devicetype');		
		$serviceid = $this->input->post('serviceId');
		$aptype = $this->input->post('aptype');
		$servicedata = $this->serviceads_model->getServiceAdsById($accountid,$adsid,$devicetype,$aptype,$serviceid);
		echo $this->db->last_query();
		if(!empty($servicedata)){
			$accountdata = $this->serviceads_model->getAccountNameById($accountid);
			$adsdata = $this->serviceads_model->getAdsNameById($adsid);		
			$serviceArr = $this->serviceads_model->getServiceNameById($serviceid);		
			if($devicetype == '1')
			{
				$devicename = 'Android';
			}
			else{
				$devicename = 'iOS';
			}
			if($aptype == 1)
			{
				$appname = 'Game';
			}else{
				$appname = 'Other';
			}
			if($adsid == '1')
			{	
				$userarr = array(
				'ServiceName' => $serviceArr[0]['ServiceName'],		
				'AdsType' =>  $adsdata[0]['Name'],
				'deviceType' =>  $devicename,
				'appType' =>  $appname,
				'adsid' => '1',
				'id' => $servicedata[0]['ServiceAdsDetailID'],				
				);
			}
			if($adsid == '2')
			{
				$userarr = array(
				'ServiceName' => $serviceArr[0]['ServiceName'],		
				'AdsType' =>  $adsdata[0]['Name'],
				'deviceType' =>  $devicename,
				'appType' =>  $appname,
				'OrderBy' => $servicedata[0]['OrderBy'],
				'Seconds' => $servicedata[0]['Seconds'],
				'adsid' => '2',
				'id' => $servicedata[0]['ServiceAdsDetailID'],
				);
			}
			if($adsid == '3')
			{
				$userarr = array(
				'ServiceName' => $serviceArr[0]['ServiceName'],	
				'AdsType' =>  $adsdata[0]['Name'],
				'deviceType' =>  $devicename,
				'appType' =>  $appname,
				'OrderBy' => $servicedata[0]['OrderBy'],			
				'adsid' => '3',
				'id' => $servicedata[0]['ServiceAdsDetailID'],
				);
			}
			$data['htmldata'] = $userarr;
		}
		else{
			$data['htmldata'] = '';
		}
		$data['adsid'] = $adsid;
		
		$html = $this->load->view('admin/temp', $data);
		$json_data = array(
			"html" => $html,			
		);
		echo json_encode($json_data);		
	}
	public function getService()
	{
		$AccountID = $this->input->post('accountid');
		$serviceArr = $this->serviceads_model->getServiceByAccountId($AccountID);
		$servarr = form_dropdown('servicearr',$serviceArr,'','class="select2 form-control" id="serviceid" onchange="return getData();"');
		echo $servarr;
	}
    public function add(){
		
		$data['title'] = 'Add Service';
		//load the view		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			$DeviceTypeID = $this->input->post('devicetype');
			$AppTypeID = $this->input->post('apptype');
			$ServiceID = $this->input->post('servicearr');
			$AccountID = $this->input->post('AccountID');			
			$AdsTypeID = $this->input->post('AdsID');
			$ServiceID = !empty($ServiceID)?$ServiceID:'';
			$serviceAdsData = $this->serviceads_model->getServiceAdsById($AccountID,$AdsTypeID,$DeviceTypeID,$AppTypeID,$ServiceID);			
			if(empty($serviceAdsData))
			{
				$data_to_store = array(				
					'DeviceTypeID' => $DeviceTypeID,
					'AppTypeID' => $AppTypeID,	
					'ServiceID' => $ServiceID,
					'AccountID' => $AccountID,				
					'AdsTypeID' => $AdsTypeID,				
					'IsActive' => '1',				
					'CreatedDate' => date('Y-m-d H:i:s'),	
				);			
				$qry = $this->serviceads_model->addServiceAdsDetails($data_to_store);			
				$this->session->set_flashdata('flash_success_msg','Serviceads add Successfully');
			}
			redirect('admin/serviceads');	
		}	
		
	}
	public function delete($id)
	{
		$this->serviceads_model->deleteServiceAdsById($id);
		$this->session->set_flashdata('flash_success_msg','ServiceAds deleted Successfully');
		redirect('admin/serviceads');	
	}
	public function updateOrder($id)
	{
		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
		$dataUpdate = array(
		'OrderBy' => $this->input->post('order'),
		'Seconds' => $this->input->post('second'),
		);	
		$this->serviceads_model->updateServiceAdsById($id,$dataUpdate);
		$this->session->set_flashdata('flash_success_msg','ServiceAds order update Successfully');
		redirect('admin/serviceads');	
		}
		$memberdata['id'] = $id;
		$memberdata['main_content'] = 'admin/serviceads/update';		
        $this->load->view('includes/template', $memberdata);  
	}
	public function updateorderlist($id)
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
		$dataUpdate = array(
		
		'OrderBy' => $this->input->post('order'),
		);	
		$this->serviceads_model->updateServiceAdsById($id,$dataUpdate);
		$this->session->set_flashdata('flash_success_msg','ServiceAds order update Successfully');
		redirect('admin/serviceads');	
		}
		$memberdata['id'] = $id;
		$memberdata['main_content'] = 'admin/serviceads/updateSec';		
        $this->load->view('includes/template', $memberdata);
	}
}
?>
