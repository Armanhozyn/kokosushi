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

		        <div class="row">

            <div class="col-md-12">

                <div class="bg-danger text-white cat">

                    <h4 class="cat-title">SEARCH</h4>

                </div>

            </div>

		';


//			echo $data->num_rows(); exit();

		if($data->num_rows() > 0)

		{

			foreach($data->result() as $row)

			{

				$output .= '

<div class="col-lg-6">

                    <div class="row" id="product-item">

                        <div class="col-lg-8 col-md-9 col-sm-8 col-8">

                            <div class="product-info">

                                <h5 class="product-title text-danger"> '. $row->display_id. ') '. $row->name.'</h5>

                                <p class="product-details">'.$row->attr1.'</p>

                            </div>

                        </div>

                        <div class="col-lg-4 col-md-3 col-sm-4 col-4" align="center">

                            <span class="price">€ '. $row->price.'</span>

                            <div><input id="qty_<?php echo $SUSHI_NIGIRI[$row][0]  ?>" name="qty" type="number" min="1" max="100" value="1" class="form-control form-control-sm cart-quantity-value"></div>

                            <button onclick="get_item(\''. $row->id .'\')" class="add_cart btn btn-sm btn-danger btn-cart btn-add-'. $row->id .'"  title="ADD TO CART" data-productname="'. $row->id .'" data-price="'. $row->id .'" data-productid="'. $row->id .'"><i class="fas fa-cart-plus"></i> ADD</button><br>

                        </div>

                    </div>

                </div>

				';

			}

		}

		else

		{

			$output .= '<div  class="col-lg-12">

                        <h3 style="text-align: center" class="text-danger" >No Item Found</h3>

                        </div>

						';

								$output .= '</div> ,<!-- Row End -->';






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

