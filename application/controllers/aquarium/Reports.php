<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReportModel');
    }

    public function index()
    {
        $data['links'] = array(
            '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/vendors/flatpickr/flatpickr.min.css">'
        );
        $data['scripts'] = array(
            '<script src="' . base_url() . 'assets/js/flat-pickr/flatpickr.js"></script>',
            '<script src="' . base_url() . 'assets/js/flat-pickr/es.js"></script>',
            '<script src="' . base_url() . 'modules/specie/report-t.js"></script>'

        );
        $data['title'] = "Reporte Temperatura";
        $this->template->load('aquarium/template', 'aquarium/reports/temperature', $data);
    }

    public function reportPDFTemperature()
    {
        $this->session->set_userdata('dateIn', $this->input->post('dateIn'));
        $this->session->set_userdata('dateOut',  $this->input->post('dateOut'));
        echo json_encode(200);
    }
    public function getTableData()
    {
        $result = $this->ReportModel->reportTankData();
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function ViewPDF()
    {
        $this->load->library('dompdf_lib');

        // Carga la vista que deseas convertir a PDF
        $html = $this->load->view('aquarium/reports/pdf/pdfTemp', [], true);
        // Genera el PDF
        $this->dompdf_lib->generar_pdf($html, 'nombre_archivo.pdf');
        $dateIn = $this->session->userdata("dateIn");
        $dateOut =  $this->session->userdata("dateOut");

        echo $dateIn;
        echo $dateOut;
    }
}