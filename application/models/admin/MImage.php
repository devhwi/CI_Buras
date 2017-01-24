<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MImage extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_product_list_by_id($id) {
    $sql = "SELECT product_id
                 , image_ref_product
                 , image_name
            FROM product_image i JOIN product p ON image_ref_product = product_id
            WHERE product_id = '$id'
            GROUP BY image_id";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_product_id_list() {
    $sql = "SELECT product_id
            FROM product
            GROUP BY product_id";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_max_seq_of_image($id) {
    $sql = "SELECT IFNULL(MAX(image_seq), 0) + 1 AS max_seq
            FROM product_image
            WHERE image_ref_product = '$id'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->max_seq;
  }

  function add_image($data){
    $this->db->insert('product_image',$data);
  }
}
