-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2024 at 08:34 PM
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
-- Database: `aburnett_FouDeSeries`
--

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` int(5) NOT NULL,
  `nomPays` varchar(30) NOT NULL,
  `drapeau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `nomPays`, `drapeau`) VALUES
(1, 'Antarctica', 'https://www.lilypop.fr/wp-content/uploads/2021/06/journalist-evan-townsend-true-south-antarctica-first-flag-6.png');

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `resume` longtext DEFAULT NULL,
  `premiereDiffusion` date DEFAULT NULL,
  `nbEpisodes` int(5) DEFAULT NULL,
  `pays` int(6) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`id`, `titre`, `resume`, `premiereDiffusion`, `nbEpisodes`, `pays`, `image`) VALUES
(2, 'Le Penguin', 'Un Penguin s\'embarque dans une aventure extraordinaire afin de retrouver son igloo qui s\'est détachée de la banquise et s\'est mis a dériver au large. ', '2020-09-16', 5, 1, 'https://m.media-amazon.com/images/M/MV5BMTM1NDc5MDYxMl5BMl5BanBnXkFtZTcwMjMzNDAzMQ@@._V1_FMjpg_UX1000_.jpg'),
(3, 'Penguins', 'An Adélie penguin named Steve joins millions of fellow males in the icy Antarctic spring on a quest to build a suitable nest, find a life partner and start a family. None of it comes easily for him, especially considering he\'s targeted by everything from killer whales to leopard seals, who unapologetically threaten his happily ever after.', '2023-09-18', 1, 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/7/78/Penguins_film_poster.png/220px-Penguins_film_poster.png'),
(4, 'Happy Feet', 'Unlike other penguins, Mumble is a gifted tap dancer, which earns him the wrath of the elders of his clan, who send him in exile. Mumble then befriends the Amigos, who help him rediscover himself.', '2023-09-13', 1, 1, 'https://m.media-amazon.com/images/M/MV5BZWU2NDkxYjktNWVlMS00MTM4LWJjMDAtOWYxZjJkZWFhYzAxXkEyXkFqcGdeQXVyMTA1NjE5MTAz._V1_.jpg');

--
-- Indexes for dumped tables
--

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
  ADD KEY `fk-pays` (`pays`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `fk-pays` FOREIGN KEY (`pays`) REFERENCES `pays` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
