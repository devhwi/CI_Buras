<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check
      if(!(admin_check() >= 8)) {
        admin_error_msg();
      }
    }

    $this->load->model('admin/MMain');
  }

  function index() {
    $view_params['total_board'] = $this->MMain->get_board_count();
    $view_params['total_reply'] = $this->MMain->get_reply_count();
    $view_params['ing_rental']  = $this->MMain->get_rental_ing();
    $view_params['ing_finance'] = $this->MMain->get_finance_ing();
    
    $this->load->view('admin/header');
    $this->load->view('admin/main', $view_params);
    $this->load->view('admin/footer');
  }

}
