-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 20 Novembre 2017 à 14:14
-- Version du serveur :  5.5.55-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `igloo_webprojects`
--

-- --------------------------------------------------------

--
-- Structure de la table `cms_languages`
--

CREATE TABLE IF NOT EXISTS `cms_languages` (
`id` int(11) NOT NULL,
  `nom` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cms_languages`
--

INSERT INTO `cms_languages` (`id`, `nom`) VALUES
(35, 'Joomla'),
(36, 'Wordpress'),
(37, 'Drupal'),
(38, 'Prestashop');

-- --------------------------------------------------------

--
-- Structure de la table `plugins`
--

CREATE TABLE IF NOT EXISTS `plugins` (
`id` int(11) NOT NULL,
  `nom` varchar(225) NOT NULL,
  `id_cms_language` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `plugins`:
--   `id_cms_language`
--       `cms_languages` -> `id`
--

--
-- Contenu de la table `plugins`
--

INSERT INTO `plugins` (`id`, `nom`, `id_cms_language`) VALUES
(15, 'Gravity Forms', 36),
(16, 'Site map', 38),
(17, 'Xpert Scrollbar', 35),
(18, 'Block class', 37);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `project_name` varchar(225) NOT NULL,
  `id_cms` int(11) NOT NULL,
  `version` varchar(225) NOT NULL,
  `hebergeur` varchar(255) NOT NULL,
  `id_statut` int(11) NOT NULL,
  `comments` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `projects`:
--   `id_cms`
--       `cms_languages` -> `id`
--   `id_statut`
--       `statuts` -> `id`
--

--
-- Contenu de la table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `id_cms`, `version`, `hebergeur`, `id_statut`, `comments`) VALUES
(122, 'Hôtel de ville', 36, '4.3.3', 'OVH', 9, 'En cours de développement'),
(123, '1,2,3 Beauty', 38, '3.6.9', '1&1', 8, 'En construction'),
(124, 'Makeup Artist', 35, '4.3.3', 'Lws', 7, 'Bientôt terminé'),
(125, 'Fashion Shopping', 37, '3.5.8', '', 11, 'A améliorer !');

-- --------------------------------------------------------

--
-- Structure de la table `projects_plugins`
--

CREATE TABLE IF NOT EXISTS `projects_plugins` (
`id` int(11) NOT NULL,
  `id_projects` int(11) NOT NULL,
  `id_plugins` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `projects_plugins`:
--   `id_projects`
--       `projects` -> `id`
--   `id_plugins`
--       `plugins` -> `id`
--

--
-- Contenu de la table `projects_plugins`
--

INSERT INTO `projects_plugins` (`id`, `id_projects`, `id_plugins`) VALUES
(90, 122, 15),
(91, 123, 16),
(92, 124, 17),
(93, 125, 18);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE IF NOT EXISTS `statuts` (
`id` int(11) NOT NULL,
  `nom` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `statuts`
--

INSERT INTO `statuts` (`id`, `nom`) VALUES
(7, 'Production'),
(8, 'Hors-ligne'),
(9, 'Developpement'),
(10, 'En-ligne'),
(11, 'Beta');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `pseudo` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `motdepasse` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(1, 'jean', 'hello@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'sally', 'jny66000@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(3, 'hysis', 'ice.tea.mangue@hotmail.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(4, 'apple', 'ice.tea.mangue@gmail.fr', '3be803573bf56690e1c7b7b457dc45a08047eec5'),
(5, 'sallysmiile', 'hallo@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(6, 'sallysmiile', 'halloo@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(7, 'sallysmiile', 'hallouo@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(8, 'sally', 'LA@gmail.com', '70c881d4a26984ddce795f6f71817c9cf4480e79'),
(9, 'Théo', 'theo@gmail.com', 'cf91a9cfe0882326bc9e5276dcdb1cce8cbef4ce'),
(10, 'Hysis', 'los@gmail.com', '71c61afd3e6c02b5e4c2b4234787bd42baf83efd');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cms_languages`
--
ALTER TABLE `cms_languages`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plugins`
--
ALTER TABLE `plugins`
 ADD PRIMARY KEY (`id`), ADD KEY `id_cms_language` (`id_cms_language`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`), ADD KEY `id_cms` (`id_cms`), ADD KEY `id_statut` (`id_statut`);

--
-- Index pour la table `projects_plugins`
--
ALTER TABLE `projects_plugins`
 ADD PRIMARY KEY (`id`), ADD KEY `id_projects` (`id_projects`), ADD KEY `id_plugins` (`id_plugins`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cms_languages`
--
ALTER TABLE `cms_languages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `plugins`
--
ALTER TABLE `plugins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT pour la table `projects_plugins`
--
ALTER TABLE `projects_plugins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `plugins`
--
ALTER TABLE `plugins`
ADD CONSTRAINT `plugins_ibfk_1` FOREIGN KEY (`id_cms_language`) REFERENCES `cms_languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_cms`) REFERENCES `cms_languages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`id_statut`) REFERENCES `statuts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projects_plugins`
--
ALTER TABLE `projects_plugins`
ADD CONSTRAINT `projects_plugins_ibfk_1` FOREIGN KEY (`id_projects`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `projects_plugins_ibfk_2` FOREIGN KEY (`id_plugins`) REFERENCES `plugins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
