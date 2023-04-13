<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alat_model extends CI_Model {

    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($data,$table)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($data,$table)
    {
        $this->db->where('id_alat', $data['id_alat']);
        $this->db->update($table, $data);
    }
    public function delete_data($data,$table)
    {
        $this->db->where($data);
        $this->db->delete($table);
    }
}