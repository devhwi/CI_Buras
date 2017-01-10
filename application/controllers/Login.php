<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct() {
    parent::__construct();

    $this->load->model('MLogin');
  }

  function index() {
    // If session isset, redirect to Main controller
    if($this->session->userdata('user_id')){
      redirect('Main', 'refresh');
    }

    // Login view
    // $this->load->view('header');
    $this->load->view('login');
    $this->load->view('footer');
  }

  function login_check() {
    // post value check
    if($this->input->post('user_id') && $this->input->post('user_password')) {
      $id = $this->input->post('user_id');
      $pw = $this->input->post('user_password');

      $result = $this->MLogin->check_id_password($id, $pw);

      if(NULL != $result) {
        // set session info
        $this->session->set_userdata('user_id'   , $user_data->user_id   );
    		$this->session->set_userdata('user_name' , $user_data->user_name );
    		$this->session->set_userdata('user_level', $user_data->user_level);
    		$this->session->set_userdata('user_birth', $user_data->user_birth);
    		$this->session->set_userdata('user_email', $user_data->user_email);
    		$this->session->set_userdata('user_field', $user_data->user_field);
    		$this->session->set_userdata('user_img'  , $user_data->user_img  );

        echo "<script>alert('안녕하세요.')</script>";
        redirect('Main', 'refresh');
      } else {
        echo "<script>alert('아이디, 비밀번호를 확인해 주세요.')</script>";
        redirect('Login', 'refresh');
      }
    } else {
      echo "<script>alert('빈칸은 허용하지 않습니다.');</script>";
      redirect('Login', refresh);
    }
  }
}
