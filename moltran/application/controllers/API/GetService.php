<?php
error_reporting(0);
class GetService extends CI_Controller 
{
	public function __construct()
	{

		parent::__construct();

		$this->load->model('API/API_model', 'model_name');


	}	 	
	function index()
	{
		$packagename = $this->input->post('packageName');
		$StoreId = $this->input->post('StoreId');
		$AppType = $this->input->post('AppType');
		$deviceType = $this->input->post('deviceType');
		
		
		$serviceAdsDetailsData = $this->model_name->getAllServiceAdsDetails();
		
		if(!empty($serviceAdsDetailsData))
		{						
			foreach($serviceAdsDetailsData as $sval)
			{
				$serviceid = $sval['ServiceID'];
				$servicedata = $this->model_name->getServiceById($serviceid);
				$a['PackageName'] = !empty($servicedata[0]['PackageName'])?$servicedata[0]['PackageName']:'';
				$a['Name'] = !empty($servicedata[0]['ServiceName'])?$servicedata[0]['ServiceName']:'';
				if(!empty($servicedata[0]['LogoImage']))
				{
					$LogoURL = $servicedata[0]['LogoImage'];				
					$a['LogoURL'] = base_url().'/uploads/'.$LogoURL;
				}
				else{
					$a['LogoURL'] = '';
				}
				if(!empty($servicedata[0]['BannerImage']))
				{
					$BannerImageURL = $servicedata[0]['BannerImage'];				
					$a['BannerImageURL'] = base_url().'/uploads/'.$BannerImageURL;
				}
				else{
					$a['BannerImageURL'] = '';
				}
				if(!empty($servicedata[0]['BannerAdImage']))
				{
					$BannerAdImage = $servicedata[0]['BannerAdImage'];				
					$a['BannerAdImage'] = base_url().'/uploads/'.$BannerAdImage;
				}
				else{
					$a['BannerAdImage'] = '';
				}				
				
				$a['OrderBy'] = $sval['OrderBy'];
				$a['Seconds'] = $adval['Seconds'];
				
				
				$ad_arr[] = $a; 
			}
		}
		else{
			$ad_arr[] = array();
		}
		
		if(!empty($ad_arr))
		{
			$success = array('status'=>'True','errorcode'=>'1','msg'=>'record display successfully.','Service'=> $ad_arr);	
			echo json_encode($success);
			exit;
		}	
		else
		{
			$error = array('status'=>'Failed','errorcode'=>'-1','msg'=>'No record Found. please try again!');	
			echo json_encode($error);
			exit;
		}		
		
		
			
		
	}	
}
?>
