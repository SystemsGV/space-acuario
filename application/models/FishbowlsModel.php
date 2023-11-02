
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FishbowlsModel extends CI_Model
{
    public function get_fishbowls($where = null)
    {
        if ($where != null) {
            $this->db->select('*');
            $this->db->from('tbl_fishbowls');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->from('tbl_fishbowls');
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
    public function get_logsBowls($where = null)
    {
        if ($where != null) {
            $this->db->select('M.*, S.common_specie');
            $this->db->from('tbl_movementstank M');
            $this->db->join('tbl_species S', 'M.specieId = S.id_specie', 'inner');
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('M.*, S.common_specie');
        $this->db->from('tbl_movementstank M');
        $this->db->join('tbl_species S', 'M.specieId = S.id_specie', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
    public function getReportGraphic($where)
    {
        return $this->db
            ->select('T.*, F.name_bowl, F.type_bowl, S.common_specie')
            ->from('tbl_speciebowls T')
            ->join('tbl_fishbowls F', 'T.tank = F.id_bowl')
            ->join('tbl_species S', 'T.specie = S.id_specie')
            ->where($where)
            ->get()
            ->result_array();
    }
}
