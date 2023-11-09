
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{
    // check if the user exists
    public function select($table)
    {
        return $this->db->select('*')
            ->from($table)
            ->order_by('date_time_notify', 'DESC') // Ordena por fecha descendente
            ->limit(10) // Limita a 10 registros
            ->get()
            ->result();
    }

    public function reportDashboardTank()
    {
        return $this->db
            ->select('*')
            ->from('tbl_fishbowls')
            ->get()
            ->result();
    }

    public function reportBowlsTemp($where)
    {
        return $this->db
            ->select('T.*, F.name_bowl, F.type_bowl, F.tmp_min,F.tmp_max')
            ->from('tank_data T')
            ->join('tbl_fishbowls F', 'T.tank_name = F.id_bowl')
            ->where($where)
            ->get()
            ->result_array();
    }

    public function reportDashboardSpecies()
    {
        return $this->db
            ->select('*')
            ->from('tbl_species')
            ->get()
            ->result();
    }

    public function getReportGraphicBowls()
    {
        return $this->db
            ->select('T.*, F.name_bowl, F.type_bowl, S.common_specie')
            ->from('tbl_speciebowls T')
            ->join('tbl_fishbowls F', 'T.tank = F.id_bowl')
            ->join('tbl_species S', 'T.specie = S.id_specie')
            ->where(array("status_bowl" => 1))
            ->get()
            ->result_array();
    }
}
