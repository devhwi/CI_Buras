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
    $view_params['board_count'] = $this->MBoard->get_board_count($category);

    /* Pagination Configuration */
    $config['base_url'] = base_url().'Board/'.$category.'/page/';
    $config['total_rows'] = $view_params['board_count'];
    $config['per_page'] = 10;
    $config['num_links'] = 5;
    $config['first_url'] = '1';
    $config['uri_segment'] = 4;
    $config['use_page_numbers'] = TRUE;
    // pagination start/end
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    // next
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    // previous
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    // current page
    $config['cur_tag_open'] = '<li class="page-item"><a class="page-link"><b>';
    $config['cur_tag_close'] = '</b></a></li>';
    // other pages
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    // other pages attributes
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    if ($this->uri->segment(4) > 0) {
      $offset = ($this->uri->segment(4) + 0) * $config['per_page'] - $config['per_page'];
    } else {
      $offset = $this->uri->segment(4);
    }

    $view_params['board_list'] = $this->MBoard->get_board_list($category, $config['per_page'], $offset);

    $this->load->view('header');
    $this->load->view('board_list', $view_params);
    $this->load->view('footer');
  }

  function detail() {
    if(!($this->uri->segment(3))) {
      general_error_msg();
    }

    $board_id = $this->uri->segment(3);

    $view_params['detail'] = $this->MBoard->get_board_detail($board_id);
    $view_params['reply'] = $this->MBoard->get_reply($board_id);
    $view_params['reply_count'] = $this->MBoard->get_reply_count($board_id);

    $this->load->view('header');
    $this->load->view('board_detail', $view_params);
    $this->load->view('footer');
  }
}
