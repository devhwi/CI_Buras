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
    echo "<script>alert('먼저 로그인을 해주세요.')</script>";
    redirect(base_url(), 'refresh');
  }
}

if ( ! function_exists('general_error_msg'))
{
	function general_error_msg() {
		echo "<script>alert('잘못된 요청입니다.')</script>";
		redirect(base_url(), 'refresh');
	}
}

if ( ! function_exists('admin_error_msg'))
{
	function admin_error_msg() {
		echo "<script>alert('관리자가 아닙니다.')</script>";
		redirect(base_url(), 'refresh');
	}
}
?>
