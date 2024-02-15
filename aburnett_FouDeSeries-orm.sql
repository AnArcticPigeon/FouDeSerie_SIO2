-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2024 at 08:29 PM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aburnett_FouDeSeries-orm`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231006085135', '2023-10-06 08:54:43', 19),
('DoctrineMigrations\\Version20231006085715', '2023-10-06 08:57:23', 8),
('DoctrineMigrations\\Version20231010143410', '2023-10-10 14:35:08', 39),
('DoctrineMigrations\\Version20231013094331', '2023-10-13 09:44:16', 58),
('DoctrineMigrations\\Version20231017152043', '2023-10-17 15:33:38', 11),
('DoctrineMigrations\\Version20231019074114', '2023-10-19 07:41:21', 11);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `libelle`) VALUES
(1, 'Penguin Martial Arts'),
(2, 'Action'),
(3, 'Thriller'),
(4, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `drapeau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `drapeau`) VALUES
(1, 'Antarctica', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/True_South_Antarctic_Flag.svg/2560px-True_South_Antarctic_Flag.svg.png'),
(2, 'Greenland', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_Greenland.svg/2560px-Flag_of_Greenland.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `resume` longtext DEFAULT NULL,
  `premiereDiffusion` date DEFAULT NULL,
  `nbEpisodes` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idPays` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `chaine_diffusion` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`id`, `titre`, `resume`, `premiereDiffusion`, `nbEpisodes`, `image`, `idPays`, `type`, `chaine_diffusion`, `site`) VALUES
(1, 'PengFuin', 'Un Pinguin en quéte de vengeance part pour la chine avec l espoire d aprendre le kingfu afin de vanger son frére.', '2018-01-01', 14, 'kung_fu_penguin__by_sagadreams_da6wqye-fullview.jpg', 1, 'tv', 'Dysney', NULL),
(2, 'Le Penguin', 'Un Penguin s\'embarque dans une aventure extraordinaire afin de retrouver son igloo qui s\'est détachée de la banquise et s\'est mis a dériver au large. ', '2020-09-16', 5, 'PenguinFeeding.jpg', 1, 'web', NULL, 'https://www.youtube.com/watch?v=ORuTA9a_YVo'),
(3, '00Penguin7', 'L\'Agent 007 recois une nouvelle missions, vaincre le grand mechant Ocre.', '2016-11-06', 7, '007.jpg', 2, 'web', NULL, 'https://www.youtube.com/watch?v=ORuTA9a_YVo'),
(4, 'Happy Feet', 'Unlike other penguins, Mumble is a gifted tap dancer, which earns him the wrath of the elders of his clan, who send him in exile. Mumble then befriends the Amigos, who help him rediscover himself.', '2023-09-13', 1, 'Pied.jpg', 1, 'tv', 'PenguinNet', NULL),
(5, 'Penguins', 'An Adélie penguin named Steve joins millions of fellow males in the icy Antarctic spring on a quest to build a suitable nest, find a life partner and start a family. None of it comes easily for him, especially considering he\'s targeted by everything from killer whales to leopard seals, who unapologetically threaten his happily ever after.', '2023-09-18', 1, 'laCourse.png', 1, 'web', NULL, 'https://www.youtube.com/watch?v=ORuTA9a_YVo'),
(6, 'Pinguinichi', 'An Italian Pinguin bakes a pizza.', '2025-01-05', 25, 'pinguinpizza.png', 2, 'tv', 'Netflix', NULL),
(26, 'fd', 'j', '2021-01-03', 5, 'g', 2, 'tv', '5', NULL),
(27, 'fd', 'j', '2021-01-03', 5, 'g', 2, 'tv', '5', NULL),
(28, 'fd', 'j', '2021-01-03', 5, 'g', 2, 'tv', '5', NULL),
(29, 'n', 'v', '2018-02-02', -5, 'b', 1, 'tv', 'b', NULL),
(30, 'n', 'v', '2018-02-02', 5, NULL, 1, 'tv', 'b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serie_genre`
--

CREATE TABLE `serie_genre` (
  `idSerie` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serie_genre`
--

INSERT INTO `serie_genre` (`idSerie`, `idGenre`) VALUES
(1, 1),
(3, 2),
(3, 3),
(3, 4),
(26, 1),
(27, 1),
(28, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AA3A933447626230` (`idPays`);

--
-- Indexes for table `serie_genre`
--
ALTER TABLE `serie_genre`
  ADD PRIMARY KEY (`idSerie`,`idGenre`),
  ADD KEY `IDX_4B5C076CBDFED029` (`idSerie`),
  ADD KEY `IDX_4B5C076C949470E5` (`idGenre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `FK_AA3A933447626230` FOREIGN KEY (`idPays`) REFERENCES `pays` (`id`);

--
-- Constraints for table `serie_genre`
--
ALTER TABLE `serie_genre`
  ADD CONSTRAINT `FK_4B5C076C949470E5` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `FK_4B5C076CBDFED029` FOREIGN KEY (`idSerie`) REFERENCES `serie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
