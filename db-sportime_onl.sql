-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 03 fév. 2024 à 15:02
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
-- Base de données : `sportime_onl`
--

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int(5) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `temps`
--

CREATE TABLE `temps` (
  `id` int(5) NOT NULL,
  `minutes` int(2) DEFAULT NULL,
  `secondes` int(2) DEFAULT NULL,
  `millisecondes` int(2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `coureur_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`id`,`coureur_id`),
  ADD KEY `fk_temps_coureurs_idx` (`coureur_id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `temps`
--
ALTER TABLE `temps`
  ADD CONSTRAINT `fk_temps_coureurs` FOREIGN KEY (`coureur_id`) REFERENCES `participants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
