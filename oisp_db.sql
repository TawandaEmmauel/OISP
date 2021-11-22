-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2021 at 07:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oisp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` mediumint(9) NOT NULL,
  `filename` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `files` text NOT NULL,
  `date` datetime NOT NULL,
  `seen` int(11) NOT NULL,
  `received` int(11) NOT NULL,
  `deleted_sender` tinyint(1) NOT NULL,
  `deleted_receiver` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `gender`, `password`, `date`, `image`) VALUES
(1, 40478, 'emmanueltawanda', 'tawandaebvumbamera@gmail.com', 'Male', '123456789', '2021-11-22 04:40:24', ''),
(2, 81599977299690, 'ddd', 'sydneypro@gmail.com', 'Male', 'qwerty123', '2021-11-22 05:20:32', ''),
(3, 69399849263710, 'James', 'james@gmail.com', 'Male', '1234567890', '2021-11-22 09:01:06', ''),
(4, 800857, 'qwert', 'qwert@gmail.com', 'Male', '$2y$10$nT/DQpX02q/VNqH5UPG2F.KCq6mvw/EvCkdiO5IwCMQhQo7ogrXoC', '2021-11-22 18:48:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filename` (`filename`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `date` (`date`),
  ADD KEY `deleted_receiver` (`deleted_receiver`),
  ADD KEY `deleted_sender` (`deleted_sender`),
  ADD KEY `seen` (`seen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `gender` (`gender`),
  ADD KEY `date` (`date`),
  ADD KEY `image` (`image`),
  ADD KEY `image_2` (`image`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
