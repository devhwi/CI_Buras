<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('session_check'))
{
	function session_check() {
    $CI = &get_instance();
    $user = $CI->session->userdata('user_id');

    if(!isset($user)) {
      return FALSE;
    } else {
      return TRUE;
    }
  }
}

if ( ! function_exists('session_error_msg'))
{
  function session_error_msg() {
    echo "<script>alert('잘못된 요청입니다.')</script>";
    redirect(base_url(), 'refresh');
  }
}
?>
