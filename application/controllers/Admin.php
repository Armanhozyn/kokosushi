<?php
class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
		$this->load->model("Ticker_Model");
		$this->load->model("Products_Model");
		$this->load->model("Category_Model");
		$this->load->model("Setting_Model");
       // $this->load->model("Student_Model");
/*        $this->load->model("Course_Model");
        $this->load->model("Payment_Model");
        $this->load->model("Site_Model");
        $this->load->model("Instructor_Model");
        $this->load->model("Batch_Model");

    */
	}

    public function index(){
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
        {
            // redirect them to the home page because they must be an administrator to view this
            $this->session->set_flashdata('message', 'You must be an admin to view this page');
            redirect('auth/logout');
        }

        // echo "admin/index";
       // echo G::path("js");

        $page_data = array();
        $page_data['page_name'] = 'index';
        $page_data['user'] =     $user = $this->ion_auth->user()->row();
        $page_data['totalPaidStats'] = 0;
        $page_data['totalFeeStats'] = 0;
        $page_data['totalDiscoutStats'] =0;
        $page_data['totalpendingStudentCount'] = 0;
        $page_data['totalCurrentStudentCount'] = 0;
        $page_data['totalDueStudent'] = 0;

        $this->load->view('master_admin',$page_data);
    }



	/********
	 * Tickers
	 */

    public function ticker_list(){
        //  var_dump($this->Student_Model->getStudentList());
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }else{
            if (!$this->ion_auth->is_admin())
            {
                $this->session->set_flashdata('message', 'You must be an admin to view this page');
                redirect('auth/logout');
            }else{
                $page_data = array();
                $page = new stdClass();
                $page->title = "Ticker List";
                $page->desc = "";
                $page->key = "";
                $page->author = "";
                $page_data['site'] = $page;
                $this->load->library('pagination');
                $config['base_url'] = site_url("admin/ticker_list");
                $config['total_rows'] = $this->Ticker_Model->countTickerList();
                $config['per_page'] = 10;
                $config['num_links'] = 5;
                $config['full_tag_open'] = '<ul class="rs-pagination pagination pull-right">';
                $config['full_tag_close'] = '</ul>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="disabled"><a href="javascript: void(0)"><b style="color: #000000">';
                $config['cur_tag_close'] = '</b></a></li>';
                $config['prev_link'] = '&lt&lt;';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&gt;&gt;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $page_data["links"] = $this->pagination->create_links();
                $page_data['list'] = $this->Ticker_Model->getTickerList($config['per_page'], $this->uri->segment(3));

                // var_dump($page_data['list']); exit();

                $page_data['user'] =     $user = $this->ion_auth->user()->row();

                $page_data['page_name'] = 'ticker_list';
                //$page_data['user_info'] = $user;
                $this->load->view('master_admin', $page_data);
            }

        }
    }


    public function ticker_add(){
        $this->load->library("form_validation");

        $this->form_validation->set_rules('ticker_text','Ticker Text','required');

        if($this->form_validation->run() == false){
            $page_data = array();
            $page_data['page_name'] = 'ticker_add';
            //$page_data['user_info'] = $user;

            $page_data['user'] =     $user = $this->ion_auth->user()->row();

            //var_dump($page_data['instructor_list']); exit();
            $this->load->view('master_admin', $page_data);
        }else{
            $data  = array();
            $data['ticker_text'] =  $this->input->post('ticker_text');
            $data['order'] =  $this->input->post('order')=='' ? null : $this->input->post('order');
            $data['time_added'] =  $this->g->getTime();
            $data['added_by'] =  $this->g->getUser();
            $data['status'] =  1;
            if($this->Ticker_Model->addTicker($data)){
                $this->session->set_flashdata('success','Ticker Added successfully!');
                redirect("admin/ticker_list", 'refresh');
            }else{
                $this->session->set_flashdata('error',"Write to database failed. Please try again later.");
                redirect("admin/ticker_add", 'refresh');
            }
        }
    }

    public function ticker_edit($id){
        $this->load->library("form_validation");

        $this->form_validation->set_rules('ticker_text','Ticker Text','required');

        if($this->form_validation->run() == false){
            $page_data = array();
            $page_data['page_name'] = 'ticker_edit';
            $page_data['info'] = $this->Ticker_Model->getTickerInfo($id);
            //$page_data['user_info'] = $user;

            $page_data['user'] =     $user = $this->ion_auth->user()->row();

            //var_dump($page_data['instructor_list']); exit();
            $this->load->view('master_admin', $page_data);
        }else{
            $data  = array();
            $data['ticker_text'] =  $this->input->post('ticker_text');
			$data['order'] =  $this->input->post('order')=='' ? null : $this->input->post('order');
            $data['status'] =  1;
            if($this->Ticker_Model->updateTicker($data, $id)){
                $this->session->set_flashdata('success','Ticker updated successfully!');
                redirect("admin/ticker_list", 'refresh');
            }else{
                $this->session->set_flashdata('error',"Write to database failed. Please try again later.");
                redirect("admin/ticker_edit", 'refresh');
            }
        }
    }


    public function ticker_delete($id){
        if($this->Ticker_Model->deleteTicker($id)){
            $this->session->set_flashdata('success','Ticker deleted successfully!');
            redirect("admin/ticker_list", 'refresh');
        }else{
            $this->session->set_flashdata('error',"Write to database failed. Please try again later.");
            redirect("admin/ticker_list", 'refresh');
        }
    }

	/********
	 * Tickers End
	 */

	/********
	 * Category
	 */

	public function category_list(){
		//  var_dump($this->Student_Model->getStudentList());
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}else{
			if (!$this->ion_auth->is_admin())
			{
				$this->session->set_flashdata('message', 'You must be an admin to view this page');
				redirect('auth/logout');
			}else{
				$page_data = array();
				$page = new stdClass();
				$page->title = "Category List";
				$page->desc = "";
				$page->key = "";
				$page->author = "";
				$page_data['site'] = $page;
				$this->load->library('pagination');
				$config['base_url'] = site_url("admin/category_list");
				$config['total_rows'] = $this->Category_Model->countCategoryList();
				$config['per_page'] = 10;
				$config['num_links'] = 5;
				$config['full_tag_open'] = '<ul class="rs-pagination pagination pull-right">';
				$config['full_tag_close'] = '</ul>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="disabled"><a href="javascript: void(0)"><b style="color: #000000">';
				$config['cur_tag_close'] = '</b></a></li>';
				$config['prev_link'] = '&lt&lt;';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$config['next_link'] = '&gt;&gt;';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['first_link'] = 'First';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Last';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$page_data["links"] = $this->pagination->create_links();
				$page_data['list'] = $this->Category_Model->getCategoryList($config['per_page'], $this->uri->segment(3));

				// var_dump($page_data['list']); exit();

				$page_data['user'] =     $user = $this->ion_auth->user()->row();

				$page_data['page_name'] = 'category_list';
				//$page_data['user_info'] = $user;
				$this->load->view('master_admin', $page_data);
			}

		}
	}


	public function category_add(){
		$this->load->library("form_validation");

		$this->form_validation->set_rules('cat_name','Category Name','required');

		if($this->form_validation->run() == false){
			$page_data = array();
			$page_data['page_name'] = 'category_add';
			//$page_data['user_info'] = $user;

			$page_data['user'] =     $user = $this->ion_auth->user()->row();

			//var_dump($page_data['instructor_list']); exit();
			$this->load->view('master_admin', $page_data);
		}else{
			$data  = array();
			$data['cat_name'] =  $this->input->post('cat_name');
			$data['order'] =  $this->input->post('order')==''? null : $this->input->post('order');
			//$data['time_added'] =  $this->g->getTime();
			//$data['added_by'] =  $this->g->getUser();
			$data['status'] =  1;
			if($this->Category_Model->addCategory($data)){
				$this->session->set_flashdata('success','Category Added successfully!');
				redirect("admin/category_list", 'refresh');
			}else{
				$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
				redirect("admin/category_add", 'refresh');
			}
		}
	}

	public function category_edit($id){
		$this->load->library("form_validation");

		$this->form_validation->set_rules('cat_name','Category Name','required');

		if($this->form_validation->run() == false){
			$page_data = array();
			$page_data['page_name'] = 'category_edit';
			$page_data['info'] = $this->Category_Model->getCategoryInfo($id);
			//$page_data['user_info'] = $user;

			$page_data['user'] =     $user = $this->ion_auth->user()->row();

			//var_dump($page_data['instructor_list']); exit();
			$this->load->view('master_admin', $page_data);
		}else{
			$data  = array();
			$data  = array();
			$data['cat_name'] =  $this->input->post('cat_name');
			$data['order'] =  $this->input->post('order')==''? null : $this->input->post('order');
			$data['status'] =  1;
			if($this->Category_Model->updateCategory($data, $id)){
				$this->session->set_flashdata('success','Category updated successfully!');
				redirect("admin/category_list", 'refresh');
			}else{
				$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
				redirect("admin/category_edit", 'refresh');
			}
		}
	}


	public function category_delete($id){
		if($this->Category_Model->deleteCategory($id)){
			$this->session->set_flashdata('success','Category deleted successfully!');
			redirect("admin/category_list", 'refresh');
		}else{
			$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
			redirect("admin/category_list", 'refresh');
		}
	}

	/********
	 * category End
	 */


	/********
	 * Product
	 */

	public function product_list(){
		//  var_dump($this->Student_Model->getStudentList());
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}else{
			if (!$this->ion_auth->is_admin())
			{
				$this->session->set_flashdata('message', 'You must be an admin to view this page');
				redirect('auth/logout');
			}else{
				$page_data = array();
				$page = new stdClass();
				$page->title = "Product List";
				$page->desc = "";
				$page->key = "";
				$page->author = "";
				$page_data['site'] = $page;
				$this->load->library('pagination');
				$config['base_url'] = site_url("admin/product_list");
				$config['total_rows'] = $this->Products_Model->countProductList();
				$config['per_page'] = 10;
				$config['num_links'] = 5;
				$config['full_tag_open'] = '<ul class="rs-pagination pagination pull-right">';
				$config['full_tag_close'] = '</ul>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="disabled"><a href="javascript: void(0)"><b style="color: #000000">';
				$config['cur_tag_close'] = '</b></a></li>';
				$config['prev_link'] = '&lt&lt;';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$config['next_link'] = '&gt;&gt;';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['first_link'] = 'First';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Last';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$page_data["links"] = $this->pagination->create_links();
				$page_data['list'] = $this->Products_Model->getProductList($config['per_page'], $this->uri->segment(3));

				// var_dump($page_data['list']); exit();

				$page_data['user'] =     $user = $this->ion_auth->user()->row();

				$page_data['page_name'] = 'product_list';
				//$page_data['user_info'] = $user;
				$this->load->view('master_admin', $page_data);
			}

		}
	}


	public function product_add(){
		$this->load->library("form_validation");

		$this->form_validation->set_rules('display_id','Display ID','required');
		$this->form_validation->set_rules('name','Category Name','required');
/*		$this->form_validation->set_rules('attr1','Attribute 1','required');
		$this->form_validation->set_rules('attr2','Attribute 2','required');*/
		$this->form_validation->set_rules('price','Product Price','required');
		$this->form_validation->set_rules('cat_id','Category','required');


		if($this->form_validation->run() == false){
			$page_data = array();
			$page_data['page_name'] = 'product_add';
			$page_data['categoryList'] = $this->Category_Model->getCategoryListKeyValuePair();
			//$page_data['user_info'] = $user;

			$page_data['user'] =     $user = $this->ion_auth->user()->row();

			//var_dump($page_data['instructor_list']); exit();
			$this->load->view('master_admin', $page_data);
		}else{
			$data  = array();
			$data['display_id'] =  $this->input->post('display_id');
			$data['name'] =  $this->input->post('name');
			$data['attr1'] =  $this->input->post('attr1')==''? null : $this->input->post('attr1');;
			$data['attr2'] =  $this->input->post('attr2')==''? null : $this->input->post('attr2');
			$data['price'] =  $this->input->post('price');
			$data['cat_id'] =  $this->input->post('cat_id');
/*			$data['time_added'] =  $this->g->getTime();
			$data['added_by'] =  $this->g->getUser();*/
			$data['status'] =  1;
			if($this->Products_Model->addProduct($data)){
				$this->session->set_flashdata('success','Product Added successfully!');
				redirect("admin/product_list", 'refresh');
			}else{
				$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
				redirect("admin/product_add", 'refresh');
			}
		}
	}

	public function product_edit($id){
		$this->load->library("form_validation");

		$this->form_validation->set_rules('display_id','Display ID','required');
		$this->form_validation->set_rules('name','Category Name','required');
		/*		$this->form_validation->set_rules('attr1','Attribute 1','required');
				$this->form_validation->set_rules('attr2','Attribute 2','required');*/
		$this->form_validation->set_rules('price','Product Price','required');
		$this->form_validation->set_rules('cat_id','Category','required');


		if($this->form_validation->run() == false){
			$page_data = array();
			$page_data['page_name'] = 'product_edit';
			$page_data['categoryList'] = $this->Category_Model->getCategoryListKeyValuePair();
			$page_data['info'] = $this->Products_Model->getProductInfo($id);
			//$page_data['user_info'] = $user;

			$page_data['user'] =     $user = $this->ion_auth->user()->row();

			//var_dump($page_data['instructor_list']); exit();
			$this->load->view('master_admin', $page_data);
		}else{
			$data  = array();
			$data['display_id'] =  $this->input->post('display_id');
			$data['name'] =  $this->input->post('name');
			$data['attr1'] =  $this->input->post('attr1')==''? null : $this->input->post('attr1');;
			$data['attr2'] =  $this->input->post('attr2')==''? null : $this->input->post('attr2');
			$data['price'] =  $this->input->post('price');
			$data['cat_id'] =  $this->input->post('cat_id');
			$data['status'] =  1;
			if($this->Products_Model->updateProduct($data, $id)){
				$this->session->set_flashdata('success','Product updated successfully!');
				redirect("admin/product_list", 'refresh');
			}else{
				$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
				redirect("admin/product_edit", 'refresh');
			}
		}
	}


	public function product_delete($id){
		if($this->Products_Model->deleteProduct($id)){
			$this->session->set_flashdata('success','Product deleted successfully!');
			redirect("admin/product_list", 'refresh');
		}else{
			$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
			redirect("admin/product_list", 'refresh');
		}
	}

	/********
	 * Product End
	 */


	/*************
	 * Setting
	 */
	public function setting_list(){
		//  var_dump($this->Student_Model->getStudentList());
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}else{
			if (!$this->ion_auth->is_admin())
			{
				$this->session->set_flashdata('message', 'You must be an admin to view this page');
				redirect('auth/logout');
			}else{
				$page_data = array();
				$page = new stdClass();
				$page->title = "Setting List";
				$page->desc = "";
				$page->key = "";
				$page->author = "";
				$page_data['site'] = $page;
				$this->load->library('pagination');
				$config['base_url'] = site_url("admin/setting_list");
				$config['total_rows'] = $this->Setting_Model->countSettingList();
				$config['per_page'] = 10;
				$config['num_links'] = 5;
				$config['full_tag_open'] = '<ul class="rs-pagination pagination pull-right">';
				$config['full_tag_close'] = '</ul>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="disabled"><a href="javascript: void(0)"><b style="color: #000000">';
				$config['cur_tag_close'] = '</b></a></li>';
				$config['prev_link'] = '&lt&lt;';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$config['next_link'] = '&gt;&gt;';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['first_link'] = 'First';
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Last';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$page_data["links"] = $this->pagination->create_links();
				$page_data['list'] = $this->Setting_Model->getSettingList($config['per_page'], $this->uri->segment(3));

				// var_dump($page_data['list']); exit();

				$page_data['user'] =     $user = $this->ion_auth->user()->row();

				$page_data['page_name'] = 'setting_list';
				//$page_data['user_info'] = $user;
				$this->load->view('master_admin', $page_data);
			}

		}
	}

	public function setting_edit($id){
		$this->load->library("form_validation");

		$this->form_validation->set_rules('name','Key Name','required');
		$this->form_validation->set_rules('value','Value','required');



		if($this->form_validation->run() == false){
			$page_data = array();
			$page_data['page_name'] = 'setting_edit';

			$page_data['info'] = $this->Setting_Model->getSettingInfo($id);
			//$page_data['user_info'] = $user;

			$page_data['user'] =     $user = $this->ion_auth->user()->row();

			//var_dump($page_data['instructor_list']); exit();
			$this->load->view('master_admin', $page_data);
		}else{
			$data  = array();
			$data['name'] =  $this->input->post('name');
			$data['value'] =  $this->input->post('value');

			if($this->Setting_Model->updateSetting($data, $id)){
				$this->session->set_flashdata('success','Setting updated successfully!');
				redirect("admin/setting_list", 'refresh');
			}else{
				$this->session->set_flashdata('error',"Write to database failed. Please try again later.");
				redirect("admin/setting_edit", 'refresh');
			}
		}
	}



	/*************
	 * Setting End
	 */







	/*********************
     * Instructor End
     ********************/




    /************
     * REST API Starts
     */

    public function reject_registration($id){
        if($this->Student_Model->moveToPendingtoRejected($id)){
            $this->session->set_flashdata('success','Registration successfully rejected');
            redirect("admin/pending_student_list", 'refresh');
        }else{
            $this->session->set_flashdata('error','Write to database error. Reject the registration failed, Please try again');
            redirect("admin/pending_student_list", 'refresh');
        }
    }

    public function ajax_get_enrollCourseList($id){

        $data = $this->Course_Model->getEnrollListValuePair($id);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;

    }

    public function ajax_get_enrollinfox($id){
        $data = $this->Course_Model->getEnrollInfo($id);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }

    public function ajax_get_enrollinfo($id){
        $data = $this->Course_Model->getEnrollFullInfo($id);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }



    public function test(){
       // var_dump($this->Site_Model->getTotalPaymentStatics());

        //$this->load->view('email/course_payment');
       // $this->load->library("image_resize");
        //$this->image_resize->cropCenter(FCPATH. "public\\image\\trump.jpg" , FCPATH. "public\\image\\trump2.jpg",200,200);

       // var_dump($this->Student_Model->getDueStudentLis2());
       // xdebug_var_dump($this->Course_Model->getTotalDueByStudentId(1));
        xdebug_var_dump($this->Course_Model->getInstructorName(1));
        echo $this->db->last_query();
    }

}
