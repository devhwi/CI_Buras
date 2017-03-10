<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMain extends CI_Model{

  public function __construct() {
    parent::__construct();
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

  function get_leader($gender) {
    $sql = "SELECT CONCAT(user_name, ' (', user_phone,')') AS leader
            FROM code_table ct
               , user u
            WHERE code_group = 'main'
            AND code_seq = $gender
            AND ct.code_desc = u.user_id";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->leader;
  }
}
