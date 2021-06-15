-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2021 at 10:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iooa`
--

-- --------------------------------------------------------

--
-- Table structure for table `evidencija_stanja`
--

CREATE TABLE `evidencija_stanja` (
  `ID` int(32) NOT NULL,
  `naziv_robe` varchar(128) NOT NULL,
  `kolicina` int(16) NOT NULL,
  `lokacija` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evidencija_stanja`
--

INSERT INTO `evidencija_stanja` (`ID`, `naziv_robe`, `kolicina`, `lokacija`) VALUES
(1, 'Zobene pahuljice 500g', 10, 2),
(2, 'Laneno ulje 1l', 8, 1),
(3, 'Zeleni čaj (organski)', 11, 2),
(4, 'Chia sjemenke 1kg', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `ID` int(32) NOT NULL,
  `naziv_lokacije` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`ID`, `naziv_lokacije`) VALUES
(1, 'Zagreb'),
(2, 'Rijeka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `OIB` varchar(150) NOT NULL,
  `userlevel` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `ime`, `prezime`, `password`, `email`, `OIB`, `userlevel`) VALUES
(3, 'Valentina', 'Bacic', 'proba', 'proba@gmail.com', '92658965214', 0),
(6, 'Mattea', 'Galich', 'proba', 'korisnik@gmail.com', '36521458965', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evidencija_stanja`
--
ALTER TABLE `evidencija_stanja`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `lokacija_fk` (`lokacija`);

--
-- Indexes for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evidencija_stanja`
--
ALTER TABLE `evidencija_stanja`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidencija_stanja`
--
ALTER TABLE `evidencija_stanja`
  ADD CONSTRAINT `lokacija_fk` FOREIGN KEY (`lokacija`) REFERENCES `lokacija` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
