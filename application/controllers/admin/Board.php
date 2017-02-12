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

  /**
   * POST
   */
  function post($idx=null) {

    $view_params['board_list'] = $this->MBoard->get_board_list();

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

  /**
   * REPLY
   */
  function reply() {
    $view_params['reply_list'] = $this->MBoard->get_reply();

    $this->load->view('admin/header');
    $this->load->view('admin/reply_list', $view_params);
    $this->load->view('admin/footer');
  }

  function remove_reply() {
    if( ! $this->input->post('reply_id') ) {
      general_error_msg();
    }

    $reply_id = $this->input->post('reply_id');

    // remove reply
    $this->MBoard->delete_reply($reply_id);
    // remove replies whose parent reply is $reply_id
    $this->MBoard->delete_child_reply($reply_id);

    redirect('admin/Board/reply', 'refresh');
  }

  /**
   * VIDEO
   */
  function video() {
    $view_params['video_list'] = $this->MBoard->get_video_list();

    $this->load->view('admin/header');
    $this->load->view('admin/video_list', $view_params);
    $this->load->view('admin/footer');
  }

  function add_video() {
    if( ! $_POST ) {
      general_error_msg();
    }

    $content = explode('/', $this->input->post('media_content'));
    $countArr = count($content);
    $media_content = $content[$countArr - 1];

    $data = array(
      'media_writer' => $this->input->post('media_writer'),
      'media_type' => 1,
      'media_title' => $this->input->post('media_title'),
      'media_content' => $media_content,
      'media_dttm' => date('Y-m-d h:i:s')
    );

    $this->MBoard->insert_video($data);

    redirect('admin/Board/video', 'refresh');
  }

  function remove_video() {
    if( ! $this->input->post('media_id') ) {
      general_error_msg();
    }

    $video_id = $this->input->post('media_id');

    $this->MBoard->delete_video($video_id);

    redirect('admin/Board/video', 'refresh');
  }

  /**
   * GALLERY
   */
  function gallery() {
    $view_params['gallery_list'] = $this->MBoard->get_gallery_list();

    $this->load->view('admin/header');
    $this->load->view('admin/gallery_list', $view_params);
    $this->load->view('admin/footer');
  }

  function add_gallery() {

    // file upload config
    $config['upload_path'] = './assets/img/gallery/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
    $config['max_size'] = "5120"; // 5mb
    $config['max_width'] = "4096";
    $config['max_height'] = "4096";
    $config['remove_spaces'] = TRUE;

    $this->load->library('upload', $config);

    $files_name = $_FILES['media_content']['name'];
    $files = $_FILES['media_content'];

    if(!is_array($files_name)) {
      if(! $this->upload->do_upload('media_content') ) {
        echo "<script>alert('파일 업로드에 실패하였습니다.');</script>";
        redirect('admin/Board/gallery', 'refresh');
      } else {
        $uploaded_file = $this->upload->data();
        $file_name = $uploaded_file['file_name'];

        $data = array(
          'media_writer'      => $this->input->post('media_writer')
        , 'media_type'        => 2
        , 'media_title'       => $this->input->post('media_title')
        , 'media_content'     => $file_name
        , 'media_dttm'        => date('Y-m-d h:i:s')
        );

        $this->MBoard->insert_gallery($data);
        redirect('admin/Board/gallery', 'refresh');
      }
    }
  }

  function remove_gallery() {
    if(!$_POST) {
      general_error_msg();
    }

    $media_id = $this->input->post('media_id');
    $media_content = $this->input->post('media_content');

    $this->load->library('ftp');
    $ftp_info = $this->MBoard->get_ftp_info();
    $config['hostname'] = $ftp_info[0]['code_desc'];
    $config['username'] = $ftp_info[1]['code_desc'];
    $config['password'] = $ftp_info[2]['code_desc'];
    $config['port']     = 21;
    $config['passive']  = FALSE;
    $config['debug']    = TRUE;

    $path = './assets/img/gallery/';
    $file_name = $media_content;

    $this->ftp->connect($config);
    if($this->ftp->delete_file($path.$file_name)) {
      // success
      echo 'success';

      // delete DB
      $this->MBoard->delete_gallery($media_id);

      $this->ftp->close();

      redirect('admin/Board/gallery', 'refresh');
    }else{
      echo 'fail';
    }
  }
}
