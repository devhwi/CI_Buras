<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMedia extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_media_list($type, $limit, $start) {
    $sql = "SELECT m.*
                 , user_name
            FROM media m
               , user u
            WHERE media_type = $type
            AND m.media_writer = u.user_id
            ORDER BY media_dttm DESC
            LIMIT $limit";
    $sql.= $start != "" ? " OFFSET $start" : "";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_media_count($type) {
    $sql = "SELECT COUNT(*) AS count
            FROM media
            WHERE media_type = $type";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->count;
  }
}
