-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 07:55
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

--
-- Déchargement des données de la table `changement`
--

INSERT INTO `changement` (`id`, `amount`, `id_prodoit`, `id_ord`) VALUES
(14, 10, 36, 28),
(27, 9, 43, 39),
(28, 3, 42, 39),
(29, 3, 42, 40),
(30, 5, 42, 41),
(31, 9, 37, 42),
(32, 5, 40, 43);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `fname` tinytext DEFAULT NULL,
  `name` tinytext DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `card` tinytext DEFAULT NULL,
  `adress` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `fname`, `name`, `Date_of_Birth`, `created`, `card`, `adress`) VALUES
(1, 'Tifoura', 'Nacera ', '1952-06-16', '2022-04-07 08:16:06', 'user_null.jpg', 'ben mhidi el tarf rue 41'),
(2, 'Menib', 'Ouarda', '1952-06-16', '2022-04-07 08:16:06', 'user_null.jpg', 'ben mhidi el tarf rue 41'),
(3, 'Guelati', 'Asma', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(4, 'Hadjam', 'faouzi ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(5, 'Menai', 'Houriya', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(6, 'Rouibi', 'med ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(7, 'Houachri', 'samiha ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(8, 'Soltani', 'Fethi', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(9, 'Boudar', 'zineddine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(10, 'Ali', 'khelil abdelraouf', '1952-06-16', '2022-04-07 08:16:06', 'user_null.jpg', 'ben mhidi el tarf rue 41'),
(11, 'siaouane', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(12, 'Nafnaf', 'abdelkader', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(13, 'Khemaissia', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(14, 'Bares', 'mehdi', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(15, 'Younes', 'med saleh', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(16, 'Kehili', 'samir', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(17, 'Rechrache', 'Nacer', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(18, 'Benmalek', 'fatma', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(19, 'Amari', 'zakaria', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(20, 'Sedraoui', 'hadda ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(21, 'Yermach', 'sabira', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(22, 'Bouhaouli', 'laid ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(23, 'Bouguera', 'tahar', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(24, 'Kanouni', 'Samir', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(25, 'Yousfi', 'med', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(26, 'Debabi', 'Brahim', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(27, 'Bessioud', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(28, 'khaldi', 'azzedine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(29, 'Ghoumari', 'A/ouaheb', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(30, 'Mahfoudi', 'A/nour', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(31, 'Bouchoucha', 'saida', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(32, 'Bouzid', 'meriem ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(33, 'Mazouz', 'Cherif', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(34, 'Torchi', 'kamel', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(35, 'Kanouni', 'Aicha', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(36, 'Boutaghane', 'siham', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(37, 'Aouad', 'Ramzi ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(38, 'Rahli', 'saida', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(39, 'Benzeghimi', 'Aicha ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(40, 'Kouadria', 'keltoum', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(41, 'Khamassi', 'Ahlam', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(42, 'Trea', 'med laid', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(43, 'Gueldasni', 'Hamza ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(44, 'Hezam', 'brahim', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(45, 'Ouali', 'Adel', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(46, 'Chabbi', 'Reda ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(47, 'Boughaba', 'A/aziz', '1952-06-16', '2022-04-07 08:16:06', 'Capture d\'écran 2023-05-20 031703.png', 'ben mhidi el tarf rue 41'),
(48, 'Khenouche', 'Samir', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(49, 'Achouri', 'elHadi', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(50, 'Hamriou', 'Yazid', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(51, 'Sahia', 'larbi ', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(52, 'Ghemida', 'youcef', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(53, 'Maalem', 'Bilel', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(54, 'Bouchoucha', 'Kamel', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(55, 'Bouhadeb', 'Mabrouka', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(56, 'Siab', 'Fares', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(57, 'Boutaleb', 'Imen', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(58, 'Benmechter', 'Fouad', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(61, 'Bouguera', 'djamel eddine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(62, 'Arifi', 'khadra', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(63, 'Benbouzid', 'miloud', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(64, 'Bekhakhcha', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(65, 'Zouaoui', 'rebeh', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(66, 'Menaiaia', 'abdessalam', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(67, 'Tifoura', 'Salima', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(68, 'Bouguera', 'khadoudja', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(70, 'Rouaimia', 'bilel', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(71, 'Khoudja', 'chaima', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(72, 'Benaouadi', 'badri', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(73, 'Chouchane', 'selma', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(74, 'Brahmi', 'Yazid', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(75, 'Ziani', 'Bahdja', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(76, 'Ghanai', 'Ahcen', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(77, 'Gasmoune', 'saliha', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(78, 'Boughaba', 'salim', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(79, 'Soufi', 'Bariza', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(80, 'Ouali', 'fella', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(81, 'Dif', 'Riadh', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(82, 'Haif', 'saleh', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(83, 'Koraichi', 'siham', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(84, 'Hmaidi', 'miloud', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(85, 'Aouadi', 'hicham', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(86, 'Bechani', 'zakia', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(87, 'Fartas', 'seif eddine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(88, 'oulhaci', 'med saleh', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(89, 'Bouguera', 'walid', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(90, 'Abadlia', 'Hanene', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(91, 'oulhaci', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(92, 'Ouanes', 'Abdenasser', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(93, 'Hanachi', 'Amel', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(94, 'Kahilicccc', 'zoubida', '1952-06-16', '2022-04-07 08:16:06', '1311860.jpeg', 'ben mhidi el tarf rue 41'),
(95, 'Amri', 'someya', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(96, 'Hemici', 'samir', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(97, 'Nahouchi', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(98, 'Djedaidi', 'mohamed', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(99, 'Boudjedra', 'aymen', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(100, 'Bouallagui', 'fatiha', '1952-06-16', '2022-04-07 08:16:06', 'user_null.jpg', 'ben mhidi el tarf rue 41'),
(101, 'Boulifa', 'otman', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(102, 'Bechachhia', 'Abla', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(103, 'Skikdi', 'mustafa', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(104, 'Klai', 'chaabi', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(105, 'Bouhadjera', 'bachir', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(106, 'Zannat', 'fethi', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(107, 'Abaiz', 'fatima', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(108, 'Haizi', 'yassine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(109, 'Bounaadja', 'kamer ezzemene', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(110, 'Belloum', 'boudjemaa', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(111, 'Achichi', 'mihoub', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(112, 'Bouchmala', 'issam', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(113, 'Sissaoui', 'khaled', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(114, 'Boumedris', 'Wassim', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(115, 'khaoua', 'Abdelaziz', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(116, 'Benallouche', 'Hafsia', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(117, 'Bouacha', 'mamdouh', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(118, 'Zouzou', 'reda', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(119, 'Soualem', 'Fattoum', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(120, 'Bourafa', 'salim', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(121, 'Bouanani', 'bariza', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(122, 'Ghemida', 'Houcine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(123, 'Dif', 'sami', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(124, 'Khelil', 'souhaib', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(125, 'Sbai', 'Kheireddine', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(126, 'Diaf', 'malyk', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(127, 'Azizi', 'soltana', '1952-06-16', '2022-04-07 08:16:06', NULL, 'ben mhidi el tarf rue 41'),
(128, 'boulahbal', 'mohssen', '1952-06-16', '2023-05-14 15:47:49', 'user_null.jpg', 'ben mhidi el tarf rue 41'),
(129, 'boulahba7411', 'mohssen', '1952-06-16', '2023-05-14 15:49:05', NULL, 'ben mhidi el tarf rue 41'),
(130, 'boulahba7411', 'mohssen', '1952-06-16', '2023-05-14 15:49:05', NULL, 'ben mhidi el tarf rue 41'),
(131, 'boulahbal', 'abdel rahmabn', '1952-06-16', '2023-05-14 15:57:46', NULL, 'ben mhidi el tarf rue 41'),
(132, 'nomber 1', 'client', '1952-06-16', '2023-05-14 16:14:59', NULL, 'ben mhidi el tarf rue 41'),
(134, 'ayad', 'louai', '1952-06-16', '2023-05-18 02:04:36', 'user_null.jpg', 'ben mhidi el tarf rue 41'),
(135, 'merdassi', 'karim', '2000-02-23', '2023-05-28 14:33:23', 'user_null.jpg', 'nothing 25'),
(136, 'abadda', 'djamel', NULL, '2023-05-28 22:18:47', NULL, ''),
(137, 'khemassi', 'akrem', NULL, '2023-05-31 02:19:52', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `inventory`
--

CREATE TABLE `inventory` (
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
-- Déchargement des données de la table `inventory`
--

INSERT INTO `inventory` (`list_prodoit`, `pharm`, `lot`, `amount`, `Expiration`, `created`, `inserted`, `id`) VALUES
(42, 15, '13', 0, '2023-05-31 05:53:39', '2023-05-21 06:10:48', NULL, 36),
(36, 15, '13', 0, '2023-05-31 02:20:42', '2023-05-21 06:10:48', NULL, 37),
(42, 15, '13', 0, '2023-05-31 05:53:36', '2023-05-24 10:14:52', NULL, 38),
(36, 17, '13', 10, '2023-10-01 23:00:00', '2023-05-28 23:26:32', NULL, 39),
(52, 17, '13', 5, '2023-05-31 02:27:07', '2023-05-28 23:26:32', NULL, 40),
(19, 17, '13', 10, '2023-05-30 23:00:00', '2023-05-28 23:26:32', NULL, 41),
(19, 15, '13', 0, '2023-05-31 02:16:49', '2023-05-31 02:13:19', NULL, 42),
(32, 15, '13', 44, '2023-05-31 05:54:30', '2023-05-31 02:13:45', NULL, 43),
(19, 15, '10', 100, '2023-05-30 23:00:00', '2023-05-31 05:53:53', NULL, 44);

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

--
-- Déchargement des données de la table `list_prodoit`
--

INSERT INTO `list_prodoit` (`id`, `name`, `dci`, `dosage`, `form`) VALUES
(1, 'DIAZEPAM', 'DIAZEPAM', '10MG/2ML', NULL),
(2, 'VALZEPAM', 'DIAZEPAM', '10MG/2ML', NULL),
(3, 'VALIUM', 'DIAZEPAM', '10MG', NULL),
(4, 'PAX', 'DIAZEPAM', '10MG', NULL),
(5, 'NOVAPAM', 'DIAZEPAM', '2MG', NULL),
(6, 'DIAZEPAM-RATIOPHARM', 'DIAZEPAM', '2MG', NULL),
(7, 'VALIUM', 'DIAZEPAM', '2MG', NULL),
(8, 'VALZEPAM', 'DIAZEPAM', '5MG', NULL),
(9, 'NOVAPAM', 'DIAZEPAM', '5MG', NULL),
(10, 'DIAZEPAM-RATIOPHARM', 'DIAZEPAM', '5MG', NULL),
(11, 'VALIUM', 'DIAZEPAM', '5MG', NULL),
(12, 'DIAZAL 5', 'DIAZEPAM', '5MG', NULL),
(13, 'VALZEPAM', 'DIAZEPAM', '10MG', NULL),
(14, 'NOVAPAM', 'DIAZEPAM', '10MG', NULL),
(15, 'DIAZEPAM-RATIOPHARM', 'DIAZEPAM', '10MG', NULL),
(16, 'DIAZAL 10', 'DIAZEPAM', '10MG', NULL),
(17, 'DIAZEPAM', 'DIAZEPAM', '1%', NULL),
(18, 'VALIUM', 'DIAZEPAM', '1%', NULL),
(19, 'LYSANXIA', 'PRAZEPAM', '10MG', NULL),
(20, 'LYSANXIA', 'PRAZEPAM', '15MG/ML', NULL),
(21, 'LIZAM', 'DIAZEPAM', '10MG', NULL),
(22, 'TRAMADOL LS', 'TRAMADOL CHLORHYDRATE', '100MG', NULL),
(23, 'STILNOX', 'ZOLPIDEM', '10MG', NULL),
(24, 'TRAMGESIC', 'TRAMADOL HYDROCHLORIDE', '50MG', NULL),
(25, 'TREMADOL', 'TRAMADOL', '50MG', NULL),
(26, 'SUPRAMADOL', 'TRAMADOL CHLORHYDRATE', '50MG', NULL),
(27, 'LYRICA', 'PREGABALINE', '25 MG', NULL),
(28, 'LYRICA', 'PREGABALINE', '50 MG', NULL),
(29, 'LYRICA', 'PREGABALINE', '100MG', NULL),
(30, 'LYRICA', 'PREGABALINE', '150MG', NULL),
(31, 'LYRICA', 'PREGABALINE', '300 MG', NULL),
(32, 'TRAMADOL LS', 'TRAMADOL', '50MG', NULL),
(33, 'TRAMADOL IBERAL', 'TRAMADOL CHLORHYDRATE', '50MG', NULL),
(34, 'TRAMADOL SANDOZ', 'TRAMADOL CHLORHYDRATE', '50MG', NULL),
(35, 'DOLTRAM', 'TRAMADOL CHLORHYDRATE', '50MG', NULL),
(36, 'XAVEL', 'DIAZEPAM', '1%(10MG/ML)', NULL),
(37, 'DOLTRAM', 'TRAMADOL', '150MG', NULL),
(38, 'DOLTRAM', 'TRAMADOL', '200MG', NULL),
(39, 'ZODID', 'TRAMADOL CHLORHYDRATE', '50MG', NULL),
(40, 'DUOFEM', 'TRAMADOL', '50MG', NULL),
(41, 'TRAMGESIC', 'TRAMADOL', '50MG/1ML', NULL),
(42, 'XAMADOL', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(43, 'TRAPAL', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(44, 'DI-DOLEX', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(45, 'RICABALINE', 'PREGABALINE', '150MG', NULL),
(46, 'DOLEX', 'TRAMADOL', '50MG', NULL),
(47, 'ALGIDEX', 'TRAMADOL', '50MG', NULL),
(48, 'TRAMADIS', 'TRAMADOL S/F CHLORHYDRATE', '50 MG', NULL),
(49, 'RICABALINE', 'PREGABALINE', '50 MG', NULL),
(50, 'REGAB', 'PREGABALINE', '300 MG', NULL),
(51, 'REGAB', 'PREGABALINE', '150 MG', NULL),
(52, 'PREGABALINE BEKER', 'PREGABALINE', '300 MG', NULL),
(53, 'TRAMADIS', 'TRAMADOL', '50 MG/ML', NULL),
(54, 'DOLOKIL', 'PARACETAMOL/TRAMADOL CHLORHYDRATE', '325MG/37,5MG', NULL),
(55, 'EXTRAMADOL', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(56, 'PREGABALINE BEKER', 'PREGABALINE', '150 MG', NULL),
(57, 'REGAB', 'PREGABALINE', '50MG', NULL),
(58, 'TRAMAL', 'TRAMADOL', '50MG', NULL),
(59, 'PREGABALINE BEKER', 'PREGABALINE', '50MG', NULL),
(60, 'PREGABALINE LDM', 'PREGABALINE', '50MG', NULL),
(61, 'PREGABALINE LDM', 'PREGABALINE', '150MG', NULL),
(62, 'PREGABALINE LDM', 'PREGABALINE', '300MG', NULL),
(63, 'TRAMADOL NOVAGENERICS', 'TRAMADOL', '50 MG', NULL),
(64, 'PREGABA', 'PREGABALINE', '25MG', NULL),
(65, 'PREGABA', 'PREGABALINE', '50 MG', NULL),
(66, 'PLANADIX ADVANCE', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(67, 'DOLMATOL', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(68, 'DOLMATOL', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(69, 'PREGABA', 'PREGABALINE', '150 MG', NULL),
(70, 'PREGABA', 'PREGABALINE', '300MG', NULL),
(71, 'CETADOL', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(72, 'REGAB', 'PREGABALINE', '75 MG', NULL),
(73, 'NEURICA', 'PREGABALINE', '50MG', NULL),
(74, 'NEURICA', 'PREGABALINE', '150 MG', NULL),
(75, 'PRERICA', 'PREGABALINE', '50MG', NULL),
(76, 'PRERICA', 'PREGABALINE', '150MG', NULL),
(77, 'RICABALINE', 'PREGABALINE', '300 MG', NULL),
(78, 'NEURICA', 'PREGABALINE', '75 MG', NULL),
(79, 'TRAMEX', 'TRAMADOL', '50 MG', NULL),
(80, 'TRAMADOL PLUS', 'PARACETAMOL/TRAMADOL', '325MG/37,5MG', NULL),
(81, 'TRAMADINE', 'TRAMADOL', '100 MG', NULL),
(82, 'NEURAXON', 'PREGABALINE', '50 MG', NULL),
(83, 'NEURAXON 150', 'PREGABALINE', '150 MG', NULL),
(84, 'PREGABALINE BEKER', 'PREGABALINE', '75 MG', NULL),
(105, 'sfsfssf', 'ssffsf', 'sfsfs', 'sfsfsfsf');

-- --------------------------------------------------------

--
-- Structure de la table `noncompliant`
--

CREATE TABLE `noncompliant` (
  `list_prodoit` int(11) DEFAULT NULL,
  `ord_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `noncompliant`
--

INSERT INTO `noncompliant` (`list_prodoit`, `ord_id`, `amount`, `created`, `id`) VALUES
(31, 42, 9, '2023-05-31 02:20:42', 32);

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

--
-- Déchargement des données de la table `pharm`
--

INSERT INTO `pharm` (`id`, `name`, `adress`, `creation`, `email`, `owner`) VALUES
(15, 'mohssen', 'ben mhidi el tarf rue 41', '2023-05-21 06:09:07', 'ledupis2016@gmail.com', 23),
(17, 'hakim pharm', 'ben mhidi ', '2023-05-28 23:25:27', 'mohssenboulahbal@gmail.com', 27);

-- --------------------------------------------------------

--
-- Structure de la table `prescription`
--

CREATE TABLE `prescription` (
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

--
-- Déchargement des données de la table `prescription`
--

INSERT INTO `prescription` (`id`, `id_user`, `id_client`, `id_pharm`, `created`, `ord_date`, `next_date`, `order_ord`, `dure`, `ModifiedDate`, `complited`, `note`) VALUES
(28, 25, 134, 15, '2023-05-26 14:57:04', '2023-02-02 00:00:00', '2023-09-03 00:00:00', 'mmttt8889', 90, '2023-05-26 07:57:04', 1, 'efedfgdgdg'),
(39, 23, 128, 15, '2023-05-31 02:15:20', '2023-05-31 00:00:00', '2023-08-29 00:00:00', 'nomt999', 90, '2023-05-31 03:15:20', 1, ''),
(40, 25, 10, 15, '2023-05-31 02:16:08', '2023-05-21 00:00:00', '2023-08-19 00:00:00', 'my', 90, '2023-05-31 03:16:08', 1, 'fdfdf\r\n'),
(41, 25, 2, 15, '2023-05-31 02:16:49', '2023-05-21 00:00:00', '2023-08-19 00:00:00', '333', 90, '2023-05-31 03:16:49', 1, 'nothing'),
(42, 25, 137, 15, '2023-05-31 02:20:42', '2023-05-02 00:00:00', '2023-07-01 00:00:00', 'nothing', 60, '2023-05-31 03:20:42', 0, 'nothing'),
(43, 27, 134, 17, '2023-05-31 02:27:07', '2023-07-02 00:00:00', '2023-09-30 00:00:00', 'mty39', 90, '2023-05-31 03:27:07', 1, 'tiitt');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_pharm`, `name`, `username`, `pwd`, `role`, `created`) VALUES
(23, 15, 'vender 01', 'vender01', '$2y$10$lC3PoXx9M0SuBuhm4NL8PeA7T2lGi8E7vJuFLwfyvZkKmAqTblRW2', 'owner', '2023-05-21 06:09:07'),
(25, 15, 'mohssen boulhbal ', 'rahim', '$2y$10$uThDDUbOICptMlUXv85EguxdWq12DDysFuV6P/yaBUHPfSg2maXv.', 'owner', '2023-05-21 19:48:10'),
(27, 17, 'hakim', 'hakim', '$2y$10$RLmvPOAAonaZYasAB76WL.zg01SlErbUNttthuxdcy9Xo3YKhIUMW', 'owner', '2023-05-28 23:25:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `changement`
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
-- Index pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_list_prodoit` (`list_prodoit`),
  ADD KEY `fk_pham_prodoit` (`pharm`);

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
-- Index pour la table `pharm`
--
ALTER TABLE `pharm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_pharm` (`owner`);

--
-- Index pour la table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_client_ord` (`id_client`),
  ADD KEY `fk_pham_ord` (`id_pharm`),
  ADD KEY `fk_user_ord` (`id_user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT pour la table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `list_prodoit`
--
ALTER TABLE `list_prodoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `noncompliant`
--
ALTER TABLE `noncompliant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `pharm`
--
ALTER TABLE `pharm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `changement`
--
ALTER TABLE `changement`
  ADD CONSTRAINT `fk_ord` FOREIGN KEY (`id_ord`) REFERENCES `prescription` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_prodoit` FOREIGN KEY (`id_prodoit`) REFERENCES `inventory` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_list_prodoit` FOREIGN KEY (`list_prodoit`) REFERENCES `list_prodoit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pham_prodoit` FOREIGN KEY (`pharm`) REFERENCES `pharm` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pharm`
--
ALTER TABLE `pharm`
  ADD CONSTRAINT `fk_users_pharm` FOREIGN KEY (`owner`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `fk_client_ord` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pham_ord` FOREIGN KEY (`id_pharm`) REFERENCES `pharm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_ord` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_pharm_users` FOREIGN KEY (`id_pharm`) REFERENCES `pharm` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
