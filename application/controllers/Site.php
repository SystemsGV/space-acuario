<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }
    public function index()
    {

        if ($this->input->post('user_name')) {
            $jsonData['rsp'] = 200;
            $jsonData['name'] = $this->input->post('user_name');
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($jsonData);
        }

        $data['title'] = 'Inicio Sesión';
        $this->load->view('login', $data);
    }
    public function authUser()
    {
        $u = $this->input->post('u');
        $p = $this->input->post('p');

        $r = $this->LoginModel->auth_user_login(array('user_name' => $u));
        if ($r) {
            if ($r->user_pass == $p) {
                $jsonData['rsp'] = 200;
            } else {
                $jsonData['rsp'] = 400;
            }
        } else {
            $jsonData['rsp'] = 100;
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }


    public function s()
    {
        echo "s";
    }
}
