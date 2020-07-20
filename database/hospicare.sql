-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 08:18 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{\"admin\": 1}');

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
(1, 'Akidiva Memorial Hospital', 1, ' sunaeast', '2020-03-25 '),
(2, 'Mabera Hospital', 2, ' mabera', '2020-03-05 '),
(3, 'Uriri District Hospital', 3, ' uriri', '2020-03-02 '),
(4, 'Migori District Hospital', 4, ' sunawest', '2020-03-15 '),
(5, 'Kaimosi', 45, ' rongo', '2020-03-18 '),
(6, 'Wire', 21, ' awendo', '2020-03-10 '),
(7, 'Healthcare Hospital', 12, ' uriri', '2020-03-05'),
(8, 'STjh', 7876, ' uriri', '2020-03-07 '),
(9, 'Agha Khan', 8343847, ' sunawest', '2020-03-07 \r\n'),
(10, 'h gjg uj', 876543, ' sunaeast', '2020-03-08 '),
(11, 'testtest', 2147483647, ' kuriaeast', '2020-03-08 '),
(12, 'Bliss Medical Center', 23456789, ' ntimaru', '2020-03-08 '),
(13, 'Bliss Medical Center', 23456789, ' ntimaru', '2020-03-08 '),
(14, 'Maah Hospital', 123456, ' uriri', '2020-03-12'),
(15, 'MP-SHAH', 123456, ' kuriaeast', '2020-03-11'),
(16, 'Wamutreas', 234356, ' kuriaeast', '2020-03-12'),
(17, 'NYUBFNYG', 876543, ' rongo', '2020-03-12'),
(18, 'macalder', 6548976, ' nyatike', '2020-03-23'),
(19, 'Amoyo', 876543, ' uriri', '2020-03-28'),
(20, 'ghg', 3, ' sunawest', '2020-03-29'),
(21, 'rgvrgt`2`', 54, ' uriri', '2020-03-29'),
(22, 'fefe', 23, ' sunawest', '2020-03-29'),
(23, 'khbjh', 12, ' kuriaeast', '2020-03-29'),
(24, 'khbjh', 12, ' kuriaeast', '2020-03-29'),
(25, 'sdfg', 1234, ' mabera', '2020-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'John Doe', 37890012, 'A', 'male', '254716748724', 'Nyatike', 'Phares Willies', 0, 1, '0000-00-00'),
(2, 'Philip Raw', 234567898, 'AB', 'male', '254716748724', 'Komarock', 'John Karma', 1, 1, '0000-00-00'),
(3, 'Lenny Ekisa', 34546546, 'A', 'male', '254716748724', 'Ukraian', 'Kelly Roberts', 0, 1, '0000-00-00'),
(4, 'Phina Kersly', 36601586, 'O', 'male', '254716748724', 'Juja', 'Kauttse', 0, 1, '0000-00-00'),
(5, 'Leonard Ekisa', 23345536, 'AB', 'male', '254716748724', 'Kitui', 'My Guraian', 1, 2, '0000-00-00'),
(6, 'Dianne Sandra', 9872836, 'AB', 'male', '254716748724', 'Migori', 'Paul Toter', 1, 2, '0000-00-00'),
(8, 'Rick Malwe', 234345456, 'AB', 'male', '254716748724', 'Kuria', 'Ranod Meal', 1, 2, '0000-00-00'),
(9, 'Euphrate Mike', 98237824, 'O', 'male', '254716748724', 'Kahawa', 'mealae', 1, 2, '0000-00-00'),
(10, 'Wamaw Phelx', 234425, 'A', 'male', '254716748724', 'Kiwawa', 'Millicent', 0, 3, '0000-00-00'),
(11, 'Rawamal Paul', 134145, 'A', 'Female', '254716748724', 'Westalnad', 'Raphale linot', 0, 1, '2000-01-22'),
(12, 'Qwerty Keys', 1234354, 'AB', 'male', '254716748724', 'Keyboard', 'Motherboard', 1, 2, '0000-00-00'),
(13, 'Ascii Codes', 34536547, 'AB', 'male', '254716748724', 'Binary', 'Operating System', 1, 4, '0000-00-00'),
(14, 'Patrik Muturi', 3456564, 'A', 'male', '254716748724', 'Kayole', 'Wilfred Osumo', 0, 3, '0000-00-00'),
(15, 'Sheila Njogu', 1223453, 'A', 'male', '254716748724', 'Rapogi', 'May Njogu', 1, 4, '0000-00-00'),
(16, 'Test Date', 1243535, 'AB', 'male', '254716748724', 'Mwiki', 'Jeremy MK', 1, 4, '2020-03-20'),
(17, 'John Kimani', 3456427, 'AB', 'Male', '254716748724', 'Kilimani', 'George Wau', 0, 4, '2015-01-02'),
(18, 'Test Layout', 8765, 'AB', 'Male', '254716748724', 'YTGGB', 'YNVYUGV', 0, 3, '2020-03-11'),
(19, 'Mulki Elias', 36626789, 'AB', 'Female', '254716748724', 'Woodley', 'Maende', 0, 3, '1999-03-07'),
(20, 'Sherry', 3666666, 'AB', 'Female', '254716748724', 'Nyarongi', 'Wilies weru', 0, 3, '2020-03-07'),
(21, 'Olivia Sphie', 122343242, 'AB', 'Female', '254716748724', 'Wamali', 'Chrispine Akio', 1, 2, '2020-03-08'),
(22, 'Shileen Kasanga', 38763457, 'A', 'Female', '254716748724', 'Pipeline', 'Jerim Kaura', 1, 2, '2020-03-09'),
(23, 'Sharon Ghatie', 37456723, 'AB', 'Female', '254716748724', 'Mabera', 'Jerim Kaura', 1, 2, '1999-02-19'),
(24, 'Ann Mumo', 37896754, 'AB', 'Female', '254716748724', 'Machakos', 'Jerim Kaura', 0, 2, '1999-12-19'),
(25, 'Jerim Kaura', 38829678, 'AB', 'Male', '254716748724', 'Nairobi', 'John Doe', 1, 1, '2005-02-16'),
(26, 'Test Code', 12345678, 'AB', 'Other', '0712345689', 'TestCode', 'TestCode', 0, 3, '2002-02-05'),
(27, 'Test Code', 12345678, 'AB', 'Other', '0712345689', 'TestCode', 'TestCode', 0, 3, '2002-02-05'),
(28, 'Zabastian Nyambosero', 37123456, 'AB', 'Male', '254713117797', 'Mabera', 'Jerim Kaira', 0, 3, '2000-06-06'),
(29, 'Gladys Kio', 372345567, 'O', 'Male', '254720131416', 'Anywhere', 'Jerim Kaura', 1, 1, '1999-02-21'),
(30, 'John Doe', 37890012, 'A', 'male', '0712346578', 'Nyatike', 'Phares Willies', 1, 4, '0000-00-00'),
(31, 'Philip Raw', 234567898, 'AB', 'male', '078612345', 'Komarock', 'John Karma', 0, 1, '0000-00-00'),
(32, 'Lenny Ekisa', 34546546, 'A', 'male', '0786124435', 'Ukraian', 'Kelly Roberts', 1, 1, '0000-00-00'),
(33, 'Phina Kersly', 36601586, 'O', 'male', '0755338765', 'Juja', 'Kauttse', 1, 1, '0000-00-00'),
(34, 'Leonard Ekisa', 23345536, 'AB', 'male', '07112344566', 'Kitui', 'My Guraian', 1, 2, '0000-00-00'),
(35, 'Dianne Sandra', 9872836, 'AB', 'male', '0765432121', 'Migori', 'Paul Toter', 1, 2, '0000-00-00'),
(36, 'Rick Malwe', 234345456, 'AB', 'male', '07873745673', 'Kuria', 'Ranod Meal', 1, 1, '0000-00-00'),
(37, 'Euphrate Mike', 98237824, 'O', 'male', '0782736274', 'Kahawa', 'mealae', 1, 1, '0000-00-00'),
(38, 'Wamaw Phelx', 234425, 'A', 'male', '0783745343', 'Kiwawa', 'Millicent', 1, 1, '0000-00-00'),
(39, 'Rawamal Paul', 134145, 'A', 'Female', '077645324', 'Westalnad', 'Raphale linot', 0, 1, '2000-01-22'),
(40, 'Qwerty Keys', 1234354, 'AB', 'male', '0797463763', 'Keyboard', 'Motherboard', 0, 1, '0000-00-00'),
(41, 'Ascii Codes', 34536547, 'AB', 'male', '0773463545', 'Binary', 'Operating System', 1, 1, '0000-00-00'),
(42, 'Patrik Muturi', 3456564, 'A', 'male', '072847634', 'Kayole', 'Wilfred Osumo', 1, 1, '0000-00-00'),
(43, 'Sheila Njogu', 1223453, 'A', 'male', '0783743643', 'Rapogi', 'May Njogu', 0, 1, '0000-00-00'),
(44, 'Test Date', 1243535, 'AB', 'male', '0786743656', 'Mwiki', 'Jeremy MK', 0, 1, '2020-03-20'),
(45, 'John Kimani', 3456427, 'AB', 'Male', '0789346578', 'Kilimani', 'George Wau', 0, 1, '2015-01-02'),
(46, 'Test Layout', 8765, 'AB', 'Male', '98765', 'YTGGB', 'YNVYUGV', 1, 1, '2020-03-11'),
(47, 'Mulki Elias', 36626789, 'AB', 'Female', '0712531600', 'Woodley', 'Maende', 0, 1, '1999-03-07'),
(48, 'Sherry', 3666666, 'AB', 'Female', '07634363463', 'Nyarongi', 'Wilies weru', 0, 9, '2020-03-07'),
(49, 'Arwa Robi', 36990701, 'A', 'Female', '254717311500', 'Nyabohanse', 'Jerim Kaura', 0, 3, '2000-01-01'),
(50, 'Paul Agutu', 234567, 'AB', 'Male', '254720592275', 'Oruba', 'Robinson Agutu', 0, 1, '1992-06-17'),
(51, 'Phina Achieng', 36601586, 'AB', 'Female', '2547167487', 'Amoyo', 'Mama Phina', 0, 1, '1993-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` int(11) NOT NULL,
  `hospital_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_name`, `staff_email`, `phone`, `staff_password`, `username`, `gender`, `id_number`, `hospital_id`, `status`, `created_at`) VALUES
(1, 'Jerim Kaura', 'kaur@gmail.com', '0787654454', '98765', 'jerry', 'Male', 9876543, '98765', 1, '2020-03-04 16:33:37');

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
(1, 243590, 27),
(2, 646301, 19),
(3, 596815, 10),
(4, 694035, 14),
(5, 510942, 20),
(6, 710910, 28),
(7, 356188, 25),
(8, 770410, 29),
(9, 877487, 49),
(10, 443574, 47),
(11, 187375, 50),
(12, 694591, 51),
(13, 549040, 44),
(14, 177619, 45),
(15, 311377, 4),
(16, 600896, 38),
(17, 241903, 1);

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
  `Gender` varchar(20) NOT NULL,
  `ID_Number` int(30) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`, `hospital_id`, `Gender`, `ID_Number`, `Username`, `role`) VALUES
(1, 'Jerim Kaurah', 'jerimkaura001@gmail.comm', 716748724, 'c0b2665320f4d4624c8ba8a630c60399', '2020-03-04 19:42:04', 1, '', 38825678, 'Jerrim Kaura', 1),
(11, 'Phina Kaura', 'phina@gmail.com', 712345678, '25d55ad283aa400af464c76d713c07ad', '2020-03-28 18:24:03', 1, '', 0, 'PhinnaPhinnae', 2),
(12, 'Junior', 'junior@gmail.com', 71234567, '827ccb0eea8a706c4c34a16891f84e7b', '2020-03-28 18:26:05', 1, '', 3456789, 'PhinnaPhinnae', 2),
(13, 'Sharon Ghatie', 'ghatie@gmail.com', 712345678, 'eb90135aa1efda803b067c40eaebe5b3', '2020-04-24 11:50:12', 1, '', 12345678, 'Ghatie', 2),
(14, 'dvdggerge', 'dfvdvbfdv@hm.lk', 0, 'eb90135aa1efda803b067c40eaebe5b3', '2020-04-24 13:20:59', 0, '', 2435676, 'ghatie@gmail.com', 2),
(15, 'jhbgeyf wy', 'jhbgy@g.com', 987654, 'eb90135aa1efda803b067c40eaebe5b3', '2020-04-24 13:44:43', 15, '', 87654, 'ghatie@gmail.com', 2),
(16, 'Supper Admin', 'admin@gmail.com', 716748724, 'e3afed0047b08059d0fada10f400c1e5', '2020-04-24 17:32:13', 1, '', 38988296, 'Admin', 2);

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
(22, 25, '2020-04-24', 'iugtyb', 1, 'yufvty ', 'Not Discharged');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`staff_email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcodes`
--
ALTER TABLE `tblcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblvisits`
--
ALTER TABLE `tblvisits`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
