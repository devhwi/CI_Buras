<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBoard extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_board_list($category) {
    $sql = "SELECT b.*
                 , user_name
                 , category_desc
            FROM board b
               , user u
               , board_category c
            WHERE board_writer = user_id
            AND board_category = category_id
            ORDER BY board_dttm";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function delete_post($id) {
    $this->db->where('board_id', $id);
    $this->db->delete('board');
  }

  function update_board_seq($id, $category, $seq) {
    $sql = "UPDATE board
            SET board_seq = board_seq - 1
            WHERE board_id > $id
            AND board_category = $category";
  }

  function delete_ref_reply($id) {
    $this->db->where('reply_ref_board', $id);
    $this->db->delete('reply');
  }

  function get_ftp_info() {
    $sql = "SELECT code_desc
            FROM code_table
            WHERE code_group = 'ftp'
            ORDER BY code_seq";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_file_name($id) {
    $sql = "SELECT board_file
            FROM board
            WHERE board_id = $id";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row ? $row->board_file : "";
  }
}
