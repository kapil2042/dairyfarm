-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 07:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairyfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cow_info`
--

CREATE TABLE `cow_info` (
  `cid` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cow_info`
--

INSERT INTO `cow_info` (`cid`, `gender`, `dob`, `status`) VALUES
(1, 'Female', '2000-02-29', 'Sold!'),
(2, 'Female', '2008-02-20', 'Available!'),
(4, 'Female', '2003-07-26', 'Available!'),
(11, 'Female', '5543-04-12', 'Sold!'),
(12, 'Female', '0122-11-20', 'Available!');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `username` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `mobileNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`username`, `password`, `name`, `mobileNo`) VALUES
('ak', 'ak', 'ak', '1234567890'),
('kapil', 'mk', 'Kapil Dalsaniya', '9537334123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cow_info`
--
ALTER TABLE `cow_info`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `logindetails`
--
ALTER TABLE `logindetails`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `mobileNo` (`mobileNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cow_info`
--
ALTER TABLE `cow_info`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
