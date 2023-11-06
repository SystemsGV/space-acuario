
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{
    // check if the user exists

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
}
