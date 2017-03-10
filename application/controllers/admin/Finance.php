<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller{
  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check (rental & web master)
      if(admin_check() != 9 || admin_check() != 10) {
        admin_error_msg();
      }
    }

    $this->load->model('admin/MFinance');
  }

  /**
   * Finance list (default)
   */
  function index() {
    $view_params['finance_list'] = $this->MFinance->get_finance_list();

    $this->load->view('admin/header');
    $this->load->view('admin/finance_list', $view_params);
    $this->load->view('admin/footer');
  }

  /**
   * Finance - payment
   */
  function payment() {
    if(! $this->input->post('finance_id')) {
      general_error_msg();
    }

    // update payment
    $id = $this->input->post('finance_id');
    $this->MFinance->update_payment($id);

    redirect('admin/Finance', 'refresh');
  }
}
