-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2014 a las 21:21:44
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mtgtrade`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `multiverseid` int(11) NOT NULL DEFAULT '0',
  `layout` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `names` varchar(255) DEFAULT NULL,
  `manaCost` varchar(255) DEFAULT NULL,
  `cmc` decimal(10,0) DEFAULT NULL,
  `colors` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `supertypes` varchar(255) DEFAULT NULL,
  `types` varchar(255) DEFAULT NULL,
  `subtypes` varchar(255) DEFAULT NULL,
  `rarity` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `flavor` varchar(255) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `power` varchar(255) DEFAULT NULL,
  `toughness` varchar(255) DEFAULT NULL,
  `loyalty` int(11) DEFAULT NULL,
  `variations` varchar(255) DEFAULT NULL,
  `imageName` varchar(255) DEFAULT NULL,
  `watermark` varchar(255) DEFAULT NULL,
  `border` varchar(255) DEFAULT NULL,
  `hand` int(11) DEFAULT NULL,
  `life` int(11) DEFAULT NULL,
  `rulings` varchar(255) DEFAULT NULL,
  `foreignNames` varchar(255) DEFAULT NULL,
  `printings` varchar(255) DEFAULT NULL,
  `originalText` varchar(255) DEFAULT NULL,
  `originalType` varchar(255) DEFAULT NULL,
  `legalities` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`multiverseid`),
  FULLTEXT KEY `layout` (`layout`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` int(100) DEFAULT NULL,
  `country` int(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `city`, `country`, `name`) VALUES
(1, 'lviegas@dlatv.net', 'qqqqq', 0, 0, 'lucas'),
(2, 'lviegas2@dlatv.net', '12345', 0, 0, 'lucas'),
(3, 'lviegas2@dlatv.net', '12345', 0, 0, 'lucas'),
(4, 'lviegas3@gmail.com', 'wwwww', 0, 0, 'asf'),
(5, 'lviegas3@gmail.com', 'wwwww', 0, 0, 'asf'),
(6, 'lviegas3@gmail.com', 'wwwww', 0, 0, 'asf'),
(7, 'lviegas4@gmail.com', 'wwwww', 0, 0, 'asf'),
(8, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(9, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(10, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(11, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(12, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(13, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(14, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(15, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(16, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(17, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(18, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(19, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(20, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(21, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(22, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(23, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(24, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(25, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(26, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(27, 'lviegas3@gmail.com', 'aaaaa', 0, 0, ''),
(28, 'lviegas3@gmail.com', 'aaaaa', 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
