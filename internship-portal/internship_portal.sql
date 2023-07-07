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

-- CREATE TABLE `faculty` ( //remove comment later
--   `F_ID` varchar(12) NOT NULL,
--   `F_Name` char(250) NOT NULL,
--   `F_Gender` char(10) NOT NULL,
--   `F_Age` int(100) NOT NULL,
--   `F_Phone_Number` int(10) NOT NULL,
--   `F_Email` varchar(100) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- CREATE TABLE `student` (  // remove comment afterwards
--   `S_ID` varchar(20) NOT NULL,
--   `S_Name` char(250) DEFAULT NULL,
--   `S_Gender` char(10) DEFAULT NULL,
--   `S_Age` int(10) DEFAULT NULL,
--   `S_Ph_No` int(10) DEFAULT NULL,
--   `S_Email` varchar(250) DEFAULT NULL,
--   `S_Resume` varchar(500) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- ALTER TABLE `faculty` //remove comment later
--   ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `internship_details`
--
ALTER TABLE `internship_details`
  ADD PRIMARY KEY (`INT_ID`);

--
-- Indexes for table `student`
--
-- ALTER TABLE `student` //remove comment later
--   ADD PRIMARY KEY (`S_ID`);
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2023 at 03:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

------------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `student_location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cv_file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `student_name`, `contact_no`, `student_location`, `cv_file`, `application_date`, `action`) VALUES
(1, 'Jane A', '98765432210', 'Panvel', 'Jane A_XYZPvtLtd_2000PE0400.pdf', '2023-07-01 06:14:50', ''),
(3, 'Sanu', '1234567890', 'Uran', 'Sanu_XYZPvtLtd_2000PE0400.pdf', '2023-07-03 10:23:07', ''),
(4, 'Apu', '1234567890', 'Panvel', 'Apu_XYZPvtLtd_2000PE0400.pdf', '2023-07-04 07:21:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `new_annoucement`
--

DROP TABLE IF EXISTS `new_annoucement`;
CREATE TABLE IF NOT EXISTS `new_annoucement` (
  `announcement_id` int NOT NULL AUTO_INCREMENT,
  `announcement_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `skills_required` text COLLATE utf8mb4_general_ci NOT NULL,
  `location` text COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `duration` int NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `work_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stipend_type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `stipend` text COLLATE utf8mb4_general_ci NOT NULL,
  `work_location` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `perks` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `published_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
