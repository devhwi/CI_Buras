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

    $view_params['search_member'] = "";
    $view_params['search_season'] = "";

    if($this->input->post('user_name') || $this->input->post('user_season')){
      $user = $this->input->post('user_name');
      $season = $this->input->post('user_season');

      $view_params['search_member'] = $user;
      $view_params['search_season'] = $season;
    }

    $view_params['member'] = $this->MMember->get_members($user, $season);
    $view_params['season_list'] = $this->MMember->get_season_list();

    $this->load->view('header');
    $this->load->view('member', $view_params);
    $this->load->view('footer');
  }

  function myInfo() {
    $view_params['user'] = $this->MMember->get_member($this->session->userdata('user_id'));

    $this->load->view('header');
    $this->load->view('myInfo', $view_params);
    $this->load->view('footer');
  }

  function editMyInfo() {
    $user_id = $this->session->userdata('user_id');
    // set POST values
    $user_password = $this->input->post('user_password');
    $user_password_confirm = $this->input->post('user_password_confirm');
    $user_name = $this->input->post('user_name');
    $user_season = $this->input->post('user_season');
    $user_enter = $this->input->post('user_enter');
    $user_phone = $this->input->post('user_phone');
    $user_major = $this->input->post('user_major');
    $user_birth = $this->input->post('user_birth');
    $user_email = $this->input->post('user_email');

    // password check
    $change_password_tf = FALSE;
    $error_message = "비밀번호 입력을 확인해 주세요.";

    if($user_password == "" && $user_password_confirm == "") {
      $change_password_tf = FALSE;
    }else if($user_password != "" && $user_password_confirm != "") {
      if($user_password != $user_password_confirm){
        echo "<script>alert('".$error_message."');</script>";
        redirect('Member/myInfo', 'refresh');
      }else{
        $change_password_tf = TRUE;
      }
    }else {
      echo "<script>alert('".$error_message."');</script>";
      redirect('Member/myInfo', 'refresh');
    }

    // make array if changing password is allowed
    if($change_password_tf){
      $data = array(
        'user_password' => md5($user_password),
        'user_name' => $user_name,
        'user_birth' => $user_birth,
        'user_email' => $user_email,
        'user_enter' => $user_enter,
        'user_major' => $user_major,
        'user_phone' => $user_phone,
        'user_season' => $user_season
      );
    }else{
      $data = array(
        'user_name' => $user_name,
        'user_birth' => $user_birth,
        'user_email' => $user_email,
        'user_enter' => $user_enter,
        'user_major' => $user_major,
        'user_phone' => $user_phone,
        'user_season' => $user_season
      );
    }

    $this->MMember->edit_my_info($data);

    //echo "<script>alert('저장되었습니다.');</script>";
    redirect('Member/myInfo', 'refresh');
  }
}
