<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRental extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_rental_list() {
    $sql = "SELECT rental_id
                 , rental_user
                 , u.user_name AS user_name
                 , rental_product
                 , (SELECT image_name FROM product_image WHERE image_ref_product = p.product_id) AS product_img
                 , rental_status
                 , rental_dttm
                 , rental_return_dttm
            FROM rental r
               , product p
               , user u
            WHERE r.rental_product = CONCAT(p.product_id, '-', p.product_seq)
              AND r.rental_user = u.user_id";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function update_status($id) {
    $sql = "UPDATE rental
            SET rental_status = 1
              , rental_return_dttm = NOW()
            WHERE rental_id = '$id'";
    $query = $this->db->query($sql);
  }

  function get_rental_product($id) {
    $sql = "SELECT rental_product
            FROM rental
            WHERE rental_id = '$id'";
    $query = $this->db->query($sql);
    $row = $query->row();

    return $row->rental_product;
  }

  function update_product_status($id, $seq) {
    $int_seq = intval($seq);
    $sql = "UPDATE product
            SET product_status = 1
            WHERE product_id = '$id'
            AND product_seq = $int_seq";
    $query = $this->db->query($sql);
  }
}
