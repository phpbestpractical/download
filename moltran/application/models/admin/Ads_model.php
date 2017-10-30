<?php
class Ads_model extends CI_Model {
    
	public function getAds()
    {
		$this->db->from('fl_adstype');
		$this->db->order_by('AdsTypeID','DESC');
		$query = $this->db->get();	
		return $query->result_array(); 	
    }
	function addAds($data){
		$insert = $this->db->insert('fl_adstype',$data);
		return $this->db->insert_id();
	}
	function deleteAds($id)
	{
		$this->db->where('AdsTypeID',$id);
		$this->db->delete('fl_adstype');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	function getAdsbyId($id)
	{
		$this->db->from('fl_adstype');
		$this->db->where('AdsTypeID',$id);
		$this->db->limit(1);
		
		$query = $this->db->get();	
		return $query->result_array(); 	
	}
	function updateAds($data,$id)
	{
		return $this->db->update('fl_adstype', $data,array('AdsTypeID'=>$id));	
	}	
}
