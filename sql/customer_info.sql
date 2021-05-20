-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 02:13 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactiontable`
--

CREATE TABLE `transactiontable` (
  `sno` int NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactiontable`
--

INSERT INTO `transactiontable` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'John', 'Nikki', 40000, '2021-05-18 18:02:43'),
(2, 'Nikki', 'John', 10000, '2021-05-18 18:06:44'),
(3, 'Harry', 'Mark', 3000, '2021-05-18 19:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `viewcustomers`
--

CREATE TABLE `viewcustomers` (
  `Id` int NOT NULL,
  `Customer_name` varchar(20) DEFAULT NULL,
  `Email_Id` varchar(40) DEFAULT NULL,
  `Balance` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `viewcustomers`
--

INSERT INTO `viewcustomers` (`Id`, `Customer_name`, `Email_Id`, `Balance`) VALUES
(1, 'Rick', 'rick@gmail.com', 60000),
(2, 'John', 'john@gmail.com', 30000),
(3, 'Jenny', 'jenny@gmail.com', 60000),
(4, 'Luna', 'luna@gmail.com', 60000),
(5, 'Harry', 'harry@gmail.com', 56000),
(6, 'Mark', 'mark@gmail.com', 58000),
(7, 'Andy', 'andy@gmail.com', 58000),
(8, 'Tom', 'tom@gmail.com', 60000),
(9, 'Nikki', 'nikki@gmail.com', 80000),
(10, 'Maya', 'maya@gmail.com', 61000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactiontable`
--
ALTER TABLE `transactiontable`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `viewcustomers`
--
ALTER TABLE `viewcustomers`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactiontable`
--
ALTER TABLE `transactiontable`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
