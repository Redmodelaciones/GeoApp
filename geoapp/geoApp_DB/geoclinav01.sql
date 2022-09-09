-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-05-2022 a las 00:57:48
-- Versión del servidor: 5.7.38-cll-lve
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redmodelaciones_localizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `geoclinav01`
--

CREATE TABLE `geoclinav01` (
  `CLIIP` varchar(20) NOT NULL,
  `CLIPSCOD` varchar(2) NOT NULL DEFAULT '',
  `CLIPAIS` varchar(50) NOT NULL,
  `CLIFREG` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CLIDIRRF` varchar(200) NOT NULL,
  `CLILATITUDE` varchar(80) NOT NULL,
  `CLILONGITUDE` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `geoclinav01`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
