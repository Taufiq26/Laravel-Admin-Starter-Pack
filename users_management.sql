-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 14, 2022 at 04:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_token`
--

CREATE TABLE `access_token` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_token`
--

INSERT INTO `access_token` (`id`, `user_id`, `token`, `created_at`, `updated_at`, `expired_at`) VALUES
('622694f1-6202-4573-82df-2aee335e5395', '272b9945-3b5e-4492-a078-4d99e00da6a9', '176a47a5dc6dd1f81615a3e3a9c83d25', NULL, NULL, '2022-08-15 07:41:47'),
('66e29a69-3171-4956-87de-c856eb1f368c', '272b9945-3b5e-4492-a078-4d99e00da6a9', '7909b4a60f013fe2f1cfe105a8ab75ec', NULL, NULL, '2022-08-15 05:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` varchar(155) NOT NULL,
  `prefix` varchar(155) DEFAULT '0',
  `parent_id` varchar(155) DEFAULT '0',
  `name` varchar(155) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `prefix`, `parent_id`, `name`, `icon`, `url`, `status`, `order_num`, `created_at`, `updated_at`, `deleted_at`) VALUES
('2926845d-d792-4ebd-9ce6-090de62328c1', '-', 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc', 'Users', '-', 'users', 1, 3, '2022-08-13 15:17:12', '2022-08-13 15:17:12', NULL),
('2df2c2c1-8348-4c5f-ab48-452701566bc7', '-', 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc', 'Menus', '-', 'menus', 1, 2, '2022-08-13 11:09:52', '2022-08-13 11:09:52', NULL),
('35ea5852-b821-43e2-acea-78aa2381760c', '-', 'da80dfc4-d80b-4673-83ea-2021fa380bef', 'Default', '-', 'index', 1, 2, '2022-08-14 01:17:35', '2022-08-14 01:17:35', NULL),
('68cfe24e-2b70-4c0a-8cd3-50aa53856bc9', '-', 'da80dfc4-d80b-4673-83ea-2021fa380bef', 'Main', '-', 'index', 1, 1, '2022-08-13 08:53:21', '2022-08-13 08:53:21', NULL),
('898a77c5-e21f-46f7-9092-3eb71aef1f7e', '-', '0', 'General', '-', '#', 1, 1, '2022-08-13 08:37:21', '2022-08-14 01:06:56', NULL),
('9f8b78b9-5856-4653-8970-ea125971f4cb', '-', '0', 'Setup', '-', '#', 1, 1, '2022-08-13 10:43:25', '2022-08-13 10:43:25', NULL),
('b6cd076b-691e-4fb9-b4b7-ac7d12234846', '-', 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc', 'Roles', '-', 'roles', 1, 1, '2022-08-13 11:09:43', '2022-08-13 11:09:43', NULL),
('da80dfc4-d80b-4673-83ea-2021fa380bef', '/dashboard', '898a77c5-e21f-46f7-9092-3eb71aef1f7e', 'Dashboard', 'home', '#', 1, 1, '2022-08-13 08:46:29', '2022-08-13 08:46:29', NULL),
('e4e9e6b4-f421-42db-bafe-10c3a7ff45fc', '/users-management', '9f8b78b9-5856-4653-8970-ea125971f4cb', 'Users Management', 'settings', '#', 1, 1, '2022-08-13 10:44:48', '2022-08-13 10:44:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id` varchar(155) NOT NULL,
  `role_id` varchar(155) NOT NULL,
  `menu_id` varchar(155) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `create` int(11) NOT NULL DEFAULT 0,
  `update` int(11) NOT NULL DEFAULT 0,
  `delete` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id`, `role_id`, `menu_id`, `view`, `create`, `update`, `delete`, `created_at`, `updated_at`) VALUES
('14e02c3d-6316-40e9-b08e-0f0b412940cb', '62dffe94-5b08-45fe-9121-eb8177fa5721', '2df2c2c1-8348-4c5f-ab48-452701566bc7', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-13 15:15:00'),
('31cc8595-69e1-4e58-977b-2a2b98fe0ac7', '62dffe94-5b08-45fe-9121-eb8177fa5721', 'e4e9e6b4-f421-42db-bafe-10c3a7ff45fc', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-13 15:04:49'),
('52c0e701-8682-47c4-8a10-5ea8970c141e', '62dffe94-5b08-45fe-9121-eb8177fa5721', '2926845d-d792-4ebd-9ce6-090de62328c1', 1, 1, 1, 1, '2022-08-13 15:49:36', '2022-08-14 00:33:06'),
('6f83ae97-1d51-4e49-b0f6-677a5b0cd4d7', '62dffe94-5b08-45fe-9121-eb8177fa5721', '898a77c5-e21f-46f7-9092-3eb71aef1f7e', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-13 15:09:48'),
('78a2b7dc-ea40-49ac-8cca-54146502267b', '62dffe94-5b08-45fe-9121-eb8177fa5721', '9f8b78b9-5856-4653-8970-ea125971f4cb', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-13 15:04:49'),
('a5217ad9-9bdd-4d3b-a799-d959c4e55606', '62dffe94-5b08-45fe-9121-eb8177fa5721', '68cfe24e-2b70-4c0a-8cd3-50aa53856bc9', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-13 15:04:24'),
('a5309fb7-56a8-4c39-8362-a58a39382312', '62dffe94-5b08-45fe-9121-eb8177fa5721', 'da80dfc4-d80b-4673-83ea-2021fa380bef', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-13 14:56:52'),
('bdf61684-c2fc-47d5-9a88-6e9076b537a2', '62dffe94-5b08-45fe-9121-eb8177fa5721', 'b6cd076b-691e-4fb9-b4b7-ac7d12234846', 1, 1, 1, 1, '2022-08-13 14:50:40', '2022-08-14 02:34:25'),
('d1e94377-f63d-4090-82ca-bca83e661990', '62dffe94-5b08-45fe-9121-eb8177fa5721', '35ea5852-b821-43e2-acea-78aa2381760c', 1, 0, 0, 0, '2022-08-14 01:17:52', '2022-08-14 01:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` varchar(155) NOT NULL,
  `user_id` varchar(155) NOT NULL,
  `full_name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `is_verified` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `full_name`, `email`, `address`, `phone`, `is_verified`, `created_at`, `updated_at`, `deleted_at`) VALUES
('70f007fc-51f9-494f-aacf-d5a311c62c04', '272b9945-3b5e-4492-a078-4d99e00da6a9', 'Agus Setiawan', 'agussetiawan0448@gmail.com', 'Cimahi Selatan', '0881023436927', 1, '2022-08-14 02:12:33', '2022-08-14 07:27:48', NULL),
('dc57cf78-d3f3-43e3-9e8c-1e1d5bbf99c8', '093e6a45-e81b-4c9b-977a-002c26d4ebcf', 'users', 'users@gmail.com', 'Cimahi Selatan', '0', 1, '2022-08-14 06:36:06', '2022-08-14 07:42:12', '2022-08-14 07:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` varchar(155) NOT NULL,
  `name` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
('62dffe94-5b08-45fe-9121-eb8177fa5721', 'Admin', 'All Access Menu', '2022-08-11 09:50:46', '2022-08-11 16:59:52', NULL),
('67b885dd-382b-43c8-bbdc-9eb9fc14b574', 'User', 'Show All Menu', '2022-08-13 03:15:50', '2022-08-13 23:01:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(155) NOT NULL,
  `role_id` varchar(155) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `created_at`, `updated_at`) VALUES
('093e6a45-e81b-4c9b-977a-002c26d4ebcf', '67b885dd-382b-43c8-bbdc-9eb9fc14b574', 'user', '$2y$10$a1BU37.ttNaCxNdMblAd7OsrCxzsXAvpbGWj9czAVdsyg30zmdMfq', '2022-08-14 06:36:06', '2022-08-14 06:36:06'),
('272b9945-3b5e-4492-a078-4d99e00da6a9', '62dffe94-5b08-45fe-9121-eb8177fa5721', 'admin', '$2y$10$lgC2AdHRnHg7xpOPhHHW6OyB2YH5JcwlAX16Gaa.eznHYwXi2zdHy', '2022-08-14 02:12:33', '2022-08-14 02:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `verification_mail`
--

CREATE TABLE `verification_mail` (
  `id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_mail`
--

INSERT INTO `verification_mail` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
('3e30e766-cf6e-47e7-a755-58dadcdd8358', '272b9945-3b5e-4492-a078-4d99e00da6a9', '312d514d0614c28d7995d4937c37df74', '2022-08-14 07:22:11', '2022-08-14 07:22:11'),
('739465ee-4454-4954-a606-46873b3c4c12', '272b9945-3b5e-4492-a078-4d99e00da6a9', '003d2ce32326dd576117dc5dd8e03aae', '2022-08-14 07:24:03', '2022-08-14 07:24:03'),
('e4fa504d-a0ad-4488-8c63-394a7052a900', '272b9945-3b5e-4492-a078-4d99e00da6a9', '2c8ef4d68a76d716e430e11a88c64c19', '2022-08-14 07:20:54', '2022-08-14 07:20:54'),
('ef478361-fef9-40f1-b3ee-d7ece6fee95b', '272b9945-3b5e-4492-a078-4d99e00da6a9', '0804e53e4fd13ead1f9c73d1459a90ed', '2022-08-14 07:20:23', '2022-08-14 07:20:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_token`
--
ALTER TABLE `access_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_mail`
--
ALTER TABLE `verification_mail`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
