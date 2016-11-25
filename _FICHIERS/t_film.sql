-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 25 Novembre 2016 à 14:27
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet151`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_film`
--

CREATE TABLE `t_film` (
  `id_film` int(11) NOT NULL,
  `titre_original` varchar(255) DEFAULT NULL,
  `titre_traduit` varchar(255) DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `date_sortie_suisse` date NOT NULL,
  `description` text NOT NULL,
  `accord_parental` varchar(255) NOT NULL,
  `pochette_url` varchar(255) DEFAULT NULL,
  `bande_annonce_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_film`
--
ALTER TABLE `t_film`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
