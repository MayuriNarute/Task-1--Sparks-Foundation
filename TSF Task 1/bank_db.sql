-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 08:07 AM
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
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `balance` int(15) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sender`, `receiver`, `balance`, `Date`) VALUES
('SHRUTI MEHTA', 'PRAVIN GUPTA', 200, '2021-11-02 05:49:18'),
('MAHIMA SHARMA', 'ROHIT JADHAV', 340, '2021-11-02 06:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(3) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Account_No` int(10) NOT NULL,
  `Balance` int(10) NOT NULL,
  `Mobile_no` varchar(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Account_No`, `Balance`, `Mobile_no`, `Email`, `Password`) VALUES
(1, 'SHRUTI MEHTA', 302198, 4500, '7890453321', 'shruti@gmail.com', 'Shruti@90'),
(2, 'MAHIMA SHARMA', 560213, 19660, '9804352177', 'mahima@gmail.com', 'Mahima@10'),
(3, 'PRAVIN GUPTA', 780256, 20200, '7023416544', 'pravin2@gmail.com', 'pravin@50'),
(4, 'SURESH CHOPRA', 120877, 12500, '8823014200', 'suresh@gmail.com', 'suresh#40'),
(5, 'PRADNYA MALHOTRA', 420658, 23200, '7501237893', 'pradnya@gmail.com', 'pradnya@12'),
(6, 'OJAS SHAHA', 201562, 17600, '8023678411', 'ojas@gmail.com', 'ojas@88'),
(7, 'KAVERI ZENDE', 340211, 13500, '8567210882', 'kaveri@gmail.com', 'kaveri@70'),
(8, 'ANJALI PATIL', 420893, 22000, '7658291033', 'anjali@gmail.com', 'anjali@18'),
(9, 'ROHIT JADHAV', 780101, 14340, '7243781100', 'rohit@gmail.com', 'rohit@84'),
(10, 'DIVYA KUKREJA', 133854, 33000, '7490238156', 'divya@gmail.com', 'divya@70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
