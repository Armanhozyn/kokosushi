<?php
class Shopping_cart_model extends CI_Model
{
    function fetch_all()
    {
        $query = $this->db->get("product");
        return $query->result();
    }
    
    public function get_option_names($row_id) {
        $extra_names =  array();
        if( $this->cart->has_options($row_id) === TRUE){
            
            foreach ($this->cart->product_options($row_id) as $option_name => $option_value) {
               // var_dump($option_name);
                if($option_name == 'extra'){
                    $extra_names[] = $option_value->attr_value;
                }

            }
        }
        return implode(', ', $extra_names);
    }

    public function get_note($row_id) {
        $extra_names =  array();
        if( $this->cart->has_options($row_id) === TRUE){

            foreach ($this->cart->product_options($row_id) as $option_name => $option_value) {
                // var_dump($option_name);
                if($option_name == 'note'){
                    $extra_names[] = $option_value;
                }

            }
        }
        return implode(', ', $extra_names);
    }
}
