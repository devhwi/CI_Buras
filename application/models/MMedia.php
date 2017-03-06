<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMedia extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_media_list($type, $limit, $start, $category) {
    $sql = "SELECT m.*
                 , user_name
            FROM media m
               , user u
            WHERE media_type = $type
            AND m.media_writer = u.user_id ";
    $sql.= $category == 'All' || $category == "" || $category == null ? "" : "AND media_category = '$category'";
    $sql.= "ORDER BY media_dttm DESC
            LIMIT $limit";
    $sql.= $start != "" ? " OFFSET $start" : "";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_media_count($type, $category) {
    $sql = "SELECT COUNT(*) AS count
            FROM media
            WHERE media_type = $type ";
    $sql.=  $category == 'All' || $category == "" || $category == null ? "" : "AND media_category = '$category'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->count;
  }

  function get_video_categories() {
    $sql = "SELECT 'All' AS media_category
            FROM dual
            UNION
            SELECT DISTINCT media_category
            FROM media
            WHERE media_category != ''
            ORDER BY media_category";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}
