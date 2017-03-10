<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct() {
    parent::__construct();

    $this->load->model('MMain');
  }

  function index() {
    $view_params['notice'] = $this->MMain->get_latest_board_list(1);
    $view_params['poster'] = "";
    $view_params['boy'] = $this->MMain->get_leader(1);
    $view_params['girl'] = $this->MMain->get_leader(2);

    $this->load->view('header');
    $this->load->view('main', $view_params);
    $this->load->view('footer');
  }
}
