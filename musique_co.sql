-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 02 Mars 2017 à 18:00
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `musique&co`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`, `email`) VALUES
(1, 'admin', 'admin', 'admin@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `code` char(1) NOT NULL,
  `libelle` varchar(20) DEFAULT NULL,
  `nbImages` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`code`, `libelle`, `nbImages`) VALUES
('C', 'contact', '0'),
('E', 'tarif', '1'),
('G', 'galerie', 'no limit'),
('N', 'news', '1'),
('P', 'prof', '1'),
('T', 'texte', '1');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `leContenu` text,
  `dateAjout` date DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idMenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`id`, `titre`, `leContenu`, `dateAjout`, `dateModif`, `idMenu`) VALUES
(1, 'Musique & Co', 'Une ambiance musicale pour tous.', '2017-02-03', '2017-02-03', 1),
(2, 'Diversifié', 'De la guitare à la batterie, ou encore du saxo à la trompette.', '2017-02-03', '2017-02-03', 1),
(3, 'Entrepreneur', 'Des stages et spectacles à gogo.', '2017-02-03', '2017-02-03', 1),
(4, 'On aime la musique et on la vie!', 'Toute l\'année, quelque soit l\'âge et le style, que ce soit en groupe ou en solo, Musique & Co vous propose : <br>\r\n- Des cours de guitare acoustique, ou électrique<br>\r\n- Des cours de basse<br>\r\n- Des cours de saxophone, trompette et flûte<br>\r\n- Des cours de piano<br>\r\n- Des cours de batterie<br>\r\n- Des ateliers pour jouer en groupe ouverts à tous les instruments<br>\r\n- Des stages<br>\r\n- Des éveils musicaux destinés aux enfants de 3 à 6 ans<br>\r\nAvec à votre disposition salles de travail, batterie, pianos, amplis guitare, amplis basse et pleins d\'autres encore !<br>\r\nVous avez également la possibilité d\'emprunter nos instruments.', '2017-01-26', '2017-01-26', 1),
(5, 'NEWS 2014', 'Le 15 juin spectacle des élèves, le 13 septembre forum des associations, le 15 novembre grande soirée festive latino à la salle SCOHY !', '2014-01-01', '2017-01-31', 2),
(6, 'Vous commencez la prise en main de l\'instrument dès le premier cours !', 'L\'apprentissage ou le perfectionnement de l\'instrument, le travail du rythme, le travail à tempo, les connaissances théoriques nécessaires à votre progression musicale se font sur la base de morceaux choisis dans le style que vous aimez.<br>\r\n<b>Fréquence des cours :</b><br>\r\n- De Septembre à juin (possibilités de cours en juillet pas de cours en août)<br>\r\n- Une heure par semaine, pas de cours le dimanche<br>\r\n- Pendant les vacances scolaires de 15 jours nous fermons une semaine<br>\r\n     \r\n<b>Horaires :</b><br>\r\n- Matin, midi ou en soirée : de 9H à 21H<br>\r\n\r\n<b>Organisation des cours :</b><br>\r\n- Cours individuels ou collectifs (tarif dégressif), cours à la carte<br>\r\n- Paiement des cours en début de mois<br> \r\n\r\nLes informations sur le contenu des cours se trouvent dans les rubriques de l\'instrument que vous souhaitez pratiquer.', '2017-01-27', '2017-01-27', 4),
(7, 'Rajoutez 6 cordes à votre arc !', '<b>Guitare acoustique :</b> Guitare d\'accompagnement, chansons françaises, pop, folk, bossa, picking, blues, musique classique,...<br>\r\n<b>Guitare électrique :</b> Pop Rock, hard rock, métal, Blues, funk, reggae, jazz,...<br>\r\n<b>Basse :</b> Rock, métal, blues, jazz, funk, reggae,...<br>\r\nInitiation ou développement de l\'improvisation; ainsi que l\'étude et la mise en place des solos de vos guitaristes préférés :<br>\r\nClapton, SRV, Pink Floyd, Metallica, Hendrix, Iron Maiden, Led Zeppelin, ACDC, Nirvana, Lynyrd Skynyrd,  Rolling Stones, Deep purple, Santana, Green Day,...<br>\r\nQuelque soit votre style : Développement du rythme, coordination main gauche main droite, travail basse batterie approfondi et initiation ou perfectionnement du jeu en groupe.', '2017-01-27', '2017-01-27', 5),
(8, 'Le piano à Musique&Co', 'Musique classique, musique de films, chansons françaises, pop rock, ragtime, blues,... tous les styles que vous aimez peuvent être abordés pendant les cours ! \r\n\r\nPour les petits l\'apprentissage de l\'instrument se fait à partir de petites pièces classiques, de comptines ou de chansons pour enfants.', '2017-01-27', '2017-01-27', 6),
(9, 'Du vent qui fait du bien aux oreilles ', 'Les instruments à vent sont aujourd\'hui des instruments de plus en plus pratiqués. Le renouveau de la musique soul et du RNB les ont en effet remis au premier plan. <br>\r\nJazz, soul, funk, salsa, reggae, world-music, variété,... En soliste ou en ensemble saxos, trompettes et flûtes viennent de plus en plus colorer les musiques actuelles.<br>\r\n<b>Au programme :</b> Apprentissage ou perfectionnement de la lecture, travail rythmique, montage / démontage de l\'instrument, respiration, technique,  positions des doigts,  etc..', '2017-01-27', '2017-01-27', 7),
(10, 'En construction...', '', '2017-01-27', '2017-01-27', 8),
(11, 'Jazz, funk, blues, et encore !', 'Musique&Co vous propose des ateliers par niveaux ouverts à tous les instruments, ainsi que pour le chant !<br>\nTravail convivial et sérieux en petits groupes, organisés sur la base de standards et musiques actuelles.<br>\n\n<b>AU PROGRAMME :</b>\n<b>Jouer avec les autres :</b> analyse harmonique et déchiffrage / comprendre la structure d\'un morceau<br>\n<b>Travail de l\'improvisation :</b> gammes, modes, relation harmonie gammes et modes<br>\n<b> Travail de rythmique approfondi :</b> mise en place de morceaux avec le groupe', '2017-01-27', '2017-01-27', 9),
(12, 'Ambiance musicale à partager !', 'Vous jouez du piano ou de la guitare ? Vous souhaitez vous perfectionner et partager avec d\'autres musiciens ? C\'est un de nos stages qu\'il vous faut !<br>\r\nDu 25 au 27 Avril Musique&Co organise deux stages : Un stage piano blues, un stage guitare blues, suivi d\'une rencontre entre les musiciens des deux stages en présence d\'un batteur et d\'un bassiste.<br>\r\nAu menu 10 heures de cours ou sont abordés harmonie, rythme, improvisation et jeu en groupe.<br>\r\n<b>STAGE BLUES DU 25 AU 27 AVRIL 2016</b>', '2017-01-27', '2017-01-27', 10),
(13, 'A quoi sert l\'éveil musical ?', 'L’éveil musical aide au développement intellectuel, social, et affectif des petits.<br>\r\nIl participe a communiquer et perfectionner des facultés telles que la concentration, la mémoire, l\'imagination, la créativité. Il permet ainsi de développer un sens artistique, de stimuler l\'imagination et la création.<br>\r\nTout en étant conduit de façon sérieuse dans un esprit récréatif et ludique, l\'éveil musical est une activité qui fait appel aux facultés auditives, sensitives, tactiles et visuelles tout en facilitant rythme et coordination.<br>', '2017-01-27', '2017-01-27', 11),
(14, 'Forum des associations', 'Le 13 septembre nous serons présents au Forum des associations qui se tiendra cette année à la Ferme du Vieux Pays. Pour ceux qui veulent se renseigner ou s\'inscrire, que vous soyez débutant ou d\'un niveau avancé nous répondrons avec plaisir a toutes vos questions,  pour vous guider dans votre projet musical.', '2014-04-01', '2017-01-31', 2),
(15, 'La musique des tout petits', 'Musique&Co propose aux enfants de 3 à 6 ans une initiation au monde musical.<br>\r\nPour permettre de développer un véritable éveil musical cette initiation se fait en petits groupes.<br>\r\n<b>AU PROGRAMME :</b> découverte des sons et du rythme, découverte des instruments, jeux musicaux, chants et danses.', '2017-01-27', '2017-01-27', 11),
(16, 'Salle Chanteloup pleine ce 15 Juin !', 'Tout ceux qui le souhaitait sont montés sur scène devant leur famille, parents, amis, venus les encourager, les féliciter, les applaudir.<br>\r\n\r\nDe la guitare, de la basse, du piano, du saxophone, du violon. Tout seul, en ensemble ou en groupe tout les participants ont interprété un programme riche et varié, conçu pour se faire plaisir et faire plaisir avec au menu de la pop, de la chanson française, du rock, du hard rock, du blues, du jazz, de la musique classique.<br>\r\n\r\nCette super journée s\'est conclu par un apéro concert latino avec le groupe Fabela\'s. La première partie du groupe était assuré comme des pros par les élèves des ateliers de musique d\'ensemble.<br>\r\n\r\nUn grand bravo à tout les participants, un grand merci a tout ceux qui ont apportés, un gâteau, une salade un petit quelque chose qui fait plaisir. Merci également à tous ceux qui nous ont aidés tout au long de la journée, un peu beaucoup, mais toujours passionnément.<br>\r\n\r\nVOUS POUVEZ RETROUVER LES PHOTOS DE LA JOURNÉE DANS LA RUBRIQUE GALERIE, PUIS SOUS RUBRIQUE SPECTACLE DES ÉLÈVES.<br>\r\n\r\nA BIENTOT POUR LA PROCHAINE EDITION', '2014-05-16', '2017-01-31', 2),
(17, 'Grand concert !', 'Le 15 novembre salle Scohy : grand concert latino organisé par Musique&Co Productions. <br>\r\n<b>AU MENU :</b> Brazilian show, Fabela\'S, et deux stars internationales de la musique latine : le groupe Che Sudaka et El Hijo de la Cumbia, créateur de la Cumbia Digitale.<br> Sur place buffet latin et mets typiques. Les infos sur la page Facebook musique and co.productions, et www.//http.musiqueandcoproductions.fr\r\n\r\n', '2014-10-01', '2017-01-31', 2),
(18, 'NEWS 2015', 'Le 12 septembre nous serons présents au Forum des associations prêts à répondre à  vos questions, vous informer et inscrire ceux qui le souhaitent !<br>\r\n\r\nA 14H démonstrations musicales effectuées par nos élèves.', '2015-01-01', '2017-01-31', 2),
(19, 'Du nouveau cette rentrée !', 'RENTRÉE 2015 2016 ! Du nouveau chez Musique&Co : Cours de batterie.', '2015-09-01', '2017-01-31', 2),
(20, 'Du repos ça vous dit ?', 'Vacances du lundi 29 février au dimanche 6 mars.<br>\r\nDernier cours : samedi 27 février<br>\r\nReprise : lundi 7 mars', '2016-01-01', '2017-01-31', 2),
(21, 'Stage pour vous !', 'Stage piano et guitare blues : du 25 avril au 27 avril 2016. <br>\nTOUTES LES INFOS DANS LA RUBRIQUE STAGE \n', '2016-01-27', '2017-01-31', 2);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `lImage` text,
  `format` varchar(5) DEFAULT NULL,
  `dateAjout` date DEFAULT NULL,
  `idMenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `lImage`, `format`, `dateAjout`, `idMenu`) VALUES
(1, '../images/page1.jpg', 'jpg', '2017-02-01', 1),
(2, '../images/news.jpg', 'jpg', '2017-02-01', 2),
(3, '../images/cours.jpg', 'jpg', '2017-02-01', 4),
(4, '../images/guitare.jpg', 'jpg', '2017-02-01', 5),
(5, '../images/piano.jpg', 'jpg', '2017-02-01', 6),
(6, '../images/batterie.jpg', 'jpg', '2017-02-01', 8),
(7, '../images/atelier.jpg', 'jpg', '2017-02-01', 9),
(8, '../images/stage.jpg', 'jpg', '2017-02-01', 10),
(9, '../images/eveil.jpg', 'jpg', '2017-02-01', 11),
(10, '../images/contact.jpg', 'jpg', '2017-02-01', 17),
(11, '../images/page2.jpg', 'jpg', '2017-02-01', 1),
(12, '../images/page3.jpg', 'jpg', '2017-02-01', 1),
(13, '../images/GIMG_4207.jpg', 'jpg', '2017-02-27', 15),
(14, '../images/GIMG_4217.jpg', 'jpg', '2017-02-27', 15),
(15, '../images/GIMG_4226.jpg', 'jpg', '2017-02-27', 15),
(16, '../images/GIMG_4231.jpg', 'jpg', '2017-02-27', 15),
(17, '../images/GIMG_4237.jpg', 'jpg', '2017-02-27', 15),
(18, '../images/GIMG_4240.jpg', 'jpg', '2017-02-27', 15),
(19, '../images/GIMG_4241.jpg', 'jpg', '2017-02-27', 15),
(20, '../images/GIMG_4242.jpg', 'jpg', '2017-02-27', 15),
(21, '../images/GIMG_4243.jpg', 'jpg', '2017-02-27', 15),
(22, '../images/GIMG_4257.jpg', 'jpg', '2017-02-27', 15),
(23, '../images/GIMG_4292.jpg', 'jpg', '2017-02-27', 15);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `classement` int(11) DEFAULT NULL,
  `nomMenu` text,
  `nomSousMenu` text,
  `sousMenu` tinyint(1) DEFAULT NULL,
  `categ` char(1) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id`, `classement`, `nomMenu`, `nomSousMenu`, `sousMenu`, `categ`, `archive`) VALUES
(1, 1, 'ACCUEIL', NULL, 0, 'T', 1),
(2, 2, 'NEWS', NULL, 0, 'N', 1),
(3, 3, 'COURS', NULL, 1, 'T', 1),
(4, 3, 'COURS', 'PRESENTATION', 0, 'T', 1),
(5, 3, 'COURS', 'GUITARE', 0, 'T', 1),
(6, 3, 'COURS', 'PIANO', 0, 'T', 1),
(7, 3, 'COURS', 'SAXO / FLUTE / TROMPETTE', 0, 'T', 1),
(8, 3, 'COURS', 'BATTERIE', 0, 'T', 1),
(9, 4, 'ATELIERS', NULL, 0, 'T', 1),
(10, 5, 'STAGES', NULL, 0, 'T', 1),
(11, 6, 'EVEIL', NULL, 0, 'T', 1),
(12, 7, 'TARIFS', NULL, 0, 'E', 1),
(13, 8, 'PROF', NULL, 0, 'P', 1),
(14, 9, 'GALERIE', NULL, 1, 'G', 1),
(15, 9, 'GALERIE', 'COURS / STAGES', 0, 'G', 1),
(16, 9, 'GALERIE', 'SPECTACLES', 0, 'G', 1),
(17, 10, 'CONTACT', NULL, 0, 'C', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `libelle` text,
  `dateModif` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `libelle`, `dateModif`) VALUES
(1, 'Une bibliothèque avec des centaines de partitions, méthodes pour travailler dans tous les styles !', '2017-02-03');

-- --------------------------------------------------------

--
-- Structure de la table `prof`
--

CREATE TABLE `prof` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `discipline` text,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prof`
--

INSERT INTO `prof` (`id`, `nom`, `prenom`, `discipline`, `image`) VALUES
(1, 'Fornacciari', 'Anaïs', 'Professeur de Piano', '../public/images/bandmember.jpg'),
(2, 'Marcone', 'Enzo', 'Professeur de Piano', '../public/images/bandmember.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categ` (`categ`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD CONSTRAINT `contenu_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`categ`) REFERENCES `categorie` (`code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
