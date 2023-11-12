<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Species extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();
        $this->load->model('SpeciesModel');
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'modules/specie/species.js"></script>'
        );
        $data['title'] = "Registro Especies";
        $this->template->load('aquarium/template', 'aquarium/species/species', $data);
    }

    public function create()
    {
        $data = array(
            "common_specie" => $this->input->post('common_n'),
            "scientific_specie" => $this->input->post('scientific_n'),
            "type_water" => $this->input->post('type_water'),
            "amount_fish" => $this->input->post('amount_s'),
            "status" => $this->input->post('status'),
            "total_species" => $this->input->post('amount_s')
        );
        $r = $this->SpeciesModel->insert($data, 'tbl_species');
        $jsonData["data"] = $data;
        $jsonData["id"] = $r;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function update()
    {
        $id = $this->input->post('id_specie');
        $data = array(
            "common_specie" => $this->input->post('common_n'),
            "scientific_specie" => $this->input->post('scientific_n'),
            "type_water" => $this->input->post('type_water'),
            "amount_fish" => $this->input->post('amount_s'),
            "status" => $this->input->post('status')
        );
        $r = $this->SpeciesModel->update($data, array("id_specie" => $id), 'tbl_species');
        $jsonData["data"] = $data;
        $jsonData["id"] = $id;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function updateQuantity()
    {
        $id = $this->input->post('id_fish');
        $total =  $this->input->post('total_fish');
        $rest =  $this->input->post('quantity');
        $reason =  $this->input->post('reason_fish');
        $ing =  $this->input->post('ing_data');
        $totalNew = $total + $ing;
        $restNew = $rest + $ing;
        $data = array(
            "amount_fish" => $restNew,
            "total_species" => $totalNew,
        );
        $log = array(
            "specie_log" => $id,
            "type_log" => 'plus',
            "amount_log" => $ing,
            "quantity_log" => $total,
            "reason_log" => $reason
        );
        $this->SpeciesModel->insert($log, 'logs_species');
        $r = $this->SpeciesModel->update($data, array("id_specie" => $id), 'tbl_species');
        $jsonData["data"] = $data;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }



    public function minusQuantity()
    {
        $id = $this->input->post('id_fish');
        $total =  $this->input->post('total_fish');
        $rest =  $this->input->post('quantity');
        $reason =  $this->input->post('reason_minus');
        $ing =  $this->input->post('minus_data');
        $totalNew = $total - $ing;
        $restNew = $rest - $ing;
        $data = array(
            "amount_fish" => $restNew,
            "total_species" => $totalNew,
        );
        $log = array(
            "specie_log" => $id,
            "type_log" => 'minus',
            "amount_log" => $ing,
            "quantity_log" => $total,
            "reason_log" => $reason
        );
        $this->SpeciesModel->insert($log, 'logs_species');
        $r = $this->SpeciesModel->update($data, array("id_specie" => $id), 'tbl_species');
        $jsonData["data"] = $data;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }



    public function delete()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id_specie'])) {
            try {
                $id_specie = $data['id_specie'];
                $this->SpeciesModel->delete(array("id_specie" => $id_specie), 'tbl_species');
                $response = array(
                    'success' => true,
                    'message' => 'El registro ha sido eliminado.',
                    'valor' => $id_specie
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
    //APIS FOR SPECIES
    public function getSpecies()
    {
        $result = $this->SpeciesModel->get_species();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }

    public function getSpecie()
    {
        $id = $this->input->post('i');
        $jsonData["r"] = $this->SpeciesModel->get_species(array('id_specie' => $id));
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }
    public function speciesSelect()
    {
        $result = $this->SpeciesModel->get_select();
        if ($result) {
            foreach ($result as $row) {
                $array['species'][] = $row;
            }
        } else {
            $array['species'] = array();
        }
        echo json_encode($array);
    }

    public function getCheckout($where)
    {
        $result = $this->SpeciesModel->get_checkout(array("tank" => $where));
        if ($result) {
            foreach ($result as $row) {
                $array['species'][] = $row;
            }
        } else {
            $array['species'] = array();
        }
        echo json_encode($array);
    }
    public function logsSpecies()
    {
        $result = $this->SpeciesModel->getLogsSpecies();
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
