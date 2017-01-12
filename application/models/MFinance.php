<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFinance extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function add_finance($data) {
    $query = $this->db->insert('finance', $data);
    return $this->db->affected_rows();
  }
}
