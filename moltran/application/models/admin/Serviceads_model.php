<?php
class Serviceads_model extends CI_Model {
    
	public function getService()
    {
		$this->db->from('fl_service');
		$this->db->order_by('ServiceID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	
	function getAccountNameById($id)
	{
		$this->db->select('AccountID,AccountName');
		$this->db->from('fl_account');
		$this->db->where('AccountID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function getAdsNameById($id)
	{
		$this->db->select('AdsTypeID,Name');
		$this->db->from('fl_adstype');
		$this->db->where('AdsTypeID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	
	function getAccount()
	{
		$this->db->from('fl_account');		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			$accArr = array();
			$accArr[0] = 'Select Account';
			foreach($post as $val)
			{
				$accArr[''.$val['AccountID'].''] = $val['AccountName'];
			}
			
			return $accArr;
		}
		return false;
	}
	function getServiceById($id){
		$this->db->from('fl_service');	
		$this->db->where('ServiceID',$id);		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			$serviceArr = array();
			
			foreach($post as $val)
			{
				$serviceArr[''.$val['ServiceID'].''] = $val['ServiceName'];
			}
			
			return $serviceArr;
		}
		return false;
	}
	function getServiceByAccountId($id){
		$this->db->from('fl_service');	
		$this->db->where('AccountID',$id);		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{
			$serviceArr = array();
			
			foreach($post as $val)
			{
				$serviceArr[''.$val['ServiceID'].''] = $val['ServiceName'];
			}
			
			return $serviceArr;
		}
		return false;
	}
	
	function getAdsType()
	{
		$this->db->select('*');
		$this->db->from('fl_adstype');		
		$post = $this->db->get()->result_array();	
		if(count($post))
		{
			$adsArr = array();
			$adsArr[0] = 'Select Ads Type';
			foreach($post as $val)
			{
				$adsArr[''.$val['AdsTypeID'].''] = $val['Name'];
			}
			
			return $adsArr;
		}
		return false;
	}
	
	function getCatebyId($id)
	{
		$this->db->from('fl_service');
		$this->db->where('ServiceID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateServiceAdsById($id,$data)
	{
		return $this->db->update('fl_serviceadsdetail', $data,array('ServiceAdsDetailID'=>$id));	
	}
	function getServiceAdsById($accountid,$adsid,$devicetypeid,$aptypeid,$ServiceID)
	{
		$this->db->select('*');
		$this->db->from('fl_serviceadsdetail');
		$this->db->where('AccountID',$accountid);	
		$this->db->where('AdsTypeID',$adsid);
		$this->db->where('DeviceTypeID',$devicetypeid);
		$this->db->where('AppTypeID',$aptypeid);
		//if(!empty($ServiceID)){
		$this->db->where('ServiceID',$ServiceID);
		//}
		$post = $this->db->get()->result_array();	
		if(count($post))
		{			
			return $post;
		}
		return false;
	}
	public function addServiceAdsDetails($data){
		
		$this->db->insert('fl_serviceadsdetail',$data);
		return $this->db->insert_id();
	}
	public function getServiceNameById($id)
	{
		$this->db->from('fl_service');	
		$this->db->where('ServiceID',$id);
		$this->db->limit(1);		
		$query = $this->db->get();	
		$post =  $query->result_array(); 	
		if(count($post))
		{			
			return $post;
		}
		return false;
	}
	public function deleteServiceAdsById($id)
	{
		$this->db->where('ServiceAdsDetailID',$id);
		$this->db->delete('fl_serviceadsdetail');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
}
