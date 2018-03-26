-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2018 at 11:39 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andzoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `categorieID` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`categorieID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur_client`
--

DROP TABLE IF EXISTS `fournisseur_client`;
CREATE TABLE IF NOT EXISTS `fournisseur_client` (
  `frID` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  PRIMARY KEY (`frID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `programmeID` int(11) NOT NULL AUTO_INCREMENT,
  `programme` varchar(255) NOT NULL,
  PRIMARY KEY (`programmeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_operation`
--

DROP TABLE IF EXISTS `type_operation`;
CREATE TABLE IF NOT EXISTS `type_operation` (
  `typeID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_level`) VALUES
(1, 'User@gmail.com', '$2y$10$EfoTaISOiojq2sThlRiGyuX5eOJlSXpeDhC5GV5rfcl3jFA6F90WS', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vignette`
--

DROP TABLE IF EXISTS `vignette`;
CREATE TABLE IF NOT EXISTS `vignette` (
  `vignetteID` int(11) NOT NULL AUTO_INCREMENT,
  `exercice` int(11) DEFAULT '0',
  `num_conv` int(11) DEFAULT '0',
  `date` varchar(255) DEFAULT '0',
  `valeurE` decimal(19,0) DEFAULT '0',
  `valeurEE` decimal(19,0) DEFAULT '0',
  `valeurSE` decimal(19,0) DEFAULT '0',
  `valeurS` decimal(19,0) DEFAULT '0',
  `numero_E_S` int(11) DEFAULT NULL,
  `observation` varchar(255) NOT NULL DEFAULT ' ',
  `libelle` varchar(255) DEFAULT ' ',
  `categorieID` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `typeID` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `programmeID` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `frID` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `operateurID` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`vignetteID`),
  KEY `fk_categorieID` (`categorieID`),
  KEY `fk_programmeID` (`programmeID`),
  KEY `fk_typeID` (`typeID`),
  KEY `fk_frID` (`frID`),
  KEY `fk_operateurID` (`operateurID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
