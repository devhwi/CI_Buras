<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMember extends CI_Model{

  public function __construct() {
    parent::__construct();
  }

  function get_members($user, $season) {
    $sql = "SELECT *
            FROM user
            WHERE 1=1 ";
    $sql.= $user != "" ? "AND user_name LIKE '%$user%' " : " ";
    $sql.= $season != "" ? "AND user_season = '$season' " : " ";
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
}
?>
