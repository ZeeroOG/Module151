-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 07 Décembre 2016 à 11:07
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
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `unixtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentaire` text NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_film`
--

CREATE TABLE `t_film` (
  `id_film` int(11) NOT NULL,
  `titreOriginal` varchar(255) NOT NULL,
  `titreTraduit` varchar(255) DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `dateSortieSuisse` date NOT NULL,
  `description` text NOT NULL,
  `accordParental` int(11) NOT NULL,
  `pochetteURL` varchar(255) DEFAULT NULL,
  `bandeAnnonceURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_format`
--

CREATE TABLE `t_format` (
  `id_format` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_formatfilm`
--

CREATE TABLE `t_formatfilm` (
  `id_formatFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_format` int(11) NOT NULL,
  `prix` float NOT NULL,
  `numero_article` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_genre`
--

CREATE TABLE `t_genre` (
  `id_genre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_genrefilm`
--

CREATE TABLE `t_genrefilm` (
  `id_genreFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_langue`
--

CREATE TABLE `t_langue` (
  `id_langue` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_languefilm`
--

CREATE TABLE `t_languefilm` (
  `id_langueFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_langue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_notefilm`
--

CREATE TABLE `t_notefilm` (
  `id_noteFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `note` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_personne`
--

CREATE TABLE `t_personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_rolefilm`
--

CREATE TABLE `t_rolefilm` (
  `id_roleFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_personne` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_saga`
--

CREATE TABLE `t_saga` (
  `id_saga` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_sagafilm`
--

CREATE TABLE `t_sagafilm` (
  `id_sagaFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_saga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_societe`
--

CREATE TABLE `t_societe` (
  `id_societe` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_societefilm`
--

CREATE TABLE `t_societefilm` (
  `id_societeFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_societe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Index pour la table `t_film`
--
ALTER TABLE `t_film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `t_format`
--
ALTER TABLE `t_format`
  ADD PRIMARY KEY (`id_format`);

--
-- Index pour la table `t_formatfilm`
--
ALTER TABLE `t_formatfilm`
  ADD PRIMARY KEY (`id_formatFilm`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_format` (`fk_format`);

--
-- Index pour la table `t_genre`
--
ALTER TABLE `t_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `t_genrefilm`
--
ALTER TABLE `t_genrefilm`
  ADD PRIMARY KEY (`id_genreFilm`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_genre` (`fk_genre`);

--
-- Index pour la table `t_langue`
--
ALTER TABLE `t_langue`
  ADD PRIMARY KEY (`id_langue`);

--
-- Index pour la table `t_languefilm`
--
ALTER TABLE `t_languefilm`
  ADD PRIMARY KEY (`id_langueFilm`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_langue` (`fk_langue`);

--
-- Index pour la table `t_notefilm`
--
ALTER TABLE `t_notefilm`
  ADD PRIMARY KEY (`id_noteFilm`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Index pour la table `t_personne`
--
ALTER TABLE `t_personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `t_rolefilm`
--
ALTER TABLE `t_rolefilm`
  ADD PRIMARY KEY (`id_roleFilm`),
  ADD KEY `fk_film` (`fk_film`),
  ADD KEY `fk_personne` (`fk_personne`);

--
-- Index pour la table `t_saga`
--
ALTER TABLE `t_saga`
  ADD PRIMARY KEY (`id_saga`);

--
-- Index pour la table `t_sagafilm`
--
ALTER TABLE `t_sagafilm`
  ADD PRIMARY KEY (`id_sagaFilm`),
  ADD KEY `fk_film` (`fk_film`,`fk_saga`),
  ADD KEY `contSaga_1` (`fk_saga`);

--
-- Index pour la table `t_societe`
--
ALTER TABLE `t_societe`
  ADD PRIMARY KEY (`id_societe`);

--
-- Index pour la table `t_societefilm`
--
ALTER TABLE `t_societefilm`
  ADD PRIMARY KEY (`id_societeFilm`),
  ADD KEY `fk_film` (`fk_film`,`fk_societe`),
  ADD KEY `contSociete_1` (`fk_societe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_format`
--
ALTER TABLE `t_format`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_formatfilm`
--
ALTER TABLE `t_formatfilm`
  MODIFY `id_formatFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_genre`
--
ALTER TABLE `t_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_genrefilm`
--
ALTER TABLE `t_genrefilm`
  MODIFY `id_genreFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_langue`
--
ALTER TABLE `t_langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_languefilm`
--
ALTER TABLE `t_languefilm`
  MODIFY `id_langueFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_notefilm`
--
ALTER TABLE `t_notefilm`
  MODIFY `id_noteFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_personne`
--
ALTER TABLE `t_personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_rolefilm`
--
ALTER TABLE `t_rolefilm`
  MODIFY `id_roleFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_saga`
--
ALTER TABLE `t_saga`
  MODIFY `id_saga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_sagafilm`
--
ALTER TABLE `t_sagafilm`
  MODIFY `id_sagaFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_societe`
--
ALTER TABLE `t_societe`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_societefilm`
--
ALTER TABLE `t_societefilm`
  MODIFY `id_societeFilm` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_formatfilm`
--
ALTER TABLE `t_formatfilm`
  ADD CONSTRAINT `contFilm_1` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  ADD CONSTRAINT `contFormat_1` FOREIGN KEY (`fk_format`) REFERENCES `t_format` (`id_format`);

--
-- Contraintes pour la table `t_genrefilm`
--
ALTER TABLE `t_genrefilm`
  ADD CONSTRAINT `contFilm_2` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  ADD CONSTRAINT `contGenre_1` FOREIGN KEY (`fk_genre`) REFERENCES `t_genre` (`id_genre`);

--
-- Contraintes pour la table `t_languefilm`
--
ALTER TABLE `t_languefilm`
  ADD CONSTRAINT `contFilm_3` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  ADD CONSTRAINT `contLangue_1` FOREIGN KEY (`fk_langue`) REFERENCES `t_langue` (`id_langue`);

--
-- Contraintes pour la table `t_notefilm`
--
ALTER TABLE `t_notefilm`
  ADD CONSTRAINT `contFilm_4` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`);

--
-- Contraintes pour la table `t_rolefilm`
--
ALTER TABLE `t_rolefilm`
  ADD CONSTRAINT `contFilm_5` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  ADD CONSTRAINT `contPersonne_1` FOREIGN KEY (`fk_personne`) REFERENCES `t_personne` (`id_personne`);

--
-- Contraintes pour la table `t_sagafilm`
--
ALTER TABLE `t_sagafilm`
  ADD CONSTRAINT `contFilm_6` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  ADD CONSTRAINT `contSaga_1` FOREIGN KEY (`fk_saga`) REFERENCES `t_saga` (`id_saga`);

--
-- Contraintes pour la table `t_societefilm`
--
ALTER TABLE `t_societefilm`
  ADD CONSTRAINT `contFilm_7` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  ADD CONSTRAINT `contSociete_1` FOREIGN KEY (`fk_societe`) REFERENCES `t_societe` (`id_societe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
