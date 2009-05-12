-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2009 a las 13:14:32
-- Versión del servidor: 5.1.30
-- Versión de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `reservaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,	
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,  
  `departamento` varchar(20) NOT NULL,
  `nivel` int(1) NOT NULL,	
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `clave`, `nombre`, `apellido`, `departamento`, `nivel`) VALUES
(1, 'pati', '42c3392a91aad6c9e55790c9193ddc94', 'Patricia', 'Alvarez', 'administracion', 2),
(2, 'jaime.anaya', '7a935c859f787e9d9a8d6344eec4f1dd', 'Jaime', 'Anaya', 'computacion', 1),
(3, 'raul.martinez', '98db6b11ffb2742f823992e290e04c53', 'Raul', 'Martinez', 'computacion', 1),
(4, 'walter.sanchez', '9296555dc5df62f70a22ef4816cc0bab', 'Walter', 'Sanchez', 'computacion', 1),
(5, 'melvin.carias', 'pc20062670112c17c6c4217e6303f822', 'Melvin', 'Carias', 'computacion', 1),
(6, 'yenny.artiga', 'd5ed9aa3fcd3ef0fde808f37b9e17bcf', 'Yenny', 'Artiga', 'computacion', 1),
(7, 'iris.abarca', 'fc0a9ef8fa66219c5f5d81cb614ebfb2', 'Iris', 'Abarca', 'computacion', 1),
(8, 'milton.narvaez', '9350c0880a346ac5be67e3b729c1ba54', 'Milton', 'Narvaez', 'computacion', 1);

--
-- Los pares usuario/contraseña son:
--
-- pati/udb2009
-- jaime.anaya/pc2009
-- raul.martinez/pc2008
-- walter.sanchez/pc2007
-- melvin.carias/pc2006
-- yenny.artiga/pc2005
-- iris.abarca/pc2004
-- milton.narvaez/pc2003

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,	
  `tipo` varchar(20) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`tipo`, `numero`) VALUES
('laptop', 1), ('laptop', 2), ('laptop', 3),
('laptop', 4), ('laptop', 5), ('laptop', 6),
('canon', 1), ('canon', 2), ('canon', 3), ('canon', 4),
('canon', 5), ('canon', 6), ('canon', 7), ('canon', 8),
('canon', 9);

;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reserva` datetime NOT NULL,
  `hora_prestamo` time NOT NULL,
  `hora_devolucion` time NOT NULL,
  `aula` varchar(8) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `canon` int NOT NULL,
  `laptop` int NOT NULL,
  `id_canon` int(11) DEFAULT NULL,
  `id_laptop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `FK_Reservaciones_id_user` (`id_user`),
  KEY `FK_Reservaciones_id_canon` (`id_canon`),
  KEY `FK_Reservaciones_id_laptop` (`id_laptop`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
