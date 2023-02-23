-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 02:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nou`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `description`, `status`, `code`, `contact_no`, `location`) VALUES
(1, 'DMB', 'desc 1', '1', '', '', ''),
(7, 'ADM', 'Admin\r\n', '1', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`) VALUES
(1, 'SW ERR', 'Software error', '1'),
(2, 'HW ERR', 'Hardware error', '1'),
(3, 'NET ERR', 'Netword error', '1');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `ticket_id`, `status_id`, `date_time`, `timestamp`, `comment`) VALUES
(1, 6, 1, '2023-02-18', '2023-02-18 15:32:55', 'test comment'),
(2, 1, 1, '2023-02-07', '2023-02-21 01:14:30', '435465rfdg'),
(3, 1, 2, '2023-02-07', '2023-02-21 01:15:14', 'ok'),
(4, 2, 3, '2023-02-21', '2023-02-21 01:16:46', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `description`, `status`) VALUES
(1, 'HP', NULL, '1'),
(2, 'DELL', NULL, '1'),
(3, 'ASUS', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `description`, `status`) VALUES
(1, 'IN', 'desc 1', '1'),
(7, 'REC', 'Recommendation\r\n', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `serial_no` varchar(200) NOT NULL,
  `date_time` date NOT NULL,
  `comment` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `code`, `serial_no`, `date_time`, `comment`, `branch_id`, `category_id`, `model_id`, `status_id`, `user_id`) VALUES
(1, '', 'fet4t5e5y123', '2023-02-07', 'ok', 7, 2, 1, 2, 0),
(2, '', 'frddg', '2023-02-21', 'ok', 1, 1, 1, 3, 0),
(3, '', 'fbfdgfd', '2023-02-15', '', 1, 1, 2, 1, 0),
(4, '', 'vdsvdsv', '2023-02-01', 'fdbdfb', 1, 1, 2, 1, 0),
(5, '', 'dsvdbv', '2023-02-11', '123', 1, 1, 1, 3, 0),
(6, '', 'cdsvdv', '2023-02-18', 'test comment', 7, 1, 2, 1, 0);

--
-- Triggers `ticket`
--
DELIMITER $$
CREATE TRIGGER `ticket_history` AFTER UPDATE ON `ticket` FOR EACH ROW INSERT INTO history 
(ticket_id,status_id,date_time,comment) VALUES
(new.id, new.status_id,new.date_time,new.comment)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ticket_insert` AFTER INSERT ON `ticket` FOR EACH ROW INSERT INTO history 
(ticket_id,status_id,date_time,comment) VALUES
(new.id, new.status_id,new.date_time,new.comment)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nic` char(12) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `contact_no` char(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `dob`, `nic`, `email`, `contact_no`, `status`, `password`, `gender`, `username`) VALUES
(1, 'Reshan', 'Rajasuriya', '2023-02-01', '951896958V', 'reshan@gmail.com', '0712598841', '1', '$2y$10$3a1TStFGtF7tT.nVzz5vXe5GEUBqnzv3wkAKxRM8FXso.f4uR8bNq', 1, 'admin'),
(2, 'Thunhandahena1', 'Shop 21', '2023-02-23', '957101761V', 'admin1@gmail.com', '0710558861', '1', '$2y$10$QO2VCX2Kny0xnU6eq37BhOkXEQJ.VbYcXxhit52JcNw40K4W4VbTa', 1, 'abc1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
