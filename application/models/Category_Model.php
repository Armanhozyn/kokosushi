<?php
class Category_Model extends CI_Model{
    protected $categoryTable = 'category';

   public function getCategoryListKeyValuePair(){
       $this->db->select(array('cat_id','cat_name'));
       $this->db->from( $this->categoryTable );
       $this->db->where('status',1);
       $this->db->order_by('cat_id','ASC');
       $query = $this->db->get();
       return $query->result_array();
   }

    public function getCategoryList( $limit = null, $start = null ){
        $this->db->from( $this->categoryTable );
        // $this->db->where('status',-1);
        $this->db->order_by('cat_id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function countCategoryList(){
        // $this->db->where('status',-1);
        return $this->db->count_all( $this->categoryTable );
    }


    public function addCategory($data){
        return $this->db->insert( $this->categoryTable , $data);
    }



    public function updateCategory($data,$id){
        $this->db->where('cat_id', $id);
        return $this->db->update( $this->categoryTable, $data);
    }


    public function getCategoryName($id){
        $this->db->select(array('cat_name'));
        $this->db->from( $this->categoryTable );
        $this->db->where('cat_id', $id);
        $query = $this->db->get();
        return $query->row()->cat_name;
    }


    public function getCategoryInfo($id){
        $this->db->from( $this->categoryTable );
        $this->db->where('cat_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function deleteCategory($id){

        $this->db->where('cat_id', $id);
        return $this->db->delete( $this->categoryTable );
    }

}
