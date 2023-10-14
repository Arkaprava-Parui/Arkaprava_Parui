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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_NAME` varchar(100) NOT NULL,
  `STUDENT_ROLL` varchar(100) NOT NULL,
  `SEMESTER` varchar(100) NOT NULL,
  `PROGRAM` varchar(100) NOT NULL,
  `EXAM_ROLL` varchar(100) NOT NULL,
  `GROUP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_NAME`, `STUDENT_ROLL`, `SEMESTER`, `PROGRAM`, `EXAM_ROLL`, `GROUP`) VALUES
('ABHIRUP MAJHI', 'CSE/22/01', '2nd', 'CSE', '11600610007', 'B'),
('AMRESH KUMAR', 'ECE/21/02', '4th', 'ECE', '11600830014', 'B'),
('ANANYA MONDAL', 'IT/20/01', '6th', 'IT', '11600720001', 'A'),
('BADAL KUMAR', 'CSE/20/01', '6th', 'CSE', '11600610001', 'A'),
('DEBRUP PRAMANIK', 'CSE/20/03', '6th', 'CSE', '11600610003', 'A'),
('GOURAV MALIK', 'CSE/21/02', '4th', 'CSE', '11600610006', 'B'),
('PIYUSH ANAND', 'IT/21/02', '4th', 'IT', '11600720006', 'B'),
('PRITHA BISWAS', 'CSE/21/01', '4th', 'CSE', '11600610005', 'B'),
('PRIYAJIT TANTI', 'ECE/20/01', '6th', 'ECE', '11600830010', 'A'),
('RAJARSHI CHOWDHURY', 'IT/20/04', '6th', 'IT', '11600720004', 'A'),
('ROUNAK MONDAL', 'IT/20/02', '6th', 'IT', '11600720002', 'A'),
('RUPAM GHOSH', 'ECE/21/01', '4th', 'ECE', '11600830013', 'B'),
('SANAK BANERJEE', 'ECE/20/03', '6th', 'ECE', '11600830012', 'A'),
('SASWATA KUNDU', 'IT/21/01', '4th', 'IT', '11600720005', 'B'),
('SHRIJA MUKHERJEE', 'ECE/22/01', '2nd', 'ECE', '11600830015', 'B'),
('SOURAV CHANDRA', 'CSE/20/02', '6th', 'CSE', '11600610002', 'A'),
('SOURAV NAYEK', 'IT/22/01', '2nd', 'IT', '11600720007', 'B'),
('SUJAY DAS', 'ECE/20/02', '6th', 'ECE', '11600830011', 'A'),
('SULAGNA DEY', 'CSE/20/04', '6th', 'CSE', '11600610004', 'A'),
('surajit das', 'IT/20/05', '6th', 'IT', '11600720005', 'A'),
('SWAPNANIL SAHA', 'IT/20/03', '6th', 'IT', '11600720003', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `STUDENT_NAME` (`STUDENT_NAME`,`STUDENT_ROLL`,`SEMESTER`,`PROGRAM`,`EXAM_ROLL`,`GROUP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
