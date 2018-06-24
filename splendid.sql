-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 11:12 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `splendid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) NOT NULL,
  `parola` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nume`, `parola`) VALUES
(1, 'patron', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `categorii`
--

CREATE TABLE IF NOT EXISTS `categorii` (
  `id_categ` int(2) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categ`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categorii`
--

INSERT INTO `categorii` (`id_categ`, `categoria`) VALUES
(2, 'Aranjamente'),
(4, 'Bonsai'),
(1, 'Buchete'),
(3, 'Dulciuri');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `cnp` bigint(13) NOT NULL,
  `parola` char(32) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(30) NOT NULL,
  `oras` varchar(50) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`cnp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comenzi`
--

CREATE TABLE IF NOT EXISTS `comenzi` (
  `cod_comanda` int(4) NOT NULL AUTO_INCREMENT,
  `cnp` bigint(13) NOT NULL,
  `id_produs` int(2) NOT NULL,
  `bucati` int(2) NOT NULL,
  `data_comenzii` date NOT NULL,
  PRIMARY KEY (`cod_comanda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE IF NOT EXISTS `produse` (
  `id_produs` int(2) NOT NULL AUTO_INCREMENT,
  `fisier_imagine` varchar(50) NOT NULL,
  `imagine_mare` varchar(50) NOT NULL,
  `id_categ` int(2) NOT NULL,
  `nume_produs` varchar(200) NOT NULL,
  `prezentare` varchar(200) NOT NULL,
  `pastrare` varchar(200) NOT NULL,
  `limbajul_florilor` varchar(200) NOT NULL,
  `pret` double NOT NULL,
  PRIMARY KEY (`id_produs`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `vizitatori`
--

CREATE TABLE IF NOT EXISTS `vizitatori` (
  `nr` int(2) NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mesaj` varchar(200) NOT NULL,
  PRIMARY KEY (`nr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
