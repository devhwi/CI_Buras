<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check
      if(admin_check() < 7) {
        echo "<script>alert(".admin_check().")</script>";
        admin_error_msg();
      }else{
        redirect('admin/Main', 'refresh');
      }
    }

    // Okay!
    $this->load->model('MLogin');
  }

  function index() {
    // no header
    $this->load->view('admin/login');
    $this->load->view('admin/footer');
  }

  function check() {
    if(!($this->input->post('user_id') && $this->input->post('user_password'))) {
      general_error_msg();
    }

    $id = $this->input->post('user_id');
    $pw = $this->input->post('user_password');

    $result = $this->MLogin->check_id_password($id, $pw);
    if($result && $result->user_level < 8) {
      admin_error_msg();
    }

    if($result) {
      // set session info
      $this->session->set_userdata('user_id'    , $result->user_id    );
      $this->session->set_userdata('user_name'  , $result->user_name  );
      $this->session->set_userdata('user_level' , $result->user_level );
      $this->session->set_userdata('user_birth' , $result->user_birth );
      $this->session->set_userdata('user_email' , $result->user_email );
      $this->session->set_userdata('user_phone' , $result->user_phone );
      $this->session->set_userdata('user_season', $result->user_season);
      $this->session->set_userdata('user_enter' , $result->user_enter );
      $this->session->set_userdata('user_major' , $result->user_major );

      redirect('admin/Main', 'refresh');
    } else {
      echo "<script>alert('아이디, 비밀번호를 확인해 주세요.')</script>";
      redirect('admin/Login', 'refresh');
    }
  }
}
