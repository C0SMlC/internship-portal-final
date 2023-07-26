USE `internship_portal`;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2023 at 08:38 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship_portal`
--
CREATE DATABASE IF NOT EXISTS `internship_portal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `internship_portal`;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_panel`
--

DROP TABLE IF EXISTS `faculty_panel`;
CREATE TABLE IF NOT EXISTS `faculty_panel` (
  `fac_id` int NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(128) NOT NULL,
  `fac_email` varchar(128) NOT NULL,
  `fac_age` int NOT NULL,
  `fac_mobile` int NOT NULL,
  `fac_address` varchar(128) NOT NULL,
  PRIMARY KEY (`fac_id`),
  UNIQUE KEY `fac_email` (`fac_email`),
  KEY `fac_name` (`fac_name`),
  KEY `fac_mobile` (`fac_mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `s_name` varchar(128) NOT NULL,
  `s_email` varchar(128) NOT NULL,
  `s_age` int NOT NULL,
  `s_mobile` bigint NOT NULL,
  `s_address` varchar(128) NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `s_email` (`s_email`),
  KEY `s_name` (`s_name`),
  KEY `s_mobile` (`s_mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tpo`
--

DROP TABLE IF EXISTS `tpo`;
CREATE TABLE IF NOT EXISTS `tpo` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `t_name` varchar(128) NOT NULL,
  `t_email` varchar(128) NOT NULL,
  `t_age` int NOT NULL,
  `t_mobile` int NOT NULL,
  `t_address` varchar(128) NOT NULL,
  PRIMARY KEY (`t_id`),
  UNIQUE KEY `t_email` (`t_email`),
  KEY `t_name` (`t_name`),
  KEY `t_mobile` (`t_mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
