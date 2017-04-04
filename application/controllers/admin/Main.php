<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check
      if(!(admin_check() >= 7)) {
        admin_error_msg();
      }
    }

    $this->load->model('admin/MMain');
  }

  function index() {
    $view_params['total_board']  = $this->MMain->get_board_count();
    $view_params['total_reply']  = $this->MMain->get_reply_count();
    $view_params['ing_rental']   = $this->MMain->get_rental_ing();
    $view_params['ing_finance']  = $this->MMain->get_finance_ing();
    $view_params['main_images']  = $this->MMain->get_main_images();
    $view_params['main_poster']  = $this->MMain->get_main_poster();
    $view_params['boy_contact'] = $this->MMain->get_boy_contacts();
    $view_params['girl_contact']= $this->MMain->get_girl_contacts();
    $view_params['members']      = $this->MMain->get_members();

    $this->load->view('admin/header');
    $this->load->view('admin/main', $view_params);
    $this->load->view('admin/footer');
  }

  function edit_main_image() {
    if(admin_check() != 7 || admin_check() != 10) {
      admin_error_msg();
    }
    // file upload config
    $config['upload_path'] = './assets/img/main/';
    $config['allowed_types'] = 'jpg';
    $config['max_size'] = "10240";
    $config['max_width'] = "4096";
    $config['max_height'] = "4096";
    $config['file_name'] = $this->input->post('code_seq');
    $config['remove_spaces'] = TRUE;
    $config['overwrite'] = TRUE;

    $this->load->library('upload', $config);

    // $files_name = $_FILES['code_desc']['name'];
    // $files = $_FILES['code_desc'];

    if(! $this->upload->do_upload('code_desc') ) {
      echo "<script>alert('파일 업로드에 실패하였습니다.');</script>";
      redirect('admin/Main', 'refresh');
    } else {
      $uploaded_file = $this->upload->data();
      $file_name = $uploaded_file['file_name'];

      redirect('admin/Main', 'refresh');
    }
  }

  function edit_leaders() {
    if(admin_check() != 7 || admin_check() != 10) {
      admin_error_msg();
    }

    $boy = $this->input->post('boy');
    $girl= $this->input->post('girl');

    $this->MMain->edit_leader('contact_boy' , $boy );
    $this->MMain->edit_leader('contact_girl', $girl);

    redirect('admin/Main', 'refresh');
  }

  function edit_main_poster() {
    if(admin_check() != 7 || admin_check() != 10) {
      admin_error_msg();
    }
    // file upload config
    $config['upload_path'] = './assets/img/main/';
    $config['allowed_types'] = 'jpg';
    $config['max_size'] = "10240";
    $config['max_width'] = "4096";
    $config['max_height'] = "4096";
    $config['file_name'] = "poster";
    $config['remove_spaces'] = TRUE;
    $config['overwrite'] = TRUE;

    $this->load->library('upload', $config);

    // $files_name = $_FILES['code_desc']['name'];
    // $files = $_FILES['code_desc'];

    if(! $this->upload->do_upload('code_desc') ) {
      echo "<script>alert('파일 업로드에 실패하였습니다.');</script>";
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
      redirect('admin/Main', 'refresh');
    } else {
      $uploaded_file = $this->upload->data();
      $file_name = $uploaded_file['file_name'];

      redirect('admin/Main', 'refresh');
    }
  }
}
