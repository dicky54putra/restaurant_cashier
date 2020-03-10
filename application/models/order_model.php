<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order_model extends CI_Model
{
    public function getAllTable()
    {
        return $this->db->get('table')->result_array();
    }
}
