-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 21 mai 2023 à 05:59
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
(17, 50, 30, 14);

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
(1, 'Tifoura', 'Nacera ', '2023-02-20', '2022-04-07 08:16:06', 'user_null.jpg', ''),
(2, 'Menib', 'Ouarda', '2020-03-12', '2022-04-07 08:16:06', 'user_null.jpg', ''),
(3, 'Guelati', 'Asma', NULL, '2022-04-07 08:16:06', NULL, ''),
(4, 'Hadjam', 'faouzi ', NULL, '2022-04-07 08:16:06', NULL, ''),
(5, 'Menai', 'Houriya', NULL, '2022-04-07 08:16:06', NULL, ''),
(6, 'Rouibi', 'med ', NULL, '2022-04-07 08:16:06', NULL, ''),
(7, 'Houachri', 'samiha ', NULL, '2022-04-07 08:16:06', NULL, ''),
(8, 'Soltani', 'Fethi', NULL, '2022-04-07 08:16:06', NULL, ''),
(9, 'Boudar', 'zineddine', NULL, '2022-04-07 08:16:06', NULL, ''),
(10, 'Ali', 'khelil abdelraouf', '1980-05-23', '2022-04-07 08:16:06', 'user_null.jpg', ''),
(11, 'siaouane', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(12, 'Nafnaf', 'abdelkader', NULL, '2022-04-07 08:16:06', NULL, ''),
(13, 'Khemaissia', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(14, 'Bares', 'mehdi', NULL, '2022-04-07 08:16:06', NULL, ''),
(15, 'Younes', 'med saleh', NULL, '2022-04-07 08:16:06', NULL, ''),
(16, 'Kehili', 'samir', NULL, '2022-04-07 08:16:06', NULL, ''),
(17, 'Rechrache', 'Nacer', NULL, '2022-04-07 08:16:06', NULL, ''),
(18, 'Benmalek', 'fatma', NULL, '2022-04-07 08:16:06', NULL, ''),
(19, 'Amari', 'zakaria', NULL, '2022-04-07 08:16:06', NULL, ''),
(20, 'Sedraoui', 'hadda ', NULL, '2022-04-07 08:16:06', NULL, ''),
(21, 'Yermach', 'sabira', NULL, '2022-04-07 08:16:06', NULL, ''),
(22, 'Bouhaouli', 'laid ', NULL, '2022-04-07 08:16:06', NULL, ''),
(23, 'Bouguera', 'tahar', NULL, '2022-04-07 08:16:06', NULL, ''),
(24, 'Kanouni', 'Samir', NULL, '2022-04-07 08:16:06', NULL, ''),
(25, 'Yousfi', 'med', NULL, '2022-04-07 08:16:06', NULL, ''),
(26, 'Debabi', 'Brahim', NULL, '2022-04-07 08:16:06', NULL, ''),
(27, 'Bessioud', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(28, 'khaldi', 'azzedine', NULL, '2022-04-07 08:16:06', NULL, ''),
(29, 'Ghoumari', 'A/ouaheb', NULL, '2022-04-07 08:16:06', NULL, ''),
(30, 'Mahfoudi', 'A/nour', NULL, '2022-04-07 08:16:06', NULL, ''),
(31, 'Bouchoucha', 'saida', NULL, '2022-04-07 08:16:06', NULL, ''),
(32, 'Bouzid', 'meriem ', NULL, '2022-04-07 08:16:06', NULL, ''),
(33, 'Mazouz', 'Cherif', NULL, '2022-04-07 08:16:06', NULL, ''),
(34, 'Torchi', 'kamel', NULL, '2022-04-07 08:16:06', NULL, ''),
(35, 'Kanouni', 'Aicha', NULL, '2022-04-07 08:16:06', NULL, ''),
(36, 'Boutaghane', 'siham', NULL, '2022-04-07 08:16:06', NULL, ''),
(37, 'Aouad', 'Ramzi ', NULL, '2022-04-07 08:16:06', NULL, ''),
(38, 'Rahli', 'saida', NULL, '2022-04-07 08:16:06', NULL, ''),
(39, 'Benzeghimi', 'Aicha ', NULL, '2022-04-07 08:16:06', NULL, ''),
(40, 'Kouadria', 'keltoum', NULL, '2022-04-07 08:16:06', NULL, ''),
(41, 'Khamassi', 'Ahlam', NULL, '2022-04-07 08:16:06', NULL, ''),
(42, 'Trea', 'med laid', NULL, '2022-04-07 08:16:06', NULL, ''),
(43, 'Gueldasni', 'Hamza ', NULL, '2022-04-07 08:16:06', NULL, ''),
(44, 'Hezam', 'brahim', NULL, '2022-04-07 08:16:06', NULL, ''),
(45, 'Ouali', 'Adel', NULL, '2022-04-07 08:16:06', NULL, ''),
(46, 'Chabbi', 'Reda ', NULL, '2022-04-07 08:16:06', NULL, ''),
(47, 'Boughaba', 'A/aziz', NULL, '2022-04-07 08:16:06', NULL, ''),
(48, 'Khenouche', 'Samir', NULL, '2022-04-07 08:16:06', NULL, ''),
(49, 'Achouri', 'elHadi', NULL, '2022-04-07 08:16:06', NULL, ''),
(50, 'Hamriou', 'Yazid', NULL, '2022-04-07 08:16:06', NULL, ''),
(51, 'Sahia', 'larbi ', NULL, '2022-04-07 08:16:06', NULL, ''),
(52, 'Ghemida', 'youcef', NULL, '2022-04-07 08:16:06', NULL, ''),
(53, 'Maalem', 'Bilel', NULL, '2022-04-07 08:16:06', NULL, ''),
(54, 'Bouchoucha', 'Kamel', NULL, '2022-04-07 08:16:06', NULL, ''),
(55, 'Bouhadeb', 'Mabrouka', NULL, '2022-04-07 08:16:06', NULL, ''),
(56, 'Siab', 'Fares', NULL, '2022-04-07 08:16:06', NULL, ''),
(57, 'Boutaleb', 'Imen', NULL, '2022-04-07 08:16:06', NULL, ''),
(58, 'Benmechter', 'Fouad', NULL, '2022-04-07 08:16:06', NULL, ''),
(61, 'Bouguera', 'djamel eddine', NULL, '2022-04-07 08:16:06', NULL, ''),
(62, 'Arifi', 'khadra', NULL, '2022-04-07 08:16:06', NULL, ''),
(63, 'Benbouzid', 'miloud', NULL, '2022-04-07 08:16:06', NULL, ''),
(64, 'Bekhakhcha', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(65, 'Zouaoui', 'rebeh', NULL, '2022-04-07 08:16:06', NULL, ''),
(66, 'Menaiaia', 'abdessalam', NULL, '2022-04-07 08:16:06', NULL, ''),
(67, 'Tifoura', 'Salima', NULL, '2022-04-07 08:16:06', NULL, ''),
(68, 'Bouguera', 'khadoudja', NULL, '2022-04-07 08:16:06', NULL, ''),
(70, 'Rouaimia', 'bilel', NULL, '2022-04-07 08:16:06', NULL, ''),
(71, 'Khoudja', 'chaima', NULL, '2022-04-07 08:16:06', NULL, ''),
(72, 'Benaouadi', 'badri', NULL, '2022-04-07 08:16:06', NULL, ''),
(73, 'Chouchane', 'selma', NULL, '2022-04-07 08:16:06', NULL, ''),
(74, 'Brahmi', 'Yazid', NULL, '2022-04-07 08:16:06', NULL, ''),
(75, 'Ziani', 'Bahdja', NULL, '2022-04-07 08:16:06', NULL, ''),
(76, 'Ghanai', 'Ahcen', NULL, '2022-04-07 08:16:06', NULL, ''),
(77, 'Gasmoune', 'saliha', NULL, '2022-04-07 08:16:06', NULL, ''),
(78, 'Boughaba', 'salim', NULL, '2022-04-07 08:16:06', NULL, ''),
(79, 'Soufi', 'Bariza', NULL, '2022-04-07 08:16:06', NULL, ''),
(80, 'Ouali', 'fella', NULL, '2022-04-07 08:16:06', NULL, ''),
(81, 'Dif', 'Riadh', NULL, '2022-04-07 08:16:06', NULL, ''),
(82, 'Haif', 'saleh', NULL, '2022-04-07 08:16:06', NULL, ''),
(83, 'Koraichi', 'siham', NULL, '2022-04-07 08:16:06', NULL, ''),
(84, 'Hmaidi', 'miloud', NULL, '2022-04-07 08:16:06', NULL, ''),
(85, 'Aouadi', 'hicham', NULL, '2022-04-07 08:16:06', NULL, ''),
(86, 'Bechani', 'zakia', NULL, '2022-04-07 08:16:06', NULL, ''),
(87, 'Fartas', 'seif eddine', NULL, '2022-04-07 08:16:06', NULL, ''),
(88, 'oulhaci', 'med saleh', NULL, '2022-04-07 08:16:06', NULL, ''),
(89, 'Bouguera', 'walid', NULL, '2022-04-07 08:16:06', NULL, ''),
(90, 'Abadlia', 'Hanene', NULL, '2022-04-07 08:16:06', NULL, ''),
(91, 'oulhaci', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(92, 'Ouanes', 'Abdenasser', NULL, '2022-04-07 08:16:06', NULL, ''),
(93, 'Hanachi', 'Amel', NULL, '2022-04-07 08:16:06', NULL, ''),
(94, 'Kahili', 'zoubida', NULL, '2022-04-07 08:16:06', NULL, ''),
(95, 'Amri', 'someya', NULL, '2022-04-07 08:16:06', NULL, ''),
(96, 'Hemici', 'samir', NULL, '2022-04-07 08:16:06', NULL, ''),
(97, 'Nahouchi', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(98, 'Djedaidi', 'mohamed', NULL, '2022-04-07 08:16:06', NULL, ''),
(99, 'Boudjedra', 'aymen', NULL, '2022-04-07 08:16:06', NULL, ''),
(100, 'Bouallagui', 'fatiha', '2000-02-03', '2022-04-07 08:16:06', 'user_null.jpg', ''),
(101, 'Boulifa', 'otman', NULL, '2022-04-07 08:16:06', NULL, ''),
(102, 'Bechachhia', 'Abla', NULL, '2022-04-07 08:16:06', NULL, ''),
(103, 'Skikdi', 'mustafa', NULL, '2022-04-07 08:16:06', NULL, ''),
(104, 'Klai', 'chaabi', NULL, '2022-04-07 08:16:06', NULL, ''),
(105, 'Bouhadjera', 'bachir', NULL, '2022-04-07 08:16:06', NULL, ''),
(106, 'Zannat', 'fethi', NULL, '2022-04-07 08:16:06', NULL, ''),
(107, 'Abaiz', 'fatima', NULL, '2022-04-07 08:16:06', NULL, ''),
(108, 'Haizi', 'yassine', NULL, '2022-04-07 08:16:06', NULL, ''),
(109, 'Bounaadja', 'kamer ezzemene', NULL, '2022-04-07 08:16:06', NULL, ''),
(110, 'Belloum', 'boudjemaa', NULL, '2022-04-07 08:16:06', NULL, ''),
(111, 'Achichi', 'mihoub', NULL, '2022-04-07 08:16:06', NULL, ''),
(112, 'Bouchmala', 'issam', NULL, '2022-04-07 08:16:06', NULL, ''),
(113, 'Sissaoui', 'khaled', NULL, '2022-04-07 08:16:06', NULL, ''),
(114, 'Boumedris', 'Wassim', NULL, '2022-04-07 08:16:06', NULL, ''),
(115, 'khaoua', 'Abdelaziz', NULL, '2022-04-07 08:16:06', NULL, ''),
(116, 'Benallouche', 'Hafsia', NULL, '2022-04-07 08:16:06', NULL, ''),
(117, 'Bouacha', 'mamdouh', NULL, '2022-04-07 08:16:06', NULL, ''),
(118, 'Zouzou', 'reda', NULL, '2022-04-07 08:16:06', NULL, ''),
(119, 'Soualem', 'Fattoum', NULL, '2022-04-07 08:16:06', NULL, ''),
(120, 'Bourafa', 'salim', NULL, '2022-04-07 08:16:06', NULL, ''),
(121, 'Bouanani', 'bariza', NULL, '2022-04-07 08:16:06', NULL, ''),
(122, 'Ghemida', 'Houcine', NULL, '2022-04-07 08:16:06', NULL, ''),
(123, 'Dif', 'sami', NULL, '2022-04-07 08:16:06', NULL, ''),
(124, 'Khelil', 'souhaib', NULL, '2022-04-07 08:16:06', NULL, ''),
(125, 'Sbai', 'Kheireddine', NULL, '2022-04-07 08:16:06', NULL, ''),
(126, 'Diaf', 'malyk', NULL, '2022-04-07 08:16:06', NULL, ''),
(127, 'Azizi', 'soltana', NULL, '2022-04-07 08:16:06', NULL, ''),
(128, 'boulahba', 'mohssen', NULL, '2023-05-14 15:47:49', NULL, ''),
(129, 'boulahba7411', 'mohssen', NULL, '2023-05-14 15:49:05', NULL, ''),
(130, 'boulahba7411', 'mohssen', NULL, '2023-05-14 15:49:05', NULL, ''),
(131, 'boulahbal', 'abdel rahmabn', NULL, '2023-05-14 15:57:46', NULL, ''),
(132, 'nomber 1', 'client', NULL, '2023-05-14 16:14:59', NULL, ''),
(133, 'dddd', 'TRAMADOL LS 100MG', NULL, '2023-05-17 00:05:31', NULL, ''),
(134, 'ayad', 'louai', '2000-05-01', '2023-05-18 02:04:36', 'user_null.jpg', 'ben mhidi el tarf rue 36');

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
(3, 10, '18', 100, '2023-05-16 23:00:00', '2023-04-30 12:37:13', NULL, 4),
(4, 10, '13', 0, '2023-05-18 03:01:45', '2023-04-30 12:37:13', NULL, 5),
(5, 10, '5220', 0, '2023-05-13 02:45:34', '2023-04-30 12:37:13', NULL, 6),
(5, 10, '20', 0, '2023-05-15 16:53:41', '2023-05-01 04:13:22', NULL, 7),
(3, 10, '19', 0, '2023-05-15 16:53:37', '2023-05-01 04:14:50', NULL, 8),
(3, 10, '20', 0, '2023-05-15 16:53:36', '2023-05-01 04:15:05', NULL, 9),
(3, 10, '21', 0, '2023-05-15 16:53:34', '2023-05-01 04:16:03', NULL, 10),
(18, 10, '12', 100, '2023-05-18 03:00:24', '2023-05-01 05:02:15', NULL, 11),
(84, 10, '12', 0, '2023-05-13 02:38:15', '2023-05-01 07:29:32', NULL, 12),
(36, 10, '123', 0, '2023-05-13 02:38:10', '2023-05-01 07:45:16', NULL, 13),
(100, 10, '20', 0, '2023-05-14 22:44:29', '2023-05-14 22:44:09', NULL, 27),
(2, 12, '15', 100, '2023-05-16 23:00:00', '2023-05-15 22:43:20', NULL, 28),
(42, 10, '13', 100, '2023-06-09 07:00:00', '2023-05-16 09:27:12', NULL, 29),
(22, 10, '1000', 0, '2023-05-18 03:01:33', '2023-05-16 09:38:30', NULL, 30),
(18, 10, '13', 100, '2023-05-18 07:00:00', '2023-05-16 11:59:19', NULL, 31);

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
(99, 'notthing ', 'nothing', '50 mg', '55555'),
(100, 'vrrr', 'ffff', '20 3mg', 'ddd'),
(101, 'vrrr', 'ffff', '20 3mg', 'ddd'),
(102, 'nothing', 'rrrrr', '100 mg ', 'dfghghjgfyhjfghjghfjghfj'),
(103, 'cvbn ', 'dfgrfh', '200000 mg', 'nothing'),
(104, 'zolidreat ', 'dcifi', 'dxvc', 'VBVV');

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
(10, 'hakim', 'ben mehidi rue 44', '2023-04-14 04:21:31', 'mohssenboulahbal3333@gmail.com', 11),
(12, 'nothing', 'ffffffff', '2023-05-15 22:42:25', 'mohssenboulahbal@gmail.com', 18),
(13, 'nothing159', 'ben mhidi el tarf rue 36', '2023-05-17 11:08:30', 'jomia@gmail.com', 19);

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
(14, 11, 134, 10, '2023-05-18 02:05:24', '2023-04-20 00:00:00', '2028-07-19 00:00:00', '000', 90, '2023-05-17 19:05:24', 1, 'vdfdsf');

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
(11, 10, 'hakim benerhal', 'hakim10', '$2y$10$9zA6vMLlfLJe7OI7HLjvXu1PxGNkzWGQ/1mG.D9kqFmi3jWYyeOcy', 'owner', '2023-04-14 04:21:31'),
(17, 10, 'mohssen boulahbal ', 'sadwik159', '$2y$10$2tJjyuURdqJeDTplxsmhR.1uUaMfd08s001jNPu96qHo2.czXsKxu', 'salesperson', '2023-05-14 09:29:32'),
(18, 12, 'nothing', 'nothing12', '$2y$10$KAKxZ7f4vOnpC/gE4R56ze8gTR/bsNeUxp9y8.ZKT//jDfA8QL01m', 'owner', '2023-05-15 22:42:25'),
(19, 13, 'nothing159', 'nothing15913', '$2y$10$O7QPh4Rv1fPdvEveqLhDFOIF0O9RigBTKayx//aPr7N2ovRp2Kpi2', 'owner', '2023-05-17 11:08:30'),
(20, 10, 'mehdi boutgane ', 'mehdi159', '$2y$10$2Y5o5mao4DAJz7v9VLUayOo/NLXbfEQp7NsaQHYUJzpfCiFTvDr/G', 'salesperson', '2023-05-21 01:46:22');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT pour la table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `list_prodoit`
--
ALTER TABLE `list_prodoit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `noncompliant`
--
ALTER TABLE `noncompliant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `pharm`
--
ALTER TABLE `pharm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
