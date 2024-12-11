<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_lib
{

    public function __construct()
    {
        // Carga la librería dompdf
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
    }

    public function generar_pdf($html, $filename = '')
    {
        // Configura las opciones de dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Carga el contenido HTML
        $dompdf->loadHtml($html);

        // Establece el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el PDF
        $dompdf->render();

        // Define el directorio donde se guardarán los archivos PDF
        $outputDirectory = APPPATH . 'pdfs/';

        // Verifica si el directorio existe, si no, créalo
        if (!is_dir($outputDirectory)) {
            mkdir($outputDirectory, 0755, true);
        }

        // Construye la ruta completa del archivo PDF
        $filePath = $outputDirectory . $filename;

        // Guarda el archivo PDF en el directorio especificado
        file_put_contents($filePath, $dompdf->output());
    }
}
