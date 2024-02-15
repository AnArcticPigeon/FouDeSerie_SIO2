-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2024 at 08:32 PM
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
-- Database: `aburnett_FouDeSeries-orm_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attaque`
--

CREATE TABLE `attaque` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dresseur`
--

CREATE TABLE `dresseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(31, 'Genre0'),
(32, 'Genre1'),
(33, 'Genre2'),
(34, 'Genre3'),
(35, 'Genre4');

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

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `idDresseur` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `nbNageoires` int(11) DEFAULT NULL,
  `nbPattes` int(11) DEFAULT NULL,
  `nbHeuresTv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pokemon_attaque`
--

CREATE TABLE `pokemon_attaque` (
  `idPokemon` int(11) NOT NULL,
  `idAttaque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(38, 'quisquam', 'Quo magni voluptatem voluptates dolores labore omnis iste. Non quia dolorum quia aut cum. Et possimus aspernatur molestiae sint nostrum voluptas dolores. Et quod consectetur adipisci autem quis voluptatum esse. Iure dicta dolores ex aut ut recusandae. Officia autem et itaque a assumenda sit. Maxime laboriosam rerum occaecati enim et a. Illo tenetur vel sapiente.', '2022-08-07', 146, '4c5f2078c1fb21068af37942de243f2b.png', NULL, 'tv', 'http://www.prevost.com/ea-ut-molestias-tempora-eos-et-dolor.html', NULL),
(39, 'quos', 'Mollitia recusandae sit qui fuga eum iure et. Eveniet unde reiciendis et voluptates quia dolor. Natus vitae ut perferendis consequuntur autem consequatur. Aut aspernatur voluptatibus nulla aperiam deserunt esse. Omnis impedit mollitia commodi nesciunt qui. Aut quas impedit assumenda provident voluptatem. Quasi sed provident consequatur et. Consequatur modi est quia sed ab labore qui.', '1982-07-18', 170, 'ff3a2454e3fabadc2cc1987029f22806.png', NULL, 'tv', 'http://bertrand.com/et-consectetur-quia-assumenda-perspiciatis-totam-magnam-aut', NULL),
(40, 'labore', 'Molestiae nostrum qui et ipsa id. Est sint suscipit inventore qui saepe sapiente. Cumque ratione est incidunt iusto. Vitae vel rerum perferendis quia laudantium. Ex animi eos sequi consectetur possimus. Dolor veniam libero sint alias qui laudantium. Expedita dolorem laboriosam qui sed in deserunt. Accusantium consequatur maiores sed vel aut ipsam.', '1984-08-27', 317, '2c1edbc01899bfa8618ed9a88839246d.png', NULL, 'tv', 'http://chauvin.com/cum-ipsam-aut-minima-enim.html', NULL),
(41, 'doloremque', 'Dolor autem necessitatibus neque aut. Autem id facere nesciunt veniam. Ratione sed ut ut modi et velit. Et quo qui animi deleniti iste corrupti eveniet. Sapiente et enim deleniti magni minus. Similique voluptatum autem labore blanditiis qui numquam suscipit. Sed quod quia nihil voluptatum qui at harum. Et nihil qui ex facilis.', '1973-11-09', 787, '5c3014a656f1b5e3b91157e4fad182e1.png', NULL, 'tv', 'http://dubois.com/ipsam-eum-ut-in-sit-in-omnis-et-rerum', NULL),
(42, 'laudantium', 'Fugit dolorum vero animi. Quis totam enim ea nostrum dicta sunt veritatis enim. Accusantium omnis aperiam et quia. Illo accusamus perferendis reiciendis labore beatae omnis autem. Nemo et inventore temporibus distinctio laudantium aut blanditiis. Dolores laborum minus quia qui ullam quia ut. Voluptas est nostrum qui a voluptas. Qui omnis quas earum et.', '2003-10-16', 464, '669023d894a5424a3001f7955b91dfdb.png', NULL, 'tv', 'http://www.lecomte.fr/non-facere-error-ullam-nulla-doloribus-autem-ut-modi.html', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `serie_genre`
--

CREATE TABLE `serie_genre` (
  `idSerie` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attaque`
--
ALTER TABLE `attaque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dresseur`
--
ALTER TABLE `dresseur`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62DC90F32449059D` (`idDresseur`);

--
-- Indexes for table `pokemon_attaque`
--
ALTER TABLE `pokemon_attaque`
  ADD PRIMARY KEY (`idPokemon`,`idAttaque`),
  ADD KEY `IDX_F91F67037265FB01` (`idPokemon`),
  ADD KEY `IDX_F91F670385CC7060` (`idAttaque`);

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AA3A9334FF7747B4` (`titre`),
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
-- AUTO_INCREMENT for table `attaque`
--
ALTER TABLE `attaque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dresseur`
--
ALTER TABLE `dresseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `FK_62DC90F32449059D` FOREIGN KEY (`idDresseur`) REFERENCES `dresseur` (`id`);

--
-- Constraints for table `pokemon_attaque`
--
ALTER TABLE `pokemon_attaque`
  ADD CONSTRAINT `FK_F91F67037265FB01` FOREIGN KEY (`idPokemon`) REFERENCES `pokemon` (`id`),
  ADD CONSTRAINT `FK_F91F670385CC7060` FOREIGN KEY (`idAttaque`) REFERENCES `attaque` (`id`);

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
