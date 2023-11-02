
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
    public function delete($where, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {

            $this->db->where($where);
            $this->db->delete($table);
            return true;
        } else {
            return false;
        }
    }
    public function get_select($where = null)
    {
        if ($where != null) {
            $this->db->select('id_specie, common_specie, amount_fish');
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
    public function get_checkout($where = null)
    {
        if ($where != null) {
            $this->db->select('S.id_specie, S.common_specie, S.amount_fish, H.amount');
            $this->db->from('tbl_species S');
            $this->db->join('tbl_speciebowls H', 'S.id_specie = H.specie', 'inner');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('S.id_specie, S.common_specie, S.amount_fish, H.amount');
        $this->db->from('tbl_species S');
        $this->db->join('tbl_speciebowls H', 'S.id_specie = H.specie', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
}
