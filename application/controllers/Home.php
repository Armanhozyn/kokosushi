<?php

/**
 * Created by Rafusoft.
 * Dev: Touhid
 * Date: 1/15/2020
 * Time: 5:03 PM
 */
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_Model');
        $this->load->model('Order_Model');
        $this->load->model('Shopping_cart_model');
        $this->load->model('Sauce_Model');
        $this->load->model('Ticker_Model');
        $this->load->model('Setting_Model');
        $this->load->database();
    }

    public function index()
    {
        $page_data = array();
        $page_data['page_name'] = 'index';
        $page_data['category_list'] = $this->Product_Model->getCategoryList();
        $page_data['tickers'] = $this->Ticker_Model->getTickerListKeyValuePair();
        $page_data['meta_title'] = "Sushi Mol Kokoro - Bestel Online Official";
        $page_data['meta_canonical'] = "https://kokorosushi.be";
        $page_data['meta_description'] = "Beste Sushi Mol, heerlijke sushi gerechten zijn sushi combo's, broodjes en nigiri met saus. afhalen, Take Away";
        $page_data['meta_keywords'] = "kokoro mol, nami sushi balen, nami sushi mol, restaurant corbiestraat mol, sushi bar mol, sushi geel afhalen, sushi in geel, sushi lommel, sushi lommel afhalen, sushi mol corbiestraat, sushi restaurant geel, sushi restaurant mol, Sushi mol.";
        $page_data['meta_author'] = "Developed by (www.rafusoft.com)";
        $this->load->view('master_home', $page_data);
    }

    public function chef()
    {
        $page_data['page_name'] = 'chef';
        $page_data['meta_title'] = "Sushi Mol Kokoro - Mol: Sushi Restaurant and Japanese Cuisinein Mol";
        $page_data['meta_canonical'] = "https://kokorosushi.be/chef";
        $page_data['meta_description'] = "Sushi Mol Kokoro Restaurant in Mol serveert verse en lekkere sushi. Een verscheidenheid aan authentieke Japanse gerechten, waaronder verse sushi, staan op ons menu. Wij serveren de beste Japanse gerechten in ons restaurant. Afhalen en bezorgen zijn mogelijk voor sushi. Het beste sushirestaurant in Mol en de Japanse keuken";
        $page_data['meta_keywords'] = "kokoro mol, nami sushi balen, nami sushi mol, restaurant corbiestraat mol, sushi bar mol, sushi geel afhalen, sushi in geel, sushi lommel, sushi lommel afhalen, sushi mol corbiestraat, sushi restaurant geel, sushi restaurant mol, Sushi mol.";
        $page_data['meta_author'] = "Developed by (www.rafusoft.com)";
        $this->load->view('master_home', $page_data);
    }
    public function data()
    {
        $query = $this->db->select('*')
            ->from('product')
            ->get();

        $result = $query->result_array();
      
        $array = json_encode($result);
        echo $array;
    }
    public function category()
    {
        $query = $this->db->select('*')
            ->from('category')
            ->get();

        $result = $query->result_array();
      
        $array = json_encode($result);
        echo $array;
    }

    public function ajax_zip_session_check()
    {
        if ($this->session->has_userdata('zip_code')) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 1, 'message' => 'ok', 'zip_code' => $this->session->userdata('zip_code'))));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 0, 'message' => 'Zip code does not exist')));
        }
    }

    public function ajax_set_zip($zip)
    {
        $this->session->set_userdata('zip_code', $zip);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('status' => 1, 'message' => 'ok')));

    }

    public function ajax_product_info($id)
    {
        // var_dump($this->Product_Model->getProductInfo($id)); exit();
        $productInfo = $this->Product_Model->getProductInfo($id);
        if (!empty($productInfo)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 1, 'message' => 'Product  found', 'productInfo' => $productInfo)));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 0, 'message' => 'Product not found')));
        }

    }
    public function cart()
    {

        if ($this->cart->total_items() == 0) {
            $this->session->set_flashdata('cart_error', 'Cart is empty. At least one item required to add to view cart.');
            redirect('/', 'refresh');
        } else {
            //var_dump($_POST); exit();
            // var_dump($_POST['rowid']); exit();
            $this->load->library('form_validation');
            if (!empty($_POST['rowid'])) {
                $this->form_validation->set_rules('rowid[]', "Row ID", "required");
            }


            if ($this->form_validation->run() == false) {
                $page_data = array();
                $page = new stdClass();
                $page->title = "Cart | Rafusoft";
                $page->desc = "Rafusoft cart";
                $page->key = "cart,rafusoft, bangladesh";
                $page->author = "Rafusoft";
                $page_data['category_list'] = $this->Product_Model->getCategoryList();
                $page_data['cart_items'] = $this->cart->contents();
                $page_data['site'] = $page;
                $page_data['page_name'] = 'cart';
                //$page_data['user_info'] = $user;
                $this->load->view('master_home', $page_data);
            } else {
                if (isset($_POST['update']) && ($_POST['update'] == 'update')) {


                    //Update cart items
                    $i = 0;
                    $cartData = array();
                    foreach ($_POST['rowid'] as $rowid) {
                        $cartData[] = array(
                            'rowid' => $rowid,
                            'qty' => $_POST['qty'][$i]
                        );
                        $i++;
                    }

                    //Remove cart item if checked
                    if (isset($_POST['product_remove']) && !empty($_POST['product_remove'])) {
                        $totalItemsToBeRemoved = count($_POST['product_remove']);
                        for ($i = 0; $i < $totalItemsToBeRemoved; $i++) {
                            $this->cart->remove($_POST['product_remove'][$i]);
                        }
                    }



                    //var_dump($cartData); exit();
                    if ($this->cart->update($cartData)) {
                        $this->session->set_flashdata('success', 'Cart updated successfully');
                        redirect('home/cart', 'refresh');
                    } else {
                        // exit('checkout');
                        $this->session->set_flashdata('failed', 'Unable to update cart. Please try again.');
                        redirect('home/cart', 'refresh');
                    }



                } else if (isset($_POST['checkout']) && ($_POST['checkout'] == 'checkout')) {
                    redirect('home/checkout', 'refresh');
                }
            }
        }


    }

    public function checkout()
    {
        if ($this->cart->total_items() == 0) {
            $this->session->set_flashdata('failed', 'Checkout failed. Cart is empty.');
            redirect('/', 'refresh');
        } else {
            // var_dump($_POST); exit();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('full_name', 'Full Name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean|trim');

            /*            $this->form_validation->set_rules('first_name','First Name','required|xss_clean|trim');
                        $this->form_validation->set_rules('last_name','Last Name','required|xss_clean|trim');*/

            //            $this->form_validation->set_rules('email','Email Address','required|xss_clean|trim');
            $this->form_validation->set_rules('telephone', 'Telephone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('address', 'Address', 'required|xss_clean|trim');
            /*            $this->form_validation->set_rules('address1','Address 1','required|xss_clean|trim');
                        $this->form_validation->set_rules('address2','Address 2','xss_clean|trim');*/
            $this->form_validation->set_rules('city', 'City', 'required|xss_clean|trim');
            $this->form_validation->set_rules('zip', 'Postal Code', 'required|xss_clean|trim');
            $this->form_validation->set_rules('note', 'Note', 'xss_clean|trim');
            $this->form_validation->set_rules('country', 'Country', 'required|xss_clean|trim');
            $this->form_validation->set_rules('payment_method', 'Payment Method', 'required|xss_clean|trim');

            if ($this->form_validation->run() == false) {
                $page_data = array();
                $page = new stdClass();
                $page->title = "Checkout | Rafusoft";
                $page->desc = "Checkout";
                $page->key = "checkout,cart,rafusoft, bangladesh";
                $page->author = "Rafusoft";
                //$page_data['cart_items'] = $this->cart->contents();
                $page_data['site'] = $page;
                $page_data['category_list'] = $this->Product_Model->getCategoryList();
                $page_data['delivery_area'] = $this->Product_Model->getDeliveryArea();
                $page_data['page_name'] = 'checkout';
                //$page_data['user_info'] = $user;
                $this->load->view('master_home', $page_data);
            } else {
                $data = array();
                $data['full_name'] = $this->input->post('full_name');

                /*            $data['first_name'] = $this->input->post('first_name');
                            $data['last_name'] = $this->input->post('last_name');*/

                $data['telephone'] = $this->input->post('telephone');
                $data['email'] = $this->input->post('email');
                $data['country_code'] = $this->input->post('country_code');
                $data['address'] = $this->input->post('address');

                /*             $data['address1'] = $this->input->post('address1');
                             $data['address2'] = $this->input->post('address2');
                             */
                $data['city'] = $this->input->post('city');
                $data['zip'] = $this->input->post('zip');
                $data['note'] = $this->input->post('note') == '' ? null : $this->input->post('note');
                // $data['sub_total'] = $this->cart->total();
                $data['sub_total'] = $this->input->post('amount');
                //$data['discount'] = 0.00;
                $data['discount'] = $this->input->post('discount');
                $data['tax'] = 0.00;
                $data['grand_total'] = ($data['sub_total'] - $data['discount']) + $data['tax'];
                $data['time_added'] = date('Y-m-d H:i:s');
                $data['country'] = $this->input->post('country');
                $data['payment_method'] = ucwords($this->input->post('payment_method'));
                $data['status'] = 1;


                $order = $this->Order_Model->insertOrder($data);
                // echo $this->db->last_query();

                // exit();

                if ($order) {

                    foreach ($this->cart->contents() as $items) {
                        $itemData = array();
                        $itemData['name'] = $items['name'];
                        $itemData['qty'] = $items['qty'];
                        $itemData['unit_price'] = $items['price'];
                        $itemData['total_price'] = $items['subtotal'];
                        $itemData['order_id'] = $order;
                        $itemData['product_id'] = $items['id'];
                        $itemData['status'] = 1;
                        $this->Order_Model->insertOrderedItem($itemData);
                    }

                    $pdata = array();
                    $pdata['checkoutInfo'] = $data;
                    $pdata['cart_contents'] = $this->cart->contents();

                    // $response =  $this->Order_Model->send_notification_android_apps('New Order #'.$order,"{$data['first_name']} {$data['last_name']}",'https://kokorosushi.be/order_manager/recent_orders');

                    // // load email library
                    // $this->load->library('email');
                    // $this->email->set_newline("\r\n");

                    // // prepare email
                    // $this->email
                    //     ->from('info@kokorosushi.be', 'New Order | Kokorosushi')
                    //     ->to(array('kokorosushimol2400@gmail.com','raptor.dnj@gmail.com','rafusoft@gmail.com','rafu@rafusoft.com','touhid@rafusoft.com'))
                    //     ->subject('SYSTEM | KOKORO SUSHI & BENTO')
                    //     ->message($this->load->view('home/order_mail',$pdata,true))
                    //     ->set_mailtype('html');

                    // // send email
                    // $this->email->send();

                    $this->load->library('mailer');

                    $this->load->library('mailjet');
                    /*$from = [
                                       'Email' => "info@rafusoft.com",
                                       'SYSTEM | KOKORO SUSHI & BENTO'
                                   ];*/

                    $from = "order@kokorosushi.be";
                    $payment_method = $data['payment_method'];
                    $price = $data['sub_total'];
                    if ($payment_method == 'Take Away') {
                        $subject = "Order #{$order} | € $price | TAway";
                    } else {
                        $subject = "Order #{$order} | € $price | COD";
                    }


                    /*$send = $this->mailjet->send($from,	[					[
                                       'Email' => "kokorosushimol2400@gmail.com",
                                       'Name' => 'Kokoro Sushi Mol']
                                   ],$subject, $this->load->view('home/order_mail',$pdata,true));*/

                    $send = $this->mailer->send($from, "rainbowsushi03@gmail.com", $subject, $this->load->view('home/order_mail', $pdata, true));
                    $send = $this->mailer->send($from, "armanhossen591@gmail.com", $subject, $this->load->view('home/order_mail', $pdata, true));
                    $send = $this->mailer->send($from, "info@rafusoft.com", $subject, $this->load->view('home/order_mail', $pdata, true));
                    /*$send = $this->mailjet->send($from,	[					[
                                       'Email' => "rafusoft@gmail.com",
                                       'Name' => 'Rafusoft']
                                   ],$subject, $this->load->view('home/order_mail',$pdata,true));*/
                    $send = $this->mailer->send($from, "rafusoft@gmail.com", $subject, $this->load->view('home/order_mail', $pdata, true));

                    /* $send = $this->mailjet->send($from,	[					[
                                           'Email' => "me@rafu.be",
                                           'Name' => 'Rafaet Hossain']
                                       ],$subject, $this->load->view('home/order_mail',$pdata,true));*/
                    $send = $this->mailer->send($from, "me@rafu.be", $subject, $this->load->view('home/order_mail', $pdata, true));

                    /*$send = $this->mailjet->send($from,	[					[
                                          'Email' => "raptor.dnj@gmail.com",
                                          'Name' => 'Tohidul Islam']
                                      ],$subject, $this->load->view('home/order_mail',$pdata,true));*/
                    $send = $this->mailer->send($from, "raptor.dnj@gmail.com", $subject, $this->load->view('home/order_mail', $pdata, true));

                    //exit();

                    $phone = "";

                    if (strpos($data['telephone'], '+') !== false) {
                        $phone = trim($data['telephone']);

                    } else {
                        if (mb_substr(trim($data['telephone']), 0, 1) == '0') {
                            $phone = "+32" . ltrim(trim($data['telephone']), '0');
                        } else {
                            $phone = "+32" . trim($data['telephone']);
                        }

                    }


                    // $this->load->library('sms');
                    // $cusMethod = $data['payment_method'] == 'Take Away' ? 'TW' : 'HD';
                    // $cusName = strlen($data['full_name']) <= 11 ? $data['full_name'] : substr($data['full_name'], 0,10);
//					$smsBody = "An order (#{$order}) has been placed.";
                    // $smsBody = " #{$order}\n$cusName\n{$phone}\n{$data['grand_total']}/-\n{$cusMethod}";
                    // $this->sms->send('+32484550510', $smsBody);



                    //					$smsBodyCustomer = "We confirmed your order (#{$order}). For query call at +3214872578.\nThank you.";
                    $smsBodyCustomer = "Your order #{$order} has been confirmed.\nFor query call at +3214872578.\nThank you.\nHave a good day!";
                    $this->load->library('messagesms');
                    $this->messagesms->send($phone, $smsBodyCustomer);
                    $grand_total = $this->cart->total();
                    $client_number = $data['telephone'];
                    $p_mthod = $data['payment_method'];
                    $cus_sms = urlencode("Your order has been placed #$order. For confirmation, please wait or call +32484550510. Thank you");
                    $cheif_sms = urlencode(
                        "New Order #$order \nAmount: € $grand_total \nClient: $client_number \nMode: $p_mthod \n---"
                    );
                    $cus_phone = $data['country_code'] . "" . $data['telephone'];

                    //$response = file_get_contents("https://sms.rafusoft.com/api/v1/sms/send?api_key=d4b5f879cca3abad9b06f4414049884c9d37df7e&receiver=+32498464176&message=$cheif_sms&interface=4");

                    $cURLConnection = curl_init();
                    curl_setopt($cURLConnection, CURLOPT_URL, "https://sms.rafusoft.com/api/v1/sms/send?api_key=d4b5f879cca3abad9b06f4414049884c9d37df7e&receiver=+32484550510&message=$cheif_sms&interface=4");
                    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

                    curl_exec($cURLConnection);
                    curl_close($cURLConnection);

                    $cURLConnectionThree = curl_init();
                    curl_setopt($cURLConnectionThree, CURLOPT_URL, "https://sms.rafusoft.com/api/v1/sms/send?api_key=d4b5f879cca3abad9b06f4414049884c9d37df7e&receiver=+32498464176&message=$cheif_sms&interface=4");
                    curl_setopt($cURLConnectionThree, CURLOPT_RETURNTRANSFER, true);

                    curl_exec($cURLConnectionThree);
                    curl_close($cURLConnectionThree);

                    $cURLConnectionTwo = curl_init();
                    curl_setopt($cURLConnectionTwo, CURLOPT_URL, "https://sms.rafusoft.com/api/v1/sms/send?api_key=d4b5f879cca3abad9b06f4414049884c9d37df7e&receiver=$cus_phone&message=$cus_sms&interface=4");
                    curl_setopt($cURLConnectionTwo, CURLOPT_RETURNTRANSFER, true);

                    curl_exec($cURLConnectionTwo);
                    curl_close($cURLConnectionTwo);

                    $this->cart->destroy();

                    // exit();

                    $this->session->set_flashdata('success', 'Your order has been placed successfully.');
                    $this->session->set_flashdata('order_id', $order);
                    $this->session->set_flashdata('total_price', $data['sub_total']);
                    $this->session->set_flashdata('method', $data['payment_method']);

                    redirect('/', 'refresh');

                } else {
                    $this->session->set_flashdata('error', '<h2>System is unable to process your order at this time. Try again later or call us. We will contact you soon.</h2>');
                    redirect('/', 'refresh');
                }






            }
        }


    }

    public function test_mail()
    {
        //  // load email library
        //             $this->load->library('email');
        //             $this->email->set_newline("\r\n");

        //             // prepare email
        //             $this->email
        //                 ->from('info@kokorosushi.be', 'New Order | Kokorosushi')
        //                 ->to(array('raptor.dnj@gmail.com'))
        //                 ->subject('SYSTEM | KOKORO SUSHI & BENTO')
        //                 ->message('Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.')
        //                 ->set_mailtype('html');

        //             // send email
        //             $this->email->send();
        // 			var_dump($this->email->print_debugger(array('headers','subject','body')));
        $this->load->library('mailjet');
        $send = $this->mailjet->send('info@kokorosushi.be', 'raptor.dnj@gmail.com', 'New Order', '<p>Today is the anniversary of the publication of Robert Frosts iconic poem Stopping by Woods on a Snowy Evening,” a fact that spurred the Literary Hub office into a long conversation about their favorite poems, the most iconic poems written in English, and which poems we should all have already read (or at least be reading next). Turns out, despite frequent (false) claims that poetry is dead and/or irrelevant and/or boring, there are plenty of poems that have sunk deep into our collective consciousness as cultural icons. (What makes a poem iconic? For our purposes here, it’s primarily a matter of cultural ubiquity, though unimpeachable excellence helps any case.) So for those of you who were not present for our epic office argument, I have listed some of them here.</p><p>NB that I limited myself to one poem per poet—which means that the impetus for this list actually gets bumped for the widely quoted (and misunderstood) “The Road Not Taken, but so it goes. I also excluded book-length poems, because they’re really a different form. Finally, despite the headline, Im sure there are many, many iconic poems out there that Ive missed—so feel free to extend this list in the comments. But for now, happy reading (and re-reading):</p>', "Kokoro Sushi & Bento", "Kokoro Sushi Stuff");
        var_dump($send);

    }

    public function available_print()
    {
        $json = array();
        $json['status'] = 1;
        $json['data'] = $this->Order_Model->CheckOrderPrinted();
        $json['message'] = "Success!";
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json['data']));

    }

    public function get_order_list_json()
    {
        //get_order_limited
        $json = array();
        $json['status'] = 1;
        $json['data'] = $this->Order_Model->get_order_limited(20);
        $json['message'] = "Success!";
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json['data']));
    }


    public function print_pos($id)
    {
        $id = (int) $id;
        $orderInfo = $this->Order_Model->getOrderInfo($id);
        $orderItemList = $this->Order_Model->getOrderItemList($id);
        //        var_dump($orderInfo);
//        echo "<hr />\n";
//        var_dump($orderItemList);
        $page_data = array();
        $page_data['orderInfo'] = $orderInfo;
        $page_data['orderItemList'] = $orderItemList;
        $page_data['qty'] = count($orderItemList);
        $page_data['order_id'] = $id;

        $this->load->view("home/print_pos", $page_data);





    }

    public function mark_as_printed($id)
    {
        $query = $this->Order_Model->orderMarkedAsPrinted($id);
        $json = array();
        $json['status'] = $query ? 1 : 0;

        $json['message'] = $query ? "Success!" : "Not successful";
        $this->output
            // ->set_content_type('application/json','UTF-8')
            ->set_content_type('application/json')
            ->set_output(json_encode($json));

    }

    public function print_post_json($id)
    {
        $id = (int) $id;
        $orderInfo = $this->Order_Model->getOrderInfo($id);
        $orderItemList = $this->Order_Model->getOrderItemList($id);
        $this->Order_Model->orderMarkedAsPrinted($id);
        //        var_dump($orderInfo);
//        echo "<hr />\n";
//        var_dump($orderItemList);
        $page_data = array();
        $page_data['order_id'] = $id;
        $page_data['qty'] = count($orderItemList);
        $page_data['orderInfo'] = $orderInfo;
        $page_data['orderItemList'] = $orderItemList;


        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($page_data));



    }


    public function clear_order()
    {
        // Takes raw data from the request
        $json = file_get_contents('php://input');

        // Converts it into a PHP object
        $data = json_decode($json);

        if ($data != null) {


            if ($this->Order_Model->orderMarkAsCleared($data)) {
                echo $this->db->last_query();
                echo "ok";
            } else {
                echo "notok";
            }
        } else {
            echo "empty";
        }

    }


    public function test_json()
    {
        $persons = array(
            array(
                'id' => 1,
                'name' => 'Tohidul Islam',
                'address' => 'Teghora, Dinajpur',
                'age' => 30,
                'mobile' => '01304195282',
                'salary' => 16000
            ),
            array(
                'id' => 2,
                'name' => 'Sumon',
                'address' => 'Pouroshova, Dinajpur',
                'age' => 25,
                'mobile' => '01553226655',
                'salary' => 6000
            ),
            array(
                'id' => 3,
                'name' => 'Dipu',
                'address' => 'Nimnagar, Dinajpur',
                'age' => 25,
                'mobile' => '01622255522',
                'salary' => 5000
            )

        );
        $json = array();
        $json['status'] = 1;
        $json['message'] = 'Success';
        $json['persons'] = $persons;

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));


    }

    public function test()
    {
        //       $response =  $this->Order_Model->send_notification_android_apps('New Order #001','Customer: Tohidul Islam','https://kokorosushi.be/order_manager/recent_orders');
//       var_dump(json_decode($response));
//    var_dump($this->Sauce_Model->get_all());
//		$this->load->library('sms');
//		var_dump($this->sms->send('01304195282', "Hello"));
//		$this->load->library('messagesms');
//		$this->messagesms->send('+8801304195282', "Hello World");
    }


    public function not_found()
    {
        $page_data = array();
        $page_data['page_name'] = '404';

        $this->load->view('master_home', $page_data);
    }


    public function about()
    {
        $page_data['page_name'] = 'about';
        $page_data['meta_title'] = "Sushi Mol Kokoro - Bestel Online Official";
        $page_data['meta_canonical'] = "https://kokorosushi.be";
        $page_data['meta_description'] = "Beste Sushi Mol, heerlijke sushi gerechten zijn sushi combo's, broodjes en nigiri met saus. afhalen, Take Away";
        $page_data['meta_keywords'] = "kokoro mol, nami sushi balen, nami sushi mol, restaurant corbiestraat mol, sushi bar mol, sushi geel afhalen, sushi in geel, sushi lommel, sushi lommel afhalen, sushi mol corbiestraat, sushi restaurant geel, sushi restaurant mol, Sushi mol.";
        $page_data['meta_author'] = "Developed by (www.rafusoft.com)";
        $this->load->view('master_home', $page_data);
    }

    public function contact()
    {
        $page_data['page_name'] = 'contact';
        $this->load->view('master_home', $page_data);
    }


}