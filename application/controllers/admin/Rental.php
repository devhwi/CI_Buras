<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check (rental & web master)
      if(admin_check() != 8 && admin_check() != 10) {
        admin_error_msg();
      }
    }

    // Okay!!
    $this->load->model('admin/MRental');
  }

  function index() {
    $view_params['rental_list'] = $this->MRental->get_rental_list();

    $this->load->view('admin/header');
    $this->load->view('admin/rental_view', $view_params);
    $this->load->view('admin/footer');
  }

  function update_status() {
    if(! $this->input->post('rental_id')) {
      general_error_msg();
    }

    $id = $this->input->post('rental_id');

    // update status
    $this->MRental->update_status($id);

    // update product status
    $rental_product = $this->MRental->get_rental_product($id);
    $product = explode('-', $rental_product);
    $product_id = $product[0];
    $product_seq = $product[1];

    $this->MRental->update_product_status($product_id, $product_seq);

    redirect('admin/Rental', 'refresh');
  }

  function delete_rental() {

  }
}
