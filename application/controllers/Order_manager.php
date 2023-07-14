<?php

/**
 * Created by PhpStorm.
 * User: Touhid
 * Date: 3/26/2020
 * Time: 12:12 PM
 */
class Order_manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_Model');
        $this->load->model('Product_Model');
    }

    public function index(){

    }

    public function recent_orders(){
        $page_data = array();
        $page_data['page_name'] = 'recent_orders';
        $page_data['order_list'] = $this->Order_Model->getRecentOrders();
        $this->load->view('master_order',$page_data);
    }

    public function order_info_ajax(){
        //var_dump($this->Product_Model->getDisplayCode(50)); exit();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('order_id','Order ID','required');
        if($this->form_validation->run() == false){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => 1,
                    'text' => validation_errors()
                )));
        }else{
            $itemHtml = '<table class="table custab table-striped">';
            $info = $this->Order_Model->getOrderInfo($this->input->post('order_id'));

            $orderInfo = $this->Order_Model->getOrderItemList($info->order_id);
            $total = array_sum(array_column($orderInfo,'total_price'));
            $itemHtml .= '<tr><th>#</th><th>Item Name</th><th>Qty</th><th>Price</th><th>Total</th></tr>'.PHP_EOL;
            $sl = 1;
            foreach ($orderInfo as $item ){
                $code = $this->getCode($item['product_id']);
                $itemHtml .= "<tr><td>{$sl}</td><td>{$code}) {$item['name']}</td><td>{$item['qty']}</td><td>{$item['unit_price']}</td><td>{$item['total_price']}</td></tr>\n";
                $sl++;
            }
            $itemHtml .= "<tr><td colspan='4' style='text-align: right'><strong>Total:</strong></td><td><strong>{$total}</strong></td></tr>".PHP_EOL;
            $itemHtml .= '</table>'.PHP_EOL;

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => 1,
                    'order_info' => $info,
                    'ItemHtml'=> $itemHtml
                )));
        }
    }

    private function getCode($id){
       if($id== 0){
            return 0;
       }else{
           return  !empty(@$this->Product_Model->getDisplayCode($id)) ? $this->Product_Model->getDisplayCode($id) : 0;
       }

    }
    


    public function getNewOrders(){
        $list = $this->Order_Model->newOrderList();
       // echo $this->db->last_query();
       // var_dump($list); exit();

        if(!empty($list)){
            $ids= array(0);
            foreach ($list as $item){
                $ids[] = $item['order_id'];
            }
            $this->Order_Model->makeOrderViewed($ids);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => 1,
                    'data'=> $list
                )));
        }else{
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => 0,
                    'data'=> $list
                )));
        }


    }

    public function get_order_contacts_ajax(){
        //$this->input->post('search');
        //getOrderIdPhonePair
//        /
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search','Search Term','required|xss_clean');
        if( $this->form_validation->run() == false){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array()));
        }else{
			$data = [];
			$arr = $this->Order_Model->getOrderIdPhonePair($this->input->post('search'));
            // foreach ( as $arr){
            $data[] = ['label'=>  $arr[0]['telephone'], 'value'=> $arr[0]['order_id']  ];
            // }
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(
                    $data
                ));
        }
    }

    public function orderinfo_ajax(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('order_id','Order ID','required');
        if($this->form_validation->run() == false){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => -1,
                    'error' => validation_errors()
                )));
        }else{
            $info = $this->Order_Model->getOrderInfo($this->input->post('order_id'));
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array(
                    'status' => 1,
                    'data' => $info
                )));
        }
    }
}
