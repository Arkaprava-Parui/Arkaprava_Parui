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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `name`, `designation`, `id`) VALUES
('abhirupmajhi', '2011321007', 'ABHIRUP MAJHI', 'STUDENT', 11),
('amitphadikar', '72013017', 'DR. AMIT PHADIKAR', 'TEACHER', 41),
('amreshkumar', '2011321019', 'AMRESH KUMAR', 'STUDENT', 23),
('ananyamondal', '2011321008', 'ANANYA MONDAL', 'STUDENT', 12),
('arijitsarkar', '72013016', 'MR. ARIJIT SARKAR', 'TEACHER', 40),
('arindamdas', '72013012', 'MR. ARINDAM DAS', 'TEACHER', 36),
('ark', '111', 'arkaprava parui', 'TEACHER', 1),
('arkay', '126', 'ARUN', 'TEACHER', 110),
('arkay', 'ar123', 'Arko kayal', 'TEACHER', 83),
('arko', '123', 'arko kayal', 'ADMIN', 2),
('atanubanerjee', '72013021', 'DR. ATANU BANERJEE', 'TEACHER', 45),
('avijitbose', '72013001', 'MR. AVIJIT BOSE', 'TEACHER', 25),
('badalkumar', '2011321001', 'BADAL KUMAR', 'STUDENT', 5),
('bipro', '159', 'biprosom mojumdar', 'ADMIN', 4),
('debasreemaity', '72013025', 'MS. DEBASREE MAITY', 'TEACHER', 49),
('debruppramanik', '158', 'DEBRUP PRAMANIK', 'STUDENT', 7),
('gouravmalik', '2011321006', 'GOURAV MALIK', 'STUDENT', 10),
('ipsitadalui', '72013014', 'MS. IPSITA DALUI', 'TEACHER', 38),
('jayantimahata', '72013013', 'MS. JAYANTI MAHATA', 'TEACHER', 37),
('krishnenduchattopadhyay', '72013020', 'DR. KRISHNENDU CHATTOPADHYAY', 'TEACHER', 44),
('mahuanandypal', '72013005', 'MS. MAHUA NANDY PAL', 'TEACHER', 29),
('moumitagoswami', '72013008', 'MS. MOUMITA GOSWAMI', 'TEACHER', 32),
('nabamitamajumdar', '72013015', 'MS. NABAMITA MAJUMDAR', 'TEACHER', 39),
('piyushanand', '2011321013', 'PIYUSH ANAND', 'STUDENT', 17),
('prasenjitdas', '72013004', 'MR. PRASENJIT DAS', 'TEACHER', 28),
('prithabiswas', '2011321005', 'PRITHA BISWAS', 'STUDENT', 9),
('priyajittanti', '2011321015', 'PRIYAJIT TANTI', 'STUDENT', 19),
('priyanathmahanti', '72013018', 'MR. PRIYANATH MAHANTI', 'TEACHER', 42),
('pubalimukherjee', '72013023', 'DR. PUBALI MUKHERJEE', 'TEACHER', 47),
('rachitaghoshhajira', '72013006', 'MS. RACHITA GHOSHHAJIRA', 'TEACHER', 30),
('rajarshichowdhury', '2011321011', 'RAJARSHI CHOWDHURY', 'STUDENT', 15),
('rounakmondal', '2011321009', 'ROUNAK MONDAL', 'STUDENT', 13),
('rupamghosh', '2011321018', 'RUPAM GHOSH', 'STUDENT', 22),
('sachinbalo', '72013010', 'MR. SACHIN BALO', 'TEACHER', 34),
('sanakbanerjee', '2011321017', 'SANAK BANERJEE', 'STUDENT', 21),
('saswatakundu', '2011321012', 'SASWATA KUNDU', 'STUDENT', 16),
('satadalsaha', '72013022', 'DR. SATADAL SAHA', 'TEACHER', 46),
('shampasengupta', '72013011', 'DR. SHAMPA SENGUPTA', 'TEACHER', 35),
('shrijamukherjee', '2011321020', 'SHRIJA MUKHERJEE', 'STUDENT', 24),
('sohamlodh', '72013027', 'MR. SOHAM LODH', 'TEACHER', 51),
('somabandyopadhyay', '72013003', 'MS. SOMA BANDYOPADHYAY', 'TEACHER', 27),
('souravchandra', '2011321002', 'SOURAV CHANDRA', 'STUDENT', 6),
('souravnayek', '2011321014', 'SOURAV NAYEK', 'STUDENT', 18),
('subhasisbanerjee', '72013024', 'MR. SUBHASIS BANERJEE', 'TEACHER', 48),
('subhrosthakur', '72013002', 'DR. SUBHRO S. THAKUR', 'TEACHER', 26),
('sujaydas', '2011321016', 'SUJAY DAS', 'STUDENT', 20),
('sulagnadey', '2011321004', 'SULAGNA DEY', 'STUDENT', 8),
('sulagnaroy', '72013026', 'MS. SULAGNA ROY', 'TEACHER', 50),
('sumitmajumdar', '72013007', 'MR. SUMIT MAJUMDAR', 'TEACHER', 31),
('surajit', '124', 'surajit das', 'STUDENT', 3),
('surojitbhattarjee', '72013009', 'MR. SUROJIT BHATTARJEE', 'TEACHER', 33),
('swapnanilsaha', '2011321010', 'SWAPNANIL SAHA', 'STUDENT', 14),
('swarupmitra', '72013019', 'DR. SWARUP MITRA', 'TEACHER', 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`password`,`name`,`designation`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
