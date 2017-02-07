<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('MMain');
  }

  function index() {
    $category = $this->MMain->get_category();

    foreach ($category as $k => $row) {
      $view_params[$row['category_eng']] = $this->MMain->get_latest_board_list($row['category_id']);
    }

    $this->load->view('header');
    $this->load->view('main', $view_params);
    $this->load->view('footer');
  }
}
