-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 09:39 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canvas2d`
--

-- --------------------------------------------------------

--
-- Table structure for table `internautes`
--

CREATE TABLE `internautes` (
  `idInternaute` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `parcours` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `internautes`
--

INSERT INTO `internautes` (`idInternaute`, `email`, `motDePasse`, `nom`, `prenom`, `parcours`) VALUES
(16, 'dali@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'dali', 'karoui', 'ico'),
(17, 'wael@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'zantour', 'wael', 'ICO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `internautes`
--
ALTER TABLE `internautes`
  ADD PRIMARY KEY (`idInternaute`,`email`),
  ADD KEY `Fk-email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `internautes`
--
ALTER TABLE `internautes`
  MODIFY `idInternaute` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
