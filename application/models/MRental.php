<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRental extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function register_rental($data) {
    $query = $this->db->insert('rental', $data);
    return $query->last_insert_id();
  }

  function check_product_valid($id) {
    $sql = "SELECT product_status
            FROM product
            WHERE product_id = $id";
    $query = $this->db->query($sql);
    $row = $query->row();
    if($row) {
      return $row->product_status;
    }
  }

  function update_product_status($id) {
    $data = array(
      'product_status' => 0
    );
    $this->db->where('product_id', $id);
    $this->db->update('product', $data);
  }

  function get_my_rental($user, $status) {
    $sql = "SELECT rental_id
                 , rental_user
                 , rental_product
                 , CONCAT(product_name, '-', product_seq) AS product_name
                 , product_img
                 , rental_dttm
                 , CASE WHEN rental_status = 0 THEN '0'
                        WHEN rental_status = 1 THEN '1'
                        ELSE '' END AS rental_status
                 , CASE WHEN rental_status = 0 THEN '-'
                        WHEN rental_status = 1 THEN rental_return_dttm
                        ELSE '-' END AS rental_return_dttm
            FROM rental r
               , product p
            WHERE r.rental_product = p.product_id
            AND rental_user = '$user'";
    $sql.= ($status != '') ? " AND rental_status = $status" : ' ';
    $sql.= " ORDER BY rental_dttm DESC";
    $query = $this->db->query($sql);

    return $query->result_array();
  }
}
