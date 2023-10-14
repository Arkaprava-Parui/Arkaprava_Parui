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
-- Table structure for table `elective_subject`
--

CREATE TABLE `elective_subject` (
  `STUDENT_NAME` varchar(50) NOT NULL,
  `STUDENT_ROLL` varchar(50) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `PCODE` varchar(50) NOT NULL,
  `TYPE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elective_subject`
--

INSERT INTO `elective_subject` (`STUDENT_NAME`, `STUDENT_ROLL`, `SUBJECT`, `PCODE`, `TYPE`) VALUES
('BADAL KUMAR', 'CSE/20/01', 'DATA MINING', 'PE-CS 601A', 'ELECTIVE'),
('DEBRUP PRAMANIK', 'CSE/20/03', 'DATA MINING', 'PE-CS 601A', 'ELECTIVE'),
('surajit das', 'IT/20/05', 'ADVANCED ALGORITHM', 'PE-IT 601A', 'ELECTIVE'),
('surajit das', 'IT/20/05', 'DATA ANALYSIS AND BIG DATA LAB', 'PE-IT 691B', 'LAB ELECTIVE'),
('surajit das', 'IT/20/05', 'PROJECT-I', 'PW-IT 671', 'PROJECT'),
('SWAPNANIL SAHA', 'IT/20/03', 'CAC', 'PE-IT 605N', 'ELECTIVE'),
('SWAPNANIL SAHA', 'IT/20/03', 'PROJECT-I', 'PW-IT 671', 'PROJECT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elective_subject`
--
ALTER TABLE `elective_subject`
  ADD UNIQUE KEY `STUDENT_NAME` (`STUDENT_NAME`,`STUDENT_ROLL`,`SUBJECT`,`PCODE`,`TYPE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
