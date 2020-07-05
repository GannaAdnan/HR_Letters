-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 06:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `Document` varchar(30) NOT NULL,
  `UserID` bigint(14) NOT NULL,
  `LetterType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`Document`, `UserID`, `LetterType`) VALUES
('ID.jpg', 20170071502017, 'Embassy'),
('ID.jpg', 12345345676540, 'Hospital'),
('ID.jpg', 12345345676540, 'Bank'),
('ID.jpg', 12345345676540, 'Embassy');

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE `edit` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `ID` bigint(14) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `PhoneNO` varchar(11) NOT NULL,
  `DepName` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `Questions` text NOT NULL,
  `Answers` text NOT NULL,
  `QuesID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`Questions`, `Answers`, `QuesID`) VALUES
('Can i request more than one letter ?', 'Yes you can request up to 3 unapproved letters ', 1),
('How long will it take to send back my letter?', 'According to  the priority you submitted in the request.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `letters`
--

CREATE TABLE `letters` (
  `LetterType` varchar(20) NOT NULL,
  `Priority` varchar(20) NOT NULL,
  `Salary` varchar(20) NOT NULL,
  `Comments` varchar(30) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `UserID` bigint(14) NOT NULL,
  `QCcomments` text NOT NULL,
  `HRLetter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `letters`
--

INSERT INTO `letters` (`LetterType`, `Priority`, `Salary`, `Comments`, `Status`, `UserID`, `QCcomments`, `HRLetter`) VALUES
('Embassy', 'Urgent', 'With Salary', '', 'Written', 20170071502017, 'Done', 'Embassy20170071502017.txt'),
('Hospital', 'Urgent', 'With', '', 'Written', 12345345676540, '', 'Hospital12345345676540.txt'),
('Bank', 'Urgent', 'With Salary', '', 'Written', 12345345676540, '', 'Bank12345345676540.txt'),
('Embassy', 'Urgent', 'With Salary', '', '', 12345345676540, 'Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `ID` bigint(14) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `PhoneNO` varchar(11) NOT NULL,
  `DepName` varchar(10) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Fname`, `Lname`, `ID`, `Email`, `Address`, `Sex`, `Password`, `PhoneNO`, `DepName`, `Status`) VALUES
('Bucky', 'bbarnes', 2147483647, 'jamesbarnes@gmail.com', '26 el gahez street, الحي السابع', 'male', 'gannaadnan', '01141989599', 'HR', 'approved'),
('Alaa', 'hazem', 12345345676540, 'alaa@gmail.com', 'Obour', 'female', 'Alaayehia9', '01928394049', 'it', 'Approved'),
('Maysoon A.', 'Hossam', 20170071502017, 'maysoon@gmail.com', 'Obour', 'female', 'Ma12345678', '01141989760', 'QC', 'Approved'),
('Salma', 'Mohamed', 20172020111111, 'salma@gmail.com', 'Nasr City', 'female', 'Salmamohamed99', '01141989755', 'marketing', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
