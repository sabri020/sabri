-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 24 avr. 2023 à 19:02
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `tel` varchar(18) NOT NULL,
  `datenaiss` date NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `adresse`, `tel`, `datenaiss`, `password`) VALUES
(0, 'Sabri', 'Wanene', 'wanene.sabri@gmail.com', 'jjjjjjj', '06060606', '2023-04-03', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(80) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `Name`, `Surname`, `email`, `phone`) VALUES
(1, 'sabri', 'wabe', 'dadazd@live.fr', '12241545');

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE `enseigne` (
  `id` int(11) NOT NULL,
  `nom_enseigne` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseigne`
--

INSERT INTO `enseigne` (`id`, `nom_enseigne`) VALUES
(1, 'amazon');

-- --------------------------------------------------------

--
-- Structure de la table `retour`
--

CREATE TABLE `retour` (
  `id` int(11) NOT NULL,
  `date_achat` date NOT NULL,
  `date_retour` datetime NOT NULL,
  `statut` int(11) NOT NULL,
  `nom_article` varchar(64) NOT NULL,
  `motif_retour` text NOT NULL,
  `montant_article` decimal(10,0) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_enseigne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `retour`
--

INSERT INTO `retour` (`id`, `date_achat`, `date_retour`, `statut`, `nom_article`, `motif_retour`, `montant_article`, `id_client`, `id_enseigne`) VALUES
(2, '0000-00-00', '2023-04-23 13:07:54', 0, '', '', 0, 0, 1),
(3, '2000-01-20', '2000-02-20 00:00:00', 1, 'xxxx', 'xsqsdqsd', 10, 0, 1),
(4, '2020-11-11', '2020-11-12 00:00:00', 0, 'xxxxx', 'oiioioiooi', 14, 0, 1),
(5, '2020-10-10', '2021-10-12 00:00:00', 1, '1', '1', 1, 0, 1),
(6, '2011-11-11', '1202-01-11 00:00:00', 0, '1', '1', 1, 0, 1),
(7, '0000-00-00', '1111-11-11 00:00:00', 1, '11', '1', 1, 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `retour`
--
ALTER TABLE `retour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_enseigne` (`id_enseigne`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `enseigne`
--
ALTER TABLE `enseigne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `retour`
--
ALTER TABLE `retour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `retour`
--
ALTER TABLE `retour`
  ADD CONSTRAINT `retour_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `retour_ibfk_2` FOREIGN KEY (`id_enseigne`) REFERENCES `enseigne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
