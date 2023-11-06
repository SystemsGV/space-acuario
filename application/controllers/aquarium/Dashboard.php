<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel');
    }

    public function index()
    {
        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/flatpickr/flatpickr.min.css">'
        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/chart/apex-chart/moment.min.js"></script>',
            '<script src="' . base_url() . 'assets/js/chart/apex-chart/apex-chart.js"></script>',
            '<script src="' . base_url() . 'assets/js/flat-pickr/flatpickr.js"></script>',
            '<script src="' . base_url() . 'modules/specie/dashboard.js"></script>',
        );
        // Get results from the database
        $tanks = $this->DashboardModel->reportDashboardTank();

        // Initialize arrays to store different types of tanks
        $activeTanks = [];
        $inactiveTanks = [];
        $saltwaterTanks = [];
        $freshwaterTanks = [];

        // Iterate over the tanks and classify them
        foreach ($tanks as $tank) {
            if ($tank->status_bowl = 1) {
                $activeTanks[] = $tank;
            } else {
                $inactiveTanks[] = $tank;
            }

            if ($tank->water_bowl == 'Salada') {
                $saltwaterTanks[] = $tank;
            } elseif ($tank->water_bowl == 'Dulce') {
                $freshwaterTanks[] = $tank;
            }
        }
        $data['activeTanks'] = count($activeTanks);
        $data['inactiveTanks'] = count($inactiveTanks);
        $data['saltwaterTanks'] = count($saltwaterTanks);
        $data['freshwaterTanks'] = count($freshwaterTanks);
        $data['totalTanks'] = count($tanks);

        $data['title'] = "Inicio";
        $this->template->load('aquarium/template', 'aquarium/dashboard', $data);
    }

    public function reportBowlsTemp()
    {
        $date = $this->input->post('data');
        if($date == ""){
            $date = date("d-m-Y");
        }

        $result = $this->DashboardModel->reportBowlsTemp(array('recorded_date' => $date));
        echo json_encode($result);
    }

    public function session_destroy()
    {
        redirect(base_url('login'));
    }
}
