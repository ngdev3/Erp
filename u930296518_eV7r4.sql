-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2023 at 04:47 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u930296518_eV7r4`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_name` text NOT NULL,
  `print_name` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `aadhar_card` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `state_code` int(11) NOT NULL,
  `mobile_number` int(30) NOT NULL,
  `contact_person_name` text NOT NULL,
  `contact_person_mobile` int(30) NOT NULL,
  `email` longtext NOT NULL,
  `bank_account_no` longtext NOT NULL,
  `bank_id` int(11) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `credit_limit` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_group`
--

CREATE TABLE `account_group` (
  `id` int(11) NOT NULL,
  `account_group_name` longtext NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `under_group_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` text NOT NULL,
  `added_date` text NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `status`, `user_id`, `updated_date`, `added_date`, `state_id`) VALUES
(1, 'Hardoi', 'Active', 1, '2022-08-26 12:08:23', '2022-08-26 11:31:44', 3),
(2, 'abc', 'Active', 1, '2022-08-26 12:08:34', '2022-08-26 11:48:54', 10),
(3, 'adsasd', 'Active', 1, '', '2022-08-26 11:49:21', 26),
(4, 'sdsdf', 'Active', 1, '', '2023-09-07 14:42:30', 1),
(5, 'xcvxcvxcv', 'Active', 1, '', '2023-09-07 16:22:55', 2),
(6, 'xcvxcvxcvsdsdsdf', 'Active', 1, '', '2023-09-07 16:23:50', 2),
(7, 'sdfsdfsdf', 'Active', 1, '', '2023-09-07 16:25:37', 4),
(8, 'sdfsdfs', 'Active', 1, '', '2023-09-07 16:25:48', 2),
(9, 'sdswerwer', 'Active', 1, '', '2023-09-07 16:29:45', 2),
(10, 'sdfwwerwer', 'Active', 1, '', '2023-09-07 16:30:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gstslab`
--

CREATE TABLE `gstslab` (
  `id` int(11) NOT NULL,
  `tax_slab_name` text NOT NULL,
  `system` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `igst` float NOT NULL,
  `sgst` float NOT NULL,
  `cgst` float NOT NULL,
  `cess` float NOT NULL,
  `tax_slab_on` int(11) NOT NULL,
  `special_cess` int(11) NOT NULL,
  `tax_slab_as_per` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `calculated_tax_on_mrp` tinyint(1) NOT NULL,
  `calculated_tax_on_free_goods` tinyint(1) NOT NULL,
  `zero_tax_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_name` longtext NOT NULL,
  `hsn_code` text NOT NULL,
  `gst_slab_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `bharti` float NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `name`, `is_seen`, `user_id`, `action`, `updated_date`, `last_login`, `added_date`, `status`, `device_type`, `remark`) VALUES
(1, ' <b>sdfsdfsdf12</b> State Updated by Rajat Gupta', 0, 1, 'master/state/view/2542719905', '0000-00-00', '0000-00-00 00:00:00', '2023-09-09 11:52:35', 'Active', '', ' sdfsdfsdf12 State Updated by Rajat Gupta'),
(2, ' <b></b>   by ', 0, 1, 'admin/user/view/8820227673', '0000-00-00', '0000-00-00 00:00:00', '2023-09-09 12:09:27', 'Active', '', '    by ');

-- --------------------------------------------------------

--
-- Table structure for table `party_type`
--

CREATE TABLE `party_type` (
  `id` int(11) NOT NULL,
  `party_name` varchar(255) NOT NULL,
  `print_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` text NOT NULL,
  `added_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `status`, `user_id`, `updated_date`, `added_date`) VALUES
(1, 'Andhra Pradesh', 101, 'Active', 1, '', '2022-08-22 09:21:18'),
(2, 'Arunachal Pradesh', 101, 'Active', 1, '', '2022-08-22 09:21:43'),
(3, 'Assam', 101, 'Active', 1, '', '2022-08-22 09:22:01'),
(4, 'Bihar', 101, 'Active', 1, '', '2022-08-22 09:22:12'),
(5, 'Chhatisgarh', 101, 'Active', 1, '', '2022-08-22 09:22:24'),
(6, 'Goa', 101, 'Active', 1, '', '2022-08-22 09:22:32'),
(7, 'Gujarat', 101, 'Active', 1, '', '2022-08-22 09:22:43'),
(8, 'Himachal Pradesh', 101, 'Active', 1, '', '2022-08-22 09:23:09'),
(9, 'Jammu & Kashmir', 101, 'Active', 1, '', '2022-08-22 09:23:17'),
(10, 'Jharkhand', 101, 'Active', 1, '', '2022-08-22 09:23:23'),
(11, 'Karnataka', 101, 'Active', 1, '', '2022-08-22 09:23:29'),
(12, 'Kerala', 101, 'Active', 1, '', '2022-08-22 09:23:35'),
(13, 'Madhya Pradesh', 101, 'Active', 1, '', '2022-08-22 09:23:44'),
(14, 'Maharashtra', 101, 'Active', 1, '', '2022-08-22 09:23:50'),
(15, 'Manipur', 101, 'Active', 1, '', '2022-08-22 09:23:57'),
(16, 'Meghalaya', 101, 'Active', 1, '', '2022-08-22 09:24:03'),
(17, 'Mizoram', 101, 'Active', 1, '', '2022-08-22 09:24:08'),
(18, 'Nagaland', 101, 'Active', 1, '', '2022-08-22 09:24:14'),
(19, 'Orissa', 101, 'Active', 1, '', '2022-08-22 09:24:20'),
(20, 'Punjab', 101, 'Active', 1, '', '2022-08-22 09:24:25'),
(21, 'Rajasthan', 101, 'Active', 1, '', '2022-08-22 09:24:34'),
(22, 'Sikkim', 101, 'Active', 1, '', '2022-08-22 09:24:39'),
(23, 'Tamil Nadu', 101, 'Active', 1, '', '2022-08-22 09:24:46'),
(24, 'Telangana', 101, 'Active', 1, '', '2022-08-22 09:24:52'),
(25, 'Tripura', 101, 'Active', 1, '', '2022-08-22 09:24:57'),
(26, 'Uttar Pradesh', 101, 'Active', 1, '', '2022-08-22 09:25:06'),
(27, 'Uttarakhand', 101, 'Active', 1, '', '2022-08-22 09:25:17'),
(28, 'West Bengal', 101, 'Active', 1, '', '2022-08-22 09:25:28'),
(43, 'qwerty', 101, 'Active', 1, '', '2022-08-25 10:42:42'),
(44, 'asdfg', 101, 'Active', 1, '', '2022-08-25 10:42:49'),
(45, 'zxcvb', 101, 'Active', 1, '', '2022-08-25 10:42:54'),
(46, 'yjyuj', 101, 'Active', 1, '', '2023-06-28 12:40:46'),
(47, 'sdfsdf', 101, 'Active', 1, '', '2023-09-07 16:03:29'),
(48, 'sdf', 101, 'Active', 1, '', '2023-09-07 16:03:35'),
(49, 'sdfsdfsdfsdf', 101, 'Active', 1, '', '2023-09-07 16:22:24'),
(50, 'xcvxcxcv', 101, 'Active', 1, '', '2023-09-07 16:34:27'),
(51, 'sdfsdfsdf3', 101, 'Active', 1, '2023-09-07 16:45:44', '2023-09-07 16:35:37'),
(52, 'sdfsdfsdf12', 101, 'Active', 1, '2023-09-09 11:52:35', '2023-09-07 16:46:00'),
(53, 'sdsfd325', 101, 'Active', 1, '2023-09-07 17:02:46', '2023-09-07 16:46:12'),
(54, 'qwerty1q', 101, 'Active', 1, '2023-09-07 16:59:57', '2023-09-07 16:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `tax_slab_as_per`
--

CREATE TABLE `tax_slab_as_per` (
  `id` int(11) NOT NULL,
  `tax_slab_asper_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_slab_category`
--

CREATE TABLE `tax_slab_category` (
  `id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_slab_on`
--

CREATE TABLE `tax_slab_on` (
  `id` int(11) NOT NULL,
  `tax_slab_on_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_slab_tax_type`
--

CREATE TABLE `tax_slab_tax_type` (
  `id` int(11) NOT NULL,
  `tax_slab_taxtype_name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `device_type` text NOT NULL,
  `remark` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `account_exipry` date NOT NULL,
  `pan_number` text NOT NULL,
  `aadhar_number` text NOT NULL,
  `designation` text NOT NULL,
  `address` text NOT NULL,
  `token` text NOT NULL,
  `token_valid` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `device_type` text NOT NULL,
  `user_type` enum('1','2','3','4','5') NOT NULL COMMENT '1=super admin,\r\n2=admin,\r\n3=accounts,\r\n4=support,\r\n5=Manager,'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `account_exipry`, `pan_number`, `aadhar_number`, `designation`, `address`, `token`, `token_valid`, `group_id`, `status`, `added_date`, `updated_date`, `last_login`, `device_type`, `user_type`) VALUES
(1, 'Rajat', 'Gupta', 'rajat@yopmail.com', '8887905070', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', '', '', '', '', '', 0, '', '2022-12-02 15:39:02', '0000-00-00 00:00:00', '2023-09-09 12:37:29', '', '1'),
(2, 'rajat', 'gupta', 'asdf@yopmail.com', '8887905070', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '54654654', '654654654', '6546465', 'sfsdfsd', '', '', 0, 'Active', '2022-12-02 15:41:03', '2022-12-02 21:11:34', '0000-00-00 00:00:00', '', '2'),
(3, 'adasdasd', 'asdasdasdasd', 'asdasd@yopmail.com', '85060605464', '5a2ef449ce88ff4c8f67d6a31ad171ec', '0000-00-00', 'sldksdgkjsdh', '797979797987', 'kjfksndfjsndf', 'sdfsdfsdf', '', '', 0, 'Active', '2023-09-09 06:39:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_group`
--
ALTER TABLE `account_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_type`
--
ALTER TABLE `party_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_slab_as_per`
--
ALTER TABLE `tax_slab_as_per`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_slab_category`
--
ALTER TABLE `tax_slab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_slab_on`
--
ALTER TABLE `tax_slab_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_slab_tax_type`
--
ALTER TABLE `tax_slab_tax_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_group`
--
ALTER TABLE `account_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `party_type`
--
ALTER TABLE `party_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tax_slab_as_per`
--
ALTER TABLE `tax_slab_as_per`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_slab_category`
--
ALTER TABLE `tax_slab_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_slab_on`
--
ALTER TABLE `tax_slab_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
