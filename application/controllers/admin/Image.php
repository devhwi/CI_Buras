<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller{

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

    $this->load->model('admin/MImage');
  }

  function index() {
    // initialize
    $view_params['selected_id'] = "";
    $view_params['image_list'] = NULL;

    $view_params['id_list'] = $this->MImage->get_product_id_list();

    if($this->input->post('product_id')){
      $view_params['selected_id'] = $this->input->post('product_id');
      $view_params['image_list'] = $this->MImage->get_product_list_by_id($this->input->post('product_id'));
    }

    $this->load->view('admin/header');
    $this->load->view('admin/image_list', $view_params);
    $this->load->view('admin/footer');
  }

  function upload() {

  }
}
