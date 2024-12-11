<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        check_login_user();
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
        $dateIn = $this->session->userdata("dateIn");
        $dateOut =  $this->session->userdata("dateOut");
        if ($dateIn != null || $dateOut != null) {
            $result = $this->ReportModel->reportTankDataWhere($dateIn, $dateOut);
        } else {
            $result = $this->ReportModel->reportTankDataWhere();
        }

        $data['result'] = $result;
        // Carga la vista que deseas convertir a PDF
        $html = $this->load->view('aquarium/reports/pdf/pdfTemp', $data, true);
        // Genera el PDF
        $this->dompdf_lib->generar_pdf($html, 'Reprote temperatura de ' . $dateIn . ' hasta ' . $dateOut . '.pdf');
    }
    public function viewDataSpecies()
    {
        $this->load->library('dompdf_lib');
        $data['result'] = $this->ReportModel->reportSpecie();
        $html = $this->load->view('aquarium/reports/pdf/pdfSpecies', $data, true);
        $this->dompdf_lib->generar_pdf($html, 'Reporte Des. poblacional Hasta:' . date('d/m/Y'));
    }
    public function pdfEmpresa()
    {
        $this->load->library('dompdf_lib');
        $outputDirectory = 'pdfs/';

        // Verifica si el directorio existe, si no, créalo
        if (!is_dir($outputDirectory)) {
            mkdir($outputDirectory, 0755, true);
        }
        for ($i = 1; $i <= 102; $i++) {
            // Generar el contenido HTML (puedes personalizarlo según tus necesidades)
            $data['codigo'] = $i;
            $html = $this->load->view('aquarium/reports/pdf/cuponPdf', $data, true);

            // Generar un nombre de archivo único
            $filename = '06122024860-' . $i . '.pdf';

            // Generar el PDF y obtener la ruta del archivo guardado
            $filePath = $this->dompdf_lib->generar_pdf($html, $filename);

            // Mostrar la ruta del archivo guardado (puedes quitar esta línea si no la necesitas)
            echo 'Archivo guardado en: ' . $filePath . '<br>';
        }
    }
}
