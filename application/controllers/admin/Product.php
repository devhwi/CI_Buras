<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

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

    // Okay!
    $this->load->model('admin/MProduct');
  }

  /**
   * 물품 카테고리 리스트
   */
  function category() {
    $view_params['type'] = $this->MProduct->get_type();;
    $view_params['genre'] = $this->MProduct->get_genre();

    $this->load->view('admin/header');
    $this->load->view('admin/category_list', $view_params);
    $this->load->view('admin/footer');
  }

  /**
   * 물품 카테고리 추가
   */
  function add_category() {
    if(!($this->input->post('param_type') && ($this->input->post('type_desc') || $this->input->post('genre_desc')))) {
      general_error_msg();
    }

    $desc = "";
    $target_table = "";
    $param = $this->input->post('param_type');
    switch($param) {
      case "type":
        $desc = $this->input->post('type_desc');
        $target_table = "type";
        break;
      case "genre":
        $desc = $this->input->post('genre_desc');
        $target_table = "genre";
        break;
    }

    $this->MProduct->add_category($target_table, $desc);

    redirect('admin/Product/category', 'refresh');
  }

  /**
   * 물품 카테고리 삭제
   */
   function delete_category() {
     if(!($this->input->post('param_type') && ($this->input->post('type_id') || $this->input->post('genre_id')))) {
       general_error_msg();
     }

     $id = "";
     $target_table = "";
     $param = $this->input->post('param_type');
     switch($param) {
       case "type":
         $id = $this->input->post('type_id');
         $target_table = "type";
         break;
       case "genre":
         $id = $this->input->post('genre_id');
         $target_table = "genre";
         break;
     }

     $this->MProduct->delete_category($target_table, $id);

     redirect('admin/Product/category', 'refresh');
   }

  /**
   * 물품 리스트
   */
  function goods() {
    $view_params['product'] = $this->MProduct->get_product_list();

    $this->load->view('admin/header');
    $this->load->view('admin/product_list', $view_params);
    $this->load->view('admin/footer');
  }
}
