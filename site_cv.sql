-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Janvier 2017 à 19:35
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_cv`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id_competence` int(7) NOT NULL,
  `competence` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id_competence`, `competence`) VALUES
(22, 'HTML5'),
(23, 'CSS3'),
(24, 'JavaScript'),
(25, 'MySQL'),
(26, 'PHP'),
(27, 'GitHub'),
(28, 'Sublime Text 4'),
(29, 'InDesign CC'),
(31, 'Photoshop CC');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL,
  `nom_contact` varchar(255) NOT NULL,
  `prenom_contact` int(255) NOT NULL,
  `email_contact` int(255) NOT NULL,
  `telephone_contact` varchar(255) NOT NULL,
  `id_utilisateur` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id_xp` int(7) NOT NULL,
  `titre_xp` text NOT NULL,
  `date_xp` date DEFAULT NULL,
  `description_xp` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `experiences`
--

INSERT INTO `experiences` (`id_xp`, `titre_xp`, `date_xp`, `description_xp`) VALUES
(9, 'Intégrateur développeur web junior', '2017-03-15', '<p>Stage en entreprise de 2 mois en tant qu&#39;int&eacute;grateur d&eacute;veloppeur web junior &agrave;...</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(7) NOT NULL,
  `titre_formation` varchar(255) NOT NULL,
  `date_formation` text NOT NULL,
  `description_formation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `titre_formation`, `date_formation`, `description_formation`) VALUES
(1, 'Certification d''intégrateur développeur web', '2016 -2017', '<p>Formation WebForce3 au m&eacute;tier d&#39;int&eacute;grateur d&eacute;veloppeur web d&#39; une dur&eacute;e de 10 mois, dispens&eacute;e par l&#39;organisme Le PoleS, Grande &Eacute;cole du Num&eacute;rique &agrave; Villeneuve-la-Garenne.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

CREATE TABLE `loisirs` (
  `id_loisir` int(7) NOT NULL,
  `titre_loisir` varchar(50) NOT NULL,
  `description_loisir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `loisirs`
--

INSERT INTO `loisirs` (`id_loisir`, `titre_loisir`, `description_loisir`) VALUES
(1, 'Échecs', 'isudvddùôhin\r\n'),
(2, 'Rubik''s cube 3x3', '<p>Casse-tête crée en 1973 par <strong>Ern? Rubik </strong>et basé sur la reflexion et la logique.</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(7) NOT NULL,
  `titre_portfolio` varchar(255) NOT NULL,
  `img_portfolio` varchar(255) NOT NULL,
  `description_porfolio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `titres`
--

CREATE TABLE `titres` (
  `id_titre` smallint(7) NOT NULL,
  `titre_titre` text NOT NULL,
  `logo_titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` smallint(5) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL COMMENT 'varchar car 0 n''est pas un entier',
  `mdp` varchar(13) NOT NULL,
  `age` smallint(5) NOT NULL,
  `sexe` enum('homme','femme') NOT NULL,
  `etat_civil` enum('marié','célibataire') NOT NULL,
  `pays` varchar(25) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `pseudo` varchar(13) NOT NULL,
  `avatar` varchar(13) NOT NULL,
  `note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `telephone`, `mdp`, `age`, `sexe`, `etat_civil`, `pays`, `ville`, `adresse`, `code_postal`, `pseudo`, `avatar`, `note`) VALUES
(1, 'coudert', 'eric', 'ericcoudert@ymail.com', '06 15 76 24 21', 'hiroshima68', 38, 'homme', 'célibataire', 'france', 'clichy-la-garenne', '6 rue du professeur rené leriche ', '92110', 'rico68', '', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id_xp`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `loisirs`
--
ALTER TABLE `loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Index pour la table `titres`
--
ALTER TABLE `titres`
  ADD PRIMARY KEY (`id_titre`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id_competence` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id_xp` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `loisirs`
--
ALTER TABLE `loisirs`
  MODIFY `id_loisir` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `titres`
--
ALTER TABLE `titres`
  MODIFY `id_titre` smallint(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
