-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.20-log - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la table projet151. t_commentaire
DROP TABLE IF EXISTS `t_commentaire`;
CREATE TABLE IF NOT EXISTS `t_commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `unixtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentaire` text NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_commentaire`),
  KEY `fk_film` (`fk_film`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `contFilm_8` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_commentaire : ~7 rows (environ)
/*!40000 ALTER TABLE `t_commentaire` DISABLE KEYS */;
INSERT INTO `t_commentaire` (`id_commentaire`, `fk_film`, `fk_user`, `unixtime`, `commentaire`, `visible`) VALUES
	(12, 5, 1, '2016-12-16 08:56:21', 'Film de l\'année ! :razz:', 1),
	(13, 5, 1, '2016-12-16 08:58:01', 'TEST :biggrin:', 1),
	(14, 5, 1, '2016-12-16 08:58:15', 'TEST :biggrin:', 1),
	(15, 5, 1, '2016-12-16 08:58:50', 'TEST :geek:', 1),
	(16, 5, 1, '2016-12-16 08:59:31', 'TEST ULTIME :evil:', 1),
	(17, 7, 3, '2016-12-16 14:29:33', 'Ce film était vraiment bien sa m\'a rappelé ma jeunesse merci encore a NEXFLIT pour la proposition de ce film :biggrin: :biggrin: :biggrin:', 1),
	(18, 14, 2, '2017-01-13 14:36:04', 'Un film incroyable ! Quelle virtuosité !', 1);
/*!40000 ALTER TABLE `t_commentaire` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_film
DROP TABLE IF EXISTS `t_film`;
CREATE TABLE IF NOT EXISTS `t_film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titreOriginal` varchar(255) NOT NULL,
  `titreTraduit` varchar(255) DEFAULT NULL,
  `duree` int(11) NOT NULL,
  `dateSortieSuisse` date NOT NULL,
  `description` text NOT NULL,
  `accordParental` int(11) NOT NULL,
  `pochetteURL` varchar(255) DEFAULT NULL,
  `bandeAnnonceURL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_film : ~18 rows (environ)
/*!40000 ALTER TABLE `t_film` DISABLE KEYS */;
INSERT INTO `t_film` (`id_film`, `titreOriginal`, `titreTraduit`, `duree`, `dateSortieSuisse`, `description`, `accordParental`, `pochetteURL`, `bandeAnnonceURL`) VALUES
	(5, 'Fight Club', NULL, 139, '1999-09-10', 'La vie d\'un employé de bureau est bouleversée lorsqu\'il rencontre Tyler Durden. Ils forment ensemble le Fight Club, un club de lutte clandestine.', 16, 'img/films/img_24190000.jpg', 'https://www.youtube.com/watch?v=SUXWAEX2jlg'),
	(6, 'The Shawshank Redemption', 'Les Evadés', 142, '1994-10-14', 'Andy Dufresne est coupable d’un double meurtre. Il se retrouve dans la prison de Shawshank, où le directeur Norton règne avec le capitaine Hadley.', 16, 'img/films/img_71970000.jpg', 'https://www.youtube.com/watch?v=6hB3S9bIaco'),
	(7, 'Harry Potter and the Philosopher\'s Stone', 'Harry Potter à l\'école des sorciers', 147, '2001-12-05', 'Harry Potter, un jeune orphelin, est élevé par son oncle Vernon et sa tante Pétunia qui le détestent. Alors qu\'il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture. Le jour de son onzième anniversaire, Harry reçoit la visite inattendue d\'un homme gigantesque se nommant Rubeus Hagrid. Celui-ci lui révèle qu\'il est en fait le fils de deux puissants magiciens et qu\'il possède lui aussi d\'extraordinaires pouvoirs. C\'est avec joie que le garçon accepte de suivre des cours à Poudlard, la célèbre école de sorcellerie. Il a enfin la chance de se faire des amis. Blâmé par le professeur Severus Rogue qui lui enseigne les potions et protégé par Albus Dumbledore, le directeur de l\'établissement, Harry va tenter d\'élucider le mystère de la pierre philosophale.', 6, 'img/films/img_8bb0000.jpg', 'https://www.youtube.com/watch?v=ok3dj8MXC3M'),
	(8, 'The Revenant', NULL, 150, '2016-05-11', 'Dans une Amérique profondément sauvage, le trappeur Hugh Glass est sévèrement blessé et laissé pour mort par un traître de son équipe, John Fitzgerald. Avec sa seule volonté pour unique arme, Glass doit affronter un environnement hostile, un hiver brutal et des tribus guerrières, dans une inexorable lutte pour sa survie, portée par un intense désir de vengeance.', 16, 'img/films/img_60d30000.jpg', 'https://www.youtube.com/watch?v=QRfj1VCg16Y'),
	(9, 'Star Wars - The Force Awakens', 'Star Wars - Le Réveil de la Force', 130, '2016-04-05', 'Dans une galaxie lointaine, très lointaine, un nouvel épisode de la saga &quot;Star Wars&quot;, 30 ans après les événements du &quot;Retour du Jedi&quot;.', 12, 'img/films/img_345a0000.jpg', 'https://www.youtube.com/watch?v=sGbxmsDFVnE'),
	(10, 'Brice de Nice', NULL, 98, '2005-04-06', 'Eternel ado de presque 30 ans, délaissé par un père affairiste et une mère absentée, Brice s`est réfugié dans une posture, un \'style\' avec lesquels il exprimes son vrai vécu intrinsèque : Brice attend donc SA vague... à Nice ! Personne pourtant ne se risque à se moquer de Brice : redoutable bretteur de langage, Brice s`est fait une spécialité de \'casser\' tout et tout le monde par le truchement de ses reparties verbales. Il fallait bien qu`un jour Brice soit rattrapé par la réalité...', 6, 'img/films/img_410c0000.jpg', 'https://www.youtube.com/watch?v=taaKB2p8dUE'),
	(11, 'Inglourious Basterds', NULL, 146, '2014-09-04', 'Dans la France occupée de 1940, un groupe de soldats juifs américains, les bâtards , mènent des actions punitives particulièrement sanglantes contre les nazis du Troisième Reich. Leur chemin rencontre celui de Shoshanna Dreyfus, une jeune juive réfugiée à Paris exploitante d\'une salle de cinéma qui entend elle aussi assouvir sa propre vengeance envers les nazis...', 16, 'img/films/img_4c910000.jpg', 'https://www.youtube.com/watch?v=BiPUoLI9eGM'),
	(12, 'The Hateful Eight', 'Les 8 Salopards', 162, '2016-05-08', 'Après la Guerre de Sécession, huit voyageurs se retrouvent coincés dans un refuge au milieu des montagnes. Alors que la tempête s\'abat au-dessus du massif, ils réalisent qu\'ils n\'arriveront peut-être pas à rallier Red Rock comme prévu...', 16, 'img/films/img_a550000.jpg', 'https://www.youtube.com/watch?v=gnRbXn4-Yis'),
	(13, 'Django Unchained', NULL, 159, '2015-03-11', 'Dans le sud des États-Unis, le Dr King Schultz, un chasseur de primes allemand, fait l`acquisition de Django, un esclave qui peut l`aider à traquer les frères Brittle, les meurtriers qu`il recherche. Schultz promet à Django de lui rendre sa liberté lorsqu`il aura capturé les Brittle - morts ou vifs. Alors que les deux hommes pistent les dangereux criminels, Django n`oublie pas que son seul but est de retrouver sa femme...', 16, 'img/films/img_77f60000.jpg', 'https://www.youtube.com/watch?v=eUdM9vrCbow'),
	(14, 'Pulp Fiction', NULL, 145, '2011-10-07', 'Pulp Fiction décrit l`odyssée sanglante et burlesque de petits malfrats pas très doués et perdus dans la jungle de Hollywood. On y croise volontiers les destins de deux petits tueurs, d`un dangereux gangster marié sans le savoir à une vraie camée, d`un boxeur roublard, de prêteurs sur gages sadiques et sans pitié, d`un caïd élégant qui n`y paraît pas, d`un dealer honnête...et ce n`est pas tout. A vous de reconstituer le puzzle maintenant.', 16, 'img/films/img_37f70000.jpg', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY'),
	(15, 'Harry Potter and the Chamber of Secrets', 'Harry Potter et la Chambre des secrets', 161, '2002-12-04', 'Alors que l\'oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d\'importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l\'école de Poudlard et qu\'il ne doit pas y retourner en septembre. Harry refuse de le croire. Mais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante. Celle-ci lui dit que la redoutable et légendaire Chambre des secrets est à nouveau ouverte, permettant ainsi à l\'héritier de Serpentard de semer le chaos à Poudlard. Les victimes, retrouvées pétrifiées par une force mystérieuse, se succèdent dans les couloirs de l\'école, sans que les professeurs - pas même le populaire Gilderoy Lockhart - ne parviennent à endiguer la menace. Aidé de Ron et Hermione, Harry doit agir au plus vite pour sauver Poudlard. ', 6, 'img/films/img_80f0000.jpg', NULL),
	(16, 'Harry Potter and the Prisoner of Azkaban', 'Harry Potter et le Prisonnier d\'Azkaban', 142, '2004-06-02', 'Sirius Black, un dangereux sorcier criminel, s\'échappe de la sombre prison d\'Azkaban avec un seul et unique but : retrouver Harry Potter, en troisième année à l\'école de Poudlard. Selon la légende, Black aurait jadis livré les parents du jeune sorcier à leur assassin, Lord Voldemort, et serait maintenant déterminé à tuer Harry...', 6, 'img/films/img_1cba0000.jpg', 'https://www.youtube.com/watch?v=CLncEeVf4ks'),
	(17, 'Harry Potter and the Goblet of Fire', 'Harry Potter et la Coupe de feu', 157, '2005-11-30', 'La quatrième année à l\'école de Poudlard est marquée par le &quot;Tournoi des trois sorciers&quot;. Les participants sont choisis par la fameuse &quot;coupe de feu&quot; qui est à l\'origine d\'un scandale. Elle sélectionne Harry Potter alors qu\'il n\'a pas l\'âge légal requis ! Accusé de tricherie et mis à mal par une série d\'épreuves physiques de plus en plus difficiles, ce dernier sera enfin confronté à Celui dont on ne doit pas prononcer le nom, Lord V.', 6, NULL, 'https://www.youtube.com/watch?v=XO9rqIgzDL0'),
	(18, 'Harry Potter and the Order of the Phoenix', 'Harry Potter et l\'Ordre du phénix', 138, '2007-07-11', 'Alors qu\'il entame sa cinquième année d\'études à Poudlard, Harry Potter découvre que la communauté des sorciers ne semble pas croire au retour de Voldemort, convaincue par une campagne de désinformation orchestrée par le Ministre de la Magie Cornelius Fudge. Afin de le maintenir sous surveillance, Fudge impose à Poudlard un nouveau professeur de Défense contre les Forces du Mal, Dolorès Ombrage, chargée de maintenir l\'ordre à l\'école et de surveiller les faits et gestes de Dumbledore. Prodiguant aux élèves des cours sans grand intérêt, celle qui se fait appeler la Grande Inquisitrice de Poudlard semble également décidée à tout faire pour rabaisser Harry. Entouré de ses amis Ron et Hermione, ce dernier met sur pied un groupe secret, &quot;L\'Armée de Dumbledore&quot;, pour leur enseigner l\'art de la défense contre les forces du Mal et se préparer à la guerre qui s\'annonce...', 10, NULL, 'https://www.youtube.com/watch?v=S8-SXEGMmi4'),
	(19, 'Harry Potter and the Half-Blood Prince', 'Harry Potter et le Prince de sang-mêlé', 154, '2009-07-15', 'L\'étau démoniaque de Voldemort se resserre sur l\'univers des Moldus et le monde de la sorcellerie. Poudlard a cessé d\'être un havre de paix, le danger rode au coeur du château... Mais Dumbledore est plus décidé que jamais à préparer Harry à son combat final, désormais imminent. Ensemble, le vieux maître et le jeune sorcier vont tenter de percer à jour les défenses de Voldemort. Pour les aider dans cette délicate entreprise, Dumbledore va relancer et manipuler son ancien collègue, le Professeur Horace Slughorn, qu\'il croit en possession d\'informations vitales sur le jeune Voldemort. Mais un autre &quot;mal&quot; hante cette année les étudiants : le démon de l\'adolescence ! Harry est de plus en plus attiré par Ginny, qui ne laisse pas indifférent son rival, Dean Thomas ; Lavande Brown a jeté son dévolu sur Ron, mais oublié le pouvoir &quot;magique&quot; des chocolats de Romilda Vane ; Hermione, rongée par la jalousie, a décidé de cacher ses sentiments, vaille que vaille. L\'amour est dans tous les coeurs - sauf un. Car un étudiant reste étrangement sourd à son appel. Dans l\'ombre, il poursuit avec acharnement un but aussi mystérieux qu\'inquiétant... jusqu\'à l\'inévitable tragédie qui bouleversera à jamais Poudlard...', 10, 'img/films/img_47f00000.jpg', 'https://www.youtube.com/watch?v=yb-VYG3x5E8'),
	(20, 'Harry Potter and the Deathly Hallows', 'Harry Potter et les Reliques de la Mort pt.1', 146, '2010-11-24', 'Le pouvoir de Voldemort s\'étend. Celui-ci contrôle maintenant le Ministère de la Magie et Poudlard. Harry, Ron et Hermione décident de terminer le travail commencé par Dumbledore, et de retrouver les derniers Horcruxes pour vaincre le Seigneur des Ténèbres. Mais il reste bien peu d\'espoir aux trois sorciers, qui doivent réussir à tout prix.', 10, 'img/films/img_71690000.jpg', 'https://www.youtube.com/watch?v=HgZZsnleZJQ'),
	(21, 'Harry Potter and the Deathly Hallows', 'Harry Potter et les Reliques de la Mort pt.2', 130, '2011-07-13', 'Dans la 2e Partie de cet épisode final, le combat entre les puissances du bien et du mal de l’univers des sorciers se transforme en guerre sans merci. Les enjeux n’ont jamais été si considérables et personne n’est en sécurité. Mais c’est Harry Potter qui peut être appelé pour l’ultime sacrifice alors que se rapproche l’ultime épreuve de force avec Voldemort.', 10, 'img/films/img_77ee0000.jpg', 'https://www.youtube.com/watch?v=aiaIfICU-Tk'),
	(22, 'Avatar', NULL, 162, '2009-12-16', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des &quot; pilotes &quot; humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora. Sous sa forme d\'avatar, Jake peut de nouveau marcher. On lui confie une mission d\'infiltration auprès des Na\'vi, devenus un obstacle trop conséquent à l\'exploitation du précieux minerai. Mais tout va changer lorsque Neytiri, une très belle Na\'vi, sauve la vie de Jake...', 12, NULL, 'https://www.youtube.com/watch?v=62jWz1dacSM');
/*!40000 ALTER TABLE `t_film` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_format
DROP TABLE IF EXISTS `t_format`;
CREATE TABLE IF NOT EXISTS `t_format` (
  `id_format` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_format`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_format : ~3 rows (environ)
/*!40000 ALTER TABLE `t_format` DISABLE KEYS */;
INSERT INTO `t_format` (`id_format`, `nom`) VALUES
	(3, 'DVD'),
	(4, 'VHS'),
	(5, 'Blu-Ray');
/*!40000 ALTER TABLE `t_format` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_formatfilm
DROP TABLE IF EXISTS `t_formatfilm`;
CREATE TABLE IF NOT EXISTS `t_formatfilm` (
  `id_formatFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_format` int(11) NOT NULL,
  `prix` float NOT NULL,
  `numero_article` varchar(50) NOT NULL,
  PRIMARY KEY (`id_formatFilm`),
  KEY `fk_film` (`fk_film`),
  KEY `fk_format` (`fk_format`),
  CONSTRAINT `contFilm_1` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  CONSTRAINT `contFormat_1` FOREIGN KEY (`fk_format`) REFERENCES `t_format` (`id_format`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_formatfilm : ~35 rows (environ)
/*!40000 ALTER TABLE `t_formatfilm` DISABLE KEYS */;
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
	(26, 15, 5, 19, '5878dba8abd0c'),
	(27, 16, 3, 15, '587de3d2f2f85'),
	(28, 16, 5, 22, '587de3d30acad'),
	(29, 17, 3, 15, '587dfd7ce7af2'),
	(30, 17, 5, 23, '587dfd7cf134a'),
	(31, 18, 3, 15, '587dfd8171c3a'),
	(32, 18, 5, 23, '587dfd818a2da'),
	(33, 19, 3, 15, '587dfdc215c5a'),
	(34, 19, 5, 23, '587dfdc21d572'),
	(35, 20, 3, 15, '587dfe7ce80ce'),
	(36, 20, 5, 25, '587dfe7cf3c4e'),
	(37, 21, 3, 15, '587dfe7fd2076'),
	(38, 21, 5, 25, '587dfe7fe6896'),
	(39, 22, 5, 27, '587e1eefe7726');
/*!40000 ALTER TABLE `t_formatfilm` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_genre
DROP TABLE IF EXISTS `t_genre`;
CREATE TABLE IF NOT EXISTS `t_genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_genre : ~11 rows (environ)
/*!40000 ALTER TABLE `t_genre` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `t_genre` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_genrefilm
DROP TABLE IF EXISTS `t_genrefilm`;
CREATE TABLE IF NOT EXISTS `t_genrefilm` (
  `id_genreFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_genre` int(11) NOT NULL,
  PRIMARY KEY (`id_genreFilm`),
  KEY `fk_film` (`fk_film`),
  KEY `fk_genre` (`fk_genre`),
  CONSTRAINT `contFilm_2` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  CONSTRAINT `contGenre_1` FOREIGN KEY (`fk_genre`) REFERENCES `t_genre` (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_genrefilm : ~24 rows (environ)
/*!40000 ALTER TABLE `t_genrefilm` DISABLE KEYS */;
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
	(21, 15, 7),
	(22, 16, 6),
	(23, 17, 6),
	(24, 18, 6),
	(25, 19, 6),
	(26, 20, 6),
	(27, 21, 6),
	(28, 22, 8);
/*!40000 ALTER TABLE `t_genrefilm` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_langue
DROP TABLE IF EXISTS `t_langue`;
CREATE TABLE IF NOT EXISTS `t_langue` (
  `id_langue` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_langue : ~2 rows (environ)
/*!40000 ALTER TABLE `t_langue` DISABLE KEYS */;
INSERT INTO `t_langue` (`id_langue`, `nom`) VALUES
	(1, 'Français'),
	(2, 'Anglais');
/*!40000 ALTER TABLE `t_langue` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_languefilm
DROP TABLE IF EXISTS `t_languefilm`;
CREATE TABLE IF NOT EXISTS `t_languefilm` (
  `id_langueFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_langue` int(11) NOT NULL,
  PRIMARY KEY (`id_langueFilm`),
  KEY `fk_film` (`fk_film`),
  KEY `fk_langue` (`fk_langue`),
  CONSTRAINT `contFilm_3` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  CONSTRAINT `contLangue_1` FOREIGN KEY (`fk_langue`) REFERENCES `t_langue` (`id_langue`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_languefilm : ~34 rows (environ)
/*!40000 ALTER TABLE `t_languefilm` DISABLE KEYS */;
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
	(24, 15, 2),
	(25, 16, 1),
	(26, 16, 2),
	(27, 17, 1),
	(28, 17, 2),
	(29, 18, 1),
	(30, 18, 2),
	(31, 19, 1),
	(32, 19, 2),
	(33, 20, 1),
	(34, 20, 2),
	(35, 21, 1),
	(36, 21, 2),
	(37, 22, 2);
/*!40000 ALTER TABLE `t_languefilm` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_notefilm
DROP TABLE IF EXISTS `t_notefilm`;
CREATE TABLE IF NOT EXISTS `t_notefilm` (
  `id_noteFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `note` tinyint(5) NOT NULL,
  PRIMARY KEY (`id_noteFilm`),
  KEY `fk_film` (`fk_film`),
  KEY `fk_user` (`fk_user`),
  CONSTRAINT `contFilm_4` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_notefilm : ~3 rows (environ)
/*!40000 ALTER TABLE `t_notefilm` DISABLE KEYS */;
INSERT INTO `t_notefilm` (`id_noteFilm`, `fk_film`, `fk_user`, `note`) VALUES
	(6, 5, 1, 9),
	(7, 7, 3, 7),
	(8, 14, 2, 10);
/*!40000 ALTER TABLE `t_notefilm` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_personne
DROP TABLE IF EXISTS `t_personne`;
CREATE TABLE IF NOT EXISTS `t_personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_personne : ~31 rows (environ)
/*!40000 ALTER TABLE `t_personne` DISABLE KEYS */;
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
	(35, 'Uma Thurman'),
	(36, 'James Cameron');
/*!40000 ALTER TABLE `t_personne` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_rolefilm
DROP TABLE IF EXISTS `t_rolefilm`;
CREATE TABLE IF NOT EXISTS `t_rolefilm` (
  `id_roleFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_personne` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_roleFilm`),
  KEY `fk_film` (`fk_film`),
  KEY `fk_personne` (`fk_personne`),
  CONSTRAINT `contFilm_5` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  CONSTRAINT `contPersonne_1` FOREIGN KEY (`fk_personne`) REFERENCES `t_personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_rolefilm : ~65 rows (environ)
/*!40000 ALTER TABLE `t_rolefilm` DISABLE KEYS */;
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
	(45, 15, 18, 'Réalisateur'),
	(46, 16, 15, 'Acteur'),
	(47, 16, 16, 'Acteur'),
	(48, 16, 17, 'Acteur'),
	(49, 16, 18, 'Realisateur'),
	(50, 17, 15, 'Acteur'),
	(51, 17, 16, 'Acteur'),
	(52, 17, 17, 'Acteur'),
	(53, 17, 18, 'Realisateur'),
	(54, 18, 15, 'Acteur'),
	(55, 18, 16, 'Acteur'),
	(56, 18, 17, 'Acteur'),
	(57, 18, 18, 'Realisateur'),
	(58, 19, 15, 'Acteur'),
	(59, 19, 16, 'Acteur'),
	(60, 19, 17, 'Acteur'),
	(61, 19, 18, 'Realisateur'),
	(62, 20, 15, 'Acteur'),
	(63, 20, 16, 'Actrisse'),
	(64, 20, 17, 'Acteur'),
	(65, 20, 17, 'Réalisateur'),
	(66, 21, 15, 'Acteur'),
	(67, 21, 16, 'Acteur'),
	(68, 21, 17, 'Acteur'),
	(69, 21, 18, 'Realisateur'),
	(70, 22, 1, 'Realisateur'),
	(71, 22, 8, 'Acteur');
/*!40000 ALTER TABLE `t_rolefilm` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_saga
DROP TABLE IF EXISTS `t_saga`;
CREATE TABLE IF NOT EXISTS `t_saga` (
  `id_saga` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_saga`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_saga : ~3 rows (environ)
/*!40000 ALTER TABLE `t_saga` DISABLE KEYS */;
INSERT INTO `t_saga` (`id_saga`, `nom`) VALUES
	(1, 'Harry Potter'),
	(2, 'Star Wars'),
	(3, 'Brice de Nice');
/*!40000 ALTER TABLE `t_saga` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_sagafilm
DROP TABLE IF EXISTS `t_sagafilm`;
CREATE TABLE IF NOT EXISTS `t_sagafilm` (
  `id_sagaFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_saga` int(11) NOT NULL,
  PRIMARY KEY (`id_sagaFilm`),
  KEY `fk_film` (`fk_film`,`fk_saga`),
  KEY `contSaga_1` (`fk_saga`),
  CONSTRAINT `contFilm_6` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  CONSTRAINT `contSaga_1` FOREIGN KEY (`fk_saga`) REFERENCES `t_saga` (`id_saga`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_sagafilm : ~10 rows (environ)
/*!40000 ALTER TABLE `t_sagafilm` DISABLE KEYS */;
INSERT INTO `t_sagafilm` (`id_sagaFilm`, `fk_film`, `fk_saga`) VALUES
	(1, 7, 1),
	(2, 9, 2),
	(3, 10, 3),
	(4, 15, 1),
	(5, 16, 1),
	(6, 17, 1),
	(7, 18, 1),
	(8, 19, 1),
	(9, 20, 1),
	(10, 21, 1);
/*!40000 ALTER TABLE `t_sagafilm` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_societe
DROP TABLE IF EXISTS `t_societe`;
CREATE TABLE IF NOT EXISTS `t_societe` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_societe : ~9 rows (environ)
/*!40000 ALTER TABLE `t_societe` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `t_societe` ENABLE KEYS */;

-- Export de la structure de la table projet151. t_societefilm
DROP TABLE IF EXISTS `t_societefilm`;
CREATE TABLE IF NOT EXISTS `t_societefilm` (
  `id_societeFilm` int(11) NOT NULL AUTO_INCREMENT,
  `fk_film` int(11) NOT NULL,
  `fk_societe` int(11) NOT NULL,
  PRIMARY KEY (`id_societeFilm`),
  KEY `fk_film` (`fk_film`,`fk_societe`),
  KEY `contSociete_1` (`fk_societe`),
  CONSTRAINT `contFilm_7` FOREIGN KEY (`fk_film`) REFERENCES `t_film` (`id_film`),
  CONSTRAINT `contSociete_1` FOREIGN KEY (`fk_societe`) REFERENCES `t_societe` (`id_societe`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Export de données de la table projet151.t_societefilm : ~18 rows (environ)
/*!40000 ALTER TABLE `t_societefilm` DISABLE KEYS */;
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
	(15, 15, 4),
	(16, 16, 4),
	(17, 17, 4),
	(18, 18, 4),
	(19, 19, 4),
	(20, 20, 4),
	(21, 21, 4),
	(22, 22, 5);
/*!40000 ALTER TABLE `t_societefilm` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
