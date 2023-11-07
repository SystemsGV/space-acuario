<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DSpecies extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/chart/apex-chart/moment.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/chart/apex-chart/apex-chart.js"></script>',
            '<script src="' . base_url() . 'modules/specie/d-species.js"></script>',
        );

        $result = $this->DashboardModel->reportDashboardSpecies();
        $total_species = 0;
        $total_saltwater = 0;
        $total_freshwater = 0;

        foreach ($result as $species) {
            $total_species += $species->total_species;

            if ($species->type_water == 'Salada') {
                $total_saltwater++;
            } else if ($species->type_water == 'Dulce') {
                $total_freshwater++;
            }
        }
        $data['type_species'] = count($result);
        $data['total'] = $total_species;
        $data['saltwater'] = $total_saltwater;
        $data['freshwater'] = $total_freshwater;
        $data['title'] = "Metricas Especies";
        $this->template->load('aquarium/template', 'aquarium/speciesDash', $data);
    }

    public function graphicBowl()
    {
        $result = $this->DashboardModel->getReportGraphicBowls();

        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = null;
        }
        echo json_encode($array);
    }
}
