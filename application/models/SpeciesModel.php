
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SpeciesModel extends CI_Model
{
    public function get_species($where = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_species');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}
