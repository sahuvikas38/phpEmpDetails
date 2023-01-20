-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 07:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `educational_details`
--

CREATE TABLE `educational_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `university_board` varchar(255) NOT NULL,
  `year_start` year(4) NOT NULL,
  `year_end` year(4) NOT NULL,
  `percentage` float NOT NULL,
  `marksheet_photo` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educational_details`
--

INSERT INTO `educational_details` (`id`, `user_id`, `qualification`, `course`, `institute`, `university_board`, `year_start`, `year_end`, `percentage`, `marksheet_photo`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(54, 37, '10', 'hindi', 'mgm', 'cbse', 2016, 2018, 78, 'MARKS_IMG_20221109_115009.jpeg', 37, 0, '2022-11-09 16:20:09', '2022-11-09 16:20:09'),
(55, 37, '12', 'pcm', 'Sri chaitanya ', 'telangana Board', 2017, 2018, 68, 'MARKS_IMG_20221109_115258.jpeg', 37, 0, '2022-11-09 16:22:58', '2022-11-09 16:22:58'),
(56, 36, '10', 'btech', 'college', 'cbse', 2020, 2022, 78, 'MARKS_IMG_20221109_120121.png', 36, 36, '2022-11-09 16:31:21', '2022-11-09 16:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emails` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `father_contact_number` varchar(20) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `premanent_address` varchar(255) DEFAULT NULL,
  `permanent_city` varchar(255) DEFAULT NULL,
  `permanent_pincode` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `alternative_phone` int(11) DEFAULT NULL,
  `primary_skill` varchar(255) DEFAULT NULL,
  `training_period` varchar(255) NOT NULL,
  `date_of_joining` date DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `pan_card_image` varchar(255) DEFAULT NULL,
  `aadhaar` varchar(255) DEFAULT NULL,
  `aadhaar_card_image` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `isEnabled` int(11) NOT NULL DEFAULT 1,
  `rating` float(12,1) NOT NULL DEFAULT 1.0,
  `remark` varchar(255) NOT NULL,
  `is_freezed` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `emails`, `password`, `phone`, `user_role`, `father_name`, `mother_name`, `father_contact_number`, `present_address`, `city`, `pin_code`, `premanent_address`, `permanent_city`, `permanent_pincode`, `dob`, `alternative_phone`, `primary_skill`, `training_period`, `date_of_joining`, `interview_date`, `pan`, `pan_card_image`, `aadhaar`, `aadhaar_card_image`, `profile_pic`, `bank_name`, `account_number`, `ifsc_code`, `isDeleted`, `isEnabled`, `rating`, `remark`, `is_freezed`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(35, 'Gopi', 'gopi@gmail.com', '123456', '', '2', '', '', '', '', '', 0, '', '', 0, '0000-00-00', 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', 0, 1, 5.0, 'Good progrees Keep it up!', 0, '2022-11-09 16:08:54', '', '2022-11-15 13:13:16', 36, '2022-11-09 11:38:21', ''),
(36, 'Joy', 'joy@gmail.com', '123456', '6266549918', '1', 'BAAPU', 'mother', '', '', '', 0, '', '', 0, '0000-00-00', 0, '', '', '0000-00-00', '0000-00-00', 'FUVPM9385L', 'PAN_IMG_20221109_120224.jpeg', '489638967754', 'AAD_IMG_20221109_120224.jpeg', 'PRO_IMG_20221109_120224.jpeg', 'INDUSIND BANK', '3789589476', 'INDB0000591', 0, 1, 5.0, '', 0, '2022-11-09 16:09:26', '', '2022-11-15 12:31:58', 36, '2022-11-09 11:38:58', ''),
(37, 'Karan', 'karan@gmail.com', '123456', '', '2', '', '', '', '', '', 0, '', '', 0, '0000-00-00', 0, '', '', '0000-00-00', '0000-00-00', 'FCOPD6978R', 'PAN_IMG_20221109_115451.png', '423456789011', 'AAD_IMG_20221109_115451.jpg', '', 'pnb', '775567576766', '6776775yhty7', 0, 1, 5.0, 'Good work', 1, '2022-11-09 16:11:33', '', '2022-11-15 14:58:13', 36, '2022-11-09 11:41:06', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educational_details`
--
ALTER TABLE `educational_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educational_details`
--
ALTER TABLE `educational_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
