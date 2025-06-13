-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 07:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Set character set
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
 /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
 /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 /*!40101 SET NAMES utf8mb4 */;

-- Database: `the_green_chilli`
-- --------------------------------------------------------

-- Table structure for table `contact`
CREATE TABLE `contact` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `contact`
INSERT INTO `contact` (`name`, `email`, `mobile`, `subject`, `message`) VALUES
('Romil Vasoya', 'romil@example.com', 9510928916, 'Test Subject', 'This is a test message.');

-- --------------------------------------------------------

-- Table structure for table `customer`
CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `customer`
INSERT INTO `customer` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('User', 'user', 'user@gmil.com', 1234567890, 'Ahemdabad', 'User');

-- --------------------------------------------------------

-- Table structure for table `food`
CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(255) DEFAULT NULL,
  `options` varchar(10) DEFAULT 'ENABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `food`
INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `R_ID`, `images_path`, `options`) VALUES
(81, 'Handvo', 100, '200g', 7, '../images/Handvo.jpeg', 'ENABLE'),
(82, 'Bataka wada', 150, '500g', 7, '../images/Bataka wada.jpeg', 'ENABLE'),
(83, 'Jalebi & Fafda', 150, '500g', 7, '../images/fafda_with_jalebi.jpg', 'ENABLE'),
(84, 'Coconut Kothmir Tikki', 100, '500g', 7, '../images/Coconut Kothmir Tikki.jpg', 'ENABLE'),
(85, 'Khaman', 150, '200g', 7, '../images/khaman.jpg', 'ENABLE'),
(86, 'PURI SHAK', 590, 'Special Gujarati Thali', 7, '../images/LUNCH - PURI SHAK.jpeg', 'ENABLE'),
(87, 'PAROTHA SHAK', 590, 'Special Gujarati Thali', 7, '../images/LUNCH - PAROTHA SHAK.jpeg', 'ENABLE'),
(88, 'OLO & ROTLA', 590, 'Special Gujarati Thali', 7, '../images/LUNCH - RINGAN NO OLO & ROTLA.jpeg', 'ENABLE'),
(89, 'THEPLA', 590, 'Special Gujarati Thali', 7, '../images/THEPLA.jpg', 'ENABLE');

-- --------------------------------------------------------

-- Table structure for table `manager`
CREATE TABLE `manager` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `manager`
INSERT INTO `manager` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('Admin', 'Admin', 'admin@gmail.com', 1234567890, 'Ahemdabad', 'Admin');

-- --------------------------------------------------------

-- Table structure for table `orders`
CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `F_ID` int(30) DEFAULT NULL,
  `foodname` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `R_ID` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `orders`
INSERT INTO `orders` (`order_ID`, `F_ID`, `foodname`, `price`, `quantity`, `order_date`, `username`, `R_ID`) VALUES
(189, 81, 'Handvo', 100, 2, '2024-07-31', 'User', 7),
(190, 81, 'Handvo', 100, 6, '2024-07-31', 'User', 7);

-- --------------------------------------------------------

-- Table structure for table `restaurants`
CREATE TABLE `restaurants` (
  `R_ID` int(30) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `M_ID` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `restaurants`
INSERT INTO `restaurants` (`R_ID`, `name`, `email`, `contact`, `address`, `M_ID`) VALUES
(7, 'RAJWADU', 'rajwadu1@gmail.com', 2147483647, 'Nr. Jivraj Tolnaka, Behind Ambaji Temple, Malav Talav, Ahmedabad.', 'Admin');

-- Indexes for tables
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`, `R_ID`),
  ADD KEY `R_ID` (`R_ID`);

ALTER TABLE `manager`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `F_ID` (`F_ID`,`username`,`R_ID`),
  ADD KEY `username` (`username`);

ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`R_ID`),
  ADD UNIQUE KEY `M_ID_2` (`M_ID`),
  ADD KEY `M_ID` (`M_ID`);

-- Auto increment values
ALTER TABLE `food`
  MODIFY `F_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

ALTER TABLE `restaurants`
  MODIFY `R_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

-- Foreign key constraints
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `food` (`F_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`);

ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`M_ID`) REFERENCES `manager` (`username`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
