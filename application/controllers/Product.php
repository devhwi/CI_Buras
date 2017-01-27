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
  }

  function list() {
    $genre = $this->input->post('genre');
    $type  = $this->input->post('type');

    $view_params['list'] = $this->MProduct->get_product_list($type, $genre);

    $view_params['sel_genre'] = $genre;
    $view_params['sel_type']  = $type;

    $view_params['genre'] = $this->MProduct->get_genre();
    $view_params['type'] = $this->MProduct->get_type();

    $this->load->view('header');
    $this->load->view('product', $view_params);
    $this->load->view('footer');
  }

  function detail() {
    if(!($this->uri->segment(3))) {
      general_error_msg();
    }

    $id = $this->uri->segment(3);
    $seq = $this->uri->segment(4);

    $view_params['detail'] = $this->MProduct->get_detail($id);
    $view_params['status'] = $this->MProduct->get_detail_each_status($id);
    $view_params['image'] = $this->MProduct->get_image_except_thumbnail($id);

    $this->load->view('header');
    $this->load->view('product_detail', $view_params);
    $this->load->view('footer');
  }

  function request() {
    if(!($this->uri->segment(3) && $this->uri->segment(4))) {
      general_error_msg();
    }

    $id = $this->uri->segment(3);
    $seq = $this->uri->segment(4);

    $view_params['seq'] = $seq;
    $view_params['id'] = $id;
    $view_params['detail'] = $this->MProduct->get_detail_request($id, $seq);

    $this->load->view('header');
    $this->load->view('product_request', $view_params);
    $this->load->view('footer');
  }
}
