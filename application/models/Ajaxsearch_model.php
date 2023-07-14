<?php
class Ajaxsearch_model extends CI_Model
{
    protected $productTable = 'product';

    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from($this->productTable);
        if ($query != '') {
            $this->db->like('name', $query);
           // $this->db->or_like('details', $query);

            $this->db->order_by('id', 'DESC');
            return $this->db->get();
        }
    }

}
?>