-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Janvier 2021 à 15:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pointage`
--

-- --------------------------------------------------------

--
-- Structure de la table `assurer`
--

CREATE TABLE IF NOT EXISTS `assurer` (
  `n_utilisateur` varchar(10) NOT NULL,
  `n_permanence` varchar(10) NOT NULL,
  PRIMARY KEY (`n_utilisateur`,`n_permanence`),
  KEY `n_utilisateur` (`n_utilisateur`),
  KEY `n_permanence` (`n_permanence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `estpresent`
--

CREATE TABLE IF NOT EXISTS `estpresent` (
  `n_permanence` varchar(10) NOT NULL,
  `num_etudiant` varchar(10) NOT NULL,
  `harriveeM` time NOT NULL,
  `hdepartM` time NOT NULL,
  `heurearriveS` time NOT NULL,
  `heuredepartS` time NOT NULL,
  `dateP` date NOT NULL,
  PRIMARY KEY (`n_permanence`,`num_etudiant`),
  KEY `n_permanence` (`n_permanence`),
  KEY `num_etudiant` (`num_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `estpresent`
--

INSERT INTO `estpresent` (`n_permanence`, `num_etudiant`, `harriveeM`, `hdepartM`, `heurearriveS`, `heuredepartS`, `dateP`) VALUES
('	 per02022', '20184813', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2021-02-02'),
('per0102202', '20184810', '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-01'),
('per0102202', '20184811', '09:00:00', '12:45:00', '14:30:00', '18:15:00', '2021-02-01'),
('per0202202', '20184812', '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_etudiant` varchar(10) NOT NULL,
  `nu_carte` varchar(10) NOT NULL,
  `n_etudiant` text NOT NULL,
  `p_etudiant` text NOT NULL,
  `filiere` varchar(10) NOT NULL,
  PRIMARY KEY (`num_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etudiant`, `nu_carte`, `n_etudiant`, `p_etudiant`, `filiere`) VALUES
('20184810', '16184523', 'n_etudiant1', 'p_etudiant1', 'TNI'),
('20184811', '45876254', 'n_etudiant2', 'p_etudiant2', 'TNI'),
('20184812', '45871523', 'n_etudiant3', 'p_etudiant3', 'TNI'),
('20184813', '86921456', 'n_etudiant4', 'p_etudiant4', 'TNI'),
('20184814', '78757785', 'n_etudiant5', 'p_etudiant5', 'OPSL'),
('20184815', '65548217', 'n_etudiant6', 'p_etudiant6', 'TNI'),
('20184816', '58558441', 'n_etudiant7', 'p_etudiant7', 'TNI'),
('20184817', '58778962', 'n_etudiant8', 'p_etudiant8', 'TNI'),
('20184818', '58956689', 'n_etudiant9', 'p_etudiant9', 'TNI');

-- --------------------------------------------------------

--
-- Structure de la table `intervenir`
--

CREATE TABLE IF NOT EXISTS `intervenir` (
  `n_utilisateur` varchar(10) NOT NULL,
  `titre_projet` varchar(10) NOT NULL,
  PRIMARY KEY (`n_utilisateur`,`titre_projet`),
  KEY `n_utilisateur` (`n_utilisateur`),
  KEY `titre_projet` (`titre_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `intervenir`
--

INSERT INTO `intervenir` (`n_utilisateur`, `titre_projet`) VALUES
('nomInterve', '6');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `num_etudiant` varchar(10) NOT NULL,
  `titre_projet` varchar(10) NOT NULL,
  PRIMARY KEY (`num_etudiant`,`titre_projet`),
  KEY `titre_projet` (`titre_projet`),
  KEY `num_etudiant` (`num_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `permanence`
--

CREATE TABLE IF NOT EXISTS `permanence` (
  `n_permanence` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `heure` float NOT NULL,
  `duree_permanence` float NOT NULL,
  `titre_projet` varchar(10) NOT NULL,
  PRIMARY KEY (`n_permanence`),
  KEY `titre_projet` (`titre_projet`),
  KEY `titre_projet_2` (`titre_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planing`
--

CREATE TABLE IF NOT EXISTS `planing` (
  `id_planing` int(11) NOT NULL AUTO_INCREMENT,
  `heure_arrivee_matin` time NOT NULL,
  `heure_depart_matin` time NOT NULL,
  `heure_arrivee_soir` time NOT NULL,
  `heure_depart_soir` time NOT NULL,
  `date_jour` date NOT NULL,
  PRIMARY KEY (`id_planing`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20184819 ;

--
-- Contenu de la table `planing`
--

INSERT INTO `planing` (`id_planing`, `heure_arrivee_matin`, `heure_depart_matin`, `heure_arrivee_soir`, `heure_depart_soir`, `date_jour`) VALUES
(1, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-01'),
(2, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-02'),
(3, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-03'),
(4, '10:45:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-04'),
(5, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-05'),
(6, '00:00:00', '12:45:00', '00:00:00', '00:00:00', '2021-02-06'),
(7, '00:00:00', '12:45:00', '00:00:00', '00:00:00', '2021-02-07'),
(8, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-08'),
(9, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-09'),
(10, '08:30:00', '12:45:00', '16:00:00', '18:15:00', '2021-02-10'),
(11, '08:30:00', '12:45:00', '14:00:00', '18:15:00', '2021-02-11');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(10) NOT NULL AUTO_INCREMENT,
  `niveau` varchar(10) NOT NULL,
  `filiere` varchar(10) NOT NULL,
  `parcours` varchar(10) NOT NULL,
  `id_utilisateur` varchar(10) NOT NULL,
  PRIMARY KEY (`id_projet`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_utilisateur_2` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `niveau`, `filiere`, `parcours`, `id_utilisateur`) VALUES
(5, 'M2', 'ISC', 'TNI', '3'),
(6, 'M2', 'ISC', 'TNI', '6'),
(11, 'M1', 'E3A', 'SAM', '7'),
(12, 'M2', 'ISC', 'TNI', '7'),
(13, 'M2', 'ISC', 'TNI', '6'),
(14, 'M2', 'ISC', 'TNI', '6');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `niveau` varchar(10) NOT NULL,
  `filiere` varchar(10) NOT NULL,
  `parcour` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`niveau`, `filiere`, `parcour`) VALUES
('M2', 'ISC', 'TNI'),
('M2', 'ISC', 'OPSL'),
('M2', 'ISC', 'RSIS'),
('M2', 'ISC', 'OPMA'),
('M2', 'ISC', 'OPMA'),
('M1', 'E3A', 'SAM');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `n_carte` varchar(10) NOT NULL,
  `n_utilisateur` text NOT NULL,
  `p_utilisateur` text NOT NULL,
  `statut` enum('administrateur','responsable','intervenant','') NOT NULL,
  `noumeroTel` int(11) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `n_carte`, `n_utilisateur`, `p_utilisateur`, `statut`, `noumeroTel`, `password`, `username`) VALUES
(1, '18450020', 'Nomprofesseur1', 'PrénomProfesseur1', 'administrateur', 666666666, '1234', 'testad'),
(2, '45873652', 'nomIntervenant1', 'PrenomIntervenant1', 'intervenant', 633333333, '1234', 'testinter'),
(3, '20184834', 'faouzi', 'fatna', 'responsable', 662870812, '1234', 'testresp'),
(4, '45789963', 'nomIntervenant2', 'PrenomIntervenant2', 'intervenant', 555555555, '1234', 'testinter'),
(5, '45875487', 'nomIntervenant3', 'PrenomIntervenant3', 'intervenant', 444444444, '1234', 'testinter'),
(6, '45852236', 'respnom', 'resp-pren', 'responsable', 66666666, '1234', 'testresp0'),
(7, '25874162', 'resp3nom', 'resp3prenom', 'responsable', 666554488, '1234', 'testresp1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
