-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2025 at 08:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turfarena`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(120) NOT NULL,
  `admin_status` int(2) NOT NULL DEFAULT 0,
  `admin_added_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_mobile` varchar(20) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_status` int(2) NOT NULL,
  `u_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `u_update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `u_verified` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_mobile`, `u_password`, `u_status`, `u_added_time`, `u_update_time`, `u_verified`) VALUES
(1, 'Rizwan Khan', '123', '123', 1, '2025-08-29 12:18:47', '2025-08-29 12:18:47', 1),
(2, 'Irfan', '1234', '1234', 1, '2025-09-01 08:53:57', '2025-09-01 08:53:57', 1),
(17, '1', '1', '1', 1, '2025-09-01 13:22:16', '2025-09-01 13:23:15', 1),
(18, '1', 'admin@punnaka.com', 'I@2C021104', 1, '2025-09-01 13:35:09', '2025-09-01 13:36:25', 1),
(19, '1', '12311', '1', 1, '2025-09-01 13:38:02', '2025-09-01 13:38:30', 1),
(20, '1', 'admin@punnaka.com11', 'I@2C021104', 1, '2025-09-01 13:42:22', '2025-09-01 13:42:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `ven_id` int(11) NOT NULL,
  `ven_name` varchar(255) NOT NULL,
  `ven_mobile` varchar(20) NOT NULL,
  `ven_password` varchar(255) NOT NULL,
  `ven_verified` int(2) NOT NULL,
  `ven_status` int(2) NOT NULL DEFAULT 0,
  `ven_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ven_updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`ven_id`, `ven_name`, `ven_mobile`, `ven_password`, `ven_verified`, `ven_status`, `ven_added_time`, `ven_updated_time`) VALUES
(1, 'RK Vendor', '123123', '123', 1, 1, '2025-08-29 12:58:06', '2025-08-29 12:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `vnu_id` int(11) NOT NULL,
  `vnu_status` int(11) NOT NULL DEFAULT 0,
  `vnu_vendor_id` int(11) NOT NULL,
  `vnu_name` varchar(255) NOT NULL,
  `vnu_mobile` varchar(120) NOT NULL,
  `vnu_email` varchar(120) NOT NULL,
  `vnu_whatsapp` varchar(120) NOT NULL,
  `vnu_address` text NOT NULL,
  `vnu_area` varchar(255) NOT NULL,
  `vnu_city` varchar(255) NOT NULL,
  `vnu_pincode` varchar(120) NOT NULL,
  `vnu_state` varchar(255) NOT NULL,
  `vnu_maplink` text NOT NULL,
  `vnu_image` varchar(255) NOT NULL,
  `vnu_contactname` varchar(120) NOT NULL,
  `vnu_aboutus` text NOT NULL,
  `vnu_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vnu_update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`vnu_id`, `vnu_status`, `vnu_vendor_id`, `vnu_name`, `vnu_mobile`, `vnu_email`, `vnu_whatsapp`, `vnu_address`, `vnu_area`, `vnu_city`, `vnu_pincode`, `vnu_state`, `vnu_maplink`, `vnu_image`, `vnu_contactname`, `vnu_aboutus`, `vnu_added_time`, `vnu_update_time`) VALUES
(1, 1, 1, 'RK Turf Arena Pune', '123123', 'rkturf@gmail.com', '', 'Deccan tower opp post office pulgate camp', 'Camp', 'Pune', '411001', 'MH', '', '1.png', 'RK Contact NAME', 'NSA', '2025-08-29 13:00:37', '2025-08-29 13:00:37'),
(2, 1, 1, 'RK Turf Arena - Mumbai', '123123', 'rkturf@gmail.com', '', 'Deccan tower opp post office pulgate camp', 'Camp', 'Mumbai', '411001', 'MH', '', '2.png', 'RK Contact NAME', 'NSA', '2025-08-29 13:00:37', '2025-08-29 13:00:37'),
(3, 1, 1, 'RK Turf Arena - Kolkata', '123123', 'rkturf@gmail.com', '', 'Deccan tower opp post office pulgate camp', 'Camp', 'Kolkata', '411001', 'MH', '', '3.png', 'RK Contact NAME', 'NSA', '2025-08-29 13:00:37', '2025-08-29 13:00:37'),
(4, 1, 1, 'RK Turf Arena - Delhi', '123123', 'rkturf@gmail.com', '', 'Deccan tower opp post office pulgate camp', 'Camp', 'Delhi', '411001', 'MH', '', '4.png', 'RK Contact NAME', 'NSA', '2025-08-29 13:00:37', '2025-08-29 13:00:37'),
(5, 1, 1, 'RK Turf Arena Pune1', '123123', 'rkturf@gmail.com', '', 'Deccan tower opp post office pulgate camp', 'Camp', 'Pune', '411001', 'MH', '', '5.png', 'RK Contact NAME', 'NSA', '2025-08-29 13:00:37', '2025-08-29 13:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `venues_amenities`
--

CREATE TABLE `venues_amenities` (
  `vnua_id` int(11) NOT NULL,
  `vnua_venue_id` int(11) NOT NULL,
  `vnua_name` varchar(255) NOT NULL,
  `vnua_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vnua_update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues_amenities`
--

INSERT INTO `venues_amenities` (`vnua_id`, `vnua_venue_id`, `vnua_name`, `vnua_added_time`, `vnua_update_time`) VALUES
(1, 1, 'Parking', '2025-08-29 13:02:52', '2025-08-29 13:02:52'),
(2, 1, 'Restrooms', '2025-08-29 13:02:52', '2025-08-29 13:02:52'),
(3, 1, 'Refreshments', '2025-08-29 13:03:12', '2025-08-29 13:03:12'),
(4, 1, 'Dughout setting', '2025-08-29 13:03:12', '2025-08-29 13:03:12'),
(5, 1, 'Changing space', '2025-08-29 13:03:23', '2025-08-29 13:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `venues_bookings`
--

CREATE TABLE `venues_bookings` (
  `vnub_id` int(11) NOT NULL,
  `vnub_venue_id` int(11) NOT NULL,
  `vnub_user_id` int(11) NOT NULL,
  `vnub_slot_id` int(11) NOT NULL,
  `vnub_slot_date` date NOT NULL,
  `vnub_status` int(11) NOT NULL,
  `vnub_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vnub_updated_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues_bookings`
--

INSERT INTO `venues_bookings` (`vnub_id`, `vnub_venue_id`, `vnub_user_id`, `vnub_slot_id`, `vnub_slot_date`, `vnub_status`, `vnub_added_time`, `vnub_updated_time`) VALUES
(1, 1, 1, 2, '2025-09-01', 1, '2025-09-01 08:21:22', '2025-09-01 08:21:22'),
(2, 1, 1, 3, '2025-09-01', 0, '2025-09-01 08:21:22', '2025-09-01 08:21:22'),
(3, 1, 1, 8, '2025-09-01', 0, '2025-09-01 08:21:22', '2025-09-01 08:21:22'),
(4, 1, 3, 3, '2025-09-01', 1, '2025-09-01 08:21:22', '2025-09-01 08:21:22'),
(5, 1, 2, 2, '2025-09-01', 0, '2025-09-01 08:55:52', '2025-09-01 08:55:52'),
(6, 1, 2, 4, '2025-09-02', 1, '2025-09-01 08:55:52', '2025-09-01 08:55:52'),
(7, 1, 2, 5, '2025-09-01', 0, '2025-09-01 08:55:52', '2025-09-01 08:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `venues_images`
--

CREATE TABLE `venues_images` (
  `vnui_id` int(11) NOT NULL,
  `vnui_venues_id` int(11) NOT NULL,
  `vnui_image` varchar(255) NOT NULL,
  `vnui_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vnui_update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues_images`
--

INSERT INTO `venues_images` (`vnui_id`, `vnui_venues_id`, `vnui_image`, `vnui_added_time`, `vnui_update_time`) VALUES
(1, 1, '11.jpeg', '2025-08-31 09:54:48', '2025-08-31 09:54:48'),
(2, 1, '12.jpeg', '2025-08-31 09:54:48', '2025-08-31 09:54:48'),
(3, 1, '13.jpeg', '2025-08-31 09:55:20', '2025-08-31 09:55:20'),
(4, 1, '14.jpeg', '2025-08-31 09:55:20', '2025-08-31 09:55:20'),
(5, 1, '15.jpeg', '2025-08-31 09:55:20', '2025-08-31 09:55:20'),
(6, 1, '16.jpeg', '2025-08-31 09:55:20', '2025-08-31 09:55:20'),
(7, 1, '17.jpeg', '2025-08-31 09:55:20', '2025-08-31 09:55:20'),
(8, 1, '18.jpeg', '2025-08-31 09:55:20', '2025-08-31 09:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `venues_slots`
--

CREATE TABLE `venues_slots` (
  `vnus_id` int(11) NOT NULL,
  `vnus_venue_id` int(11) NOT NULL,
  `vnus_start` varchar(255) DEFAULT NULL,
  `vnus_end` varchar(255) DEFAULT NULL,
  `vnus_note` text NOT NULL,
  `vnus_added_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vnus_update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vnus_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues_slots`
--

INSERT INTO `venues_slots` (`vnus_id`, `vnus_venue_id`, `vnus_start`, `vnus_end`, `vnus_note`, `vnus_added_time`, `vnus_update_time`, `vnus_status`) VALUES
(1, 1, '10:00 AM', '11:00 AM', 'NA', '2025-08-29 13:04:31', '2025-08-29 13:04:31', 0),
(2, 1, '11:00 AM', '12:00 PM', '', '2025-08-29 13:04:31', '2025-08-29 13:04:31', 0),
(3, 1, '12:00 AM', '13:00 AM', 'NA', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(4, 1, '13:00 AM', '14:00 AM', 'NA', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(5, 1, '14:00 AM', '15:00 AM', 'NA', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(6, 1, '15:00 AM', '16:00 AM', 'NA', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(7, 1, '16:00 AM', '17:00 AM', 'NA', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(8, 1, '17:00 AM', '18:00 PM', '', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(9, 1, '18:00 AM', '19:00 PM', '', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(10, 1, '19:00 AM', '20:00 PM', '', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0),
(11, 1, '20:00 AM', '21:00 PM', '', '2025-08-29 13:06:13', '2025-08-29 13:06:13', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ven_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`vnu_id`);

--
-- Indexes for table `venues_amenities`
--
ALTER TABLE `venues_amenities`
  ADD PRIMARY KEY (`vnua_id`);

--
-- Indexes for table `venues_bookings`
--
ALTER TABLE `venues_bookings`
  ADD PRIMARY KEY (`vnub_id`);

--
-- Indexes for table `venues_images`
--
ALTER TABLE `venues_images`
  ADD PRIMARY KEY (`vnui_id`);

--
-- Indexes for table `venues_slots`
--
ALTER TABLE `venues_slots`
  ADD PRIMARY KEY (`vnus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `ven_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `vnu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venues_amenities`
--
ALTER TABLE `venues_amenities`
  MODIFY `vnua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venues_bookings`
--
ALTER TABLE `venues_bookings`
  MODIFY `vnub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `venues_images`
--
ALTER TABLE `venues_images`
  MODIFY `vnui_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venues_slots`
--
ALTER TABLE `venues_slots`
  MODIFY `vnus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
