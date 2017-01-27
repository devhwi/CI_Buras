<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }
  }

  function index() {
    $this->load->view('header');
    $this->load->view('main');
    $this->load->view('footer');
  }
}
