<?php

if (!function_exists('check_login_user')) {
    function check_login_user()
    {
        $ci = get_instance();
        if ($ci->session->userdata('is_user_login') != TRUE) {

            $array_items = array('is_user_login');

            $ci->session->sess_destroy();

            redirect(base_url());
        }
    }
}


if (!function_exists('add_json_species')) {
    function add_json_species()
    {
        $ci = get_instance();
        $ci->load->model('SpeciesModel');
        $result = $ci->SpeciesModel->get_species();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
            file_put_contents('assets/json/jsonSpecies.json', json_encode($array));
        } else {
            $array['data'] = array();
            file_put_contents('assets/json/jsonSpecies.json', json_encode($array));
        }
    }
}
