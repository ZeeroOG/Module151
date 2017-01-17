-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Janvier 2017 à 15:13
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
(17, 7, 3, '2016-12-16 13:29:33', 'Ce film était vraiment bien sa m\'a rappelé ma jeunesse merci encore a NEXFLIT pour la proposition de ce film :biggrin: :biggrin: :biggrin:', 1),
(18, 14, 2, '2017-01-13 13:36:04', 'Un film incroyable ! Quelle virtuosité !', 1);

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
(7, 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter à l\'école des sorciers', 147, '2001-12-05', 'Harry Potter, un jeune orphelin, est élevé par son oncle Vernon et sa tante Pétunia qui le détestent. Alors qu\'il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture. Le jour de son onzième anniversaire, Harry reçoit la visite inattendue d\'un homme gigantesque se nommant Rubeus Hagrid. Celui-ci lui révèle qu\'il est en fait le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs. C\'est avec joie que le garçon accepte de suivre des cours à Poudlard, la célèbre école de sorcellerie. Il a enfin la chance de se faire des amis. Blâmé par le professeur Severus Rogue qui lui enseigne les potions et protégé par Albus Dumbledore, le directeur de l\'établissement, Harry va tenter d\'élucider le mystère de la pierre philosophale.', 6, 'img/films/img_8bb0000.jpg', 'https://www.youtube.com/watch?v=ok3dj8MXC3M'),
(8, 'The Revenant', NULL, 150, '2016-05-11', 'Dans une Amérique profondément sauvage, le trappeur Hugh Glass est sévèrement blessé et laissé pour mort par un traître de son équipe, John Fitzgerald. Avec sa seule volonté pour unique arme, Glass doit affronter un environnement hostile, un hiver brutal et des tribus guerrières, dans une inexorable lutte pour sa survie, portée par un intense désir de vengeance.', 16, 'img/films/img_60d30000.jpg', 'https://www.youtube.com/watch?v=QRfj1VCg16Y'),
(9, 'Star Wars - The Force Awakens', 'Star Wars - Le Réveil de la Force', 130, '2016-04-05', 'Dans une galaxie lointaine, très lointaine, un nouvel épisode de la saga &quot;Star Wars&quot;, 30 ans après les événements du &quot;Retour du Jedi&quot;.', 12, 'img/films/img_345a0000.jpg', 'https://www.youtube.com/watch?v=sGbxmsDFVnE'),
(10, 'Brice de Nice', NULL, 98, '2016-10-05', 'Eternel ado de presque 30 ans, délaissé par un père affairiste et une mère absentée, Brice s`est réfugié dans une posture, un \'style\' avec lesquels il exprimes son vrai vécu intrinsèque : Brice attend donc SA vague... à Nice ! Personne pourtant ne se risque à se moquer de Brice : redoutable bretteur de langage, Brice s`est fait une spécialité de \'casser\' tout et tout le monde par le truchement de ses reparties verbales. Il fallait bien qu`un jour Brice soit rattrapé par la réalité...', 6, 'img/films/img_410c0000.jpg', 'https://www.youtube.com/watch?v=taaKB2p8dUE'),
(11, 'Inglourious Basterds', NULL, 146, '2014-09-04', 'Dans la France occupée de 1940, un groupe de soldats juifs américains, les bâtards , mènent des actions punitives particulièrement sanglantes contre les nazis du Troisième Reich. Leur chemin rencontre celui de Shoshanna Dreyfus, une jeune juive réfugiée à Paris exploitante d\'une salle de cinéma qui entend elle aussi assouvir sa propre vengeance envers les nazis...', 16, 'img/films/img_4c910000.jpg', 'https://www.youtube.com/watch?v=BiPUoLI9eGM'),
(12, 'The Hateful Eight', 'Les 8 Salopards', 162, '2016-05-08', 'Après la Guerre de Sécession, huit voyageurs se retrouvent coincés dans un refuge au milieu des montagnes. Alors que la tempête s\'abat au-dessus du massif, ils réalisent qu\'ils n\'arriveront peut-être pas à rallier Red Rock comme prévu...', 16, 'img/films/img_a550000.jpg', 'https://www.youtube.com/watch?v=gnRbXn4-Yis'),
(13, 'Django Unchained', NULL, 159, '2015-03-11', 'Dans le sud des États-Unis, le Dr King Schultz, un chasseur de primes allemand, fait l`acquisition de Django, un esclave qui peut l`aider à traquer les frères Brittle, les meurtriers qu`il recherche. Schultz promet à Django de lui rendre sa liberté lorsqu`il aura capturé les Brittle - morts ou vifs. Alors que les deux hommes pistent les dangereux criminels, Django n`oublie pas que son seul but est de retrouver sa femme...', 16, 'img/films/img_77f60000.jpg', 'https://www.youtube.com/watch?v=eUdM9vrCbow'),
(14, 'Pulp Fiction', NULL, 145, '2011-10-07', 'Pulp Fiction décrit l`odyssée sanglante et burlesque de petits malfrats pas très doués et perdus dans la jungle de Hollywood. On y croise volontiers les destins de deux petits tueurs, d`un dangereux gangster marié sans le savoir à une vraie camée, d`un boxeur roublard, de prêteurs sur gages sadiques et sans pitié, d`un caïd élégant qui n`y paraît pas, d`un dealer honnête...et ce n`est pas tout. A vous de reconstituer le puzzle maintenant.', 16, 'img/films/img_37f70000.jpg', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY'),
(15, 'Harry Potter et la Chambre des secrets', 'Harry Potter and the Chamber of Secrets', 161, '2002-12-04', 'Alors que l\'oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d\'importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l\'école de Poudlard et qu\'il ne doit pas y retourner en septembre. Harry refuse de le croire. Mais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante. Celle-ci lui dit que la redoutable et légendaire Chambre des secrets est à nouveau ouverte, permettant ainsi à l\'héritier de Serpentard de semer le chaos à Poudlard. Les victimes, retrouvées pétrifiées par une force mystérieuse, se succèdent dans les couloirs de l\'école, sans que les professeurs - pas même le populaire Gilderoy Lockhart - ne parviennent à endiguer la menace. Aidé de Ron et Hermione, Harry doit agir au plus vite pour sauver Poudlard. ', 6, 'img/films/img_80f0000.jpg', NULL);

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
(10, 7, 5, 25, '5853eacc8bca4'),
(11, 8, 3, 15.9, '5878ceedc29ab'),
(12, 8, 5, 20.9, '5878ceedc9607'),
(13, 9, 3, 15.9, '5878d0933ac50'),
(14, 9, 5, 20.9, '5878d0934c463'),
(15, 10, 3, 15.9, '5878d1c796eea'),
(16, 10, 5, 20.9, '5878d1c79c30c'),
(17, 11, 3, 15.9, '5878d3bfea953'),
(18, 11, 5, 20.9, '5878d3c007aa4'),
(19, 12, 3, 15.9, '5878d50f2672e'),
(20, 12, 5, 20.9, '5878d50f2bb1b'),
(21, 13, 3, 15.9, '5878d5f7724cf'),
(22, 13, 5, 20.9, '5878d5f781737'),
(23, 14, 3, 15.9, '5878d740256e4'),
(24, 14, 5, 20.9, '5878d7402a7c9'),
(25, 15, 3, 12, '5878dba8a6974'),
(26, 15, 5, 19, '5878dba8abd0c');

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
(7, 'Fantastique'),
(8, 'Science-Fiction'),
(9, 'Comédie'),
(10, 'Guerre'),
(11, 'Western'),
(12, 'Thriller'),
(13, 'Comédie noire');

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
(9, 7, 7),
(10, 8, 6),
(11, 8, 4),
(12, 9, 8),
(13, 10, 9),
(14, 11, 1),
(15, 11, 10),
(16, 12, 11),
(17, 13, 11),
(18, 13, 4),
(19, 14, 12),
(20, 14, 13),
(21, 15, 7);

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
(9, 7, 2),
(10, 8, 2),
(11, 8, 1),
(12, 9, 2),
(13, 9, 1),
(14, 10, 1),
(15, 11, 2),
(16, 11, 1),
(17, 12, 2),
(18, 12, 1),
(19, 13, 2),
(20, 13, 1),
(21, 14, 2),
(22, 14, 1),
(23, 15, 1),
(24, 15, 2);

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
(7, 7, 3, 7),
(8, 14, 2, 10);

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
(18, 'Chris Colombus'),
(19, 'Leonardo Dicaprio'),
(20, 'Tom Hardy'),
(21, 'Alejandro Gonzalez Inarritu'),
(22, 'Daisy Ridley'),
(23, 'Harrison Ford'),
(24, 'Carrie Fisher'),
(25, 'J.J. Abrams'),
(26, 'Jean Dujardin'),
(27, 'Clovis Cornillac'),
(28, 'James Huth'),
(29, 'Mélanie Laurent'),
(30, 'Quentin Tarantino'),
(31, 'Samuel L.Jackson'),
(32, 'Kurt Russel'),
(33, 'Jennifer jason Leigh'),
(34, 'Jamie Foxx'),
(35, 'Uma Thurman');

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
(17, 7, 18, 'Réalisateur'),
(18, 8, 19, 'Acteur'),
(19, 8, 20, 'Acteur'),
(20, 8, 21, 'Réalisateur'),
(21, 9, 22, 'Acteur'),
(22, 9, 23, 'Acteur'),
(23, 9, 24, 'Acteur'),
(24, 9, 25, 'Réalisateur'),
(25, 10, 26, 'Acteur'),
(26, 10, 27, 'Acteur'),
(27, 10, 28, 'Réalisateur'),
(28, 11, 9, 'Acteur'),
(29, 11, 29, 'Acteur'),
(30, 11, 30, 'Réalisateur'),
(31, 12, 31, 'Acteur'),
(32, 12, 32, 'Acteur'),
(33, 12, 33, 'Acteur'),
(34, 12, 29, 'Réalisateur'),
(35, 13, 31, 'Acteur'),
(36, 13, 34, 'Acteur'),
(37, 13, 19, 'Acteur'),
(38, 13, 30, 'Réalisateur'),
(39, 14, 31, 'Acteur'),
(40, 14, 35, 'Acteur'),
(41, 14, 30, 'Réalisateur'),
(42, 15, 17, 'Acteur'),
(43, 15, 16, 'Acteur'),
(44, 15, 15, 'Acteur'),
(45, 15, 18, 'Réalisateur');

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
(1, 'Harry Potter'),
(2, 'Star Wars'),
(3, 'Brice de Nice');

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
(1, 7, 1),
(2, 9, 2),
(3, 10, 3),
(4, 15, 1);

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
(4, 'Warner Bros'),
(5, '20th Century Fox'),
(6, 'Lucasfilm'),
(7, 'Mandarin Production'),
(8, 'Universal Pictures'),
(9, 'The Weinstein Company'),
(10, 'A Band Apart');

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
(7, 7, 4),
(8, 8, 5),
(9, 9, 6),
(10, 10, 7),
(11, 11, 8),
(12, 12, 9),
(13, 13, 9),
(14, 14, 10),
(15, 15, 4);

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
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `t_format`
--
ALTER TABLE `t_format`
  MODIFY `id_format` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_formatfilm`
--
ALTER TABLE `t_formatfilm`
  MODIFY `id_formatFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `t_genre`
--
ALTER TABLE `t_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `t_genrefilm`
--
ALTER TABLE `t_genrefilm`
  MODIFY `id_genreFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `t_langue`
--
ALTER TABLE `t_langue`
  MODIFY `id_langue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `t_languefilm`
--
ALTER TABLE `t_languefilm`
  MODIFY `id_langueFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `t_notefilm`
--
ALTER TABLE `t_notefilm`
  MODIFY `id_noteFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `t_personne`
--
ALTER TABLE `t_personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `t_rolefilm`
--
ALTER TABLE `t_rolefilm`
  MODIFY `id_roleFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `t_saga`
--
ALTER TABLE `t_saga`
  MODIFY `id_saga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_sagafilm`
--
ALTER TABLE `t_sagafilm`
  MODIFY `id_sagaFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `t_societe`
--
ALTER TABLE `t_societe`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `t_societefilm`
--
ALTER TABLE `t_societefilm`
  MODIFY `id_societeFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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