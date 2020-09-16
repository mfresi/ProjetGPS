-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 16 Septembre 2020 à 13:38
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `geoboat`
--

-- --------------------------------------------------------

--
-- Structure de la table `assoc_bateau-user`
--

CREATE TABLE IF NOT EXISTS `assoc_bateau-user` (
  `id_user` int(50) NOT NULL,
  `id_bateau` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `assoc_bateau-user`
--

INSERT INTO `assoc_bateau-user` (`id_user`, `id_bateau`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

CREATE TABLE IF NOT EXISTS `bateau` (
  `id_bateau` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `vitesse` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bateau`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `bateau`
--

INSERT INTO `bateau` (`id_bateau`, `nom`, `marque`, `type`, `vitesse`, `longitude`, `latitude`) VALUES
(1, 'mattei', 'superBatale', 'super', '3000', '24.5', '36.2'),
(2, 'theo', 'badassBateau', 'badass', '2999', '45.8', '75.6');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `droit` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `date`, `email`, `droit`, `password`) VALUES
(1, 'GARNON', 'Theo', '2001-09-15', 'tgarnon45@gmail.com', 'ADMIN', 'Theo2001'),
(2, 'mattei', '', '2020-09-15', 't@t.fr', '', 'mdr'),
(3, 'flo', '', '2020-09-15', 'mfreso@freso.fr', '', 'lefreso'),
(5, 'theo', 'Fils de', '2020-09-15', 'filsdepute@connard.con', 'USER', 'fdp'),
(6, 'freso', 'matteo', '2020-09-15', 'matteo.freso@hotmail.fr', 'USER', 'test'),
(7, 'gros', 'rmal', '2020-09-16', 'filsdepute@encule.com', 'USER', 'grosrmal'),
(8, 'omeluck', 'salvatore', '2020-09-16', 'mattei.fresi@outlook.fr', 'USER', 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
