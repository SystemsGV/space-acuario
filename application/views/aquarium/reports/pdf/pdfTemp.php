<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi PDF</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?= base_url() ?>assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/responsive.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Control de Temperatura Acuario</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-temp">
                                <thead class="text-center">
                                    <tr>
                                        <th>FECHA: </th>
                                        <th id="date-temp">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2">ACUARIO</th>
                                        <th rowspan="2">
                                            ESPECIE
                                        </th>
                                        <th colspan="6" rowspan="1">
                                            hora
                                        </th>
                                        <th rowspan="2">
                                            OBSERVACION
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>12:00 am</th>
                                        <th>04:00 am</th>
                                        <th>08:00 am</th>
                                        <th>12:00 pm</th>
                                        <th>04:00 pm</th>
                                        <th>08:00 pm</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>