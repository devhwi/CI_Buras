<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProduct extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_product_list($type, $genre) {
    $sql  = "SELECT product_name
                  , product_type
                  , product_genre
                  , product_img
                  , (SELECT COUNT(*) FROM product
                     WHERE product_status != 0
                     AND product_name = p.product_name
                     GROUP BY product_name) AS product_count
             FROM product p
             WHERE 1=1
             ";
    $type != 0 ? $sql .= "AND product_type  = '$type'"  : $sql .= " ";
    $type == 1 && $genre != 0 ? $sql .= "AND product_genre = '$genre'" : $sql .= " ";
    $sql .= "GROUP BY product_name";

    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_detail($name) {
    $sql = "SELECT product_name
                 , (SELECT genre_desc FROM genre WHERE genre_id = p.product_genre) as product_genre
                 , (SELECT type_desc  FROM type  WHERE type_id  = p.product_type)  as product_type
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

  function get_id($name, $seq) {
    $sql = "SELECT product_id
            FROM product
            WHERE product_name = '$name'
            AND product_seq = $seq";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->product_id;
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
}
