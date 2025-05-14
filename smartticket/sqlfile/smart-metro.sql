-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 14, 2025 at 11:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart-metro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Subhash R', 'subhusubhash24@gmail.com', 'Project22'),
(2, 'Sagar G U', 'sagargu30@gmail.com', 'Project22'),
(3, 'Nihal R Gowda', 'nihalgowda42@gmail.com', 'Project22'),
(4, 'Srihari K', 'sirihari6287@gmail.com', 'Project22');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(120) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `emp_password` varchar(100) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_phone` varchar(11) DEFAULT NULL,
  `emp_jobpost` varchar(100) DEFAULT NULL,
  `emp_station` int(11) NOT NULL,
  `emp_gender` varchar(100) DEFAULT NULL,
  `emp_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_email`, `emp_password`, `emp_dob`, `emp_phone`, `emp_jobpost`, `emp_station`, `emp_gender`, `emp_address`) VALUES
(1, 'emp1', 'emp1@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '2019-05-05', '1234567891', 'supervisor', 1, 'M', 'BSK');

-- --------------------------------------------------------

--
-- Table structure for table `ridecost`
--

CREATE TABLE `ridecost` (
  `ride_id` int(11) NOT NULL,
  `no_of_stations` int(11) NOT NULL,
  `ride_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ridecost`
--

INSERT INTO `ridecost` (`ride_id`, `no_of_stations`, `ride_cost`) VALUES
(1, 1, 10),
(2, 2, 15),
(3, 3, 15),
(4, 4, 18),
(5, 5, 20),
(6, 6, 20),
(7, 7, 28),
(8, 8, 30),
(9, 9, 30),
(10, 10, 35),
(11, 11, 35),
(12, 12, 38),
(13, 13, 40),
(14, 14, 42),
(15, 15, 45),
(16, 16, 45),
(17, 17, 50),
(18, 18, 52),
(19, 19, 52),
(20, 20, 55),
(21, 21, 58),
(22, 22, 60),
(23, 23, 60),
(24, 24, 60),
(25, 25, 60);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(120) DEFAULT NULL,
  `station_phone` varchar(50) DEFAULT NULL,
  `station_address` varchar(255) DEFAULT NULL,
  `supervisor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `station_name`, `station_phone`, `station_address`, `supervisor`) VALUES
(1, 'Yelechenahalli', '1800-425-12345', 'Yelechenahalli, Bengaluru', 1),
(2, 'J P Nagar', '1800-425-12345', 'J P Nagar, Bengaluru', 1),
(3, 'Banashankari', '1800-425-12345', 'Banashankari, Bengaluru', 1),
(5, 'Rastriya Vidyalaya Road', '1800-425-12345', 'Rastriya Vidyalaya Road, Bengaluru', 1),
(6, 'Jayanagar', '1800-425-12345', 'Jayanagar, Bengaluru', 1),
(7, 'South End Circle', '1800-425-12345', 'South End Circle, Bengaluru', 1),
(8, 'Lalbagh', '1800-425-12345', 'Lalbagh, Bengaluru', 1),
(9, 'National College', '1800-425-12345', 'National College, Bengaluru', 1),
(10, 'Krishna Rajendra Market', '1800-425-12345', 'Krishna Rajendra Market, Bengaluru', 1),
(11, 'Chikpet', '1800-425-12345', 'Chikpet, Bengaluru', 1),
(12, 'Majestic', '1800-425-12345', 'Majestic, Bengaluru', 1),
(13, 'Mantri Square', '1800-425-12345', 'Mantri Square, Bengaluru', 1),
(14, 'Srirampura', '1800-425-12345', 'Srirampura, Bengaluru', 1),
(15, 'Kuvempu Road', '1800-425-12345', 'Kuvempu Road, Bengaluru', 1),
(16, 'Rajajinagar', '1800-425-12345', 'Rajajinagar, Bengaluru', 1),
(17, 'Mahalakshmi Layout', '1800-425-12345', 'Mahalakshmi Layout, Bengaluru', 1),
(18, 'Sandal Soap Factory', '1800-425-12345', 'Sandal Soap Factory, Bengaluru', 1),
(19, 'Yashavanthpur', '1800-425-12345', 'Yashavanthpur, Bengaluru', 1),
(20, 'Yashavanthpur Industry', '1800-425-12345', 'Yashavanthpur Industry, Bengaluru', 1),
(21, 'Peenya', '1800-425-12345', 'Peenya, Bengaluru', 1),
(22, 'Peenya Industry', '1800-425-12345', 'Peenya Industry, Bengaluru', 1),
(23, 'Jalahalli', '1800-425-12345', 'Jalahalli, Bengaluru', 1),
(24, 'Dasarahlli', '1800-425-12345', 'Dasarahlli, Bengaluru', 1),
(25, 'Nagasandra', '1800-425-12345', 'Nagasandra, Bengaluru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `travel_date_enter` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `travel_date_exit` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travel_id`, `user_id`, `source_id`, `destination_id`, `travel_date_enter`, `travel_date_exit`) VALUES
(1, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 25, 8, '2023-05-26 06:32:11', '2023-05-26 06:32:11'),
(6, 1, 12, 3, '2023-05-26 06:35:49', '2023-05-26 06:35:49'),
(7, 1, 8, 8, '2023-05-26 06:48:35', '2023-05-26 06:48:35'),
(8, 1, 3, 15, '2023-05-26 06:49:59', '2023-05-26 06:49:59'),
(9, 1, 10, 8, '2023-05-26 06:53:09', '2023-05-26 06:53:09'),
(10, 1, 15, 13, '2023-05-26 07:50:26', '2023-05-26 07:50:26'),
(11, 3, 8, 10, '2023-05-27 04:36:00', '2023-05-27 04:36:00'),
(12, 4, 12, 8, '2023-05-26 07:52:09', '2023-05-26 07:52:09'),
(13, 2, 12, 13, '2023-05-26 08:45:06', '2023-05-26 08:45:06'),
(14, 1, 15, 13, '2023-05-26 08:14:58', '2023-05-26 08:14:58'),
(15, 1, 13, 15, '2023-05-26 08:16:22', '2023-05-26 08:16:22'),
(16, 1, 8, 25, '2023-05-26 11:39:27', '2023-05-26 11:39:27'),
(17, 2, 8, 10, '2023-05-26 08:48:58', '2023-05-26 08:48:58'),
(18, 2, 8, 15, '2023-05-26 10:28:30', '2023-05-26 10:28:30'),
(19, 1, 13, 3, '2023-05-26 11:43:06', '2023-05-26 11:43:06'),
(20, 1, 10, 12, '2023-05-26 12:01:57', '2023-05-26 12:01:57'),
(21, 2, 12, 8, '2023-05-26 12:02:38', '2023-05-26 12:02:38'),
(22, 1, 3, 15, '2023-05-26 17:57:04', '2023-05-26 17:57:04'),
(23, 1, 15, 13, '2023-05-26 17:59:30', '2023-05-26 17:59:30'),
(24, 1, 3, 8, '2023-05-26 18:00:45', '2023-05-26 18:00:45'),
(25, 1, 10, 15, '2023-05-26 18:02:46', '2023-05-26 18:02:46'),
(26, 1, 25, 15, '2023-05-26 18:03:58', '2023-05-26 18:03:58'),
(27, 2, 12, 25, '2023-05-26 18:04:20', '2023-05-26 18:04:20'),
(28, 1, 13, 12, '2023-05-27 04:36:21', '2023-05-27 04:36:21'),
(29, 2, 13, 8, '2023-05-27 05:54:24', '2023-05-27 05:54:24'),
(30, 3, 15, 13, '2023-05-27 05:55:10', '2023-05-27 05:55:10'),
(31, 1, 3, 25, '2023-05-27 04:39:06', '2023-05-27 04:39:06'),
(32, 1, 8, 10, '2023-05-27 04:40:14', '2023-05-27 04:40:14'),
(33, 1, 8, 12, '2023-05-27 04:44:04', '2023-05-27 04:44:04'),
(34, 1, 10, 8, '2023-05-27 04:47:16', '2023-05-27 04:47:16'),
(35, 1, 8, 10, '2023-05-27 04:49:36', '2023-05-27 04:49:36'),
(36, 4, 12, 3, '2023-05-27 05:56:33', '2023-05-27 05:56:33'),
(37, 1, 3, 12, '2023-05-27 05:58:32', '2023-05-27 05:58:32'),
(38, 1, 10, 13, '2023-05-27 06:04:56', '2023-05-27 06:04:56'),
(39, 1, 15, 13, '2023-05-27 06:18:50', '2023-05-27 06:18:50'),
(40, 4, 13, 3, '2023-06-02 04:59:04', '2023-06-02 04:59:04'),
(41, 2, 3, 3, '2023-06-03 06:05:32', '2023-06-03 06:05:32'),
(42, 3, 13, 13, '2023-06-02 05:26:36', '2023-06-02 05:26:36'),
(43, 3, 13, 8, '2023-06-02 05:28:37', '2023-06-02 05:28:37'),
(44, 3, 10, 25, '2023-06-02 05:33:34', '2023-06-02 05:33:34'),
(45, 4, 13, 25, '2023-06-02 09:12:57', '2023-06-02 09:12:57'),
(46, 3, 8, 10, '2023-06-02 05:38:37', '2023-06-02 05:38:37'),
(47, 3, 12, 3, '2023-06-02 05:47:05', '2023-06-02 05:47:05'),
(48, 3, 25, 8, '2023-06-02 05:50:40', '2023-06-02 05:50:40'),
(49, 3, 15, 15, '2023-06-02 06:01:32', '2023-06-02 06:01:32'),
(50, 3, 3, 8, '2023-06-02 06:17:14', '2023-06-02 06:17:14'),
(51, 1, 25, 3, '2023-06-02 06:17:55', '2023-06-02 06:17:55'),
(52, 1, 12, 25, '2023-06-03 04:47:39', '2023-06-03 04:47:39'),
(53, 3, 10, 10, '2023-06-02 06:53:47', '2023-06-02 06:53:47'),
(54, 3, 10, 15, '2023-06-02 06:54:25', '2023-06-02 06:54:25'),
(55, 3, 25, 25, '2023-06-02 06:59:25', '2023-06-02 06:59:25'),
(56, 3, 10, 8, '2023-06-02 07:19:00', '2023-06-02 07:19:00'),
(57, 3, 25, 12, '2023-06-02 07:29:52', '2023-06-02 07:29:52'),
(58, 3, 13, 15, '2023-06-02 07:39:51', '2023-06-02 07:39:51'),
(59, 3, 13, 10, '2023-06-02 07:58:42', '2023-06-02 07:58:42'),
(60, 3, 10, 8, '2023-06-02 08:33:42', '2023-06-02 08:33:42'),
(61, 3, 25, 13, '2023-06-02 08:47:42', '2023-06-02 08:47:42'),
(62, 3, 15, 3, '2023-06-02 08:50:43', '2023-06-02 08:50:43'),
(63, 3, 8, 13, '2023-06-02 09:00:13', '2023-06-02 09:00:13'),
(64, 3, 15, 10, '2023-06-02 09:09:13', '2023-06-02 09:09:13'),
(65, 4, 12, 3, '2023-06-02 09:13:47', '2023-06-02 09:13:47'),
(66, 3, 25, 13, '2023-06-02 09:26:14', '2023-06-02 09:26:14'),
(67, 3, 10, 25, '2023-06-02 09:30:30', '2023-06-02 09:30:30'),
(68, 3, 25, 13, '2023-06-02 09:35:30', '2023-06-02 09:35:30'),
(69, 4, 10, -1, '2023-06-02 09:35:11', '0000-00-00 00:00:00'),
(70, 3, 10, 25, '2023-06-02 09:39:10', '2023-06-02 09:39:10'),
(71, 3, 3, 15, '2023-06-02 09:43:13', '2023-06-02 09:43:13'),
(72, 1, 10, 15, '2023-06-03 04:50:39', '2023-06-03 04:50:39'),
(73, 1, 15, 15, '2023-06-03 05:02:51', '2023-06-03 05:02:51'),
(74, 3, 13, 10, '2023-06-03 05:05:25', '2023-06-03 05:05:25'),
(75, 1, 3, 25, '2023-06-03 05:14:16', '2023-06-03 05:14:16'),
(76, 1, 10, 3, '2023-06-03 05:19:59', '2023-06-03 05:19:59'),
(77, 1, 8, 12, '2023-06-03 05:36:01', '2023-06-03 05:36:01'),
(78, 3, 8, 10, '2023-06-03 06:03:02', '2023-06-03 06:03:02'),
(79, 1, 25, 25, '2023-06-03 05:42:23', '2023-06-03 05:42:23'),
(80, 1, 12, 25, '2023-06-03 05:51:55', '2023-06-03 05:51:55'),
(81, 1, 13, 10, '2023-06-03 05:56:39', '2023-06-03 05:56:39'),
(82, 2, 15, 15, '2023-06-03 06:06:16', '2023-06-03 06:06:16'),
(83, 3, 12, 13, '2023-06-03 06:12:03', '2023-06-03 06:12:03'),
(84, 1, 15, 13, '2023-06-03 06:27:39', '2023-06-03 06:27:39'),
(85, 3, 15, 3, '2023-06-03 06:23:30', '2023-06-03 06:23:30'),
(86, 1, 13, 10, '2023-06-03 06:43:01', '2023-06-03 06:43:01'),
(87, 1, 25, 3, '2023-06-03 06:48:57', '2023-06-03 06:48:57'),
(88, 1, 8, 15, '2023-06-03 06:49:49', '2023-06-03 06:49:49'),
(89, 1, 25, 3, '2023-06-03 06:54:53', '2023-06-03 06:54:53'),
(90, 3, 13, 25, '2023-06-03 06:58:00', '2023-06-03 06:58:00'),
(91, 3, 12, 12, '2023-06-03 07:04:43', '2023-06-03 07:04:43'),
(92, 3, 25, 10, '2023-06-03 07:05:25', '2023-06-03 07:05:25'),
(93, 3, 25, 8, '2023-06-03 07:25:15', '2023-06-03 07:25:15'),
(94, 1, 13, 13, '2023-06-07 15:55:47', '2023-06-07 15:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(120) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_phone` varchar(11) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_gender` varchar(100) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_balance` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_dob`, `user_gender`, `user_city`, `user_balance`) VALUES
(1, 'Subhash R', 'subhusubhash24@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '7892487188', '2001-07-04', 'Male', 'Bangalore', 441),
(2, 'Sagar G U', 'sagargu30@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '8431230293', '0000-00-00', 'Male', 'Bangalore', 619),
(3, 'Nihal R Gowda', 'nihalgowda42@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '6363655910', '2001-04-04', 'Male', 'Bangalore', 639),
(4, 'Srihari K', 'srihari6287@gmail.com', '34819d7beeabb9260a5c854bc85b3e44', '9110477259', '2001-11-08', 'Male', 'Bangalore', 1849);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travel_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `travel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
