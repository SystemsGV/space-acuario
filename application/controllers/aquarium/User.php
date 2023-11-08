<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array();
        $data['title'] = "Usuarios";
        $this->template->load('aquarium/template', 'aquarium/user/index', $data);
    }
}
