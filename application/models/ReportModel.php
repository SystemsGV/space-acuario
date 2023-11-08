
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportModel extends CI_Model
{
    // check if the user exists

    public function reportTankData()
    {
        return $this->db
            ->select('T.*, F.name_bowl, F.type_bowl, F.tmp_min, F.tmp_max, F.species, DATE_FORMAT(STR_TO_DATE(T.recorded_date, "%d-%m-%Y"), "%Y/%m/%d") as formatted_date')
            ->from('tank_data T')
            ->join('tbl_fishbowls F', 'T.tank_name = F.id_bowl')
            ->order_by('T.recorded_date', 'DESC')
            ->get()
            ->result();
    }
}
