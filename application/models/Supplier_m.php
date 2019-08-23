<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}
