<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct() {
    parent::__construct();

    $this->load->model('MLogin');
  }

  function index() {
    // If session isset, redirect to Main controller
    if(session_check()){
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
      if($result->user_level == 0) {
        echo "<script>alert('가입 대기중입니다. 관리자에게 문의해 주세요.')</script>";
        redirect('Login', 'refresh');
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

        echo "<script>alert('안녕하세요.')</script>";
        // redirect('Main', 'refresh');
      } else {
        echo "<script>alert('아이디, 비밀번호를 확인해 주세요.')</script>";
        redirect('Login', 'refresh');
      }
    } else {
      echo "<script>alert('빈칸은 허용하지 않습니다.');</script>";
      redirect('Login', 'refresh');
    }
  }

  function logout() {
		// Remove session
		$this->session->sess_destroy();
		redirect('Login');
	}
}
