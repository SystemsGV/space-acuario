
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

    public function reportTankDataWhere($dateIn = null, $dateOut = null)
    {
        $d1 = date('Y-m-d', strtotime($dateIn));
        $d2 = date('Y-m-d', strtotime($dateOut));
        if ($dateIn != null && $dateOut != null) {
            return $this->db
                ->select('T.*, F.name_bowl, F.type_bowl, F.tmp_min, F.tmp_max, F.species, DATE_FORMAT(STR_TO_DATE(T.recorded_date, "%d-%m-%Y"), "%Y/%m/%d") as formatted_date')
                ->from('tank_data T')
                ->join('tbl_fishbowls F', 'T.tank_name = F.id_bowl')
                ->where('STR_TO_DATE(T.recorded_date, "%d-%m-%Y") BETWEEN \'' . $d1 . '\' AND \'' . $d2 . '\'') // Ajusta la sintaxis para incluir las comillas simples
                ->order_by('T.recorded_date', 'DESC')
                ->get()
                ->result();
        }
        return $this->db
            ->select('T.*, F.name_bowl, F.type_bowl, F.tmp_min, F.tmp_max, F.species, DATE_FORMAT(STR_TO_DATE(T.recorded_date, "%d-%m-%Y"), "%Y/%m/%d") as formatted_date')
            ->from('tank_data T')
            ->join('tbl_fishbowls F', 'T.tank_name = F.id_bowl')
            ->order_by('T.recorded_date', 'DESC')
            ->get()
            ->result();
    }
    public function reportSpecie()
    {
        return $this->db
            ->select('common_specie, scientific_specie,total_species')
            ->from('tbl_species')
            ->order_by('common_specie', 'DESC')
            ->get()
            ->result();
    }
}
