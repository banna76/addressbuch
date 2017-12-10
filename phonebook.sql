-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 12:50 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `telephonenumbers`
--

CREATE TABLE `telephonenumbers` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `phonenumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `telephonenumbers`
--

INSERT INTO `telephonenumbers` (`id`, `user_id`, `phonenumber`) VALUES
(1, 1, '123456789'),
(3, 2, '111111111'),
(4, 2, '987654321'),
(5, 3, '0000'),
(7, 4, '333333333'),
(8, 2, '123456'),
(103, 3, '222222'),
(104, 3, '33333'),
(105, 3, '33333'),
(106, 1, '123000000'),
(111, 1, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `vorname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nachname` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `vorname`, `nachname`) VALUES
(1, 'Hasanul', 'Banna'),
(2, 'Lois', 'Griffin'),
(3, 'Joseph', 'Swanson'),
(4, 'Glenn', 'Quagmire');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `telephonenumbers`
--
ALTER TABLE `telephonenumbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `telephonenumbers`
--
ALTER TABLE `telephonenumbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
