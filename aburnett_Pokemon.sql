-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2024 at 08:33 PM
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
-- Database: `aburnett_Pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `attaque`
--

CREATE TABLE `attaque` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attaque`
--

INSERT INTO `attaque` (`id`, `nom`) VALUES
(1, 'Charge'),
(2, 'Flammeche'),
(4, 'Lance-Flamme'),
(5, 'Tornade');

-- --------------------------------------------------------

--
-- Table structure for table `dresseur`
--

CREATE TABLE `dresseur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dresseur`
--

INSERT INTO `dresseur` (`id`, `nom`) VALUES
(1, 'Ash Ketchum'),
(2, 'Misty Waterflower'),
(3, 'Brock Rock'),
(4, 'Serena Grace'),
(5, 'Adrien');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `nbNageoires` int(11) DEFAULT NULL,
  `nbPattes` int(11) DEFAULT NULL,
  `nbHeuresTv` int(11) DEFAULT NULL,
  `idDresseur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id`, `nom`, `poids`, `taille`, `type`, `nbNageoires`, `nbPattes`, `nbHeuresTv`, `idDresseur`) VALUES
(1, 'Psykokwak', 196, 8, 'mer', 2, NULL, NULL, NULL),
(2, 'Miaouss', 42, 5, 'casanier', NULL, 4, 5, NULL),
(3, 'Rondoudou', 5, 6, 'casanier', NULL, 0, 15, NULL),
(4, 'Carapuce', 90, 5, 'mer', 2, NULL, NULL, NULL),
(5, 'Magicarpe', 10, 9, 'mer', 2, NULL, NULL, NULL),
(6, 'Léviator', 235, 20, 'mer', 2, NULL, NULL, NULL),
(7, 'Rattata', 35, 3, 'casanier', NULL, 4, 1, NULL),
(8, 'Évoli', 6, 3, 'casanier', NULL, 4, 8, NULL),
(9, 'Pidgey', 18, 3, 'casanier', NULL, 2, 5, NULL),
(16, 'Carapuce', 456, 8, 'casanier', NULL, 5, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pokemon_attaque`
--

CREATE TABLE `pokemon_attaque` (
  `idPokemon` int(11) NOT NULL,
  `idAttaque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pokemon_attaque`
--

INSERT INTO `pokemon_attaque` (`idPokemon`, `idAttaque`) VALUES
(9, 1),
(9, 2),
(16, 2);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attaque`
--
ALTER TABLE `attaque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dresseur`
--
ALTER TABLE `dresseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
