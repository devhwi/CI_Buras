<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMember extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_members() {
    $sql = "SELECT *
            FROM user
            WHERE 1=1
            AND user_id != 'admin' ";
    $sql.= "ORDER BY user_name";

    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_season_list() {
    $sql = "SELECT DISTINCT user_season
            FROM user
            ORDER BY user_season";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function get_auth_list() {
    $sql = "SELECT *
            FROM user_level";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function update_level($data) {
    $this->db->where('user_id', $data['user_id']);
    $this->db->update('user', $data);
  }

  function delete($user) {
    $this->db->where('user_id', $user);
    $this->db->delete('user');
  }
}
?>
