-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 12:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_02_11_044432_add_fields_to_users_table', 1),
('2018_02_26_113345_create_f_models_table', 1),
('2018_02_26_114931_create_f_photos_table', 1),
('2018_02_26_122138_create_m_connections_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
`id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `main_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `title`, `description`, `created_by`, `main_photo`, `created_at`, `updated_at`) VALUES
(1, 'Model1', 'Navs available in Bootstrap have shared markup, starting with the base .nav class, as well as shared states. Swap modifier classes to switch between each style.', 1, 'kp40aB3PN8b1nW8AKnAyqh9NHO0sDxFUcgXXHDra', '2018-02-27 13:52:27', '2018-02-27 14:16:08'),
(2, 'Model2', 'Navs available in Bootstrap have shared markup, starting with the base .nav class, as well as shared states. Swap modifier classes to switch between each style.', 1, 'm2bdMQdXiTjWeqCY4b4FkNLgLfpqPo1jsV00xISr', '2018-02-27 13:52:45', '2018-02-27 14:18:41'),
(3, 'Model3', 'For any nav component (tabs or pills), add .disabled for gray links and no hover effects.', 1, 'cqqXaMyq0pGTEjfz8rvxPG4R2WwfSYo8VBfdznOD', '2018-02-27 14:16:48', '2018-02-27 14:16:48'),
(4, 'Model4', 'ote: If you''re viewing this page via a file:// URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.', 5, 'CwpUVsJqHRNt1YtF5GXYtZeYa3lnFK77cpR4HX3z', '2018-02-27 19:31:06', '2018-02-27 19:31:06'),
(5, 'Model5', 'Another example headline.\r\nCras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 4, 'U4VXtKZ4AfYcp3NhJkaQeKyhMoEg713Uir0bDCrM', '2018-02-27 19:32:16', '2018-02-27 19:32:17'),
(6, 'Model6', 'One more for good measure.\r\nCras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 3, '8Pq7lArmBrJyVTuo89CclwiLY3MCsbunjJ4mXPYm', '2018-02-27 19:33:11', '2018-02-27 19:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `m_connections`
--

CREATE TABLE IF NOT EXISTS `m_connections` (
`id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `m_connections`
--

INSERT INTO `m_connections` (`id`, `model_id`, `user_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '100.00', '2018-02-27 13:52:27', '2018-02-27 13:52:27'),
(2, 2, 1, '200.00', '2018-02-27 13:52:45', '2018-02-27 13:52:45'),
(3, 3, 1, '150.00', '2018-02-27 14:16:48', '2018-02-27 14:16:48'),
(5, 1, 2, '251.00', '2018-02-27 19:15:33', '2018-02-27 19:15:33'),
(6, 4, 5, '400.00', '2018-02-27 19:31:07', '2018-02-27 19:31:07'),
(7, 5, 4, '241.00', '2018-02-27 19:32:17', '2018-02-27 19:32:17'),
(8, 6, 3, '150.00', '2018-02-27 19:33:11', '2018-02-27 19:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`id` int(10) unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `model_id`, `created_at`, `updated_at`) VALUES
(1, 'kp40aB3PN8b1nW8AKnAyqh9NHO0sDxFUcgXXHDra', 1, '2018-02-27 13:52:27', '2018-02-27 13:52:27'),
(2, 'm2bdMQdXiTjWeqCY4b4FkNLgLfpqPo1jsV00xISr', 2, '2018-02-27 13:52:45', '2018-02-27 13:52:45'),
(3, 'm4oLzWN68VzoVHgoipcbsrI5v4i01PVC4SvAO8E2', 1, '2018-02-27 14:13:20', '2018-02-27 14:13:20'),
(4, 'cqqXaMyq0pGTEjfz8rvxPG4R2WwfSYo8VBfdznOD', 3, '2018-02-27 14:16:48', '2018-02-27 14:16:48'),
(5, 'CwpUVsJqHRNt1YtF5GXYtZeYa3lnFK77cpR4HX3z', 4, '2018-02-27 19:31:06', '2018-02-27 19:31:06'),
(6, 'Qe2mtAfBpsyDKrXOuHo9V2Ib1S3ic7X2EZAGSZFq', 4, '2018-02-27 19:31:26', '2018-02-27 19:31:26'),
(7, 'U4VXtKZ4AfYcp3NhJkaQeKyhMoEg713Uir0bDCrM', 5, '2018-02-27 19:32:16', '2018-02-27 19:32:16'),
(8, '8Pq7lArmBrJyVTuo89CclwiLY3MCsbunjJ4mXPYm', 6, '2018-02-27 19:33:11', '2018-02-27 19:33:11'),
(9, 'WB8aNOyPSxLHLlLuDYsxCZOf73nG1NYvoTQ3y3ie', 6, '2018-02-27 19:33:20', '2018-02-27 19:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `title`, `photo`, `phone_number`, `address`, `description`) VALUES
(1, 'John', 'john@mebel.com', '$2y$10$FYiyTGUhp6pMCiiabadpjuFHRD0wC7u9C58Gisz5bonsrugfDeUQW', 'qYPLKi1Nx59xmAMaywyAgzxNOuTOOHOKxKdNrrkh6esAognIwvtkoZ8Je7SD', '2018-02-27 13:51:55', '2018-02-27 19:26:51', 'John', 'NR7VmmatXOMZ6HXt4kSMPSdorXcmzHKDnQwwxiv7', '', '', '   This is descriptions'),
(2, 'paul', 'paul@gmail.com', '$2y$10$XSbUWHiyQFTRsfYX2V0R6.B2S8.7hBV/griRcvVbClfBGxRYyqWzK', 't3961ftZ09DHR1h3mHD38MJAy9aSx8WPUAKEnNJqOv41yy9IOcaVTbdo3XrQ', '2018-02-27 16:56:51', '2018-02-27 19:26:19', 'Paul Zheng', 'kq0N1DmOKWQKjFH4TfZMmMW3P9bsQi1Ff4UfIVBt', '111-20102-222', '', ' ASdfasdf\r\nasdfasdfjlasdjfas\r\ndfaklsdfjaisdfjasldf '),
(3, 'Harry', 'harry@gmail.com', '$2y$10$GMAgupLMwKRgVf3iiZzMTuKfisCYsVP88iZLa1Cf.a6ekQDL8ww/.', 'KksVdynoIVMRIftQyfUFI4BHze1Rbs1006qgHiTgPIhtrD4R38OkvA1ze1xz', '2018-02-27 19:27:06', '2018-02-27 19:28:09', '', 'Y3yVkr6vCpegnDViyZYRgBqz5wqUS8sq5Io9KZfa', '', '', ' '),
(4, 'Rota', 'rota@gmail.com', '$2y$10$Eynn4W7yuZFlS6SGTIXIROH8yzfR8sjxMujfaAcbVWB1Qv1z0.cwC', 'YRNJB7GSZWBchz8sGOf08O98G9vJMODoO53YwqZDHWKxLDQ0GT1zKkmoazsW', '2018-02-27 19:29:01', '2018-02-27 19:32:25', 'Rota', 'kwjbEjSqOts8nlPF3qbteiWwv1AWgXYJhLASliMq', '11111111', '', ' Rota is good'),
(5, 'Eva', 'eva@gmail.com', '$2y$10$nqpJEVz2zOslwFPB7lFWy./k4ETOrdZvWNQKtGNsfQW1pyj6F1p4S', 'wTRRKjmf3aXkJlfHxJVFJdtZ4flIwaHQWqt8GbLJfegbfnDcL1kaS4VhlNq6', '2018-02-27 19:29:41', '2018-02-27 19:31:34', 'Eva', 'lyJwuFNAsZMy08Cm2SBaTeh3FcJ68o2AYh7nLOLD', '', '', '  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `models`
--
ALTER TABLE `models`
 ADD PRIMARY KEY (`id`), ADD KEY `models_created_by_foreign` (`created_by`);

--
-- Indexes for table `m_connections`
--
ALTER TABLE `m_connections`
 ADD PRIMARY KEY (`id`), ADD KEY `m_connections_model_id_foreign` (`model_id`), ADD KEY `m_connections_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`id`), ADD KEY `photos_model_id_foreign` (`model_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_connections`
--
ALTER TABLE `m_connections`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `models`
--
ALTER TABLE `models`
ADD CONSTRAINT `models_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `m_connections`
--
ALTER TABLE `m_connections`
ADD CONSTRAINT `m_connections_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
ADD CONSTRAINT `m_connections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
ADD CONSTRAINT `photos_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
