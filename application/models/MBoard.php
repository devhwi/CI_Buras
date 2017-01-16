<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBoard extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_board_list($category) {
    $this->db->query('SET @rownum = 0');
    $sql = "SELECT (@rownum:=@rownum+1) AS rownum
                 , b.*
                 , user_name
            FROM board b
               , user u
            WHERE b.board_writer = u.user_id
            AND board_category = $category
            ORDER BY board_dttm DESC";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_board_count($category) {
    $sql = "SELECT COUNT(*) count
            FROM board
            WHERE board_category = $category
            ";
    $query = $this->db->query($sql);

    $row = $query->row();

    return $row->count;
  }

  function get_categories() {
    $sql = "SELECT *
            FROM board_category";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_category($category) {
    $sql = "SELECT category_desc
            FROM board_category
            WHERE category_id = $category";
    $query = $this->db->query($sql);

    $row = $query->row();

    return $row->category_desc;
  }
}
