<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller{

  public function __construct() {
    parent::__construct();

    // session check
    if(!session_check()) {
      session_error_msg();
    }

    $this->load->library('pagination');
    $this->load->model('MMedia');
  }

  function index() {
    // uri check (invalid access)
    if(! $this->uri->segment(2)) {
      general_error_msg();
    }

    $media_type = $this->uri->segment(2);
    $media_category = $this->input->post('media_category');

    $view_params['media_category'] = $media_category;
    $view_params['media_count'] = $this->MMedia->get_media_count($media_type, $media_category);

    /* Pagination Configuration */
    $config['base_url'] = base_url().'Media/'.$media_type.'/page/';
    $config['total_rows'] = $view_params['media_count'];
    $config['per_page'] = 16;
    $config['num_links'] = 5;
    $config['first_url'] = '1';
    $config['uri_segment'] = 4;
    $config['use_page_numbers'] = TRUE;
    // pagination start/end
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    // next
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    // previous
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    // current page
    $config['cur_tag_open'] = '<li class="page-item"><a class="page-link"><b>';
    $config['cur_tag_close'] = '</b></a></li>';
    // other pages
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    // other pages attributes
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);

    if ($this->uri->segment(4) > 0) {
      $offset = ($this->uri->segment(4) + 0) * $config['per_page'] - $config['per_page'];
    } else {
      $offset = $this->uri->segment(4);
    }

    $view_params['media'] = $this->MMedia->get_media_list($media_type, $config['per_page'], $offset, $media_category);

    $this->load->view('header');
    if ($media_type == 1) { // video
      $view_params['video_categories'] = $this->MMedia->get_video_categories();
      $this->load->view('media_video', $view_params);
    }else {                 // gallery
      $this->load->view('media_gallery', $view_params);
    }
    $this->load->view('footer');
  }
}
