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
}
