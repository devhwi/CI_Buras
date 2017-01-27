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
  }

  function index() {
    $this->load->view('admin/header');
    $this->load->view('admin/main');
    $this->load->view('admin/footer');
  }

}
