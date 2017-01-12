<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rental extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('MRental');
    $this->load->model('MFinance');
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
    $rental_id = $this->MRental->register_rental($data);

    if($rental_id > 0) {
      $this->MRental->update_product_status($product);

      // add to finance table
      $data = array(
        'finance_ref' => $rental_id,
        'finance_status' => 0,
        'finance_sum' => 0, // 추후 금액 계산 과정 필요함(의상, 슈즈)
        'finance_dttm' => $dttm
      );
      $this->MFinance->add_finance($data);

      echo "<script>alert('신청 완료되었습니다. MY RENTAL에서 확인해주세요.');</script>";
      // my rental redirect
      redirect('Product/list', 'refresh');
    } else {
      general_error_msg();
    }
  }

  function my() {
    if($this->uri->segment(3)) {
      $status = '';
    } else {
      $status = $this->uri->segment(3);
    }
    $user = $this->session->userdata('user_id');

    $view_params['my_all'] = $this->MRental->get_my_rental($user, '');
    $view_params['my_ing'] = $this->MRental->get_my_rental($user, 0);
    $view_params['my_ed']  = $this->MRental->get_my_rental($user, 1);

    $this->load->view('header');
    $this->load->view('myRental', $view_params);
    $this->load->view('footer');
  }
}
