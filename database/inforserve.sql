-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 11:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospicare`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` int(11) NOT NULL,
  `subcounty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospital_name`, `reg_number`, `subcounty`, `created_at`) VALUES
(1, 'Akidiva Memorial Hospital', 1, ' sunawest', '2020-07-14'),
(2, 'Bliss Medical Center', 34567, ' kuriawest', '2020-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` int(11) NOT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `hospital_id` int(11) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_name`, `identification`, `blood`, `gender`, `phone`, `residence`, `guardian`, `status`, `hospital_id`, `dob`) VALUES
(1, 'John Doe', 38988296, 'AB', 'Male', '254716748724', 'Marindi', 'John Dough', 10, 1, '2001-02-12'),
(2, 'Oketch Simon', 31368767, 'AB', 'Male', '254741080067', 'Marindi', 'Dad OO1', 70, 1, '1999-02-11'),
(3, 'Anne Mumo', 34567898, 'O', 'Male', '254716748724', 'Kuria', 'Gordon Wamae', 60, 1, '1990-11-11'),
(4, 'Patient1', 213456, 'AB', 'Male', '254716748724', 'Ragana', 'JohnDoe', 1, 1, '1990-02-10'),
(5, 'Mary Wngechi', 23456789, 'A', 'Male', '254716748724', 'Suna', 'Mwani Kioki', 0, 1, '2006-02-10'),
(6, 'Sick Person', 23456789, 'AB', 'Female', '254716748724', 'Mlimani', 'John Wanner', 1, 2, '1890-11-11'),
(7, 'Kevin Kamau', 23456788, 'O', 'Female', '254716748724', 'Banana', 'William Kyle', 1, 2, '1997-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `tblcodes`
--

CREATE TABLE `tblcodes` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `patient_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcodes`
--

INSERT INTO `tblcodes` (`id`, `code`, `patient_id`) VALUES
(1, 815741, 51),
(2, 366688, 50),
(3, 480223, 47),
(4, 773864, 45),
(5, 877277, 2),
(6, 350617, 1),
(7, 316735, 4),
(8, 651605, 3),
(9, 517135, 7),
(10, 994006, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `hospital_id` int(11) NOT NULL,
  `ID_Number` int(30) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`, `hospital_id`, `ID_Number`, `Username`, `role`) VALUES
(16, 'Supper Admin', 'admin@gmail.com', 716748724, 'e3afed0047b08059d0fada10f400c1e5', '2020-04-24 17:32:13', 1, 38988296, 'Admin', 1),
(17, 'Jerim Kaura', 'jerry@gmail.com', 712345676, '25d55ad283aa400af464c76d713c07ad', '2020-07-16 07:11:26', 2, 87654467, 'Jerry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblvisits`
--

CREATE TABLE `tblvisits` (
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `admision_date` date NOT NULL,
  `diagnosed_with` varchar(50) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `drugs` varchar(50) NOT NULL,
  `date_discharged` varchar(50) DEFAULT 'Not Discharged'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvisits`
--

INSERT INTO `tblvisits` (`visit_id`, `patient_id`, `admision_date`, `diagnosed_with`, `hospital_id`, `drugs`, `date_discharged`) VALUES
(1, 20, '2020-03-09', 'Malaria', 3, 'Panadol', '2020-03-09'),
(2, 20, '2020-03-09', 'Anthrax', 3, 'Unknown', NULL),
(3, 20, '2020-03-09', 'Cholera', 3, 'Anti-Bacterial', '2020-03-09'),
(4, 19, '2020-03-09', 'Blood Cancer', 3, 'Blood Cancer Drugs', '2020-03-09'),
(5, 19, '2020-03-09', 'Lung Disease', 3, 'Lung Disease Drugs', '2020-03-09'),
(6, 18, '2020-03-09', 'Luekemia', 3, 'Iodine Tablets', 'Not Discharged'),
(7, 18, '2020-03-09', 'ew4rw', 3, 'srfs', '2020-03-09'),
(8, 14, '2020-03-09', 'Heart Attack', 3, 'Relax pills', '2020-03-09'),
(9, 29, '2020-03-12', 'Advanced Njaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 'Spicy chicken', 'Not Discharged'),
(10, 49, '2020-03-15', 'Sleeping sickness', 3, 'Food', '2020-03-15'),
(11, 50, '2020-03-20', 'Malaria', 1, 'Panadol', '2020-03-20'),
(12, 51, '2020-03-20', 'Malaria', 1, 'Panadol', '2020-03-20'),
(13, 51, '2020-03-23', 'Flu', 1, 'Cold cup', '2020-03-23'),
(14, 25, '2020-04-06', 'kmhhub ', 1, 'iu iuhb', 'Not Discharged'),
(15, 25, '2020-04-24', 'Chronic cough', 1, 'Plmnbcv', '2020-04-24'),
(16, 25, '2020-04-24', 'jbgyu', 1, 'ubuy', 'Not Discharged'),
(17, 25, '2020-04-24', 'jbgyu', 1, 'ubuy', 'Not Discharged'),
(18, 25, '2020-04-24', 'uhbgyuf', 1, 'uybft', '2020-04-24'),
(19, 25, '2020-04-24', 'jhubgy', 1, 'yuby', 'Not Discharged'),
(20, 25, '2020-04-24', 'hyvty', 1, '5yvtyfty', 'Not Discharged'),
(21, 25, '2020-04-24', 'hyvty', 1, '5yvtyfty', 'Not Discharged'),
(22, 25, '2020-04-24', 'iugtyb', 1, 'yufvty ', 'Not Discharged'),
(23, 1, '2020-07-14', 'Malaria', 1, 'Panadol', '2020-07-14'),
(24, 4, '2020-07-16', 'Malaaria', 1, 'Panadol', 'Not Discharged'),
(25, 7, '2020-07-16', 'Luekemia', 2, 'Antibiotics', '2020-07-16'),
(26, 7, '2020-07-16', 'Sleeping Sickness', 2, 'Anti Sleeping Pills', 'Not Discharged'),
(27, 6, '2020-07-20', 'Malaria', 2, 'ATR', 'Not Discharged');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcodes`
--
ALTER TABLE `tblcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisits`
--
ALTER TABLE `tblvisits`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcodes`
--
ALTER TABLE `tblcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblvisits`
--
ALTER TABLE `tblvisits`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
