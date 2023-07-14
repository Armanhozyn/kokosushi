<?php

class Order_Model extends CI_Model
{
    protected $table = 'orders';
    protected $orderedItemsTable = 'ordered_items';

    public function getRecentOrders(){
        $this->db->from( $this->table );
//        $this->db->where('time_added >=',date('Y-m-d'));
//        $this->db->where('time_added <=', date('Y-m-d') );
        $this->db->order_by('order_id','DESC');
        $this->db->limit(20);
        $query =$this->db->get();
        return $query->result_array();
    }

    public function getOrderInfo($id){
        $this->db->from( $this->table );
        $this->db->where('order_id',$id);
        $query =$this->db->get();
        return $query->row();
    }

    public function getOrderItemList($order_id){
        $this->db->select("id, (SELECT display_id FROM product WHERE id = product_id) as item_code, name, qty, unit_price, total_price, order_id, product_id, status");
        $this->db->from( $this->orderedItemsTable );
        $this->db->where('order_id', $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertOrder($data){
        if($this->db->insert($this->table,$data)){
            $lastid=$this->db->insert_id();
            return $lastid;
        }
        return false;
    }

    public function insertOrderedItem($data){
        if($this->db->insert($this->orderedItemsTable,$data)){
            $lastid=$this->db->insert_id();
            return $lastid;
        }
        return false;
    }

    public function makeOrderViewed($order_ids){
        $data = array('is_viewed'=> 1);
        $this->db->where_in('order_id', $order_ids);
        return $this->db->update($this->table, $data);
    }

    public function newOrderList(){
        $this->db->from($this->table);
        $this->db->where('is_viewed !=', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getStatus($code){
        $output = '';
        switch ($code){
            case 1:
                $output = 'New Order';
                break;
            case 2:
                $output = 'Pending';
                break;
            case 0:
                $output = 'Completed';
                break;
            default:
                $output = '';
                break;

        }
        return $output;
    }

//Send Android Apps only
    public function send_notification_android_apps($noti_title,$noti_data ,$noti_url){

        $fields = array(
            'app_id' => 'f89d3f97-3d43-42a2-af5a-8d3cf548458f',
            'included_segments' => array('All'),
            'data' => array("openURL" =>$noti_url),
            'small_icon' => 'noti_icon',
            'isAndroid' => true,
            'android_accent_color' => '00ff26',
            'app_url' => $noti_url,
            'contents' => array("en" =>$noti_data),
            'headings'=> array("en" => $noti_title),
            'android_sound'=> 'noti_one',
          //  'big_picture' => $noti_image
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Authorization: Basic '.'MDk3YzZjMzUtMTNkNS00NTIwLWJkMDQtODBhZmI5NDY2MzQy'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;

    }

    public function getOrderIdPhonePair($search){
        $this->db->select(array('order_id','telephone'));
        $this->db->from($this->table);
        $this->db->like('telephone', $search);
        $this->db->order_by('order_id','DESC');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function CheckOrderPrinted(){
        $this->db->select(array('order_id'));
        $this->db->from($this->table);
        $this->db->where('is_printed !=',1);
        $this->db->order_by('order_id','ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_order_limited($limit = null){
        //$this->db->select(array('order_id'));
        $this->db->from($this->table);
        $this->db->where('is_cleared !=',1);
        if($limit != null){
            $this->db->limit($limit);
        }
        $this->db->order_by('order_id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function orderMarkedAsPrinted($order_id){
        $data = array();
        $data['is_printed'] = 1;
        $this->db->where('order_id',$order_id);
        return $this->db->update($this->table, $data);
    }

    public function orderMarkAsCleared($ids){
        $data = array();
        $data['is_cleared'] = 1;
       // $this->db->where('order_id',$order_id);
        $this->db->where_in('order_id',$ids);
        return $this->db->update($this->table, $data);
    }





}