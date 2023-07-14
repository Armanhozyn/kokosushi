<?php

class Product_Model extends CI_Model
{
    protected $table= 'product';
    protected $categoryTable = 'category';
    protected $attrTable = 'attributes';

    public function getProductInfo($id){
        $this->db->from( $this->table );
        $this->db->where('id',$id);
        $query = $this->db->get();
       // var_dump($query->num_rows()); exit();
        if ($query->num_rows() > 0) {
            //record exists - hence fetch the row
            $result = $query->row();
        }
        else
        {
            $result = 0;
        }
        return $result;
    }

    public function getProductsByCategory($cat_id){
        $this->db->from( $this->table );
        $this->db->where('cat_id',$cat_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCategoryList(){
        $this->db->from( $this->categoryTable );
		$this->db->order_by('`order`,ISNULL(`order`)');
        $query = $this->db->get();
        return $query->result_array();
    }

	public function getDeliveryArea(){
		$this->db->from( "delivery_area" );
        $query = $this->db->get();
        return $query->result_array();
	}
    
    public function getDisplayCode($product_id){
        $this->db->select(array('display_id'));
        $this->db->from( $this->table );
        $this->db->where('id',$product_id);
        $query = $this->db->get();
        return $query->row()->display_id;
    }
    
    public function hasExtraItem($product_id) {
        $this->db->from( $this->attrTable  );
       $this->db->where('product_id',$product_id);
       $query = $this->db->get();
       return $query->num_rows() > 0 ? true: false;
    }
    
    public function getExtras($product_id,$key = null){
        $this->db->from( $this->attrTable );
        $this->db->where('product_id',$product_id);
        if($key != null){
            $this->db->where('attr_key',$key);
        }

        $this->db->where('is_active',1);
        $this->db->order_by("attr_key",'DESC');
        $query= $this->db->get();
        return $query->result_array();
    }
    
    public function getExtraInfo($id){
        $this->db->from( $this->attrTable );
        $this->db->where('attr_id',$id);
        $query= $this->db->get();
        return $query->row();
    }

    public function test(){
        echo "works!";
    }
    


}
