-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 07:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiilwalal`
--

-- --------------------------------------------------------

--
-- Table structure for table `blooddonor`
--

CREATE TABLE `blooddonor` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `BloodType` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blooddonor`
--

INSERT INTO `blooddonor` (`ID`, `Name`, `Address`, `Phone`, `Age`, `RegDate`, `BloodType`, `Status`, `UserID`) VALUES
(26, 'mohamed  ahmed', 'madiino', '0617937157', '21', '2023-07-06 05:12:48', 'O+', 'Approved', 0),
(27, 'mohamed  ahmed', 'madiino', '0617937157', '21', '2023-07-06 05:12:55', 'O+', 'Approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloodseeker`
--

CREATE TABLE `bloodseeker` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `BloodType` varchar(50) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chariyah`
--

CREATE TABLE `chariyah` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `DonateDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Amount` double NOT NULL,
  `Description` varchar(50) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chariyah`
--

INSERT INTO `chariyah` (`ID`, `Name`, `Phone`, `Type`, `DonateDate`, `Amount`, `Description`, `UserID`, `Status`) VALUES
(1, 'mohamed  ahmed', '0617937157', '', '2023-06-12 07:26:32', 100, 'wadkumahsantahay', 68, ''),
(2, 'mohamed  ahmed', '0617937157', 'masjid', '2023-06-12 07:26:32', 0, 'thanks', 68, ''),
(3, 'mohamed  ahmed', '0617937157', 'masjid', '2023-06-12 07:26:32', 100, 'thanks', 68, ''),
(4, 'mohamed  ahmed', '0617937157', 'dugsi', '2023-06-12 07:37:40', 100, 'thanks', 68, '');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(30) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `blood_group`, `name`, `address`, `contact`, `email`, `date_created`) VALUES
(1, 'AB+', 'John Smith', 'Sample Address', '+18456-5455-55', 'jsmith@sample.com', '2020-10-23 09:25:57'),
(2, 'B-', 'George Wilson', 'Sample address', '8747808787', 'gwilson@sample.com', '2020-10-23 09:27:54'),
(3, 'O+', 'Claire Blake', 'Sample Address', '+6948 8542 623', 'cblake@sample.com', '2020-10-23 09:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `sadaqah`
--

CREATE TABLE `sadaqah` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Amount` double NOT NULL,
  `RegDate` varchar(50) NOT NULL,
  `SadaqaID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Phone`, `UserName`, `Password`, `Role`) VALUES
(68, 'mohamed ahmed isse', '(615) 645-7353', 'admin123', '123', 'Admin'),
(70, 'zaki daahir farah', '754639262', 'admin', '12', 'User'),
(73, 'macaani ahmed isse', '7638463', 'macaani', '123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blooddonor`
--
ALTER TABLE `blooddonor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `bloodseeker`
--
ALTER TABLE `bloodseeker`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BloodType` (`BloodType`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `chariyah`
--
ALTER TABLE `chariyah`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `sadaqah`
--
ALTER TABLE `sadaqah`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blooddonor`
--
ALTER TABLE `blooddonor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bloodseeker`
--
ALTER TABLE `bloodseeker`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chariyah`
--
ALTER TABLE `chariyah`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sadaqah`
--
ALTER TABLE `sadaqah`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chariyah`
--
ALTER TABLE `chariyah`
  ADD CONSTRAINT `chariyah_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `sadaqah`
--
ALTER TABLE `sadaqah`
  ADD CONSTRAINT `sadaqah_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
