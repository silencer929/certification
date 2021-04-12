-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2021 at 02:22 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nurseries`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'dracula', 'd701fde59d74f76803087b6632186caf'),
(2, 'Maven', 'd701fde59d74f76803087b6632186caf');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(8) NOT NULL,
  `status` text NOT NULL,
  `evaluator_id` int(4) NOT NULL,
  `kefri_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `status`, `evaluator_id`, `kefri_num`) VALUES
(1, 'rejected', 0, 'KEF/NC/001'),
(2, 'pending', 3, 'KEF/NC/001');

-- --------------------------------------------------------

--
-- Table structure for table `evaluators`
--

CREATE TABLE `evaluators` (
  `evaluator_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluators`
--

INSERT INTO `evaluators` (`evaluator_id`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`) VALUES
(1, 'John', 'Doe', 'johnDoe', 'j_doe@gmail.com', '0799423332', 'd701fde59d74f76803087b6632186caf'),
(2, 'Jane', 'Doe', 'janeDoe', 'jane_doe@gmail.com', '0744009493', 'd701fde59d74f76803087b6632186caf'),
(3, 'Florence', 'Wangechi', 'florence', 'F_wangechi@gmail.com', '0744339133', 'd701fde59d74f76803087b6632186caf'),
(4, 'James', 'John', 'jamesJohn', 'j_john@gmail.com', '0744311974', 'd701fde59d74f76803087b6632186caf'),
(5, 'Vikki', 'Magere', 'vMagere', 'vmagere@gmail.com', '0792022022', 'd701fde59d74f76803087b6632186caf'),
(6, 'Enock', 'Wachira', 'eWachira', 'ewachira@gmail.com', '0740333040', 'd701fde59d74f76803087b6632186caf');

-- --------------------------------------------------------

--
-- Table structure for table `nursery`
--

CREATE TABLE `nursery` (
  `kfsreg_num` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kefri_num` varchar(50) CHARACTER SET latin1 NOT NULL,
  `established` varchar(20) CHARACTER SET latin1 NOT NULL,
  `county` text CHARACTER SET latin1 NOT NULL,
  `subcounty` text CHARACTER SET latin1 NOT NULL,
  `ward` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nursery`
--

INSERT INTO `nursery` (`kfsreg_num`, `kefri_num`, `established`, `county`, `subcounty`, `ward`) VALUES
('KFS/NC/020', 'KEF/NC/001', '2232-02-22', 'kiambu', 'kdjf', 'kdjfkdj');

--
-- Triggers `nursery`
--
DELIMITER $$
CREATE TRIGGER `tg_tableName_insert` BEFORE INSERT ON `nursery` FOR EACH ROW BEGIN
  INSERT INTO tableName_seq VALUES (NULL);
  SET NEW.kefri_num = CONCAT('KEF/NC/', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nursery_details`
--

CREATE TABLE `nursery_details` (
  `nursery_id` int(11) NOT NULL,
  `nursery_name` text NOT NULL,
  `manager` text NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `seedsource` text NOT NULL,
  `category` text NOT NULL,
  `capacity` text NOT NULL,
  `kefri_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursery_details`
--

INSERT INTO `nursery_details` (`nursery_id`, `nursery_name`, `manager`, `address`, `email`, `phone`, `seedsource`, `category`, `capacity`, `kefri_num`) VALUES
(1, 'vlad', 'vlad', '0943', 'evainaina@gmail.com', 795022174, 'kdf', 'public', 'small scale', 'KEF/NC/001'),
(2, 'vlad', 'vlad', '795022174', 'evainaina@gmail.com', 795022174, 'kefri', 'private', 'medium scale', 'KEF/NC/001');

-- --------------------------------------------------------

--
-- Table structure for table `tablename_seq`
--

CREATE TABLE `tablename_seq` (
  `kefris_num` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablename_seq`
--

INSERT INTO `tablename_seq` (`kefris_num`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`) VALUES
(1, 'Evainaina', 795022174, 'evainaina@gmail.com', 'd701fde59d74f76803087b6632186caf'),
(5, 'Vlad', 700000000, 'vlad@gmail.com', 'd701fde59d74f76803087b6632186caf'),
(6, 'Kyalla', 796039221, 'keyalla100@gmail.com', '6364d3f0f495b6ab9dcf8d3b5c6e0b01'),
(7, 'Trish', 787847857, 'trish@gmail.com', 'd701fde59d74f76803087b6632186caf'),
(8, 'Draq', 754022022, 'draq@gmail.com', 'd701fde59d74f76803087b6632186caf'),
(9, 'Ftah', 700000001, 'ftah@gmail.com', 'd701fde59d74f76803087b6632186caf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `kefri_num` (`kefri_num`);

--
-- Indexes for table `evaluators`
--
ALTER TABLE `evaluators`
  ADD PRIMARY KEY (`evaluator_id`);

--
-- Indexes for table `nursery`
--
ALTER TABLE `nursery`
  ADD PRIMARY KEY (`kefri_num`),
  ADD UNIQUE KEY `kfsreg_num` (`kfsreg_num`);

--
-- Indexes for table `nursery_details`
--
ALTER TABLE `nursery_details`
  ADD PRIMARY KEY (`nursery_id`) USING BTREE,
  ADD KEY `kefri_num` (`kefri_num`);

--
-- Indexes for table `tablename_seq`
--
ALTER TABLE `tablename_seq`
  ADD PRIMARY KEY (`kefris_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `evaluators`
--
ALTER TABLE `evaluators`
  MODIFY `evaluator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nursery_details`
--
ALTER TABLE `nursery_details`
  MODIFY `nursery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tablename_seq`
--
ALTER TABLE `tablename_seq`
  MODIFY `kefris_num` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`kefri_num`) REFERENCES `nursery` (`kefri_num`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`application_id`) REFERENCES `evaluators` (`evaluator_id`);

--
-- Constraints for table `nursery_details`
--
ALTER TABLE `nursery_details`
  ADD CONSTRAINT `nursery_details_ibfk_1` FOREIGN KEY (`kefri_num`) REFERENCES `nursery` (`kefri_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
