-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 09:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `locatii`
--

CREATE TABLE `locatii` (
  `nume` varchar(32) NOT NULL,
  `latitudine` varchar(32) NOT NULL,
  `longitudine` varchar(32) NOT NULL,
  `culoare` varchar(32) NOT NULL,
  `dimensiune` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locatii`
--

INSERT INTO `locatii` (`nume`, `latitudine`, `longitudine`, `culoare`, `dimensiune`) VALUES
('Brașov', '45.86991311858896', '25.626571310195615', 'green', 25),
('Sibiu', '46.00693738696899', '24.181887808973645', 'blue', 25),
('Ploiești', '45.01020597228594', '26.010427594208615', 'red', 25),
('Brăila', '45.30448325538894', '27.956878948756323', 'yellow', 25),
('Constanța', '44.278571654072394', '28.626232267860534', 'yellow', 25),
('Cluj-Napoca', '46.878128193288156', '23.603206461684152', 'red', 25),
('Tmișoara', '45.839905390527576', '21.231388047465643', 'yellow', 25),
('Craiova', '44.39287422350721', '23.790828807010655', 'red', 25),
('Baia Mare', '47.70227843083661', '23.591868397489947', 'blue', 25),
('Iași', '47.22773710858213', '27.609300597812712', 'yellow', 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `type`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
