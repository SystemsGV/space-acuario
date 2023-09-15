<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Species extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
            "status" => $this->input->post('status')
        );
        $r = $this->SpeciesModel->insert($data, 'tbl_species');
        $jsonData["data"] = $data;
        $jsonData["id"] = $r;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
    }

    public function update()
    {
        $id = "";
        $data = array(
            "common_specie" => $this->input->post('common_n'),
            "scientific_specie" => $this->input->post('scientific_n'),
            "type_water" => $this->input->post('type_water'),
            "amount_fish" => $this->input->post('amount_s'),
            "status" => $this->input->post('status')
        );
        $r = $this->SpeciesModel->update($data, $id, 'tbl_species');
        $jsonData["data"] = $data;
        $jsonData["id"] = $r;
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($jsonData);
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
}
