-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 08 mars 2019 à 13:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `classe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `nom_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`id_action`, `nom_action`) VALUES
(0, 'Pilotage du projet.'),
(1, 'Constituer une base de données sur l’Axe Seine (Région Normandie, IDF, éventuellement Picardie) en reliant le trafic maritime au trafic terrestre.'),
(2, 'Imaginer des organisations collectives performantes et innovantes et gouverner la chaîne logistique'),
(3, 'Concevoir des modèles de représentation du corridor à différentes échelles, du nœud portuaire à la plateforme multimodale jusqu’au corridor pour simuler l’activité et l’optimiser.'),
(4, 'Utiliser les systèmes d’information pour fluidifier le trafic et contribuer à l’intégration d’acteurs hétérogènes.'),
(5, 'Appréhender la vulnérabilité des chaînes logistiques.'),
(6, 'test duvallet');

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(11) NOT NULL,
  `type_actualite` enum('Article','Evenement') NOT NULL,
  `titre_actualite` varchar(255) NOT NULL,
  `description_actualite` text NOT NULL,
  `resume_actualite` varchar(500) NOT NULL,
  `date_actualite` date NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `type_actualite`, `titre_actualite`, `description_actualite`, `resume_actualite`, `date_actualite`, `id_utilisateur_detail`) VALUES
(1, 'Evenement', 'Journée de restitution du projet CLASSE (02/07/2018)', '<h2><span lang=\"fr-FR\">Programme&nbsp;</span></h2><ul><li><p><span lang=\"fr-FR\"><strong>08h45 : Accueil caf&eacute;</strong></span></p></li><li><p><span lang=\"fr-FR\">09h00 : Point &agrave; date du projet</span></p></li><li><p><span lang=\"fr-FR\">09h15 : Pr&eacute;sentation du site internet CLASSE (Norvan Plaissy), Plateforme de donn&eacute;es (Claude Duvallet).</span></p></li><li><p><span lang=\"fr-FR\">09h45 : Signaux AIS (Claude Duvallet)</span></p></li><li><p><span lang=\"fr-FR\"><strong>10h00 : Pause caf&eacute;&nbsp;</strong></span></p></li><li><p><span lang=\"fr-FR\"><strong>10h15</strong></span><span lang=\"fr-FR\">&nbsp;</span><span lang=\"fr-FR\"><strong>: Exploitation des donn&eacute;es AIS, Gestion de l&rsquo;accostage des navires (Abderrahmen Belfikh).&nbsp;</strong></span>&nbsp;</p></li><li><p><span lang=\"fr-FR\">10h40 : Typologie des risques li&eacute;s au transport dans un corridor logistique : Base de connaissances issue du contentieux judiciaire li&eacute; au trafic via les ports de l&rsquo;axe Seine. (Val&eacute;rie Bailly-Hascoet, IDIT, Action 5).</span></p></li><li><p><span lang=\"fr-FR\">11h00 : Alliances, faillite et risque armateurs (Action 5)</span>&nbsp;</p></li><li><p><span lang=\"fr-FR\">11h15 : Les flux dans les mod&egrave;les dynamiques (Mathilde Vernet)</span></p></li><li><p><span lang=\"fr-FR\">11h35 : Thibaut D&eacute;marre</span></p></li><li><p><span lang=\"fr-FR\">11h55 : Bilan des travaux du LITIS.</span></p></li><li><p><strong><span lang=\"fr-FR\">12h00 : D&eacute;jeuner &agrave; la brasserie du CROUS.&nbsp;</span></strong></p></li><li><p><strong><span lang=\"fr-FR\">13h45 : Bilan LMAH</span></strong></p></li><li><p><span lang=\"fr-FR\">14h00 : R&eacute;sultats de la recherche INSA</span></p></li><li><p><span lang=\"fr-FR\">14h20 : Bilan NIMEC, entrepreneuriat collectif et gouvernance. &nbsp;</span><span lang=\"fr-FR\">Pr&eacute;sentation Samuel Grandval</span></p></li><li><p><span lang=\"fr-FR\">14h40 : Compte rendu de la visite des ports d&rsquo;Anvers et Rotterdam (Olivier Joly)</span></p></li><li><p><span lang=\"fr-FR\">15h00 : Ports et corridors Africains, un &eacute;tat des lieux (Benjamin Steck)&nbsp;</span></p></li><li><p><span lang=\"fr-FR\">15h20 : Pause caf&eacute;</span></p></li><li><p><strong><span lang=\"fr-FR\">15h40 : Discussion : valorisation et perspectives.&nbsp;</span></strong></p></li></ul><p><br></p><p><strong><span lang=\"fr-FR\">Lieu :&nbsp;</span></strong><strong><span lang=\"fr-FR\">UFR Sciences et Techniques, &nbsp;Universit&eacute; Le Havre Normandie, Amphith&eacute;&acirc;tre Normand.&nbsp;</span></strong>&nbsp;</p>', 'Programme de la journée ', '2018-07-02', 10),
(2, 'Evenement', 'Journée de restitution du projet CLASSE (27/10/2017)', '<h2>Programme&nbsp;</h2><ul><li><strong>8h30&nbsp;: Accueil caf&eacute;</strong></li><li>9h&nbsp;: Avancement du projet et pr&eacute;sentation de la journ&eacute;e ML Baron</li><li>9h30-9h45&nbsp;: L&rsquo;apport des technologies du virtuel &agrave; la formation en logistique (Action 5.5.,J. Grieu, F Lecroq, H. Boukachour, Action 5).</li><li>9h45-10h&nbsp;: D&eacute;velopper des syst&egrave;mes interop&eacute;rables pour faciliter le commerce et la logistique (M.Itmi-INSA, J. Verny Neoma RBS, L. Couturier, IDIT, Action5)</li><li>10h-10h15&nbsp;: L&rsquo;influence du consommateur sur la cha&icirc;ne logistique (C. Capo, F. Gu&eacute;rin, Action 2)</li></ul><p><br></p><p><strong>10h15-10h30 : Pause caf&eacute;&nbsp;</strong></p><ul><li><strong>10h30-11h00</strong><strong>: D&eacute;veloppement de la plateforme de donn&eacute;es sur l&rsquo;axe Seine</strong> : informations acquises et partage des donn&eacute;es pour produire des analyses (A. Serry, C. Duvallet, A. Rajabi,R. Kerbiriou, Action 1, ULH). &nbsp;</li><li>11h-11h15&nbsp;: Typologie des risques li&eacute;s au transport dans un corridor logistique : Base de connaissances issue du contentieux judiciaire li&eacute; au trafic via les ports de l&rsquo;axe Seine.( Val&eacute;rie Bailly-Hascoet, IDIT, Action 5).</li><li>11h15-11h30 : La mod&eacute;lisation des escales de navires (Abderrahmen Befikh, Action 1).&nbsp;</li><li>11h30-11h45&nbsp;: Quelle r&eacute;alit&eacute; du corridor logistique ? Une analyse de l&rsquo;&eacute;volution des entreprises havraises, 2009-2016 (Marie-Laure Baron, Action 2.3).</li><li>11h45-12h00 : le r&ocirc;le des transitaires dans l&rsquo;affectation des flux.&nbsp;</li></ul><p><strong>12h : Pause d&eacute;jeuner</strong></p><p><strong>13h : L&rsquo;apport des SI au corridor logistique (INSA, ULH)</strong></p><p>13h-13h15 : L&rsquo;ontologie d&rsquo;un syst&egrave;me inter-organisationnel (H. Abdulrab, INSA)</p><p>13h15-13h30 : L&rsquo;apport de l&rsquo;internet physique &agrave; la gestion d&rsquo;un corridor logistique (H. Mathieu, M. Nakechbandi, J-Y Colin). &nbsp;</p><p><strong>13h30: Des flux massifi&eacute;s au dernier kilom&egrave;tre, la logistique urbaine</strong></p><p>13h30-13h45 : La mutualisation de la logistique urbaine (K. Nimtrakool, C. Capo, S. Grandval).&nbsp;</p><p>13h45-14h : G&eacute;ographie des flux du e-commerce (Emilie Demoyer, S. Deprez)&nbsp;</p><p>14h-14h15 : Proximit&eacute; et mesure des performances.&nbsp;</p><p>14h15-14h30 Relations entre acteurs et d&eacute;cision dans les r&eacute;seaux logistiques (A. Taghipour).&nbsp;</p><p><strong>PAUSE CAFE</strong></p><p><strong>14h:45 Appr&eacute;hender le corridor logistique</strong></p><p>14h45-15h : Quelle gouvernance du corridor logistique ? (Antoine Kauffmann, F. Gu&eacute;rin, S. Grandval, Action 2.3.).&nbsp;</p><p>15h-15h15&nbsp;: Vie et mort d&rsquo;une industrie en lien avec l&rsquo;activit&eacute; portuaire (Nathalie Aubourg/Samuel Grandval, Action 2.3).</p><p><strong>15h15 : Mod&eacute;liser, simuler, optimiser un corridor (Action 3, INSA, ULH, EMN).&nbsp;</strong></p><p>Pr&eacute;sentation des travaux (dont A. Knippel) par A. Yassine, E. Sanlaville.&nbsp;</p><p>&nbsp;15h20-15h35 : Le transfert de voitures neuves sur le terminal roulier, Hamdi Dkhil, LMAH).&nbsp;</p><p>15h35-15h50: Le Dimensionnement d&#39;une plateforme multimodale (Mohamed Hemmidy, LMAH).</p><p>15h50&nbsp;: Optimisation et Simulation du Transport Multimodal des Conteneurs (Naoufal Rouky, LMAH)</p><p>15h30 : Cl&ocirc;ture de la journ&eacute;e</p>', 'Programme de la journée ', '2017-10-27', 10),
(3, 'Evenement', 'Journée de restitution du projet CLASSE (05/04/2017)', '<h2>Programme&nbsp;</h2><ul><li>8h45&nbsp;: Accueil caf&eacute;</li><li>9h15-10h&nbsp;: Point administratif, Louis Sautrel, Julien Baudry, ML Baron</li></ul><h3>10h&nbsp;: Pr&eacute;sentation des travaux de l&rsquo;Action 1&nbsp;: Plateforme de donn&eacute;es</h3><p>10h-10h30 : &laquo;CIRMAR : Acquisition, d&eacute;codage et stockage des donn&eacute;es des donn&eacute;es AIS &raquo;, Claude Duvallet et Aboozar Rajabi (LITIS).&nbsp;</p><p><strong>10h30&nbsp;:</strong><strong>&nbsp;Action 2, Innovation organisationnelle</strong></p><p>10h30-10h50 : &laquo; Les facteurs d&rsquo;adh&eacute;sion &agrave; un centre de consolidation urbaine en tant qu&rsquo;innovation inter-organisationnelle : les cas de Bristol-Bath et de St Etienne &raquo;. &nbsp;Kanyarat Nimtrakool, Samuel Grandval et Claire Capo, NIMEC.</p><p>10h50-11h10 : &laquo;&nbsp;La gouvernance collective, application au corridor logistique&nbsp;&raquo;, Antoine Kauffmann, Frank Guerin et Samuel Grandval, NIMEC.</p><p>11h10-11h30&nbsp;: &laquo;&nbsp;Dynamique de l&rsquo;Ecosyst&egrave;me d&rsquo;affaires logistique du corridor, essais de mesure&nbsp;&raquo;. Marie-Laure Baron, NIMEC.</p><p>Action 3, mod&egrave;les multi-&eacute;chelles</p><p>11h30-11h50 : &laquo; Exportation des pommes de terre de l&rsquo;axe Seine : mod&eacute;lisation &raquo;.</p><h2>11h50 : Action 3, mod&egrave;les multi-&eacute;chelles&nbsp;</h2><p>11h50-12h15&nbsp;: Adnan Yassine, Eric Sanlaville, Arnaud Knippel, point des travaux Action 3 (LMAH, LITIS, LMI,LMN)</p><p><strong><u>Pause d&eacute;jeuner</u></strong> : <strong>12h15/13h30</strong></p><p>13h30-13h45 :&laquo;Le dimensionnement d&rsquo;une plateforme multimodale &raquo;, Mohamed Hemmidy, LMAH.&nbsp;</p><p>13h45-14h00 : &laquo; La Gestion d&#39;un terminal roulier &raquo;, Hamdi DKHIL, LMAH.&nbsp;</p><p>14h-14h10&nbsp;: Sara Tfaili</p><p>14h20-14h40 : &nbsp;Thibaut Demarre</p><p>14h40-15h : K Deghdak</p><p><strong>15h : Action 4, Syst&egrave;mes d&rsquo;information</strong></p><h2>15h-15h20 :&nbsp;Tatyana Poletaeva &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &laquo; Enterprise knowledge management supported by cognitive agents: Application to Classe Project&raquo; (LITIS INSA)</h2><p><strong>15h20: Action 5, vuln&eacute;rabilit&eacute; de la cha&icirc;ne logistique</strong></p><p>15h20-15h40&nbsp;: &laquo;&nbsp;Risques et avaries li&eacute;es au transport dans un corridor logistique&nbsp;&raquo;, premiers r&eacute;sultats issus d&rsquo;une base de connaissances sur le contentieux li&eacute; au trafic sur l&rsquo;axe Seine. Val&eacute;rie Bailly-Hascoet, IDIT. (Action 5.1.)</p><p>15h40-16h &quot;Transitaires, commissionnaires et &nbsp;organisateurs de transport : vecteurs de l&rsquo;attractivit&eacute; des ports normands pour la desserte de l&rsquo;axe Seine ? &#39;&#39; (Olivier Joly, Marina&nbsp;</p><p>16h-16h15 : Un mod&egrave;le de donn&eacute;es s&eacute;mantique pour la norme UN/Edifact -MM Boulares et Itmi &ndash; LITIS INSA.&nbsp;</p><p>16h15-16h30 : Les univers virtuels au service de la logistique (Thierry Galinho, Jean Grieu, Florence Lecroq, Hadoum Boukachour).&nbsp;</p><p>16h20 : Bilan de la journ&eacute;e, pause caf&eacute;.&nbsp;</p><p>Lieu : Campus Logistique de l&rsquo;universit&eacute; du Havre, P&ocirc;le Ing&eacute;nieurs Logistique</p>', 'Programme de la journée ', '2017-04-05', 10);

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

CREATE TABLE `illustrer` (
  `id_media` int(11) NOT NULL,
  `id_actualite` int(11) DEFAULT NULL,
  `id_publication` int(11) DEFAULT NULL,
  `id_these` int(11) DEFAULT NULL
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

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id_media`, `type_media`, `source_media`, `nom_media`) VALUES
(1, 'image', 'actu_defaut_1.jpg', NULL),
(2, 'image', 'actu_defaut_2.jpg', NULL),
(3, 'image', 'actu_defaut_3.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) NOT NULL
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
(6, 5),
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
(6, 20),
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
(3, 31),
(0, 32),
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
(3, 53),
(5, 54),
(5, 55),
(6, 55),
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
  `auteur_publication` varchar(500) NOT NULL,
  `annee_publication` varchar(4) NOT NULL,
  `type_publication` enum('Article','Revue','Conference','Communication','Chapitre') NOT NULL,
  `information_publication` text,
  `lien_publication` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
  `id_utilisateur_detail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `titre_publication`, `auteur_publication`, `annee_publication`, `type_publication`, `information_publication`, `lien_publication`, `id_action`, `id_utilisateur_detail`) VALUES
(16, 'Dynamic Representation  and  Interpretation  in  a  Multiagent  3D  Tutoring  System.', 'Person  P.,  Galinho  T.,  Boukachour  H.,  Lecroq  F.,  Grieu  J. ', '2017', 'Chapitre', 'In:  Sgurev  V., Yager R., Kacprzyk J., Atanassov K. (eds) Recent Contributions in Intelligent Systems. Studies in Computational Intelligence, vol 657, pages 205-227, Springer, Cham. ISBN : 978-3-319-41437-9.', 'https://doi.org/10.1007/978-3-319-41438-6_12', 5, 10),
(18, 'Industrial  Virtual  Environments  and Learning Process', 'Grieu  J.,  Lecroq  F.,  Boukachour  H.,  Galinho  T. ', '2017', 'Article', 'REV2017 :14th International Conference on Remote Engineering and Virtual Instrumentation', NULL, 5, 10),
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
(56, ' Borne duale du problème de gestion du flot de conteneurs dans un réseau multimodal', ' Mohamed Hemmidy, Cédric Joncour, Sophie Miche Michel, Adnan Yassine', '2017', 'Conference', 'Conférence ROADEF 2017 - Metz', NULL, 3, 32),
(57, 'Optimization of Containers Transfer in Le Havre Port: a New Algorithm for the Railway Transportation System', 'Naoufal Rouky, Paulin Couzon, Jaouad Boukachour, Dalila Boudebous, Ahmed El Hilali Alaoui', '2018', 'Conference', '16th IFAC Symposium on Information Control Problems in Manufacturing Bergamo, Italy. June 11-13, 2018', 'https://d1keuthy5s86c8.cloudfront.net/static/ems/upload/files/zcjrr_0327_FI.pdf', 3, 30);

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
-- Déchargement des données de la table `sous_action`
--

INSERT INTO `sous_action` (`id_sous_action`, `num_sous_action`, `nom_sous_action`, `id_action`) VALUES
(11, '1', 'Elaborer une base de connaissances sur les trafics et les risques, en utilisant le contentieux lié au trafic sur l’Axe Seine.', 5),
(12, '2', 'Le rôle des acteurs dans le développement d\'une place portuaire, les transitaire.', 5),
(13, '3', 'L\'Axe Seine et la normalisation ISO 26 000 des acteurs.', 5),
(14, '4', 'L\'interfaçage de deux corridors : Axe Seine et Corridors d\'Afrique de l\'Ouest.', 5),
(15, '5', 'Développer des systèmes intéropérables pour faciliter le commerce et la logistique.', 5),
(16, '6', 'Conception d\'outils nouveaux pour l\'apprentissage. Conception et réalisation d\'environnements virtuels immersifs pour permettre aux apprenants d\'appréhender de nouveaux environnements de travail, et pour étudier leurs réactions dans cet environnement simulé.', 5),
(17, '1', ' Pilotage et coordination du projet, en liaison avec SFLOG et toutes les équipes, coordination, valorisation, gestion administrative des données', 1),
(18, '2', 'Gestion et fiabilisation des données, intégration de nouvelles demandes, Développement d\'outils d\'analyse spatiale.', 1),
(19, '3', 'Acquisition et enrichissement de données, données maritimes, qualité des données et premiers développements, modèle d\'anticipation de l\'arrivée des navires à quai', 1),
(20, '4', 'Données maritimes et interface recherche. Déploiement des capteurs, développement d\'un outil de prévision des escales (avec le LMAH). Dialogue avec les chercheurs et milieux économiques, valorisation.', 1),
(21, '5', 'Valorisation, innovation : mutualisation des données autour d\'une plateforme Axe Seine.', 1),
(24, '1', 'Environnement et chaînes logistiques : Mesurer la perception par le consommateur des coûts écologiques de la logistique et l’impact sur la chaîne, comparer cette perception sur différents continents.', 2),
(25, '2', 'Logistique urbaine et environnement. Mesurer la faisabilité technique et organisationnelle d’une réduction de la livraison à domicile au profit de la livraison hors domicile sur le terrain de l\'Axe Seine (Le Havre, Rouen, Paris Saint Lazare). Identifier des projets innovants en matière de logistique urbaine, Modalités de gouvernance de la mutualisation urbaine et facteurs de réussite.', 2),
(26, '3', 'Coordination, échanges et émergence de compétences collectives, approche par les Eco-Systèmes d\'Affaires. Interaction entre acteurs privés et publics sur la chaîne logistique, dynamique des écosystèmes et impact sur le corridor.', 2),
(27, '1', 'Amélioration de la performance logistique centrée sur le passage du port élargi : Modèle permettant la gestion des véhicules de transport, le stockage et le transfert intra-portuaire des conteneurs dans un modèle global, plateforme multi-agents pour la modélisation/simulation du port étendu, problématique de stockage sur les terminaux portuaires, valorisation.', 3),
(28, '2', 'Dynamique des flux globalisés dans un corridor logistique . Développement du concept de réseau intégré multi-acteurs et multimodal, Modélisation des relations entre de multiples acteurs, optimisations à partir des données générées dans l\'Action 1.', 3),
(29, '3', 'Aide au pilotage temps réel d\'un corridor logistique (intégration des aléas)', 3),
(30, NULL, NULL, 0),
(31, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `these`
--

CREATE TABLE `these` (
  `id_these` int(11) NOT NULL,
  `titre_these` varchar(255) NOT NULL,
  `annee_these` date NOT NULL,
  `directeur_these` varchar(255) NOT NULL,
  `co_executant_these` varchar(255) DEFAULT NULL,
  `jury_these` varchar(500) DEFAULT NULL,
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
(104, 92),
(105, 114);

--
-- Index pour les tables déchargées
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
  ADD KEY `id_action` (`id_action`),
  ADD KEY `id_utiilisateur_detail` (`id_utilisateur_detail`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `sous_action`
--
ALTER TABLE `sous_action`
  MODIFY `id_sous_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `these`
--
ALTER TABLE `these`
  MODIFY `id_these` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur_detail`
--
ALTER TABLE `utilisateur_detail`
  MODIFY `id_utilisateur_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `publication_ibfk_2` FOREIGN KEY (`id_utilisateur_detail`) REFERENCES `utilisateur_detail` (`id_utilisateur_detail`) ON DELETE SET NULL;

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
