<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TemperatureModel');
        check_login_user();

    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/specie/temperature.js"></script>'
        );
        $data['title'] = "Control de Temperatura";
        $this->template->load('aquarium/template', 'aquarium/control/bowls', $data);
    }
    public function fillTableTemp()
    {
        $where = array(
            "recorded_date" => date('d-m-Y'),
            "status_bowl" => 1
        );

        $result = $this->TemperatureModel->fillTableTemp($where);
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function editCell()
    {
        // Obtener los datos enviados por POST
        $data = json_decode(file_get_contents('php://input'), true);

        // Extraer datos relevantes
        $tank = $data['tank'];
        $value = $data['value'];
        $date = $data['date'];
        $recorded = $data['recorded'];

        // Actualizar datos en la base de datos
        $this->updateDatabase($tank, $value, $date, $recorded, $data);

        // Verificar y notificar según el estado de la temperatura
        $this->checkAndNotify($tank, $value, $date, $data);
        echo $value;
    }

    private function updateDatabase($tank, $value, $date, $recorded, $data)
    {
        // Crear un array asociativo para usar en la actualización
        $updateData = array(
            $date => $value,
        );

        // Condiciones para la actualización
        $where = array(
            'tank_name' => $tank,
            'recorded_date' => $recorded,
        );

        $this->TemperatureModel->update($updateData, $where, 'tank_data');
    }

    private function checkAndNotify($tank, $value, $date, $data)
    {
        $status = $this->getStatus($data['min'], $data['max'], $value);
        $dateAc = date("d-m-Y");

        if ($status == 2 || $status == 3) {
            $key = $this->generateUniqueKey($tank, $date, $status, $dateAc);
            $content = $this->getContent($data, $status);

            $verify = $this->TemperatureModel->verified(["keyFilter" => $key]);

            if (!$verify) {
                $notify = array(
                    "title_notify" => $this->getTitle($status),
                    "content_notify" => $content,
                    "redirect_url_notify" => 'Control-Temperatura',
                    "alert_type_notify" => ($status == 2 ? "warning" : "error"),
                    "keyFilter" => $key,
                    "date" => $dateAc,
                );

                $this->TemperatureModel->insert($notify, 'tbl_notifications');
            }
        }
    }

    private function generateUniqueKey($tank, $date, $status, $dateAc)
    {
        return "$tank,$date,$status,$dateAc";
    }


    private function getStatus($min, $max, $value)
    {
        return ($value !== "" && preg_match('/\d.*\d/', $value)) ? getMinMax($min, $max, $value) : "blank";
    }

    private function getTitle($status)
    {
        return ($status == 2) ? "Temperatura al Límite" : "Temperatura Fuera del Límite";
    }

    private function getContent($data, $status)
    {
        $content = $data['nameBowl'] . ": " . $data['value'];

        if ($status == 2) {
            $content .= " (entre " . $data['min'] . " y " . $data['max'].")";
        } elseif ($status == 3) {
            $content .= " (Fuera del Limite de " . $data['min'] . " y " . $data['max'].")";
        }

        return $content;
    }
}
