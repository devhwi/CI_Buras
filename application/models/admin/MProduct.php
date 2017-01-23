<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProduct extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_product_list() {
    $sql  = "SELECT product_id
                  , product_name
                  , product_seq
                  , product_type
                  , (SELECT type_desc FROM type WHERE type_id = product_type) AS product_type_name
                  , product_genre
                  , (SELECT genre_desc FROM genre WHERE genre_id = product_genre) AS product_genre_name
                  , product_img
                  , (SELECT COUNT(*) FROM product
                     WHERE product_status != 0
                     AND product_name = p.product_name
                     GROUP BY product_name) AS product_count
                  , product_status
             FROM product p
             ORDER BY product_id";

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
    $sql = "SELECT * FROM genre";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function get_type() {
    $sql = "SELECT * FROM type";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  function add_category($table, $desc) {
    $key = $table.'_id';

    // get max value
    $sql = "SELECT MAX($key)+1 AS max_value FROM $table";
    $query = $this->db->query($sql);
    $row = $query->row();
    $add_id = $row->max_value;

    // insert values
    $sql = "INSERT INTO $table VALUES($add_id, '$desc')";
    $query = $this->db->query($sql);
  }

  function delete_category($table, $id) {
    $key = $table.'_id';
    $product_key = 'product_'.$table;

    // delete
    $sql = "DELETE FROM $table WHERE $key = $id";
    $query = $this->db->query($sql);

    // delete relevant products
    $sql = "DELETE FROM product
            WHERE $product_key = $id";
    $query = $this->db->query($sql);

    // update key values
    $sql = "UPDATE $table
            SET $key = $key-1
            WHERE $key > $id";
    $query = $this->db->query($sql);

    // update foreign key for product
    $sql = "UPDATE product
            SET $product_key = $product_key - 1
            WHERE $product_key > $id";
    $query = $this->db->query($sql);
  }

  function add_goods($data) {
    $this->db->insert('product', $data);
  }

  function delete_goods($id, $seq) {
    // delete product
    $this->db->where('product_id', $id);
    $this->db->delete('product');

    // update seq
    $sql = "UPDATE product
            SET product_seq = product_seq - 1
            WHERE product_seq > $seq";
    $query = $this->db->query($sql);
  }

  function get_max_seq_by_product($id) {
    $sql = "SELECT IFNULL(MAX(product_seq), 0) + 1 AS max_seq
            FROM product
            WHERE product_id = '$id'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->max_seq;
  }

  function get_exist_product_name($id) {
    $sql = "SELECT product_name FROM product WHERE product_id = '$id'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->product_name;
  }
}
