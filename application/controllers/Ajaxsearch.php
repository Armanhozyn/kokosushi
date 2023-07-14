<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Ajaxsearch extends CI_Controller {



	function index()

	{

		$this->load->view('ajaxsearch');

	}



	function fetch()

	{

		$output = '';

		$query = '';

		$this->load->model('ajaxsearch_model');

		if($this->input->post('query'))

		{

			$query = $this->input->post('query');

		}

		$data = $this->ajaxsearch_model->fetch_data($query);

//		var_dump($data->result_array());

		if(isset($data) AND !empty($data)){


		    $output .= '
				<div id="search_item">
		    	<div class="grid grid-cols-12 xl:px-20 lg:px-16 mt-24 2xl:px-40 md:px-10 sm:px-8 px-4">
                    <div class="relative col-span-12">
                        <hr class="float-left lg:w-5/12 md:w-4/12 sm:w-3/12 w-2/12">
                        <p class="absolute -top-5 left-[36%] sm:left-[45%] text-[#ff3131] font-extrabold text-4xl inline-block font-rou">Search</p>
                        <hr class="float-right lg:w-5/12 md:w-4/12 sm:w-3/12 w-2/12">
                    </div>
                </div>
				<div class="grid grid-cols-12 xl:px-[61px] lg:mt-14 xl:mt-10 lg:px-10 lg:gap-x-6 md:gap-x-4 md:gap-y-9 lg:gap-y-12 2xl:px-40 md:px-14 md:mt-16 mt-12 sm:px-14 sm:mt-16 sm:gap-x-4 sm:gap-y-10 px-16 gap-y-8">

		';


//			echo $data->num_rows(); exit();

		if($data->num_rows() > 0)

		{

			foreach($data->result() as $row)

			{

				$output .= '
                    <div class="sm:col-span-6 col-span-12 xl:col-span-3 lg:col-span-4 float-left bg-white md:px-9 sm:px-7 px-4 py-5 border-0 rounded-3xl inline-block hover:shadow-2xl hover:shadow-red-400/50 shadow duration-200">
                        <p class="text-lg font-bold"> '. $row->display_id. ') '. $row->name.'</p>
                        
                        <p class="text-sm my-1 text-[#ff3131]">'.$row->attr1.'</p>
                        <div class="my-4 mt-10">
						<div class="hidden"><input id="qty_<?php echo $SUSHI_NIGIRI[$row][0]  ?>" name="qty" type="number" min="1" max="100" value="1" class="cart-quantity-value "></div>
                            <div onclick="get_item(\''. $row->id .'\')" data-productname="'. $row->id .'" data-price="'. $row->id .'" data-productid="'. $row->id .'"  class="add_cart cart_btn float-right bg-gradient-to-r from-[#fb1a1b] to-[#f77373] rounded-2xl px-[26px] py-1 text-white ml-3 hover:from-[#f77373] hover:to-[#fb1a1b] duration-200 space-x-2 relative lg:cursor-pointer btn-add-'. $row->id .'">
                                <button class="lg:cursor-pointer cursor-default">&#x20AC;'. $row->price.'</button>
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                    </div>
                
				';

			}
			$output .= '</div></div>';

		}

		else

		{

			$output .= '
                    <div class="text-[#ff3131] text-center col-span-12 text-5xl font-extrabold"> Item Not Found </div>
			';

								$output .= '</div></div> ,<!-- Row End -->';






		}


			$this->output

				->set_content_type('application/json')

				->set_output(json_encode(array('status'=> 1, 'html'=>$output)));

		}else{

		           $this->output

        ->set_content_type('application/json')

        ->set_output(json_encode(array('status'=> 0, 'html'=>$output))); 

		}

		//echo $this->db->last_query(); exit();

		





	}

	

}

