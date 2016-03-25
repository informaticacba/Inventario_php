-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- Programmer: 
-- Servidor: localhost
-- Tiempo de generación: 27-09-2015 a las 17:59:33
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6


-- En la tabla equipos no tiene el serial como autoincrementable

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `compu`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `abonos`
-- 

CREATE TABLE `abonos` (
  `mov_id` int(10) NOT NULL auto_increment,
  `abono_modelo` varchar(30) NOT NULL,
  `abono_valor` varchar(30) NOT NULL,
  `abono_serial` varchar(30) NOT NULL,
  `abono_fecha` datetime NOT NULL,
  `abono_cliente` varchar(40) NOT NULL,
  PRIMARY KEY  (`mov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Volcar la base de datos para la tabla `abonos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `equipos`
-- 

CREATE TABLE `equipos` (
  `modelo` varchar(40) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `proveedor` varchar(30) NOT NULL,
  `cantidad` bigint(10) NOT NULL,
  `des` varchar(40) NOT NULL,
  `fecha` datetime NOT NULL,
  `garantia` varchar(20) NOT NULL,
  `serial` text NOT NULL,
  `base` bigint(20) NOT NULL,
  `publico` bigint(20) NOT NULL,
  `cliente` varchar(40) NOT NULL,
  `dir` varchar(40) NOT NULL,
  `tel` varchar(30) NOT NULL,
  PRIMARY KEY  (`modelo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `equipos`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mov_compu`
-- 

CREATE TABLE `mov_compu` (
  `mov_id` int(10) NOT NULL auto_increment,
  `compu_tipo` varchar(20) NOT NULL,
  `compu_modelo` varchar(30) NOT NULL,
  `compu_marca` varchar(30) NOT NULL,
  `compu_qty` bigint(20) NOT NULL,
  `compu_fecha` date NOT NULL,
  `compu_prov` varchar(30) NOT NULL,
  `compu_garantia` varchar(20) NOT NULL,
  `compu_serial` varchar(20) NOT NULL,
  `compu_des` varchar(30) NOT NULL,
  `compu_cli` varchar(30) NOT NULL,
  PRIMARY KEY  (`mov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

-- 
-- Volcar la base de datos para la tabla `mov_compu`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `mov_servicios`
-- 

CREATE TABLE `mov_servicios` (
  `mov_id` int(10) NOT NULL auto_increment,
  `serv_tipo` varchar(30) NOT NULL,
  `serv_pub` bigint(30) NOT NULL,
  `serv_pago` bigint(30) NOT NULL,
  `serv_fecha` datetime NOT NULL,
  `serv_modelo` varchar(30) NOT NULL,
  `serv_abono` bigint(30) NOT NULL,
  `ganancia` bigint(30) NOT NULL,
  `serv_serial` varchar(30) NOT NULL,
  `serv_cli` varchar(40) NOT NULL,
  `serv_tel` varchar(20) NOT NULL,
  PRIMARY KEY  (`mov_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `mov_servicios`
-- 

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
