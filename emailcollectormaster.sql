-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 01:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emailcollectormaster`
--
CREATE DATABASE IF NOT EXISTS `emailcollectormaster` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `emailcollectormaster`;

-- --------------------------------------------------------

--
-- Table structure for table `emailitems`
--

DROP TABLE IF EXISTS `emailitems`;
CREATE TABLE `emailitems` (
  `EmailItemID` int(11) NOT NULL,
  `PersonName` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `PersonEmail` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `PersonMobile` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `PersonNote` varchar(4000) COLLATE latin1_general_ci NOT NULL,
  `DateCreated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `emailitems`
--

INSERT INTO `emailitems` (`EmailItemID`, `PersonName`, `PersonEmail`, `PersonMobile`, `PersonNote`, `DateCreated`) VALUES
(1, 'Leon', 'leon@tatss.co.za', '0824939918', '', '2022-11-15'),
(2, 'Leon Janse van Rensburg', 'leon@leon.com', '0824939918', 'ewwefw', '2022-11-15'),
(3, 'Clive Morris', 'clive@gmail.com', '0829984563', 'This is a message from Clive', '2022-11-15'),
(4, 'Jeff Plum', 'jeff@plum.com', '0824939918', 'Message from Feff', '2022-11-15'),
(5, 'Jack Jones', 'jonas@jonas.com', '0875698741', '', '2022-11-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emailitems`
--
ALTER TABLE `emailitems`
  ADD PRIMARY KEY (`EmailItemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emailitems`
--
ALTER TABLE `emailitems`
  MODIFY `EmailItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
