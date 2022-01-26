-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 09 Février 2021 à 15:54
-- Version du serveur :  5.7.33-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commune`
--
CREATE DATABASE IF NOT EXISTS `commune` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `commune`;

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `id_laboratoire` int(11) NOT NULL,
  `id_projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appartenir`
--

INSERT INTO `appartenir` (`id_laboratoire`, `id_projet`) VALUES
(8, 1),
(6, 1),
(12, 1),
(2, 1),
(2, 6),
(17, 6),
(16, 6),
(14, 6),
(4, 6),
(1, 1),
(1, 6),
(1, 7),
(15, 6),
(4, 1),
(4, 8),
(2, 8),
(1, 8),
(18, 6),
(19, 7),
(20, 7),
(5, 1),
(5, 6),
(5, 8),
(13, 1),
(13, 6),
(3, 1),
(3, 5),
(3, 8),
(7, 1),
(7, 6),
(7, 8),
(9, 1),
(9, 6),
(9, 7),
(9, 8);

-- --------------------------------------------------------

--
-- Structure de la table `etudier`
--

CREATE TABLE `etudier` (
  `id_laboratoire` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudier`
--

INSERT INTO `etudier` (`id_laboratoire`, `id_utilisateur`) VALUES
(1, 1),
(1, 18),
(1, 19),
(1, 20),
(2, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(4, 49),
(4, 50),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(4, 56),
(4, 57),
(4, 58),
(6, 59),
(6, 60),
(6, 61),
(6, 62),
(6, 63),
(6, 64),
(6, 65),
(6, 66),
(1, 68),
(6, 69),
(2, 71),
(1, 72),
(1, 73),
(5, 74),
(5, 75),
(5, 76),
(7, 77),
(3, 78),
(3, 79),
(3, 80),
(3, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(8, 88),
(8, 89),
(8, 90),
(8, 91),
(1, 92),
(1, 114),
(1, 115),
(1, 116),
(1, 118),
(1, 129),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(18, 139),
(19, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(1, 140),
(7, 140),
(17, 140),
(1, 140),
(2, 140),
(1, 140),
(1, 140),
(17, 140);

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE `laboratoire` (
  `id_laboratoire` int(11) NOT NULL,
  `nom_laboratoire` varchar(255) NOT NULL,
  `abreviation_laboratoire` varchar(50) NOT NULL,
  `description_laboratoire` text,
  `site_laboratoire` varchar(500) NOT NULL,
  `img_laboratoire` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `laboratoire`
--

INSERT INTO `laboratoire` (`id_laboratoire`, `nom_laboratoire`, `abreviation_laboratoire`, `description_laboratoire`, `site_laboratoire`, `img_laboratoire`) VALUES
(1, 'Laboratoire d\'informatique, de traitement de l\'information et des systèmes', 'LITIS', 'Le LITIS est une équipe d’accueil (EA 4108) de l\'Université du Havre Normandie, de l\'Université de Rouen Normandie et de l\'INSA Rouen Normandie. Il est membre de  l’école doctorale MIIS et des réseaux d’intérêts normands « Normandie Digitale » et « Continuum Terre Mer » ainsi que de la fédération CNRS de recherche Normastic. \r\n\r\nLes travaux scientifiques menés au LITIS couvrent un large spectre des sciences et technologies de l\'information et de la communication (STIC) allant de la recherche fondamentale à des domaines d’applications ciblés sur le transport et la logistique, sur la médecine, la biologie et les sciences humaines. Il comporte environ 80 enseignants chercheurs et 70 doctorants ainsi que du personnel administratif et technique.\r\n\r\nLe laboratoire se compose de 7 équipes  :\r\n\r\n- Combinatoire et algorithmes \r\n- Apprentissage \r\n- Traitement de l\'information en biologie et santé \r\n- Quantification en imagerie fonctionnelle \r\n- Systèmes de transport intelligent (STI)\r\n- Multi-agents, Interaction, Décision \r\n- Réseaux d\'interaction et intelligence collective ', 'http://www.litislab.eu/', 'Laboratoire d\'informatique, de traitement de l\'information et des systèmes_labo.png'),
(2, 'Laboratoire de Mathématiques Appliquées du Havre', 'LMAH', 'Le LMAH, Laboratoire de Mathématiques de l’université du Havre développe des modèles concrets à partir d’outils issus de l’analyse mathématique, des systèmes dynamiques, de l’optimisation ou de la statistique. La logistique est l’un des principaux champs d’application du laboratoire. ', 'http://lmah.univ-lehavre.fr/', 'lmah.png'),
(3, 'Identité et Différenciation de l’Espace, de l’Environnement et des Sociétés', 'IDEES', 'Associée au CNRS depuis 1984, l’UMR IDEES est née dans sa dénomination et son périmètre actuel en 1996, de la fusion de plusieurs équipes de recherche : MTG (Université de Rouen), LEDRA (Université de Rouen), CIRTAI (Université Le Havre) et GEOSYSCOM (Université de Caen).\r\n\r\nElle regroupe des enseignant.e.s-chercheur.e.s, des chercheur.e.s, des ingénieur.e.s de recherche et/ou d’études et des doctorant.e.s. La vie d’une telle unité fait que le nombre de membres varient d’une année à l’autre mais elle regroupe environ 120 chercheur.e.s autour de spécialités reconnues en France et à l’international telles que la modélisation et l’analyse spatiale, le transport et les environnements portuaires, la santé et les risques, les Technologies d’Information et de la Communication (TIC) ou encore les recompositions socio-territoriales.', 'http://umr-idees.fr/', 'idees.png'),
(4, 'Normandie Innovation, Marché, Entreprise, Consommation', 'NIMEC', 'Le NIMEC (Normandie Innovation Marché Entreprise Consommation), laboratoire universitaire en sciences de gestion de Normandie, développe ses activités sur les trois campus de Caen, du Havre et de Rouen. Les travaux de recherche du NIMEC s\'inscrivent dans trois thèmes de recherche principaux. L’équipe associée au projet s’inscrit dans le thème 1, « Innovation et coopération ».', 'https://nimec.univ-lehavre.fr/', 'nimec.png'),
(5, 'Institut Du Droit International Des Transports', 'IDIT', 'Spécialisé dans le domaine juridique des transports, tous modes confondus, tant sur le plan national qu\'international, l\'Institut du Droit International des Transports (IDIT) développe trois activités principales : (1) Recherche / Expertise juridique ; (2) Base de données / Publications / Manifestations ; (3) Formation', 'http://www.idit.asso.fr/sommaire.php', 'idit.jpg'),
(7, 'Comptoir de la logistique', 'ISEL', 'Le Comptoir de la Logistique est un guichet de valorisation en ingénierie logistique qui met à disposition de ses partenaires une plateforme unique en France d’outils de modélisation et d’optimisation de flux et de réseaux logistiques.\r\n\r\nCréé en 2009 par l’ISEL, le Comptoir de la Logistique est une structure innovante qui s’appuie sur les potentiels des ingénieurs de notre école pour répondre aux demandes de nos partenaires publics et privés.', 'http://www.isel-logistique.fr/campus-logistique/', 'isel.jpg'),
(9, 'Structure Fédérative en Logistique', 'SFLog', '', 'https://sflog.univ-lehavre.fr/', 'Structure Fédérative en Logistique_labo.png'),
(13, 'NOVALOG', 'NOVALOG', 'Acteur de référence pour l’émergence, l’accompagnement, la labellisation et la recherche de financement de projets collaboratifs innovants, Nov@log a pour objectif de répondre aux impératifs de compétitivité des entreprises industrielles et de services logistiques et aux exigences de performance des flux.\r\nEn rapprochant les besoins métier portés par la recherche et les entreprises innovantes du pôle, Nov@log consacre un effort important à l’émergence et à la construction de leurs projets d’innovation logistique et favoriser, ainsi, leur développement économique.', 'https://www.novalog.eu/', 'novalog.png'),
(14, 'Institut Mobis', 'MOBIS', 'Initié par des projets de recherche appliquée depuis 2007, MOBIS a su s\'imposer auprès des institutions publiques (Union Européenne, OCDE, Ministères français, Région Haute-Normandie, etc.) et des entreprises représentatives du tissu économique international (Bureau Veritas, Ceva Logistics, Mazda, CHU, etc.).\r\n\r\nL’Institut affirme également sa présence auprès des acteurs de la chaîne logistique globale au niveau régional (les ports du Havre, de Rouen, de Paris, etc.), grâce à une approche innovante et durable mobilisant la socio-économie des transports et de la logistique. MOBIS accompagne par ailleurs des acteurs et des organisations dans l\'apport de valeur ajoutée par l\'élaboration et la mise en place de leviers de performance ainsi que d\'optimisation logistique.', 'https://www.neoma-bs.fr/', 'mobis.jpeg'),
(15, 'Institut de Recherche en Systèmes Électroniques Embarqués', 'IRSEEM', 'L’IRSEEM (EA 4353) et ses chercheurs joignent leurs compétences en électronique, automatique et informatique et mènent des activités scientifiques solides et reconnues développés selon plusieurs axes : la CEM et la fiabilité des composants et des systèmes, les circuits radiofréquences et microondes (conception, modélisation et caractérisation), les systèmes mobiles autonomes et connectés (perception et localisation), et le contrôle de tolérance aux fautes de systèmes (commande robuste, diagnostic/pronostic et estimation).', 'http://www.esigelec.fr/fr/irseem', 'irseem.png'),
(16, 'Laboratoire de Mathématiques Raphaël Salem', 'LMRS', 'Le Laboratoire de Mathématiques Raphaël Salem est un laboratoire de mathématiques pures et appliquées. Son statut est celui d\'une Unité Mixte de Recherche (UMR 6085), sous la double tutelle de l\'Université de Rouen Normandie et du CNRS. Il est rattaché à l\'Institut National des Sciences Mathématiques et de leurs Interactions et fait partie de la Fédération Normandie-Mathématiques.', 'https://lmrs.univ-rouen.fr/', 'Laboratoire de Mathématiques Raphaël Salem_labo.png'),
(17, 'Groupe de Recherche en Electrotechnique et Automatique du Havre', 'GREAH', 'Issu en 1999 de la fusion des laboratoires LEPII (Laboratoire d’Électronique de Puissance et d’Informatique Industrielle) et du LACOS (Laboratoire d’Automatique et COmmande des Systèmes), le GREAH (Groupe de Recherche en Électrotechnique et Automatique du Havre) EA 3220 fait partie de l’Université du Havre et se spécialise dans le génie électrique et l’automatique. Il accueille des enseignants-chercheurs de la 61ème et la 63ème sections du CNU.', 'https://greah.univ-lehavre.fr/', 'Groupe de Recherche en Electrotechnique et Automatique du Havre_labo.png'),
(18, 'Métis', 'METIS LAB', 'Les activités de recherche se développent dans le cadre du laboratoire Métis organisé autour de quatre axes : (1) Performances et Mutations Entrepreneuriales, (2) Travailler et Vivre dans des Organisations Fluides, (3) Logistique Terre Mer Risque, (4) International Business Networks. L’EM Normandie apporte des réponses aux acteurs économiques de son territoire et met son expertise au service des professionnels en développant une recherche appliquée par la création de chaires ou la réalisation de contrats de recherche ou de missions d’expertise.', 'https://www.metis-lab.com/', 'Mêtis_labo.png'),
(19, 'Centre de recherche sur les mutations du droit et les mutations sociales', 'CERMUD', 'LE CERMUD (Centre de recherche sur les mutations du droit et les mutations sociales) est une unité de recherche attachée à l’Université Le Havre Normandie.\r\n\r\nComposée d’une dizaine de chercheurs permanents, dont quatre professeurs des universités, le laboratoire se démarque par ses études sur les dynamismes du droit, qu’il s’agisse des mutations en matière de régulation, de la circulation des modèles juridiques dans le monde ou encore des mutations liées aux rapports Terre-Mer. Les chercheurs du CERMUD ont à cœur de favoriser le croisement des compétences en matière de droit en faisant se compléter droit privé et droit public. De même, la recherche de l’interdisciplinarité est au cœur de leur démarches, dans une ouverture à la fois scientifique et institutionnelle.', '', 'CERMUD_labo.png'),
(20, 'CREAM', 'CREAM', 'Issu en 1999 de la fusion des laboratoires LEPII (Laboratoire d’Électronique de Puissance et d’Informatique Industrielle) et du LACOS (Laboratoire d’Automatique et COmmande des Systèmes), le GREAH (Groupe de Recherche en Électrotechnique et Automatique du Havre) EA 3220 fait partie de l’Université du Havre et se spécialise dans le génie électrique et l’automatique. Il accueille des enseignants-chercheurs de la 61ème et la 63ème sections du CNU.', 'https://cream.univ-rouen.fr/', 'CREAM_labo.png');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_utilisateur` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL DEFAULT '1',
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`id_utilisateur`, `id_projet`, `admin`) VALUES
(1, 1, 1),
(18, 1, 0),
(19, 1, 0),
(20, 1, 0),
(21, 1, 0),
(22, 1, 0),
(22, 6, 0),
(23, 1, 0),
(23, 6, 0),
(24, 1, 0),
(25, 1, 0),
(26, 1, 1),
(26, 6, 1),
(26, 7, 1),
(26, 8, 1),
(27, 1, 0),
(29, 1, 0),
(29, 6, 0),
(30, 1, 0),
(31, 1, 0),
(31, 6, 0),
(32, 1, 0),
(32, 6, 0),
(33, 1, 0),
(34, 1, 0),
(35, 1, 0),
(36, 1, 0),
(36, 6, 0),
(37, 1, 0),
(38, 1, 0),
(39, 1, 0),
(40, 1, 0),
(41, 1, 0),
(41, 6, 0),
(42, 1, 0),
(42, 6, 0),
(43, 1, 0),
(44, 1, 0),
(45, 1, 0),
(46, 1, 0),
(46, 6, 0),
(47, 1, 0),
(47, 6, 0),
(49, 1, 1),
(49, 6, 0),
(50, 1, 0),
(51, 1, 0),
(52, 1, 0),
(53, 1, 0),
(53, 6, 0),
(54, 1, 0),
(55, 1, 0),
(56, 1, 0),
(57, 1, 0),
(58, 1, 0),
(59, 1, 0),
(60, 1, 0),
(61, 1, 0),
(62, 1, 0),
(63, 1, 0),
(64, 1, 0),
(65, 1, 0),
(66, 1, 0),
(68, 1, 0),
(69, 1, 0),
(71, 1, 0),
(71, 6, 0),
(72, 1, 0),
(73, 1, 0),
(74, 1, 0),
(75, 1, 0),
(76, 1, 0),
(76, 6, 0),
(77, 1, 0),
(77, 6, 0),
(78, 1, 0),
(79, 1, 0),
(80, 1, 0),
(81, 1, 0),
(82, 1, 0),
(83, 1, 0),
(84, 1, 0),
(85, 1, 0),
(86, 1, 0),
(87, 1, 0),
(88, 1, 0),
(89, 1, 0),
(90, 1, 0),
(91, 1, 0),
(92, 1, 1),
(114, 1, 1),
(115, 6, 0),
(116, 1, 1),
(127, 1, 0),
(128, 1, 0),
(129, 6, 0),
(132, 6, 0),
(133, 7, 1),
(134, 1, 0),
(134, 6, 0),
(135, 1, 1),
(135, 7, 1),
(136, 6, 1),
(137, 1, 1),
(137, 7, 1),
(138, 1, 1),
(138, 8, 1),
(139, 6, 0),
(140, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(255) NOT NULL,
  `abreviation_projet` text NOT NULL,
  `resume_projet` text,
  `date_debut_projet` date DEFAULT NULL,
  `date_fin_projet` date DEFAULT NULL,
  `logo_projet` varchar(500) DEFAULT NULL,
  `media_projet` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `abreviation_projet`, `resume_projet`, `date_debut_projet`, `date_fin_projet`, `logo_projet`, `media_projet`) VALUES
(1, 'classe2', 'Corridors Logistiques : Application à la vallée de Seine et son environnement Phase-2', 'fr§CLASSE succède aux projets du GRR LMN « Passage Portuaire », « Amélioration de la performance logistique globale » et « CLASSE phase 1 », labellisé par le Pôle de Compétitivité Novalog (novembre 2014). Au fur et à mesure des travaux conduits, l’interdisciplinarité et les collaborations inter-établissements se sont développées. Cette collaboration est matérialisée par la Structure Fédérative en Logistique (SFLog) de l’université du Havre, labellisée par le ministère, qui a vocation à regrouper les différents laboratoires actifs dans le domaine de la logistique.;\r\nen§CLASSE succeeds the GRR LMN "Passage Portuaire", "Improvement of overall logistics performance" and "CLASS phase 1" projects, certified by the Novalog Competitiveness Cluster (November 2014). As work has progressed, interdisciplinarity and inter-institutional collaborations have developed. This collaboration is materialized by the Federative Structure in Logistics (SFLog) of the University of Le Havre, labeled by the Ministry, which aims to bring together the various laboratories active in the field of logistics.;en:CLASSE succeeds the GRR LMN "Passage Portuaire", "Improvement of overall logistics performance" and "CLASS phase 1" projects, certified by the Novalog Competitiveness Cluster (November 2014). As work has progressed, interdisciplinarity and inter-institutional collaborations have developed. This collaboration is materialized by the Federative Structure in Logistics (SFLog) of the University of Le Havre, labeled by the Ministry, which aims to bring together the various laboratories active in the field of logistics.;', '2015-09-01', '2019-09-30', 'classe2_projet.png', 'classe2_media.jpg'),
(5, 'devport', 'Devport : Recherche en géographie, aménagement et économie maritime, portuaire et logistique', 'fr§Le projet Devport regroupe un réseau de chercheurs travaillant sur les problématiques du transport et de la logistique ainsi que sur les impacts de ces activités. Il s’appuie sur un Système d’Informations Géographiques (SIG) géoéconomique, sur le fonctionnement logistique de la vallée de la Seine et plus largement de l’Europe. Ce SIG s\'organise à ce jour autour de deux axes : \r\n- une interface terrestre qui permet d\'évaluer l\'organisation logistique de l\'espace et des différentes parties prenantes,\r\n- une interface maritime pour l\'analyse de la circulation maritime et l\'évaluation des aléas du transport maritime.;\r\nen§The Devport project brings together a network of researchers working on transport and logistics issues and the impacts of these activities. It is based on a geoeconomic Geographical Information System (GIS), on the logistical functioning of the Seine Valley and more broadly of Europe. This GIS is currently organized around two axes: \r\n- a terrestrial interface which makes it possible to evaluate the logistical organization of the space and the different stakeholders,\r\n- a maritime interface for the analysis of the maritime circulation and the assessment of the hazards of maritime transport.', '2011-09-01', NULL, 'Devport_projet.jpg', 'devport_media.jpg'),
(6, 'fuma', 'Futur de la marchandise : vers une chaine logistique « Glocale »', 'fr§Nous étudions dans ce projet comment certains territoires de l’interface « Terre-Mer », telle que la Normandie, ont la nécessité de repenser la gestion des flux de marchandises afin de rester compétitifs face à deux échelles d’exigence :\r\n-  Être capable d’accompagner l’accélération du commerce mondial via le gigantisme de la containerisation des marchandises, des infrastructures portuaires en pleine mutation technologique, numérique, écologique et du transport devant être plus fluide, sécurisé et intelligent ;\r\n- Être capable d’accompagner une nouvelle exigence des consommateurs qui demandent la traçabilité des marchandises et qui adhèrent de plus en plus aux circuits de redistributions locaux. A cette échelle, la production locale des produits de la mer et de la terre a besoin de disposer de processus de contrôle de leurs flux logistiques très éparpillés sur le territoire pour ne pas se mettre dans des situations de vulnérabilité trop souvent rencontrées aujourd’hui. ', '2019-09-02', '2022-08-31', 'Futur de la marchandise_projet.png', 'Futur de la marchandise_media.png'),
(7, 'mocub', 'Modélisation des comportements et des usages sur blockchain', '', '2020-09-01', '2022-08-31', 'MOCUB_projet.png', 'MOCUB_media.png'),
(8, 'data-platform', 'Plateforme de données AIS', '', '2020-04-01', NULL, 'Plateforme de données_projet.', 'Plateforme de données_media.');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `statut_utilisateur` enum('Enseignant(e)/Chercheur(euse)','Doctorant(e)','Post-Doctorant(e)','Ingénieur(e) d''étude','Ingénieur(e) de recherche','Stagiaire','Invité(e)','Gestionnaire') DEFAULT NULL,
  `etablissement_utilisateur` varchar(255) NOT NULL,
  `mission_utilisateur` varchar(1024) DEFAULT NULL,
  `photo_utilisateur` varchar(500) DEFAULT NULL,
  `site_utilisateur` varchar(500) DEFAULT NULL,
  `mail_utilisateur` varchar(255) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `token_utilisateur` varchar(255) DEFAULT NULL,
  `expiration_token_utilisateur` varchar(128) DEFAULT NULL,
  `super_admin` int(11) NOT NULL DEFAULT '0',
  `portrait_utilisateur` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `statut_utilisateur`, `etablissement_utilisateur`, `mission_utilisateur`, `photo_utilisateur`, `site_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`, `token_utilisateur`, `expiration_token_utilisateur`, `super_admin`, `portrait_utilisateur`) VALUES
(1, 'PLAISSY', 'Norvan', 'Stagiaire', 'Université Le Havre Normandie', NULL, NULL, NULL, 'nonoplaissy@hotmail.fr', '01c043a5a2f53f484b4447e3b132739d30066973', 'n25ZNmIpy0eAMj1uj1wlq7t9KR7f5Elh', '2020-05-06 11:47:22', 0, NULL),
(18, 'MATHIEU', 'Hervé', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'herve.mathieu@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(19, 'AMANTON', 'Laurent', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', NULL, NULL, NULL, 'laurent.amanton@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(20, 'BALEV', 'Stefan', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'stefan.balev@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(21, 'BELFKIH', 'Abderrahmen', 'Post-Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'abderrahmen.belfkih@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(22, 'BOUKACHOUR', 'Hadhoum', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'hadhoum.boukachour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(23, 'COLIN', 'Jean-Yves', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'jean-yves.colin@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(24, 'DEMARE', 'Thibault', 'Post-Doctorant(e)', 'Université Le Havre Normandie', '', 'thibaut.demare@gmail.com_avatar.jpg', '', 'thibault.demare@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(25, 'DUTOT', 'Antoine', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'antoine.dutot@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(26, 'DUVALLET', 'Claude', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'claude.duvallet@univ-lehavre.fr_avatar.jpg', 'http://litis.univ-lehavre.fr/~duvallet', 'claude.duvallet@univ-lehavre.fr', 'c857d09db23e6822e3600bc06ad8d58f92ed62bc8efd81c753f77048662cb97d', 'G2g7A1q9Ru48YcODwSzHK9vyhBQjvkAE', '2021-03-14 17:19:51', 1, ''),
(27, 'FOURNIER', 'Dominique', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'dominique.fournier@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(29, 'GRIEU', 'Jean', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'jean.grieu@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(30, 'GUINAND', 'Frédéric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'frederic.guinand@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(31, 'LECROQ', 'Florence', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'florence.lecroq@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(32, 'NAKECHBANDI', 'Moustafa', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'moustafa.nakechbandi@univ-lehavre.fr_avatar.jpg', '', 'moustafa.nakechbandi@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(33, 'PERSON', 'Patrick', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'patrick.person@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(34, 'VERNET', 'Mathilde', 'Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'mathilde.vernet@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(35, 'SERIN', 'Frédéric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'frederic.serin@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(36, 'SANLAVILLE', 'Éric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'eric.sanlaville@univ-lehavre.fr_avatar.jpg', '', 'eric.sanlaville@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(37, 'ALKHARBOUTLY', 'Mira', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'mira.alkharboutly@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(38, 'BOUAFIA', 'Mousaab', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'mousaab.bouafia@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(39, 'DIARRASSOUBA', 'Ibrahima', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'ibrahima.diarrassouba@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(40, 'HEMMIDY', 'Mohammed', 'Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'mohammed.hemmidy@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(41, 'JONCOUR', 'Cédric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'cedric.joncour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(42, 'LOYAL', 'Sophie', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'sophie.loyal@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(43, 'ROUKY', 'Naoufal', 'Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'naoufal.rouky@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(44, 'TFAILI', 'Sara', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'sara.tfaili@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(45, 'YASSINE', 'Adnan', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'adnane.yassine@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(46, 'BOUDEBOUS', 'Dalila', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'dalila.boudebous@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(47, 'BOUKACHOUR', 'Jaouad', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', 'Mes recherches traitent tout particulièrement de l\'optimisation, la modélisation et de la simulation avec des applications en logistique. Plus spécifiquement, les sujets portent sur les problèmes d\'ordonnancement, les problèmes de transport, la logistique portuaire, la traçabilité et la gestion des risques, la multimodalité. L\'activité de R&D fait l\'objet de financements récurrents par le CPER, a bénéficié pour certains projets d\'une labellisation par le pôle normand de compétitivité en logistique, et donne lieu à l\'établissement de partenariats industriels', 'jaouad.boukachour@univ-lehavre.fr_avatar.jpg', 'https://sites.google.com/site/boukachour/', 'jaouad.boukachour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(48, 'BENABDELHAFID', 'Abdellatif', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'abdellatif.benabdelhafid@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(49, 'BARON', 'Marie-Laure', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', NULL, 'marie-laure.baron@univ-lehavre.fr_avatar.jpg', NULL, 'marie-laure.baron@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', 'VjCpxH2JyLeMqsdYgHNEbtAqDX4tDs6G', '2020-09-04 16:48:08', 0, ''),
(50, 'BOUTIGNY', 'Erwan', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'erwan.boutigny@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(51, 'CAPO', 'Claire', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'claire.capo@univ-lehavre.fr_avatar.jpg', '', 'claire.capo@univ-lehavre.fr', 'cad6f4b8ca0b82c7a9e7f8d8bc1b81194d855d5a', 'B0AE3FGH4URqB4TTaIPxKBLsod7qUQ5x', '2019-03-21 11:40:18', 0, NULL),
(52, 'GRANDVAL', 'Samuel', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'samuel.grandval@univ-lehavre.fr', '6ca26b65de39c35bf96e2b420f28cde07140fd28', NULL, NULL, 0, NULL),
(53, 'GUERIN', 'Frank', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'frank.guerin@univ-lehavre.fr_avatar.jpg', '', 'frank.guerin@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(54, 'KAUFMANN', 'Antoine', 'Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'antoine.kaufmann@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(55, 'NIMTRAKOOL', 'Kanyarat', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'kanyarat.nimtrakool@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(56, 'AUBOURG', 'Nathalie', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'nathalie.aubourg@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(57, 'AISSAOUI', 'Sonia', 'Doctorant(e)', 'Université Le Havre Normandie', '', 'sonia.aissaoui@univ-lehavre.fr_avatar.jpg', '', 'sonia.aissaoui@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(58, 'TAGHIPOUR', 'Atour', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'atour.taghipour@univ-lehavre.fr_avatar.jpg', '', 'atour.taghipour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(59, 'BARZMAN', 'John', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'john.barzman@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(60, 'DEPREZ', 'Samuel', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'samuel.deprez@univ-lehavre.fr_avatar.JPG', '', 'samuel.deprez@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(61, 'DEMOYER', 'Emilie', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'emilie.demoyer@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(62, 'JOLY', 'Olivier', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'olivier.joly@univ-lehavre.fr_avatar.jpg', '', 'olivier.joly@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', 'jmwvDH05Byk2HKsfnkDaRcMqaDA5mDbO', '2019-03-26 15:32:10', 0, NULL),
(63, 'SERRY', 'Arnaud', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', 'Le projet doit ainsi produire des données exploitables tant par les chercheurs que par les opérateurs économiques et produire des résultats relatifs au fonctionnement du corridor à la fois pour la logistique massifiée et pour la logistique urbaine\r\nNous développons une plateforme de recherche pour l’analyse de la circulation maritime et l’évaluation des aléas du transport maritime (CIRMAR). La plateforme permet de reconstituer les itinéraires des navires transportant des marchandises en utilisant les signaux AIS (Automatic Identification System). Cet outil s’intègre dans un SIG maritime qui vient notamment s’interfacer avec le SIG terrestre « Axe Seine » qui a été mis en œuvre dans le cadre du programme passage portuaire 2011-2012. ', NULL, NULL, 'arnaud.serry@univ-lehavre.fr', '81dc31279b5ebee2c47ff8eff177ddcec0e80d70', NULL, NULL, 0, NULL),
(64, 'LEVEQUE', 'Laurent', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'laurent.leveque@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(65, 'STECK', 'Benjamin', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'benjamin.steck@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(66, 'KHEMMAR', 'Redouane', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'redouane.khemmar@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(68, 'RAJABI', 'Aboozar', 'Ingénieur(e) de recherche', 'Université Le Havre Normandie', '', 'aboozar.rajabi@univ-lehavre.fr_avatar.jpg', '', 'aboozar.rajabi@univ-lehavre.fr', 'e787dcefcb2979329a196984cbd88d8c5aad8566', NULL, NULL, 0, NULL),
(69, 'KERBERIOU', 'Ronan', 'Ingénieur(e) d\'étude', 'Université Le Havre Normandie', NULL, 'ronan.kerberiou@univ-lehavre.fr_avatar.jpg', NULL, 'ronan.kerberiou@univ-lehavre.fr', '29be4743435b164f21f04b2b46fc7a7d4a028270', NULL, NULL, 0, NULL),
(71, 'BENAINI', 'Abdelhamid', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'abdelhamid.benaini@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(72, 'ABDULRAB', 'Habib', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', NULL, NULL, NULL, 'habib.abdulrab@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(73, 'ITMI', 'Mhamed', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', '', NULL, '', 'mhamed.itmi@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(74, 'BAILLY-HASCOËT', 'Valérie', 'Ingénieur(e) de recherche', 'IDIT', '', 'VBAILLY-HASCOET@idit.asso.fr_avatar.jpg', 'http://www.idit.fr', 'vbailly-hascoet@idit.asso.fr', 'c6b8f3d97ce3740b60b5efe41d9adcad1d4dfd822a327e1c952254bec168faf2', 'okKDbY1uFJWgIqI1NsZtvjczbKLRYgH8', '2019-12-20 18:06:06', 0, NULL),
(75, 'BONJOUR', 'Gaëlle', 'Ingénieur(e) de recherche', 'IDIT', '', 'GBONJOUR@idit.asso.fr_avatar.jpg', 'http://www.idit.fr', 'gbonjour@idit.asso.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(76, 'COUTURIER', 'Ludovic', 'Ingénieur(e) de recherche', 'IDIT', '', 'lcouturier@idit.asso.fr_avatar.jpg', 'http://www.idit.fr', 'lcouturier@idit.asso.fr', '1ce791926dd5b1d8673b6436077422045823a4eaeb6d057269d6fa74220b84dd', 'as9UiJNOX9k75yRvOLI0ItDxFPo81iS0', '2019-12-20 18:11:43', 0, NULL),
(77, 'BISIAUX', 'Christophe', 'Ingénieur(e) de recherche', 'Université Le Havre Normandie', '', NULL, '', 'christophe.bisiaux@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(78, 'FOURATI', 'Sonia', NULL, 'INSA Rouen Normandie', NULL, 'sonia.fourati@insa-rouen.fr_avatar.jpg', NULL, 'sonia.fourati@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(79, 'KNIPPEL', 'Arnaud', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', '', 'arnaud.knippel@insa-rouen.fr_avatar.jpg', '', 'arnaud.knippel@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(80, 'BECUWE', 'Leonore', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'leonore.becuwe@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(81, 'FADWA', 'Abbes', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'abbes.fadwa@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(82, 'SAUNIER', 'Julien', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', '', NULL, '', 'julien.saunier@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(83, 'OUCHENNE', 'Boulares', 'Post-Doctorant(e)', 'INSA Rouen Normandie', NULL, NULL, NULL, 'boulares.ouchenne@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(84, 'POLETAEVA', 'Tatiana', 'Post-Doctorant(e)', 'INSA Rouen Normandie', NULL, NULL, NULL, 'tatiana.poletaeva@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(85, 'EL GHOSH', 'Mirna', 'Post-Doctorant(e)', 'INSA Rouen Normandie', NULL, 'mirna.elghosh@insa-rouen.fr_avatar.jpg', NULL, 'mirna.elghosh@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(86, 'DYDYCHKIN', 'Aleksandr', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'aleksandr.dydychkin@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(87, 'LIN', 'Yuhao', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'yuhao.lin@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(88, 'AOUES', 'Younes', NULL, 'INSA Rouen Normandie', NULL, NULL, NULL, 'younes.aoues@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(89, 'SOUZA', 'Eduardo', NULL, 'INSA Rouen Normandie', NULL, NULL, NULL, 'eduardo.souza@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(90, 'LABRECHE', 'Mustapha', NULL, 'INSA Rouen Normandie', NULL, NULL, NULL, 'mustapha.labreche@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(91, 'OMAR TALAN', 'Abdoulsam', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'abdoulsam.omartalan@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 0, NULL),
(92, 'THENARD', 'Clément', 'Stagiaire', 'Université Le Havre/Normandie', '', 'clement76110@gmail.com_avatar.jpg', 'http://clementthenard.fr', 'clement76110@gmail.com', '5b66c96a1e8324beaf3331fba02c9d124281f66bf95c3bfa8cb93820da307667', '2fUZTbXdbihCEMGHaCNCIWCriulJEk2S', '2019-11-29 17:04:39', 0, ''),
(114, 'GUILLAUME', 'Dorian', 'Stagiaire', 'Université Le Havre Normandie', '', '', 'http://google.fr', 'dorianguillaume@gmail.com', '6e4ae039e66d2b374311fbaf24a47cb50ff1439764a4a4df33967481e28b2c25', NULL, NULL, 0, NULL),
(115, 'CHAUVIN', 'Christophe', 'Invité(e)', 'Pôle de compétitivité NOVALOG', '', 'cchauvin@novalog.eu_avatar.jpg', 'http://www.novalog.eu/', 'cchauvin@novalog.eu', '5c2c31ce365d88b4005caae453c45aeb5724c3c7b7a20d16e92036725665f2b8', NULL, NULL, 0, NULL),
(116, 'RIBET', 'Pierre', 'Stagiaire', 'Université Le Havre Normandie', '<p>okokok</p>', 'pierre.ribet@etu.univ-lehavre.fr_avatar.PNG', '', 'pierre.ribet@etu.univ-lehavre.fr', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', NULL, NULL, 0, ''),
(118, 'GLOAGUEN', 'Simon', 'Stagiaire', 'Université Le Havre Normandie', '', 'simon.gloaguen@etu.univ-lehavre.fr_avatar.jpg', '', 'simon.gloaguen@etu.univ-lehavre.fr', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', NULL, NULL, 0, ''),
(127, 'SAUTREL', 'Louis', 'Gestionnaire', 'Université Le Havre Normandie', '', 'louis.sautrel@univ-lehavre.fr_avatar.jpeg', '', 'louis.sautrel@univ-lehavre.fr', '168ead8584b00a40d105fee16a5068e96e034cde5bb3b37df1da3efeb376a650', NULL, NULL, 0, NULL),
(128, 'ARNOUX', 'Vincent', 'Gestionnaire', 'INSA Rouen Normandie', '', 'vincent.arnoux@insa-rouen.fr_avatar.jpg', '', 'vincent.arnoux@insa-rouen.fr', '4deadc3d21cc301eed239b565810580d5c4b4925da213b3adcf60909dadd9526', NULL, NULL, 0, NULL),
(129, 'LEBOSSE', 'Thibault ', 'Invité(e)', 'Université Le Havre Normandie', '', '', '', 'thibault.lebosse@etu.univ-lehavre.fr', 'ca75819cada8553113205db8175de9b6e1d634181efae7e6c690d61ef7a65cbc', NULL, NULL, 0, NULL),
(132, 'OLIVIER', 'Damien', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', '', '', 'damien.olivier@univ-lehavre.fr', '6d3ad600449950b3a6584fd9c1177d2aaff14193a71b7b003eac8f55e28ae693', NULL, NULL, 0, NULL),
(133, 'BERTELLE', 'Cyrille', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', NULL, NULL, '', 'cyrille.bertelle@univ-lehavre.fr', '2baa615f5a6f806951155f73274b20ec2107bf049e6758cd2a14a305241f69ec', NULL, NULL, 0, NULL),
(134, 'BAUDRY', 'Julien', 'Ingénieur(e) de recherche', 'Université Le Havre Normandie', NULL, NULL, '', 'julien.baudry@univ-lehavre.fr', '1b425644c513142148b2a4f1e9fa89732cc627930783c0a48ae1a0021f43aa81', 'Ja3i6RbyBHtqjdR721UuGRkEkf7qJEOj', '2020-03-12 16:26:30', 0, NULL),
(135, 'CASTET', 'Camille', 'Stagiaire', 'Université Le Havre Normandie', '', '', '', 'camille.castet@etu.univ-lehavre.fr', '3f56e90b04e7a4b50e3ec2446c13055e9cb1d0851c17c9ce8a52ea3ca76623cc', NULL, NULL, 1, NULL),
(136, 'IMINE', 'Chaourar', 'Stagiaire', 'Université Le Havre Normandie', '', '', '', 'imine.chaourar07@gmail.com', '24fa260191b0400daf42dc7e7f06a4d3bfe28fc13a9f2c64209c5aa53a746d81', NULL, NULL, 1, NULL),
(137, 'LACHEB', 'Idir', 'Stagiaire', 'Université Le Havre Normandie', '', '', '', 'idir.lacheb23@gmail.com', '5a6c3a2ace9d99745aeef8e7aa8ea40216ae6695ec589e8e9cf77c75f512b840', NULL, NULL, 1, NULL),
(138, 'MERZOUK', 'Yugurten', 'Stagiaire', 'Université Le Havre Normandie', '', '', '', 'yugurten.merzouk@etu.univ-lehavre.fr', '146cf9dedd41b61b40ef0840953b7104baeb7e8c851675f31f7326a01bd365fd', 'm6eamOdoh72jhKVfPdBW8XDCH1feJZpR', '2020-05-27 01:37:46', 0, NULL),
(139, 'CONDOR', 'Roland', 'Enseignant(e)/Chercheur(euse)', 'EM Normandie', NULL, NULL, '', 'rcondor@em-normandie.fr', '9f45aa99ad9ab5c822155c4a44f9d64d010faeaea76468a939d2d4f046e340bd', NULL, NULL, 0, NULL),
(140, 'BARBAN', 'Patrick', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'patrick.barban@univ-lehavre.fr_avatar.', '', 'patrick.barban@univ-lehavre.fr', '23ddda4810068cc44360dffd31b6c5a9ad13fb9e6a69c9354a5d1b07f1b9843f', NULL, NULL, 1, NULL);

--
-- Déclencheurs `utilisateur`
--
DELIMITER $$
CREATE TRIGGER `automation insert into` AFTER INSERT ON `utilisateur` FOR EACH ROW INSERT INTO participer (id_utilisateur)
SELECT MAX(id_utilisateur)
FROM utilisateur
$$
DELIMITER ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD KEY `appartenir_ibfk_1` (`id_laboratoire`),
  ADD KEY `appartenir_ibfk_2` (`id_projet`);

--
-- Index pour la table `etudier`
--
ALTER TABLE `etudier`
  ADD KEY `etudier_ibfk_1` (`id_laboratoire`),
  ADD KEY `etudier_ibfk_2` (`id_utilisateur`);

--
-- Index pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD PRIMARY KEY (`id_laboratoire`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_utilisateur`,`id_projet`),
  ADD KEY `id_projet` (`id_projet`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  MODIFY `id_laboratoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`);



--
-- Base de données :  `classe2`
--
CREATE DATABASE IF NOT EXISTS `classe2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `classe2`;

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `numero_action` int(11) NOT NULL,
  `nom_action` varchar(255) NOT NULL,
  `media_action` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`id_action`, `numero_action`, `nom_action`, `media_action`) VALUES
(0, 0, 'Pilotage du projet.', ''),
(1, 1, 'Constituer une base de données sur l’Axe Seine (Région Normandie, IDF, éventuellement Picardie) en reliant le trafic maritime au trafic terrestre.', 'https://www.youtube.com/v/0BZJuh9y9-I&t=4s;'),
(2, 2, 'Imaginer des organisations collectives performantes et innovantes et gouverner la chaîne logistique', NULL),
(3, 3, 'Concevoir des modèles de représentation du corridor à différentes échelles, du nœud portuaire à la plateforme multimodale jusqu’au corridor pour simuler l’activité et l’optimiser.', ''),
(4, 4, 'Utiliser les systèmes d’information pour fluidifier le trafic et contribuer à l’intégration d’acteurs hétérogènes.', 'https://youtube.com/v/G95etgj1R1M;'),
(5, 5, 'Appréhender la vulnérabilité des chaînes logistiques.', 'https://www.youtube.com/v/tMFvZej_ikk&t=7s;https://www.youtube.com/v/xfkpxvz3-7A;');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(11) NOT NULL,
  `type_actualite` enum('Article','Événement') NOT NULL,
  `titre_actualite` varchar(255) NOT NULL,
  `description_actualite` text NOT NULL,
  `resume_actualite` varchar(500) NOT NULL,
  `lien_actualite` varchar(500) DEFAULT NULL,
  `date_actualite_debut` date NOT NULL,
  `date_actualite_fin` date DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `type_actualite`, `titre_actualite`, `description_actualite`, `resume_actualite`, `lien_actualite`, `date_actualite_debut`, `date_actualite_fin`, `id_utilisateur_detail`) VALUES
(1, 'Événement', 'Journée de restitution du projet CLASSE (3)', '<p>&nbsp;</p><h2>Programme&nbsp;</h2><p><strong>08h45 : Accueil café</strong></p><p>09h00 : Point à date du projet</p><p>09h15 : Présentation du site internet CLASSE (Norvan Plaissy), Plateforme de données (Claude Duvallet).</p><p>09h45 : Signaux AIS (Claude Duvallet)</p><p><strong>10h00 : Pause café&nbsp;</strong></p><p><strong>10h15: Exploitation des données AIS, Gestion de l’accostage des navires (Abderrahmen Belfikh).&nbsp;</strong></p><p>10h40 : Typologie des risques liés au transport dans un corridor logistique : Base de connaissances issue du contentieux judiciaire lié au trafic via les ports de l’axe Seine. (Valérie Bailly-Hascoet, IDIT, Action 5).</p><p>11h00 : Alliances, faillite et risque armateurs (Action 5)</p><p>11h15 : Les flux dans les modèles dynamiques (Mathilde Vernet)</p><p>11h35 : Thibaut Démarre</p><p>11h55 : Bilan des travaux du LITIS.</p><p><strong>12h00 : Déjeuner à la brasserie du CROUS.&nbsp;</strong></p><p><strong>13h45 : Bilan LMAH</strong></p><p>14h00 : Résultats de la recherche INSA</p><p>14h20 : Bilan NIMEC, entrepreneuriat collectif et gouvernance. &nbsp;Présentation Samuel Grandval</p><p>14h40 : Compte rendu de la visite des ports d’Anvers et Rotterdam (Olivier Joly)</p><p>15h00 : Ports et corridors Africains, un état des lieux (Benjamin Steck)&nbsp;</p><p>15h20 : Pause café</p><p><strong>15h40 : Discussion : valorisation et perspectives.&nbsp;</strong></p><p><br>&nbsp;</p><p><strong>Lieu :&nbsp;UFR Sciences et Techniques, &nbsp;Université Le Havre Normandie, Amphithéâtre Normand.&nbsp;</strong></p>', 'Programme de la journée ', '', '2018-07-02', NULL, 123),
(2, 'Événement', 'Journée de restitution du projet CLASSE (2)', '<h2><strong>Programme</strong></h2><ul><li><strong>8h30&nbsp;: Accueil café</strong></li><li>9h&nbsp;: Avancement du projet et présentation de la journée ML Baron</li><li>9h30-9h45&nbsp;: L’apport des technologies du virtuel à la formation en logistique (Action 5.5.,J. Grieu, F Lecroq, H. Boukachour, Action 5).</li><li>9h45-10h&nbsp;: Développer des systèmes interopérables pour faciliter le commerce et la logistique (M.Itmi-INSA, J. Verny Neoma RBS, L. Couturier, IDIT, Action5)</li><li>10h-10h15&nbsp;: L’influence du consommateur sur la chaîne logistique (C. Capo, F. Guérin, Action 2)</li></ul><p>&nbsp;</p><p><strong>10h15-10h30 : Pause café&nbsp;</strong></p><ul><li><strong>10h30-11h00: Développement de la plateforme de données sur l’axe Seine</strong> : informations acquises et partage des données pour produire des analyses (A. Serry, C. Duvallet, A. Rajabi,R. Kerbiriou, Action 1, ULH).</li><li>11h-11h15&nbsp;: Typologie des risques liés au transport dans un corridor logistique : Base de connaissances issue du contentieux judiciaire lié au trafic via les ports de l’axe Seine.( Valérie Bailly-Hascoet, IDIT, Action 5).</li><li>11h15-11h30 : La modélisation des escales de navires (Abderrahmen Befikh, Action 1).</li><li>11h30-11h45&nbsp;: Quelle réalité du corridor logistique ? Une analyse de l’évolution des entreprises havraises, 2009-2016 (Marie-Laure Baron, Action 2.3).</li><li>11h45-12h00 : le rôle des transitaires dans l’affectation des flux.</li></ul><p><strong>12h : Pause déjeuner</strong></p><p><strong>13h : L’apport des SI au corridor logistique (INSA, ULH)</strong></p><p>13h-13h15 : L’ontologie d’un système inter-organisationnel (H. Abdulrab, INSA)</p><p>13h15-13h30 : L’apport de l’internet physique à la gestion d’un corridor logistique (H. Mathieu, M. Nakechbandi, J-Y Colin). &nbsp;</p><p><strong>13h30: Des flux massifiés au dernier kilomètre, la logistique urbaine</strong></p><p>13h30-13h45 : La mutualisation de la logistique urbaine (K. Nimtrakool, C. Capo, S. Grandval).&nbsp;</p><p>13h45-14h : Géographie des flux du e-commerce (Emilie Demoyer, S. Deprez)&nbsp;</p><p>14h-14h15 : Proximité et mesure des performances.&nbsp;</p><p>14h15-14h30 Relations entre acteurs et décision dans les réseaux logistiques (A. Taghipour).&nbsp;</p><p><strong>PAUSE CAFE</strong></p><p><strong>14h:45 Appréhender le corridor logistique</strong></p><p>14h45-15h : Quelle gouvernance du corridor logistique ? (Antoine Kauffmann, F. Guérin, S. Grandval, Action 2.3.).&nbsp;</p><p>15h-15h15&nbsp;: Vie et mort d’une industrie en lien avec l’activité portuaire (Nathalie Aubourg/Samuel Grandval, Action 2.3).</p><p><strong>15h15 : Modéliser, simuler, optimiser un corridor (Action 3, INSA, ULH, EMN).&nbsp;</strong></p><p>Présentation des travaux (dont A. Knippel) par A. Yassine, E. Sanlaville.&nbsp;</p><p>&nbsp;15h20-15h35 : Le transfert de voitures neuves sur le terminal roulier, Hamdi Dkhil, LMAH).&nbsp;</p><p>15h35-15h50: Le Dimensionnement d\'une plateforme multimodale (Mohamed Hemmidy, LMAH).</p><p>15h50&nbsp;: Optimisation et Simulation du Transport Multimodal des Conteneurs (Naoufal Rouky, LMAH)</p><p>15h30 : Clôture de la journée</p>', 'Programme de la journée  ', '', '2017-10-27', NULL, 123),
(3, 'Événement', 'Journée de restitution du projet CLASSE (1)', '<h2>Programme&nbsp;</h2><ul><li>8h45&nbsp;: Accueil café</li><li>9h15-10h&nbsp;: Point administratif, Louis Sautrel, Julien Baudry, ML Baron</li></ul><h3>10h&nbsp;: Présentation des travaux de l’Action 1&nbsp;: Plateforme de données</h3><p>10h-10h30 : «CIRMAR : Acquisition, décodage et stockage des données des données AIS », Claude Duvallet et Aboozar Rajabi (LITIS).&nbsp;</p><p><strong>10h30&nbsp;:&nbsp;Action 2, Innovation organisationnelle</strong></p><p>10h30-10h50 : « Les facteurs d’adhésion à un centre de consolidation urbaine en tant qu’innovation inter-organisationnelle : les cas de Bristol-Bath et de St Etienne ». &nbsp;Kanyarat Nimtrakool, Samuel Grandval et Claire Capo, NIMEC.</p><p>10h50-11h10 : «&nbsp;La gouvernance collective, application au corridor logistique&nbsp;», Antoine Kauffmann, Frank Guerin et Samuel Grandval, NIMEC.</p><p>11h10-11h30&nbsp;: «&nbsp;Dynamique de l’Ecosystème d’affaires logistique du corridor, essais de mesure&nbsp;». Marie-Laure Baron, NIMEC.</p><p>Action 3, modèles multi-échelles</p><p>11h30-11h50 : « Exportation des pommes de terre de l’axe Seine : modélisation ».</p><h2>11h50 : Action 3, modèles multi-échelles&nbsp;</h2><p>11h50-12h15&nbsp;: Adnan Yassine, Eric Sanlaville, Arnaud Knippel, point des travaux Action 3 (LMAH, LITIS, LMI,LMN)</p><p><strong>Pause déjeuner</strong> : <strong>12h15/13h30</strong></p><p>13h30-13h45 :«Le dimensionnement d’une plateforme multimodale », Mohamed Hemmidy, LMAH.&nbsp;</p><p>13h45-14h00 : « La Gestion d\'un terminal roulier », Hamdi DKHIL, LMAH.&nbsp;</p><p>14h-14h10&nbsp;: Sara Tfaili</p><p>14h20-14h40 : &nbsp;Thibaut Demarre</p><p>14h40-15h : K Deghdak</p><p><strong>15h : Action 4, Systèmes d’information</strong></p><h2>15h-15h20 : Tatyana Poletaeva « Enterprise knowledge management supported by cognitive agents: Application to Classe Project» (LITIS INSA)</h2><p><strong>15h20: Action 5, vulnérabilité de la chaîne logistique</strong></p><p>15h20-15h40&nbsp;: «&nbsp;Risques et avaries liées au transport dans un corridor logistique&nbsp;», premiers résultats issus d’une base de connaissances sur le contentieux lié au trafic sur l’axe Seine. Valérie Bailly-Hascoet, IDIT. (Action 5.1.)</p><p>15h40-16h "Transitaires, commissionnaires et &nbsp;organisateurs de transport : vecteurs de l’attractivité des ports normands pour la desserte de l’axe Seine ? \'\' (Olivier Joly, Marina&nbsp;</p><p>16h-16h15 : Un modèle de données sémantique pour la norme UN/Edifact -MM Boulares et Itmi – LITIS INSA.&nbsp;</p><p>16h15-16h30 : Les univers virtuels au service de la logistique (Thierry Galinho, Jean Grieu, Florence Lecroq, Hadoum Boukachour).&nbsp;</p><p>16h20 : Bilan de la journée, pause café.&nbsp;</p><p><strong>Lieu</strong> : Campus Logistique de l’université du Havre, Pôle Ingénieurs Logistique</p>', 'Programme de la journée  ', '', '2017-04-05', NULL, 123),
(4, 'Événement', 'Lancement de CLASSE 1 ', '<p>En septembre 2014, le site CLASSE 1 est mis en route, financé par la Région Haute Normandie et l\'État.</p>', 'Lancement du projet CLASSE 1', '', '2014-09-01', NULL, 10),
(5, 'Événement', 'Labellisation du projet CLASSE', '<p>En novembre 2014, le projet CLASSE est labellisé par l\'organisme Novalog.</p>', 'Labellisation du projet CLASSE ', '', '2014-11-01', NULL, NULL),
(6, 'Événement', 'Financement du projet CLASSE 2', '<p>https://www.univ-lehavre.fr/spip.php?article1295</p><p>&nbsp;</p><p>" &gt;</p><p>En Septembre 2015, le projet CLASSE 2 bénéficie d\'un financement FEDER (Fond Européen de Développement Régional).</p><p>Pour lire le communiqué de presse : <a href="https://www.univ-lehavre.fr/spip.php?article1295">https://www.univ-lehavre.fr/spip.php?article1295</a></p>', 'Financement du projet CLASSE 2 ', '', '2015-09-01', NULL, NULL),
(7, 'Événement', 'Réunion de lancement de CLASSE 2', '<p>Le 25 avril 2016, l\'équipe se rencontre lors d\'une réunion afin de parler du lancement de CLASSE 2.</p>', 'Réunion de lancement de CLASSE 2', '', '2016-04-25', NULL, NULL),
(8, 'Événement', 'Restitution du projet', '<p>Le 29 septembre 2015, la restitution du projet est faites à l\'Institut Supérieur d’Études Logistiques (ISEL).</p>', 'Restitution du projet ', '', '2016-09-29', NULL, NULL),
(9, 'Événement', 'Inauguration du Pôle Ingénieur Logistique ', '<p>Le 12 octobre 2016 a lieu l\'inauguration du Pôle Ingénieur Logistique, en présence de Nicole Klein (préfète de Normandie), Hervé Morin (président de Région) et Édouard Philippe (député-maire du Havre et président de la Codah).</p><p>Pour lire l\'article du Paris-Normandie consacré à cet évènement : <a href="https://www.paris-normandie.fr/actualites/economie/le-havre--le-pole-ingenieur-et-logistique-du-campus-est-dans-la-place-KE7107851">https://www.paris-normandie.fr/actualites/economie/le-havre--le-pole-ingenieur-et-logistique-du-campus-est-dans-la-place-KE7107851</a></p>', 'Inauguration du Pôle Ingénieur Logistique  ', '', '2016-10-12', NULL, NULL),
(10, 'Événement', 'Présentation du projet CLASSE 2 ', '<p>Le 12 octobre 2016, lors de l\'inauguration du PIL (Pôle Ingénieur Logistique), le projet CLASSE 2 est présenté au public.</p>', 'Présentation du projet CLASSE 2 au PIL ', '', '2016-10-12', NULL, NULL),
(11, 'Événement', 'Antoine Kauffmann aux RIRL', '<p>En septembre 2016, à Lausanne, Antoine Kauffmann se trouvait aux Rencontres Internationales de la Recherche en Logistique (RIRL).</p>', 'Antoine Kauffmann aux RIRL à Lausanne ', '', '2016-09-01', NULL, 10),
(12, 'Événement', 'Le projet Green Truck  ', '<p>Green Truck, un projet industriel en lien avec CLASSE 2, est lancé en janvier 2017 pour tester la traction électrique.</p>', 'Le projet Green Truck ', '', '2017-01-01', NULL, 10),
(13, 'Événement', 'Le projet SFM', '<p>Dans le cadre des PIA2 pilotés par l\'ADEME, le projet SFM (service ferroviaire de navettes modulaires), en lien avec CLASSE 2, démarre le 06 novembre 2018.</p>', 'Démarrage du projet SFM', '', '2018-11-06', NULL, 10),
(14, 'Événement', 'Le colloque GOL (4ème édition)', '<p>Pour sa 4ème édition, le colloque GOL (Gestion des Opérations Logistiques) s\'est tenu au Havre du 10 au 12 avril 2018.</p>', 'Le colloque GOL (4ème édition)', '', '2018-04-10', '2018-04-12', 10),
(15, 'Événement', 'Réunion de lancement de PORTERR ', '<p>Le 12 novembre 2018, se déroule la réunion de lancement du projet PORTERR (Ports et Territoire), projet Lauréat du Réseau d\'Intérêt National (RIN) Continuum Terre Mer de la région Normandie. Projet porté par Arnaud Serry (Action 1 de CLASSE 2).</p>', 'Réunion de lancement du projet PORTERR ', '', '2018-11-12', NULL, NULL),
(16, 'Événement', 'La Revue Marketing Territorial (RMT)', '<p>Le 24 janvier 2019, des équipes travaillent dans la perspective de soumettre à la Revue Marketing Territorial (RMT) pour un numéro spécial sur la ville du Havre.</p>', 'La Revue Marketing Territorial (RMT)', '', '2019-01-24', NULL, NULL),
(17, 'Événement', 'Le 20ème congrès ROADEF', '<p>Du 18 au 21 février 2019, s\'est déroulé au Havre, le 20ème congrès ROADEF ((Société Française de Recherche Opérationnelle et d’Aide à la Décision), organisé par le LMAH et le LITIS, université Le Havre Normandie.</p>', 'Le 20ème congrès ROADEF (Société Française de Recherche Opérationnelle et d’Aide à la Décision) ', '', '2019-02-19', '2019-02-21', 10),
(18, 'Événement', 'Bienvenue au Havre : les RIRL', '<p>Bienvenue au Havre ! Les RIRL, Rencontres Internationales de la Recherche en Logistique se tiendront au Havre en 2020.</p>', 'Rencontres internationales de la Recherche en Logistique', '', '2020-05-27', '2020-05-29', NULL),
(20, 'Événement', 'Restitution du projet CLASSE 2', '<p>Le 21 juin 2019, restitution du projet CLASSE 2</p>', 'Restitution du projet CLASSE 2', '', '2019-06-21', NULL, NULL),
(31, 'Événement', 'Journée consacrée à la vallée de la Seine', '<p>Le 07 février 2019 : le premier ministre, Edouard Philippe, annonce la nomination de Catherine Rivoalon, au poste de préfiguratrice de l\'établissement unique portuaire Haropa et la prolongation du CPIER dédié à la vallée de la Seine au delà de 2020.</p>', 'Journée consacrée à la vallée de la Seine par la délégation interministérielle à la vallée de la Seine', '', '2019-02-07', NULL, NULL),
(32, 'Événement', 'Le colloque GOL (5ème édition)', '', 'Le colloque GOL (5ème édition)', 'http://gol-conf.org/index.html', '2020-04-13', '2020-04-15', 123);

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

CREATE TABLE `illustrer` (
  `id_media` int(11) NOT NULL,
  `id_actualite` int(11) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `id_these` int(11) DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `illustrer`
--

INSERT INTO `illustrer` (`id_media`, `id_actualite`, `id_publication`, `id_these`, `id_action`) VALUES
(22, 5, NULL, NULL, NULL),
(25, 6, NULL, NULL, NULL),
(26, 8, NULL, NULL, NULL),
(27, 9, NULL, NULL, NULL),
(28, 6, NULL, NULL, NULL),
(44, 14, NULL, NULL, NULL),
(45, 18, NULL, NULL, NULL),
(46, 11, NULL, NULL, NULL),
(47, 31, NULL, NULL, NULL),
(50, 20, NULL, NULL, NULL),
(51, 17, NULL, NULL, NULL),
(52, 16, NULL, NULL, NULL),
(53, 4, NULL, NULL, NULL),
(54, 7, NULL, NULL, NULL),
(65, 31, NULL, NULL, NULL),
(71, 1, NULL, NULL, NULL),
(74, NULL, 64, NULL, NULL),
(75, NULL, 66, NULL, NULL),
(76, NULL, 67, NULL, NULL),
(77, NULL, 68, NULL, NULL),
(79, 12, NULL, NULL, NULL),
(80, 2, NULL, NULL, NULL),
(82, 31, NULL, NULL, NULL),
(83, 31, NULL, NULL, NULL),
(84, 32, NULL, NULL, NULL),
(92, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `type_media` enum('image','pdf','video') NOT NULL,
  `source_media` varchar(500) NOT NULL,
  `nom_media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `type_media`, `source_media`, `nom_media`) VALUES
(1, 'image', 'actu_defaut_1.jpg', NULL),
(2, 'image', 'actu_defaut_2.jpg', NULL),
(3, 'image', 'actu_defaut_3.jpg', NULL),
(5, 'image', 'labellisation_du_projet_classe_0.jpeg', 'Labellisation du projet classe 0'),
(6, 'image', 'financement_du_projet_classe2_0.jpeg', 'Financement du projet classe2 0'),
(7, 'image', 'restitution_du_projet_0.jpeg', 'Restitution du projet 0'),
(8, 'image', 'inauguration_du_pôle_ingénieur_logistique_0.jpeg', 'Inauguration du pôle ingénieur logistique 0'),
(9, 'image', 'labellisation_du_projet_classe5_0.jpeg', 'Labellisation du projet classe5 0'),
(22, 'image', 'labellisation_du_projet_classe_(11-2014)_0.jpeg', 'Labellisation du projet classe (11-2014) 0'),
(24, 'image', 'inauguration_du_pôle_ingénieur_logistique_(12-10-2016)_0.png', 'Inauguration du pôle ingénieur logistique (12-10-2016) 0'),
(25, 'image', 'financement_du_projet_classe_2_(09-2015)_0.jpeg', 'Financement du projet classe 2 (09-2015) 0'),
(26, 'image', 'restitution_du_projet_(29-09-2016)_0.jpeg', 'Restitution du projet (29-09-2016) 0'),
(27, 'image', 'inauguration_du_pôle_ingénieur_logistique_(12-10-2016)_0.jpeg', 'Inauguration du pôle ingénieur logistique (12-10-2016) 0'),
(28, 'pdf', 'financement_du_projet_classe_2_(09-2015)25_0.pdf', 'Financement du projet classe 2 (09-2015)25 0'),
(44, 'image', 'le_colloque_gol_(4ème_édition)_(10-04-2018_~_12-04-2018)_0.jpeg', 'Le colloque gol (4ème édition) (10-04-2018 ~ 12-04-2018) 0'),
(45, 'image', 'bienvenue_au_havre_:_les_rirl_0.jpeg', 'Bienvenue au havre : les rirl 0'),
(46, 'image', 'antoine_kauffman_aux_rirl_(09-2016)_0.png', 'Antoine kauffman aux rirl (09-2016) 0'),
(47, 'image', 'journée_consacrée_à_la_vallée_de_la_seine_0.png', 'Journée consacrée à la vallée de la seine 0'),
(50, 'image', 'restitution_du_projet_classe_2_0.jpeg', 'Restitution du projet classe 2 0'),
(51, 'image', 'le_20ème_congrès_roadef_0.png', 'Le 20ème congrès roadef 0'),
(52, 'image', 'la_revue_marketing_territorial_(rmt)_0.png', 'La revue marketing territorial (rmt) 0'),
(53, 'image', 'lancement_de_classe_1__0.jpeg', 'Lancement de classe 1  0'),
(54, 'image', 'réunion_de_lancement_de_classe_2_0.jpeg', 'Réunion de lancement de classe 2 0'),
(65, 'image', 'mise_à_disposition_de_sillons_ferroviaire_à_l\'horizon_2021.__0.jpeg', 'Mise à disposition de sillons ferroviaire à l\'horizon 2021.  0'),
(71, 'image', 'journée_de_restitution_du_projet_classe_0.jpeg', 'Journée de restitution du projet classe 0'),
(74, 'pdf', 'revisiting_the_demo_transaction_pattern_with_the_unified_foundational_ontology_(ufo)._0.pdf', 'Revisiting the demo transaction pattern with the unified foundational ontology (ufo). 0'),
(75, 'pdf', 'application_of_ontology_modularization_for_building_a_criminal_domain_ontology._0.pdf', 'Application of ontology modularization for building a criminal domain ontology. 0'),
(76, 'pdf', 'using_the_unified_foundational_ontology_for_grounding_legal_domain_ontologies._0.pdf', 'Using the unified foundational ontology for grounding legal domain ontologies. 0'),
(77, 'pdf', 'towards_a_legal_rule-based_system_grounded_on_the_integration_of_criminal_domain_ontology_and_rules._0.pdf', 'Towards a legal rule-based system grounded on the integration of criminal domain ontology and rules. 0'),
(79, 'image', 'le_projet_green_truck___0.jpeg', 'Le projet green truck   0'),
(80, 'image', 'journée_de_restitution_du_projet_classe__0.jpeg', 'Journée de restitution du projet classe  0'),
(82, 'image', 'poseidon_2035_-_première_phase_de_sélection_acquise_0.jpeg', 'Poseidon 2035 - première phase de sélection acquise 0'),
(83, 'image', 'poseidon_2035_-_première_phase_de_sélection_acquise_0.jpeg', 'Poseidon 2035 - première phase de sélection acquise 0'),
(84, 'image', 'le_colloque_gol_(5ème_édition)_0.jpeg', 'Le colloque gol (5ème édition) 0'),
(92, 'pdf', 'rapport+publications-5-juin-2019.pdf.pdf', 'Rapport+publications-5-juin-2019.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`id_action`, `id_utilisateur_detail`) VALUES
(3, 1),
(3, 2),
(1, 3),
(3, 4),
(1, 5),
(5, 6),
(3, 7),
(3, 8),
(3, 9),
(1, 10),
(3, 11),
(5, 12),
(3, 13),
(5, 14),
(3, 15),
(5, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(3, 41),
(5, 42),
(2, 43),
(2, 44),
(5, 45),
(1, 46),
(1, 47),
(5, 48),
(5, 49),
(1, 50),
(1, 51),
(3, 52),
(4, 53),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(4, 65),
(4, 66),
(3, 69),
(3, 70);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `titre_publication` text NOT NULL,
  `annee_publication` varchar(4) NOT NULL,
  `type_publication` enum('Article','Revue','Conférence','Communication','Chapitre') NOT NULL,
  `information_publication` text,
  `lien_publication` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `titre_publication`, `annee_publication`, `type_publication`, `information_publication`, `lien_publication`, `id_action`) VALUES
(16, 'Dynamic Representation  and  Interpretation  in  a  Multiagent  3D  Tutoring  System.', '2019', 'Chapitre', 'In:  Sgurev  V., Yager R., Kacprzyk J., Atanassov K. (eds) Recent Contributions in Intelligent Systems. Studies in Computational Intelligence, vol 657, pages 205-227, Springer, Cham. ISBN : 978-3-319-41437-9. (Manque Galinho T.)', 'http://doi.org/10.1007/978-3-319-41438-6_12', 5),
(18, 'Industrial  Virtual  Environments  and Learning Process', '2019', 'Article', 'REV2017 :14th International Conference on Remote Engineering and Virtual Instrumentation', '', 5),
(19, 'Environnements Industriels Virtualisés et Processus  d’Apprentissage.  Actes  du  séminaire  ', '2016', 'Communication', 'Actes  du  séminaire  "Virtualia  2016,  la  réalité  virtuelle  au service de la recherche".  Actes du séminaire organisé par le CIREVE à Caen (19 octobre 2016), Publiés sous la direction de Sophie MADELEINE.', 'https://hal.archives-ouvertes.fr/hal-01760241/document', 5),
(33, 'A model for optimal feeder vessel management in container terminals', '2018', 'Communication', '4ème édition de la Conférence IEEE Internationale Gestion Opérationnelle de la Logistique (GOL’18), 10-12 avril 2018, Le Havre, France.', NULL, 1),
(34, 'Le Système d\'Identification Automatique (AIS) :  du Big Data maritime aux potentialités géoéconomiques', '2018', 'Communication', 'In Alix Y. [sous la dir. de], Prospective Maritime et Stratégies Portuaires, EMS Editions Management Société, 2018, pp. 127-153.', NULL, 1),
(35, 'Teaching Automation and Logistics with Virtual Industrial Process', '2018', 'Article', 'REV2018 :15th International Conference on Remote Engineering and Virtual Instrumentation', NULL, 5),
(37, 'Les antécédents de la confiance dans la coopération amapienne', '2017', 'Revue', 'Revue Internationale PME, vol.30, n°1, p.121-154', 'http://dx.doi.org/10.7202/1039788ar', 2),
(38, 'Analyse thématique de la mutualisation urbaine au travers une étude bibliométrique et des entretiens exploratoires', '2014', 'Article', 'Logistique & Management, vol.22, n°3, p.51-66', 'http://dx.doi.org/10.1080/12507970.2014.11517062', 2),
(39, 'Nuclear Warehouse: Emphasize on Energy Efficiency Strategy in Global Supply Chain', '2014', 'Article', 'Journal of International Logistics and Trade, vol.12, n°2, p.61-80', NULL, 2),
(40, 'Dysfunction of a Solidarity Partnership: The Risk of Having No Contract in the CSA Cooperationt', '2018', 'Communication', '78th Annual Meeting of the Academy of Management, Chicago, Illinois, USA, August 10-14', 'https://www.researchgate.net/publication/316919446_Dysfunction_of_a_Solidarity_Partnership_The_Risk_of_Having_No_Contract_in_the_CSA_Cooperation', 2),
(41, 'Le rôle de la communication virtuelle dans la relation de proximité en AMAP', '2017', 'Communication', '33è Colloque International de l\'Association Française du Marketing, Tours, France, 17-19 mai', 'https://www.afm-marketing.com/fr/system/files/publications/AFM2017-AISSAOUI_BUENOMERINO_GRANDVAL.pdf', 2),
(42, 'Les antécédents de l’émergence de Centres de Distribution Urbaine (CDU) : le cas de Bristol-Bath', '2016', 'Communication', '11ème Congrès du RIODD « Energie, environnement et mutations sociales », Saint-Etienne, 6-8 Juillet', 'https://hal.inria.fr/NIMEC/hal-01349980v1', 2),
(43, 'The Community Supported Agriculture (CSA) cooperation in France: An Alternative Distribution Channel for the Agricultural Entrepreneur', '2015', 'Communication', 'Strategic Management Society 35th Annual International Conference, Denver, USA, October 3-6', 'https://www.researchgate.net/publication/283541479_The_Community_Supported_Agriculture_CSA_cooperation_in_France_An_alternative_distribution_channel_for_the_agricultural_entrepreneur?_sg=1nVvu7p49jX_mTRMb9u4dmhdykcFN25IHR4u-rBfcwa2urgTd-hNApTwMvWZjvhBShng84C4sv_8U0SyQQSiL_XiG5uejvgnIHTK1G-y.7iPkqRZbMo0UBhPyU0OsMIyJ7NumxjZXSdU37q_024zsdlsgupt9yVqzXGfBelmdNBBred64IqGLKXju8UZqww', 2),
(44, 'L’impact de l’identité relationnelle sur la co-création de valeur collective en circuit cours de distribution amapien', '2018', 'Communication', '7è journées Georges Doriot, UQAM, Montréal, 17-18 mai', NULL, 2),
(45, 'Les facettes du pouvoir dans les relations interorganisationnelles en situation d’économie solidaire : le rôle du contrat et de la confiance, le cas de la relation AMAP-producteurs agricoles', '2016', 'Communication', 'Congrès CIAPHS « Structure », IMEC-Caen, France, 10-12 mars', NULL, 2),
(46, 'Simulation optimization based ant colony algorithm for the uncertain quay crane scheduling problem', '2018', 'Revue', 'International Journal of Industrial Engineering Computations', NULL, 3),
(47, 'Modelling and solving a bi-objective intermodal transport problem of agricultural products', '2017', 'Revue', 'International Journal of Industrial Engineering Computations', NULL, 3),
(48, 'An improving agent-based engineering strategy for minimizing unproductive situations of cranes in a rail–rail transshipment yard', '2017', 'Revue', 'Simulation, journals.sagepub.com', NULL, 3),
(49, 'The “Dual-Ants Colony”: A Novel Hybrid Approach for the Flexible Job Shop Scheduling Problem with Preventive Maintenance', '2017', 'Revue', 'Computers & Industrial Engineering', NULL, 3),
(50, 'Allocation of Static and Dynamic Wireless Power Transmitters Within the Port of Le Havre', '2018', 'Chapitre', 'In book  Innovations in Smart Cities and Applications, Proceedings of the 2nd Mediterranean Symposium on Smart City Applications, Publish : Springer International Publishing, ISBN: 978-3-319-74499-5', 'https://www.springerprofessional.de/en/allocation-of-static-and-dynamic-wireless-power-transmitters-wit/15550274', 3),
(51, 'Innovative Port Logistics Through Coupled Optimization/Simulation Approaches', '2018', 'Chapitre', 'In book: Contemporary Approaches and Strategies for Applied Logistics, Chapter: 13, Publisher: IGI Global Editors: Lincoln C. Wood', NULL, 3),
(53, 'Les signaux AIS et les SIG pour l’étude du trafic maritime', '2018', 'Communication', NULL, NULL, 1),
(54, 'The automatic identification system (AIS) : a data source for studying maritime traffic : The case of the Adriatic Sea', '2018', 'Communication', NULL, NULL, 1),
(55, 'Automatic Identification System (AIS) as a Tool to Study Maritime Traffic: the Case of theBaltic Sea', '2017', 'Communication', NULL, NULL, 1),
(56, ' Borne duale du problème de gestion du flot de conteneurs dans un réseau multimodal', '2017', 'Conférence', 'Conférence ROADEF 2017 - Metz', NULL, 3),
(57, 'Optimization of Containers Transfer in Le Havre Port: a New Algorithm for the Railway Transportation System', '2018', 'Conférence', '16th IFAC Symposium on Information Control Problems in Manufacturing Bergamo, Italy. June 11-13, 2018', 'https://d1keuthy5s86c8.cloudfront.net/static/ems/upload/files/zcjrr_0327_FI.pdf', 3),
(60, 'Corporate Social Responsability of a French SME in the transport sector : Pathways to effective implementation', '2018', 'Chapitre', 'Marie-Laure Baron et Suzanne Apitsa (2018), « Corporate Social Responsability of a French SME in the transport sector : Pathways to effective implementation», in Tench R., Sun W., Jones B. (Eds.), The critical State of Corporate Social Responsibility in Europe, Emerald Books Publishing. ', '', 2),
(61, 'Les conditions d’émergence d’une stratégie collective dans une industrie fragmentée : une application aux activités logistiques du port du Havre', '2018', 'Conférence', 'Marie-Laure Baron, Les conditions d’émergence d’une stratégie collective dans une industrie fragmentée : une application aux activités logistiques du port du Havre, 2008-2017, RIRL, Paris, mai 2018.', '', 2),
(62, 'Les conditions d’adoption d’un changement organisationnel par les prestataires de services logistiques : Le cas d’un service ferroviaire', '2019', 'Conférence', 'Ali Khodadad et M-L Baron (2018), « Les conditions d’adoption d’un changement organisationnel par les prestataires de services logistiques : Le cas d’un service ferroviaire », GOL, Le Havre.', '', 2),
(63, 'Measuring the performance of the Green Supply Chain, a methodology and discussion applied to potatoe distribution in Northern France', '2017', 'Conférence', 'ML Baron (2017), Measuring the performance of the Green Supply Chain, a methodology and discussion applied to potatoe distribution in Northern France», Hamburg International Conference on Logistics, Octobre. ', '', 2),
(64, 'Revisiting the DEMO transaction pattern with the Unified Foundational Ontology (UFO).', '2017', 'Chapitre', 'Poletaeva, T., Guizzardi, G., Almeida, J.P.A., Abdulrab, H.: Revisiting the DEMO transaction pattern with the Unified Foundational Ontology (UFO). In: Advances in Enterprise Engineering XI. LNBIP, Vol. 284, pp.181-195. Springer, 2017.', '', 4),
(65, 'The application of ODCM for Building Well-founded Legal Domain Ontologies: A Case Study in the Domain of Carriage of Goods by Sea Conventions.', '2019', 'Conférence', 'El Ghosh, M., Abdulrab, H.: The application of ODCM for Building Well-founded Legal Domain Ontologies: A Case Study in the Domain of Carriage of Goods by Sea Conventions. In: ICAIL Conference, Montreal, June 2019 (paper accepted). ', '', 4),
(66, 'Application of Ontology Modularization for Building a Criminal Domain Ontology.', '2018', 'Conférence', 'El Ghosh, M., Abdulrab Habib, Naja, H., Khalil, M.: Application of Ontology Modularization for Building a Criminal Domain Ontology. In: AICOL 2018, AI Approaches to the Complexity of Legal Systems, LNCS, vol. 10791, pp. 394-409, Springer, Cham.', '', 4),
(67, 'Using the Unified Foundational Ontology for Grounding Legal Domain Ontologies.', '2017', 'Conférence', 'El Ghosh, M., Abdulrab Habib, Naja, H., Khalil, M.: Using the Unified Foundational Ontology for Grounding Legal Domain Ontologies. In: KEOD 2017, vol2, pp. 219-225.', '', 4),
(68, 'Towards a Legal Rule-based System Grounded on the Integration of Criminal Domain Ontology and Rules.', '2017', 'Revue', 'El Ghosh, M., Abdulrab Habib, Naja, H., Khalil, M.: Towards a Legal Rule-based System Grounded on the Integration of Criminal Domain Ontology and Rules. Procedia Computer Science, vol. 112, pp.632-642, Elsevier, Netherlands, September 2017.', '', 4);

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

CREATE TABLE `publier` (
  `id_publication` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `publier`
--

INSERT INTO `publier` (`id_publication`, `id_utilisateur_detail`) VALUES
(16, 6),
(16, 12),
(16, 14),
(16, 16),
(18, 6),
(18, 12),
(18, 14),
(62, 32),
(33, 5),
(33, 22),
(33, 24),
(33, 28),
(34, 51),
(34, 46),
(35, 6),
(35, 12),
(35, 14),
(40, 40),
(40, 35),
(44, 40),
(44, 35),
(46, 29),
(46, 30),
(46, 26),
(64, 53),
(64, 65),
(65, 53),
(65, 66),
(66, 53),
(66, 66),
(67, 53),
(67, 66),
(68, 53),
(68, 66),
(50, 29),
(50, 30),
(51, 29),
(51, 30),
(53, 51),
(53, 46),
(54, 51),
(54, 46),
(57, 29),
(57, 30),
(57, 26),
(60, 32),
(61, 32),
(37, 40),
(37, 35),
(41, 40),
(41, 35),
(47, 30),
(48, 30),
(49, 30),
(55, 46),
(56, 23),
(56, 24),
(56, 28),
(63, 32),
(19, 6),
(19, 12),
(19, 14),
(42, 35),
(42, 38),
(45, 40),
(45, 35),
(43, 40),
(43, 35),
(38, 35),
(38, 38),
(39, 35);

-- --------------------------------------------------------

--
-- Structure de la table `sous_action`
--

CREATE TABLE `sous_action` (
  `id_sous_action` int(11) NOT NULL,
  `num_sous_action` varchar(255) DEFAULT NULL,
  `nom_sous_action` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sous_action`
--

INSERT INTO `sous_action` (`id_sous_action`, `num_sous_action`, `nom_sous_action`, `id_action`) VALUES
(35, '1', 'Environnement et chaînes logistiques : Mesurer la perception par le consommateur des coûts écologiques de la logistique et l’impact sur la chaîne, comparer cette perception sur différents continents.', 2),
(36, '2', 'Logistique urbaine et environnement. Mesurer la faisabilité technique et organisationnelle d’une réduction de la livraison à domicile au profit de la livraison hors domicile sur le terrain de l\'Axe Seine (Le Havre, Rouen, Paris Saint Lazare). Identifier des projets innovants en matière de logistique urbaine, Modalités de gouvernance de la mutualisation urbaine et facteurs de réussite.', 2),
(37, '3', 'Coordination, échanges et émergence de compétences collectives, approche par les Eco-Systèmes d\'Affaires. Interaction entre acteurs privés et publics sur la chaîne logistique, dynamique des écosystèmes et impact sur le corridor.', 2),
(49, '1', 'Elaborer une base de connaissances sur les trafics et les risques, en utilisant le contentieux lié au trafic sur l’Axe Seine.', 5),
(50, '2', 'Le rôle des acteurs dans le développement d\'une place portuaire, les transitaire.', 5),
(51, '3', 'L\'Axe Seine et la normalisation ISO 26 000 des acteurs.', 5),
(52, '4', 'L\'interfaçage de deux corridors : Axe Seine et Corridors d\'Afrique de l\'Ouest.', 5),
(53, '5', 'Développer des systèmes intéropérables pour faciliter le commerce et la logistique.', 5),
(54, '6', 'Conception d\'outils nouveaux pour l\'apprentissage. Conception et réalisation d\'environnements virtuels immersifs pour permettre aux apprenants d\'appréhender de nouveaux environnements de travail, et pour étudier leurs réactions dans cet environnement simulé.', 5),
(79, '1', 'Amélioration de la performance logistique centrée sur le passage du port élargi : Modèle permettant la gestion des véhicules de transport, le stockage et le transfert intra-portuaire des conteneurs dans un modèle global, plateforme multi-agents pour la modélisation/simulation du port étendu, problématique de stockage sur les terminaux portuaires, valorisation.', 3),
(80, '2', 'Dynamique des flux globalisés dans un corridor logistique . Développement du concept de réseau intégré multi-acteurs et multimodal, Modélisation des relations entre de multiples acteurs, optimisations à partir des données générées dans l\'Action 1.', 3),
(81, '3', 'Aide au pilotage temps réel d\'un corridor logistique (intégration des aléas', 3),
(92, '1', ' Pilotage et coordination du projet, en liaison avec SFLOG et toutes les équipes, coordination, valorisation, gestion administrative des données.', 1),
(93, '2', 'Gestion et fiabilisation des données, intégration de nouvelles demandes, Développement d\'outils d\'analyse spatiale.', 1),
(94, '3', 'Acquisition et enrichissement de données, données maritimes, qualité des données et premiers développements, modèle d\'anticipation de l\'arrivée des navires à quai.', 1),
(95, '4', 'Données maritimes et interface recherche. Déploiement des capteurs, développement d\'un outil de prévision des escales (avec le LMAH). Dialogue avec les chercheurs et milieux économiques, valorisation.', 1),
(96, '5', 'Valorisation, innovation : mutualisation des données autour d\'une plateforme Axe Seine.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

CREATE TABLE `these` (
  `id_these` int(11) NOT NULL,
  `titre_these` varchar(255) NOT NULL,
  `annee_these` date NOT NULL,
  `soutenant_these` varchar(255) NOT NULL,
  `specialite_these` varchar(255) DEFAULT NULL,
  `jury_these` text,
  `resume_these` text,
  `lien_these` varchar(500) DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `these`
--

INSERT INTO `these` (`id_these`, `titre_these`, `annee_these`, `soutenant_these`, `specialite_these`, `jury_these`, `resume_these`, `lien_these`, `id_utilisateur_detail`, `id_action`) VALUES
(1, 'Analyse des mécanismes de gouvernance inter-organisationnels en circuits courts de distribution. Le cas de la relation de confiance en AMAP. ', '2016-11-23', 'Sonia AISSAOUI', 'Sciences de gestion ', '<ul><li>Véronique des GARETS, Professeur Université François Rabelais de Tours (rapporteur)</li><li>Saïd YAMI, Professeur Université Lille 1 (rapporteur)</li><li>Vincent HOVELAQUE, Professeur Université Rennes (suffragant)</li><li>Aline SCOUARNEC, Professeur Université Caen (suffragant)</li><li>Samuel GRANDVAL, Maître de Conférences HDR, Université Le Havre (directeur de thèse)</li><li>Gilles PACHE, Professeur Université Aix-Marseille (directeur de thèse)</li></ul>', 'Analyse des mécanismes de gouvernance inter-organisationnels en circuits courts de distribution. Le cas de la relation de confiance en AMAP.   ', '', 40, 3),
(2, 'Les antécédents à l’adoption de la mutualisation de la logistique urbaine en tant qu’innovation interorganisationnelle : une étude de cas multiple', '2018-03-22', 'Kanyarat NIMTRAKOOL', 'Sciences de gestion', '<ul><li>Michael BROWNE – Professeur des Universités, Université de Gothenburg (Suède)</li><li>Claire CAPO – Maître de conférences, NIMEC, Université Le Havre Normandie</li><li>Odile CHANUT – Professeure des Universités, Université de Lyon</li><li>Samuel GRANDVAL – Maître de conférences HDR, NIMEC, Université Le Havre Normandie, directeur de thèse</li><li>Jean-Luc JARRIN – Président de JAJL Conseil, invité</li><li>Olivier MEIER – Professeur des Universités, Université de Paris-Est</li><li>Martine SPENCE – Professeure agrégée – Université d’Ottawa (Canada)</li></ul>', ' La gestion coordonnée de la logistique sur le territoire urbain est complexe. La mutualisation est une pratique considérée par les parties prenantes comme potentiellement source de performance de la logistique urbaine. Plusieurs expériences de mutualisation urbaine ont néanmoins échoué. En mobilisant la théorie de la diffusion des innovations appliquée au cadre interorganisationnel, nous tentons d’appréhender les antécédents à l’adoption de la mutualisation urbaine en tant que facteurs explicatifs.', '', 10, 2),
(3, 'La contribution des biens communs à la performation de la méta-organisation : le cas des corridors logistico-portuaires', '2018-11-20', 'Antoine KAUFFMANN', 'Sciences de gestion', '<ul><li>Antoine BERBAIN – Directeur général délégué de HAROPA, invité</li><li>Tarek CHANEGRIH – Maître de conférences HDR, Université Caen Normandie</li><li>Odile CHANUT – Professeur des universités, Université de Saint-Etienne</li><li>Samuel GRANDVAL – Maître de conférences HDR, Université Le Havre Normandie, directeur de thèse</li><li>Frank GUERIN – Maître de conférences, Université Le Havre Normandie, co-encadrant</li><li>Vincent HOVELAQUE – Professeur des universités, Université de Rennes</li><li>Gilles PACHE – Professeur des universités, Université d’Aix-Marseille</li></ul>', 'La méta-organisation est une catégorie de réseau inter-organisationnel encore méconnue. Ce travail de thèse a pour objectif de mettre en évidence les caractéristiques de la contribution de plusieurs catégories de biens communs à leur performation organisationnelle. Dans cet objectif, nous effectuons une analyse qualitative portant sur le cas des corridors logistico-portuaires à partir de documents officiels et d’entretiens. ', '', 10, 2),
(4, 'Gestion de flot de conteneurs et de véhicules dans un réseau multimodal. ', '2018-12-06', 'Mohammed HEMMIDY', 'Mathématiques', '<ul><li>Nathalie BOSTEL - Professeur des universités, Université de Nantes</li><li>Mohamed DIDI BIHA - Professeur des universités, Université de Caen Normandie</li><li>Andrea Cynthia DUHAMEL - Maître de conférences HDR, Université de Technologie de Troyes</li><li>Cédric JONCOUR - Maître de conférences, Université Le Havre Normandie (membre invité)</li><li>Sophie MICHEL - Maître de conférences, Université Le Havre Normandie (membre invité)</li><li>Abdelkader SBIHI - Professeur des universités, ESCEM Ecole de Management, Tours</li><li>Adnan YASSINE - Professeur des universités, Université Le Havre Normandie, directeur de thèse</li></ul>', 'Nous avons développé un modèle mathématique réaliste qui prend en considération les différents aspects liés au transport et au stockage de conteneurs dans un réseau multimodal, dont l’objectif est de minimiser le coût global de transport (coûts de transports, stockages, manutention et déplacements de véhicules) tout en respectant les différentes contraintes liées au transport et aux stockages des différents types de conteneurs et la nature de leurs contenus. Un modèle agrégé est construit dans le but de la construction d’une borne duale et d’une borne primale pour le problème initial. ', '', 23, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_detail`
--

CREATE TABLE `utilisateur_detail` (
  `id_utilisateur_detail` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur_detail`
--

INSERT INTO `utilisateur_detail` (`id_utilisateur_detail`, `id_utilisateur`) VALUES
(1, 1),
(2, 18),
(3, 19),
(4, 20),
(5, 21),
(6, 22),
(156, 22),
(157, 22),
(158, 22),
(159, 22),
(160, 22),
(7, 23),
(149, 23),
(150, 23),
(151, 23),
(8, 24),
(9, 25),
(10, 26),
(112, 26),
(145, 26),
(223, 26),
(224, 26),
(225, 26),
(11, 27),
(12, 29),
(161, 29),
(162, 29),
(163, 29),
(164, 29),
(165, 29),
(166, 29),
(13, 30),
(14, 31),
(167, 31),
(168, 31),
(169, 31),
(170, 31),
(171, 31),
(172, 31),
(173, 31),
(15, 32),
(147, 32),
(148, 32),
(16, 33),
(17, 34),
(18, 35),
(19, 36),
(146, 36),
(20, 37),
(21, 38),
(22, 39),
(23, 40),
(24, 41),
(174, 41),
(175, 41),
(176, 41),
(177, 41),
(178, 41),
(179, 41),
(180, 41),
(181, 41),
(25, 42),
(182, 42),
(183, 42),
(184, 42),
(185, 42),
(186, 42),
(187, 42),
(188, 42),
(189, 42),
(190, 42),
(191, 42),
(26, 43),
(27, 44),
(28, 45),
(29, 46),
(135, 46),
(192, 46),
(193, 46),
(30, 47),
(152, 47),
(153, 47),
(154, 47),
(155, 47),
(31, 48),
(200, 49),
(33, 50),
(34, 51),
(35, 52),
(36, 53),
(138, 53),
(139, 53),
(140, 53),
(141, 53),
(142, 53),
(143, 53),
(144, 53),
(37, 54),
(38, 55),
(39, 56),
(40, 57),
(41, 58),
(42, 59),
(43, 60),
(44, 61),
(45, 62),
(46, 63),
(47, 64),
(48, 65),
(49, 66),
(50, 68),
(51, 69),
(52, 71),
(194, 71),
(195, 71),
(196, 71),
(53, 72),
(234, 72),
(235, 72),
(54, 73),
(55, 74),
(56, 75),
(57, 76),
(136, 76),
(137, 76),
(58, 77),
(201, 77),
(202, 77),
(203, 77),
(204, 77),
(205, 77),
(59, 78),
(60, 79),
(61, 80),
(62, 81),
(63, 82),
(64, 83),
(65, 84),
(66, 85),
(67, 86),
(68, 87),
(69, 88),
(70, 89),
(71, 90),
(72, 91),
(130, 92),
(126, 114),
(123, 116),
(133, 127),
(131, 128),
(209, 134),
(237, 135),
(240, 137),
(249, 138);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualite`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD KEY `id_actualite` (`id_actualite`),
  ADD KEY `id_media` (`id_media`),
  ADD KEY `id_publication` (`id_publication`),
  ADD KEY `id_these` (`id_these`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_action`,`id_utilisateur_detail`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `publier`
--
ALTER TABLE `publier`
  ADD KEY `publier_ibfk_1` (`id_publication`),
  ADD KEY `publier_ibfk_2` (`id_utilisateur_detail`);

--
-- Index pour la table `sous_action`
--
ALTER TABLE `sous_action`
  ADD PRIMARY KEY (`id_sous_action`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `these`
--
ALTER TABLE `these`
  ADD PRIMARY KEY (`id_these`),
  ADD KEY `id_action` (`id_action`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  ADD PRIMARY KEY (`id_utilisateur_detail`),
  ADD KEY `id_utilisateur_commune` (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `sous_action`
--
ALTER TABLE `sous_action`
  MODIFY `id_sous_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pour la table `these`
--
ALTER TABLE `these`
  MODIFY `id_these` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  MODIFY `id_utilisateur_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `actualite_ibfk_1` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

--
-- Contraintes pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`id_actualite`) REFERENCES `actualite` (`id_actualite`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`),
  ADD CONSTRAINT `illustrer_ibfk_3` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`),
  ADD CONSTRAINT `illustrer_ibfk_4` FOREIGN KEY (`id_these`) REFERENCES `these` (`id_these`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Contraintes pour la table `sous_action`
--
ALTER TABLE `sous_action`
  ADD CONSTRAINT `sous_action_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Contraintes pour la table `these`
--
ALTER TABLE `these`
  ADD CONSTRAINT `these_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `these_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

--
-- Contraintes pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  ADD CONSTRAINT `utilisateur_detail_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `commune`.`utilisateur` (`id_utilisateur`);
--
-- Base de données :  `fuma`
--
CREATE DATABASE IF NOT EXISTS `fuma` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fuma`;

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `numero_action` int(11) NOT NULL,
  `nom_action` varchar(255) NOT NULL,
  `media_action` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`id_action`, `numero_action`, `nom_action`, `media_action`) VALUES
(29, 0, 'Gestion du projet', ''),
(30, 1, 'Développement d’une approche « glocale » pour le futur de la marchandise', ''),
(31, 2, 'Intelligence de la marchandise augmentée, connectée et autonome', ''),
(32, 3, 'Vulnérabilité des processus et robustesse de la chaîne logistique', ''),
(33, 4, 'Dissémination « Glocale »', '');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(11) NOT NULL,
  `type_actualite` enum('Article','Événement') NOT NULL,
  `titre_actualite` varchar(255) NOT NULL,
  `description_actualite` text NOT NULL,
  `resume_actualite` varchar(500) NOT NULL,
  `lien_actualite` varchar(500) DEFAULT NULL,
  `date_actualite_debut` date NOT NULL,
  `date_actualite_fin` date DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

CREATE TABLE `illustrer` (
  `id_media` int(11) NOT NULL,
  `id_actualite` int(11) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `id_these` int(11) DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `type_media` enum('image','pdf','video') NOT NULL,
  `source_media` varchar(500) NOT NULL,
  `nom_media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`id_action`, `id_utilisateur_detail`) VALUES
(33, 135),
(29, 136),
(30, 136),
(31, 136),
(33, 136),
(30, 137),
(31, 137),
(33, 137),
(30, 138),
(31, 138),
(33, 138),
(30, 139),
(31, 139),
(33, 139),
(31, 141),
(33, 141),
(33, 148),
(32, 149),
(33, 149),
(30, 150),
(31, 150),
(33, 150),
(32, 152),
(33, 152),
(32, 172),
(33, 172),
(30, 179),
(33, 179),
(30, 187),
(33, 187),
(30, 197),
(33, 197),
(30, 202),
(31, 202),
(33, 202),
(32, 206),
(33, 206),
(33, 211),
(29, 213),
(33, 213),
(33, 218),
(29, 246),
(30, 246),
(33, 246);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `titre_publication` text NOT NULL,
  `annee_publication` varchar(4) NOT NULL,
  `type_publication` enum('Article','Revue','Conférence','Communication','Chapitre') NOT NULL,
  `information_publication` text,
  `lien_publication` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

CREATE TABLE `publier` (
  `id_publication` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sous_action`
--

CREATE TABLE `sous_action` (
  `id_sous_action` int(11) NOT NULL,
  `num_sous_action` varchar(255) DEFAULT NULL,
  `nom_sous_action` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sous_action`
--

INSERT INTO `sous_action` (`id_sous_action`, `num_sous_action`, `nom_sous_action`, `id_action`) VALUES
(77, '1', 'Internet physique : un modèle de formalisation de la chaîne logistique de transport et de traitement de marchandises. Intégration des échelles de traitement : (i) transport massifié par container et (ii) circuits courts et redistribution locale', 31),
(78, '2', 'Déploiement de l\'Internet des Objets, des capteurs et modélisation des réseaux', 31),
(79, '3', 'Sécurisation des transmissions d\'information et traçabilité et suivi multi-échelles des marchandises par Blockchain et Smart Contract ; Aspects juridiques et notarisation des processus', 31),
(80, '1', 'Optimisation et réactivité des systèmes de prise de décision robuste en environnement', 32),
(81, '2', 'Modélisation statistique de la fiabilité des informations échangées sur la chaîne logistique en environnement incertain ', 32),
(82, '3', 'Etude de l\'acceptabilité sociale de la transition numérique et technologique des process du WP2 ; identification des critères d\'appropriation nécessaires au développements de ces derniers', 32),
(83, '4', 'Diagnostic des risques de chacun des process : identification, hiérarchisation, priorisation et mise en place d\'actions correctives', 32),
(92, '1', 'Mise en place des outils de travail collaboratif', 29),
(93, '2', 'Réunion de cooradination scientifique', 29),
(94, '3', 'Création d\'un site WEB', 29),
(95, '4', 'Restitution auprès des financeurs', 29),
(96, '1', ' Spécification de la chaine logistique de demain par les interactions locales/globales', 30),
(97, '2', 'Modélisation et optimisation multi-échelle et multimodal, dimensionnement de réseaux de distribution ; modélisation des comportements des consommateurs, des distributeurs locaux et des opérateurs dans les choix modaux de transport', 30),
(98, '3', ' Utilisation des technologies de réalité virtuelle, augmentée et immersive en appui aux modèles logistiques proposés', 30),
(99, '4', 'Gouvernance de l\'organisation de la maîtrise des flux dans les circuits courts', 30),
(100, '1', 'Organisation de trois ateliers/tables rondes (en s\'appuyant sur chaire et gt smartport)', 33),
(101, '2', '4.1.1 - Un atelier ou table ronde sur « Demain, quelle logistique pour l’acheminement de marchandises agricoles ? » (perspective agricole circuits longs)', 33),
(102, '3', '4.1.2 - Un atelier sur le thème « Logistique globale et circuits de proximité : regards croisés » (atelier interdisciplinaire de recherche, avec quelques pros) ', 33),
(103, '4', '4.1.3 -Atelier ou table–ronde sur le thème « Les circuits de proximité alimentaire : quelles technologies pour quels usages ? ».', 33),
(104, '5', 'Développement d\'un consortium et participation à des appels européens.', 33),
(105, '6', ' Développement d\'un PoC (Preuve de concept) sur l\'innovation en matière de circuits de proximité avec l\'éco-système normand du secteur de l\'agriculture et de la pêche', 33),
(106, '7', 'Organisation d’un colloque international « Glocal Supply Chain for Smart Territories », initiateur d’un cycle biannuel', 33),
(107, '8', 'Animation d\'un comité de suivi avec des utilisateurs finaux', 33);

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

CREATE TABLE `these` (
  `id_these` int(11) NOT NULL,
  `titre_these` varchar(255) NOT NULL,
  `annee_these` date NOT NULL,
  `soutenant_these` varchar(255) NOT NULL,
  `specialite_these` varchar(255) DEFAULT NULL,
  `jury_these` text,
  `resume_these` text,
  `lien_these` varchar(500) DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_detail`
--

CREATE TABLE `utilisateur_detail` (
  `id_utilisateur_detail` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur_detail`
--

INSERT INTO `utilisateur_detail` (`id_utilisateur_detail`, `id_utilisateur`) VALUES
(149, 22),
(162, 22),
(163, 22),
(164, 22),
(165, 22),
(166, 22),
(137, 23),
(155, 23),
(156, 23),
(157, 23),
(136, 26),
(151, 26),
(235, 26),
(236, 26),
(237, 26),
(172, 29),
(179, 31),
(138, 32),
(153, 32),
(154, 32),
(152, 36),
(187, 41),
(197, 42),
(139, 46),
(198, 46),
(199, 46),
(150, 47),
(158, 47),
(159, 47),
(160, 47),
(161, 47),
(206, 49),
(148, 53),
(202, 71),
(141, 76),
(211, 77),
(135, 129),
(218, 132),
(215, 133),
(222, 133),
(213, 134),
(219, 134),
(220, 134),
(221, 134),
(248, 136),
(246, 139);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualite`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD KEY `id_actualite` (`id_actualite`),
  ADD KEY `id_media` (`id_media`),
  ADD KEY `id_publication` (`id_publication`),
  ADD KEY `id_these` (`id_these`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_action`,`id_utilisateur_detail`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `publier`
--
ALTER TABLE `publier`
  ADD KEY `publier_ibfk_1` (`id_publication`),
  ADD KEY `publier_ibfk_2` (`id_utilisateur_detail`);

--
-- Index pour la table `sous_action`
--
ALTER TABLE `sous_action`
  ADD PRIMARY KEY (`id_sous_action`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `these`
--
ALTER TABLE `these`
  ADD PRIMARY KEY (`id_these`),
  ADD KEY `id_action` (`id_action`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  ADD PRIMARY KEY (`id_utilisateur_detail`),
  ADD KEY `id_utilisateur_commune` (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sous_action`
--
ALTER TABLE `sous_action`
  MODIFY `id_sous_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT pour la table `these`
--
ALTER TABLE `these`
  MODIFY `id_these` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  MODIFY `id_utilisateur_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `actualite_ibfk_1` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

--
-- Contraintes pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`id_actualite`) REFERENCES `actualite` (`id_actualite`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`),
  ADD CONSTRAINT `illustrer_ibfk_3` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`),
  ADD CONSTRAINT `illustrer_ibfk_4` FOREIGN KEY (`id_these`) REFERENCES `these` (`id_these`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Contraintes pour la table `sous_action`
--
ALTER TABLE `sous_action`
  ADD CONSTRAINT `sous_action_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Contraintes pour la table `these`
--
ALTER TABLE `these`
  ADD CONSTRAINT `these_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `these_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

--
-- Contraintes pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  ADD CONSTRAINT `utilisateur_detail_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `commune`.`utilisateur` (`id_utilisateur`);
--
-- Base de données :  `mocub`
--
CREATE DATABASE IF NOT EXISTS `mocub` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mocub`;

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `numero_action` int(11) NOT NULL,
  `nom_action` varchar(255) NOT NULL,
  `media_action` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(11) NOT NULL,
  `type_actualite` enum('Article','Événement') NOT NULL,
  `titre_actualite` varchar(255) NOT NULL,
  `description_actualite` text NOT NULL,
  `resume_actualite` varchar(500) NOT NULL,
  `lien_actualite` varchar(500) DEFAULT NULL,
  `date_actualite_debut` date NOT NULL,
  `date_actualite_fin` date DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

CREATE TABLE `illustrer` (
  `id_media` int(11) NOT NULL,
  `id_actualite` int(11) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `id_these` int(11) DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `type_media` enum('image','pdf','video') NOT NULL,
  `source_media` varchar(500) NOT NULL,
  `nom_media` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `titre_publication` text NOT NULL,
  `annee_publication` varchar(4) NOT NULL,
  `type_publication` enum('Article','Revue','Conférence','Communication','Chapitre') NOT NULL,
  `information_publication` text,
  `lien_publication` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

CREATE TABLE `publier` (
  `id_publication` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sous_action`
--

CREATE TABLE `sous_action` (
  `id_sous_action` int(11) NOT NULL,
  `num_sous_action` varchar(255) DEFAULT NULL,
  `nom_sous_action` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

CREATE TABLE `these` (
  `id_these` int(11) NOT NULL,
  `titre_these` varchar(255) NOT NULL,
  `annee_these` date NOT NULL,
  `soutenant_these` varchar(255) NOT NULL,
  `specialite_these` varchar(255) DEFAULT NULL,
  `jury_these` text,
  `resume_these` text,
  `lien_these` varchar(500) DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_detail`
--

CREATE TABLE `utilisateur_detail` (
  `id_utilisateur_detail` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur_detail`
--

INSERT INTO `utilisateur_detail` (`id_utilisateur_detail`, `id_utilisateur`) VALUES
(227, 26),
(230, 133),
(244, 135),
(247, 137),
(251, 140);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualite`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD KEY `id_actualite` (`id_actualite`),
  ADD KEY `id_media` (`id_media`),
  ADD KEY `id_publication` (`id_publication`),
  ADD KEY `id_these` (`id_these`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`id_action`,`id_utilisateur_detail`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `publier`
--
ALTER TABLE `publier`
  ADD KEY `publier_ibfk_1` (`id_publication`),
  ADD KEY `publier_ibfk_2` (`id_utilisateur_detail`);

--
-- Index pour la table `sous_action`
--
ALTER TABLE `sous_action`
  ADD PRIMARY KEY (`id_sous_action`),
  ADD KEY `id_action` (`id_action`);

--
-- Index pour la table `these`
--
ALTER TABLE `these`
  ADD PRIMARY KEY (`id_these`),
  ADD KEY `id_action` (`id_action`),
  ADD KEY `id_utilisateur_detail` (`id_utilisateur_detail`);

--
-- Index pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  ADD PRIMARY KEY (`id_utilisateur_detail`),
  ADD KEY `id_utilisateur_commune` (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sous_action`
--
ALTER TABLE `sous_action`
  MODIFY `id_sous_action` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `these`
--
ALTER TABLE `these`
  MODIFY `id_these` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  MODIFY `id_utilisateur_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `actualite_ibfk_1` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

--
-- Contraintes pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`id_actualite`) REFERENCES `actualite` (`id_actualite`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`id_media`) REFERENCES `media` (`id_media`),
  ADD CONSTRAINT `illustrer_ibfk_3` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`),
  ADD CONSTRAINT `illustrer_ibfk_4` FOREIGN KEY (`id_these`) REFERENCES `these` (`id_these`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Contraintes pour la table `sous_action`
--
ALTER TABLE `sous_action`
  ADD CONSTRAINT `sous_action_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Contraintes pour la table `these`
--
ALTER TABLE `these`
  ADD CONSTRAINT `these_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `these_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
