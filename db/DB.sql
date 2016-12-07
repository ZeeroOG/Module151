-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 07 Décembre 2016 à 20:12
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

--
-- Contenu de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`id_commentaire`, `fk_film`, `fk_user`, `unixtime`, `commentaire`, `visible`) VALUES
(1, 1, 1, '2016-12-01 19:54:55', 'Meilleur film de l\'année ! :smile::cool:', 1),
(2, 1, 1, '2016-12-01 19:55:08', 'Bof... :confused::confused:', 1),
(3, 1, 6, '2016-12-04 20:54:34', 'Evil comment ! :evil:\r\nScript :\r\n<script>alert("test");</script>', 1),
(4, 1, 6, '2016-12-05 01:39:23', 'test :wink:', 1),
(5, 1, 6, '2016-12-05 01:41:10', 'encore un test :mrgreen:', 1),
(6, 1, 6, '2016-12-05 01:41:40', 'gthjehhsj :arrow: :arrow: :evil: :evil:', 1),
(7, 1, 6, '2016-12-05 01:43:43', 'test\r\nsur\r\nbeaucoup\r\nde\r\nlignes\r\n:wink:\r\nje\r\nsuis\r\nsceptique\r\n:cry:', 1),
(8, 1, 6, '2016-12-05 01:44:28', 'OUIII !!!! TOUT FONCTIONNE :mrgreen: :mrgreen: :mrgreen:', 1),
(9, 3, 1, '2016-12-06 18:18:49', 'Oh ! Des boules :rolleyes:', 1),
(11, 4, 1, '2016-12-07 18:23:18', 'Test :biggrin:', 1);

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

--
-- Contenu de la table `t_film`
--

INSERT INTO `t_film` (`id_film`, `titreOriginal`, `titreTraduit`, `duree`, `dateSortieSuisse`, `description`, `accordParental`, `pochetteURL`, `bandeAnnonceURL`) VALUES
(1, 'Jason Bourne', '', 123, '2000-01-01', 'Jason Bourne se cache et participe à des combats à mains nues, illégaux, pour assurer sa survie. De son côté, Nicky Parsons collabore avec le hacker et lanceur d\'alerte Christian Dassault. À Reykjavik, en Islande, elle s\'introduit dans les serveurs de la CIA et copie des fichiers sur les opérations noires de l\'agence. Elle trouve également des documents sur le recrutement de Jason Bourne dans l\'opération Treadstone et l\'implication de Richard Webb, le père de Bourne. Son intrusion a cependant été détectée et des agents de la CIA implantent un logiciel espion dans une mémoire de masse qu\'elle emporte. Ignorant la présence du logiciel, elle se rend en Grèce pour montrer à Bourne ses recherches, suivie à distance par Heather Lee, chef de la division sur le cyber-espionnage, qui rapporte ses allées et venues à Robert Dewey, directeur de la CIA.', 18, NULL, 'https://www.youtube.com/watch?v=LuAKjwZ3FN0'),
(2, 'Le test ultime !', NULL, 169, '2016-12-05', 'Je suis une description...', 0, NULL, 'https://www.youtube.com/watch?v=1CiN1oIv5x4'),
(3, 'Blanche-Fesse et les Sept Mains', NULL, 80, '1981-01-01', 'Blanche-Fesse et les Sept Mains est un film pornographique français, d\'une durée de 80 minutes, réalisé par Michel Caputo, sorti en 1981.  Le film est connu comme étant une parodie sexuelle du film d\'animation Blanche-Neige et les Sept Nains, sorti en 1937 des studios Disney.', 18, 'img_5846f8087f720.jpg', NULL),
(4, 'Test Images', NULL, 60, '1990-05-14', 'Test', 6, 'img/films/img_2a360000.jpg', 'https://www.youtube.com/watch?v=1ODQOr_652A');

-- --------------------------------------------------------

--
-- Structure de la table `t_format`
--

CREATE TABLE `t_format` (
  `id_format` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_format`
--

INSERT INTO `t_format` (`id_format`, `nom`) VALUES
(2, 'CD'),
(3, 'DVD'),
(4, 'VHS'),
(5, 'Blu-Ray');

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

--
-- Contenu de la table `t_formatfilm`
--

INSERT INTO `t_formatfilm` (`id_formatFilm`, `fk_film`, `fk_format`, `prix`, `numero_article`) VALUES
(1, 2, 2, 45, '58470da1f1e7a'),
(2, 3, 4, 10, '58470dad2a495'),
(3, 4, 5, 15, '584844b679228'),
(4, 4, 3, 9.95, '584844b679bca');

-- --------------------------------------------------------

--
-- Structure de la table `t_genre`
--

CREATE TABLE `t_genre` (
  `id_genre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_genre`
--

INSERT INTO `t_genre` (`id_genre`, `nom`) VALUES
(1, 'Action'),
(2, 'Drama'),
(3, 'Pornographie');

-- --------------------------------------------------------

--
-- Structure de la table `t_genrefilm`
--

CREATE TABLE `t_genrefilm` (
  `id_genreFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_genrefilm`
--

INSERT INTO `t_genrefilm` (`id_genreFilm`, `fk_film`, `fk_genre`) VALUES
(1, 2, 1),
(2, 3, 3),
(3, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_langue`
--

CREATE TABLE `t_langue` (
  `id_langue` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_langue`
--

INSERT INTO `t_langue` (`id_langue`, `nom`) VALUES
(1, 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `t_languefilm`
--

CREATE TABLE `t_languefilm` (
  `id_langueFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_langue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_languefilm`
--

INSERT INTO `t_languefilm` (`id_langueFilm`, `fk_film`, `fk_langue`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 4, 1);

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

--
-- Contenu de la table `t_notefilm`
--

INSERT INTO `t_notefilm` (`id_noteFilm`, `fk_film`, `fk_user`, `note`) VALUES
(1, 1, 4, 10),
(2, 1, 1, 10),
(3, 1, 2, 1),
(4, 1, 3, 5),
(5, 4, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `t_personne`
--

CREATE TABLE `t_personne` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_personne`
--

INSERT INTO `t_personne` (`id_personne`, `nom`) VALUES
(1, 'James Cameron'),
(2, 'Michel Caputo'),
(3, 'Hélène Shirley'),
(4, 'Pierre Oudrey'),
(5, 'Bérénice Genre'),
(6, 'Tom Hanks'),
(7, 'Test');

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

--
-- Contenu de la table `t_rolefilm`
--

INSERT INTO `t_rolefilm` (`id_roleFilm`, `fk_film`, `fk_personne`, `role`) VALUES
(1, 2, 1, 'Réalisateur'),
(2, 3, 2, 'Réalisateur'),
(3, 3, 4, 'Acteur'),
(4, 3, 3, 'Actrice'),
(5, 3, 5, 'Actrice'),
(6, 4, 7, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `t_saga`
--

CREATE TABLE `t_saga` (
  `id_saga` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_saga`
--

INSERT INTO `t_saga` (`id_saga`, `nom`) VALUES
(1, 'Harry Potter');

-- --------------------------------------------------------

--
-- Structure de la table `t_sagafilm`
--

CREATE TABLE `t_sagafilm` (
  `id_sagaFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_saga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_sagafilm`
--

INSERT INTO `t_sagafilm` (`id_sagaFilm`, `fk_film`, `fk_saga`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_societe`
--

CREATE TABLE `t_societe` (
  `id_societe` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_societe`
--

INSERT INTO `t_societe` (`id_societe`, `nom`) VALUES
(1, 'Hollywood'),
(2, 'Zoom 24');

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
-- Contenu de la table `t_societefilm`
--

INSERT INTO `t_societefilm` (`id_societeFilm`, `fk_film`, `fk_societe`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 1),
(4, 4, 2);

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
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_format`
--
ALTER TABLE `t_format`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_formatfilm`
--
ALTER TABLE `t_formatfilm`
  MODIFY `id_formatFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_genre`
--
ALTER TABLE `t_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_genrefilm`
--
ALTER TABLE `t_genrefilm`
  MODIFY `id_genreFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_langue`
--
ALTER TABLE `t_langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_languefilm`
--
ALTER TABLE `t_languefilm`
  MODIFY `id_langueFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_notefilm`
--
ALTER TABLE `t_notefilm`
  MODIFY `id_noteFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_personne`
--
ALTER TABLE `t_personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_rolefilm`
--
ALTER TABLE `t_rolefilm`
  MODIFY `id_roleFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `t_saga`
--
ALTER TABLE `t_saga`
  MODIFY `id_saga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_sagafilm`
--
ALTER TABLE `t_sagafilm`
  MODIFY `id_sagaFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_societe`
--
ALTER TABLE `t_societe`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_societefilm`
--
ALTER TABLE `t_societefilm`
  MODIFY `id_societeFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
