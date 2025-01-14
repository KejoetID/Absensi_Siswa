-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2024 at 04:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$e0L8BH5VdLzZ9b.P5c7GpOLCcYIQqsO7LrEI4U9b008eptNMkzhu2', 'admin'),
(3, 'Rasyid', '$2y$10$IzVGYQlGx4dEJs5RBKDwg.NBv63FunttaqPFJNcbT0ep9qwmE6g2C', 'customer'),
(9, 'alfin f', '$2y$10$PPVmrJMjKsWIAVE.F.KrVOSu3TYw2bCLAt2eT6S1LThI.3ak7iokW', 'customer'),
(10, 'irwan', '$2y$10$n1Sb.qqjRT5Gw7XAMQE5..lpkgUIDZzEpgiuqGKLgZ0gtP3N/Nm5u', 'customer'),
(11, 'Naiga', '$2y$10$Dn6stJ8AVp3omaCnrjifp.QprEa57aNGfDLjBSqY94Sh./LcO3Lhy', 'customer'),
(12, 'gifar', '$2y$10$vxkgysoQfQ3Lxk57BVBviua5a5gk7pJYLP32JC6li7XK8zPvLYmXq', 'customer'),
(13, 'irwan22', '$2y$10$OmIk31CdZ5p42NK/jKnVZuVZzRwsgVvO1LqN4AZPJv.QveXpTS4V.', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
