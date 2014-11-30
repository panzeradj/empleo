-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2014 a las 11:41:39
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empleo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlist`
--

CREATE TABLE IF NOT EXISTS `enlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  `frecuencia` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `palabras` varchar(250) DEFAULT NULL,
  `provincias` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `enlist`
--

INSERT INTO `enlist` (`id`, `estado`, `frecuencia`, `nombre`, `email`, `palabras`, `provincias`) VALUES
(2, 1, 0, 'pablo', 'peibol@elhacker.net', 'informatica', 'Palencia;Segovia;Soria;'),
(6, 1, 0, 'Nuria', 'airun_1_87@hotmail.com', 'Profesor', '&Aacutevila;Le&oacuten;Salamanca;Soria;Zamora;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
