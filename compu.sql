-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 11-01-2016 a las 13:19:24
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `compu`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `configuracion`
-- 

CREATE TABLE `configuracion` (
  `id_tipo` int(10) NOT NULL auto_increment,
  `nombre_tipo` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Volcar la base de datos para la tabla `configuracion`
-- 

INSERT INTO `configuracion` VALUES (22, 'Botellas');
INSERT INTO `configuracion` VALUES (24, 'Cajas');
INSERT INTO `configuracion` VALUES (27, 'Sacos');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `registro`
-- 

CREATE TABLE `registro` (
  `tipo` varchar(40) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `obser` varchar(30) NOT NULL,
  `unidades` bigint(10) NOT NULL,
  `des` varchar(40) NOT NULL,
  `fecha` datetime NOT NULL,
  `serial` varchar(100) NOT NULL,
  `cliente` varchar(40) NOT NULL,
  PRIMARY KEY  (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `registro`
-- 

INSERT INTO `registro` VALUES ('Sacos', 'arroz', 'Para Comedor', 89, '', '2016-01-11 01:00:51', '569399885fefa', '');
INSERT INTO `registro` VALUES ('Cajas', 'mantequilla', 'Para Untar', 10, '', '2016-01-11 12:47:57', '56939aa696acf', '');
INSERT INTO `registro` VALUES ('Cajas', 'maiz', 'Para Las Gallinas', 9, '', '2016-01-11 12:45:37', '5693966aaabdb', '');
INSERT INTO `registro` VALUES ('Botellas', 'Agua Mineral', 'Para Los Sujetos De Aprendizaj', 1200, '', '2016-01-11 12:45:14', '569395deb3484', '');
INSERT INTO `registro` VALUES ('Cajas', 'Purina', 'Para Los Animales', 1, '', '2016-01-11 12:42:44', '569395409db0c', '');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `reporte`
-- 

CREATE TABLE `reporte` (
  `mov_id` int(10) NOT NULL auto_increment,
  `tipo_m` varchar(20) NOT NULL,
  `compu_unidades` bigint(20) NOT NULL,
  `compu_fecha` date NOT NULL,
  `compu_cli` varchar(30) NOT NULL,
  `compu_observacion` varchar(30) NOT NULL,
  `compu_tipo` varchar(20) NOT NULL,
  `compu_des` varchar(30) NOT NULL,
  PRIMARY KEY  (`mov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200 ;

-- 
-- Volcar la base de datos para la tabla `reporte`
-- 

INSERT INTO `reporte` VALUES (199, 'Salida', 1, '2016-01-11', 'Arturo', 'Arroz', '27', 'Hacer Paella');
INSERT INTO `reporte` VALUES (197, 'Salida', 10, '2016-01-11', 'Arturo', 'Arroz', '27', 'Cocinar');
INSERT INTO `reporte` VALUES (198, 'Ingreso', 10, '2016-01-11', '', 'mantequilla', 'Cajas', 'Para Untar');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `users`
-- 

CREATE TABLE `users` (
  `id` int(10) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `users`
-- 

INSERT INTO `users` VALUES (2, 'admin', 'admin');
INSERT INTO `users` VALUES (3, 'gnuxdar', '123');
