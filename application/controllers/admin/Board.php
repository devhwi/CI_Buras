<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check (rental & web master)
      if(admin_check() != 10) {
        admin_error_msg();
      }
    }

    $this->load->model('admin/MBoard');
  }

  function post() {
    if( ! $this->uri->segment(4) ) {
      $category = 1;
    } else {
      $category = $this->uri->segment(4);
    }

    $view_params['board_list'] = $this->MBoard->get_board_list($category);

    $this->load->view('admin/header');
    $this->load->view('admin/board_list', $view_params);
    $this->load->view('admin/footer');
  }

  function remove_post() {
    if(!$_POST) {
      general_error_msg();
    }

    $board_id = $this->input->post('board_id');
    $board_category = $this->input->post('board_category');
    $board_seq = $this->input->post('board_seq');

    // remove board
    $this->MBoard->delete_post($board_id);
    // remove reply
    $this->MBoard->delete_ref_reply($board_id);
    // update board sequence
    $this->MBoard->update_board_seq($board_id, $board_category, $board_seq);
    // delete file
    $this->load->library('ftp');
    // delete file
    $ftp_info = $this->MBoard->get_ftp_info();
    $config['hostname'] = $ftp_info[0]['code_desc'];
    $config['username'] = $ftp_info[1]['code_desc'];
    $config['password'] = $ftp_info[2]['code_desc'];
    $config['port']     = 21;
    $config['passive']  = FALSE;
    $config['debug']    = TRUE;

    $this->ftp->connect($config);

    $file_name = $this->MBoard->get_file_name($board_id);
    if($file_name != null && $file_name != ""){
      $this->ftp->delete_file('./assets/file/'.$this->MBoard->get_file_name($board_id));
    }

    $this->ftp->close();

    redirect('admin/Board/post', 'refresh');
  }

  function reply() {
    $view_params['reply_list'] = $this->MBoard->get_reply();

    $this->load->view('header');
    $this->load->view('reply_list');
    $this->load->view('footer');
  }

  function notice() {

  }
}
