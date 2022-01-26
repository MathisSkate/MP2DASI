-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 08 mars 2019 à 13:53
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `template`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `nom_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `auteur_publication` varchar(500) NOT NULL,
  `annee_publication` varchar(4) NOT NULL,
  `type_publication` enum('Article','Revue','Conference','Communication','Chapitre') NOT NULL,
  `information_publication` text,
  `lien_publication` varchar(500) DEFAULT NULL,
  `id_action` int(11) NOT NULL,
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
  MODIFY `id_utilisateur_detail` int(11) NOT NULL AUTO_INCREMENT;

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
