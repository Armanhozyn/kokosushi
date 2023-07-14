<?php
class Ticker_Model extends CI_Model{
    protected $tickerTable = 'tickers';

   public function getTickerListKeyValuePair(){
       $this->db->select(array('id','ticker_text'));
       $this->db->from( $this->tickerTable );
       $this->db->where('status',1);
	   $this->db->order_by('`order`,ISNULL(`order`)');
       $query = $this->db->get();
       return $query->result_array();
   }

    public function getTickerList( $limit = null, $start = null ){
        $this->db->from( $this->tickerTable );
        // $this->db->where('status',-1);
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function countTickerList(){
        // $this->db->where('status',-1);
        return $this->db->count_all( $this->tickerTable );
    }


    public function addTicker($data){
        return $this->db->insert( $this->tickerTable , $data);
    }



    public function updateTicker($data,$id){
        $this->db->where('id', $id);
        return $this->db->update( $this->tickerTable, $data);
    }


    public function getTickerName($id){
        $this->db->select(array('ticker_text'));
        $this->db->from( $this->tickerTable );
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row()->ticker_text;
    }


    public function getTickerInfo($id){
        $this->db->from( $this->tickerTable );
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function deleteTicker($id){

        $this->db->where('id', $id);
        return $this->db->delete( $this->tickerTable );
    }

}
