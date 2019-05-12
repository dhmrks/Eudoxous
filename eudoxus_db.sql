-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 09:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eudoxus`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `idbook` int(2) NOT NULL,
  `name` varchar(24) NOT NULL,
  `year` int(2) DEFAULT NULL,
  `idmath` int(2) DEFAULT NULL,
  `cre` int(2) NOT NULL,
  `eksamino` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`idbook`, `name`, `year`, `idmath`, `cre`, `eksamino`) VALUES
(1, 'C se ba8os', 2010, 1, 7, 1),
(2, 'eisagwgh sth C', 2012, 1, 6, 1),
(4, 'Eisagwgh stous H/Y', 2013, 2, 5, 1),
(5, 'Mia prwth matia stous H/', 2015, 2, 6, 1),
(6, 'Oi algori8moi', 2012, 3, 5, 1),
(7, 'Algori8mikes ennoies', 2015, 3, 5, 1),
(8, 'Basika mathimatika', 2012, 4, 6, 1),
(9, 'Mathimatika & H/Y', 2014, 4, 5, 1),
(10, 'Statistics & mathematics', 2010, 5, 5, 1),
(11, 'Ennoies statistikhs', 2011, 5, 5, 1),
(12, 'Antikeimenostrafhs progr', 2013, 11, 6, 2),
(13, 'Programmatismos sth C++', 2015, 11, 7, 2),
(14, 'Pi8anothtes & mathematic', 2010, 12, 5, 2),
(15, 'Ennoies pi8anothtwn', 2012, 12, 5, 2),
(16, 'Domes sth C', 2016, 13, 7, 2),
(17, 'Domes & dendra', 2014, 13, 6, 2),
(18, 'Pshfiaka kuklwmata', 2014, 15, 5, 2),
(19, 'Logikes Pyles', 2014, 15, 6, 2),
(20, 'Arxitektonikh H/Y', 2013, 17, 5, 2),
(21, 'Assembly', 2016, 17, 7, 2),
(22, 'Algori8moi v2', 2012, 21, 5, 3),
(23, 'Algori8moi v3', 2014, 21, 6, 3),
(24, 'MySQL', 2011, 22, 6, 3),
(25, 'SQL languange', 2015, 22, 7, 3),
(26, 'Java v2', 2012, 23, 7, 3),
(27, 'Java antikeimenostrafhs', 2014, 23, 7, 3),
(28, 'Unix susthmata', 2010, 25, 5, 3),
(29, 'Linux & unix', 2012, 25, 6, 3),
(30, 'Diktya & prwtokola', 2014, 26, 6, 3),
(31, 'Dromologhsh diktiwn', 2012, 26, 6, 3),
(32, 'Android v3', 2015, 31, 7, 4),
(33, 'MySQL v2', 2014, 32, 6, 4),
(34, 'SQL languange 2', 2016, 32, 7, 4),
(35, 'Analush susthmatwn', 2012, 34, 5, 4),
(36, 'Adonis', 2015, 34, 6, 4),
(37, 'Anakthsh plhroforias', 2011, 36, 5, 4),
(38, 'PHP 5.6', 2014, 36, 6, 4),
(39, 'Diktya & prwtokola v 2', 2015, 33, 6, 4),
(40, 'NAT & DHCP', 2013, 33, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `idmath` int(2) NOT NULL,
  `name` varchar(24) NOT NULL,
  `eksamino` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`idmath`, `name`, `eksamino`) VALUES
(1, 'C', 1),
(2, 'Eisagwgh_sth_plhroforikh', 1),
(3, 'Algoritmikh', 1),
(4, 'Mathimatika', 1),
(5, 'Statistikh', 1),
(11, 'C++', 2),
(12, 'Pi8anothtes', 2),
(13, 'Domes_Dedomenwn', 2),
(15, 'Pshfiakh_Sxediash', 2),
(17, 'Arxitektonikh', 2),
(21, 'Algori8moi&poluplokoth', 3),
(22, 'Baseis_1', 3),
(23, 'JAVA', 3),
(25, 'Leitourgika_1', 3),
(26, 'Diktya_1', 3),
(31, 'Android', 4),
(32, 'Baseis_2', 4),
(33, 'Diktya_2', 4),
(34, 'Texnologia_logismikou', 4),
(36, 'Anakthsh', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `am` int(6) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `eksamino` int(2) NOT NULL,
  `credits` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`am`, `username`, `password`, `fullname`, `mail`, `eksamino`, `credits`) VALUES
(131027, 'ioulios', 'ioulios', 'ioulios tsiko', 'cs131027.com', 3, 0),
(131052, 'dhm', '1234', 'dimitris rakas', 'cs131052@teiath.gr', 1, 3),
(131071, 'kyr', 'kyr', 'giannhs kyritshs', 'cs131071@teiath.gr', 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `am` int(2) DEFAULT NULL,
  `idbook` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`am`, `idbook`) VALUES
(131052, 2),
(131052, 5),
(131052, 7),
(131052, 9),
(131052, 11),
(131027, 23),
(131027, 24),
(131027, 26),
(131027, 28),
(131027, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`idbook`),
  ADD KEY `idmath` (`idmath`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`idmath`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`am`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD KEY `am` (`am`),
  ADD KEY `idbook` (`idbook`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`idmath`) REFERENCES `lessons` (`idmath`);

--
-- Constraints for table `users_books`
--
ALTER TABLE `users_books`
  ADD CONSTRAINT `users_books_ibfk_1` FOREIGN KEY (`am`) REFERENCES `users` (`am`),
  ADD CONSTRAINT `users_books_ibfk_2` FOREIGN KEY (`idbook`) REFERENCES `books` (`idbook`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
