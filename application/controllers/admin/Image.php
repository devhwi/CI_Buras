<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }else{
      // admin check (rental & web master)
      if(admin_check() != 8 && admin_check() != 10) {
        admin_error_msg();
      }
    }

    $this->load->model('admin/MImage');
  }

  function index() {
    // initialize
    $view_params['selected_id'] = "";
    $view_params['image_list'] = NULL;

    $view_params['id_list'] = $this->MImage->get_product_id_list();

    if($this->input->post('product_id')){
      $view_params['selected_id'] = $this->input->post('product_id');
      $view_params['image_list'] = $this->MImage->get_product_list_by_id($this->input->post('product_id'));
    }

    $this->load->view('admin/header');
    $this->load->view('admin/image_list', $view_params);
    $this->load->view('admin/footer');
  }

  function upload() {
    // Get max sequence for product image
    $product_id = $this->input->post('product_id');

    // file upload config
    $config['upload_path'] = './assets/img/product/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|JPEG|PNG';
    $config['max_size'] = "4096";
    $config['max_width'] = "4096";
    $config['max_height'] = "4096";
    $config['remove_spaces'] = TRUE;

    $this->load->library('upload', $config);

    $files_name = $_FILES['product_image']['name'];
    $files = $_FILES['product_image'];

    if(!is_array($files_name)) {
      if(! $this->upload->do_upload('product_image') ) {
        echo "<script>alert('파일 업로드에 실패하였습니다.');</script>";
        redirect('admin/Image', 'refresh');
      } else {
        $uploaded_file = $this->upload->data();
        $file_name = $uploaded_file['file_name'];
        echo $file_name;

        $max_seq = $this->MImage->get_max_seq_of_image($product_id);

        $data = array(
          'image_name'        => $file_name
        , 'image_ref_product' => $product_id
        , 'image_seq'         => $max_seq
        );

        $this->MImage->add_image($data);
        redirect('admin/Image', 'refresh');
      }
    } else if ( count($files_name) > 0 ) {
      foreach( $files_name as $k => $val ) {
        $_FILES['image']['name']     = $files['name'][$k];
        $_FILES['image']['type']     = $files['type'][$k];
        $_FILES['image']['tmp_name'] = $files['tmp_name'][$k];
        $_FILES['image']['error']    = $files['error'][$k];
        $_FILES['image']['size']     = $files['size'][$k];

        if (! $this->upload->do_upload('image') ) {
          echo "<script>alert('파일 업로드에 실패하였습니다.');</script>";
          echo $this->upload->display_errors();
          redirect('admin/Image', 'refresh');
        } else {
          $uploaded_file = $this->upload->data();
          $file_name = $uploaded_file['file_name'];
          echo $file_name;

          $max_seq = $this->MImage->get_max_seq_of_image($product_id);

          $data = array(
            'image_name'        => $file_name
          , 'image_ref_product' => $product_id
          , 'image_seq'         => $max_seq
          );

          $this->MImage->add_image($data);
          redirect('admin/Image', 'refresh');
        }
      }
    }
  }

  function delete() {
    if(! $this->input->post('image_id')) {
      general_error_msg();
    }

    $id = $this->input->post('image_id');
    $seq = $this->input->post('image_seq');

    $this->load->library('ftp');
    $ftp_info = $this->MImage->get_ftp_info();
    $config['hostname'] = $ftp_info[0]['code_desc'];
    $config['username'] = $ftp_info[1]['code_desc'];
    $config['password'] = $ftp_info[2]['code_desc'];
    $config['port']     = 21;
    $config['passive']  = FALSE;
    $config['debug']    = TRUE;

    $path = './assets/img/product/';
    $file_name = $this->input->post('image_name');

    $this->ftp->connect($config);
    if($this->ftp->delete_file($path.$file_name)) {
      // success
      echo 'success';

      // delete DB
      $this->MImage->delete_image($id, $seq);

      // update seq
      $this->MImage->update_image_seq($id, $seq);

      $this->ftp->close();

      redirect('admin/Image', 'refresh');
    }else{
      echo 'fail';
    }
  }
}
