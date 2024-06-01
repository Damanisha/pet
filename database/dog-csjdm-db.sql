-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 02:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `picture` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `name`, `contact`, `email`, `username`, `password`, `picture`) VALUES
(1, 'Admin Dems', '(+63) 995 556 0819', 'cristobalmarkadrian@gmail.com', 'admin1234', 'c93ccd78b2076528346216b3b2f701e6', NULL),
(6, 'Mark Adrian', '09955560819', 'markadrian.cristobal@fcpc-inc.com', 'root', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbldoginfo`
--

CREATE TABLE `tbldoginfo` (
  `id` varchar(20) NOT NULL,
  `breed` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `color_markings` varchar(255) NOT NULL,
  `location_of_captivity` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `remarks_description` varchar(100) DEFAULT NULL,
  `dog_pictures` varchar(250) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `last_vaccination_date` date DEFAULT NULL,
  `residence_last_3_months` varchar(255) DEFAULT NULL,
  `has_owner` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldoginfo`
--

INSERT INTO `tbldoginfo` (`id`, `breed`, `gender`, `color_markings`, `location_of_captivity`, `date`, `time`, `remarks_description`, `dog_pictures`, `owner_id`, `name`, `last_vaccination_date`, `residence_last_3_months`, `has_owner`) VALUES
('dog-11-20240530', 'Pure', 'Male', 'White, Brown Accent', 'Mulawin', '2024-03-10', '02:16:00', 'Goodest Boi', 'images/upload/Screenshot 2024-04-01 084435.png', NULL, 'Komi', '2024-03-04', 'Mulawin', 'Yes'),
('img-13-20240530', 'Pure', 'Male', 'White with brown', 'Mulawin', '2024-05-30', '06:48:00', 'Curly Hair', 'images/upload/img-13-20240530.jpg', NULL, 'Komi', '2024-05-30', 'Mulawin', 'Yes'),
('img-4-20240530', 'Pure', 'Female', 'White', 'Mulawin', '2024-05-03', '13:03:00', 'Pink Collar', 'images/upload/img-4-20240530.jpg', NULL, 'Chichay', '2024-05-30', 'Stallion Homes', 'Yes'),
('img-6-20240530', 'Pure', 'Female', 'Black', 'Mulawin', '2024-05-03', '09:25:00', 'Curly Fur', 'images/upload/img-6-20240530.jpg', NULL, 'Kring', '2024-05-30', 'Stallion Homes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblownerinfo`
--

CREATE TABLE `tblownerinfo` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldoginfo`
--
ALTER TABLE `tbldoginfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `tblownerinfo`
--
ALTER TABLE `tblownerinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblownerinfo`
--
ALTER TABLE `tblownerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldoginfo`
--
ALTER TABLE `tbldoginfo`
  ADD CONSTRAINT `tblDogInfo_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `tblownerinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
