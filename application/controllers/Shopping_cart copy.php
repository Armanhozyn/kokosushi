<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Shopping_cart extends CI_Controller {



    public function __construct()

    {

        parent::__construct();

       $this->load->model('Product_Model');

       $this->load->model('Shopping_cart_model');

       $this->load->model('Sauce_Model');

    }



    function index()

    {

        $this->load->model("shopping_cart_model");

        $data["product"] = $this->shopping_cart_model->fetch_all();

        $this->load->view("shopping_cart", $data);

    }



    function get_product(){



    }



    function add()

    {

       // var_dump($_POST); exit();

        if ($this->session->has_userdata('zip_code')) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('product_id','Product ID','required');

            $this->form_validation->set_rules('product_name','Product Name','required');

            $this->form_validation->set_rules('quantity','Quantity','required');

            $this->form_validation->set_rules('product_price','Prroduct Price','required');

            $this->form_validation->set_rules('extra_id','Extra ID','');

            

            if($this->form_validation->run() == false){

                $this->output

                ->set_content_type('application/json')

                ->set_output(json_encode(array('status'=> -1, 'html'=>'')));

            }else{



                $price = $this->input->post('product_price');

                if($this->input->post('extra_id') != ''){

                    $extraInfo = $this->Product_Model->getExtraInfo($this->input->post('extra_id'));

                    //var_dump($extraInfo); exit();

                    $price = $price;



                    $data = array(

                        "id"  => $this->input->post('product_id') ,

                        "name"  => $this->input->post('product_name') ,

                        "qty"  => $this->input->post('quantity') ,

                        "price"  => $price,

                        'options' => array('extra'=> $extraInfo, 'note'=> $this->input->post('note'))

                    );

                }else{

                    $data = array(

                        "id"  => $this->input->post('product_id') ,

                        "name"  => $this->input->post('product_name') ,

                        "qty"  => $this->input->post('quantity') ,

                        "price"  => $price,

                       'options' => array( 'note'=> $this->input->post('note'))

                    );

                }

                if($this->input->post('extra_id') != ''){

                    $this->load->library("cart");

                    $this->cart->insert($data); //return rowid





                    $this->output

                        ->set_content_type('application/json')

                        ->set_output(json_encode(array('status'=> 1, 'html'=>$this->view(), 'success'=>1)));



                }else{



                    $page_data = array();

                    // $page_data['size_list'] = $this->Product_Model->getExtras($product_id,'size');

                  //  $page_data['size_list'] = $this->Product_Model->getExtras($product_id,null);

                    $page_data['sauce_list'] = $this->Sauce_Model->get_all();

                    $page_data['product_info'] = $this->Product_Model->getProductInfo($this->input->post('product_id'));

                    $html  = $this->load->view('home/no_extra', $page_data, true);

                    $this->output

                        ->set_content_type('application/json')

                        ->set_output(json_encode(array('status'=> 3, 'html'=>$html, 'success' => '1')));

                }



            }



            

           

        }else{

            $this->output

                ->set_content_type('application/json')

                ->set_output(json_encode(array('status'=> 0, 'html'=>'')));

        }



    }

        function add_zip()

    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pid','Product Id','required|xss_clean|integer');

        $this->form_validation->set_rules('zip','Postal Code','trim|xss_clean|integer');



        if($this->form_validation->run() == false){

            $this->output

                ->set_content_type('application/json')

                ->set_output(json_encode(array('status'=> -1, 'html'=>'', 'error'=> validation_errors())));

        }else{

            $pid = $this->input->post('pid');

            $zip = $this->input->post('zip') == '' ? 0 : $this->input->post('zip');

            $productInfo = $this->Product_Model->getProductInfo($pid);



                $this->load->library("cart");

                $data = array(

                    "id"  => $productInfo->id,

                    "name"  => $productInfo->name,

                    "qty"  => 1,

                    "price"  => $productInfo->price

                );

                $this->cart->insert($data); //return rowid



                $this->session->set_userdata('zip_code',$zip);



                $this->output

                    ->set_content_type('application/json')

                    ->set_output(json_encode(array('status'=> 1, 'html'=>$this->view())));



        }







    }



    function change_zip(){

        $this->load->library('form_validation');



        $this->form_validation->set_rules('zip','Postal Code','trim|xss_clean|integer');



        if($this->form_validation->run() == false){

            $this->output

                ->set_content_type('application/json')

                ->set_output(json_encode(array('status'=> -1, 'html'=>'', 'error'=> validation_errors())));

        }else{



            $zip = $this->input->post('zip') == '' ? 0 : $this->input->post('zip');





            $this->session->set_userdata('zip_code',$zip);



            $this->output

                ->set_content_type('application/json')

                ->set_output(json_encode(array('status'=> 1, 'html'=>'Postal code successfully set')));



        }





    }

    

    function add_zip_extra()

    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pid','Product Id','required|xss_clean|integer');

        $this->form_validation->set_rules('zip','Postal Code','trim|xss_clean|integer');

        

        if($this->form_validation->run() == false){

            $this->output

            ->set_content_type('application/json')

            ->set_output(json_encode(array('status'=> -1, 'html'=>'', 'error'=> validation_errors())));

        }else{

            $product_id = $this->input->post('pid');

            $zip = $this->input->post('zip') == '' ? 0 : $this->input->post('zip');

           // $productInfo = $this->Product_Model->getProductInfo($pid);

            

            

            $page_data = array();

            // $page_data['size_list'] = $this->Product_Model->getExtras($product_id,'size');

            $page_data['size_list'] = $this->Product_Model->getExtras($product_id,null);

            $page_data['product_info'] = $this->Product_Model->getProductInfo($product_id);

            $html  = $this->load->view('home/extra', $page_data, true);



            

            $this->session->set_userdata('zip_code',$zip);

            

            $this->output

            ->set_content_type('application/json')

            ->set_output(json_encode(array('status'=> 1, 'html'=> $html )));

            

        }

        

        

        

    }

    

    public function get_extra(){

        if ($this->session->has_userdata('zip_code')) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('product_id','Product ID','required');

            if($this->form_validation->run() == false){

                echo "error";

            }else{

                $product_id = $this->input->post('product_id');

                

                $page_data = array();

               // $page_data['size_list'] = $this->Product_Model->getExtras($product_id,'size');

                $page_data['size_list'] = $this->Product_Model->getExtras($product_id,null);

                $page_data['product_info'] = $this->Product_Model->getProductInfo($product_id);

                $html  = $this->load->view('home/extra', $page_data, true);

            }

            

            

            $this->output

            ->set_content_type('application/json')

            ->set_output(json_encode(array('status'=> 1, 'html'=>$html)));

        }else{

            $product_id = $this->input->post('product_id');

            $this->output

            ->set_content_type('application/json')

            ->set_output(json_encode(array('status'=> 0, 'html'=>'', 'product_id'=> $product_id)));

        }

        



       

    }







    function load()

    {

        echo $this->view();

    }



    public function update($rowid,$qty)

    {

        $data=$this->cart->update(array(

            'rowid'=>$rowid,

            'qty'=> $qty

    ));



        $this->cart->update($data);



        echo $this->view();

    }



    function remove()

    {

        $this->load->library("cart");

        $row_id = $_POST["row_id"];

        $data = array(

            'rowid'  => $row_id,

            'qty'  => 0

        );

        $this->cart->update($data);

        echo $this->view();

    }



    function clear()

    {

        $this->load->library("cart");

        $this->cart->destroy();

        echo $this->view();

    }



    function view()

    {

        $this->load->library("cart");

        $output = '';

        $output .= '

        <div class="table-responsive-sm">   

              <table class="table table-bordered table-striped">

                <thead>                

                  <tr class="bg-danger text-white">

                    <th>Name</th>

                    <th>Quantity</th>

                    <th>Price</th>

                    <th>Total</th>

                    <th>Action</th>        

                  </tr>

                </thead>

                <tbody>  

                    <tr id="data"></tr>                         

                    ';



        $count = 0;

        foreach($this->cart->contents() as $items)

        {

            $count++;

            $output .= '

<tr class="carted-2">

<td>

<h3 class="cart-item-name">'.$items["name"].'</h3>

<div class="cart-extra-items">'.@$this->Shopping_cart_model->get_option_names($items['rowid']).'</div>

</td>

<td><input onchange="cartQtyChange(this)" data-rowid="'.$items["rowid"].'" onkeydown="return false" type="number" min="1" max="100" value="'.$items["qty"].'" class="form-control form-control-sm cart-quantity-value cart-item-qty" name="quantity"></td>

<td>'. $this->cart->format_number($items["price"]).'</td>

<td>'. $this->cart->format_number($items["subtotal"]).'</td>

<td><button id="'.$items["rowid"].'" class="btn btn-danger btn-sm btn-block remove_inventory"><i class="fas fa-times"></i></button></td></tr>

   ';

        }



        $output .= ' <tr class="cart-total bg-dark text-white">        

                        <td colspan="3" style=" text-align: right;"><b>Total :</b></td>

                        <td colspan="2" style=""><b>'. $this->cart->format_number($this->cart->total()).'</b></td>         

                    </tr> 

                    <tr class="bg-white">

                        <td colspan="5" align="center">

                        <a href="'. site_url('home/checkout').'" class="btn btn-danger btn-lg"><i class="fas fa-shopping-cart"></i> CHECKOUT</a>

                        <button id="clear_cart" type="button" class="btn btn-danger btn-lg"><i class="fas fa-broom"></i> Clear</button>

                        </td>

                    </tr>    

                </tbody>

              </table>

              </div>



  ';





        return $output;

    }







    public function item_count(){

       //echo count($this->cart->contents());

       // var_dump($this->cart->contents());



       echo array_sum(array_map(function($item) {

            return $item['qty'];

        }, $this->cart->contents()));

    }



    public function test(){



        foreach($this->cart->contents() as $items){

            foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value){

                if( $this->cart->has_options($items['rowid']) == TRUE){

                    

                    foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value) {

                       // var_dump($option_value->attr_value);

                       echo  $this->Shopping_cart_model->get_option_names($items['rowid']);

                    }

                }

            }

        }

    }



    public function test2(){

        var_dump($this->cart->contents());

    }





}

