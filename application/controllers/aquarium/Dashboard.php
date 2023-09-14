<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        add_json_species();
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array();
        $data['title'] = "Inicio";
        $this->template->load('aquarium/template', 'aquarium/dashboard', $data);
    }
    public function session_destroy()
    {
        redirect(base_url('login'));
    }
}
