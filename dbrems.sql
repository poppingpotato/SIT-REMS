-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 06:30 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrems`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `eq_b_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `ReleasedBy_SA_ID` int(11) NOT NULL,
  `end` datetime DEFAULT NULL,
  `RecievedBy_SA_ID` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `created_at`, `updated_at`, `employee_id`, `student_id`, `eq_b_id`, `quantity`, `start`, `ReleasedBy_SA_ID`, `end`, `RecievedBy_SA_ID`, `status`) VALUES
(6, '2020-12-06 23:02:32', '2020-12-08 18:08:02', 23, 2, '1', 1, '2020-12-07 15:02:00', 2020, '2020-12-09 10:07:00', 2020, 0),
(11, '2020-12-08 18:05:55', '2020-12-09 19:57:23', 203, NULL, '2', 1, '2020-12-09 10:05:00', 2020, '2020-12-09 10:06:00', 2020, 0),
(14, '2020-12-09 19:50:51', '2020-12-13 22:44:47', 106, 2012, '2', 1, '2020-12-10 11:50:00', 2020, '2020-12-14 14:44:00', 2020, 0),
(15, '2020-12-09 19:51:43', '2020-12-13 22:44:38', 250105, 2012, '5', 1, '2020-12-10 11:51:00', 2020, '2020-12-14 14:44:00', 2020, 0),
(16, '2020-12-11 03:50:01', '2020-12-13 22:44:29', 250105, 4512041, '2', 1, '2020-12-11 19:49:00', 2020, '2020-12-14 14:44:00', 2020, 0),
(17, '2020-12-11 03:50:13', '2020-12-13 22:44:22', 4202185, 2012635, '2', 1, '2020-12-11 19:50:00', 2020, '2020-12-14 14:44:00', 2020, 0),
(18, '2020-12-13 19:35:00', '2020-12-13 19:51:11', NULL, 4512041, '1', 1, '2020-12-14 11:30:00', 2025, '2020-12-14 11:51:00', 20024, 0),
(19, '2020-12-13 20:14:27', '2020-12-13 22:44:07', 250105, NULL, '6', 1, '2020-12-14 12:14:00', 2020, '2020-12-14 14:44:00', 2020, 0),
(20, '2020-12-13 20:42:17', '2020-12-13 22:44:14', 4202185, 52142, '4', 1, '2020-12-14 12:42:00', 2020, '2020-12-14 14:44:00', 2020, 0),
(21, '2020-12-13 22:46:24', '2020-12-13 22:46:24', 250105, 520123, '2', 1, '2020-12-14 14:46:00', 2020, NULL, NULL, 1),
(22, '2020-12-15 22:31:45', '2020-12-15 22:36:42', 250105, 520123, '5', 1, '2020-12-16 14:31:00', 2020, '2020-12-16 14:35:00', 2020, 0),
(23, '2020-12-20 18:55:15', '2020-12-20 18:56:14', 201354, 2012635, '5', 1, '2020-12-21 10:55:00', 2025, '2020-12-21 11:56:00', 2025, 0),
(24, '2020-12-20 18:57:58', '2020-12-20 19:00:07', 2010, 520123, '6', 1, '2020-12-21 10:57:00', 2025, '2020-12-21 10:10:00', 20024, 0),
(25, '2020-12-20 19:01:50', '2020-12-20 19:01:50', 250105, 52142, '2', 1, '2020-12-21 11:01:00', 2025, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `lastName`, `firstName`, `created_at`, `updated_at`) VALUES
(5, 106, 'q', 'Hannah', '2020-12-08 18:05:01', '2020-12-08 18:05:01'),
(6, 203, 'Mayonaise', 'Hannah', '2020-12-08 18:05:12', '2020-12-08 18:05:12'),
(7, 2010, 'April', 'Mae', '2020-12-09 06:24:15', '2020-12-09 06:24:15'),
(9, 250105, 'Mayonaise', 'admin', '2020-12-09 07:11:51', '2020-12-09 07:11:51'),
(10, 201354, 'Test', 'Hannah', '2020-12-09 07:12:03', '2020-12-09 07:12:03'),
(11, 4202185, 'Labuyo', 'April', '2020-12-09 22:25:17', '2020-12-09 22:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `equipment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipmentName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `created_at`, `updated_at`, `equipment_id`, `equipmentName`, `quantity`) VALUES
(3, '2020-12-08 18:03:27', '2020-12-08 18:03:27', '3', 'Phone', 1),
(4, '2020-12-09 06:19:11', '2020-12-09 06:19:11', '4', 'Tab', 1),
(9, '2020-12-09 07:11:03', '2020-12-09 07:11:03', '1', 'Testers', 1),
(10, '2020-12-09 07:11:33', '2020-12-09 07:11:33', '2', 'Crimping Tool', 1),
(11, '2020-12-09 07:11:39', '2020-12-09 07:11:39', '5', 'Wacom', 1),
(12, '2020-12-09 22:25:34', '2020-12-09 22:25:34', '6', 'Extension', 2),
(13, '2020-12-14 03:46:36', '2020-12-14 03:46:36', '7', 'Projector', 1),
(14, '2020-12-15 21:59:13', '2020-12-15 22:02:04', '9', 'Crimping Tools', 2);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_18_145450_create_rooms_table', 1),
(5, '2020_11_18_150941_create_equipments_table', 1),
(6, '2020_12_02_105257_create_borrow_table', 1),
(7, '2020_12_02_105316_create_reserve_table', 1),
(8, '2020_12_02_125130_create_employees_table', 2),
(9, '2020_12_02_125159_create_students_table', 2);

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
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `eq_r_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ReservedBy_SA_ID` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `created_at`, `updated_at`, `employee_id`, `eq_r_id`, `quantity`, `room_id`, `ReservedBy_SA_ID`, `start`, `end`, `status`) VALUES
(3, '2020-12-07 05:04:49', '2020-12-09 20:04:03', 2, '1', 1, 'F201', 2020, '2020-12-07 21:04:00', '2020-12-07 21:04:00', 0),
(4, '2020-12-09 06:42:00', '2020-12-09 06:42:00', 2010, '2', 2, NULL, 2020, '2020-12-09 22:41:00', '2020-12-09 22:41:00', 1),
(5, '2020-12-09 20:00:04', '2020-12-09 20:00:04', 250105, NULL, 1, 'F202', 2020, '2020-12-10 11:59:00', '2020-12-26 12:00:00', 1),
(6, '2020-12-09 20:02:48', '2020-12-09 20:02:48', 201354, NULL, 1, 'F204', 2020, '2020-12-15 12:02:00', '2020-12-25 12:02:00', 1),
(7, '2020-12-13 19:55:13', '2020-12-13 19:55:13', 250105, '6', 1, 'F219', 2025, '2020-12-14 11:30:00', '2020-12-14 13:30:00', 1),
(8, '2020-12-14 03:02:29', '2020-12-14 03:02:29', 201354, '2', 1, NULL, 2020, '2020-12-14 19:02:00', '2020-12-14 19:02:00', 1),
(9, '2020-12-15 22:23:25', '2020-12-15 22:23:25', 201354, '2', 1, NULL, 2020, '2020-12-10 14:20:00', '2020-12-15 14:25:00', 1),
(10, '2020-12-15 22:40:42', '2020-12-15 22:40:42', 201354, NULL, 1, 'F205', 2020, '2020-12-16 14:37:00', '2020-12-16 14:37:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roomDes` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `created_at`, `updated_at`, `room_id`, `roomDes`) VALUES
(2, '2020-12-08 18:03:40', '2020-12-08 18:03:40', 'F202', 'Lecture/Projector Room'),
(3, '2020-12-08 18:03:46', '2020-12-08 18:03:46', 'F203', 'Lecture/Projector Room'),
(4, '2020-12-09 06:21:16', '2020-12-09 06:21:16', 'F204', 'Lecture/Projector Room'),
(6, '2020-12-09 06:44:16', '2020-12-09 06:44:16', 'F201', 'Lecture/Projector Room'),
(9, '2020-12-09 22:25:43', '2020-12-09 22:25:43', 'F205', 'Lecture/Projector Room'),
(10, '2020-12-09 22:25:52', '2020-12-09 22:25:52', 'F206', 'Lecture/Projector Room'),
(11, '2020-12-13 19:54:02', '2020-12-13 19:54:02', 'F219', 'Consultation Room');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `lastName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `lastName`, `firstName`, `created_at`, `updated_at`) VALUES
(5, 2012, 'Mayonaise', 'Mustard', '2020-12-09 06:29:11', '2020-12-09 06:29:11'),
(17, 2, 'q', 'admin', '2020-12-09 07:03:58', '2020-12-09 07:03:58'),
(18, 2012635, 'Molly', 'Claude', '2020-12-09 22:16:09', '2020-12-09 22:16:09'),
(19, 520123, 'Doe', 'John', '2020-12-09 22:23:37', '2020-12-09 22:23:37'),
(20, 52142, 'Kanta', 'Mo', '2020-12-09 22:24:02', '2020-12-09 22:24:02'),
(21, 4512041, 'Power', 'Cong', '2020-12-09 22:24:18', '2020-12-09 22:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idNumber` int(11) NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `idNumber`, `lastName`, `firstName`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 2010, 'User', 'User', 'user@user.com', NULL, 1, '$2y$10$6FQz1Mo1ngC1PshirfBv5eQ2KOmxJi2L/q.TXROJqEU6KeDz6EbnK', NULL, '2020-12-09 06:57:52', '2020-12-09 22:20:48'),
(11, 2025, 'user1', 'user1', 'user1@user.com', NULL, 0, '$2y$10$m6zrcDIX9AHTsHS9LCEEb.Tehh7LUFcekf6MhcImd.SRGEreP5Ipy', NULL, '2020-12-09 07:00:15', '2020-12-09 07:00:15'),
(12, 20024, 'user2', 'user2', 'user2@user.com', NULL, 0, '$2y$10$kqIQPblUjGNn0pwaylFrJewhmHHEhVbGl.pzewDAGuEkHEIzvHeO2', NULL, '2020-12-09 22:18:17', '2020-12-09 22:18:17'),
(13, 20163854, 'user3', 'user3', 'user3@user.com', NULL, 0, '$2y$10$wwpzDRACc56eRMpRPTimfuM2OGxtI88fbX2S8cFADCkCH0Ht.l8EG', NULL, '2020-12-09 22:20:11', '2020-12-09 22:20:11'),
(14, 2021, 'admin', 'admin1', 'admin1@admin.com', NULL, 0, '$2y$10$Q7P6a1owPwZJ2/DDZaxMvOI49OlVuv2mPl9XiORLxKEh41W8uLNre', NULL, '2020-12-09 22:20:39', '2020-12-09 22:20:39'),
(15, 2020, 'admin', 'admin', 'admin@admin.com', NULL, 1, '$2y$10$yK/K9ilVbb2yqR7/jPGdS.qQ0IwtxKRQ8UqDA2UQB0SBMqd2uNvky', NULL, '2021-03-20 01:26:32', '2021-03-20 01:26:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_employee_id_unique` (`employee_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipments_equipment_id_unique` (`equipment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_room_id_unique` (`room_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_student_id_unique` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_idnumber_unique` (`idNumber`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
