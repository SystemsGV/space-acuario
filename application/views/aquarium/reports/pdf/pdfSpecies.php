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
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .none-border {
            border: none;
            background-color: #0000;
        }

        img {
            height: 10%;
            float: right;
        }
    </style>
</head>

<body>
    <?php
    $nombreImagen = "assets/images/logo.png";
    $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
    $totalSum = 0;
    ?>
    <img src="<?php echo $imagenBase64 ?>" alt="">

    <br><br><br><br><br><br><br><br>
    <table>
        <thead>
            <tr>
                <td rowspan="<?= count($result) + 2 ?>">ESPECIES ACUARIO</td>
                <th>NOMBRE CIENTÍFICO</th>
                <th>NOMBRE COMÚN</th>
                <th>CANTIDAD</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $species) :
                $totalSum += intval($species->total_species);
                echo "<tr>
                <td>{$species->scientific_specie}</td>
                <td>{$species->common_specie}</td>
                <td>{$species->total_species}</td>
            </tr>";
            endforeach ?>
            <tr>
                <td colspan="2"><b>SUBTOTAL</b></td>
                <td><?= $totalSum ?></td>
            </tr>
        </tbody>
    </table>


</body>

</html>