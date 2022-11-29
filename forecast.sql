-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 06:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecast`
--
CREATE DATABASE IF NOT EXISTS `forecast` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forecast`;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `academic_rank` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `admission_role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `firstname`, `lastname`, `email`, `academic_rank`, `department`, `admission_role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jaydee', 'Ballaho', 'jd@wmsu.edu.ph', 'Instructor', 'Computer Science', 'Admission Officer', 'Inactive', '2022-11-13 14:42:27', '2022-11-13 14:43:36'),
(4, 'Khasmir', 'Basaluddin', 'kmb@wmsu.edu.ph', 'Asst. Professor', 'Computer Science', 'Admission Officer', 'Active Employee', '2022-11-28 15:27:20', '2022-11-28 15:27:20'),
(6, 'John Kent', 'Evangelista', 'jke@wmsu.edu.ph', 'Professor', 'Computer Science', 'Admission Officer', 'Active Employee', '2022-11-28 15:33:10', '2022-11-28 15:33:10'),
(7, 'Bennett', 'Chan', 'bc@wmsu.edu.ph', 'Asst. Professor', 'Computer Science', 'Admission Officer', 'Active Employee', '2022-11-28 15:33:24', '2022-11-28 15:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `years` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `cet` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `code`, `description`, `years`, `level`, `cet`, `status`, `created_at`, `updated_at`) VALUES
(14, 'ACT', 'Associate in Computer Technology', 2, 'Associate', 55, 'Offering', '2022-11-13 13:26:06', '2022-11-13 23:06:10'),
(15, 'ACS', 'Associate in Computer Science', 2, 'Associate', 55, 'Phase-Out', '2022-11-13 14:20:18', '2022-11-13 23:06:13'),
(18, 'BSCS', 'Computer Science', 4, 'Bachelor', 90, 'Offering', '2022-11-28 15:31:17', '2022-11-28 15:31:17'),
(19, 'BSIT', 'Information Technology', 4, 'Bachelor', 60, 'Offering', '2022-11-28 15:31:27', '2022-11-28 15:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `type`, `username`, `password`) VALUES
(1, 'Jaydee', 'Ballaho', 'admin', 'jaydee', 'jaydee'),
(2, 'Root', 'Root', 'admin', 'root', 'root'),
(3, 'Natsu', 'Dragneel', 'staff', 'natsu', 'natsu'),
(4, 'Erza', 'Scarlet', 'staff', 'erza', 'erza'),
(5, 'Khasmir', 'Basaluddin', 'staff', 'khasmir', 'khasmir'),
(6, 'Kent', 'Evangelista', 'staff', 'kent', 'kent'),
(7, 'Bennett', 'Chan', 'staff', 'bennett', 'bennett'),
(8, 'Lucy', 'Felix', 'staff', 'lucy', 'lucy'),
(9, 'Rob', 'Villanueva', 'staff', 'rob', 'rob'),
(10, 'Denise', 'Gerzon', 'staff', 'denise', 'denise'),
(11, 'Sherinata', 'Said', 'staff', 'sherinata', 'sherinata'),
(13, 'Eljen', 'Augusto', 'staff', 'eljen', 'eljen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `program_code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
