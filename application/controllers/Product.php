<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }
    $this->load->model('MProduct');
    $this->load->library('pagination');
  }

  function list() {
    // pagination 고민중..
    // $config['per_page'] = 1;
    // $config['uri_segment'] = 3;
    // $config['num_links'] = 2;
    // $config['page_query_string'] = TRUE;
    // $config['total_rows'] = 1000;
    //
    // $config['query_string_segment'] = 'page';
    //
    // $config['full_tag_open'] = '<div class="pagination"><ul>';
    // $config['full_tag_close'] = '</ul></div><!--pagination-->';
    //
    // $config['first_link'] = '&laquo; First';
    // $config['first_tag_open'] = '<li class="prev page">';
    // $config['first_tag_close'] = '</li>';
    //
    // $config['last_link'] = 'Last &raquo;';
    // $config['last_tag_open'] = '<li class="next page">';
    // $config['last_tag_close'] = '</li>';
    //
    // $config['next_link'] = 'Next &rarr;';
    // $config['next_tag_open'] = '<li class="next page">';
    // $config['next_tag_close'] = '</li>';
    //
    // $config['prev_link'] = '&larr; Previous';
    // $config['prev_tag_open'] = '<li class="prev page">';
    // $config['prev_tag_close'] = '</li>';
    //
    // $config['cur_tag_open'] = '<li class="active"><a href="">';
    // $config['cur_tag_close'] = '</a></li>';
    //
    // $config['num_tag_open'] = '<li class="page">';
    // $config['num_tag_close'] = '</li>';
    //
    // $config['anchor_class'] = 'follow_link';
    // $this->pagination->initialize($config);
    // echo $this->pagination->create_links();

    $style = $this->input->post('style');
    $genre = $this->input->post('genre');
    $type  = $this->input->post('type');
    $color = $this->input->post('color');


    $view_params['list'] = $this->MProduct->get_product_list($style, $genre, $type, $color);

    $view_params['sel_style'] = $style;
    $view_params['sel_genre'] = $genre;
    $view_params['sel_type']  = $type;
    $view_params['sel_color'] = $color;

    $view_params['style'] = $this->MProduct->get_style();
    $view_params['genre'] = $this->MProduct->get_genre();
    $view_params['type'] = $this->MProduct->get_type();
    $view_params['color'] = $this->MProduct->get_color();

    $this->load->view('header');
    $this->load->view('product', $view_params);
    $this->load->view('footer');
  }

  function detail() {
    if(!($this->uri->segment(3))) {
      general_error_msg();
    }

    $name = $this->uri->segment(3);

    $view_params['detail'] = $this->MProduct->get_detail($name);
    $view_params['status'] = $this->MProduct->get_detail_each_status($name);

    $this->load->view('header');
    $this->load->view('product_detail', $view_params);
    $this->load->view('footer');
  }
}
