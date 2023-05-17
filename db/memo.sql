-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mai 2023 à 13:34
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

INSERT INTO `client` (`id`, `fname`, `name`, `created`, `img`) VALUES
(1, 'Tifoura', 'Nacera ', '2022-04-07 08:16:06', NULL),
(2, 'Menib', 'Ouarda', '2022-04-07 08:16:06', NULL),
(3, 'Guelati', 'Asma', '2022-04-07 08:16:06', NULL),
(4, 'Hadjam', 'faouzi ', '2022-04-07 08:16:06', NULL),
(5, 'Menai', 'Houriya', '2022-04-07 08:16:06', NULL),
(6, 'Rouibi', 'med ', '2022-04-07 08:16:06', NULL),
(7, 'Houachri', 'samiha ', '2022-04-07 08:16:06', NULL),
(8, 'Soltani', 'Fethi', '2022-04-07 08:16:06', NULL),
(9, 'Boudar', 'zineddine', '2022-04-07 08:16:06', NULL),
(10, 'Ali', 'khelil abdelraouf', '2022-04-07 08:16:06', NULL),
(11, 'siaouane', 'mohamed', '2022-04-07 08:16:06', NULL),
(12, 'Nafnaf', 'abdelkader', '2022-04-07 08:16:06', NULL),
(13, 'Khemaissia', 'mohamed', '2022-04-07 08:16:06', NULL),
(14, 'Bares', 'mehdi', '2022-04-07 08:16:06', NULL),
(15, 'Younes', 'med saleh', '2022-04-07 08:16:06', NULL),
(16, 'Kehili', 'samir', '2022-04-07 08:16:06', NULL),
(17, 'Rechrache', 'Nacer', '2022-04-07 08:16:06', NULL),
(18, 'Benmalek', 'fatma', '2022-04-07 08:16:06', NULL),
(19, 'Amari', 'zakaria', '2022-04-07 08:16:06', NULL),
(20, 'Sedraoui', 'hadda ', '2022-04-07 08:16:06', NULL),
(21, 'Yermach', 'sabira', '2022-04-07 08:16:06', NULL),
(22, 'Bouhaouli', 'laid ', '2022-04-07 08:16:06', NULL),
(23, 'Bouguera', 'tahar', '2022-04-07 08:16:06', NULL),
(24, 'Kanouni', 'Samir', '2022-04-07 08:16:06', NULL),
(25, 'Yousfi', 'med', '2022-04-07 08:16:06', NULL),
(26, 'Debabi', 'Brahim', '2022-04-07 08:16:06', NULL),
(27, 'Bessioud', 'mohamed', '2022-04-07 08:16:06', NULL),
(28, 'khaldi', 'azzedine', '2022-04-07 08:16:06', NULL),
(29, 'Ghoumari', 'A/ouaheb', '2022-04-07 08:16:06', NULL),
(30, 'Mahfoudi', 'A/nour', '2022-04-07 08:16:06', NULL),
(31, 'Bouchoucha', 'saida', '2022-04-07 08:16:06', NULL),
(32, 'Bouzid', 'meriem ', '2022-04-07 08:16:06', NULL),
(33, 'Mazouz', 'Cherif', '2022-04-07 08:16:06', NULL),
(34, 'Torchi', 'kamel', '2022-04-07 08:16:06', NULL),
(35, 'Kanouni', 'Aicha', '2022-04-07 08:16:06', NULL),
(36, 'Boutaghane', 'siham', '2022-04-07 08:16:06', NULL),
(37, 'Aouad', 'Ramzi ', '2022-04-07 08:16:06', NULL),
(38, 'Rahli', 'saida', '2022-04-07 08:16:06', NULL),
(39, 'Benzeghimi', 'Aicha ', '2022-04-07 08:16:06', NULL),
(40, 'Kouadria', 'keltoum', '2022-04-07 08:16:06', NULL),
(41, 'Khamassi', 'Ahlam', '2022-04-07 08:16:06', NULL),
(42, 'Trea', 'med laid', '2022-04-07 08:16:06', NULL),
(43, 'Gueldasni', 'Hamza ', '2022-04-07 08:16:06', NULL),
(44, 'Hezam', 'brahim', '2022-04-07 08:16:06', NULL),
(45, 'Ouali', 'Adel', '2022-04-07 08:16:06', NULL),
(46, 'Chabbi', 'Reda ', '2022-04-07 08:16:06', NULL),
(47, 'Boughaba', 'A/aziz', '2022-04-07 08:16:06', NULL),
(48, 'Khenouche', 'Samir', '2022-04-07 08:16:06', NULL),
(49, 'Achouri', 'elHadi', '2022-04-07 08:16:06', NULL),
(50, 'Hamriou', 'Yazid', '2022-04-07 08:16:06', NULL),
(51, 'Sahia', 'larbi ', '2022-04-07 08:16:06', NULL),
(52, 'Ghemida', 'youcef', '2022-04-07 08:16:06', NULL),
(53, 'Maalem', 'Bilel', '2022-04-07 08:16:06', NULL),
(54, 'Bouchoucha', 'Kamel', '2022-04-07 08:16:06', NULL),
(55, 'Bouhadeb', 'Mabrouka', '2022-04-07 08:16:06', NULL),
(56, 'Siab', 'Fares', '2022-04-07 08:16:06', NULL),
(57, 'Boutaleb', 'Imen', '2022-04-07 08:16:06', NULL),
(58, 'Benmechter', 'Fouad', '2022-04-07 08:16:06', NULL),
(61, 'Bouguera', 'djamel eddine', '2022-04-07 08:16:06', NULL),
(62, 'Arifi', 'khadra', '2022-04-07 08:16:06', NULL),
(63, 'Benbouzid', 'miloud', '2022-04-07 08:16:06', NULL),
(64, 'Bekhakhcha', 'mohamed', '2022-04-07 08:16:06', NULL),
(65, 'Zouaoui', 'rebeh', '2022-04-07 08:16:06', NULL),
(66, 'Menaiaia', 'abdessalam', '2022-04-07 08:16:06', NULL),
(67, 'Tifoura', 'Salima', '2022-04-07 08:16:06', NULL),
(68, 'Bouguera', 'khadoudja', '2022-04-07 08:16:06', NULL),
(70, 'Rouaimia', 'bilel', '2022-04-07 08:16:06', NULL),
(71, 'Khoudja', 'chaima', '2022-04-07 08:16:06', NULL),
(72, 'Benaouadi', 'badri', '2022-04-07 08:16:06', NULL),
(73, 'Chouchane', 'selma', '2022-04-07 08:16:06', NULL),
(74, 'Brahmi', 'Yazid', '2022-04-07 08:16:06', NULL),
(75, 'Ziani', 'Bahdja', '2022-04-07 08:16:06', NULL),
(76, 'Ghanai', 'Ahcen', '2022-04-07 08:16:06', NULL),
(77, 'Gasmoune', 'saliha', '2022-04-07 08:16:06', NULL),
(78, 'Boughaba', 'salim', '2022-04-07 08:16:06', NULL),
(79, 'Soufi', 'Bariza', '2022-04-07 08:16:06', NULL),
(80, 'Ouali', 'fella', '2022-04-07 08:16:06', NULL),
(81, 'Dif', 'Riadh', '2022-04-07 08:16:06', NULL),
(82, 'Haif', 'saleh', '2022-04-07 08:16:06', NULL),
(83, 'Koraichi', 'siham', '2022-04-07 08:16:06', NULL),
(84, 'Hmaidi', 'miloud', '2022-04-07 08:16:06', NULL),
(85, 'Aouadi', 'hicham', '2022-04-07 08:16:06', NULL),
(86, 'Bechani', 'zakia', '2022-04-07 08:16:06', NULL),
(87, 'Fartas', 'seif eddine', '2022-04-07 08:16:06', NULL),
(88, 'oulhaci', 'med saleh', '2022-04-07 08:16:06', NULL),
(89, 'Bouguera', 'walid', '2022-04-07 08:16:06', NULL),
(90, 'Abadlia', 'Hanene', '2022-04-07 08:16:06', NULL),
(91, 'oulhaci', 'mohamed', '2022-04-07 08:16:06', NULL),
(92, 'Ouanes', 'Abdenasser', '2022-04-07 08:16:06', NULL),
(93, 'Hanachi', 'Amel', '2022-04-07 08:16:06', NULL),
(94, 'Kahili', 'zoubida', '2022-04-07 08:16:06', NULL),
(95, 'Amri', 'someya', '2022-04-07 08:16:06', NULL),
(96, 'Hemici', 'samir', '2022-04-07 08:16:06', NULL),
(97, 'Nahouchi', 'mohamed', '2022-04-07 08:16:06', NULL),
(98, 'Djedaidi', 'mohamed', '2022-04-07 08:16:06', NULL),
(99, 'Boudjedra', 'aymen', '2022-04-07 08:16:06', NULL),
(100, 'Bouallagui', 'fatiha', '2022-04-07 08:16:06', NULL),
(101, 'Boulifa', 'otman', '2022-04-07 08:16:06', NULL),
(102, 'Bechachhia', 'Abla', '2022-04-07 08:16:06', NULL),
(103, 'Skikdi', 'mustafa', '2022-04-07 08:16:06', NULL),
(104, 'Klai', 'chaabi', '2022-04-07 08:16:06', NULL),
(105, 'Bouhadjera', 'bachir', '2022-04-07 08:16:06', NULL),
(106, 'Zannat', 'fethi', '2022-04-07 08:16:06', NULL),
(107, 'Abaiz', 'fatima', '2022-04-07 08:16:06', NULL),
(108, 'Haizi', 'yassine', '2022-04-07 08:16:06', NULL),
(109, 'Bounaadja', 'kamer ezzemene', '2022-04-07 08:16:06', NULL),
(110, 'Belloum', 'boudjemaa', '2022-04-07 08:16:06', NULL),
(111, 'Achichi', 'mihoub', '2022-04-07 08:16:06', NULL),
(112, 'Bouchmala', 'issam', '2022-04-07 08:16:06', NULL),
(113, 'Sissaoui', 'khaled', '2022-04-07 08:16:06', NULL),
(114, 'Boumedris', 'Wassim', '2022-04-07 08:16:06', NULL),
(115, 'khaoua', 'Abdelaziz', '2022-04-07 08:16:06', NULL),
(116, 'Benallouche', 'Hafsia', '2022-04-07 08:16:06', NULL),
(117, 'Bouacha', 'mamdouh', '2022-04-07 08:16:06', NULL),
(118, 'Zouzou', 'reda', '2022-04-07 08:16:06', NULL),
(119, 'Soualem', 'Fattoum', '2022-04-07 08:16:06', NULL),
(120, 'Bourafa', 'salim', '2022-04-07 08:16:06', NULL),
(121, 'Bouanani', 'bariza', '2022-04-07 08:16:06', NULL),
(122, 'Ghemida', 'Houcine', '2022-04-07 08:16:06', NULL),
(123, 'Dif', 'sami', '2022-04-07 08:16:06', NULL),
(124, 'Khelil', 'souhaib', '2022-04-07 08:16:06', NULL),
(125, 'Sbai', 'Kheireddine', '2022-04-07 08:16:06', NULL),
(126, 'Diaf', 'malyk', '2022-04-07 08:16:06', NULL),
(127, 'Azizi', 'soltana', '2022-04-07 08:16:06', NULL),
(128, 'boulahba', 'mohssen', '2023-05-14 15:47:49', NULL),
(129, 'boulahba7411', 'mohssen', '2023-05-14 15:49:05', NULL),
(130, 'boulahba7411', 'mohssen', '2023-05-14 15:49:05', NULL),
(131, 'boulahbal', 'abdel rahmabn', '2023-05-14 15:57:46', NULL),
(132, 'nomber 1', 'client', '2023-05-14 16:14:59', NULL),
(133, 'dddd', 'TRAMADOL LS 100MG', '2023-05-17 00:05:31', NULL);

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
(103, 'cvbn ', 'dfgrfh', '200000 mg', 'nothing');

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

--
-- Déchargement des données de la table `pharm`
--

INSERT INTO `pharm` (`id`, `name`, `adress`, `creation`, `email`, `owner`) VALUES
(10, 'hakim', 'ben mehidi rue 44', '2023-04-14 04:21:31', 'mohssenboulahbal3333@gmail.com', 11),
(12, 'nothing', 'ffffffff', '2023-05-15 22:42:25', 'mohssenboulahbal@gmail.com', 18),
(13, 'nothing159', 'ben mhidi el tarf rue 36', '2023-05-17 11:08:30', 'jomia@gmail.com', 19);

-- --------------------------------------------------------

--
-- Structure de la table `prodoit`
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
-- Déchargement des données de la table `prodoit`
--

INSERT INTO `prodoit` (`list_prodoit`, `pharm`, `lot`, `amount`, `Expiration`, `created`, `inserted`, `id`) VALUES
(3, 10, '18', 100, '2023-05-16 23:00:00', '2023-04-30 12:37:13', NULL, 4),
(4, 10, '13', 100, '2023-05-17 00:06:11', '2023-04-30 12:37:13', NULL, 5),
(5, 10, '5220', 0, '2023-05-13 02:45:34', '2023-04-30 12:37:13', NULL, 6),
(5, 10, '20', 0, '2023-05-15 16:53:41', '2023-05-01 04:13:22', NULL, 7),
(3, 10, '19', 0, '2023-05-15 16:53:37', '2023-05-01 04:14:50', NULL, 8),
(3, 10, '20', 0, '2023-05-15 16:53:36', '2023-05-01 04:15:05', NULL, 9),
(3, 10, '21', 0, '2023-05-15 16:53:34', '2023-05-01 04:16:03', NULL, 10),
(18, 10, '12', 100, '2023-05-16 23:51:31', '2023-05-01 05:02:15', NULL, 11),
(84, 10, '12', 0, '2023-05-13 02:38:15', '2023-05-01 07:29:32', NULL, 12),
(36, 10, '123', 0, '2023-05-13 02:38:10', '2023-05-01 07:45:16', NULL, 13),
(100, 10, '20', 0, '2023-05-14 22:44:29', '2023-05-14 22:44:09', NULL, 27),
(2, 12, '15', 100, '2023-05-16 23:00:00', '2023-05-15 22:43:20', NULL, 28),
(42, 10, '13', 50, '2023-05-17 10:41:19', '2023-05-16 09:27:12', NULL, 29),
(22, 10, '1000', 100, '2023-05-16 23:59:27', '2023-05-16 09:38:30', NULL, 30),
(18, 10, '13', 100, '2023-05-17 10:56:52', '2023-05-16 11:59:19', NULL, 31);

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
(11, 10, 'hakim', 'hakim10', '$2y$10$9CnFT8bM1Sn5TxwTlrM7g.l0PrSDOSWIrNmalF0HbCqf2S0m.Newa', 'owner', '2023-04-14 04:21:31'),
(13, 10, 'mohssen2', 'mohe2159', '$2y$10$9CnFT8bM1Sn5TxwTlrM7g.l0PrSDOSWIrNmalF0HbCqf2S0m.Newa', 'vander', '2023-05-14 09:29:32'),
(14, 10, 'bbbb', 'bbbb', '$2y$10$9CnFT8bM1Sn5TxwTlrM7g.l0PrSDOSWIrNmalF0HbCqf2S0m.Newa', 'vander', '2023-05-14 09:29:32'),
(15, 10, 'mohssen99', 'mohe15999', '$2y$10$9CnFT8bM1Sn5TxwTlrM7g.l0PrSDOSWIrNmalF0HbCqf2S0m.Newa', 'vander', '2023-05-14 09:29:32'),
(16, 10, 'mohssen4', 'mohe1594', '$2y$10$9CnFT8bM1Sn5TxwTlrM7g.l0PrSDOSWIrNmalF0HbCqf2S0m.Newa', 'vander', '2023-05-14 09:29:32'),
(17, 10, 'mohssen3', 'mohe3159', '$2y$10$9CnFT8bM1Sn5TxwTlrM7g.l0PrSDOSWIrNmalF0HbCqf2S0m.Newa', 'vander', '2023-05-14 09:29:32'),
(18, 12, 'nothing', 'nothing12', '$2y$10$KAKxZ7f4vOnpC/gE4R56ze8gTR/bsNeUxp9y8.ZKT//jDfA8QL01m', 'owner', '2023-05-15 22:42:25'),
(19, 13, 'nothing159', 'nothing15913', '$2y$10$O7QPh4Rv1fPdvEveqLhDFOIF0O9RigBTKayx//aPr7N2ovRp2Kpi2', 'owner', '2023-05-17 11:08:30');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
