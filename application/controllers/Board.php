<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('MBoard');
    $this->load->library('pagination');
  }

  function index() {
    if($this->uri->segment(2)) {
      $category = $this->uri->segment(2);
    } else {
      general_error_msg();
    }

    $view_params['category_id'] = $category;
    $view_params['categories'] = $this->MBoard->get_categories();
    $view_params['category_name'] = $this->MBoard->get_category($category);
    $view_params['board_list'] = $this->MBoard->get_board_list($category);
    $view_params['board_count'] = $this->MBoard->get_board_count($category);

    $config['base_url'] = base_url().'Board/'.$category.'/page/';
    $config['total_rows'] = $view_params['board_count'];
    $config['per_page'] = 1;
    $config['num_links'] = 2;
    $config['use_page_numbers'] = TRUE;

    $this->pagination->initialize($config);

    $this->load->view('header');
    $this->load->view('board_list', $view_params);
    $this->load->view('footer');
  }
}
