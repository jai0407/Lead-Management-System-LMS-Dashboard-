-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2021 at 05:15 AM
-- Server version: 5.6.41-84.1
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
-- Database: `ampleebu_LMS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `role` enum('ADMIN','USER') COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `role`, `name`, `user_name`, `email`, `phone`, `password`, `address`, `is_active`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'ADMIN', 'Ample', 'admin', 'admin@gmail.com', '', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', '', 1, '2021-03-09 10:17:08', '0000-00-00 00:00:00', NULL),
(2, 'USER', 'jai', 'jai', 'jai@gmail.com', '', '0cce926dbbd63ccaf1a1ae8b811d1a2d05bd1205', '', 1, '2021-03-09 10:17:08', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lead_source` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_inquiry` date NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `official_email_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lead_status` tinyint(4) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `user_id`, `company`, `lead_source`, `date_of_inquiry`, `name`, `phone`, `email`, `address`, `city`, `website`, `description`, `official_email_id`, `lead_status`, `remark`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ample ebusiness', 'LinkedIn', '2021-03-27', 'yash dhakad', '9827098270', 'yash.amplewebservices@gmail.com', '301 NRK Biz Park, PU-4, Scheme no 54, AB road, Behind C21 Mall', 'INDORE', 'http://ampleebusiness.in/', 'test mode', 'YASH@GMAIL.COM', 5, '', '2021-03-13 00:00:00', '2021-03-30 09:57:37'),
(2, NULL, 'Blue we', 'Call', '2021-03-13', 'Pranav Sharma', '9827598275', 'pranavsharma2801@gmail.com', 'NRK', 'INDORE', 'www.agroworld.com', 'test test', 'test@gmail.com', 6, '', '2021-03-13 00:00:00', '2021-03-27 08:27:54'),
(3, NULL, 'Tech spark', 'Facebook', '2021-03-13', 'Prem Kumar', '9827654651', 'prem@gmail.com', 'AB road', 'Bhopal', 'www.kh.com', 'this is test msg', 'prem@hotmail.com', 2, '', '2021-03-13 00:00:00', '2021-03-29 18:55:24'),
(4, NULL, 'GYRIX', 'Website', '2021-03-17', 'Jai Jaiswal', '06266941608', 'jaijaiswal.587@gmail.com', 'S19 Rajat nagar complex', 'Bhopal', 'www.gyrix.co', 'welcome to my dashboard', 'jaijaiswal.587@gmail.com', 2, '', '2021-03-17 00:00:00', '2021-03-22 05:38:52'),
(5, NULL, 'Procced Technologies', 'Website', '2021-03-17', 'Sameer Laghate', '9922131929', 'Sameer.Laghate@gmail.com', 'Pune', 'Pune', 'https://proceedtechnologies.com/index.html', 'will contact by thurs after 3 pm', 'Sameer.Laghate@gmail.com', 2, '', '2021-03-17 00:00:00', '2021-03-22 05:38:56'),
(6, NULL, 'Acro Solution', 'Website', '2021-03-17', 'Ravi shastri', '9827597541', 'ravi.sharti@gmail.com', 'Novelty road', 'Indore', 'www.kh.com', 'test test test', 'ravi.ample@gmail.com', 3, '', '2021-03-17 00:00:00', '2021-03-25 13:38:45'),
(7, NULL, 'Infinity Solution', 'Facebook', '2021-03-17', 'Ravi shastri', '9827597541', 'ravi.sharti@gmail.com', 'Novelty road', 'Indore', 'www.kh.com', 'test test test test test test test test test test test test test test test', 'ravi.ample@gmail.com', 1, '', '2021-03-17 00:00:00', '2021-03-30 10:20:31'),
(8, NULL, 'DesignLab', 'Website', '0000-00-00', 'Megha Tiwari', '8269098123', 'megha.tiwari1234@gmail.com', 'Bavdhan', 'Pune', 'https://www.design-lab.co.in/index.html', '', 'sales@design-lab.co.in', 1, '', '2021-03-22 05:19:39', '0000-00-00 00:00:00'),
(9, NULL, 'Amit Bhalekar', 'Website', '2021-03-22', 'Amit Bhalekar', '8412015160', 'amitbhalekar198616@gmail.com', 'C-6, Suvarna Park, Bavdhan', 'Pune', 'amitbhalekar198616@gmail.com', 'Na', 'amitbhalekar198616@gmail.com', 3, '', '2021-03-22 00:00:00', '2021-03-30 14:41:23'),
(62, 1, 'AMPLE  eBusiness', 'LinkedIn', '2021-03-25', 'Jai Jaiswal', '06266941608', 'jaijaiswal.587@gmail.com', 'S19 Rajat nagar complex', 'Bhopal', 'www.ample.com', 'Testing', 'jaijaiswal.587@gmail.com', 2, '', '2021-03-25 00:00:00', '2021-03-30 06:10:36'),
(64, 1, 'BizPark', 'Call', '2021-03-30', 'Rupesh', '985623879899', 'rupesh@gmail.com', 'Bavdhan', 'Pune', 'bizpark.com', '', '', 1, '', '2021-03-30 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lead_remarks`
--

CREATE TABLE `lead_remarks` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `follow_up` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `follow_up_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lead_remarks`
--

INSERT INTO `lead_remarks` (`id`, `lead_id`, `follow_up`, `follow_up_date`, `follow_up_time`, `remark`, `created_at`) VALUES
(1, 7, 'Call', '2021-03-27', '21:25', 'test', '2021-03-19 13:52:52'),
(2, 7, 'Message', '0000-00-00', '21:46', 'welcome here..', '2021-03-20 08:19:08'),
(3, 1, 'Call', '2021-03-24', '01:12', 'test', '2021-03-23 13:55:37'),
(5, 8, 'Message', '2021-03-24', '12:04', 'Cookies on our website to give you the most relevant experience by remembering your preferences and repeat visits. By clicking “Accept”, you consent to the use of ALL the cookies.', '2021-03-24 05:33:42'),
(6, 9, 'Message', '2021-03-25', '11:05', 'The most relevant experience by remembering your preferences and repeat visits. By clicking “Accept”, you consent to the use of ALL the cookies.', '2021-03-24 05:36:07'),
(8, 6, 'Call,Email', '2021-02-28', '17:55', 'call test', '2021-03-25 13:38:45'),
(10, 3, 'Call,Email', '2021-03-30', '05:22', 'Remark Test', '2021-03-29 18:52:52'),
(11, 3, 'Email,Message', '2021-03-31', '05:06', 'test remark2', '2021-03-29 18:53:32'),
(12, 3, 'Email,Message', '2021-03-30', '06:09', 'Test remark3', '2021-03-29 18:55:24'),
(13, 7, 'Call', '2021-03-31', '02:15', 'test', '2021-03-30 05:42:52'),
(14, 62, 'Call', '2021-03-31', '14:18', 'ssssssssssss', '2021-03-30 05:45:29'),
(15, 62, 'Call', '2021-03-16', '01:23', 'no', '2021-03-30 05:51:38'),
(16, 62, 'Call', '2021-03-10', '01:42', 'dsadas', '2021-03-30 06:10:16'),
(17, 62, 'Email', '2021-04-06', '02:43', 'ss', '2021-03-30 06:10:36'),
(18, 1, 'Call,Email,Message', '2021-03-30', '09:49', 'jkh6521', '2021-03-30 09:57:23'),
(19, 1, '', '2021-03-30', '09:57', 'sssssss', '2021-03-30 09:57:37'),
(20, 7, '', '2021-03-30', '10:19', 'cbfbhfd', '2021-03-30 10:20:03'),
(21, 7, 'Call,Email,Message', '2021-03-30', '10:20', 'new query test', '2021-03-30 10:20:31'),
(22, 9, 'Call', '2021-03-30', '14:40', 'Need time to think over it', '2021-03-30 14:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `lead_source`
--

CREATE TABLE `lead_source` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_status`
--

CREATE TABLE `lead_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lead_status`
--

INSERT INTO `lead_status` (`id`, `name`, `is_active`, `created_at`) VALUES
(1, 'New Opportunity', 1, '2021-03-13 00:00:00'),
(2, 'Converted', 1, '2021-03-13 00:00:00'),
(3, 'Need more Time to think', 1, '2021-03-13 00:00:00'),
(4, 'Payment Done', 1, '2021-03-13 00:00:00'),
(5, 'Not interested', 1, '2021-03-15 00:00:00'),
(6, 'No Response', 1, '2021-03-25 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_remarks`
--
ALTER TABLE `lead_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_source`
--
ALTER TABLE `lead_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_status`
--
ALTER TABLE `lead_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `lead_remarks`
--
ALTER TABLE `lead_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lead_source`
--
ALTER TABLE `lead_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_status`
--
ALTER TABLE `lead_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
