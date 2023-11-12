<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('UserModel');
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/specie/user.js"></script>'
        );
        $data['title'] = "Usuarios";
        $this->template->load('aquarium/template', 'aquarium/user/index', $data);
    }
    public function getUsers()
    {
        $result = $this->UserModel->getUser();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function create()
    {
        $flname = $this->input->post('flname');
        $dni_user = $this->input->post('dni_user');
        $type_role = $this->input->post('type_role');
        $user_name = $this->input->post('user_name');
        $user_pass = $this->input->post('user_pass');

        // Hash de la contraseña
        $hashedPassword = password_hash($user_pass, PASSWORD_BCRYPT);

        $data = array(
            "firstName" => $flname,
            "id_empoyee" => $dni_user,
            "id_rol" => $type_role,
            "user_name" => $user_name,
            "user_pass" => $hashedPassword,
        );

        // Insertar nuevo usuario en la base de datos
        $result = $this->UserModel->insert($data, 'tbl_users');

        if ($result) {
            $response = array('success' => true, 'message' => 'Usuario insertado correctamente.');
        } else {
            $response = array('success' => false, 'message' => 'Error al insertar el usuario.');
        }
        echo json_encode($response);
    }
    public function update()
    {
        $id = $this->input->post('id_user');
        $typeRole = $this->input->post('type_role');
        $userName = $this->input->post('user_name');
        $userPass = $this->input->post('user_pass');

        $data = array(
            "id_rol" => $this->input->post('type_role'),
            "user_name" => $this->input->post('user_name'),
        );

        // Verificar si se proporciona una nueva contraseña
        $data = array(
            "id_rol" => $typeRole,
            "user_name" => $userName,
        );

        if (!empty($userPass)) {
            // Hash de la nueva contraseña
            $hashedPassword = password_hash($userPass, PASSWORD_BCRYPT);
            $data["user_pass"] = $hashedPassword;
        }
        // Actualizar usuario en la base de datos
        $result = $this->UserModel->update($data, array('user_id' => $id), 'tbl_users');

        if ($result) {
            $response = array('success' => true, 'message' => 'Usuario actualizado correctamente.');
        } else {
            $response = array('success' => false, 'message' => 'Error al actualizar el usuario.');
        }

        echo json_encode($response);
    }
}
