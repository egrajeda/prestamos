-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2009 a las 13:14:32
-- Versión del servidor: 5.1.30
-- Versión de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,	
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  `nivel` varchar(13) NOT NULL,	
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`,`departamento`, `nivel`) VALUES
('pati', '42c3392a91aad6c9e55790c9193ddc94','administracion', 'administrador'),
('jaime.anaya', '7a935c859f787e9d9a8d6344eec4f1dd','computacion', 'normal'),
('raul.martinez', '98db6b11ffb2742f823992e290e04c53','computacion', 'normal'),
('walter.sanchez', '9296555dc5df62f70a22ef4816cc0bab','computacion', 'normal'),
('melvin.carias', 'pc20062670112c17c6c4217e6303f822d4ae73','computacion', 'normal'),
('yenny.artiga', 'd5ed9aa3fcd3ef0fde808f37b9e17bcf','computacion', 'normal'),
('iris.abarca', 'fc0a9ef8fa66219c5f5d81cb614ebfb2','computacion', 'normal'),
('milton.narvaez', '9350c0880a346ac5be67e3b729c1ba54','computacion', 'normal');
-- udb2009
-- pc2009
-- pc2008
-- pc2007
-- pc2006
-- pc2005
-- pc2004
-- pc2003
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,	
  `nombre` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `serial` varchar(10) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `equipos` (`nombre`, `tipo`, `serial`) VALUES
('Acer', 'Laptop','ENE07-4208'),
('HP', 'Laptop','MAY05-8741'),
('InFocus', 'Proyector','NOV08-3759'),
('BenQ', 'Proyector','AGO06-6498');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reserva` datetime NOT NULL,
  `hora_prestamo` time NOT NULL,
  `hora_devolucion` time NOT NULL,
  `materia` varchar(20) NOT NULL,
  `aula` varchar(8) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,	
  PRIMARY KEY (`id_reserva`),
  KEY `FK_Reservaciones_id_user` (`id_user`),
  KEY `FK_Reservaciones_id_equipo` (`id_equipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`fecha_reserva`, `hora_prestamo`, `hora_devolucion`, `materia`, `aula`, `descripcion`, `id_user`, `id_equipo`) VALUES
('2009/05/13', '08:00:00', '09:00:00', 'PHP', 'C-33', 'Clases', 4, 1),
('2009/05/14', '10:00:00', '11:00:00', 'SQL', 'C-34', 'Defensa Proyecto', 7, 3);

-- --------------------------------------------------------

