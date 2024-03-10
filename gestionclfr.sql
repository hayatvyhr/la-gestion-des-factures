-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionclfr`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `adresse`, `username`, `password`) VALUES
(1, 'Asmae2', 'Moussa', 'Street 09 ppare 5555', 'asmae', '123'),
(10, 'hghhv', 'AYOUB', 'Street 09 N-6 londre 2005', 'AYOUB', '$2y$10$vUVaqKw4uUKp6YIJBB6lB.pDgIr5TPuAroJMVz3.2Suef0f1Vjd8.'),
(12, 'baalouli', 'oumaima', 'Street 09 N-6 londre 2005', 'oumaima', '$2y$10$17Mk//ub6K7g/JoB3jnPIup89mFJXR1y.IVD/rkf8WlnkgtdrnfDS'),
(13, 'Roubakhi', 'Hayat', 'hay aghatasse street 9 fnidek', 'Hayat', '$2y$10$oD.IiK7LJBu.UtHsajGn0u8xalsfNnX/1K4GnCFAQlfbid5U1EWWC'),
(14, 'anas', 'test', '12', 'test', '$2y$10$MNNWy1XGq7cs5GaOOvVi/uJdAlAU/eOwnmqoumahDP43fwuyVSnGO'),
(15, 'test', 'test', 'test444', 'test', '$2y$10$qYYu6T3n2PnLgg.4802.CObEdoj248I5TbI.pl98dbiiBzd7DZvvS');

-- --------------------------------------------------------

--
-- Table structure for table `consommation`
--

CREATE TABLE `consommation` (
  `id_client` int(11) NOT NULL,
  `id_consommation` int(11) NOT NULL,
  `dateM` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `Consommation` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consommation`
--

INSERT INTO `consommation` (`id_client`, `id_consommation`, `dateM`, `image`, `Consommation`) VALUES
(1, 1, '2023-12-31', 'posters-compteur-electrique.jpg', 800),
(1, 2, '2024-01-31', 'posters-compteur-electrique.jpg', 900);

-- --------------------------------------------------------

--
-- Table structure for table `consommation_annulle`
--

CREATE TABLE `consommation_annulle` (
  `id_cons_ann` int(11) NOT NULL,
  `id_consommation` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `consommation` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `date_s` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consommation_annulle`
--

INSERT INTO `consommation_annulle` (`id_cons_ann`, `id_consommation`, `id_client`, `consommation`, `annee`, `date_s`) VALUES
(5, 16, 1, 7000, 2022, '2023-01-02'),
(6, 16, 1, 34000, 2023, '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `Stauts` varchar(200) NOT NULL,
  `Consommation` int(11) NOT NULL,
  `pdf` varchar(300) NOT NULL,
  `date_facture` date NOT NULL,
  `Status` varchar(200) NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id_facture`, `id_client`, `Stauts`, `Consommation`, `pdf`, `date_facture`, `Status`, `prix`) VALUES
(1, 1, '', 100, 'C:\\xampp\\htdocs\\TP2.la gestion des factures/pdf/facture_1.pdf', '2024-01-31', 'payee', 80.14);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_four` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id_four`, `username`, `password`) VALUES
(1, 'AHMED', '123');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_no` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `objet` varchar(200) NOT NULL,
  `message` varchar(300) NOT NULL,
  `date_n` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id_no`, `id_client`, `objet`, `message`, `date_n`) VALUES
(1, 1, 'Reponse de problem de Fuite Interne', 'nous vous enverrons nos techniciens\r\n', '2024-03-02'),
(2, 1, 'Reponse de problem de Fuite Interne', '', '2024-03-02'),
(3, 1, 'Reponse de Fuite Interne', 'nous vous enverrons nos techniciens\r\n', '2024-03-02'),
(4, 1, 'Fuite Interne', 'nous vous enverrons nos techniciens\r\n', '2024-03-03'),
(5, 1, 'Fuite Interne', 'nous vous enverrons nos techniciens\r\n', '2024-03-03'),
(6, 1, 'Reponse de problem de Fuite', 'nous vous enverrons nos techniciens\r\n', '2024-03-03'),
(7, 1, 'Reponse de problem de Fuite Interne', 'uhj', '2024-03-03'),
(8, 1, 'Reponse de problem de Fuite Interne', 'fbfknfknb', '2024-03-06'),
(9, 10, 'Reponse de problem de Fuite Interne', 'done', '2024-03-07'),
(11, 1, 'Reponse de problem de Fuite Interne', 'jjjjj', '2024-03-07'),
(12, 1, 'Reponse de problem de Fuite Interne', 'hi', '2024-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_reclamation` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `datesa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id_reclamation`, `id_client`, `type`, `message`, `datesa`) VALUES
(3, 10, 'Fuite Externe', 'ferf', '2024-03-07'),
(4, 1, 'payement', 'i pay my facture .....', '2024-03-08'),
(5, 1, 'payement', '..', '2024-03-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `consommation`
--
ALTER TABLE `consommation`
  ADD PRIMARY KEY (`id_consommation`);

--
-- Indexes for table `consommation_annulle`
--
ALTER TABLE `consommation_annulle`
  ADD PRIMARY KEY (`id_cons_ann`);

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_four`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_reclamation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `consommation`
--
ALTER TABLE `consommation`
  MODIFY `id_consommation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consommation_annulle`
--
ALTER TABLE `consommation_annulle`
  MODIFY `id_cons_ann` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_four` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_reclamation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
