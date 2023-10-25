<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fishbowls extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('FishbowlsModel');
    }

    public function index()
    {
        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/todo.css">'

        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/specie/fishbowls.js"></script>'
        );
        $data['title'] = "Registro Especies";
        $this->template->load('aquarium/template', 'aquarium/fishbowls/fishbowls', $data);
    }

    public function create()
    {
        $var1 = $this->input->post('large_b');
        $var2 = $this->input->post('width_b');
        $var3 = $this->input->post('height_b');
        $volume = ($var1 * $var2 * $var3) / 1000;

        $data = array(
            "name_bowl" => $this->input->post('name_bowl'),
            "type_bowl" => $this->input->post('type_bowl'),
            "water_bowl" => $this->input->post('type_water'),
            "install_bowl" => $this->input->post('cleave-date1'),
            "status_bowl" => $this->input->post('status'),
            "large_bowl" => $this->input->post('large_b'),
            "width_bowl" => $this->input->post('width_b'),
            "height_bowl" => $this->input->post('height_b'),
            "volumen_bowl" => number_format($volume, 2, '.', ','),
            "tmp_min" => $this->input->post('tmp_min'),
            "tmp_max" => $this->input->post('tmp_max')
        );
        $r = $this->FishbowlsModel->insert($data, 'tbl_fishbowls');
        $jsonData["data"] = $data;
        $jsonData["id"] = $r;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    public function update()
    {
        $id = $this->input->post('id_fishbowl');
        $var1 = $this->input->post('large_b');
        $var2 = $this->input->post('width_b');
        $var3 = $this->input->post('height_b');
        $volume = ($var1 * $var2 * $var3) / 1000;

        $data = array(
            "name_bowl" => $this->input->post('name_bowl'),
            "type_bowl" => $this->input->post('type_bowl'),
            "water_bowl" => $this->input->post('type_water'),
            "install_bowl" => $this->input->post('cleave-date1'),
            "status_bowl" => $this->input->post('status'),
            "large_bowl" => $this->input->post('large_b'),
            "width_bowl" => $this->input->post('width_b'),
            "height_bowl" => $this->input->post('height_b'),
            "volumen_bowl" => number_format($volume, 2, '.', ','),
            "tmp_min" => $this->input->post('tmp_min'),
            "tmp_max" => $this->input->post('tmp_max')
        );
        $r = $this->FishbowlsModel->update($data, array("id_bowl" => $id), 'tbl_fishbowls');
        $jsonData["data"] = $data;
        $jsonData["id"] = $id;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    public function delete()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id_bowl'])) {
            try {
                $id_bowl = $data['id_bowl'];
                $this->FishbowlsModel->delete(array("id_bowl" => $id_bowl), 'tbl_fishbowls');
                $response = array(
                    'success' => true,
                    'message' => 'El registro ha sido eliminado.',
                    'valor' => $id_bowl
                );
            } catch (Exception $e) {
                $response = array(
                    'success' => false,
                    'message' => 'Error al eliminar el registro: ' . $e->getMessage()
                );
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function add_specie()
    {
        $amount = $this->input->post('add-amount');
        $jsonSpecie = [];
        if ($amount == 0) {
            $jsonSpecie["rsp"] = 500;
            echo json_encode($jsonSpecie);
        } else {
            $array = "";
            $species = $this->input->post('fishs');
            $specie = $this->input->post('select-new-species');
            if ($species == "") {
                $array = $specie;
            } else {
                $array = $species . "," . $specie;
            }
            $dateTime = getFormattedTime();

            $data = array(
                "tankId" => $this->input->post('idBowl')
            );


            $jsonSpecie['species'] = $array;
            $jsonSpecie['rsp'] = 200;
            echo json_encode($jsonSpecie);
        }
    }


    //APIS FOR SPECIES
    public function getFishbowls()
    {
        $result = $this->FishbowlsModel->get_fishbowls();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
}
