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

if( ! function_exists('admin_check'))
{
	function admin_check() {
		$CI = &get_instance();
		$level = $CI->session->userdata('user_level');

		return $level;
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
		// admin 예외 처리
		$CI = &get_instance();
		if($CI->session->userdata('user_id') == 'admin'){
			return;
		}
		echo "<script>alert('담당자가 아닙니다. 회장에게 문의해 주세요.')</script>";
		redirect(base_url('/admin/Main'), 'refresh');
	}
}
?>
