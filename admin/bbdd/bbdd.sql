-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2015 a las 20:52:16
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE IF NOT EXISTS `albumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `caratula` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`id`, `nombre`, `caratula`, `fecha`) VALUES
(1, '001-LAUNCH WEEK', '1434799825cover1.jpg', '2011-07-07'),
(2, '002-EARLY STAGE', '1434799830cover2.png', '2011-09-28'),
(3, '003-MOMENTUM', '1434799835cover3.jpg', '2011-11-09'),
(4, '004-IDENTITY', '1434799840cover4.png', '2011-12-18'),
(5, '005-EVOLUTION', '1434799845cover5.jpg', '2012-02-20'),
(6, '006-EMBRACE', '1434799850cover6.png', '2012-04-13'),
(15, '007-SOLACE', '1435432264_a0987924755_10.jpg', '2015-06-13'),
(16, '008-ANNIVERSARY', '1435435312_unofficial_monstercat_album_cover_008__anniversary_by_petirep-d6d8tr7.png', '2015-06-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE IF NOT EXISTS `canciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) NOT NULL,
  `id_album` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_album`),
  KEY `fk_canciones_albumes_idx` (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id`, `titulo`, `autor`, `ruta`, `id_album`) VALUES
(1, 'Snake Eyes', 'Feint', '[DnB] - Feint - Snake Eyes (feat. CoMa) [Monstercat Release].mp3', 6),
(2, 'Thundergun', '1UP', '1uP - Thundergun.mp3', 6),
(3, 'Cold Blood & Ice cream cones', 'Arion', 'Arion - Cold Blood & Ice Cream Cones.mp3', 1),
(4, 'Dubstep killed Rock ''n Roll.mp3', 'Ephixa', 'Ephixa - Dubstep Killed Rock ''n Roll.mp3', 1),
(5, 'Airwaves', 'Noisestorm', 'Noisestorm - Airwaves.mp3', 2),
(6, 'Another World', 'Obsidia', 'Obsidia - Another World.mp3', 2),
(7, 'Fromless', 'Feint', 'Feint - Formless.mp3', 3),
(8, 'Full Grizzly', 'Going Quantum', 'Going Quantum - Full Grizzly.mp3', 3),
(9, 'Kill It With Fire', 'DotEXE', 'DotEXE - Kill It With Fire.mp3', 4),
(10, 'Deadline', 'Project 46', 'Project 46 - Deadline.mp3', 4),
(11, 'Laguna', 'Eminence', 'Eminence - Laguna.mp3', 5),
(12, 'Bad Pitched', 'Insan3lik3', 'Insan3Lik3 - Bad Pitched.mp3', 5),
(13, 'Breakdown', 'Noisestorm', 'Noisestorm - Breakdown.mp3', 15),
(14, 'Disconnected', 'Pegboard Nerds', 'Pegboard Nerds - Disconnected.mp3', 15),
(15, 'Too Simple', 'Tristam', 'Tristam - Too Simple.mp3', 16),
(16, 'Don''t Push Me', 'Tut Tut Child', 'Tut Tut Child - Don''t Push Me.mp3', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'Carlos', 'cmmayorga@outlook.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'CICE', 'cice@cice.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `fk_canciones_albumes` FOREIGN KEY (`id_album`) REFERENCES `albumes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
