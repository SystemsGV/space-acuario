
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TemperatureModel extends CI_Model
{
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
    public function fillTableTemp($where)
    {
        return $this->db
            ->select('T.*, F.name_bowl, F.type_bowl, F.tmp_min, F.tmp_max, F.species')
            ->from('tank_data T')
            ->join('tbl_fishbowls F', 'T.tank_name = F.id_bowl')
            ->where($where)
            ->get()
            ->result();
    }
}
