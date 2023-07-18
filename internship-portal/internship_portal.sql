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
  `company_name` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `admission_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `student_location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cv_file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `announcement_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `announcement_id` (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `student_name`, `company_name`, `admission_no`, `contact_no`, `student_location`, `cv_file`, `application_date`, `action`, `announcement_id`) VALUES
(1, 'Jane A', 'XYZPvtLtd', '', '98765432210', 'Panvel', 'Jane A_XYZPvtLtd_2000PE0400.pdf', '2023-07-01 06:14:50', 'Rejected', 0),
(3, 'Sanu', 'XYZPvtLtd', '', '1234567890', 'Uran', 'Sanu_XYZPvtLtd_2000PE0400.pdf', '2023-07-03 10:23:07', 'Approved', 0),
(4, 'Apu', 'XYZPvtLtd', '', '1234567890', 'Panvel', 'Apu_XYZPvtLtd_2000PE0400.pdf', '2023-07-04 07:21:25', 'Rejected', 0),
(5, 'Mitu', 'XYZPvtLtd', '2020PE0558', '1234567890', 'Panvel', 'Mitu_XYZPvtLtd_2000PE0400.pdf', '2023-07-07 15:53:13', 'Rejected', 0),
(6, 'manali', 'XYZPvtLtd', '22222PE050', '1234567890', 'Uran', 'manali_XYZPvtLtd_2000PE0400.pdf', '2023-07-11 08:49:20', 'Approved', 0),
(7, 'dd', '', '2022PE4134', '12345678890', 'Panvel', 'dd__2022PE4134.pdf', '2023-07-13 11:05:07', 'Rejected', 0),
(8, 'ss', '', '2023PE0802', '1234567890', 'panel', 'ss__2023PE0802.pdf', '2023-07-13 11:09:39', '', 0),
(9, 'mm', '', '2022PE2323', '1234567890', 'Panvel', 'mm__2022PE2323.pdf', '2023-07-13 11:22:05', '', 0),
(10, 'nn', '', '2021PE0706', '1234567890', 'Panvel', 'nn__2021PE0706.pdf', '2023-07-13 11:45:57', '', 0),
(11, 'mno', '', '2020PE7777', '1234567890', 'Panvel', 'mno__2020PE7777.pdf', '2023-07-13 19:10:29', '', 0),
(12, 'gg', '', '234', '123456789', 'Panvel', 'gg__234.pdf', '2023-07-13 19:11:39', '', 0),
(13, 'tt', '', '123', '123', 'Panvel', 'tt__123.pdf', '2023-07-14 14:50:59', '', 0),
(14, 'rr', '', '123', '123', 'Panvel', 'rr__123.pdf', '2023-07-14 15:01:44', '', 0),
(15, 'ww', 'web development', '123', '123', 'abc', 'ww_web development_123.pdf', '2023-07-14 15:40:32', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_announcement`
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
  `status` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_annoucement`
--

INSERT INTO `new_annoucement` (`announcement_id`, `announcement_title`, `description`, `skills_required`, `location`, `start_date`, `duration`, `branch`, `work_type`, `stipend_type`, `stipend`, `work_location`, `perks`, `user_id`, `published_on`, `status`) VALUES
(1, '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', 'myadav20ecs@student.mes.ac.in', '2023-06-21 09:04:16', 'Active'),
(2, 'ccc', '', '', 'WFH', '0000-00-00', 0, '', 'Paid', 'Paid', '2', 'WFH', 'ccxcz', 'demo@gmail.com', '2023-06-21 09:04:16', 'Inactive'),
(3, '2222', '', '', 'WFH', '0000-00-00', 22, '', 'Paid', 'Paid', '222', 'WFH', '22', 'demo@gmail.com', '2023-06-21 09:04:16', 'Active'),
(4, 'ee', '', '', 'WFH', '0000-00-00', 2, '', 'Paid', 'Paid', '22', 'WFH', '222', 'demo@gmail.com', '2023-06-21 09:04:16', 'Inactive'),
(5, 'iii', 'dd', 'slkil', 'WFH', '0000-00-00', 2, '', 'Paid', 'Paid', '22', 'WFH', '22', 'demo@gmail.com', '2023-06-21 09:04:16', 'Inactive'),
(6, '222', 'dd', 'slkil', 'WFH', '2023-01-11', 2, 'CS', 'Paid', 'Paid', '22', 'WFH', '22', 'demo@gmail.com', '2023-06-21 09:04:16', 'Active'),
(7, 'dd', 'DCDC', 'slkil', 'WFH', '2023-01-11', 22, 'CS', 'Paid', 'Paid', '22', 'WFH', '222', 'demo@gmail.com', '2023-06-21 09:04:16', 'Inactive'),
(8, '222', '333', '22', 'WFH', '2023-01-13', 222, 'ECS', 'Paid', 'Paid', '22', 'WFH', '22', 'demo@gmail.com', '2023-06-21 09:04:16', 'Active'),
(9, '22', 'w22', 'ee', 'WFH', '2023-01-11', 22, 'ECS', 'Paid', 'Paid', '222', 'WFH', '22', 'demo@gmail.com', '2023-06-21 09:04:16', 'Inactive'),
(10, 'eferg', 'ewfet', 'ewte5y', 'WFH', '2023-01-01', 0, 'ECS', 'Paid', 'Paid', '222', 'WFH', 'ferg', 'demo@gmail.com', '2023-06-21 09:04:16', ''),
(11, 'gjy', 'jhkj', 'hjgh', 'WFH', '2023-01-07', 1, 'MECH', 'Paid', 'Paid', '8870', 'WFH', 'gfhjb', 'demo@gmail.com', '2023-06-21 09:04:16', ''),
(12, 'fdgfc', 'hbvvb', 'fgcg', 'WFH', '2023-01-01', 0, 'ECS', 'Paid', 'Paid', '678', 'WFH', 'uhj', 'demo@gmail.com', '2023-06-21 09:04:16', ''),
(13, 'Internship for freshers', ' any degree student', 'Java', 'Panvel', '2023-07-02', 2, 'ECS', 'Paid', 'Monthly', '1500', 'Work From Home', 'Certificate', '', '2023-06-21 09:04:16', ''),
(14, 'abc', ' abc', 'abc', 'panvel', '2023-06-18', 2, 'IT', 'Paid', 'UnPaid', '1000', 'Hybrid', 'Certificate', '', '2023-06-21 09:04:16', ''),
(15, 'mno', ' mno', 'mno', 'abc', '2023-06-22', 2, 'CS', 'UnPaid', 'UnPaid', '0', 'Hybrid', 'Certificate', '', '2023-06-21 09:04:16', ''),
(16, 'hiring', ' for freshers', 'web development', 'Raigad', '2023-06-24', 2, 'MECH', 'Paid', 'Monthly', '2500', 'OnSite', 'Certificate', '', '2023-06-21 09:05:51', ''),
(17, 'data analyst internship', ' experience 0-2 years', 'xyz', 'Panvel', '2023-06-17', 3, 'ECS,CS,IT', 'Paid', 'Monthly', '3000', 'OnSite', 'Certificate', '', '2023-06-22 09:38:34', ''),
(18, 'abc', ' abc', 'ABC', 'Raigad', '2023-06-17', 2, 'MECH', 'UnPaid', 'UnPaid', '0', 'WFH', 'abc', '', '2023-06-22 17:44:51', ''),
(19, 'xyz', ' xyz', 'xyz', 'Panvel', '2023-06-18', 2, 'CS', 'Paid', 'UnPaid', '1000', 'Hybrid', 'xyz', '', '2023-06-30 05:38:19', ''),
(20, 'mno', ' mno', 'mno', 'Panvel', '2023-06-10', 2, 'MECH', 'UnPaid', 'Monthly', '0', 'Hybrid', 'Certificate', '', '2023-06-30 18:28:45', ''),
(21, 'pqr', ' pqr', 'pqr', 'Uran', '2023-07-12', 2, 'Array', 'Paid', 'UnPaid', '1000', 'Hybrid', 'Letter', '', '2023-07-02 17:28:38', ''),
(22, 'pqr', ' pqr', 'pqr', 'Uran', '2023-07-12', 2, 'ECS, CS, IT', 'Paid', 'UnPaid', '1000', 'Hybrid', 'Letter', '', '2023-07-02 17:32:30', ''),
(23, 'web development', ' abc', 'abc', 'abc', '2023-07-07', 3, 'EXTC, CS, IT', 'UnPaid', 'UnPaid', '0', 'WFH', 'abc', '', '2023-07-13 19:07:43', ''),
(24, 'www', ' ww', 'ww', 'ww', '2023-07-22', 2, 'CS, IT', 'UnPaid', 'UnPaid', '0', 'Hybrid', 'abc', '', '2023-07-14 15:51:18', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
