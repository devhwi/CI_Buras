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

  function get_board_detail($id) {
    $sql = "SELECT b.*
                 , user_name
                 , category_desc
            FROM board b
               , user u
               , board_category c
            WHERE board_id = $id
            AND b.board_writer = u.user_id
            AND b.board_category = c.category_id";
    $query = $this->db->query($sql);

    return $query->row();
  }

  function get_reply($board_id) {
    $this->db->query('SET @rownum := 0;');
    $sql = "SELECT level - 1 AS reply_level
                 , r.*
                 , (SELECT user_name FROM user WHERE user_id = r.reply_writer) AS user_name
                 , func.level
            FROM (SELECT @rownum := @rownum + 1 AS rownum
                       , get_lvl() AS id
                       , @level AS level
                  FROM (SELECT @start_with:=0
                             , @id:=@start_with
                             , @level:=0) vars
                  JOIN reply
                  WHERE @id IS NOT NULL) func
                  JOIN reply r ON func.id = r.reply_id
            WHERE reply_ref_board = $board_id
            ORDER BY rownum, r.reply_id";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_reply_count($board_id) {
    $sql = "SELECT *
            FROM reply r
            WHERE reply_ref_board = $board_id";
    $query = $this->db->query($sql);

    return $query->num_rows();
  }

  function write_board($data) {
    $this->db->insert('board', $data);
    return $this->db->affected_rows() > 0;
  }

  function get_max_seq_by_category($category) {
    $sql = "SELECT IFNULL(MAX(board_seq), 0) + 1 AS max_seq
            FROM board
            WHERE board_category = $category";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->max_seq;
  }

  function user_check($id) {
    $sql = "SELECT board_writer
            FROM board
            WHERE board_id = $id";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->board_writer;
  }

  function edit_board($data, $id) {
    $this->db->where('board_id', $id);
    $this->db->update('board', $data);

    return $this->db->affected_rows();
  }

  function delete_board($id) {
    $this->db->where('board_id', $id);
    $this->db->delete('board');

    return $this->db->affected_rows();
  }

  function update_seq($category, $seq) {
    $sql = "UPDATE board
            SET board_seq = board_seq - 1
            WHERE board_category = $category
            AND board_seq > $seq";
    $this->db->query($sql);
  }

  function delete_replies($id) {
    $this->db->where('reply_ref_board', $id);
    $this->db->delete('reply');
  }
}
