<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('MMember');
  }

  function index() {

    $user = "";
    $season = "";

    if($this->input->post('user_name') && $this->input->post('user_season')){
      $user = $this->input->post('user_name');
      $season = $this->input->post('user_season');
    }

    $view_params['member'] = $this->MMember->get_members($user, $season);
    $view_params['season_list'] = $this->MMember->get_season_list();

    $this->load->view('header');
    $this->load->view('member', $view_params);
    $this->load->view('footer');
  }
}
