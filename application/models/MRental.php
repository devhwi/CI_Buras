<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRental extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function register_rental($data) {
    $query = $this->db->insert('rental', $data);
    return $this->db->affected_rows();
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
}
