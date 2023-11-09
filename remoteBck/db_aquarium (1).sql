-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 23:17:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_aquarium`
--
CREATE DATABASE IF NOT EXISTS `db_aquarium` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_aquarium`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tank_data`
--

CREATE TABLE `tank_data` (
  `id` int(11) NOT NULL,
  `tank_name` int(11) NOT NULL,
  `hour_12_am` varchar(11) NOT NULL,
  `hour_4_am` varchar(11) NOT NULL,
  `hour_8_am` varchar(11) NOT NULL,
  `hour_12_pm` varchar(11) NOT NULL,
  `hour_4_pm` varchar(11) NOT NULL,
  `hour_8_pm` varchar(11) NOT NULL,
  `observation` varchar(255) NOT NULL,
  `recorded_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tank_data`
--

INSERT INTO `tank_data` (`id`, `tank_name`, `hour_12_am`, `hour_4_am`, `hour_8_am`, `hour_12_pm`, `hour_4_pm`, `hour_8_pm`, `observation`, `recorded_date`) VALUES
(102, 21, '22', '23', '24', '24', '', '', '', '09-11-2023'),
(103, 22, '24', '31', '26', '', '', '', '', '09-11-2023'),
(104, 23, '23', '', '', '30', '', '', '', '09-11-2023'),
(105, 24, '', '', '', '', '', '', '', '09-11-2023'),
(106, 25, '', '', '', '', '', '', '', '09-11-2023'),
(107, 26, '', '', '', '', '', '', '', '09-11-2023'),
(108, 27, '', '', '', '', '', '', '', '09-11-2023'),
(109, 28, '', '', '', '', '', '', '', '09-11-2023'),
(110, 29, '', '', '', '', '', '', '', '09-11-2023'),
(111, 30, '', '', '', '', '', '', '', '09-11-2023'),
(112, 31, '', '', '', '', '', '', '', '09-11-2023'),
(113, 32, '', '', '', '', '', '', '', '09-11-2023'),
(114, 33, '', '', '', '', '', '', '', '09-11-2023'),
(115, 34, '', '', '', '', '', '', '', '09-11-2023'),
(116, 35, '', '', '', '', '', '', '', '09-11-2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_fishbowls`
--

CREATE TABLE `tbl_fishbowls` (
  `id_bowl` int(11) NOT NULL,
  `name_bowl` varchar(40) NOT NULL,
  `type_bowl` varchar(30) NOT NULL,
  `water_bowl` varchar(20) NOT NULL,
  `large_bowl` varchar(11) NOT NULL,
  `width_bowl` varchar(11) NOT NULL,
  `height_bowl` varchar(11) NOT NULL,
  `volumen_bowl` varchar(30) NOT NULL,
  `install_bowl` varchar(40) NOT NULL,
  `create_date` varchar(40) NOT NULL,
  `status_bowl` int(11) NOT NULL,
  `species` varchar(50) NOT NULL,
  `tmp_min` varchar(11) NOT NULL,
  `tmp_max` varchar(11) NOT NULL,
  `total_species` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_fishbowls`
--

INSERT INTO `tbl_fishbowls` (`id_bowl`, `name_bowl`, `type_bowl`, `water_bowl`, `large_bowl`, `width_bowl`, `height_bowl`, `volumen_bowl`, `install_bowl`, `create_date`, `status_bowl`, `species`, `tmp_min`, `tmp_max`, `total_species`) VALUES
(21, 'Vidrio 1', 'Pecera', 'Salada', '123', '123', '123', '1,860.87', '20-02-2023', '', 1, '', '24', '32', 9),
(22, 'Vidrio 2', 'Pecera', 'Dulce', '123', '123', '123', '1,860.87', '20-02-2023', '', 1, '', '24', '32', 1),
(23, 'Vidrio 3', 'Pecera', 'Dulce', '200', '49.7', '80', '795.20', '20-02-2023', '', 1, '', '24', '32', 2),
(24, 'Vidrio 4', 'Pecera', 'Dulce', '144.3', '50', '62.3', '449.49', '20-02-2023', '', 2, '', '20', '30', 1),
(25, 'Vidrio 5', 'Pecera', 'Dulce', '144.3', '50', '62.3', '449.49', '20-02-2023', '', 1, '', '24', '32', 1),
(26, 'Fibra 1', 'Acuario', 'Dulce', '143', '93', '67', '891.03', '20-02-2023', '', 1, '', '22', '30', 6),
(27, 'Vidrio 6', 'Pecera', 'Dulce', '144.3', '50', '62.3', '449.49', '20-02-2023', '', 2, '', '20', '32', 0),
(28, 'Fibra 2', 'Acuario', 'Dulce', '143', '93', '67', '891.03', '20-02-2023', '', 1, '', '20', '24', 0),
(29, 'Fibra 3', 'Acuario', 'Dulce', '143', '93', '51', '678.25', '20-02-2023', '', 1, '', '24', '30', 0),
(30, 'Gigante', 'Acuario', 'Dulce', '512', '240', '210', '25,804.80', '20-02-2023', '', 1, '', '20', '28', 0),
(31, 'Central', 'Poza', 'Dulce', '470', '470', '25', '5,522.50', '20-02-2023', '', 1, '', '20', '32', 0),
(32, 'Externa', 'Poza', 'Dulce', '910', '650', '50', '29,575.00', '20-02-2023', '', 1, '', '20', '25', 0),
(33, 'Cuarentena 1', 'Pecera', 'Dulce', '107', '40', '40', '171.20', '20-02-2023', '', 1, '', '20', '25', 0),
(34, 'Cuarentena 2', 'Poza', 'Dulce', '107', '40', '40', '171.20', '20-02-2023', '', 1, '', '20', '25', 0),
(35, 'Cuarentena 3', 'Pecera', 'Dulce', '107', '40', '40', '171.20', '20-02-2023', '', 1, '', '20', '25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_movementstank`
--

CREATE TABLE `tbl_movementstank` (
  `id_mTank` int(11) NOT NULL,
  `tankId` int(11) NOT NULL,
  `specieId` int(11) NOT NULL,
  `amountM` int(11) NOT NULL,
  `reasonM` varchar(250) NOT NULL,
  `dateM` varchar(50) NOT NULL,
  `hourM` varchar(50) NOT NULL,
  `movementM` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id_notify` int(11) NOT NULL,
  `title_notify` varchar(255) DEFAULT NULL,
  `content_notify` text DEFAULT NULL,
  `redirect_url_notify` varchar(255) DEFAULT NULL,
  `alert_type_notify` enum('warning','notification','error') DEFAULT NULL,
  `date_time_notify` timestamp NOT NULL DEFAULT current_timestamp(),
  `keyFilter` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status_notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`id_notify`, `title_notify`, `content_notify`, `redirect_url_notify`, `alert_type_notify`, `date_time_notify`, `keyFilter`, `date`, `status_notify`) VALUES
(113, 'Temperatura al Límite', 'Pecera Vidrio 1: 24 entre 24 y 32', 'Control-Temperatura', 'warning', '2023-11-09 22:02:33', '21,hour_12_pm,2,09-11-2023', '09-11-2023', 0),
(114, 'Temperatura al Límite', 'Pecera Vidrio 2: 31 entre 24 y 32', 'Control-Temperatura', 'warning', '2023-11-09 22:02:47', '22,hour_4_am,2,09-11-2023', '09-11-2023', 0),
(115, 'Temperatura Paso Límite', 'Pecera Vidrio 3: 23 Paso el rango de 24 y 32', 'Control-Temperatura', 'error', '2023-11-09 22:02:56', '23,hour_12_am,3,09-11-2023', '09-11-2023', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_speciebowls`
--

CREATE TABLE `tbl_speciebowls` (
  `specie` int(11) NOT NULL,
  `tank` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_species`
--

CREATE TABLE `tbl_species` (
  `id_specie` int(11) NOT NULL,
  `common_specie` varchar(50) NOT NULL,
  `scientific_specie` varchar(60) NOT NULL,
  `type_water` varchar(10) NOT NULL,
  `amount_fish` int(11) NOT NULL,
  `date_admission` varchar(30) NOT NULL,
  `reason_admission` varchar(100) NOT NULL,
  `date_exit` varchar(30) NOT NULL,
  `reason_exit` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `total_species` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_species`
--

INSERT INTO `tbl_species` (`id_specie`, `common_specie`, `scientific_specie`, `type_water`, `amount_fish`, `date_admission`, `reason_admission`, `date_exit`, `reason_exit`, `status`, `total_species`) VALUES
(1, 'Pez Payaso', 'Amphiprion oceallaris', 'Salada', 2, '', '', '', '', 1, 2),
(2, 'Pez Payaso Fuego', 'Amphiprion ephippium', 'Salada', 2, '', '', '', '', 1, 2),
(3, 'Pez Cirujano', 'Paracanthurus hepatus', 'Dulce', 3, '', '', '', '', 1, 3),
(7, 'Amphiprion seabe', 'Pez Payaso Cebra', 'Dulce', 1, '', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_pass` varchar(12) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_photo` varchar(30) NOT NULL,
  `id_empoyee` varchar(20) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_pass`, `id_rol`, `user_mail`, `user_photo`, `id_empoyee`, `id_status`) VALUES
(1, 'EMERSON', 'valenzuela', 1, 'valenestradam1@gmail.com', '123456789', '12345678', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tank_data`
--
ALTER TABLE `tank_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_fishbowls`
--
ALTER TABLE `tbl_fishbowls`
  ADD PRIMARY KEY (`id_bowl`);

--
-- Indices de la tabla `tbl_movementstank`
--
ALTER TABLE `tbl_movementstank`
  ADD PRIMARY KEY (`id_mTank`);

--
-- Indices de la tabla `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id_notify`);

--
-- Indices de la tabla `tbl_species`
--
ALTER TABLE `tbl_species`
  ADD PRIMARY KEY (`id_specie`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tank_data`
--
ALTER TABLE `tank_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `tbl_fishbowls`
--
ALTER TABLE `tbl_fishbowls`
  MODIFY `id_bowl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tbl_movementstank`
--
ALTER TABLE `tbl_movementstank`
  MODIFY `id_mTank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id_notify` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `tbl_species`
--
ALTER TABLE `tbl_species`
  MODIFY `id_specie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `generate_tank_data` ON SCHEDULE EVERY 1 MINUTE STARTS '2023-11-03 00:00:01' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    -- Inserta un registro en tank_data para cada pecera
    INSERT INTO tank_data (tank_name, recorded_date)
    SELECT id_bowl, DATE_FORMAT(CURRENT_DATE(), '%d-%m-%Y')
    FROM tbl_fishbowls
    WHERE NOT EXISTS (
        SELECT 1
        FROM tank_data
        WHERE tank_data.tank_name = tbl_fishbowls.id_bowl
          AND tank_data.recorded_date = DATE_FORMAT(CURRENT_DATE(), '%d-%m-%Y')
    );
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
