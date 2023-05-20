
--
-- Structure de la table `changement is the result of creaiting a ord row and make modification in the products table `
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
-- Structure de la table `list_prodoit is a table to store all the data about the medication dci name dosage all `
--

CREATE TABLE `list_prodoit` (
  `id` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `dci` tinytext DEFAULT NULL,
  `dosage` tinytext DEFAULT NULL,
  `form` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Structure de la table `noncompliant`  represent all the product not served in an ord 
--

CREATE TABLE `noncompliant` (
  `list_prodoit` int(11) DEFAULT NULL,
  `ord_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ord` is the prescreptions or you can say the sales 
--

CREATE TABLE `ord` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_pharm` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `ord_date` datetime DEFAULT current_timestamp(),
  `next_date` datetime DEFAULT current_timestamp(),
  `order_ord` tinytext DEFAULT NULL,
  `dure` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT current_timestamp(),
  `complited` tinyint(1) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL
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

-

-- --------------------------------------------------------

--
-- Structure de la table `prodoit` this table is the envontery 

--

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

--
-- Structure de la table `users` the users of the web site 
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_pharm` int(11) NOT NULL,
  `name` tinytext DEFAULT NULL,
  `username` tinytext DEFAULT NULL,
  `pwd` tinytext DEFAULT NULL,
  `role` varchar(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Index pour la table `changement` is the products chnage and the data for the products of every or (sales )
--
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT pour la table `list_prodoit`
--
ALTER TABLE `list_prodoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `noncompliant`
--
ALTER TABLE `noncompliant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `pharm`
--
ALTER TABLE `pharm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `prodoit`
--
ALTER TABLE `prodoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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

