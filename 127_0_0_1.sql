-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 14:09
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--
CREATE DATABASE IF NOT EXISTS `projet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet`;

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `numero_carte` int(11) DEFAULT NULL,
  `nom` text,
  `securite` int(11) DEFAULT NULL,
  `tresorie` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `nom` text,
  `prenom` text,
  `pseudo` text,
  `mail` text,
  `photoprofil` text,
  `imagefond` text,
  `item` int(11) DEFAULT NULL,
  `numero_carte` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`ID`, `type`, `nom`, `prenom`, `pseudo`, `mail`, `photoprofil`, `imagefond`, `item`, `numero_carte`) VALUES
(2, 2, 'dussault', 'gregory', 'GregD9', 'gregory.dussault@hotmail.fr', 'rien', 'rien', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marche`
--

DROP TABLE IF EXISTS `marche`;
CREATE TABLE IF NOT EXISTS `marche` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `description` text,
  `categorie` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `photo` text,
  `video` text,
  `vendeur` text,
  `type_achat` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marche`
--

INSERT INTO `marche` (`ID`, `nom`, `description`, `categorie`, `prix`, `photo`, `video`, `vendeur`, `type_achat`) VALUES
(1, 'test', 'ceci est un test', 0, 100, 'http://localhost/photo_articles/default.png', 'sans', '2', 0),
(2, 'test2', 'c est un autre test', 0, 100, 'http://localhost/photo_articles/default.png', 'sans', '2', 0),
(3, 'test3', 'c est encore un test', 1, 100, 'http://localhost/photo_articles/default.png', 'sans', '2', 1),
(4, 'test3', 'c est encore un autre test', 2, 100, 'http://localhost/photo_articles/default.png', 'sans', '2', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
