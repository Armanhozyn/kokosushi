<?php

/**
 * Created by PhpStorm.
 * User: Touhid
 * Date: 5/10/2020
 * Time: 1:06 AM
 */
class Sauce_Model extends CI_Model
{
protected $sauce_table = 'sauce';

public function get_all(){
$this->db->from( $this->sauce_table );
$this->db->where('is_active', 1);
$query = $this->db->get();
return $query->result();
}

}