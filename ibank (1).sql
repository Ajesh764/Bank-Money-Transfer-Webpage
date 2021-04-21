-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 09:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `currbal` int(10) NOT NULL DEFAULT 0,
  `accno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `currbal`, `accno`) VALUES
('Ajesh C V', 'ajesh@mail.com', 860, '123456789'),
('Aswin P', 'aswin@mail.com', 2440, '234567891'),
('Abin Aju', 'abin@mail.com', 950, '345678912'),
('Liyans Mathews', 'liyans@mail.com', 950, '456789123'),
('Christa Mathew', 'christa@mail.com', 800, '567891234'),
('Jeswin Anil', 'jeswin@mail.com', 39000, '678912345'),
('Danish Thomas', 'danish@mail.com', 50000, '789123456'),
('Joseph Anil', 'joseph@mail.com', 10000, '912345678');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `tno` int(10) NOT NULL,
  `facc` varchar(10) NOT NULL,
  `tacc` varchar(10) NOT NULL,
  `amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`tno`, `facc`, `tacc`, `amt`) VALUES
(29, '234567891', '123456789', 500),
(30, '234567891', '456789123', 500),
(31, '234567891', '456789123', 500),
(32, '234567891', '456789123', 500),
(33, '234567891', '456789123', 500),
(34, '123456789', '23456789', 100),
(35, '123456789', '23456789', 6000),
(36, '123456789', '23456789', 5000),
(37, '123456789', '23456789', 5000),
(38, '123456789', '23456789', 5000),
(39, '123456789', '23456789', 5000),
(40, '123456789', '345678912', 50),
(41, '345678912', '123456789', 31000),
(42, '345678912', '123456789', 100),
(43, '123456789', '345678912', 32000),
(44, '123456789', '123456789', 50),
(45, '123456789', '234567891', 1000),
(46, '678912345', '123456789', 1000),
(47, '456789123', '123456789', 50),
(48, '567891234', '234567891', 200),
(49, '345678912', '234567891', 50),
(50, '234567891', '123456789', 20),
(51, '234567891', '123456789', 50),
(52, '123456789', '234567891', 20),
(53, '234567891', '123456789', 20),
(54, '234567891', '123456789', 20),
(55, '123456789', '234567891', 20),
(56, '123456789', '234567891', 10),
(57, '123456789', '234567891', 100),
(58, '123456789', '234567891', 100),
(59, '123456789', '234567891', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`accno`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`tno`),
  ADD KEY `fk` (`facc`,`tacc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `tno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
