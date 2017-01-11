<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProduct extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_product_list($style, $type, $genre, $color) {
    $sql  = "SELECT product_name
                  , product_type
                  , product_genre
                  , product_color
                  , product_style
                  , product_img
                  , (SELECT COUNT(*) FROM product
                     WHERE product_status != 0
                     AND product_id = p.product_id) AS product_count
             FROM product p
             WHERE 1=1
             ";
    $style != 0 ? $sql .= "AND product_style = '$style'" : $sql .= " ";
    $genre != 0 ? $sql .= "AND product_genre = '$genre'" : $sql .= " ";
    $type  != 0 ? $sql .= "AND product_type  = '$type'"  : $sql .= " ";
    $color != 0 ? $sql .= "AND product_color = '$color'" : $sql .= " ";
    $sql .= "GROUP BY product_name";

    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_detail($name) {
    $sql = "SELECT product_name
                 , (SELECT genre_desc FROM genre WHERE genre_id = p.product_genre) as product_genre
                 , (SELECT style_desc FROM style WHERE style_id = p.product_style) as product_style
                 , (SELECT type_desc  FROM type  WHERE type_id  = p.product_type)  as product_type
                 , (SELECT color_desc FROM color WHERE color_id = p.product_color) as product_color
                 , product_img
            FROM product p
            WHERE product_name = '$name'
            GROUP BY product_name";
    $query = $this->db->query($sql);
    return $query->row();
  }

  function get_detail_each_status($name) {
    $sql = "SELECT product_name
                 , product_seq
                 , product_status
            FROM product p
            WHERE product_name = '$name'
            ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_style() {
    $sql = "SELECT 0 AS style_id, '모두' AS style_desc UNION SELECT * FROM style";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_genre() {
    $sql = "SELECT 0 AS genre_id, '모두' AS genre_desc UNION SELECT * FROM genre";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_type() {
    $sql = "SELECT 0 AS type_id, '모두' AS type_desc UNION SELECT * FROM type";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_color() {
    $sql = "SELECT 0 AS color_id, '모두' AS color_desc UNION SELECT * FROM color";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
}
