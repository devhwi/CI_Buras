<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMain extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_board_count() {
    return $this->db->count_all('board');
  }

  function get_reply_count() {
    return $this->db->count_all('reply');
  }

  function get_rental_ing() {
    $this->db->where('rental_status', 0);
    $this->db->from('rental');
    return $this->db->count_all_results();
  }

  function get_finance_ing() {
    $this->db->where('finance_status', 0);
    $this->db->from('finance');
    return $this->db->count_all_results();
  }

  function get_main_images() {
    $sql = "SELECT code_group
                 , code_name
                 , code_desc
                 , code_seq
            FROM code_table
            WHERE code_group = 'main'
            ORDER BY code_seq";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
