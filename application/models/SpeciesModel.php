
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SpeciesModel extends CI_Model
{
    public function get_species($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->from('tbl_species');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
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
    public function update($action, $id, $table)
    {
        $this->db->where($id);
        $this->db->update($table, $action);
        return $this->db->insert_id();
    }
}
