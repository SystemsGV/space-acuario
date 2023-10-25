-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 01:09:48
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
  `tmp_max` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_fishbowls`
--

INSERT INTO `tbl_fishbowls` (`id_bowl`, `name_bowl`, `type_bowl`, `water_bowl`, `large_bowl`, `width_bowl`, `height_bowl`, `volumen_bowl`, `install_bowl`, `create_date`, `status_bowl`, `species`, `tmp_min`, `tmp_max`) VALUES
(20, 'Vidrio 1', 'Pecera', 'Salada', '201', '53', '81', '862.89', '20-02-2023', '', 1, '', '20', '32');

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
  `fehcaM` varchar(50) NOT NULL,
  `horaM` varchar(50) NOT NULL,
  `movementM` varchar(15) NOT NULL
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
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_species`
--

INSERT INTO `tbl_species` (`id_specie`, `common_specie`, `scientific_specie`, `type_water`, `amount_fish`, `date_admission`, `reason_admission`, `date_exit`, `reason_exit`, `status`) VALUES
(1, 'Pez Payaso', 'Amphiprion oceallaris', 'Salada', 2, '', '', '', '', 1),
(2, 'Pez Payaso Fuego', 'Amphiprion ephippium', 'Salada', 1, '', '', '', '', 1);

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
-- AUTO_INCREMENT de la tabla `tbl_fishbowls`
--
ALTER TABLE `tbl_fishbowls`
  MODIFY `id_bowl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_movementstank`
--
ALTER TABLE `tbl_movementstank`
  MODIFY `id_mTank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_species`
--
ALTER TABLE `tbl_species`
  MODIFY `id_specie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
