-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 08:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADM_ID` varchar(12) NOT NULL,
  `ADM_EMAIL` varchar(100) NOT NULL,
  `ADM_Password` varchar(50) NOT NULL,
  `ADM_Remark` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `F_ID` varchar(12) NOT NULL,
  `F_Name` char(250) NOT NULL,
  `F_Gender` char(10) NOT NULL,
  `F_Age` int(100) NOT NULL,
  `F_Phone_Number` int(10) NOT NULL,
  `F_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `internship_details`
--

CREATE TABLE `internship_details` (
  `INT_ID` varchar(20) NOT NULL,
  `INT_COMP` varchar(100) NOT NULL,
  `INT_TYPE` char(10) NOT NULL,
  `INT_START` date NOT NULL,
  `INT_END` date NOT NULL,
  `INT_DESC` text NOT NULL,
  `INT_STIPEND` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_ID` varchar(20) NOT NULL,
  `S_Name` char(250) DEFAULT NULL,
  `S_Gender` char(10) DEFAULT NULL,
  `S_Age` int(10) DEFAULT NULL,
  `S_Ph_No` int(10) DEFAULT NULL,
  `S_Email` varchar(250) DEFAULT NULL,
  `S_Resume` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_internship_details`
--

CREATE TABLE `student_internship_details` (
  `S_ID` varchar(20) NOT NULL,
  `INT_ID` varchar(20) NOT NULL,
  `INT_COMP` varchar(100) NOT NULL,
  `S_Name` char(250) NOT NULL,
  `S_Branch` char(5) NOT NULL,
  `S_Year` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADM_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `internship_details`
--
ALTER TABLE `internship_details`
  ADD PRIMARY KEY (`INT_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
