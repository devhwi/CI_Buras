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
      if(admin_check() != 8) {
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
    $view_params['type'] = $this->MProduct->get_type();
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
    $view_params['type'] = $this->MProduct->get_type();;
    $view_params['genre'] = $this->MProduct->get_genre();

    $this->load->view('admin/header');
    $this->load->view('admin/product_list', $view_params);
    $this->load->view('admin/footer');
  }
  /**
   * 물품 추가
   */
  function add_goods() {
    if( ! ($this->input->post('product_id'))) {
      general_error_msg();
    }

    $dttm = date("Y-m-d H:i:s");

    if($this->input->post('additional') == "on") {
      $name = $this->MProduct->get_exist_product_name($this->input->post('product_id'));
    }else {
      $name = $this->input->post('product_name');
    }

    for($i = 1; $i <= $this->input->post('product_count'); $i++) {
      $seq =  $this->MProduct->get_max_seq_by_product($this->input->post('product_id'));

      $data = array(
        'product_id' => $this->input->post('product_id')
      , 'product_name' => $name
      , 'product_seq' => $seq
      , 'product_type' => $this->input->post('product_type')
      , 'product_genre' => $this->input->post('product_genre')
      , 'product_status' => 1
      , 'product_dttm' => $dttm
      );

      $this->MProduct->add_goods($data);
    }

    redirect('admin/Product/goods', 'refresh');
  }

  /**
   * 물품 삭제
   */
  function delete_goods() {
    if(!($this->input->post('product_id'))) {
      general_error_msg();
    }

    $id = $this->input->post('product_id');
    $seq = $this->input->post('product_seq');

    $this->MProduct->delete_goods($id, $seq);

    redirect('admin/Product/goods', 'refresh');
  }
}
