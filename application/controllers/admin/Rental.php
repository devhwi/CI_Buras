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

  }

  function delete_rental() {

  }
}
