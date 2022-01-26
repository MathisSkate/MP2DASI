-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 avr. 2019 à 13:35
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `classe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `id_action` int(11) NOT NULL AUTO_INCREMENT,
  `nom_action` varchar(255) NOT NULL,
  `media_action` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_action`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id_action`, `nom_action`, `media_action`) VALUES
(0, 'Pilotage du projet.', ''),
(1, 'Constituer une base de données sur l’Axe Seine (Région Normandie, IDF, éventuellement Picardie) en reliant le trafic maritime au trafic terrestre.', 'https://www.youtube.com/v/0BZJuh9y9-I&t=4s;'),
(2, 'Imaginer des organisations collectives performantes et innovantes et gouverner la chaîne logistique', NULL),
(3, 'Concevoir des modèles de représentation du corridor à différentes échelles, du nœud portuaire à la plateforme multimodale jusqu’au corridor pour simuler l’activité et l’optimiser.', NULL),
(4, 'Utiliser les systèmes d’information pour fluidifier le trafic et contribuer à l’intégration d’acteurs hétérogènes.', NULL),
(5, 'Appréhender la vulnérabilité des chaînes logistiques.', 'https://www.youtube.com/v/tMFvZej_ikk&t=7s;https://www.youtube.com/v/xfkpxvz3-7A;');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id_actualite` int(11) NOT NULL AUTO_INCREMENT,
  `type_actualite` enum('Article','Événement') NOT NULL,
  `titre_actualite` varchar(255) NOT NULL,
  `description_actualite` text NOT NULL,
  `resume_actualite` varchar(500) NOT NULL,
  `lien_actualite` varchar(500) DEFAULT NULL,
  `date_actualite_debut` date NOT NULL,
  `date_actualite_fin` date DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actualite`),
  KEY `id_utilisateur_detail` (`id_utilisateur_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `type_actualite`, `titre_actualite`, `description_actualite`, `resume_actualite`, `lien_actualite`, `date_actualite_debut`, `date_actualite_fin`, `id_utilisateur_detail`) VALUES
(1, 'Événement', 'Journée de restitution du projet CLASSE', '<h2><span lang=\"fr-FR\">Programme&nbsp;</span></h2><ul><li><p><span lang=\"fr-FR\"><strong>08h45 : Accueil café</strong></span></p></li><li><p><span lang=\"fr-FR\">09h00 : Point à date du projet</span></p></li><li><p><span lang=\"fr-FR\">09h15 : Présentation du site internet CLASSE (Norvan Plaissy), Plateforme de données (Claude Duvallet).</span></p></li><li><p><span lang=\"fr-FR\">09h45 : Signaux AIS (Claude Duvallet)</span></p></li><li><p><span lang=\"fr-FR\"><strong>10h00 : Pause café&nbsp;</strong></span></p></li><li><p><span lang=\"fr-FR\"><strong>10h15</strong></span><span lang=\"fr-FR\">&nbsp;</span><span lang=\"fr-FR\"><strong>: Exploitation des données AIS, Gestion de l’accostage des navires (Abderrahmen Belfikh).&nbsp;</strong></span>&nbsp;</p></li><li><p><span lang=\"fr-FR\">10h40 : Typologie des risques liés au transport dans un corridor logistique : Base de connaissances issue du contentieux judiciaire lié au trafic via les ports de l’axe Seine. (Valérie Bailly-Hascoet, IDIT, Action 5).</span></p></li><li><p><span lang=\"fr-FR\">11h00 : Alliances, faillite et risque armateurs (Action 5)</span>&nbsp;</p></li><li><p><span lang=\"fr-FR\">11h15 : Les flux dans les modèles dynamiques (Mathilde Vernet)</span></p></li><li><p><span lang=\"fr-FR\">11h35 : Thibaut Démarre</span></p></li><li><p><span lang=\"fr-FR\">11h55 : Bilan des travaux du LITIS.</span></p></li><li><p><strong><span lang=\"fr-FR\">12h00 : Déjeuner à la brasserie du CROUS.&nbsp;</span></strong></p></li><li><p><strong><span lang=\"fr-FR\">13h45 : Bilan LMAH</span></strong></p></li><li><p><span lang=\"fr-FR\">14h00 : Résultats de la recherche INSA</span></p></li><li><p><span lang=\"fr-FR\">14h20 : Bilan NIMEC, entrepreneuriat collectif et gouvernance. &nbsp;</span><span lang=\"fr-FR\">Présentation Samuel Grandval</span></p></li><li><p><span lang=\"fr-FR\">14h40 : Compte rendu de la visite des ports d’Anvers et Rotterdam (Olivier Joly)</span></p></li><li><p><span lang=\"fr-FR\">15h00 : Ports et corridors Africains, un état des lieux (Benjamin Steck)&nbsp;</span></p></li><li><p><span lang=\"fr-FR\">15h20 : Pause café</span></p></li><li><p><strong><span lang=\"fr-FR\">15h40 : Discussion : valorisation et perspectives.&nbsp;</span></strong></p></li></ul><p><br></p><p><strong><span lang=\"fr-FR\">Lieu :&nbsp;</span></strong><strong><span lang=\"fr-FR\">UFR Sciences et Techniques, &nbsp;Université Le Havre Normandie, Amphithéâtre Normand.&nbsp;</span></strong></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Programme de la journée ', NULL, '2018-07-02', NULL, 10),
(2, 'Événement', 'Journée de restitution du projet CLASSE ', '<h2>Programme&nbsp;</h2><ul><li><strong>8h30&nbsp;: Accueil caf&eacute;</strong></li><li>9h&nbsp;: Avancement du projet et pr&eacute;sentation de la journ&eacute;e ML Baron</li><li>9h30-9h45&nbsp;: L&rsquo;apport des technologies du virtuel &agrave; la formation en logistique (Action 5.5.,J. Grieu, F Lecroq, H. Boukachour, Action 5).</li><li>9h45-10h&nbsp;: D&eacute;velopper des syst&egrave;mes interop&eacute;rables pour faciliter le commerce et la logistique (M.Itmi-INSA, J. Verny Neoma RBS, L. Couturier, IDIT, Action5)</li><li>10h-10h15&nbsp;: L&rsquo;influence du consommateur sur la cha&icirc;ne logistique (C. Capo, F. Gu&eacute;rin, Action 2)</li></ul><p><br></p><p><strong>10h15-10h30 : Pause caf&eacute;&nbsp;</strong></p><ul><li><strong>10h30-11h00</strong><strong>: D&eacute;veloppement de la plateforme de donn&eacute;es sur l&rsquo;axe Seine</strong> : informations acquises et partage des donn&eacute;es pour produire des analyses (A. Serry, C. Duvallet, A. Rajabi,R. Kerbiriou, Action 1, ULH). &nbsp;</li><li>11h-11h15&nbsp;: Typologie des risques li&eacute;s au transport dans un corridor logistique : Base de connaissances issue du contentieux judiciaire li&eacute; au trafic via les ports de l&rsquo;axe Seine.( Val&eacute;rie Bailly-Hascoet, IDIT, Action 5).</li><li>11h15-11h30 : La mod&eacute;lisation des escales de navires (Abderrahmen Befikh, Action 1).&nbsp;</li><li>11h30-11h45&nbsp;: Quelle r&eacute;alit&eacute; du corridor logistique ? Une analyse de l&rsquo;&eacute;volution des entreprises havraises, 2009-2016 (Marie-Laure Baron, Action 2.3).</li><li>11h45-12h00 : le r&ocirc;le des transitaires dans l&rsquo;affectation des flux.&nbsp;</li></ul><p><strong>12h : Pause d&eacute;jeuner</strong></p><p><strong>13h : L&rsquo;apport des SI au corridor logistique (INSA, ULH)</strong></p><p>13h-13h15 : L&rsquo;ontologie d&rsquo;un syst&egrave;me inter-organisationnel (H. Abdulrab, INSA)</p><p>13h15-13h30 : L&rsquo;apport de l&rsquo;internet physique &agrave; la gestion d&rsquo;un corridor logistique (H. Mathieu, M. Nakechbandi, J-Y Colin). &nbsp;</p><p><strong>13h30: Des flux massifi&eacute;s au dernier kilom&egrave;tre, la logistique urbaine</strong></p><p>13h30-13h45 : La mutualisation de la logistique urbaine (K. Nimtrakool, C. Capo, S. Grandval).&nbsp;</p><p>13h45-14h : G&eacute;ographie des flux du e-commerce (Emilie Demoyer, S. Deprez)&nbsp;</p><p>14h-14h15 : Proximit&eacute; et mesure des performances.&nbsp;</p><p>14h15-14h30 Relations entre acteurs et d&eacute;cision dans les r&eacute;seaux logistiques (A. Taghipour).&nbsp;</p><p><strong>PAUSE CAFE</strong></p><p><strong>14h:45 Appr&eacute;hender le corridor logistique</strong></p><p>14h45-15h : Quelle gouvernance du corridor logistique ? (Antoine Kauffmann, F. Gu&eacute;rin, S. Grandval, Action 2.3.).&nbsp;</p><p>15h-15h15&nbsp;: Vie et mort d&rsquo;une industrie en lien avec l&rsquo;activit&eacute; portuaire (Nathalie Aubourg/Samuel Grandval, Action 2.3).</p><p><strong>15h15 : Mod&eacute;liser, simuler, optimiser un corridor (Action 3, INSA, ULH, EMN).&nbsp;</strong></p><p>Pr&eacute;sentation des travaux (dont A. Knippel) par A. Yassine, E. Sanlaville.&nbsp;</p><p>&nbsp;15h20-15h35 : Le transfert de voitures neuves sur le terminal roulier, Hamdi Dkhil, LMAH).&nbsp;</p><p>15h35-15h50: Le Dimensionnement d&#39;une plateforme multimodale (Mohamed Hemmidy, LMAH).</p><p>15h50&nbsp;: Optimisation et Simulation du Transport Multimodal des Conteneurs (Naoufal Rouky, LMAH)</p><p>15h30 : Cl&ocirc;ture de la journ&eacute;e </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Programme de la journée  ', NULL, '2017-10-27', NULL, NULL),
(3, 'Événement', 'Journée de restitution du projet CLASSE ', '<h2>Programme&nbsp;</h2><ul><li>8h45&nbsp;: Accueil caf&eacute;</li><li>9h15-10h&nbsp;: Point administratif, Louis Sautrel, Julien Baudry, ML Baron</li></ul><h3>10h&nbsp;: Pr&eacute;sentation des travaux de l&rsquo;Action 1&nbsp;: Plateforme de donn&eacute;es</h3><p>10h-10h30 : &laquo;CIRMAR : Acquisition, d&eacute;codage et stockage des donn&eacute;es des donn&eacute;es AIS &raquo;, Claude Duvallet et Aboozar Rajabi (LITIS).&nbsp;</p><p><strong>10h30&nbsp;:</strong><strong>&nbsp;Action 2, Innovation organisationnelle</strong></p><p>10h30-10h50 : &laquo; Les facteurs d&rsquo;adh&eacute;sion &agrave; un centre de consolidation urbaine en tant qu&rsquo;innovation inter-organisationnelle : les cas de Bristol-Bath et de St Etienne &raquo;. &nbsp;Kanyarat Nimtrakool, Samuel Grandval et Claire Capo, NIMEC.</p><p>10h50-11h10 : &laquo;&nbsp;La gouvernance collective, application au corridor logistique&nbsp;&raquo;, Antoine Kauffmann, Frank Guerin et Samuel Grandval, NIMEC.</p><p>11h10-11h30&nbsp;: &laquo;&nbsp;Dynamique de l&rsquo;Ecosyst&egrave;me d&rsquo;affaires logistique du corridor, essais de mesure&nbsp;&raquo;. Marie-Laure Baron, NIMEC.</p><p>Action 3, mod&egrave;les multi-&eacute;chelles</p><p>11h30-11h50 : &laquo; Exportation des pommes de terre de l&rsquo;axe Seine : mod&eacute;lisation &raquo;.</p><h2>11h50 : Action 3, mod&egrave;les multi-&eacute;chelles&nbsp;</h2><p>11h50-12h15&nbsp;: Adnan Yassine, Eric Sanlaville, Arnaud Knippel, point des travaux Action 3 (LMAH, LITIS, LMI,LMN)</p><p><strong><u>Pause d&eacute;jeuner</u></strong> : <strong>12h15/13h30</strong></p><p>13h30-13h45 :&laquo;Le dimensionnement d&rsquo;une plateforme multimodale &raquo;, Mohamed Hemmidy, LMAH.&nbsp;</p><p>13h45-14h00 : &laquo; La Gestion d&#39;un terminal roulier &raquo;, Hamdi DKHIL, LMAH.&nbsp;</p><p>14h-14h10&nbsp;: Sara Tfaili</p><p>14h20-14h40 : &nbsp;Thibaut Demarre</p><p>14h40-15h : K Deghdak</p><p><strong>15h : Action 4, Syst&egrave;mes d&rsquo;information</strong></p><h2>15h-15h20 : Tatyana Poletaeva &laquo; Enterprise knowledge management supported by cognitive agents: Application to Classe Project&raquo; (LITIS INSA)</h2><p><strong>15h20: Action 5, vuln&eacute;rabilit&eacute; de la cha&icirc;ne logistique</strong></p><p>15h20-15h40&nbsp;: &laquo;&nbsp;Risques et avaries li&eacute;es au transport dans un corridor logistique&nbsp;&raquo;, premiers r&eacute;sultats issus d&rsquo;une base de connaissances sur le contentieux li&eacute; au trafic sur l&rsquo;axe Seine. Val&eacute;rie Bailly-Hascoet, IDIT. (Action 5.1.)</p><p>15h40-16h &quot;Transitaires, commissionnaires et &nbsp;organisateurs de transport : vecteurs de l&rsquo;attractivit&eacute; des ports normands pour la desserte de l&rsquo;axe Seine ? &#39;&#39; (Olivier Joly, Marina&nbsp;</p><p>16h-16h15 : Un mod&egrave;le de donn&eacute;es s&eacute;mantique pour la norme UN/Edifact -MM Boulares et Itmi &ndash; LITIS INSA.&nbsp;</p><p>16h15-16h30 : Les univers virtuels au service de la logistique (Thierry Galinho, Jean Grieu, Florence Lecroq, Hadoum Boukachour).&nbsp;</p><p>16h20 : Bilan de la journ&eacute;e, pause caf&eacute;.&nbsp;</p><p>Lieu : Campus Logistique de l&rsquo;universit&eacute; du Havre, P&ocirc;le Ing&eacute;nieurs Logistique </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Programme de la journée  ', NULL, '2017-04-05', NULL, NULL),
(4, 'Événement', 'Lancement de CLASSE 1 ', '<p>En septembre 2014, le site CLASSE 1 est mis en route, financ&eacute; par la R&eacute;gion Haute Normandie et l&#39;&Eacute;tat.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Lancement du site CLASSE 1', NULL, '2014-09-01', NULL, NULL),
(5, 'Événement', 'Labellisation du projet CLASSE', '<p>En novembre 2014, le projet CLASSE est labellis&eacute; par l&#39;organisme Novalog.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Labellisation du projet CLASSE ', NULL, '2014-11-01', NULL, NULL),
(6, 'Événement', 'Financement du projet CLASSE 2', '<p>En Septembre 2015, le projet CLASSE 2 b&eacute;n&eacute;ficie d&#39;un financement FEDER (Fond Europ&eacute;en de D&eacute;veloppement R&eacute;gional).</p><p>Pour lire le communiqu&eacute; de presse : <a href=\"https://www.univ-lehavre.fr/spip.php?article1295\" target=\"_blank\">https://www.univ-lehavre.fr/spip.php?article1295</a></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Financement du projet CLASSE 2 ', NULL, '2015-09-01', NULL, NULL),
(7, 'Événement', 'Réunion de lancement de CLASSE 2', '<p>Le 25 avril 2016, l&#39;&eacute;quipe se rencontre lors d&#39;une r&eacute;union afin de parler du lancement de CLASSE 2.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Réunion de lancement de CLASSE 2', NULL, '2016-04-25', NULL, NULL),
(8, 'Événement', 'Restitution du projet', '<p>Le 29 septembre 2015, la restitution du projet est faites &agrave; l&#39;Institut Sup&eacute;rieur d&rsquo;&Eacute;tudes Logistiques (ISEL).</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Restitution du projet ', NULL, '2016-09-29', NULL, NULL),
(9, 'Événement', 'Inauguration du Pôle Ingénieur Logistique ', '<p>Le 12 octobre 2016 a lieu l&#39;inauguration du P&ocirc;le Ing&eacute;nieur Logistique, en pr&eacute;sence de Nicole Klein (pr&eacute;f&egrave;te de Normandie), Herv&eacute; Morin (pr&eacute;sident de R&eacute;gion) et &Eacute;douard Philippe (d&eacute;put&eacute;-maire du Havre et pr&eacute;sident de la Codah).</p><p>Pour lire l&#39;article du Paris-Normandie consacr&eacute; &agrave; cet &eacute;v&egrave;nement : <a href=\"https://www.paris-normandie.fr/actualites/economie/le-havre--le-pole-ingenieur-et-logistique-du-campus-est-dans-la-place-KE7107851\" target=\"_blank\">https://www.paris-normandie.fr/actualites/economie/le-havre--le-pole-ingenieur-et-logistique-du-campus-est-dans-la-place-KE7107851</a>&nbsp;</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Inauguration du Pôle Ingénieur Logistique  ', NULL, '2016-10-12', NULL, NULL),
(10, 'Événement', 'Présentation du projet CLASSE 2 ', '<p>Le 12 octobre 2016, lors de l&#39;inauguration du PIL (P&ocirc;le Ing&eacute;nieur Logistique), le projet CLASSE 2 est pr&eacute;sent&eacute; au public. </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Présentation du projet CLASSE 2 au PIL ', NULL, '2016-10-12', NULL, NULL),
(11, 'Événement', 'Antoine Kauffman aux RIRL', '<p>En septembre 2016, &agrave; Lausanne, Antoine Kauffman se trouvait aux Rencontres Internationales de la Recherche en Logistique (RIRL).</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Antoine Kauffman aux RIRL à Lausanne ', NULL, '2016-09-01', NULL, NULL),
(12, 'Événement', 'Le projet Green Truck  ', '<p>Green Truck, un projet industriel en lien avec CLASSE 2, est lanc&eacute; en janvier 2017 pour tester la traction &eacute;lectrique. </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Le projet Green Truck ', NULL, '2017-01-01', NULL, NULL),
(13, 'Événement', 'Le projet SFM', '<p>Dans le cadre des PIA2 pilot&eacute;s par l&#39;ADEME, le projet SFM (service ferroviaire de navettes modulaires), en lien avec CLASSE 2, d&eacute;marre le 06 novembre 2018. </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Démarrage du projet SFM', NULL, '2018-11-06', NULL, NULL),
(14, 'Événement', 'Le colloque GOL (4ème édition)', '<p>Pour sa 4ème édition, le colloque GOL (Gestion des Opérations Logistiques) se tient au Havre du 10 au 12 avril 2018.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Le colloque GOL (4ème édition)', NULL, '2018-04-12', NULL, NULL),
(15, 'Événement', 'Réunion de lancement de PORTERR ', '<p>Le 12 novembre 2018, se d&eacute;roule la r&eacute;union de lancement du projet PORTERR (Ports et Territoire), projet Laur&eacute;at du R&eacute;seau d&#39;Int&eacute;r&ecirc;t National (RIN) Continuum Terre Mer de la r&eacute;gion Normandie. Projet port&eacute; par Arnaud Serry (Action 1 de CLASSE 2). </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Réunion de lancement du projet PORTERR ', NULL, '2018-11-12', NULL, NULL),
(16, 'Événement', 'La Revue Marketing Territorial (RMT)', '<p>Le 24 janvier 2019, des équipes travaillent dans la perspective de soumettre à la Revue Marketing Territorial (RMT) pour un numéro spécial sur la ville du Havre.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'La Revue Marketing Territorial (RMT)', NULL, '2019-01-24', NULL, 10),
(17, 'Événement', 'Le 20ème congrès ROADEF', '<p>Du 18 au 21 f&eacute;vrier 2019, s&#39;est d&eacute;roul&eacute; au Havre, le 20&egrave;me congr&egrave;s ROADEF ((Soci&eacute;t&eacute; Fran&ccedil;aise de Recherche Op&eacute;rationnelle et d&rsquo;Aide &agrave; la D&eacute;cision), organis&eacute; par le LMAH et le LITIS, universit&eacute; Le Havre Normandie. </p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Le 20ème congrès ROADEF (Société Française de Recherche Opérationnelle et d’Aide à la Décision) ', NULL, '2019-02-21', NULL, NULL),
(18, 'Événement', 'Bienvenue au Havre : les RIRL', '<p>Bienvenue au Havre ! Les RIRL, Rencontres Internationales de la Recherche en Logistique se tiendront au Havre en 2020.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Rencontres internationales de la Recherche en Logistique', NULL, '2019-03-26', NULL, 10),
(19, 'Événement', 'Le colloque GOL (5ème édition)', '<p>La 5ème édition du colloque GOL aura lieu au Maroc en 2020.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Le colloque GOL (5ème édition)', NULL, '2019-03-26', NULL, NULL),
(20, 'Événement', 'Restitution du projet CLASSE 2', '<p>Le 21 juin 2019, restitution du projet CLASSE 2</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Restitution du projet CLASSE 2', NULL, '2019-06-21', NULL, 10),
(31, 'Événement', 'Journée consacrée à la vallée de la Seine', '<p>Le 07 f&eacute;vrier 2019 : le premier ministre, Edouard Philippe, annonce la nomination de Catherine Rivoalon, au poste de pr&eacute;figuratrice de l&#39;&eacute;tablissement unique portuaire Haropa et la prolongation du CPIER d&eacute;di&eacute; &agrave; la vall&eacute;e de la Seine au del&agrave; de 2020.</p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', 'Journée consacrée à la vallée de la Seine par la délégation interministérielle à la vallée de la Seine', NULL, '2019-02-07', NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

DROP TABLE IF EXISTS `illustrer`;
CREATE TABLE IF NOT EXISTS `illustrer` (
  `id_media` int(11) NOT NULL,
  `id_actualite` int(11) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `id_these` int(11) DEFAULT NULL,
  KEY `id_actualite` (`id_actualite`),
  KEY `id_media` (`id_media`),
  KEY `id_publication` (`id_publication`),
  KEY `id_these` (`id_these`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `illustrer`
--

INSERT INTO `illustrer` (`id_media`, `id_actualite`, `id_publication`, `id_these`) VALUES
(22, 5, NULL, NULL),
(25, 6, NULL, NULL),
(26, 8, NULL, NULL),
(27, 9, NULL, NULL),
(28, 6, NULL, NULL),
(44, 14, NULL, NULL),
(45, 18, NULL, NULL),
(46, 11, NULL, NULL),
(47, 31, NULL, NULL),
(48, 19, NULL, NULL),
(50, 20, NULL, NULL),
(51, 17, NULL, NULL),
(52, 16, NULL, NULL),
(53, 4, NULL, NULL),
(54, 7, NULL, NULL),
(65, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `type_media` enum('image','pdf','video') NOT NULL,
  `source_media` varchar(500) NOT NULL,
  `nom_media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media`
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
(48, 'image', 'le_colloque_gol_(5ème_édition)_(2020)_0.jpeg', 'Le colloque gol (5ème édition) (2020) 0'),
(50, 'image', 'restitution_du_projet_classe_2_0.jpeg', 'Restitution du projet classe 2 0'),
(51, 'image', 'le_20ème_congrès_roadef_0.png', 'Le 20ème congrès roadef 0'),
(52, 'image', 'la_revue_marketing_territorial_(rmt)_0.png', 'La revue marketing territorial (rmt) 0'),
(53, 'image', 'lancement_de_classe_1__0.jpeg', 'Lancement de classe 1  0'),
(54, 'image', 'réunion_de_lancement_de_classe_2_0.jpeg', 'Réunion de lancement de classe 2 0'),
(65, 'image', 'mise_à_disposition_de_sillons_ferroviaire_à_l\'horizon_2021.__0.jpeg', 'Mise à disposition de sillons ferroviaire à l\'horizon 2021.  0');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) NOT NULL,
  PRIMARY KEY (`id_action`,`id_utilisateur_detail`),
  KEY `id_utilisateur_detail` (`id_utilisateur_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participer`
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
(0, 32),
(2, 32),
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

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `titre_publication` text NOT NULL,
  `auteur_publication` varchar(500) NOT NULL,
  `annee_publication` varchar(4) NOT NULL,
  `type_publication` enum('Article','Revue','Conférence','Communication','Chapitre') NOT NULL,
  `information_publication` text,
  `lien_publication` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_publication`),
  KEY `id_action` (`id_action`),
  KEY `id_utiilisateur_detail` (`id_utilisateur_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `titre_publication`, `auteur_publication`, `annee_publication`, `type_publication`, `information_publication`, `lien_publication`, `id_action`, `id_utilisateur_detail`) VALUES
(16, 'Dynamic Representation  and  Interpretation  in  a  Multiagent  3D  Tutoring  System.', 'Person  P.,  Galinho  T.,  Boukachour  H.,  Lecroq  F.,  Grieu  J. ', '2019', 'Chapitre', 'In:  Sgurev  V., Yager R., Kacprzyk J., Atanassov K. (eds) Recent Contributions in Intelligent Systems. Studies in Computational Intelligence, vol 657, pages 205-227, Springer, Cham. ISBN : 978-3-319-41437-9.', 'http://doi.org/10.1007/978-3-319-41438-6_12', 5, 10),
(18, 'Industrial  Virtual  Environments  and Learning Process', 'Grieu  J.,  Lecroq  F.,  Boukachour  H.,  Galinho  T. ', '2019', 'Article', 'REV2017 :14th International Conference on Remote Engineering and Virtual Instrumentation', '', 5, NULL),
(19, 'Environnements Industriels Virtualisés et Processus  d’Apprentissage.  Actes  du  séminaire  ', 'Grieu J., Lecroq F., Galinho T, Boukachour H.', '2016', 'Communication', 'Actes  du  séminaire  \"Virtualia  2016,  la  réalité  virtuelle  au service de la recherche\".  Actes du séminaire organisé par le CIREVE à Caen (19 octobre 2016), Publiés sous la direction de Sophie MADELEINE.', 'https://hal.archives-ouvertes.fr/hal-01760241/document', 5, 10),
(33, 'A model for optimal feeder vessel management in container terminals', 'Abderrahmen Belfkih, Ibrahima Diarrassouba, Adnan Yassine, Cédric Joncour', '2018', 'Communication', '4ème édition de la Conférence IEEE Internationale Gestion Opérationnelle de la Logistique (GOL’18), 10-12 avril 2018, Le Havre, France.', NULL, 1, 10),
(34, 'Le Système d\'Identification Automatique (AIS) :  du Big Data maritime aux potentialités géoéconomiques', 'Arnaud Serry, Ronan Kerbiriou, Yann Alix', '2018', 'Communication', 'In Alix Y. [sous la dir. de], Prospective Maritime et Stratégies Portuaires, EMS Editions Management Société, 2018, pp. 127-153.', NULL, 1, 1),
(35, 'Teaching Automation and Logistics with Virtual Industrial Process', 'Lecroq  F.,  Grieu  J., Boukachour H. ', '2018', 'Article', 'REV2018 :15th International Conference on Remote Engineering and Virtual Instrumentation', NULL, 5, 10),
(37, 'Les antécédents de la confiance dans la coopération amapienne', 'Aïssaoui S., Bueno Merino P., Grandval S.', '2017', 'Revue', 'Revue Internationale PME, vol.30, n°1, p.121-154', 'http://dx.doi.org/10.7202/1039788ar', 2, 35),
(38, 'Analyse thématique de la mutualisation urbaine au travers une étude bibliométrique et des entretiens exploratoires', 'Nimtrakool K., Chanut O., Grandval S. ', '2014', 'Article', 'Logistique & Management, vol.22, n°3, p.51-66', 'http://dx.doi.org/10.1080/12507970.2014.11517062', 2, 35),
(39, 'Nuclear Warehouse: Emphasize on Energy Efficiency Strategy in Global Supply Chain', 'Aminata J., Grandval S., Sbihi A. ', '2014', 'Article', 'Journal of International Logistics and Trade, vol.12, n°2, p.61-80', NULL, 2, 35),
(40, 'Dysfunction of a Solidarity Partnership: The Risk of Having No Contract in the CSA Cooperationt', 'Aïssaoui S., Bueno Merino P., Grandval S. ', '2018', 'Communication', '78th Annual Meeting of the Academy of Management, Chicago, Illinois, USA, August 10-14', 'https://www.researchgate.net/publication/316919446_Dysfunction_of_a_Solidarity_Partnership_The_Risk_of_Having_No_Contract_in_the_CSA_Cooperation', 2, 35),
(41, 'Le rôle de la communication virtuelle dans la relation de proximité en AMAP', 'Aïssaoui S., Bueno Merino P., Grandval S. ', '2017', 'Communication', '33è Colloque International de l\'Association Française du Marketing, Tours, France, 17-19 mai', 'https://www.afm-marketing.com/fr/system/files/publications/AFM2017-AISSAOUI_BUENOMERINO_GRANDVAL.pdf', 2, 10),
(42, 'Les antécédents de l’émergence de Centres de Distribution Urbaine (CDU) : le cas de Bristol-Bath', 'Grandval S., Nimtrakool K. ', '2016', 'Communication', '11ème Congrès du RIODD « Energie, environnement et mutations sociales », Saint-Etienne, 6-8 Juillet', 'https://hal.inria.fr/NIMEC/hal-01349980v1', 2, 35),
(43, 'The Community Supported Agriculture (CSA) cooperation in France: An Alternative Distribution Channel for the Agricultural Entrepreneur', 'Aïssaoui S., Bueno Merino P., Grandval S. ', '2015', 'Communication', 'Strategic Management Society 35th Annual International Conference, Denver, USA, October 3-6', 'https://www.researchgate.net/publication/283541479_The_Community_Supported_Agriculture_CSA_cooperation_in_France_An_alternative_distribution_channel_for_the_agricultural_entrepreneur?_sg=1nVvu7p49jX_mTRMb9u4dmhdykcFN25IHR4u-rBfcwa2urgTd-hNApTwMvWZjvhBShng84C4sv_8U0SyQQSiL_XiG5uejvgnIHTK1G-y.7iPkqRZbMo0UBhPyU0OsMIyJ7NumxjZXSdU37q_024zsdlsgupt9yVqzXGfBelmdNBBred64IqGLKXju8UZqww', 2, 10),
(44, 'L’impact de l’identité relationnelle sur la co-création de valeur collective en circuit cours de distribution amapien', 'Aïssaoui S., Bueno Merino P., Grandval S. ', '2018', 'Communication', '7è journées Georges Doriot, UQAM, Montréal, 17-18 mai', NULL, 2, 10),
(45, 'Les facettes du pouvoir dans les relations interorganisationnelles en situation d’économie solidaire : le rôle du contrat et de la confiance, le cas de la relation AMAP-producteurs agricoles', 'Aïssaoui S., Bueno Merino P., Grandval S. ', '2016', 'Communication', 'Congrès CIAPHS « Structure », IMEC-Caen, France, 10-12 mars', NULL, 2, 35),
(46, 'Simulation optimization based ant colony algorithm for the uncertain quay crane scheduling problem', 'N. Rouky, M. N. Abourraja, J. Boukachour, D. Boudebous, A. El Hilali Alaoui, F. EL Khoukhi', '2018', 'Revue', 'International Journal of Industrial Engineering Computations', NULL, 3, 30),
(47, 'Modelling and solving a bi-objective intermodal transport problem of agricultural products', 'A. Abbassi, A. EL Hilali Alaoui, J.Boukachour', '2017', 'Revue', 'International Journal of Industrial Engineering Computations', NULL, 3, 30),
(48, 'An improving agent-based engineering strategy for minimizing unproductive situations of cranes in a rail–rail transshipment yard', 'M. N. Abourraja, M. Oudani, M. Y. Samiri, J.Boukachour, A. EL Fazziki, A Bouain, M. Najib', '2017', 'Revue', 'Simulation, journals.sagepub.com', NULL, 3, 30),
(49, 'The “Dual-Ants Colony”: A Novel Hybrid Approach for the Flexible Job Shop Scheduling Problem with Preventive Maintenance', 'El Khoukhi, F., Boukachour, J.,  Alaoui, A. E. H', '2017', 'Revue', 'Computers & Industrial Engineering', NULL, 3, 30),
(50, 'Allocation of Static and Dynamic Wireless Power Transmitters Within the Port of Le Havre', 'N. Mouhrim, A. EL Hilali Alaoui, J. Boukachour, D. Boudebous', '2018', 'Chapitre', 'In book  Innovations in Smart Cities and Applications, Proceedings of the 2nd Mediterranean Symposium on Smart City Applications, Publish : Springer International Publishing, ISBN: 978-3-319-74499-5', 'https://www.springerprofessional.de/en/allocation-of-static-and-dynamic-wireless-power-transmitters-wit/15550274', 3, 30),
(51, 'Innovative Port Logistics Through Coupled Optimization/Simulation Approaches', 'M. Oudani, A. Benghalia, J. Boukachour, D. Boudebous, A. EL Hilali Alaoui', '2018', 'Chapitre', 'In book: Contemporary Approaches and Strategies for Applied Logistics, Chapter: 13, Publisher: IGI Global Editors: Lincoln C. Wood', NULL, 3, 30),
(53, 'Les signaux AIS et les SIG pour l’étude du trafic maritime', 'Arnaud Serry & Ronan Kerbiriou', '2018', 'Communication', NULL, NULL, 1, 46),
(54, 'The automatic identification system (AIS) : a data source for studying maritime traffic : The case of the Adriatic Sea', 'Ronan Kerbiriou & Arnaud Serry', '2018', 'Communication', NULL, NULL, 1, 46),
(55, 'Automatic Identification System (AIS) as a Tool to Study Maritime Traffic: the Case of theBaltic Sea', 'Arnaud Serry', '2017', 'Communication', NULL, NULL, 1, 46),
(56, ' Borne duale du problème de gestion du flot de conteneurs dans un réseau multimodal', ' Mohamed Hemmidy, Cédric Joncour, Sophie Miche Michel, Adnan Yassine', '2017', 'Conférence', 'Conférence ROADEF 2017 - Metz', NULL, 3, 32),
(57, 'Optimization of Containers Transfer in Le Havre Port: a New Algorithm for the Railway Transportation System', 'Naoufal Rouky, Paulin Couzon, Jaouad Boukachour, Dalila Boudebous, Ahmed El Hilali Alaoui', '2018', 'Conférence', '16th IFAC Symposium on Information Control Problems in Manufacturing Bergamo, Italy. June 11-13, 2018', 'https://d1keuthy5s86c8.cloudfront.net/static/ems/upload/files/zcjrr_0327_FI.pdf', 3, 30),
(60, 'Corporate Social Responsability of a French SME in the transport sector : Pathways to effective implementation', 'Marie-Laure Baron et Suzanne Apitsa', '2018', 'Chapitre', 'Marie-Laure Baron et Suzanne Apitsa (2018), « Corporate Social Responsability of a French SME in the transport sector : Pathways to effective implementation», in Tench R., Sun W., Jones B. (Eds.), The critical State of Corporate Social Responsibility in Europe, Emerald Books Publishing. ', '', 2, 10),
(61, 'Les conditions d’émergence d’une stratégie collective dans une industrie fragmentée : une application aux activités logistiques du port du Havre', 'Marie-Laure Baron', '2018', 'Conférence', 'Marie-Laure Baron, Les conditions d’émergence d’une stratégie collective dans une industrie fragmentée : une application aux activités logistiques du port du Havre, 2008-2017, RIRL, Paris, mai 2018.', '', 2, 10),
(62, 'Les conditions d’adoption d’un changement organisationnel par les prestataires de services logistiques : Le cas d’un service ferroviaire', 'Ali Khodadad et M-L Baron', '2019', 'Conférence', 'Ali Khodadad et M-L Baron (2018), « Les conditions d’adoption d’un changement organisationnel par les prestataires de services logistiques : Le cas d’un service ferroviaire », GOL, Le Havre.', '', 2, 10),
(63, 'Measuring the performance of the Green Supply Chain, a methodology and discussion applied to potatoe distribution in Northern France', 'Marie-Laure Baron', '2017', 'Conférence', 'ML Baron (2017), Measuring the performance of the Green Supply Chain, a methodology and discussion applied to potatoe distribution in Northern France», Hamburg International Conference on Logistics, Octobre. ', '', 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `publier`
--

DROP TABLE IF EXISTS `publier`;
CREATE TABLE IF NOT EXISTS `publier` (
  `id_publication` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  KEY `publier_ibfk_1` (`id_publication`),
  KEY `publier_ibfk_2` (`id_utilisateur_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publier`
--

INSERT INTO `publier` (`id_publication`, `id_utilisateur_detail`) VALUES
(53, 10),
(53, 15);

-- --------------------------------------------------------

--
-- Structure de la table `sous_action`
--

DROP TABLE IF EXISTS `sous_action`;
CREATE TABLE IF NOT EXISTS `sous_action` (
  `id_sous_action` int(11) NOT NULL AUTO_INCREMENT,
  `num_sous_action` varchar(255) DEFAULT NULL,
  `nom_sous_action` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
  PRIMARY KEY (`id_sous_action`),
  KEY `id_action` (`id_action`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sous_action`
--

INSERT INTO `sous_action` (`id_sous_action`, `num_sous_action`, `nom_sous_action`, `id_action`) VALUES
(30, NULL, NULL, 0),
(31, NULL, NULL, 4),
(32, '1', 'Amélioration de la performance logistique centrée sur le passage du port élargi : Modèle permettant la gestion des véhicules de transport, le stockage et le transfert intra-portuaire des conteneurs dans un modèle global, plateforme multi-agents pour la modélisation/simulation du port étendu, problématique de stockage sur les terminaux portuaires, valorisation.', 3),
(33, '2', 'Dynamique des flux globalisés dans un corridor logistique . Développement du concept de réseau intégré multi-acteurs et multimodal, Modélisation des relations entre de multiples acteurs, optimisations à partir des données générées dans l\'Action 1.', 3),
(34, '3', 'Aide au pilotage temps réel d\'un corridor logistique (intégration des aléas)', 3),
(35, '1', 'Environnement et chaînes logistiques : Mesurer la perception par le consommateur des coûts écologiques de la logistique et l’impact sur la chaîne, comparer cette perception sur différents continents.', 2),
(36, '2', 'Logistique urbaine et environnement. Mesurer la faisabilité technique et organisationnelle d’une réduction de la livraison à domicile au profit de la livraison hors domicile sur le terrain de l\'Axe Seine (Le Havre, Rouen, Paris Saint Lazare). Identifier des projets innovants en matière de logistique urbaine, Modalités de gouvernance de la mutualisation urbaine et facteurs de réussite.', 2),
(37, '3', 'Coordination, échanges et émergence de compétences collectives, approche par les Eco-Systèmes d\'Affaires. Interaction entre acteurs privés et publics sur la chaîne logistique, dynamique des écosystèmes et impact sur le corridor.', 2),
(38, '1', ' Pilotage et coordination du projet, en liaison avec SFLOG et toutes les équipes, coordination, valorisation, gestion administrative des données', 1),
(39, '2', 'Gestion et fiabilisation des données, intégration de nouvelles demandes, Développement d\'outils d\'analyse spatiale.', 1),
(40, '3', 'Acquisition et enrichissement de données, données maritimes, qualité des données et premiers développements, modèle d\'anticipation de l\'arrivée des navires à quai', 1),
(41, '4', 'Données maritimes et interface recherche. Déploiement des capteurs, développement d\'un outil de prévision des escales (avec le LMAH). Dialogue avec les chercheurs et milieux économiques, valorisation.', 1),
(42, '5', 'Valorisation, innovation : mutualisation des données autour d\'une plateforme Axe Seine.', 1),
(61, '1', 'Elaborer une base de connaissances sur les trafics et les risques, en utilisant le contentieux lié au trafic sur l’Axe Seine.', 5),
(62, '2', 'Le rôle des acteurs dans le développement d\'une place portuaire, les transitaire.', 5),
(63, '3', 'L\'Axe Seine et la normalisation ISO 26 000 des acteurs.', 5),
(64, '4', 'L\'interfaçage de deux corridors : Axe Seine et Corridors d\'Afrique de l\'Ouest.', 5),
(65, '5', 'Développer des systèmes intéropérables pour faciliter le commerce et la logistique.', 5),
(66, '6', 'Conception d\'outils nouveaux pour l\'apprentissage. Conception et réalisation d\'environnements virtuels immersifs pour permettre aux apprenants d\'appréhender de nouveaux environnements de travail, et pour étudier leurs réactions dans cet environnement simulé.', 5);

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

DROP TABLE IF EXISTS `these`;
CREATE TABLE IF NOT EXISTS `these` (
  `id_these` int(11) NOT NULL AUTO_INCREMENT,
  `titre_these` varchar(255) NOT NULL,
  `annee_these` date NOT NULL,
  `soutenant_these` varchar(255) NOT NULL,
  `specialite_these` varchar(255) DEFAULT NULL,
  `jury_these` text,
  `resume_these` text,
  `lien_these` varchar(500) DEFAULT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
  PRIMARY KEY (`id_these`),
  KEY `id_action` (`id_action`),
  KEY `id_utilisateur_detail` (`id_utilisateur_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `these`
--

INSERT INTO `these` (`id_these`, `titre_these`, `annee_these`, `soutenant_these`, `specialite_these`, `jury_these`, `resume_these`, `lien_these`, `id_utilisateur_detail`, `id_action`) VALUES
(1, 'Analyse des mécanismes de gouvernance inter-organisationnels en circuits courts de distribution. Le cas de la relation de confiance en AMAP. ', '2016-11-23', 'Sonia AISSAOUI', 'Sciences de gestion ', '<ul><li>Véronique des GARETS, Professeur Université François Rabelais de Tours (rapporteur)</li><li>Saïd YAMI, Professeur Université Lille 1 (rapporteur)</li><li>Vincent HOVELAQUE, Professeur Université Rennes (suffragant)</li><li>Aline SCOUARNEC, Professeur Université Caen (suffragant)</li><li>Samuel GRANDVAL, Maître de Conférences HDR, Université Le Havre (directeur de thèse)</li><li>Gilles PACHE, Professeur Université Aix-Marseille (directeur de thèse)</li></ul>', 'Analyse des mécanismes de gouvernance inter-organisationnels en circuits courts de distribution. Le cas de la relation de confiance en AMAP.   ', '', 40, 3),
(2, 'Les antécédents à l’adoption de la mutualisation de la logistique urbaine en tant qu’innovation interorganisationnelle : une étude de cas multiple', '2018-03-22', 'Kanyarat NIMTRAKOOL', 'Sciences de gestion', '<ul><li>Michael BROWNE – Professeur des Universités, Université de Gothenburg (Suède)</li><li>Claire CAPO – Maître de conférences, NIMEC, Université Le Havre Normandie</li><li>Odile CHANUT – Professeure des Universités, Université de Lyon</li><li>Samuel GRANDVAL – Maître de conférences HDR, NIMEC, Université Le Havre Normandie, directeur de thèse</li><li>Jean-Luc JARRIN – Président de JAJL Conseil, invité</li><li>Olivier MEIER – Professeur des Universités, Université de Paris-Est</li><li>Martine SPENCE – Professeure agrégée – Université d’Ottawa (Canada)</li></ul>', ' La gestion coordonnée de la logistique sur le territoire urbain est complexe. La mutualisation est une pratique considérée par les parties prenantes comme potentiellement source de performance de la logistique urbaine. Plusieurs expériences de mutualisation urbaine ont néanmoins échoué. En mobilisant la théorie de la diffusion des innovations appliquée au cadre interorganisationnel, nous tentons d’appréhender les antécédents à l’adoption de la mutualisation urbaine en tant que facteurs explicatifs.', '', 10, 2),
(3, 'La contribution des biens communs à la performation de la méta-organisation : le cas des corridors logistico-portuaires', '2018-11-20', 'Antoine KAUFFMANN', 'Sciences de gestion', '<ul><li>Antoine BERBAIN – Directeur général délégué de HAROPA, invité</li><li>Tarek CHANEGRIH – Maître de conférences HDR, Université Caen Normandie</li><li>Odile CHANUT – Professeur des universités, Université de Saint-Etienne</li><li>Samuel GRANDVAL – Maître de conférences HDR, Université Le Havre Normandie, directeur de thèse</li><li>Frank GUERIN – Maître de conférences, Université Le Havre Normandie, co-encadrant</li><li>Vincent HOVELAQUE – Professeur des universités, Université de Rennes</li><li>Gilles PACHE – Professeur des universités, Université d’Aix-Marseille</li></ul>', 'La méta-organisation est une catégorie de réseau inter-organisationnel encore méconnue. Ce travail de thèse a pour objectif de mettre en évidence les caractéristiques de la contribution de plusieurs catégories de biens communs à leur performation organisationnelle. Dans cet objectif, nous effectuons une analyse qualitative portant sur le cas des corridors logistico-portuaires à partir de documents officiels et d’entretiens. ', '', 10, 2),
(4, 'Gestion de flot de conteneurs et de véhicules dans un réseau multimodal. ', '2018-12-06', 'Mohamed HEMMIDY', 'Mathématiques', '<ul><li>Nathalie BOSTEL - Professeur des universités, Université de Nantes</li><li>Mohamed DIDI BIHA - Professeur des universités, Université de Caen Normandie</li><li>Andrea Cynthia DUHAMEL - Maître de conférences HDR, Université de Technologie de Troyes</li><li>Cédric JONCOUR - Maître de conférences, Université Le Havre Normandie (membre invité)</li><li>Sophie MICHEL - Maître de conférences, Université Le Havre Normandie (membre invité)</li><li>Abdelkader SBIHI - Professeur des universités, ESCEM Ecole de Management, Tours</li><li>Adnan YASSINE - Professeur des universités, Université Le Havre Normandie, directeur de thèse</li></ul>', 'Nous avons développé un modèle mathématique réaliste qui prend en considération les différents aspects liés au transport et au stockage de conteneurs dans un réseau multimodal, dont l’objectif est de minimiser le coût global de transport (coûts de transports, stockages, manutention et déplacements de véhicules) tout en respectant les différentes contraintes liées au transport et aux stockages des différents types de conteneurs et la nature de leurs contenus. Un modèle agrégé est construit dans le but de la construction d’une borne duale et d’une borne primale pour le problème initial. ', '', 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_detail`
--

DROP TABLE IF EXISTS `utilisateur_detail`;
CREATE TABLE IF NOT EXISTS `utilisateur_detail` (
  `id_utilisateur_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur_detail`),
  KEY `id_utilisateur_commune` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur_detail`
--

INSERT INTO `utilisateur_detail` (`id_utilisateur_detail`, `id_utilisateur`) VALUES
(1, 1),
(2, 18),
(3, 19),
(4, 20),
(5, 21),
(6, 22),
(7, 23),
(8, 24),
(9, 25),
(10, 26),
(112, 26),
(11, 27),
(12, 29),
(13, 30),
(14, 31),
(15, 32),
(16, 33),
(17, 34),
(18, 35),
(19, 36),
(20, 37),
(21, 38),
(22, 39),
(23, 40),
(24, 41),
(25, 42),
(26, 43),
(27, 44),
(28, 45),
(29, 46),
(30, 47),
(31, 48),
(32, 49),
(33, 50),
(34, 51),
(35, 52),
(36, 53),
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
(53, 72),
(54, 73),
(55, 74),
(56, 75),
(57, 76),
(58, 77),
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
(115, 115),
(123, 116),
(121, 118);

--
-- Contraintes pour les tables déchargées
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
-- Contraintes pour la table `publier`
--
ALTER TABLE `publier`
  ADD CONSTRAINT `publier_ibfk_1` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id_publication`),
  ADD CONSTRAINT `publier_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
