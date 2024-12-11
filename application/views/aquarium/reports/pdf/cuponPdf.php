<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Temperatura</title>
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/x-icon">
    <style>
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            background-color: #fff;
        }

        table {
            width: 100%;
        }

        p {
            width: auto;
            height: auto;
            -ms-transform: rotate(270deg);
            -webkit-transform: rotate(270deg);
            transform: rotate(270deg);
        }

        .tr-info {
            font-size: 12px;
            line-height: 1.2;
        }
    </style>
</head>
<?php
$nombreImagen = "assets/images/img_cupon2024.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
$barcode = "http://generator.barcodetools.com/barcode.png?gen=0&data=22122023800-" . $codigo . "&bcolor=FFFFFF&fcolor=000000&tcolor=000000&fh=14&bred=0&w2n=2.5&xdim=2&w=70px&h=220px&debug=1&btype=7&angle=90&quiet=1&balign=2&talign=0&guarg=1&text=1&tdown=1&stst=1&schk=0&cchk=1&ntxt=1&c128=0";
$barcodeImageLocalPath = 'assets/images/codes/barcode.png';

file_put_contents($barcodeImageLocalPath, file_get_contents($barcode));
$barcodeimg = "data:image/png;base64," . base64_encode(file_get_contents($barcodeImageLocalPath));

?>

<body>
    <table style="background: url('<?= $imagenBase64 ?>'); background-repeat:no-repeat; height:360px;">
        <tr>
            <td style="width:25px;">&nbsp;</td>
            <td style="text-align:left;">
                <img src="<?= $barcodeimg ?>" style="padding:60px 12px 12px 12px">
            </td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td>
                <b class="">BIENVENIDOS</b><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <b>EMPRESA: OLGA A. BOCANEGRA EIRL</b> <br><br>
            </td>
        </tr>
        <tr>
            <td>
                <b>ENTRADA AL PORTADOR</b><br><br>
            </td>
        </tr>
        <tr class="tr-info">
            <td>
                ¡Estamos felices de que hayas elegido La Granja Villa para pasar tu día! Nuestro objetivo es que vivas una experiencia entretenida y educativa al lado de tus seres queridos. Lee las siguientes indicaciones, por favor. te permitirán prepararte para el día de tu visita:<br>
                La persona que porte este cupón deberá tomar en cuenta que todas las coordinaciones se deberán de tratar directamente con la empresa a cargo.<br><br>
            </td>
        </tr>
        <tr class="tr-info">
            <td>
                1. La Pulsera Mágica es personal e intransferible. Es necesario tenerla colocada durante toda la visita para acceder libremente a los beneficios dentro del parque. En caso de retirársela y/o perderla, la reposición tiene un costo de S/. 5.00. Le permite al portador el ingreso a los juegos mecánicos, tours de animales silvestres, área de granja y zona acuática (solo en las fechas publicadas en nuestras plataformas digitales). Podrás ingresar a los juegos las veces que desees, siempre y cuando el horario, tu estatura y/o peso lo permitan. Niños a partir de los 80 cm de estatura deberán adquirir la pulsera mágica. <br>
                2. Niños por debajo de los 80 cm de estatura pueden ingresar al parque sin pulsera y tendrán acceso al área de granja, tours de animales silvestres y zona acuática acompañados de un adulto con pulsera mágica (solo en las fechas en nuestras plataformas digitales). Si desea que el niño participe de los juegos, deberá́ adquirir su pulsera mágica. Dale click a este enlace para ver los juegos que le brindaran acceso ilimitado al niño, de acuerdo a su estatura: http://www.lagranjavilla.com/atracciones/. En caso el niño no porte la pulsera mágica, no tendrá́ acceso a los juegos.<br>
                3. La pulsera mágica debe ser portada en el brazo derecho de cada visitante. En caso de retirársela y/o perderla, no podrá tener acceso a los beneficios. La reposición de otro material tiene un costo adicional. <br>
                4. La pulsera mágica tiene validez solo por el día que se adquiere. Si la persona se retira de las instalaciones, no podrá reingresar.<br>
                5. El personal realizará una inspección de todas las mochilas y bolsos que ingresen al parque, esto nos garantiza un día completamente seguro para todos.<br>
                6. Por seguridad, no está permitido el ingreso de alimentos, bebidas, mascotas, armas, pelotas, globos, inflables, coolers, cigarros, instrumentos musicales, palos selfie, trípode, flotadores, tapetes, juegos de propulsión a chorro o pistolas de agua o juguetes que puedan comprometer algún riesgo, silbatos, trompetas, megáfonos, objetos que emitan sonido, triciclos, bicicletas, scooters, skates, patinetas, patines, carritos, fósforos, objetos que generen fuego, tijeras, navajas, cuchillos u otros objetos punzo cortantes ni envases de vidrio al parque.<br>
                7. Una vez que el visitante ingresa a nuestras instalaciones, La Granja Villa se hace responsable de su seguridad dentro de nuestras instalaciones. En el siguiente link podrás encontrar nuestro protocolo:http://lagranjavilla.com/protocolos/mod1/index.php donde se indica que La Granja Villa se responsabiliza de los productos alimenticios que se elaboran y ofrecen, más no podemos responsabilizarnos de los alimentos que proceden de fuera, sobre los cuales no conocemos su preparación ni preservación.<br>

            </td>
        </tr>
        <tr class="tr-info">
            <td>

                8. En el caso del agua, está permitido ingresar 1 botella plástica SELLADA, máximo de 1 litro por persona. En el caso de papillas, leche en polvo, fórmula y termos de agua hervida que NO contengan vidrio en su interior (hasta máximo 750 ml), ingresan directamente. En el caso de que estos alimentos vengan en contenedores o termos de vidrio y refrigerios que contengan dietas especiales, podrán ingresar siempre y cuando se active protocolo requerido en la oficina de RRPP, según lo indicamos en: http://lagranjavilla.com/protocolos/mod3/index.php<br>
                9. Por su seguridad y la de otros visitantes, "Conforme a las recomendaciones para la prevención y cuidado de la salud dentro de nuestras instalaciones, el ingreso de los visitantes que demuestren signos de una enfermedad eruptiva o infectocontagiosa se encuentra restringido, en virtud de preservar la salud de nuestra comunidad y del propio visitante. Cabe indicar que el Ministerio de Salud cuenta con programas de vacunación gratuita y que las recomendaciones de aislamiento temporal responden a condiciones médicas generales, a efectos de evitar la transmisión y difusión de virus".<br>
                10. Es muy importante respetar las normas de seguridad que indica el operador de cada juego. Además,
                están publicadas en cada una de nuestras atracciones con el nombre de: GUIA DE SEGURIDAD. Los juegos
                funcionan en base a estatura y/o peso del visitante, ya que el sistema de seguridad es diseñado y dado
                por el fabricante de cada juego. Vulnerar alguna de estas medidas implica retirar a la persona del
                juego. Para más detalle de las guías de seguridad visita:
                http://lagranjavilla.com/protocolos/mod3/index.php<br>
                11. Por la privacidad de terceras personas, no se permiten las fotografías o grabaciones a visitantes
                que no sean de nuestro círculo amical o familiar.<br>
                12. Durante su visita, solo podrá ingresar una vez a la Mansión Embrujada, siempre que supere el 1.20 m
                de estatura.<br>
                13. No está permitido subir a los juegos con artículos que puedan desprenderse del usuario, ya que puede
                poner en riesgo la operatividad y la seguridad del juego y los visitantes. No se permiten los objetos
                como: carteras, canguros, gorras, mochilas, lentes, etc.<br>
                14. Por seguridad, en el juego del Disco Nazca, no se permite el ingreso con sandalias que no tengan
                correas reajustables, evitando que puedan salir disparadas y caigan en el riel de tránsito del juego. En
                el quiosco más cercano, se venden sujetadores que puedes colocar en tus sandalias si así lo deseas.<br>
                15. El horario de atención es de 10 a.m. a 6 p.m. en la mayoría de los juegos. Solo en el caso de:
                a) Black Hole, Río Granjero, Cuy Loco y 360 Vuelo estarán operativos en los siguientes horarios:<br>
                - Lunes a Viernes de 12:30 p.m. a 2:30 p.m. y de 4:00 p.m. a 5:30 p.m.<br>
                - Sábados, Domingos y Feriados de 12:30 p.m. a 5:30 p.m. de corrido.<br>
                b) Vikingo, Disco Nazca, Tagadisco, Mansión Embrujada y La Torre, estarán operativos de:<br>
                - Lunes a Domingo de 12:30 p.m. a 06:00 p.m.<br>
                16. El ingreso a los recintos de animales debe realizarse con serenidad y sin presión de los padres. No
                se recomienda obligar a los niños a ingresar, ya que los gritos y el llanto perturban a los animales,
                quienes podrían realizar conductas inadecuadas ante el estrés ocasionado por el ruido.<br>
                17. Los animales solo se deben alimentar con una dieta especial y balanceada, de acuerdo a su especie y
                características. El alimento que se otorga para la interacción está racionado y preparado para ofrecer
                la mejor experiencia al visitante sin perjuicio del animal. No se permite ofrecer alimentos a los
                animales que no sea proporcionado por nuestros especialistas y adquirido dentro del parque, ya que
                pueden atentar contra su bienestar y salud.<br>
                18. No se permite alterar la tranquilidad o manipular a los animales que se encuentran libres. Es
                importante seguir las indicaciones de los profesionales a cargo<br>
                19. En temporada de verano (fechas publicadas en nuestras plataformas digitales), se ofrece el servicio
                de la zona acuática, donde contamos con agua saludable certificada por DIGESA. Para mantener este
                estándar de calidad, antes de ingresar a las piscinas, los visitantes deben ducharse e ingresar solo con
                ropa de baño lycra o impermeable, indicado por la DS 007-2003-SA del 03 de abril del 2003 – DISA "El
                ingreso a la zona de piscinas es únicamente con ropa de baño". La ropa interior, polos y shorts (de
                deporte o algodón), no son ropa de baño, por lo que no se permitirá el ingreso a las piscinas con dicho
                material.<br>
                20. El ingreso a la zona acuática es de 10 a.m. a 5:15 p.m. en temporada de verano (fechas publicadas en
                las plataformas digitales).<br>
                21. Si deseas ingresar al parque y tienes entre 13 y 17 años, necesitas una carta de responsabilidad y
                autorización firmada por tus padres o apoderados. Esta carta se firma en Relaciones Públicas, en el
                ingreso a La Granja Villa. Puedes encontrar más detalles aquí:
                http://lagranjavilla.com/protocolos/mod2/index.php. Por seguridad, los menores de edad únicamente
                ingresarán a la zona acuática, acompañados de un adulto responsable. De lo contrario, no se permitirá el
                ingreso.<br>
                22. Recomendamos la aplicación de protector solar para evitar las insolaciones, sobre todo en temporada
                de verano. También se recomienda el uso de repelente.<br>
                23. La Granja Villa no se hace responsable por los cambios climáticos que puedan presentarse
                diariamente.<br>
                24. Para realizar cualquier pago con tarjeta de crédito es indispensable presentar su DNI. En el caso de
                ser extranjero, debe presentar su pasaporte o carnet de extranjería.<br>
                25.Sobre el uso de los lockers: El costo del servicio es de S/2.00 la hora y S/10.00 por 6 horas. La
                Granja Villa no se responsabiliza por pérdidas o robos de objetos dejados dentro de los lockers, por lo
                que no se recomienda dejar dinero ni objetos de valor. Se debe verificar que el casillero se encuentre
                cerrado en su totalidad. Por favor, siga las instrucciones que aparecen en la zona de los lockers. Por
                otro lado, si tuvieras algo que no se permite ingresar, podrás utilizar los lockers de la entrada por el
                precio de S/.1.00.<br>
                26. No se permite la venta de ningún tipo de mercadería dentro de las instalaciones de La Granja
                Villa.<br><br>
            </td>
        </tr>
        <tr>
            <td>

                ¡Gracias por elegirnos, pasa un día excelente!

            </td>
        </tr>
    </table>
</body>

</html>