<?php
class Products_Model extends CI_Model{
    protected $productTable = 'product';

   public function getProductListKeyValuePair(){
       $this->db->select(array('id','name'));
       $this->db->from( $this->productTable );
       $this->db->where('status',1);
       $this->db->order_by('id','ASC');
       $query = $this->db->get();
       return $query->result_array();
   }

    public function getProductList( $limit = null, $start = null ){
        $this->db->from( $this->productTable );
        // $this->db->where('status',-1);
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function countProductList(){
        // $this->db->where('status',-1);
        return $this->db->count_all( $this->productTable );
    }


    public function addProduct($data){
        return $this->db->insert( $this->productTable , $data);
    }



    public function updateProduct($data,$id){
        $this->db->where('id', $id);
        return $this->db->update( $this->productTable, $data);
    }


    public function getProductName($id){
        $this->db->select(array('name'));
        $this->db->from( $this->productTable );
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row()->name;
    }


    public function getProductInfo($id){
        $this->db->from( $this->productTable );
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function deleteProduct($id){

        $this->db->where('id', $id);
        return $this->db->delete( $this->productTable );
    }

}
