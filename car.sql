-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 16, 2018 at 06:54 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `status`, `timestamp`) VALUES
(1, 'Maruti Suzuki', 1, '2018-07-15 14:24:57'),
(2, 'Tata', 1, '2018-07-15 14:24:50'),
(3, 'Renault', 1, '2018-07-15 03:47:25'),
(8, 'Honda', 1, '2018-07-15 07:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `manufacturer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `regnum` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `items` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `manufacturer`, `name`, `color`, `year`, `regnum`, `note`, `image1`, `image2`, `items`, `status`, `timestamp`) VALUES
(1, 1, 'Celerio', 'white', 2018, '1234', '																																																																																Nice Hatchback Car in this segment.																																																																						', 'rczr-1308pc023-72dpi_194629_43.jpg', 'rczr-1308pc023-72dpi_194629_431.jpg', 1, 1, '2018-07-16 16:51:56'),
(2, 1, '3', '3', 3, '3', '3															', '_MGL16732.jpg', '_MGL167311.jpg', 0, 1, '2018-07-16 16:11:05'),
(3, 1, 'Alto', 'White', 2016, '1234', 'demooo', 'g6.jpg', 'g7.jpg', 0, 1, '2018-07-16 16:08:54'),
(4, 1, 'WagonR', 'Silver', 2017, '2121', '								demo							', 'rczr-1308pc023-72dpi_194629_432.jpg', 'rczr-1308pc023-72dpi_194629_433.jpg', 1, 1, '2018-07-16 16:52:18'),
(5, 1, 'Ciaz', 'red', 2012, '111', 'demoo', 'about-us.jpg', 'bachan.jpg', 1, 0, '2018-07-16 16:21:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
