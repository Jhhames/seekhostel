-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 06:39 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homies`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(80) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `number`) VALUES
(4, 'Falola', 'James', 'Jhhames', 'fjhhames@gmail.com', '$2y$10$0j1zZcAwT/WHo6y.XA8V8eIhkDovsuyRPSuFWZncgPkMfqhwHhieS', '08165906890'),
(5, 'John', 'doe', 'JohnDoe', 'johndoe@gmail.com', '$2y$10$VM20jOX2VYt.Di7GKxqmNO.O0kcKlzMf30pZLSbh/a9YR9FONHUqK', ''),
(6, 'will', 'head', 'willy', 'willy@gmaIl.com', '$2y$10$uu2KwUrEI/wHJ2EvJbq6GuDfxBmrJ1qlCq6OyePcBAUFtxQGrGFVC', '');

-- --------------------------------------------------------

--
-- Table structure for table `housedetails`
--

CREATE TABLE `housedetails` (
  `id` int(4) NOT NULL,
  `location` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` int(7) NOT NULL,
  `search_description` varchar(100) NOT NULL,
  `prange` varchar(20) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `house_description` varchar(500) NOT NULL,
  `agent` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `others` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housedetails`
--

INSERT INTO `housedetails` (`id`, `location`, `type`, `price`, `search_description`, `prange`, `image_url`, `house_description`, `agent`, `status`, `others`) VALUES
(19, 'Mayfair', 'Single-room', 56000, 'Mayfair 40-60k Single-room available', '40-60k', 'http://localhost/homies/assets/uploads/7b5de76776b733dba2ad138998c1cb67.jpg', '    this house is the shit mehn, o dope gahn', 'jhhames', 'available', ''),
(20, 'Mayfair', 'Single-room', 50000, 'Mayfair 40-60k Single-room available', '40-60k', 'http://localhost/homies/assets/uploads/b02c2b5a139f0d0a508b2b6a1af53b3c.jpg', '     this house is the shit mehn, o dope gahn', 'jhhames', 'available', ''),
(21, 'Mayfair', 'Single-room', 50000, 'Mayfair 40-60k Single-room available', '40-60k', 'http://localhost/homies/assets/uploads/7d45c927437df8f4c6aec85b467e4b0a.jpg', '     this house is the shit mehn, o dope gahn', 'jhhames', 'available', ''),
(22, 'Mayfair', 'Flat', 78000, 'Mayfair 60-80k Flat available', '60-80k', 'http://localhost/homies/assets/uploads/7a341c4f8cf49a3847bf7459a6179fb8.png', ' house\r\nhas lots of shits \r\ne.g 24/7 electricity and water \r\nmany tenants and a security team so you may be charged extra security as deemed fit by the tenants commitee', 'jhhames', 'available', ''),
(23, 'Ede-road', 'Single-room', 89000, 'Ede-road 80-100k Single-room available', '80-100k', 'http://localhost/homies/assets/uploads/db92bd2eae45bb18fd9ed0915a104dfe.png', ' its a terrible house', 'jhhames', 'available', ''),
(24, 'Ibadan-Roa', 'Self-contain', 78000, 'Ibadan-Road 60-80k Self-contain available', '60-80k', 'http://localhost/homies/assets/uploads/4747e5a5842ff779ec5c26dbe4a61a90.png', ' pretty girl to dope\r\n', 'jhhames', 'available', ''),
(25, 'Ede-road', 'Self-contain', 67000, 'Ede-road 60-80k Self-contain available', '60-80k', 'http://localhost/homies/assets/uploads/7aaae669fe1b63f5d1c6c3d32c8c9c94.png', ' jsjs', 'jhhames', 'available', ''),
(26, 'Ibadan-Roa', 'Flat', 67000, 'Ibadan-Road 60-80k Flat', '60-80k', 'http://localhost/homies/assets/uploads/981813c797acd5a84cf7474e049f7b2e.jpg', ' its the best shit ever liverth', 'JohnDoe', 'available', ''),
(27, 'Ede-road', 'BQ', 78000, 'Ede-road 80-100k BQ', '80-100k', 'http://localhost/homies/assets/uploads/e1f12b33c2312d325ddaaf79ab4f818d.jpg', ' black black sheep have you any wood , yes sir yes sir three black shitt', 'JohnDoe', 'not available', ''),
(28, 'Ede-road', 'Single-room', 78000, 'Ede-road 80-100k Single-room available', '80-100k', 'http://localhost/homies/assets/uploads/84039acff665c0b83f58d25fdc45fac1.jpg', ' its pretty nice \r\ntoilrts and all', 'Jhhames', 'available', '<img src=http://localhost/homies/assets/uploads/e0d9f6637a78d4695fafd180b6450eab.jpg height=\'200px\' width=\'200px\'> <img src=http://localhost/homies/assets/uploads/3304237767bf08555a4986ea575ab0f9.jpg height=\'200px\' width=\'200px\'> <img src=http://localhost/homies/assets/uploads/a978035b068b96ad1c14d270a5822a96.jpg height=\'200px\' width=\'200px\'> <img src=http://localhost/homies/assets/uploads/ecb967ec47984166742d0572ed5deb22.jpg height=\'200px\' width=\'200px\'> '),
(29, 'Ede-road', 'Single-room', 110000, 'Ede-road 100-120k Single-room available', '100-120k', 'http://localhost/homies/assets/uploads/42791ae5336b54b57dfa04ce806ca44c.jpg', 'electricity: 24/7\r\nwater: constant\r\nroad: manageable', 'jhhames', 'available', '<img src=http://localhost/homies/assets/uploads/2a07ef604e5a734414b7047a4ef4e261.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/4124025d46653105e898567f071a8577.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/fcab3064b5a488bfd1ee51891307934c.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/19ee0ab2bfc06dd163eb23473e35720c.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/acc7540b7eb3af02d00bcede7514d8bb.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/fef01b77b4583a6800b838434957af9f.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/1d7220eaa9d505aac16993e2afa928bc.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/3c2f014b05b596bfd650dbbd2357e77a.png height=\'300px\' width=\'280px\'> <img src=http://localhost/homies/assets/uploads/073eeaa01f496b79f7df7e356858289a');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(250) NOT NULL,
  `agent_name` varchar(30) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `checker` varchar(50) NOT NULL,
  `client_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `agent_name`, `client_name`, `image`, `price`, `type`, `location`, `checker`, `client_number`) VALUES
(30, 'jhhames', 'Falola Oluwatobi', 'http://localhost/homies/assets/uploads/42791ae5336b54b57dfa04ce806ca44c.jpg', '110000', 'Single-room', 'Ede-road', '29tobijhhames', '08165906890'),
(31, 'Jhhames', 'Falola Oluwatobi', 'http://localhost/homies/assets/uploads/84039acff665c0b83f58d25fdc45fac1.jpg', '78000', 'Single-room', 'Ede-road', '28tobijhhames', '08165906890');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `number` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `number`) VALUES
(7, 'Falola', 'Oluwatobi', 'fjhhames@gmail.com', 'tobijhhames', '$2y$10$7sve.t6IZZeMNhcD5UvUC.JqbsllTBlZUpruhDVbsFyQWzEmz.q9q', '08165906890'),
(8, 'william', 'james', 'willy@gmaIl.com', 'willy', '$2y$10$6U4ipjM3yZrT72RcFuZuCeHKZsOiQ3elmR6h7pOtiVAsEMnA.wPoy', '09087237218');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housedetails`
--
ALTER TABLE `housedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `housedetails`
--
ALTER TABLE `housedetails`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
