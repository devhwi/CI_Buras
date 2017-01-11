<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller{

  public function __construct() {
    parent::__construct();

    $this->load->model('MRental');
  }

  function register() {
    if( ! ( $this->input->post('rental_product') && $this->input->post('rental_user') ) ) {
      general_error_msg();
    }

    $product = $this->input->post('rental_product');
    $user = $this->input->post('rental_user');
    $dttm = date('Y-m-d H:i:s');

    if($this->MRental->check_product_valid($product) === 0) {
      echo "<script>alert('이미 대여중인 품목입니다.');</script>";
      redirect('Product/list', 'refresh');
    }

    $data = array(
      'rental_user' => $user,
      'rental_product' => $product,
      'rental_dttm' => $dttm,
      'rental_status' => 0
    );

    // add to rental table
    $rental_count = $this->MRental->register_rental($data);

    if($rental_count == 1) {
      $this->MRental->update_product_status($product);
      echo "<script>alert('신청 완료되었습니다. MY RENTAL에서 확인해주세요.');</script>";
      // my rental redirect
      redirect('Product/list', 'refresh');
    } else {
      general_error_msg();
    }
  }
}
