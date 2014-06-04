-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2014 a las 22:18:42
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `xmlfeedreader`
--
CREATE DATABASE IF NOT EXISTS `xmlfeedreader` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `xmlfeedreader`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `LINK` varchar(900) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feeditem`
--

CREATE TABLE IF NOT EXISTS `feeditem` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDEN` int(11) NOT NULL,
  `FEEDID` int(11) NOT NULL,
  `TITLE` varchar(200) NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `LINK` varchar(800) NOT NULL,
  `GUID` varchar(200) NOT NULL,
  `PUBDATE` varchar(80) NOT NULL,
  `AUTHOR` varchar(100) NOT NULL,
  `MEDIA_THUMBNAIL1` varchar(800) NOT NULL,
  `MEDIA_THUMBNAIL2` varchar(800) NOT NULL,
  `MEDIA_CONTENT` varchar(200) NOT NULL,
  `MEDIA_CATEGORY` varchar(200) NOT NULL,
  `NUM` int(11) NOT NULL,
  `LASTBUILDDATE` varchar(200) NOT NULL,
  `FEEDNAME` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
