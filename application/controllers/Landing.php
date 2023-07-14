<?php

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $page_data = array();
        $page_data['page_name'] = 'index';
        $page_data['asset_url'] = base_url(). "assets/landing/";
        $this->load->view('master_landing', $page_data);
    }

    /**
     *
     */
    public function book_table_online(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('book_date','Book Date','required');
        $this->form_validation->set_rules('book_time','Book Time','required');
        $this->form_validation->set_rules('person','Person','required');
        $this->form_validation->set_rules('first_name','Person','required');
        $this->form_validation->set_rules('last_name','Person','required');
        $this->form_validation->set_rules('phone_number','Person','required');
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('error',validation_errors());
              redirect('landing/index','refresh');
        }else{
            $pdata = [];
            $pdata['book_date'] = $this->input->post('book_date');
            $pdata['book_time'] = $this->input->post('book_time');
            $pdata['person'] = $this->input->post('person');
            $pdata['first_name'] = $this->input->post('first_name');
            $pdata['last_name'] = $this->input->post('last_name');
            $pdata['phone_number'] = $this->input->post('phone_number');
            // load email library
            $this->load->library('email');
            $this->email->set_newline("\r\n");

            // prepare email
            $this->email
                ->from('order@kokorosushi.be', 'SYSTEM | KOKORO SUSHI & BENTO')
                ->to(array('kokorosushi21@gmail.com','raptor.dnj@gmail.com','rafusoft@gmail.com'))
                ->subject('New Online Table Booking')
                ->message($this->load->view('home/booking_mail',$pdata,true))
                ->set_mailtype('html');

            // send email
            $this->email->send();
            $this->session->set_flashdata('success','Your online table booking request submitted successfully.');
            redirect('landing/index','refresh');
        }
    }

}