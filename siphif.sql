-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 15 Juin 2015 à 15:15
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `siphif`
--
CREATE DATABASE IF NOT EXISTS `siphif` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siphif`;

-- --------------------------------------------------------

--
-- Structure de la table `attribution`
--

CREATE TABLE IF NOT EXISTS `attribution` (
  `id_attribution` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_attribution` varchar(1000) NOT NULL,
  `id_stage` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_attribution`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `choix`
--

CREATE TABLE IF NOT EXISTS `choix` (
  `id_choix` int(11) NOT NULL AUTO_INCREMENT,
  `rang_choix` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_stage` int(11) NOT NULL,
  PRIMARY KEY (`id_choix`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `id_etablissement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_etablissement` varchar(30) NOT NULL,
  PRIMARY KEY (`id_etablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `id_filiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom_filiere` varchar(30) NOT NULL,
  PRIMARY KEY (`id_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_groupe` varchar(30) NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(30) NOT NULL,
  `id_etablissement` int(11) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id_stage` int(11) NOT NULL AUTO_INCREMENT,
  `nbPoste_stage` int(11) NOT NULL,
  `tuteur_stage` varchar(30) NOT NULL,
  `id_service` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  PRIMARY KEY (`id_stage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) NOT NULL,
  `prenom_user` varchar(30) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `mdp_user` varchar(25) NOT NULL,
  `telephone_user` varchar(15) NOT NULL,
  `anneeConcours_user` int(11) NOT NULL,
  `nbSemestre_user` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_groupe` (`id_groupe`),
  KEY `id_groupe_2` (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
