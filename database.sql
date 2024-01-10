-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 09:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `role` int(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `name`, `email`, `DOB`, `role`, `image`, `password`, `created_at`, `updated_at`, `status`) VALUES
(1, 'santhosh', 'vsanthosh@gmail.com', '2024-01-01', 5, 'santhosh.PNG', 'santhosh123', '2024-01-07 10:49:15', '2024-01-07 21:45:34', NULL),
(53, 'test', 'ss@gmail.com', '2024-01-10', 2, '659b797466a30_profile-circle-icon-1023x1024-ucnnjr', 'tes10', '2024-01-08 09:56:28', NULL, NULL),
(54, 'test2', 'df@gmail.com', '2024-02-03', 1, '659b7aaf6ec49_profile-circle-icon-1023x1024-ucnnjr', 'tes03', '2024-01-08 10:01:43', NULL, NULL),
(55, 'santhoshss', 'vsanthosh072002@gmail.com', '2024-01-17', 2, '659b7b3c8fe9d_Profile-Male-PNG.png', 'san17', '2024-01-08 10:04:04', NULL, NULL),
(56, 'ram', 'vsanthosh072002@gmail.com', '2024-01-10', 2, '659b816d7e78a_Profile-Male-PNG.png', 'ram10', '2024-01-08 10:30:29', NULL, NULL),
(57, 'nallathu', 'suma@gmail.com', '2024-01-17', 2, '659babb406b28_Profile-Male-PNG.png', 'nal17', '2024-01-08 13:30:52', NULL, NULL),
(58, 'sdf', 'sdf@gmail.com', '2024-01-11', 1, '659bac99b33bc_Profile-Male-PNG.png', 'sdf11', '2024-01-08 13:34:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `status`) VALUES
(1, 'Developer', NULL),
(2, 'Designer', NULL),
(3, 'Tester', NULL),
(4, 'QA Lead', NULL),
(5, 'Admin', NULL),
(6, 'Manager', NULL),
(7, 'Team Lead', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
