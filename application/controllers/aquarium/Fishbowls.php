<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fishbowls extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login_user();

        $this->load->model('FishbowlsModel');
    }

    public function index()
    {
        $data['links'] = array();
        $data['scripts'] = array(
            '   <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>',
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
            $amounts = $this->input->post('amount-s');
            $total_species = $this->input->post('total-s');

            $new_total = $total_species + $amount;

            if ($species == "") {
                $array = $specie;
            } else {
                $array = $species . "," . $specie;
            }
            $dateTime = getFormattedTime();
            $total = $amounts - $amount;
            $data = array(
                "tankId" => $this->input->post('idBowl'),
                "specieId" => $specie,
                "amountM" => $amount,
                "reasonM" => $this->input->post('reason-add'),
                "dateM" => $dateTime["date"],
                "hourM" => $dateTime["time"],
                "movementM" => "new"
            );

            $array_his = array(
                "specie" => $specie,
                "tank" => $this->input->post('idBowl'),
                "amount" => $amount
            );

            try {
                $this->FishbowlsModel->insert($data, "tbl_movementstank");
                $this->FishbowlsModel->insert($array_his, "tbl_specieBowls");
                $this->FishbowlsModel->update(array("amount_fish" => $total), array("id_specie" => $specie), "tbl_species");

                $data_f = array(
                    "total_species" => $new_total,
                    "species" => $array
                );

                $this->FishbowlsModel->update($data_f, array("id_bowl" => $this->input->post('idBowl')), "tbl_fishbowls");
                $jsonSpecie['species'] = $array;
                $jsonSpecie['total_f'] = $new_total;
                $jsonSpecie['rsp'] = 200;
                echo json_encode($jsonSpecie);
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function ammon_bowl()
    {
        $dateTime = getFormattedTime();

        $amount = $this->input->post('ammon-add');
        $jsonSpecie = [];
        if ($amount == 0) {
            $jsonSpecie["rsp"] = 500;
            echo json_encode($jsonSpecie);
        } else {
            $bowl = $this->input->post('idBowl');
            $specie = $this->input->post('select-existing');
            $amount_s = $this->input->post('amount-s');
            $total_species = $this->input->post('total-s');
            $ammon = $this->input->post('ammon-s');

            $total_bowl = $amount + $total_species; // Obtengo la nueva cantidad de especies en el bowl
            $restart_fish = $amount_s - $amount; //le resto la cantidad que se agregara a la pecera
            $total_fish = $ammon + $amount; // agrega la cantidad a la tabla de specieBowls

            $data_movement = array(
                "tankId" => $bowl,
                "specieId" => $specie,
                "amountM" => $amount,
                "reasonM" => $this->input->post('reason-ammon'),
                "dateM" => $dateTime["date"],
                "hourM" => $dateTime["time"],
                "movementM" => "update"
            );
            $this->FishbowlsModel->insert($data_movement, "tbl_movementstank");
            $this->FishbowlsModel->update(array("amount_fish" => $restart_fish), array("id_specie" => $specie), "tbl_species");

            $this->FishbowlsModel->update(array("total_species" => $total_bowl), array("id_bowl" => $this->input->post('idBowl')), "tbl_fishbowls");

            $this->FishbowlsModel->update(array("amount" => $total_fish), array("specie" => $specie, "tank" => $bowl), "tbl_speciebowls");
            $jsonSpecie['total_f'] = $total_bowl;
            $jsonSpecie['rsp'] = 200;
            echo json_encode($jsonSpecie);
        }
    }

    public function dissmis_bowl()
    {
        $dateTime = getFormattedTime();

        $amount = $this->input->post('minus-restart');
        $jsonSpecie = [];
        if ($amount == 0) {
            $jsonSpecie["rsp"] = 500;
            echo json_encode($jsonSpecie);
        } else {
            $bowl = $this->input->post('idBowl');
            $specie = $this->input->post('select-minus');
            $amount_s = $this->input->post('amount-s');
            $total_species = $this->input->post('total-s');
            $ammon = $this->input->post('ammon-s');
            $fishs = $this->input->post('fishs');

            $total_bowl = $total_species - $amount; // Obtengo la nueva cantidad de especies en el bowl
            $restart_fish = $amount_s + $amount; // aumento a la especie la cantidad que se quitara de pecera
            $total_fish = $ammon - $amount; // disminuyo la cantidad a le resto la cantidad que se agregara a la peceraa tabla de specieBowls

            $data_movement = array(
                "tankId" => $bowl,
                "specieId" => $specie,
                "amountM" => $amount,
                "reasonM" => $this->input->post('reason-minus'),
                "dateM" => $dateTime["date"],
                "hourM" => $dateTime["time"],
                "movementM" => "dissmis"
            );

            /* <--- added method remove species if remaining quantity is 0 ---> */
            if ($this->input->post('rest-s') == '0') {
                // Convertir la cadena a un array
                $fishsArray = explode(",", $fishs);

                // Buscar el valor en el array
                $key = array_search($specie, $fishsArray);

                // Si se encuentra el valor, eliminarlo
                if ($key !== false) {
                    unset($fishsArray[$key]);
                }
                $fishs = implode(",", $fishsArray);

                $this->FishbowlsModel->update(array("total_species" => $total_bowl, "species" => $fishs), array("id_bowl" => $this->input->post('idBowl')), "tbl_fishbowls");
                $this->FishbowlsModel->delete(array("specie" => $specie, "tank" => $bowl), "tbl_speciebowls");
            } else {
                $this->FishbowlsModel->update(array("total_species" => $total_bowl), array("id_bowl" => $this->input->post('idBowl')), "tbl_fishbowls");
                $this->FishbowlsModel->update(array("amount" => $total_fish), array("specie" => $specie, "tank" => $bowl), "tbl_speciebowls");
            }
            /* <--- added method remove species if remaining quantity is 0 ---> */

            $this->FishbowlsModel->insert($data_movement, "tbl_movementstank");
            $this->FishbowlsModel->update(array("amount_fish" => $restart_fish), array("id_specie" => $specie), "tbl_species");


            $jsonSpecie['total_f'] = $total_bowl;
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
    public function logsFishbowls($tank)
    {
        $result = $this->FishbowlsModel->get_logsBowls(array("tankId" => $tank));
        if ($result) {
            foreach ($result as $row) {
                $array['data'][] = $row;
            }
        } else {
            $array['data'] = array();
        }
        echo json_encode($array);
    }
    public function graphicBowl()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $result = $this->FishbowlsModel->getReportGraphic(array("T.tank" => $data['id_bowl']));

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
