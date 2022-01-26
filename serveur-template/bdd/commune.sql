-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Avril 2019 à 14:25
-- Version du serveur :  5.7.25-0ubuntu0.16.04.2
-- Version de PHP :  7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commune`
--

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
(3, 'Laboratoire de Mathématiques de l\'INSA Rouen', 'LMI', 'Le LMI (Laboratoire de Mathématiques de l\'INSA Rouen Normandie, EA 3226 - FR CNRS 3335) existe depuis le 1er janvier 2000. Le LMI développe des travaux de Modélisation, Simulation Numérique et d’Optimisation pour différentes applications. ', 'http://lmi.insa-rouen.fr/', 'lmi.gif'),
(4, 'Normandie Innovation, Marché, Entreprise, Consommation', 'NIMEC', 'Le NIMEC (Normandie Innovation Marché Entreprise Consommation), laboratoire universitaire en sciences de gestion de Normandie, développe ses activités sur les trois campus de Caen, du Havre et de Rouen. Les travaux de recherche du NIMEC s\'inscrivent dans trois thèmes de recherche principaux. L’équipe associée au projet s’inscrit dans le thème 1, « Innovation et coopération ».', 'https://nimec.univ-lehavre.fr/', 'nimec.png'),
(5, 'Institut Du Droit International Des Transports', 'IDIT', 'L’IDIT, Institut du Droit International des Transports est une association ayant pour objet l\'étude et l\'enseignement de toutes questions d\'ordre juridique, économique ou technique, intéressant les problèmes de transport, de quelque nature qu\'ils soient, tant sur le plan national, qu\'international et ce, en liaison avec tous organismes similaires pouvant être implantés tant en France qu\'à l\'étranger.', 'http://www.idit.asso.fr/sommaire.php', 'idit.jpg'),
(6, 'UMR CNRS IDEES', 'UMR IDEES', 'Associée au CNRS depuis 1984, l’UMR IDEES est active dans des spécialités reconnues en France et à l’international telles que la modélisation et l’analyse spatiale, le transport et les environnements portuaires, la santé et les risques, les TIC (Technologies d’Information et de la Communication), les recompositions socio-territoriales.', 'http://umr-idees.fr/', 'idees.png'),
(7, 'Comptoir de la logistique', 'ISEL', 'Créé en 2009 par l’ISEL, école d’ingénieurs en logistique (CTI), le comptoir de la logistique est un guichet de valorisation en ingénierie logistique qui met à disposition de ses partenaires une plateforme unique en France d’outils de modélisation et d’optimisation de flux et de réseaux logistiques.', 'http://www.isel-logistique.fr/campus-logistique/', 'isel.jpg'),
(8, 'Laboratoire de Mécanique de Normandie', 'LMN', 'Le Laboratoire de Mécanique de Normandie (INSA) développe 3 axes majeurs de recherche : Risques, Incertitudes, variabilité, Mécanique probabiliste-fiabilité. Sa contribution est de modéliser sous incertitude et d’optimiser sous incertitude. Il travaille notamment sur la gestion des infrastructures.', 'https://www.insa-rouen.fr/recherche/laboratoires/lmn', 'lmn.png'),
(9, 'Structure Fédérative en Logistique', 'SFLog', 'L’objectif de la SF LOG est de réunir des équipes issues de disciplines diverses dont la logistique est un de leur champ d’application. La mise en commun des savoirs issus de disciplines allant de la sociologie aux mathématiques, de la gestion à l’électronique, en passant par la géographie, l’économie, l’informatique ou le droit maritime, permet l’émergence de nouveaux objets de recherche et de nouvelles méthodologies pour leur étude.', 'https://sflog.univ-lehavre.fr/', 'Structure Fédérative en Logistique_labo.png'),
(12, 'Direction de la Recherche, de la Valorisation et des Etudes Doctorales', 'DIRVED', 'La DiRVED (Direction de la Recherche, de la Valorisation et des Etudes Doctorales) met en œuvre la politique de recherche de l’université, en lien avec le Vice-Président de la recherche et la Commission Recherche.\r\n\r\nElle est structurée autour de trois principaux domaines d’activité : les études doctorales, le soutien aux laboratoires de recherche et la gestion du budget de la recherche et l’accompagnement à la valorisation, au transfert de technologie et à l’innovation.\r\n\r\nLa DiRVED est l’interlocutrice principale des partenaires de la recherche, des organismes de recherche et des laboratoires.', 'https://www.univ-lehavre.fr/spip.php?rubrique85', 'Direction de la Recherche, de la Valorisation et des Etudes Doctorales_labo.png');

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
(23, 1, 0),
(24, 1, 0),
(25, 1, 0),
(26, 1, 1),
(26, 2, 1),
(27, 1, 0),
(29, 1, 0),
(30, 1, 0),
(31, 1, 0),
(32, 1, 0),
(33, 1, 0),
(34, 1, 0),
(35, 1, 0),
(36, 1, 0),
(37, 1, 0),
(38, 1, 0),
(39, 1, 0),
(40, 1, 0),
(41, 1, 0),
(42, 1, 0),
(43, 1, 0),
(44, 1, 0),
(45, 1, 0),
(46, 1, 0),
(47, 1, 0),
(49, 1, 1),
(50, 1, 0),
(51, 1, 0),
(52, 1, 0),
(53, 1, 0),
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
(72, 1, 0),
(73, 1, 0),
(74, 1, 0),
(75, 1, 0),
(76, 1, 0),
(77, 1, 0),
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
(115, 1, 0),
(116, 1, 1),
(118, 1, 1);

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
(1, 'classe2', 'Corridors Logistiques : Application à la vallée de Seine et son environnement Phase-2', 'CLASSE succède aux projets du GRR LMN « Passage Portuaire », « Amélioration de la performance logistique globale » et « CLASSE phase 1 », labellisé par le Pôle de Compétitivité Novalog (novembre 2014). Au fur et à mesure des travaux conduits, l’interdisciplinarité et les collaborations inter-établissements se sont développées. Cette collaboration est matérialisée par la Structure Fédérative en Logistique (SFLog) de l’université du Havre, labellisée par le ministère, qui a vocation à regrouper les différents laboratoires actifs dans le domaine de la logistique.', '2015-09-01', '2019-09-30', 'classe2_projet.png', 'classe2_media.jpg'),
(2, 'template', 'test template', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `prenom_utilisateur` varchar(255) NOT NULL,
  `statut_utilisateur` enum('Enseignant(e)/Chercheur(euse)','Doctorant(e)','Post-Doctorant(e)','Ingénieur(e) d''étude','Ingénieur(e) de recherche','Stagiaire','Invité(e)') DEFAULT NULL,
  `etablissement_utilisateur` varchar(255) NOT NULL,
  `mission_utilisateur` varchar(1024) DEFAULT NULL,
  `photo_utilisateur` varchar(500) DEFAULT NULL,
  `site_utilisateur` varchar(500) DEFAULT NULL,
  `mail_utilisateur` varchar(255) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `token_utilisateur` varchar(255) DEFAULT NULL,
  `expiration_token_utilisateur` varchar(128) DEFAULT NULL,
  `id_laboratoire` int(11) NOT NULL,
  `super_admin` int(11) NOT NULL DEFAULT '0',
  `portrait_utilisateur` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `statut_utilisateur`, `etablissement_utilisateur`, `mission_utilisateur`, `photo_utilisateur`, `site_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`, `token_utilisateur`, `expiration_token_utilisateur`, `id_laboratoire`, `super_admin`, `portrait_utilisateur`) VALUES
(1, 'PLAISSY', 'Norvan', 'Stagiaire', 'Université Le Havre Normandie', NULL, NULL, NULL, 'nonoplaissy@hotmail.fr', '01c043a5a2f53f484b4447e3b132739d30066973', NULL, NULL, 1, 0, NULL),
(18, 'MATHIEU', 'Hervé', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'herve.mathieu@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(19, 'AMANTON', 'Laurent', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', NULL, NULL, NULL, 'laurent.amanton@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(20, 'BALEV', 'Stefan', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'stefan.balev@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(21, 'BELFKIH', 'Abderrahmen', 'Post-Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'abderrahmen.belfkih@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(22, 'BOUKACHOUR', 'Hadhoum', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'hadhoum.boukachour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(23, 'COLIN', 'Jean-Yves', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'jean-yves.colin@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(24, 'DEMARE', 'Thibault', 'Post-Doctorant(e)', 'Université Le Havre Normandie', '', 'thibaut.demare@gmail.com_avatar.jpg', '', 'thibault.demare@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(25, 'DUTOT', 'Antoine', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'antoine.dutot@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(26, 'DUVALLET', 'Claude', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>Acquisition et traitement des messages AIS.</p>', 'claude.duvallet@univ-lehavre.fr_avatar.jpg', 'http://litis.univ-lehavre.fr/~duvallet', 'claude.duvallet@univ-lehavre.fr', 'a7234a244de34f54fe1e9815cbb8698d402c42f7174d5cda4d61d3fb02864c9f', 'G2g7A1q9Ru48YcODwSzHK9vyhBQjvkAE', '2019-03-14 17:19:51', 1, 1, NULL),
(27, 'FOURNIER', 'Dominique', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'dominique.fournier@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(29, 'GRIEU', 'Jean', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'jean.grieu@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(30, 'GUINAND', 'Frédéric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'frederic.guinand@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(31, 'LECROQ', 'Florence', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'florence.lecroq@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(32, 'NAKECHBANDI', 'Moustafa', NULL, 'Université Le Havre Normandie', NULL, 'moustafa.nakechbandi@univ-lehavre.fr_avatar.jpg', NULL, 'moustafa.nakechbandi@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(33, 'PERSON', 'Patrick', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'patrick.person@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(34, 'VERNET', 'Mathilde', 'Doctorant(e)', 'Université Le Havre Normandie', '', NULL, '', 'mathilde.vernet@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(35, 'SERIN', 'Frédéric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'frederic.serin@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(36, 'SANLAVILLE', 'Éric', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'eric.sanlaville@univ-lehavre.fr_avatar.jpg', '', 'eric.sanlaville@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(37, 'ALKHARBOUTLY', 'Mira', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'mira.alkharboutly@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(38, 'BOUAFIA', 'Mousaab', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'mousaab.bouafia@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(39, 'DIARRASSOUBA', 'Ibrahima', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'ibrahima.diarrassouba@univ-lehavre.fr ', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(40, 'HEMMIDY', 'Mohammed', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'mohammed.hemmidy@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(41, 'JONCOUR', 'Cédric', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'cedric.joncour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(42, 'LOYAL', 'Sophie', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'sophie.loyal@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(43, 'ROUKY', 'Naoufal', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'naoufal.rouky@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(44, 'TFAILI', 'Sara', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'sara.tfaili@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(45, 'YASSINE', 'Adnan', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '<p>null</p><p data-f-id="pbf" style="text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;">Powered by <a href="https://www.froala.com/wysiwyg-editor?pb=1" title="Froala Editor">Froala Editor</a></p>', NULL, '', 'adnane.yassine@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(46, 'BOUDEBOUS', 'Dalila', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'dalila.boudebous@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(47, 'BOUKACHOUR', 'Jaouad', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', 'Mes recherches traitent tout particulièrement de l\'optimisation, la modélisation et de la simulation avec des applications en logistique. Plus spécifiquement, les sujets portent sur les problèmes d\'ordonnancement, les problèmes de transport, la logistique portuaire, la traçabilité et la gestion des risques, la multimodalité. L\'activité de R&D fait l\'objet de financements récurrents par le CPER, a bénéficié pour certains projets d\'une labellisation par le pôle normand de compétitivité en logistique, et donne lieu à l\'établissement de partenariats industriels', 'jaouad.boukachour@univ-lehavre.fr_avatar.jpg', 'https://sites.google.com/site/boukachour/', 'jaouad.boukachour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(48, 'BENABDELHAFID', 'Abdellatif', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'abdellatif.benabdelhafid@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(49, 'BARON', 'Marie-Laure', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', NULL, 'marie-laure.baron@univ-lehavre.fr_avatar.jpg', NULL, 'marie-laure.baron@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(50, 'BOUTIGNY', 'Erwan', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'erwan.boutigny@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(51, 'CAPO', 'Claire', NULL, 'Université Le Havre Normandie', NULL, 'claire.capo@univ-lehavre.fr_avatar.jpg', NULL, 'claire.capo@univ-lehavre.fr', 'cad6f4b8ca0b82c7a9e7f8d8bc1b81194d855d5a', 'B0AE3FGH4URqB4TTaIPxKBLsod7qUQ5x', '2019-03-21 11:40:18', 4, 0, NULL),
(52, 'GRANDVAL', 'Samuel', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'samuel.grandval@univ-lehavre.fr', '6ca26b65de39c35bf96e2b420f28cde07140fd28', NULL, NULL, 4, 0, NULL),
(53, 'GUERIN', 'Frank', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'frank.guerin@univ-lehavre.fr_avatar.jpg', '', 'frank.guerin@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(54, 'KAUFMANN', 'Antoine', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'antoine.kaufmann@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(55, 'NIMTRAKOOL', 'Kanyarat', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'kanyarat.nimtrakool@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(56, 'AUBOURG', 'Nathalie', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'nathalie.aubourg@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(57, 'AISSAOUI', 'Sonia', 'Doctorant(e)', 'Université Le Havre Normandie', '', 'sonia.aissaoui@univ-lehavre.fr_avatar.jpg', '', 'sonia.aissaoui@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(58, 'TAGHIPOUR', 'Atour', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'atour.taghipour@univ-lehavre.fr_avatar.jpg', '', 'atour.taghipour@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 4, 0, NULL),
(59, 'BARZMAN', 'John', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'john.barzman@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 6, 0, NULL),
(60, 'DEPREZ', 'Samuel', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'samuel.deprez@univ-lehavre.fr_avatar.JPG', '', 'samuel.deprez@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 6, 0, NULL),
(61, 'DEMOYER', 'Emilie', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'emilie.demoyer@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 6, 0, NULL),
(62, 'JOLY', 'Olivier', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', 'olivier.joly@univ-lehavre.fr_avatar.jpg', '', 'olivier.joly@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', 'jmwvDH05Byk2HKsfnkDaRcMqaDA5mDbO', '2019-03-26 15:32:10', 6, 0, NULL),
(63, 'SERRY', 'Arnaud', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', 'Le projet doit ainsi produire des données exploitables tant par les chercheurs que par les opérateurs économiques et produire des résultats relatifs au fonctionnement du corridor à la fois pour la logistique massifiée et pour la logistique urbaine\r\nNous développons une plateforme de recherche pour l’analyse de la circulation maritime et l’évaluation des aléas du transport maritime (CIRMAR). La plateforme permet de reconstituer les itinéraires des navires transportant des marchandises en utilisant les signaux AIS (Automatic Identification System). Cet outil s’intègre dans un SIG maritime qui vient notamment s’interfacer avec le SIG terrestre « Axe Seine » qui a été mis en œuvre dans le cadre du programme passage portuaire 2011-2012. ', NULL, NULL, 'arnaud.serry@univ-lehavre.fr', '81dc31279b5ebee2c47ff8eff177ddcec0e80d70', NULL, NULL, 6, 0, NULL),
(64, 'LEVEQUE', 'Laurent', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'laurent.leveque@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 6, 0, NULL),
(65, 'STECK', 'Benjamin', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'benjamin.steck@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 6, 0, NULL),
(66, 'KHEMMAR', 'Redouane', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'redouane.khemmar@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 6, 0, NULL),
(68, 'RAJABI', 'Aboozar', NULL, 'Université Le Havre Normandie', NULL, 'aboozar.rajabi@univ-lehavre.fr_avatar.jpg', NULL, 'aboozar.rajabi@univ-lehavre.fr', 'e787dcefcb2979329a196984cbd88d8c5aad8566', NULL, NULL, 1, 0, NULL),
(69, 'KERBERIOU', 'Ronan', 'Ingénieur(e) d\'étude', 'Université Le Havre Normandie', NULL, 'ronan.kerberiou@univ-lehavre.fr_avatar.jpg', NULL, 'ronan.kerberiou@univ-lehavre.fr', '29be4743435b164f21f04b2b46fc7a7d4a028270', NULL, NULL, 6, 0, NULL),
(71, 'BENAINI', 'Abdelhamid', 'Enseignant(e)/Chercheur(euse)', 'Université Le Havre Normandie', '', NULL, '', 'abdelhamid.benaini@univ-lehavre.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 2, 0, NULL),
(72, 'ABDULRAB', 'Habib', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', NULL, NULL, NULL, 'habib.abdulrab@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(73, 'ITMI', 'Mhamed', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', '', NULL, '', 'mhamed.itmi@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(74, 'BAILLY-HASCOËT', 'Valérie', NULL, 'IDIT', NULL, 'VBAILLY-HASCOET@idit.asso.fr_avatar.jpg', NULL, 'VBAILLY-HASCOET@idit.asso.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 5, 0, NULL),
(75, 'BONJOUR', 'Gaëlle', NULL, 'IDIT', NULL, NULL, NULL, 'GBONJOUR@idit.asso.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 5, 0, NULL),
(76, 'COUTURIER', 'Ludovic', NULL, 'IDIT', NULL, 'lcouturier@idit.asso.fr_avatar.jpg', NULL, 'LCOUTURIER@idit.asso.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 5, 0, NULL),
(77, 'BISIAUX', 'Christophe', NULL, 'Université Le Havre Normandie', NULL, NULL, NULL, 'christophe.bisiaux@univ-lehavre.fr ', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 7, 0, NULL),
(78, 'FOURATI', 'Sonia', NULL, 'INSA Rouen Normandie', NULL, 'sonia.fourati@insa-rouen.fr_avatar.jpg', NULL, 'sonia.fourati@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 3, 0, NULL),
(79, 'KNIPPEL', 'Arnaud', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', '', 'arnaud.knippel@insa-rouen.fr_avatar.jpg', '', 'arnaud.knippel@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 3, 0, NULL),
(80, 'BECUWE', 'Leonore', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'leonore.becuwe@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 3, 0, NULL),
(81, 'FADWA', 'Abbes', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'abbes.fadwa@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 3, 0, NULL),
(82, 'SAUNIER', 'Julien', 'Enseignant(e)/Chercheur(euse)', 'INSA Rouen Normandie', '', NULL, '', 'julien.saunier@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(83, 'OUCHENNE', 'Boulares', 'Post-Doctorant(e)', 'INSA Rouen Normandie', NULL, NULL, NULL, 'boulares.ouchenne@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(84, 'POLETAEVA', 'Tatiana', 'Post-Doctorant(e)', 'INSA Rouen Normandie', NULL, NULL, NULL, 'tatiana.poletaeva@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(85, 'EL GHOSH', 'Mirna', 'Post-Doctorant(e)', 'INSA Rouen Normandie', NULL, 'mirna.elghosh@insa-rouen.fr_avatar.jpg', NULL, 'mirna.elghosh@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(86, 'DYDYCHKIN', 'Aleksandr', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'aleksandr.dydychkin@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(87, 'LIN', 'Yuhao', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'yuhao.lin@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 1, 0, NULL),
(88, 'AOUES', 'Younes', NULL, 'INSA Rouen Normandie', NULL, NULL, NULL, 'younes.aoues@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 8, 0, NULL),
(89, 'SOUZA', 'Eduardo', NULL, 'INSA Rouen Normandie', NULL, NULL, NULL, 'eduardo.souza@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 8, 0, NULL),
(90, 'LABRECHE', 'Mustapha', NULL, 'INSA Rouen Normandie', NULL, NULL, NULL, 'mustapha.labreche@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 8, 0, NULL),
(91, 'OMAR TALAN', 'Abdoulsam', 'Stagiaire', 'INSA Rouen Normandie', NULL, NULL, NULL, 'abdoulsam.omartalan@insa-rouen.fr', '940c0f26fd5a30775bb1cbd1f6840398d39bb813', NULL, NULL, 8, 0, NULL),
(92, 'THENARD', 'Clément', 'Stagiaire', 'Université Le Havre/Normandie', '', 'clement76110@gmail.com_avatar.jpg', 'http://clementthenard.fr', 'clement76110@gmail.com', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', 'GuuXVuaRq5JDOdhnz8Clh2oDkISACIMk', '2019-03-12 01:50:01', 1, 1, NULL),
(114, 'GUILLAUME', 'Dorian', 'Stagiaire', 'Université Le Havre Normandie', '', '', 'http://google.fr', 'dorianguillaume@gmail.com', '6e4ae039e66d2b374311fbaf24a47cb50ff1439764a4a4df33967481e28b2c25', NULL, NULL, 5, 1, NULL),
(115, 'CHAUVIN', 'Christophe', 'Invité(e)', 'Pôle de compétitivité NOVALOG', '                                      ', 'cchauvin@novalog.eu_avatar.jpg', 'http://www.novalog.eu/', 'cchauvin@novalog.eu', '5c2c31ce365d88b4005caae453c45aeb5724c3c7b7a20d16e92036725665f2b8', NULL, NULL, 9, 0, NULL),
(116, 'RIBET', 'Pierre', 'Stagiaire', 'Université Le Havre Normandie', '', NULL, '', 'pierre.ribet@etu.univ-lehavre.fr', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', NULL, NULL, 1, 1, NULL),
(118, 'GLOAGUEN', 'Simon', 'Stagiaire', 'Université Le Havre Normandie', '', '', '', 'simon.gloaguen@etu.univ-lehavre.fr', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', NULL, NULL, 1, 1, NULL);

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
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_laboratoire` (`id_laboratoire`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  MODIFY `id_laboratoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
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
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_laboratoire`) REFERENCES `laboratoire` (`id_laboratoire`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
