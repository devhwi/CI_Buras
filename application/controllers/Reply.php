<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reply extends CI_Controller{

  public function __construct() {
    parent::__construct();

    if(!session_check()) {
      session_error_msg();
    }

    $this->load->model('MReply');
  }

  function write_reply() {
    if(! $this->input->post('reply_content')) {
      general_error_msg();
    }

    $data = array(
      'reply_writer'    => $this->input->post('reply_writer'),
      'reply_content'   => nl2br($this->input->post('reply_content')),
      'reply_ref_board' => $this->input->post('reply_ref_board'),
      'reply_dttm'      => date('Y-m-d H:i:s'),
      'reply_parent'    => $this->input->post('reply_parent')
    );

    if( ! ($this->MReply->write($data) > 0)) {
      echo "<script>alert('오류가 발생했습니다.')</script>";
    }

    redirect('Board/detail/'.$this->input->post('reply_ref_board'), 'refresh');
  }

  function delete_reply() {
    if(! $this->input->post('reply_id')) {
      general_error_msg();
    }

    $reply_id = $this->input->post('reply_id');
    $reply_ref_board = $this->input->post('reply_ref_board');

    // delete by id
    $this->MReply->delete($reply_id);
    // delete children by id & ref
    $this->MReply->delete_children($reply_id, $reply_ref_board);

    redirect('Board/detail/'.$reply_ref_board, 'refresh');
  }
}
