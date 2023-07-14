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

        // if ($this->session->has_userdata('zip_code')) {

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

                        "sauce_select" => $this->input->post('sauce_select'),

                        'options' => array('extra'=> $extraInfo, 'note'=> $this->input->post('note'))

                    );

                }else{

                    $data = array(

                        "id"  => $this->input->post('product_id') ,

                        "name"  => $this->input->post('product_name') ,

                        "qty"  => $this->input->post('quantity') ,

                        "sauce_select" => $this->input->post('sauce_select'),

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



            

           

        // }else{

        //     $this->output

        //         ->set_content_type('application/json')

        //         ->set_output(json_encode(array('status'=> 0, 'html'=>'')));

        // }



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

        // if ($this->session->has_userdata('zip_code')) {

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

        // }else{

        //     $product_id = $this->input->post('product_id');

        //     $this->output

        //     ->set_content_type('application/json')

        //     ->set_output(json_encode(array('status'=> 0, 'html'=>'', 'product_id'=> $product_id)));

        // }

        



       

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
        <div class="pt-20 md:h-screen flex items-center justify-center relative">
        <div class="add-to-cart sm:w-[600px] w-[330px] md:w-[700px] lg:w-[800px] mx-auto bg-gray-200 rounded-xl shadow-inner shadow-gray-300">
        <div class="add-to-cart-top flex justify-between items-center px-8 py-3">
            <h2 class="text-lg md:text-xl lg:text-2xl text-[#ff3131] font-semibold"><i class="fa-solid fa-cart-shopping pr-2 pb-7"></i>Cart</h2>
            <i id="add_cart_clear" onclick="clear_out_cart();" class="cursor-pointer fa-solid fa-xmark text-red-500 text-lg md:text-xl bg-white w-6 h-6 items-center justify-center flex rounded"></i>
        </div>
        <div class="line w-11/12 mx-auto h-px  bg-[#ff3131]"></div>
        <div class="h-[60vh] overflow-y-auto  add-to-cart-table px-8 mx-auto">
            <table class="table-auto w-full  border-separate border-spacing-y-3">
                <thead>
                  <tr class="">
                    <th scope="col" class="font-medium md:text-lg">Name</th>
                    <th scope="col" class="font-medium md:text-lg">Quantity</th>
                    <th scope="col" class="font-medium md:text-lg">Price</th>
                    <th scope="col" class="font-medium md:text-lg">Total</th>
                    <th scope="col" class="font-medium md:text-lg">Action</th>
                  </tr>
                </thead>
                <tbody class="">
                <tr id="data" class=""></tr>                         

                    ';



        $count = 0;

        foreach($this->cart->contents() as $items)

        {

            $count++;

            $output .= '
                    <tr class="rounded-xl shadow-lg bg-white">
                    <td class="text-center py-2 md:text-lg">'.$items["name"].'<div class="cart-extra-items">'.@$this->Shopping_cart_model->get_option_names($items['rowid']).'</div></td>
                    <td class="text-center md:text-lg"><input onchange="cartQtyChange(this)" data-rowid="'.$items["rowid"].'" onkeydown="return false" type="number" min="1" max="100" value="'.$items["qty"].'" class="text-center form-control form-control-sm cart-quantity-value cart-item-qty" name="quantity"></td>
                    <td class="text-center md:text-lg">'. $this->cart->format_number($items["price"]).'</td>
                    <td class="text-center md:text-lg">'. $this->cart->format_number($items["subtotal"]).'</td>
                    <td class="text-center md:text-lg"><button id="'.$items["rowid"].'" class="remove_inventory"><i class="fa-solid fa-trash bg-red-500 mx-auto w-8 text-white h-7 items-center justify-center flex rounded"></i></button></td>
                    </tr>
                        ';

        }

		$tenPercent = $this->cart->format_number($this->cart->total()) * 0.1;
		$discountPrice = $this->cart->format_number($this->cart->total()) - $tenPercent ;

        $output .= '
					<tr class="rounded-xl  bg-white shadow-lg">
						<td class="text-center md:text-lg"></td>
						<td class="text-center py-2 md:text-lg">Total </td>
						<td class="text-center md:text-lg">:</td>
						<td class="text-center md:text-lg">&#x20AC;'. $this->cart->format_number($this->cart->total()).'</td>
						<td class="text-center md:text-lg"></td>
					</tr>
                    </tbody>
                </table>
                </div>
                <div class="button-section py-3 px-8 space-x-3">
                <a href="'. site_url('checkout').'"><button class="bg-green-500 px-3 py-1 rounded-md text-white shadow-green-500 shadow-md text-sm md:text-lg">Checkout</button></a>
                <button id="clear_cart" class="bg-red-500 px-3 py-1 rounded-md text-white shadow-red-500 shadow-md text-sm md:text-lg"><i class="fa-solid fa-broom text-sm md:text-lg"></i>Clear</button>
                </div>
            </div>
            </div>
                ';

// 		if($this->cart->total() > 24){
// 			$output .= '<tr class="rounded-xl  bg-white shadow-lg">
// 							<td class="text-center md:text-lg"></td>
// 							<td class="text-center py-2 md:text-lg">On Delivery</td>
// 							<td class="text-center md:text-lg">:</td>
// 							<td class="text-center md:text-lg">&#x20AC;'. $this->cart->format_number($this->cart->total()) .'</td>
// 							<td class="text-center md:text-lg"></td>
// 						</tr>';
// 		}					
// 		$output	.=	'<tr class="rounded-xl  bg-white shadow-lg">
// 						<td class="text-center md:text-lg"></td>
// 						<td class="text-center py-2 md:text-lg">On Take away (10% Off) </td>
// 						<td class="text-center md:text-lg">:</td>
// 						<td class="text-center md:text-lg">&#x20AC;'. $discountPrice .'</td>
// 						<td class="text-center md:text-lg"></td>
// 					</tr>
//                 </tbody>
//               </table>
             
//         </div>
// 		<div class="button-section py-3 px-5 space-x-3">
// 		<a href="'. site_url('checkout').'"><button class="bg-green-500 px-3 py-1 rounded-md text-white shadow-green-500 shadow-md text-sm md:text-lg">Checkout</button></a>
// 		  <button id="clear_cart" class="bg-red-500 px-3 py-1 rounded-md text-white shadow-red-500 shadow-md text-sm md:text-lg"><i class="fa-solid fa-broom text-sm md:text-lg"></i>Clear</button>
// 		</div>
//     </div>
//     </div>


//   ';





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

