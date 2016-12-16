-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 16 Décembre 2016 à 21:32
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
(12, 5, 1, '2016-12-16 07:56:21', 'Film de l\'année ! :razz:', 1),
(13, 5, 1, '2016-12-16 07:58:01', 'TEST :biggrin:', 1),
(14, 5, 1, '2016-12-16 07:58:15', 'TEST :biggrin:', 1),
(15, 5, 1, '2016-12-16 07:58:50', 'TEST :geek:', 1),
(16, 5, 1, '2016-12-16 07:59:31', 'TEST ULTIME :evil:', 1),
(17, 7, 3, '2016-12-16 13:29:33', 'Ce film était vraiment bien sa m\'a rappelé ma jeunesse merci encore a NEXFLIT pour la proposition de ce film :biggrin: :biggrin: :biggrin:', 1);

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
(5, 'Fight Club', NULL, 139, '1999-09-10', 'La vie d\'un employé de bureau est bouleversée lorsqu\'il rencontre Tyler Durden. Ils forment ensemble le Fight Club, un club de lutte clandestine.', 16, 'img/films/img_24190000.jpg', 'https://www.youtube.com/watch?v=SUXWAEX2jlg'),
(6, 'The Shawshank Redemption', 'Les Evadés', 142, '1994-10-14', 'Andy Dufresne est coupable d’un double meurtre. Il se retrouve dans la prison de Shawshank, où le directeur Norton règne avec le capitaine Hadley.', 16, 'img/films/img_71970000.jpg', 'https://www.youtube.com/watch?v=6hB3S9bIaco'),
(7, 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter à l\'école des sorciers', 147, '2001-12-05', 'Harry Potter, un jeune orphelin, est élevé par son oncle Vernon et sa tante Pétunia qui le détestent. Alors qu\'il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture. Le jour de son onzième anniversaire, Harry reçoit la visite inattendue d\'un homme gigantesque se nommant Rubeus Hagrid. Celui-ci lui révèle qu\'il est en fait le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs. C\'est avec joie que le garçon accepte de suivre des cours à Poudlard, la célèbre école de sorcellerie. Il a enfin la chance de se faire des amis. Blâmé par le professeur Severus Rogue qui lui enseigne les potions et protégé par Albus Dumbledore, le directeur de l\'établissement, Harry va tenter d\'élucider le mystère de la pierre philosophale.', 6, 'img/films/img_8bb0000.jpg', 'https://www.youtube.com/watch?v=ok3dj8MXC3M');

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
(5, 5, 3, 9.9, '584ab37a51168'),
(6, 5, 5, 17.9, '584ab37a5690b'),
(7, 6, 3, 9.9, '584ab7a748b8e'),
(8, 6, 5, 15.9, '584ab7a754c5e'),
(9, 7, 3, 15, '5853eacc8a0e7'),
(10, 7, 5, 25, '5853eacc8bca4');

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
(4, 'Drame'),
(5, 'Crime'),
(6, 'Aventure'),
(7, 'Fantastique');

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
(5, 5, 1),
(6, 6, 4),
(7, 6, 5),
(8, 7, 6),
(9, 7, 7);

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
(1, 'Français'),
(2, 'Anglais');

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
(4, 5, 2),
(5, 6, 1),
(6, 5, 1),
(7, 6, 2),
(8, 7, 1),
(9, 7, 2);

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
(6, 5, 1, 9),
(7, 7, 3, 7);

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
(6, 'Tom Hanks'),
(8, 'David Fincher'),
(9, 'Brad Pitt'),
(10, 'Edward Norton'),
(11, 'Helena Bonham Carter'),
(12, 'Franck Darabont'),
(13, 'Tim Robbins'),
(14, 'Morgan Freeman'),
(15, 'Daniel Radcliffe'),
(16, 'Emma Watson'),
(17, 'Rupert Grint'),
(18, 'Chris Colombus');

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
(7, 5, 8, 'Réalisateur'),
(8, 5, 9, 'Acteur'),
(9, 5, 10, 'Acteur'),
(10, 5, 11, 'Actrice'),
(11, 6, 12, 'Réalisateur'),
(12, 6, 13, 'Acteur'),
(13, 6, 14, 'Acteur'),
(14, 7, 15, 'Acteur'),
(15, 7, 16, 'Acteur'),
(16, 7, 17, 'Acteur'),
(17, 7, 18, 'Réalisateur');

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
(1, 7, 1);

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
(1, 'Fox'),
(3, 'Castle Rock Entertainment'),
(4, 'Warner Bros');

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
(5, 5, 1),
(6, 6, 3),
(7, 7, 4);

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
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_format`
--
ALTER TABLE `t_format`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_formatfilm`
--
ALTER TABLE `t_formatfilm`
  MODIFY `id_formatFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `t_genre`
--
ALTER TABLE `t_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_genrefilm`
--
ALTER TABLE `t_genrefilm`
  MODIFY `id_genreFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `t_langue`
--
ALTER TABLE `t_langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_languefilm`
--
ALTER TABLE `t_languefilm`
  MODIFY `id_langueFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `t_notefilm`
--
ALTER TABLE `t_notefilm`
  MODIFY `id_noteFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `t_personne`
--
ALTER TABLE `t_personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `t_rolefilm`
--
ALTER TABLE `t_rolefilm`
  MODIFY `id_roleFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `t_saga`
--
ALTER TABLE `t_saga`
  MODIFY `id_saga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_sagafilm`
--
ALTER TABLE `t_sagafilm`
  MODIFY `id_sagaFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_societe`
--
ALTER TABLE `t_societe`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_societefilm`
--
ALTER TABLE `t_societefilm`
  MODIFY `id_societeFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `contFilm_8` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`);

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
