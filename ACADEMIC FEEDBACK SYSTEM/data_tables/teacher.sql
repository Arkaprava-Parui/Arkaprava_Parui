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
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `PROGRAM` varchar(50) NOT NULL,
  `TEACHER_NAME` varchar(50) NOT NULL,
  `TEACHER_ID` varchar(50) NOT NULL,
  `TEACHER_IMG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`PROGRAM`, `TEACHER_NAME`, `TEACHER_ID`, `TEACHER_IMG`) VALUES
('CSE', 'DR. SUBHRO S. THAKUR', '502002', ''),
('CSE', 'MR. AVIJIT BOSE', '502001', ''),
('CSE', 'MR. PRASENJIT DAS', '502004', ''),
('CSE', 'MR. SUMIT MAJUMDAR', '502007', ''),
('CSE', 'MR. SUROJIT BHATTARJEE', '502009', ''),
('CSE', 'MS. MAHUA NANDY PAL', '502005', ''),
('CSE', 'MS. MOUMITA GOSWAMI', '502008', ''),
('CSE', 'MS. RACHITA GHOSHHAJIRA', '502006', ''),
('CSE', 'MS. SOMA BANDYOPADHYAY', '502003', ''),
('ECE', 'DR. ATANU BANERJEE', '504203', ''),
('ECE', 'DR. KRISHNENDU CHATTOPADHYAY', '504202', ''),
('ECE', 'DR. PUBALI MUKHERJEE', '504205', ''),
('ECE', 'DR. SATADAL SAHA', '504204', ''),
('ECE', 'DR. SWARUP MITRA', '504201', ''),
('ECE', 'MR. SOHAM LODH', '504209', ''),
('ECE', 'MR. SUBHASIS BANERJEE', '504206', ''),
('ECE', 'MS. DEBASREE MAITY', '504207', ''),
('ECE', 'MS. SULAGNA ROY', '504208', ''),
('IT', 'ARUN', '1254', 'upload/download (1).png'),
('IT', 'DR. AMIT PHADIKAR', '507008', 'upload/IMG_2290.png'),
('IT', 'DR. SHAMPA SENGUPTA', '507002', ''),
('IT', 'MR. ARIJIT SARKAR', '507007', ''),
('IT', 'MR. ARINDAM DAS', '507003', ''),
('IT', 'MR. PRIYANATH MAHANTI', '507009', ''),
('IT', 'MR. SACHIN BALO', '507001', ''),
('IT', 'MS. IPSITA DALUI', '507005', ''),
('IT', 'MS. JAYANTI MAHATA', '507004', ''),
('IT', 'MS. NABAMITA MAJUMDAR', '507006', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD UNIQUE KEY `PROGRAM` (`PROGRAM`,`TEACHER_NAME`,`TEACHER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
