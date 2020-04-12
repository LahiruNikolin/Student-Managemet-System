-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2020 at 01:20 AM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrkllive_chamathka`
--

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
(1, '2020_04_10_142407_create_subject_table', 1),
(2, '2020_04_11_022814_create_teacher_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subjectName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectCategory` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjectName`, `subjectCategory`, `description`, `created_at`, `updated_at`) VALUES
(30, 'ITP', 'Special', 'SDF1', '2020-04-12 04:47:06', '2020-04-12 04:47:06'),
(31, 'business', 'Special', 'RTSDC2', '2020-04-12 05:02:34', '2020-04-12 05:02:34'),
(33, 'SINHALA', 'Normal', 'UY', '2020-04-12 08:47:27', '2020-04-12 08:47:27'),
(34, 'NYF', 'Normal', 'J', '2020-04-12 08:48:10', '2020-04-12 08:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `lname`, `status`, `subject`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Imesha', 'Anuruddha', '1', '', '', '', '2020-04-11 01:30:00', '2020-04-11 01:30:00'),
(2, 'Nimal', 'Jayasinghe', '0', '', '', '', '2020-04-11 01:30:00', '2020-04-11 01:30:00'),
(3, 'Ayesha', 'Bandara', '1', 'SINHALA', 'H', 'KJ', '2020-04-11 02:30:00', '2020-04-11 04:30:00'),
(4, 'Nadun', 'Perera', '0', '', '', '', '2020-04-11 02:30:00', '2020-04-11 04:30:00'),
(5, 'Namal', 'Karunanayake', '1', '', '', '', '2020-04-11 01:30:00', '2020-04-11 01:30:00'),
(6, 'Amila', 'Wijerathne', '1', '', '', '', '2020-04-11 01:30:00', '2020-04-11 01:30:00'),
(7, 'Suresh', 'Rajapakshe', '1', '', '', '', '2020-04-11 02:30:00', '2020-04-11 04:30:00'),
(8, 'Suren', 'Perera', '1', '', '', '', '2020-04-11 02:30:00', '2020-04-11 04:30:00'),
(9, 'Janaka', 'Kumara', '1', '', '', '', '2020-04-11 01:30:00', '2020-04-11 01:30:00'),
(10, 'Lasith', 'Rajapakshe', '1', '', '', '', '2020-04-11 01:30:00', '2020-04-11 01:30:00'),
(11, 'Namal', 'Kumara', '1', '', '', '', '2020-04-11 02:30:00', '2020-04-11 04:30:00'),
(12, 'Surendra', 'Perera', '1', '', '', '', '2020-04-11 02:30:00', '2020-04-11 04:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
