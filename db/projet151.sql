-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 02 Décembre 2016 à 15:12
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
(1, 1, 1, '2016-12-01 19:54:55', 'Meilleur film de l\'année ! :smile:', 1),
(2, 1, 1, '2016-12-01 19:55:08', 'Bof... :puke:', 1);

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
(1, 'Jason Bourne', 'Jason Bourne', 666, '2000-01-01', 'Jason Bourne se cache et participe à des combats à mains nues, illégaux, pour assurer sa survie. De son côté, Nicky Parsons collabore avec le hacker et lanceur d\'alerte Christian Dassault. À Reykjavik, en Islande, elle s\'introduit dans les serveurs de la CIA et copie des fichiers sur les opérations noires de l\'agence. Elle trouve également des documents sur le recrutement de Jason Bourne dans l\'opération Treadstone et l\'implication de Richard Webb, le père de Bourne. Son intrusion a cependant été détectée et des agents de la CIA implantent un logiciel espion dans une mémoire de masse qu\'elle emporte. Ignorant la présence du logiciel, elle se rend en Grèce pour montrer à Bourne ses recherches, suivie à distance par Heather Lee, chef de la division sur le cyber-espionnage, qui rapporte ses allées et venues à Robert Dewey, directeur de la CIA.\r\nEn Grèce, Parsons et Bourne se rencontrent sur la place Syntagma, qui est le théâtre d\'une violente manifestation surveillée par des policiers anti-émeute. Ils échappent à l\'équipe envoyée pour les éliminer, mais Parsons est tuée par l\'Atout (seul nom qui lui est donné pendant le film), un ancien tueur de la CIA sous les ordres de Dewey. Avant de mourir sous le coup d\'une seconde balle, elle donne la clé d\'une consigne où se trouvent les documents volés à la CIA. Résolu de trouver des réponses sur son passé, Bourne se rend à Berlin pour voir Dassault. Après que Dassault soit parvenu à déchiffrer les documents, Bourne découvre que son père, Richard Webb, a travaillé pour le compte de l\'agence et est à l\'origine de l\'opération Treadstone. Entretemps, le logiciel espion informe Heather Lee de l\'endroit où se trouve Bourne et Dewey dépêche une équipe pour le supprimer. Quelques instants plus tard, Lee détruit à distance les documents, puis informe Bourne qu\'une équipe est en route, croyant que Bourne veut travailler à nouveau pour l\'agence.\r\nEn se basant sur quelques indices, Bourne se rend à Londres pour retrouver Malcolm Smith, un ancien agent de surveillance ayant agi pour l\'opération Treadstone. Lee défend son projet de « récupérer » Bourne auprès d\'Edwin Russell, le directeur du renseignement national et supérieur de Dewey ; Russell acquiesce et Lee prend ses dispositions pour rencontrer Bourne. Dewey semble se plier à cette décision, mais ordonne en secret à l\'Atout d\'abattre l\'équipe de Lee puis Bourne, parce qu\'il ne partage pas les opinions de Lee. Se sachant sous surveillance, Bourne échappe à l\'équipe de Lee et à l\'Atout suffisamment longtemps pour confronter Smith. Ce dernier admet que Richard Webb a créé l\'opération Treadstone mais s\'est opposé au recrutement de Jason. Il affirme que Dewey a ordonné la mort de Richard, meurtre accompli par l\'Atout, mais maquillé comme une attaque terroriste pour persuader Jason de joindre les rangs de la CIA. L\'Atout tue Smith et blesse Jason, qui parvient à s\'enfuir. Il prend contact avec Lee, qui lui déclare ne pas approuver les méthodes de Dewey ; elle lui donne rendez-vous à un congrès technologique à Las Vegas aux États-Unis.\r\nDewey se rend aussi au même congrès, pour participer à un débat sur le droit à la vie privée avec Aaron Kalloor, PDG de Deep Dream, société qui exploite un réseau social consulté par plus d\'un milliard de personnes. Kalloor se présente comme le champion de la protection de la vie privée, mais tait sa collaboration secrète avec la CIA qui ambitionne d\'utiliser le réseau de Deep Dream comme outil de surveillance de masse en temps réel, pour redonner vigueur aux opérations Treadstone, Blackbriar, Outcome et LARX. Soupçonnant que Kalloor refusera de poursuivre sa collaboration avec la CIA, Dewey ordonne à l\'Atout d\'abattre Kallor et Lee, cette dernière par manque de loyauté aveugle. Au congrès, Bourne contrecarre in extremis les meurtres, puis confronte Dewey dans sa suite. Le directeur de la CIA fait appel au sens du devoir et au patriotisme de Bourne dans le but de le retenir auprès de lui, sachant que des agents de la CIA se rapprochent, dont son bras droit Jeffers. Bourne tue ce dernier, puis Lee tue Dewey avant qu\'il ne tire sur Bourne. Pour protéger Lee, il prend la responsabilité de la mort de Dewey. En quittant l\'hôtel, il aperçoit l\'Atout qui s\'enfuit. Au terme d\'une poursuite automobile dans Las Vegas et d\'un corps à corps intense, Bourne tue l\'Atout.\r\nQuelque temps plus tard, Lee rencontre Edwin Russell et affirme pouvoir être ses oreilles et ses yeux dans l\'agence. Elle a toujours le projet de ramener Bourne dans le giron de la CIA, mais accepte qu\'il soit tué s\'il ne veut pas revenir. Quelques minutes plus tard, Lee rejoint Bourne, promettant de changer la CIA pour le mieux. Bourne demande du temps pour réfléchir à sa proposition, mais en lui laissant dans sa voiture un enregistrement de sa conversation avec Russell, il montre qu\'il n\'a pas confiance en elle, puis il s\'enfuit à nouveau.', 18, NULL, 'https://www.youtube.com/watch?v=FeFtYgktbls');

-- --------------------------------------------------------

--
-- Structure de la table `t_format`
--

CREATE TABLE `t_format` (
  `id_format` int(11) NOT NULL,
  `nom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_formatfilm`
--

CREATE TABLE `t_formatfilm` (
  `id_formatFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_format` int(11) NOT NULL,
  `prix` int(11) NOT NULL
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
  `nom` varchar(255) NOT NULL,
  `drapeauPays` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_languefilm`
--

CREATE TABLE `t_languefilm` (
  `id_langueFilm` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL,
  `fk_langue` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL
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
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
