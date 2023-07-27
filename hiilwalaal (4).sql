-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 05:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiilwalaal`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`ID`, `Name`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `blooddonor`
--

CREATE TABLE `blooddonor` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `Age` date NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `BloodType` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blooddonor`
--

INSERT INTO `blooddonor` (`ID`, `Name`, `Phone`, `Region`, `District`, `Age`, `RegDate`, `BloodType`, `Status`, `UserID`) VALUES
(57, 'Kamaal', '0618292992', '9', '46', '2023-07-06', '2023-07-23 10:29:56', '7', 'Approved', 13),
(59, 'Cubeyd', '0619346686', '1', '17', '2023-07-20', '2023-07-23 09:41:52', '2', 'Approved', 0),
(60, 'kk', '1901919', '10', '49', '2023-07-23', '2023-07-25 15:05:24', '6', 'Approved', 1),
(61, 'macaani', '0617937157', '11', '54', '2023-07-23', '2023-07-23 12:40:45', '4', 'Approved', 25),
(62, 'zaki', '06178717', '10', '51', '2023-07-23', '2023-07-23 12:51:11', '8', 'Approved', 25),
(63, 'aisha', '0649528', '1', '15', '2001-07-01', '2023-07-23 12:57:16', '6', 'Approved', 2),
(64, 'hhh', '666', '11', '52', '2023-07-23', '2023-07-23 12:53:46', '6', 'Approved', 25),
(65, 'sahra', '12345', '1', '11', '2023-07-23', '2023-07-25 15:04:44', '3', 'Approved', 2),
(66, 'sudeys', '0617871709', '10', '51', '2023-07-23', '2023-07-23 12:56:27', '8', 'Approved', 25);

-- --------------------------------------------------------

--
-- Table structure for table `chariyah`
--

CREATE TABLE `chariyah` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL DEFAULT 'Daaru-Salaam',
  `DonateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Amount` double NOT NULL,
  `Description` varchar(10000) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chariyah`
--

INSERT INTO `chariyah` (`ID`, `Name`, `Phone`, `Type`, `District`, `DonateDate`, `Amount`, `Description`, `UserID`) VALUES
(14, 'Masjid Al-nicmaan', '654353', ' Masjid', 'Daaru-Salaam', '2023-07-24 09:13:39', 81.95999999999998, 'waxaa loogu tala galay in dadka aan ku caawino', 2),
(15, 'Masjid Abuu Hureyra', ' 0101001', ' Masjid', 'Daaru-Salaam', '2023-07-24 05:48:29', 100, 'waxaa loogu tala galay in dadka aan ku caawino', 0),
(17, 'Masjid Cibaadu Raxmaan', ' 061778881', ' Masjid', 'Daaru-Salaam', '2023-07-24 05:48:25', 500, 'waxaa loogu tala galay in dadka aan ku caawino', 0),
(20, 'Ceel Baraf', ' 8765', ' Ceel', 'waberi', '2023-07-24 05:46:42', 200, ' ddd', 0),
(21, 'Ceel Barde', ' 0617229292', ' Ceel', 'waberi', '2023-07-26 12:35:56', 21.99, 'ddd', 0),
(22, 'Dugsi Macalin Nuur', ' 0612822992', ' Dugsi', 'Daaru-salaam', '2023-07-06 21:00:00', 200, ' Haye', 0),
(23, 'Wadada  Cabdi Qaasim', ' 06182822', ' Wado', 'Hodan ', '2023-07-03 21:00:00', 2000, ' Waxaa lagu dhisayaa wado ku taal Cabdi Qaasim', 0),
(24, 'Masjid SHiikh Cabdi Nuur', ' 0617272828', ' Masjid', 'Shibis', '2023-07-06 21:00:00', 2002, ' Waxaa lagu dhisayaa wado ku taal Cabdi Qaasim', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(30) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `District` varchar(50) NOT NULL DEFAULT 'Daaru-Salaam',
  `address` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `blood_group`, `name`, `District`, `address`, `contact`, `email`, `date_created`) VALUES
(1, 'AB+', 'John Smith', 'Daaru-Salaam', 'Sample Address', '+18456-5455-55', 'jsmith@sample.com', '2020-10-23 09:25:57'),
(2, 'B-', 'George Wilson', 'Daaru-Salaam', 'Sample address', '8747808787', 'gwilson@sample.com', '2020-10-23 09:27:54'),
(3, 'O+', 'Claire Blake', 'Daaru-Salaam', 'Sample Address', '+6948 8542 623', 'cblake@sample.com', '2020-10-23 09:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `sadaqah`
--

CREATE TABLE `sadaqah` (
  `ID` int(11) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Amount` double NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CharityID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sadaqah`
--

INSERT INTO `sadaqah` (`ID`, `Phone`, `Amount`, `RegDate`, `CharityID`, `UserID`) VALUES
(1, '1', 1, '2023-07-24 07:21:33', 14, 2),
(2, '1', 1, '2023-07-24 07:29:29', 14, 2),
(3, '1', 1, '2023-07-24 07:30:11', 14, 2),
(4, '1', 1, '2023-07-24 08:00:33', 14, 2),
(5, '1', 1, '2023-07-24 08:08:36', 14, 2),
(6, '1', 1, '2023-07-24 08:11:33', 14, 2),
(7, '1', 1, '2023-07-24 08:11:42', 14, 2),
(8, '111', 111, '2023-07-24 08:26:59', 14, 2),
(9, '0.01', 0.01, '2023-07-24 08:59:21', 14, 2),
(10, '0.01', 0.01, '2023-07-24 09:01:15', 14, 2),
(11, '0.01', 0.01, '2023-07-24 09:02:28', 14, 2),
(12, '0685311984', 0.01, '2023-07-24 09:13:39', 14, 2),
(13, '0683345447', 0.01, '2023-07-26 12:35:56', 21, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL DEFAULT 'Bakaro',
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Phone`, `Address`, `UserName`, `Password`, `Role`) VALUES
(1, 'Macaani', '1128', 'Bakaro', 'macaani', '123', 'Admin'),
(2, 'Shuceyb ibrahim', '2920202', 'Bakaro', 'shuceyb', '12345', 'Admin'),
(13, 'cali Mohame', '90012234', 'Bakaro1', 'ali', '123', 'donor'),
(18, 'macani', '87755', 'madino', 'ali3', '123', 'user'),
(19, 'mohamed ahmed isse', '5463', 'madiino', 'moha', '1234', 'user'),
(21, 'Shuceyb', '61722727', 'Bakaaro', 'shaarka', '123', 'user'),
(22, 'Yuusuf Mohamed Abdi', '616088800', 'Bakaaro', 'yuusuf', '123', 'user'),
(24, 'axlaam', '612488282', 'yaaqshid', 'axlaam', '123', 'user'),
(25, 'Zackarie Dahir Farah', '0617871709', 'KalKaal', 'Duceysane', '321', 'user'),
(26, 'gulled', '0', 'Bakaro', 'simba', 'simba', 'Admin'),
(27, 'Zackarie Dahir', '617871709', 'Bakaro', 'Zacki', '1234', 'Admin'),
(28, 'mohan', '613401111', 'hodan', 'mohan', '123', 'user'),
(29, 'Abdulnur', '612890303', 'Elasha Biyaha', 'usama', '135', 'user'),
(30, 'kalkaal', '617282929', 'Digfeer', 'kalkaal', '123', 'Hospital'),
(31, 'mohamed ahmed isse', '0617937157', 'madiino', 'mcn', '123', 'user'),
(32, 'Faarah Ismaacil Kamaac', '0615311984', 'Bakaaro1', 'Faarah', '123', 'user'),
(33, 'spanish', '06812488282', 'deyniile', 'spanish', '123a', 'user'),
(34, 'axmad', '688298536', 'daru', 'moo', '321', 'user'),
(35, 'maan', '0619522200', 'yaaqshid', 'maan', '123', 'user'),
(36, 'guuleed siimba', '0617937157', 'buulaxubey', 'siimba', '', 'user'),
(37, 'sahuur', '0619610280', 'yaaqshid', 'sahuur', '123', 'user'),
(38, 'digfeer', '5678', 'hodan', 'digfeer', '123', 'user'),
(39, 'macalin', '456789', 'Bakaro', 'macalin', '123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blooddonor`
--
ALTER TABLE `blooddonor`
  ADD PRIMARY KEY (`ID`),
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
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blooddonor`
--
ALTER TABLE `blooddonor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `chariyah`
--
ALTER TABLE `chariyah`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sadaqah`
--
ALTER TABLE `sadaqah`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
