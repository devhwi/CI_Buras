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
  }

  function category() {

  }

  function post() {

  }

  function reply() {

  }

  function notice() {

  }
}
