-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 11:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `view_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `STUDENT_NAME` varchar(50) NOT NULL,
  `TEACHER_NAME` varchar(50) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `PCODE` varchar(50) NOT NULL,
  `TYPE` varchar(50) NOT NULL,
  `PROGRAM` varchar(50) NOT NULL,
  `SEMESTER` varchar(50) NOT NULL,
  `Q1` varchar(50) NOT NULL,
  `Q2` varchar(50) NOT NULL,
  `Q3` varchar(50) NOT NULL,
  `Q4` varchar(50) NOT NULL,
  `Q5` varchar(50) NOT NULL,
  `Q6` varchar(50) NOT NULL,
  `Q7` varchar(50) NOT NULL,
  `Q8` varchar(50) NOT NULL,
  `Q9` varchar(50) NOT NULL,
  `Q10` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`STUDENT_NAME`, `TEACHER_NAME`, `SUBJECT`, `PCODE`, `TYPE`, `PROGRAM`, `SEMESTER`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`) VALUES
('surajit das', 'DR. AMIT PHADIKAR', 'ADVANCED ALGORITHM', 'PE-IT 601A', 'ELECTIVE', 'IT', '6th', '5', '2', '2', '2', '4', '3', '2', '1', '2', '1'),
('surajit das', 'DR. AMIT PHADIKAR', 'APTITUDE SKILL DEVELOPMENT', 'MC 671', 'SESSIONAL', 'IT', '6th', '4', '2', '2', '3', '3', '', '', '', '', ''),
('surajit das', 'DR. AMIT PHADIKAR', 'COMPUTER NETWORKS', 'PC-IT 602', 'CORE', 'IT', '6th', '2', '2', '3', '4', '4', '3', '3', '2', '2', '3'),
('surajit das', 'DR. AMIT PHADIKAR', 'DATA ANALYSIS AND BIG DATA LAB', 'PE-IT 691B', 'LAB ELECTIVE', 'IT', '6th', '5', '2', '2', '3', '1', '', '', '', '', ''),
('surajit das', 'DR. AMIT PHADIKAR', 'PYTHON', 'PC-IT 605', 'LAB CORE', 'IT', '6th', '3', '2', '3', '1', '2', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `STUDENT_NAME` (`STUDENT_NAME`,`TEACHER_NAME`,`SUBJECT`,`PCODE`,`TYPE`,`PROGRAM`,`SEMESTER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
