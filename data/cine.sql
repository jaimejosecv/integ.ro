-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 27-05-2019 a las 02:53:04
-- Versión del servidor: 6.0.4
-- Versión de PHP: 6.0.0-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `cine`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `peliculas`
-- 

CREATE TABLE `peliculas` (
  `id_peliculas` int(11) NOT NULL AUTO_INCREMENT,
  `tit_peliculas` varchar(250) DEFAULT NULL,
  `sip_peliculas` text,
  `ima_peliculas` varchar(250) DEFAULT NULL,
  `ano_peliculas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peliculas`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Volcar la base de datos para la tabla `peliculas`
-- 

INSERT INTO `peliculas` VALUES (1, 'Avengers: Infinity War', 'Los Vengadores y sus aliados de Marvel', 'avengers-infinity-war.jpg', 2018);
INSERT INTO `peliculas` VALUES (3, 'Ant-Man and the Wasp', 'Después de su experiencia con el Capitán América', 'ant-man-and-the-wasp.jpg', 2018);
INSERT INTO `peliculas` VALUES (4, 'Pantera Negra', 'T Challa, el rey de Wakanda', 'black-panther.jpg', 2018);
INSERT INTO `peliculas` VALUES (5, 'Thor: Ragnarok', 'Thor está atrapado en el otro lado del universo', 'thor-ragnarok.jpg', 2017);
INSERT INTO `peliculas` VALUES (6, 'Spider-Man: De regreso a casa', 'Peter Parker trata de equilibrar su vida', 'spider-man-de-regreso-a-casa.jpg', 2017);
INSERT INTO `peliculas` VALUES (7, 'Guardianes de la Galaxia Vol. 2', 'Después de salvar Xandar, los Guardianes', 'guardians-of-the-galaxy-vol-2.jpg', 2017);
INSERT INTO `peliculas` VALUES (18, 'sdas', '', '', 2019);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usuario` varchar(100) DEFAULT NULL,
  `nickname` varchar(80) DEFAULT NULL,
  `cla_usuario` varchar(40) DEFAULT NULL,
  `ema_usuario` varchar(200) DEFAULT NULL,
  `ava_usuario` varchar(250) DEFAULT NULL,
  `ima_usuario` varchar(250) DEFAULT NULL,
  `fec_usuario` date DEFAULT NULL,
  `hor_usuario` time DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES (1, 'Jaime Carrasquero', 'jaimejosec', 'Jaime7', 'register@gmail.com', 'avatar.jpg', 'fondo.jpg', '2019-05-26', '18:42:19');
INSERT INTO `usuario` VALUES (2, 'Ashley Carrasquero', 'ashleyc', 'Ashley8', 'register@gmail.com', '', '', '2019-05-26', '18:42:52');
INSERT INTO `usuario` VALUES (3, 'Juana Mendez', 'juana', 'Juana5', 'juana@ff.com', '', '', '2019-05-26', '20:20:58');
INSERT INTO `usuario` VALUES (5, 'Iliani Jimenez', 'Ilinia', 'Iliani9', 'jaimejcarrasquero@gmail.com', '', '', '2019-05-26', '20:27:53');
