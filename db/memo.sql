-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 mai 2023 à 01:26
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
-- Base de données : `memo`
--

-- --------------------------------------------------------

--
-- Structure de la table `changement`
--

CREATE TABLE `changement` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `id_prodoit` int(11) DEFAULT NULL,
  `id_ord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fname` tinytext DEFAULT NULL,
  `name` tinytext DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `img` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--


-- --------------------------------------------------------

--
-- Structure de la table `list_prodoit`
--

CREATE TABLE `list_prodoit` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `dci` tinytext DEFAULT NULL,
  `dosage` tinytext DEFAULT NULL,
  `form` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `noncompliant` (
  `list_prodoit` int(11) DEFAULT NULL,
  `ord_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ord`
--

CREATE TABLE `ord` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_pharm` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ord_date` datetime DEFAULT current_timestamp(),
  `next_date` datetime DEFAULT current_timestamp(),
  `desc_ord` tinytext DEFAULT NULL,
  `dure` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp(),
  `complited` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pharm`
--

CREATE TABLE `pharm` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `adress` tinytext DEFAULT NULL,
  `creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` tinytext DEFAULT NULL,
  `owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `prodoit` (
  `list_prodoit` int(11) DEFAULT NULL,
  `pharm` int(11) DEFAULT NULL,
  `lot` tinytext DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `Expiration` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `inserted` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_pharm` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `username` tinytext DEFAULT NULL,
  `pwd` tinytext DEFAULT NULL,
  `role` varchar(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `changement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ord` (`id_ord`),
  ADD KEY `fk_prodoit` (`id_prodoit`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `list_prodoit`
--
ALTER TABLE `list_prodoit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `noncompliant`
--
ALTER TABLE `noncompliant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_list_prodoit` (`list_prodoit`);

--
-- Index pour la table `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client_ord` (`id_client`),
  ADD KEY `fk_pham_ord` (`id_pharm`),
  ADD KEY `fk_user_ord` (`id_user`);

--
-- Index pour la table `pharm`
--
ALTER TABLE `pharm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_pharm` (`owner`);

--
-- Index pour la table `prodoit`
--
ALTER TABLE `prodoit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_list_prodoit` (`list_prodoit`),
  ADD KEY `fk_pham_prodoit` (`pharm`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pharm_users` (`id_pharm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `changement`
--
ALTER TABLE `changement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `list_prodoit`
--
ALTER TABLE `list_prodoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT pour la table `noncompliant`
--
ALTER TABLE `noncompliant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pharm`
--
ALTER TABLE `pharm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `prodoit`
--
ALTER TABLE `prodoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `changement`
--
ALTER TABLE `changement`
  ADD CONSTRAINT `fk_ord` FOREIGN KEY (`id_ord`) REFERENCES `ord` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prodoit` FOREIGN KEY (`id_prodoit`) REFERENCES `prodoit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ord`
--
ALTER TABLE `ord`
  ADD CONSTRAINT `fk_client_ord` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pham_ord` FOREIGN KEY (`id_pharm`) REFERENCES `pharm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_ord` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pharm`
--
ALTER TABLE `pharm`
  ADD CONSTRAINT `fk_users_pharm` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prodoit`
--
ALTER TABLE `prodoit`
  ADD CONSTRAINT `fk_list_prodoit` FOREIGN KEY (`list_prodoit`) REFERENCES `list_prodoit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pham_prodoit` FOREIGN KEY (`pharm`) REFERENCES `pharm` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_pharm_users` FOREIGN KEY (`id_pharm`) REFERENCES `pharm` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
