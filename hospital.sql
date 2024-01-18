-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 05:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_time` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Practice & Family Medicine', 'The General Practitioner is the first point of contact family members have for most medical services, the first professional person we turn to when we’re not feeling well or something else is not quite right with our bodies.', NULL, 1, '2022-01-11 01:06:07', '2022-01-11 01:06:07'),
(2, 'Paediatrics & Neonatology', 'Paediatrics is the medical specialty that focuses on medical conditions affecting babies, children and young people. Paediatricians concentrate on specific health issues, diseases and disorders related to stages of growth and development.', NULL, 1, NULL, NULL),
(3, 'Dermatology', 'Dermatology – derived from the Greek “derma”, meaning the skin – is the branch of medicine which focuses on the skin and its appendages (hair, nails, sweat glands etc.)', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `speciality` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT 'Male',
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `department_id`, `user_id`, `name`, `email`, `phone`, `photo`, `speciality`, `gender`, `status`) VALUES
(1, 2, 3, 'Elza Hermann', 'dibbert.carlie@example.net', '+1 (480) 401-5978', '', 'Paediatrics & Neonatology', 'Female', 1),
(2, 1, 3, 'Chasity Waters IV', 'larissa79@example.org', '+17725780406', '', 'General Practice & Family Medicine', 'Male', 1),
(3, 3, 3, 'Garnet Spinka', 'ebert.ryley@example.net', '+1 (765) 814-6002', '', 'Dermatology', 'Female', 1),
(4, 1, 3, 'Rosario Gaylord', 'jamison.bashirian@example.com', '+13862868313', '', 'General Practice & Family Medicine', 'Male', 1),
(5, 2, 3, 'Ressie Langosh', 'strosin.lorine@example.com', '1-737-333-2510', '', 'Paediatrics & Neonatology', 'Male', 1),
(6, 1, 3, 'Justen Senger', 'swift.ransom@example.net', '(870) 575-6309', '', 'General Practice & Family Medicine', 'Male', 1),
(7, 3, 3, 'Miss Sadye Mitchell', 'lavada91@example.com', '(662) 673-8635', '', 'Dermatology', 'Female', 1),
(8, 3, 3, 'Soledad Feeney', 'diamond.harber@example.net', '1-347-990-7554', '', 'Dermatology', 'Male', 1),
(9, 2, 3, 'Rosalind Lueilwitz', 'dbayer@example.net', '1-773-922-1752', '', 'Paediatrics & Neonatology', 'Female', 1),
(10, 1, 3, 'Olivia Bennett', 'oliviabennett@gmail.com', '1-356-885-7772', NULL, 'General Practice & Family Medicine\r\n', 'Female', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_doctors`
--

CREATE TABLE `message_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `name`, `gender`, `dob`, `email`, `phone`, `note`) VALUES
(1, 5, 'Liam Mitchell', 'Female', '2000-01-01', '', '09092342363', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `service_cost` int(11) NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `service_cost`, `status`) VALUES
(0, 'Pre-participation Physical Evaluation', 'Before participation in any sport, it is recommended that any professional or amateur athlete undergo a pre-participation physical evaluation (PPE). PPE helps in detecting serious conditions and provides strategies to prevent injuries. PPE should occur around 6 weeks before activity to allow for further evaluation or treatment if needed.', 200, 'Active'),
(1, 'Health Check-up Programmes', 'Designed to thoroughly assess your overall health, we offer 3 comprehensive check-up programmes.\r\nApproximate time to complete programme: Standard Programme(3 – 4 hours), Extensive Programme (3 – 4 hours), Executive Programme(4 – 6 hours)', 500, 'Active'),
(2, 'Health Screening Programmes', 'Population screening explained -\r\nScreening is the process of identifying apparently healthy people who may have an increased chance of a disease or condition. The screening provider then offers information, further tests and treatment.', 400, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` text NOT NULL DEFAULT 'images/default-user-photo.jpg',
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `photo`, `email`, `phone`, `status`, `email_verified_at`, `password`, `slug`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khoa Nguyen', 'images/default-user-photo.jpg', 'anhkhoanguyen366@gmail.com', 966164566, 1, NULL, '$2y$10$xlfoG5GlbS0TNM1R/7nsJehFM1vWRiFHz8ksmRxpBHoWQ3hZE9cfm', NULL, NULL, '2024-01-16 05:34:30', '2024-01-16 05:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `serial` int(11) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `serial`, `creator`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, NULL, 'super-admin', NULL, '2021-09-30 03:51:09', '2021-09-30 03:51:09'),
(2, 'Admin', 2, NULL, 'admin', NULL, '2021-09-30 03:51:09', '2021-09-30 03:51:09'),
(3, 'Doctor', 3, NULL, 'doctor', NULL, '2021-09-30 03:51:09', '2021-09-30 03:51:09'),
(4, 'Staff', 4, NULL, 'nurse', NULL, '2021-09-30 03:51:09', '2021-09-30 03:51:09'),
(5, 'Patient', 5, NULL, 'patient', NULL, '2021-09-30 03:51:09', '2021-09-30 03:51:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_doctors`
--
ALTER TABLE `message_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message_doctors`
--
ALTER TABLE `message_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
