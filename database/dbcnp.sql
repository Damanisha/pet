-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 02:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- 
-- Database: `strayweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `name`, `contact`, `email`, `username`, `password`) VALUES
(1, 'Camp Codes', '+639079373999', 'serbermz2020@gmail.com', 'campcodes', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblDogInfo`
--

CREATE TABLE `tblDogInfo` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `color_markings` varchar(255) NOT NULL,
  `location_of_captivity` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `remarks_description` varchar(100) DEFAULT NULL,
  `dog_pictures` text NOT NULL,
  `last_vaccination_date` date DEFAULT NULL,
  `residence_last_3_months` varchar(255) DEFAULT NULL,
  `has_owner` varchar(10) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `prediction` varchar(255) DEFAULT NULL,
  `confidence` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `tblDogInfo_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `tblOwnerInfo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblOwnerInfo`
--

CREATE TABLE `tblOwnerInfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Additional indexes and auto_increment for tables
--

ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tblDogInfo`
  MODIFY `id` varchar(20) NOT NULL;

ALTER TABLE `tblOwnerInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
