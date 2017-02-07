<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMain extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_category() {
    $sql = "SELECT *
            FROM board_category";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_latest_board_list($category) {
    $sql = "SELECT board_id
                 , board_category
                 , board_title
            FROM board
            WHERE board_category = $category
            ORDER BY board_dttm DESC
            LIMIT 5";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}
