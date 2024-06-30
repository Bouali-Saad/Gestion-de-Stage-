-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 19:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `usersdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Admin_name` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `Admin_name`, `Admin_Email`, `Admin_Password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `telephone` text NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `université` varchar(250) NOT NULL,
  `ville` varchar(200) NOT NULL,
  `NiveauScolaire` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`client_id`, `nom_complet`, `telephone`, `adresse`, `université`, `ville`, `NiveauScolaire`, `email`, `mdp`, `cv`, `entreprise_id`, `is_active`) VALUES
(16, 'saad', '656706154', '', '', '', '', 'bouali2@gmail.com', '123', '', NULL, 1),
(19, 'badr', '+212656706154', 'badr@gmail.com', '', 'casablanca', 'bac+2', 'badr@gmail.com', '1234', '', NULL, 1),
(20, 'walid', '0', '', '', '', '', 'walid@gmail.com', '123', '', NULL, 1),
(22, 'yooussef', '0', '', '', '', '', 'youssef@gmail.com', '123', '', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `entreprise_id` int(11) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `telephone_entreprise` text NOT NULL,
  `ville_entreprise` varchar(100) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `Raison` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `domaine` varchar(252) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`entreprise_id`, `nom_complet`, `telephone_entreprise`, `ville_entreprise`, `adresse`, `Raison`, `email`, `mdp`, `domaine`, `is_active`) VALUES
(1, 'CEGEDIM', 'saad', 'Casablanca', '', 'CEGEDIM', 'prof1@gmail.com', '123', 'informatique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offredestage`
--

CREATE TABLE `offredestage` (
  `offre_id` int(11) NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` varchar(50) NOT NULL,
  `skills_required` varchar(255) NOT NULL,
  `interns_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offredestage`
--

INSERT INTO `offredestage` (`offre_id`, `entreprise_id`, `titre`, `description`, `duration`, `skills_required`, `interns_required`) VALUES
(39, 1, 'Développeur Web Full Stack', ' Le stage de Développeur Web Full Stack offre une opportunité unique d\'acquérir une expérience pratique dans le domaine du développement web. Vous travaillerez au sein de notre équipe de développement pour concevoir, développer et déployer des applications web innovantes. Sous la supervision de nos ingénieurs seniors, vous participerez à toutes les phases du cycle de développement logiciel, de la conception initiale à la mise en production.', '4mois', 'bac+1', 0),
(41, 1, 'OFFRE1 ', '', '3mois', 'JAVA', 0);

-- --------------------------------------------------------

--
-- Structure de la table `postulations`
--

CREATE TABLE `postulations` (
  `postulation_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `offre_id` int(11) DEFAULT NULL,
  `date_postulation` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` text NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `acceptee` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postulations`
--

INSERT INTO `postulations` (`postulation_id`, `client_id`, `offre_id`, `date_postulation`, `email`, `entreprise_id`, `acceptee`) VALUES
(75, 20, 18, '2024-05-20 09:50:32', '', 7, 0),
(77, 20, 15, '2024-05-21 12:36:43', '', 6, 0),
(127, 20, 38, '2024-05-22 11:03:02', '', 8, 1),
(128, 20, 20, '2024-05-22 11:04:30', '', 1, 1),
(132, 19, 38, '2024-05-22 11:41:04', '', 8, 1),
(143, 19, 40, '2024-05-24 18:46:05', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nombre` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `date`, `nombre`) VALUES
(1, '2024-05-19', 2),
(2, '2024-05-20', 5),
(3, '2024-05-21', 3),
(4, '2024-05-17', 2),
(5, '2024-05-16', 1),
(6, '2024-05-15', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`entreprise_id`);

--
-- Index pour la table `offredestage`
--
ALTER TABLE `offredestage`
  ADD PRIMARY KEY (`offre_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `postulations`
--
ALTER TABLE `postulations`
  ADD PRIMARY KEY (`postulation_id`),
  ADD UNIQUE KEY `unique_client_offre` (`client_id`,`offre_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `entreprise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `offredestage`
--
ALTER TABLE `offredestage`
  MODIFY `offre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `postulations`
--
ALTER TABLE `postulations`
  MODIFY `postulation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offredestage`
--
ALTER TABLE `offredestage`
  ADD CONSTRAINT `offredestage_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`entreprise_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
