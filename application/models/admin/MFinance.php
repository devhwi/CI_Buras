<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MFinance extends CI_Model{

  public function __construct() {
    parent::__construct();

  }

  function get_finance_list() {
    $sql = "SELECT finance_id
                 , finance_ref
                 , rental_user
                 , rental_product
                 , finance_status
                 , finance_sum
                 , finance_dttm
                 , finance_payment_dttm
                 , TIMESTAMPDIFF(MONTH, finance_dttm, CASE WHEN finance_status = 1 THEN finance_payment_dttm
                                                           ELSE NOW() END) AS pass_month
                 , (TIMESTAMPDIFF(MONTH, finance_dttm, CASE WHEN finance_status = 1 THEN finance_payment_dttm
                                                            ELSE NOW() END)+1) * finance_sum AS total_sum
            FROM finance f
               , rental r
            WHERE finance_ref = rental_id
            ORDER BY finance_id DESC";
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  function update_payment($id) {
    $sql = "UPDATE finance
            SET finance_status = 1
              , finance_payment_dttm = NOW()
            WHERE finance_id = $id";
    $query = $this->db->query($sql);
  }
}
