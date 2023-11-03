<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TemperatureModel');
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/table-editor/SimpleTableCellEditor.js"></script>',
            '<script src="' . base_url() . 'modules/specie/temperature.js"></script>'
        );
        $data['title'] = "Inicio";
        $this->template->load('aquarium/template', 'aquarium/control/bowls', $data);
    }
    public function fillTableTemp()
    {
        $result = $this->TemperatureModel->fillTableTemp();
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

        $tank = $data['tank'];
        $value = $data['value'];
        $date = $data['date'];
        $recorded = $data['recorded'];

        // Crear un array asociativo para usar en la actualización
        $updateData = array(
            $date => $value,
        );

        // Condiciones para la actualización
        $where = array(
            'tank_name' => $tank,
            'recorded_date' => $recorded,
        );

        $result = $this->TemperatureModel->update($updateData, $where, 'tank_data');

        // Si deseas devolver una respuesta JSON, puedes hacerlo así:
        $response = array('status' => 'success', 'message' => 'Datos recibidos correctamente');
        echo json_encode($result);
    }
}
