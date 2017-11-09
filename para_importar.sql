-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2016 a las 16:33:35
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turicol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

DROP TABLE IF EXISTS `asesor`;
CREATE TABLE IF NOT EXISTS `asesor` (
  `codigo` int(10) NOT NULL,
  `cedula` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `salario` int(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `cliente_asesor` int(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `cedula` (`cedula`),
  KEY `cliente_asesor` (`cliente_asesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`codigo`, `cedula`, `nombre`, `salario`, `direccion`, `fecha_de_nacimiento`, `cliente_asesor`) VALUES
(1, 1100, 'andres', 1002021, 'calle', '2016-11-09', NULL),
(1212, 12312312, '123123123', 12312, '123123', '2016-11-10', 1),
(12312, 12312, 'QWEQWE', 90956, 'Q21REWQF', '2016-11-01', 1),
(12515, 15324, 'qffa', 12213, 'dawdf', '2016-11-12', 12312),
(43141, 23123, '1231', 23123, '123112', '2016-11-04', 1212),
(671462, 6156732, 'fawf', 2314, 'dasfw', '2016-11-10', 1),
(3565623, 314612, 'qewfs', 123141, 'fafwafa', '2016-11-04', 12515),
(6714623, 61567323, 'fawf', 2314, 'dasfw', '2016-11-10', 1212);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `asesor` int(10) NOT NULL,
  PRIMARY KEY (`cedula`),
  KEY `asesor` (`asesor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `direccion`, `asesor`) VALUES
(4214, 'qwe', 'qweqw', 1),
(102039, 'lucas', 'asjww', 12312),
(123132451, 'dawf', 'asdwafaw', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD CONSTRAINT `asesor_ibfk_1` FOREIGN KEY (`cliente_asesor`) REFERENCES `asesor` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`asesor`) REFERENCES `asesor` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
