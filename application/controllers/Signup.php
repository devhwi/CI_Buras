<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller{

  public function __construct() {
    parent::__construct();

    $this->load->model('MSignup');

    if(session_check()) {
      session_error_msg();
    }
  }

  function index() {
    // $this->load->view('header');
    $this->load->view('signup');
    $this->load->view('footer');
  }

  function register() {
    if($this->input->post()){
      $user_count = 0;

      $check = TRUE;

      // Null check
      if(NULL == $this->input->post('user_id') || "" == $this->input->post('user_id')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[아이디]')</script>";
        $check = FALSE;
      }
      if(!($this->MSignup->check_id($this->input->post('user_id')))){
        echo "<script>alert('중복된 아이디입니다.')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_password') || "" == $this->input->post('user_password')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[비밀번호]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_password_confirm') || "" == $this->input->post('user_password_confirm')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[비밀번호확인]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_season') || "" == $this->input->post('user_season')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[기수]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_email') || "" == $this->input->post('user_email')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[이메일]')</script>";
        $check = FALSE;
      }
      if(NULL == $this->input->post('user_phone') || "" == $this->input->post('user_phone')){
        echo "<script>alert('필수 입력값이 누락되었습니다.[전화번호]')</script>";
        $check = FALSE;
      }

      // Check password
      if($this->input->post('user_password') != $this->input->post('user_password_confirm')){
        echo "<script>alert('비밀번호가 일치하지 않습니다.')</script>";
        $check = FALSE;
      }

      if(!$check){
        echo "<script>history.back(-1);</script>";
      }

      $data = array(
          'user_id'               => $this->input->post('user_id'),
          'user_password'         => md5($this->input->post('user_password')), // md5
          'user_name'             => $this->input->post('user_name'),
          'user_season'           => $this->input->post('user_season'),
          'user_major'            => $this->input->post('user_major'),
          'user_enter'            => $this->input->post('user_enter'),
          'user_birth'            => $this->input->post('user_birth'),
          'user_email'            => $this->input->post('user_email'),
          'user_phone'            => $this->input->post('user_phone'),
          'user_level'            => 0, // default level = 0
      );
      $user_count = $this->MSignup->register_user($data);

      if($user_count > 0) {
        echo "<script>alert('등록되었습니다. 승인을 기다려주세요.')</script>";
        redirect(base_url(), 'refresh');
      }
    }else {
      echo "<script>alert('올바르지 않은 요청입니다.')</script>";
      redirect('Signup', 'refresh');
    }
  }
}
