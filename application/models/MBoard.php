<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBoard extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_board_list($category, $limit, $start) {
    $sql = "SELECT b.*
                 , user_name
                 , (SELECT COUNT(reply_id) reply_count
                    FROM reply
                    WHERE reply_ref_board = b.board_id) AS reply_count
            FROM board b
               , user u
            WHERE b.board_writer = u.user_id
            AND board_category = $category
            ORDER BY board_seq DESC
            LIMIT $limit";
    $sql.= $start != "" ? " OFFSET $start" : "";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_board_count($category) {
    $sql = "SELECT *
            FROM board
            WHERE board_category = $category
            ";
    $query = $this->db->query($sql);

    return $query->num_rows();
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
