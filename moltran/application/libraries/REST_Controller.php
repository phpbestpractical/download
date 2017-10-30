<?php defined('BASEPATH') or exit('No direct script access allowed');

abstract class REST_Controller extends CI_Controller

{

	public function __construct()

	{

		$this->flag = FALSE;

		parent::__construct();

		$this->load->library('encrypt');
                $this->load->library('Cwupload');
                $this->load->library('upload');

		//$this->load->library('AES');			

		$this->load->model('API/API_model', 'model_name');

		//$api_key = $this->model_name->getSettingData("API_KEY");

		$api_key = "q1fgdfggfw2e2rt3y5u6i8iug4h58f1f";
                
                
                $accessToken = $this->input->post('accessToken');
                $userID = $this->input->post('userID');
                
                if($accessToken != "" && $userID != "")
                {
                    $checkAccessToken = $this->model_name->getUserAccessToken($userID);
                    if(empty($checkAccessToken) || $checkAccessToken['accessToken'] != $accessToken)
                    {
                        $error = array('status' => 'Failed', 'errorcode' => '-13', 'msg' => 'Invalid access token.');
                        echo json_encode($error);
                        exit;
                    }
                }

			 

	    function json($data)

	    {

			if(is_array($data))

		  	{

				return json_encode($data);

		  	}

	    }

		  

	    function jsond($data)

	    {

			return json_decode(stripslashes($data), true);

	    }

		 

		if(isset($_REQUEST['apiKey']))

		{

			$param = $_REQUEST;

			$apiKey = $param['apiKey'];

		

			if(!empty($apiKey))

			{

				if($apiKey == $api_key)

				{

					$this->flag=true;

				}

				else

				{

					$error =  array('status'=>'Failed','errorcode'=>'-101','msg'=>'API key not match');	

					print_r(json($error));

					exit;

				}		

			}

			else

			{

				$error =  array('status'=>'Failed','errorcode'=>'-100','msg'=>'API key is Blank');	

				print_r(json($error));

				exit;

			}

		}

		else

		{
                        //$this->flag=true;
			$error =  array('status'=>'Failed','errorcode'=>'-10','msg'=>'APIKEY IS MISSING...Required Parameter Missing');

			print_r(json($error));

			exit;

		}

	}

	

	public function genRandomToken()
	{

		global $DBH;

		$acess_token = substr(str_shuffle(MD5(microtime())), 0, 5);

		$checkDevice =  $this->db->get_where('tbl_devices', array('accessToken' => $acess_token));

		//$checkDevice = Device::model()->findByAttributes(array('varAccessToken' => $acess_token));

		if(!empty($checkDevice))

		{

			$acessToken = substr(str_shuffle(MD5(microtime())), 0, 5);

		}

		else

		{	$acessToken = $acess_token;	
		}

		return $acessToken;

	 }

	 

	 public function generateAccessToken($intUdId,$accessToken)

     {  
	 	//$headers = apache_request_headers();

			

		if(!empty($accessToken))

		{

			$currentDate = date('Y-m-d H:i:s');	// current date

					

			if(!empty($intUdId)) 

			{

				$deviceModelData =  $this->db->get_where('tbl_devices', array('intUdId' => $intUdId));

				$deviceModelDataArr = $deviceModelData->row_array();

				

				if(!empty($deviceModelDataArr))

				{ 

					$intDeviceId = $deviceModelDataArr['deviceID'];	

					$access_TokenNew = $deviceModelDataArr['accessToken'];

					$dateDb = $deviceModelDataArr['createdOn'];

					if($access_TokenNew == $accessToken)

					{

						$twoHourDiff = strtotime("+2 hour", strtotime($dateDb));

						$afterTwoHourDate = date("Y-m-d H:i:s",$twoHourDiff); 

						

						if( $currentDate >= $afterTwoHourDate ) 

						{ 	 

							$updateDevice = $this->db->get_where('tbl_devices', array('deviceID' => $intDeviceId));

							$updateDeviceArr = $updateDevice->row_array();



							$token 	= $this->genRandomToken();

							 

							$updateDeviceArr['createdOn'] = $currentDate;

							$updateDeviceArr['accessToken'] = $token;

							

							$updateData = $this->db->update('tbl_devices', $updateDeviceArr, array('deviceID'=>$intDeviceId));

							

							if($updateData === TRUE)

							{ 

								return $token;

							}

							else

							{

								return '';

							}	

						} 

						else

						{

							return $accessToken;    

						}

					}

					else

					{

						return '';

					}

				}

				else

				{  

					$error =  array('status'=>'Failed','errorcode'=>'-11','msg'=>'Required Parameter Missing');	

					print_r(json($error));

				}// no data of this udid in device

			}

			else

			{

				$error =  array('status'=>'Failed','errorcode'=>'-11','msg'=>'Required Parameter Missing');	

				print_r(json($error));

			}// User id Missing

		}

		else

		{

			$error =  array('status'=>'Failed','errorcode'=>'-11','msg'=>'Access Token missing from header');	

			print_r(json($error));

				

		}// Access Token Parameter missing...

		//return $error;

	} 

	 

	 public static function genAccessToken($intUdId)

     { 

	 	$headers = apache_request_headers();

			

		if(!empty($headers['accessTokenNew']))

		{

			$accessTokenNew = $headers['accessTokenNew'];// Header accessToken

			$currentDate	= date('Y-m-d H:i:s');// current date

					

			if(!empty($intUdId)) 

			{

				$deviceModelData =  $this->db->get_where('tbl_devices', array('intUdId' => $intUdId));

				$deviceModelDataArr = $deviceModelData->row_array();

				if(!empty($deviceModelDataArr))

				{ 

					$intDeviceId = $deviceModelDataArr['deviceID'];	

					$access_TokenNew = $deviceModelDataArr['accessToken'];

					$dateDb = $deviceModelDataArr['createdOn'];

					if($access_TokenNew == $accessTokenNew)

					{ 

						$twoHourDiff = strtotime("+2 hour", strtotime($dateDb));

						$afterTwoHourDate = date("Y-m-d H:i:s",$twoHourDiff); 

						

						if( $currentDate >= $afterTwoHourDate ) 

						{ 	 

							$updateDevice = $this->db->get_where('tbl_devices', array('deviceID' => $intDeviceId));

							$updateDeviceArr = $updateDevice->row_array();

							$token 	= $this->genRandomToken();

							 

							$updateDeviceArr['createdOn'] = $currentDate;

							$updateDeviceArr['accessToken'] = $token;

							

							$updateData = $this->db->update('tbl_devices', $updateDeviceArr, array('deviceID'=>$intDeviceId));

							

							if($updateData === FALSE)

							{ 

								$error =  array('status'=>'Failed','errorcode'=>'-2','msg'=>'New accesstoken generate failed after accesstoken Expired');	

								print_r(json($error));

							}

							else

							{

								$error = array('status'=>'True','errorcode'=>'-1','msg'=>'Access Token Expired','RandomToken' => $token);					

								print_r(json($error));

							}	

						} 

						else

						{    

							$error = array('status'=>'True','errorcode'=>'-1','msg'=>'Accesstoken not Expired','RandomToken' => $accessTokenNew);					

							print_r(json($error));

						}

					}

					else

					{ 

						//To delete usre from tbl_device if user accesstoken not matche

							 

						$DeleteDevice =  $this->db->get_where('tbl_devices', array('deviceID' => $intDeviceId));

						$DeleteDeviceArr = $DeleteDevice->row_array();

						if(!empty($DeleteDeviceArr))

						{

							$this->db->delete('tbl_devices',array('deviceID'=>$intDeviceId));

							$error =  array('status'=>'Failed','errorcode'=>'-1','msg'=>'Please LogIn again..');											 											 							print_r(json($error));			

						}

						else

						{	

							$this->db->delete('tbl_devices',array('deviceID'=>$intDeviceId));

							$error =  array('status'=>'Failed','errorcode'=>'-1','msg'=>'Please LogIn again..');

							print_r(json($error));

						} 

					}// Please login again and delete user

				}

				else

				{  

					$error =  array('status'=>'Failed','errorcode'=>'-11','msg'=>'No data Found for this UDID');	

					print_r(json($error));

				}// no data of this udid in device

			}

			else

			{

				$error =  array('status'=>'Failed','errorcode'=>'-11','msg'=>'UDID - Required Parameter Missing');	

				print_r(json($error));

			}// User id Missing

		}

		else

		{

			$error =  array('status'=>'Failed','errorcode'=>'-11','msg'=>'Access Token missing from header');	

			print_r(json($error));

				

		}// Access Token Parameter missing...

		return $error;

	} 

}
