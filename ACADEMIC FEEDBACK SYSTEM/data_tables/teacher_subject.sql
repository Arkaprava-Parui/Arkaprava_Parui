-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 11:12 PM
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
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `PROGRAM` varchar(50) NOT NULL,
  `SEMESTER` varchar(50) NOT NULL,
  `SUBJECT` varchar(50) NOT NULL,
  `TEACHER_NAME` varchar(50) NOT NULL,
  `PCODE` varchar(50) NOT NULL,
  `TEACHER_ID` varchar(50) NOT NULL,
  `TYPE` varchar(50) NOT NULL,
  `TEACHER_IMG` varchar(400) NOT NULL,
  `GROUP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`PROGRAM`, `SEMESTER`, `SUBJECT`, `TEACHER_NAME`, `PCODE`, `TEACHER_ID`, `TYPE`, `TEACHER_IMG`, `GROUP`) VALUES
('CSE', '2nd', 'PHYSICS', 'DR. SUBHRO S. THAKUR', 'BS-PH 201', '502002', 'CORE', '', ''),
('CSE', '4th', 'NUMERICAL METHODS LAB', 'DR. SUBHRO S. THAKUR', 'BS-M 494', '502002', 'LAB CORE', '', 'B'),
('CSE', '6th', 'COMPILER DESIGN', 'DR. SUBHRO S. THAKUR', 'PC-CS 601', '502002', 'CORE', '', ''),
('CSE', '6th', 'DATA MINING', 'DR. SUBHRO S. THAKUR', 'PE-CS 601A', '502002', 'ELECTIVE', '', ''),
('IT', '2nd', 'PROGRAMMING FOR PROBLEM SOLVING', 'MR. PRASENJIT DAS', 'ES-CS 201', '502004', 'CORE', '', ''),
('IT', '2nd', 'PROGRAMMING FOR PROBLEM SOLVING LAB', 'DR. AMIT PHADIKAR', 'ES-CS 291', '507008', 'LAB CORE', 'upload/IMG_2290.png', 'A'),
('IT', '2nd', 'PROGRAMMING FOR PROBLEM SOLVING LAB', 'DR. AMIT PHADIKAR', 'ES-CS 291', '507008', 'LAB CORE', 'upload/IMG_2290.png', 'B'),
('IT', '3rd', 'c++', 'DR. AMIT PHADIKAR', 'PC-IT502', '507008', 'CORE', 'upload/IMG_2290.png', ''),
('IT', '4th', 'DESIGN AND ANALYSIS OF ALGORITHM', 'DR. AMIT PHADIKAR', 'PC-IT 402', '507008', 'CORE', 'upload/IMG_2290.png', ''),
('IT', '4th', 'DESIGN AND ANALYSIS OF ALGORITHM LAB', 'DR. AMIT PHADIKAR', 'PC-IT 492', '507008', 'LAB CORE', 'upload/IMG_2290.png', 'B'),
('IT', '6th', 'ADVANCED ALGORITHM', 'DR. AMIT PHADIKAR', 'PE-IT 601A', '507008', 'ELECTIVE', 'upload/IMG_2290.png', ''),
('IT', '6th', 'APTITUDE SKILL DEVELOPMENT', 'DR. AMIT PHADIKAR', 'MC 671', '507008', 'SESSIONAL', 'upload/IMG_2290.png', ''),
('IT', '6th', 'CAC', 'AMI', 'PE-IT 605N', '507008', 'ELECTIVE', '', ''),
('IT', '6th', 'CAR', 'MAMJ', 'PC-IT 609', '507001', 'LAB CORE', '', 'B'),
('IT', '6th', 'COMPUTER NETWORKS', 'DR. AMIT PHADIKAR', 'PC-IT 602', '507008', 'CORE', 'upload/IMG_2290.png', ''),
('IT', '6th', 'DATA ANALYSIS AND BIG DATA LAB', 'DR. AMIT PHADIKAR', 'PE-IT 691B', '507008', 'LAB ELECTIVE', 'upload/IMG_2290.png', ''),
('IT', '6th', 'PROJECT-I', 'DR. AMIT PHADIKAR', 'PW-IT 671', '507008', 'PROJECT', 'upload/IMG_2290.png', ''),
('IT', '6th', 'PYTHON', 'SOHAN', 'PC-IT 605', '507008', 'LAB CORE', '', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD UNIQUE KEY `PROGRAM` (`PROGRAM`,`SEMESTER`,`SUBJECT`,`TEACHER_NAME`,`PCODE`,`TEACHER_ID`,`TYPE`,`GROUP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
