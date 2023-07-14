<?php
class Setting_Model extends CI_Model{
    protected $settingTable = 'settings';

   public function getSettingListKeyValuePair(){
       $this->db->select(array('id','name'));
       $this->db->from( $this->settingTable );
       $this->db->where('status',1);
	  // $this->db->order_by('`order`,ISNULL(`order`)');
       $query = $this->db->get();
       return $query->result_array();
   }

    public function getSettingList( $limit = null, $start = null ){
        $this->db->from( $this->settingTable );
        // $this->db->where('status',-1);
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function countSettingList(){
        // $this->db->where('status',-1);
        return $this->db->count_all( $this->settingTable );
    }


    public function addSetting($data){
        return $this->db->insert( $this->settingTable , $data);
    }



    public function updateSetting($data,$id){
        $this->db->where('id', $id);
        return $this->db->update( $this->settingTable, $data);
    }


    public function getSettingName($id){
        $this->db->select(array('name'));
        $this->db->from( $this->settingTable );
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row()->name;
    }


    public function getSettingInfo($id){
        $this->db->from( $this->settingTable );
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

	public function get($setting_name){
   		$this->db->select(array('value'));
		$this->db->from( $this->settingTable );
		$this->db->where('name', $setting_name);
		$query = $this->db->get();
		return $query->row()->value;
	}

    public function deleteSetting($id){

        $this->db->where('id', $id);
        return $this->db->delete( $this->settingTable );
    }

}
