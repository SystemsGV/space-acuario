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
        if ($this->session->userdata('is_user_login')) {
            redirect('Acuario/Dashboard-Temperatura');
        } else {
            redirect('Iniciar-Sesion');
        }
    }
    public function login()
    {
        if ($this->session->userdata('is_user_login')) {
            if ($this->session->userdata('id_rol') == 1) {
                redirect('Acuario/Dashboard-Temperatura');
            } else {
                redirect('Acuario/Control-Temperatura');
            }
        }

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
        try {
            $username = $this->input->post('u');
            $password = $this->input->post('p');

            // Obtener información del usuario basado en el nombre de usuario
            $user = $this->LoginModel->auth_user_login(['user_name' => $username]);

            if ($user) {
                // Verificar la contraseña utilizando password_verify
                if (password_verify($password, $user->user_pass)) {
                    $this->session->set_userdata([
                        'is_user_login' => true,
                        'user_id' => $user->user_id,
                        'user_name' => $user->user_name,
                        'id_empoyee' => $user->id_empoyee,
                        'id_role' => $user->id_rol,
                    ]);

                    $response['rsp'] = 200; // Acceso correcto
                    $response['id_rol'] = $user->id_rol; // Acceso correcto
                } else {
                    $response['rsp'] = 400; // Contraseña incorrecta
                }
            } else {
                $response['rsp'] = 100; // Usuario no encontrado
            }
        } catch (Exception $e) {
            $response['rsp'] = 500; // Error interno del servidor
            $response['error'] = $e->getMessage(); // Mensaje de error detallado
        }

        // Enviar la respuesta como JSON
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
