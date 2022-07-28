-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 04:57 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etudiants`
--

-- --------------------------------------------------------

--
-- Table structure for table `infoetudiant`
--

CREATE TABLE `infoetudiant` (
  `cne` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infoetudiant`
--

INSERT INTO `infoetudiant` (`cne`, `nom`, `sexe`) VALUES
('R137685566', 'Hamid', 'H'),
('R137685569', 'Reda', 'H'),
('R76652626', 'walid', 'H'),
('R83798373', 'yazid', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(25) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `professor_id` int(30) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `nom`, `professor_id`, `semester`) VALUES
(1, 'TNIM', 1, 'S5'),
(2, 'APR', 2, 'S5'),
(3, 'TI', 3, 'S5'),
(4, 'TWM', 2, 'S5'),
(5, 'BDM', 4, 'S5'),
(6, 'CPM', 5, 'S5'),
(7, 'TDM', 1, 'S6'),
(8, 'PMM', 6, 'S6'),
(9, 'SI', 7, 'S6');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `cneEtudiant` varchar(25) NOT NULL,
  `id_module` int(25) NOT NULL,
  `note` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`cneEtudiant`, `id_module`, `note`) VALUES
('R137685566', 1, 19.89),
('R137685569', 1, 15.9),
('R76652626', 1, 13.6),
('R137685566', 7, 16.6),
('R137685569', 7, 14.5),
('R76652626', 7, 18.9),
('R83798373', 7, 20),
('R137685566', 2, 20),
('R137685569', 2, 19.99),
('R137685566', 4, 20),
('R137685569', 4, 20),
('R76652626', 4, 1),
('R137685566', 8, 19),
('R137685569', 8, 18),
('R76652626', 8, 17);

-- --------------------------------------------------------

--
-- Table structure for table `proffesors`
--

CREATE TABLE `proffesors` (
  `proffesor_id` int(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proffesors`
--

INSERT INTO `proffesors` (`proffesor_id`, `nom`, `prenom`, `username`, `password`) VALUES
(1, 'Adib', 'Abdellah', 'abdellahAdib', 'Adib1900'),
(2, 'Moumkin', 'Mohammed', 'MoumkinMohamed', 'Moumkin1800'),
(3, 'Khadir', 'Khadir', 'KhadirKhadir', 'Khadir1900'),
(4, 'khalil', 'Mohammed', 'KhalilMohammed', 'Khalil2020'),
(5, 'Chantit', 'Naima', 'ChantitNaima', 'Chantit1900'),
(6, 'Noua', 'Mohamed', 'NouaMohamed', 'Noua2020'),
(7, 'Leghris', 'Leghris', 'LeghrisLeghris', 'LeghrisCisco');

-- --------------------------------------------------------

--
-- Table structure for table `reclamations`
--

CREATE TABLE `reclamations` (
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infoetudiant`
--
ALTER TABLE `infoetudiant`
  ADD PRIMARY KEY (`cne`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `profMod` (`professor_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD KEY `noteModule` (`id_module`);

--
-- Indexes for table `proffesors`
--
ALTER TABLE `proffesors`
  ADD PRIMARY KEY (`proffesor_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `profMod` FOREIGN KEY (`professor_id`) REFERENCES `proffesors` (`proffesor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `noteEtudiant` FOREIGN KEY (`cneEtudiant`) REFERENCES `infoetudiant` (`cne`),
  ADD CONSTRAINT `noteModule` FOREIGN KEY (`id_module`) REFERENCES `modules` (`module_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
