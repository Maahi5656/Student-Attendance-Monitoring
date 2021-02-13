-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 08:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancemonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(255) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminUsername` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminUsername`, `Email`, `Password`) VALUES
(1, 'fddsfgfd', 'ddsds123', 'ajwadmaahi56@gmail.com', '1234'),
(2, 'fddsfgfd', 'hgfd321', 'ajwadmaahi56@gmail.com', '321'),
(3, 'fsdfgdsg', 'asdfg6547', 'ajwadmaahi56@gmail.com', '76543'),
(4, 'fkajfhifhuids', 'mnbvc543', 'ajwadmaahi56@gmail.com', '12'),
(5, 'dasds', 'rteewwr56', 'ajwadmaahi56@gmail.com', '345'),
(6, 'rtrtt', 'tre43', 'ajwadmaahi56@gmail.com', '231');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `StudentID` int(11) NOT NULL,
  `LoginTime` time NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`StudentID`, `LoginTime`, `Date`) VALUES
(10, '07:38:15', '2021-02-02'),
(8, '07:38:46', '2021-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageTo` int(255) NOT NULL,
  `MessageFrom` varchar(255) NOT NULL,
  `MessageText` varchar(255) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `UserInfo` varchar(255) DEFAULT NULL,
  `MessageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MessageTo`, `MessageFrom`, `MessageText`, `SendTime`, `UserInfo`, `MessageID`) VALUES
(5435, 'admin', 'your child has arrived in school !', '2021-02-02 06:25:23', NULL, 45),
(54321, 'admin', 'your child has arrived in school !', '2021-02-02 06:27:15', NULL, 46),
(5435, 'admin', 'your child has arrived in school !', '2021-02-02 06:30:20', NULL, 47),
(12345, 'admin', 'your child has arrived in school !', '2021-02-02 06:30:53', NULL, 48),
(12345, 'admin', 'your child has arrived in school !', '2021-02-02 06:42:57', NULL, 49),
(12345, 'admin', 'your child has arrived in school !', '2021-02-02 07:31:07', NULL, 50),
(12345, 'admin', 'your child has arrived in school !', '2021-02-02 07:34:00', NULL, 51),
(54321, 'admin', 'your child has arrived in school !', '2021-02-02 07:35:07', NULL, 52),
(5435, 'admin', 'your child has arrived in school !', '2021-02-02 07:37:03', NULL, 53),
(54321, 'admin', 'your child has arrived in school !', '2021-02-02 07:38:15', NULL, 54),
(5435, 'admin', 'your child has arrived in school !', '2021-02-02 07:38:46', NULL, 55);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(255) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `Guardian` varchar(255) NOT NULL,
  `StudentContact` int(255) NOT NULL,
  `GuardianContact` int(255) NOT NULL,
  `GradeLevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `Guardian`, `StudentContact`, `GuardianContact`, `GradeLevel`) VALUES
(1, 'daaF', 'WDQWREa', 12345, 12345, 'cl1'),
(7, 'affdgSF', 'rfsfdsf', 1234588888, 123458766, 'kg'),
(8, 'lkhgfd', 'WDQWREa', 5434, 5435, 'cl3'),
(9, 'lkhgfd', 'WDQWREa', 768, 543, 'cl3'),
(10, 'gfd', 'bvc', 234, 54321, 'cl2'),
(11, 'affdgSF', 'sad', 568787687, 2147483647, 'kg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `StudentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
