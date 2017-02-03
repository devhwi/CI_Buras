<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReply extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function write($data) {
    $this->db->insert('reply', $data);
    return $this->db->affected_rows();
  }

  function delete($id) {
    $this->db->where('reply_id', $id);
    $this->db->delete('reply');
  }

  function delete_children($id, $ref) {
    $this->db->where('reply_id', $id);
    $this->db->where('reply_ref_board', $ref);
    $this->db->delete('reply');
  }
}
