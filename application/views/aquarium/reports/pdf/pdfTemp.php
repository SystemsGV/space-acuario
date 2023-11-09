<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Temperatura</title>
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .none-border {
            border: none;
            background-color: #0000;
        }

        .bg-danger {
            color: red;
            font-weight: bold;
        }

        .bg-warning {
            font-weight: bold;
            color: orange;

        }

        .bg-succes {
            font-weight: bold;
            color: green;

        }
    </style>
</head>

<body>
    <?php
    function verifyLimited($min, $max, $data)
    {
        $lower = $min + 2;
        $upper = $max - 2;

        if ($data >= $lower && $data <= $upper) {
            $span = '<span class="bg-succes">' . $data . '</span>';
        } elseif ($data >= $min && $data <= $lower || $data >= $upper && $data <= $max) {
            $span = '<span class="bg-warning">' . $data . '</span>';
        } else {
            $span = '<span class="bg-danger">' . $data . '</span>';
        }
        return $span;
    }

    $registros_por_fecha = array();

    // Agrupar los registros por fecha
    foreach ($result as $registro) {
        $fecha = $registro->formatted_date;
        if (!isset($registros_por_fecha[$fecha])) {
            $registros_por_fecha[$fecha] = array();
        }
        $registros_por_fecha[$fecha][] = $registro;
    }

    // Mostrar los registros en tablas separadas por fecha
    foreach ($registros_por_fecha as $fecha => $registros) {
    ?>

        <table>
            <thead>
                <tr>
                    <th>Fecha: </th>
                    <th><?= $fecha ?></th>
                    <th class="none-border"></th>
                </tr>
                <tr>
                    <th rowspan="2">Acuario</th>
                    <th rowspan="2">Especies</th>
                    <th colspan="6" rowspan="1">
                        HORA
                    </th>
                    <th rowspan="2">
                        OBSERVACION
                    </th>
                </tr>
                <tr>
                    <th>12:00 am</th>
                    <th>4:00 am</th>
                    <th>8:00 am</th>
                    <th>12:00 pm</th>
                    <th>4:00 pm</th>
                    <th>8:00 pm</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($registros as $registro) {

                ?>
                    <tr>
                        <td class="td-min"><?= $registro->name_bowl ?></td>
                        <td class="td-min"><?= $registro->species ?></td>
                        <td class="td-min"><?= verifyLimited($registro->tmp_min, $registro->tmp_max, $registro->hour_12_am); ?></td>
                        <td class="td-min"><?= verifyLimited($registro->tmp_min, $registro->tmp_max, $registro->hour_4_am); ?></td>
                        <td class="td-min"><?= verifyLimited($registro->tmp_min, $registro->tmp_max, $registro->hour_8_am); ?></td>
                        <td class="td-min"><?= verifyLimited($registro->tmp_min, $registro->tmp_max, $registro->hour_12_pm); ?></td>
                        <td class="td-min"><?= verifyLimited($registro->tmp_min, $registro->tmp_max, $registro->hour_4_pm); ?></td>
                        <td class="td-min"><?= verifyLimited($registro->tmp_min, $registro->tmp_max, $registro->hour_8_pm); ?></td>
                        <td class="td-min"><?= $registro->observation ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br>
    <?php
    } ?>


</body>

</html>