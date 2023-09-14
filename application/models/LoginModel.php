
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    // check if the user exists

    public function auth_user_login($where)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where($where);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
