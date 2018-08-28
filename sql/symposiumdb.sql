-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 05:00 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symposiumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `admin_type` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `admin_type`, `password`) VALUES
(1, 'admin@gmail.com', 'Admin', '1501253a20bfd5826734648b89eed62f9aa415cf'),
(2, 'operator@gmail.com', 'Operator', '1501253a20bfd5826734648b89eed62f9aa415cf');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_rocord`
--

CREATE TABLE `attendance_rocord` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `datetimes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Information Technology'),
(2, 'Hospitality Management');

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

CREATE TABLE `dates` (
  `id` int(11) NOT NULL,
  `date_1` varchar(20) NOT NULL,
  `date_2` varchar(20) NOT NULL,
  `date_3` varchar(20) NOT NULL,
  `date_4` varchar(20) NOT NULL,
  `date_5` varchar(20) NOT NULL,
  `date_6` varchar(20) NOT NULL,
  `date_7` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`id`, `date_1`, `date_2`, `date_3`, `date_4`, `date_5`, `date_6`, `date_7`) VALUES
(1, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `full_papers`
--

CREATE TABLE `full_papers` (
  `paper_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `subject_area` varchar(150) NOT NULL,
  `reviewer_name` varchar(50) NOT NULL,
  `result` varchar(20) NOT NULL,
  `submit_date` datetime NOT NULL,
  `pdf_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='result (1 or 0) should add foreign keys';

--
-- Dumping data for table `full_papers`
--

INSERT INTO `full_papers` (`paper_id`, `category_name`, `user_id`, `title`, `subject_area`, `reviewer_name`, `result`, `submit_date`, `pdf_name`) VALUES
(1, 'HUMINITIES & SOCIAL SCIENCE', 1, 'human accident behaviour', 'This is the subject area', 'MR.Gayan', 'Accepted', '2018-08-28 08:06:45', 'Test_doc.docx');

-- --------------------------------------------------------

--
-- Table structure for table `log_records`
--

CREATE TABLE `log_records` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_initial` varchar(100) NOT NULL,
  `in_date` date NOT NULL,
  `in_time` time NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_records`
--

INSERT INTO `log_records` (`record_id`, `user_id`, `name_initial`, `in_date`, `in_time`, `user_type`) VALUES
(1, 1, 'admin@gmail.com->Admin', '2018-08-28', '08:01:11', 'Admin'),
(2, 1, 'admin@gmail.com->Admin', '2018-08-28', '08:02:01', 'Admin'),
(3, 2, 'operator@gmail.com->Operator', '2018-08-28', '08:07:55', 'Operator'),
(4, 2, 'operator@gmail.com->Operator', '2018-08-28', '08:15:34', 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `discrip` varchar(500) NOT NULL,
  `descrip_2` varchar(500) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `reviewer_name` varchar(60) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetimes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`reviewer_id`, `reviewer_name`, `designation`, `phone_no`, `email`, `datetimes`) VALUES
(1, 'MR.Gayan', 'Lecture', 772233445, 'gayan@gmail.com', '2018-08-28 08:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `review_details`
--

CREATE TABLE `review_details` (
  `reviewer_name` varchar(60) NOT NULL,
  `review_id` int(11) NOT NULL,
  `paper_id` int(20) NOT NULL,
  `added_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_details`
--

INSERT INTO `review_details` (`reviewer_name`, `review_id`, `paper_id`, `added_date`, `status`, `notes`) VALUES
('MR.Gayan', 1, 1, '2018-08-28 08:10:00', 'Accepted', 'this modification should be done. ');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_name` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `begin_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `name_initial` varchar(60) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `add_line1` varchar(50) NOT NULL,
  `add_line2` varchar(50) NOT NULL,
  `add_line3` varchar(50) NOT NULL,
  `dated` date NOT NULL,
  `ttime` time NOT NULL,
  `accommodation` varchar(100) NOT NULL,
  `food_type` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `qr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='extra_colum for future adjustments. accommodation.';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `institute`, `name_initial`, `salutation`, `phone_no`, `add_line1`, `add_line2`, `add_line3`, `dated`, `ttime`, `accommodation`, `food_type`, `image`, `qr`) VALUES
(1, 'Amila', 'Pradeep', 'researcher@gmail.com', '1501253a20bfd5826734648b89eed62f9aa415cf', 'Researcher', 'SLIATE SRI LANKA', 'OAP.SIlva', 'Mr', '0774244755', '1/462', 'Udawela', 'Tharana-udawela', '2018-08-28', '08:06:45', 'Need Accomodation', 'Vegetarian', '1.png', '1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance_rocord`
--
ALTER TABLE `attendance_rocord`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dates`
--
ALTER TABLE `dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `full_papers`
--
ALTER TABLE `full_papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `log_records`
--
ALTER TABLE `log_records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `review_details`
--
ALTER TABLE `review_details`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_rocord`
--
ALTER TABLE `attendance_rocord`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `full_papers`
--
ALTER TABLE `full_papers`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_records`
--
ALTER TABLE `log_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_details`
--
ALTER TABLE `review_details`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
