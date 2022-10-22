-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2022 a las 17:42:05
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fc`
--

CREATE TABLE `fc` (
  `id` int(10) NOT NULL,
  `letra` varchar(1) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cuitEmisor` bigint(11) DEFAULT NULL,
  `ptovta` int(1) DEFAULT NULL,
  `cbtetipo` int(1) DEFAULT NULL,
  `numero` int(8) DEFAULT NULL,
  `importe` decimal(13,2) DEFAULT NULL,
  `moneda` varchar(3) DEFAULT NULL,
  `cotizacion` decimal(13,2) DEFAULT NULL,
  `doctipo` int(2) DEFAULT NULL,
  `docnro` bigint(11) DEFAULT NULL,
  `codTipoAut` varchar(1) DEFAULT NULL,
  `cae` bigint(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fc`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fc`
--
ALTER TABLE `fc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fc`
--
ALTER TABLE `fc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
