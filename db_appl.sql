-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 03:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_appl`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `middle_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `suffix` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email_address` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `profile_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `profile_path` varchar(2000) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `locked_status` int(11) NOT NULL,
  `login_status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `suffix`, `email_address`, `password`, `profile_name`, `profile_path`, `locked_status`, `login_status`, `role`, `login_date`, `date_updated`, `date_created`) VALUES
(1, 'Admin', '', 'Admin', '', 'admin@gmail.com', '$2y$10$f6qAm2khWFSL9oc/mjdRxe4H6XfV7YZBKohiKPV0ritsDMuUL6cdi', '', '', 0, 0, 1, '2020-11-08 21:58:45', '0000-00-00 00:00:00', '2020-11-08 21:39:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
