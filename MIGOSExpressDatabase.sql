-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 06:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `migosdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(10) NOT NULL,
  `Admin_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_name`, `password`) VALUES
('A123', 'Jason Ho', '12345678'),
('A178', 'Justin Ng', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `TraceNo` varchar(10) NOT NULL,
  `Order_ID` varchar(10) NOT NULL,
  `ConfirmedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`TraceNo`, `Order_ID`, `ConfirmedDate`) VALUES
('TN12345', 'OID123', '2022-02-03'),
('TN12346', 'OID124', '2022-02-20'),
('TN12347', 'OID125', '2022-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_log`
--

CREATE TABLE `delivery_log` (
  `LogID` int(11) NOT NULL,
  `Log_status` varchar(20) NOT NULL,
  `Log_date` date NOT NULL,
  `Log_time` varchar(7) NOT NULL,
  `TraceNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_log`
--

INSERT INTO `delivery_log` (`LogID`, `Log_status`, `Log_date`, `Log_time`, `TraceNo`) VALUES
(456487, 'pickup', '2022-02-04', '12.00pm', 'TN12345'),
(456488, 'pickup', '2022-02-23', '11.00am', 'TN12346'),
(456489, 'departed', '2022-02-23', '12:30', 'TN12346'),
(456490, 'arrive', '2022-02-28', '10.00am', 'TN12346'),
(456491, 'out', '2022-03-01', '10.00am', 'TN12346'),
(456492, 'delivered', '2022-03-02', '1.30pm', 'TN12346'),
(456493, 'departed', '2022-02-20', '1.00pm', 'TN12345'),
(456494, 'pick up', '2022-03-02', '12.30pm', 'TN12347'),
(456495, 'arrive', '2022-03-01', '12:35', 'TN12345'),
(456496, 'departed', '2022-04-20', '16:00', 'TN12347');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `PhoneNumber` varchar(20) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`PhoneNumber`, `Name`, `Address`, `Password`) VALUES
('01120350755', 'Jack Jack', 'Parkhill Residence', '12345678'),
('01162270922', 'Vt', 'semenyih', '020404'),
('0127163655', '', '', '456789'),
('0127654235', '', '', 'jiet0928'),
('0127984561', 'Random Account', '', 'jiet0928'),
('0128745954', '', '', 'jiet0928'),
('0129994577', '', '', '123456'),
('0167163544', '', '', 'lennontan'),
('0168341736', 'Lennon Tan', 'Parkhill Residence\r\n', '021009');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `Order_ID` varchar(10) NOT NULL,
  `SenderName` varchar(50) NOT NULL,
  `SenderPhoneNumber` varchar(20) NOT NULL,
  `SendAddress` varchar(200) NOT NULL,
  `ReceiverName` varchar(50) NOT NULL,
  `ReceiverPhoneNumber` varchar(20) NOT NULL,
  `ReceiveAddress` varchar(200) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Parcel_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`Order_ID`, `SenderName`, `SenderPhoneNumber`, `SendAddress`, `ReceiverName`, `ReceiverPhoneNumber`, `ReceiveAddress`, `PhoneNumber`, `Parcel_ID`) VALUES
('OID123', 'Jack Ser', '01120350755', 'Parkhill Residence', 'Justin', '012-12345687', 'Onesouth', '01120350755', 'P1096'),
('OID124', 'Mark', '014-8336578', '123, jalan boleh2, taman okay,81000 Kulai, Johor,Malaysia.', 'Lennon Tan', '016-7166845', '234, jalan okay2, taman boleh, 51000 Bukit Jalil,Kuala Lumpur, Malaysia.', '0127163655', 'P1097'),
('OID125', 'Lennon Tan', '016-8469574', 'Taman Serdang Perdana, 43300 Seri Kembangan, Selangor', 'Justin Ng', '017-8849290', 'Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '0168341736', 'P1098'),
('OID126', 'Justin Ng', '01120350755', 'KL convension central', 'Jason Liew', '0128794587', 'Parkhill Residence', '01120350755', 'P1101');

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `Parcel_ID` varchar(10) NOT NULL,
  `Goods_name` varchar(25) NOT NULL,
  `GoodsType` varchar(15) NOT NULL,
  `Weight_kg` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`Parcel_ID`, `Goods_name`, `GoodsType`, `Weight_kg`, `Quantity`) VALUES
('P1096', 'Phone', 'Parcel', 40, 1),
('P1097', 'PC', 'Parcel', 10, 1),
('P1098', 'Hair Conditioner', 'Parcel', 15, 1),
('P1100', 'Chips', 'Parcel', 50, 1),
('P1101', 'Phone', 'Parcel', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`TraceNo`);

--
-- Indexes for table `delivery_log`
--
ALTER TABLE `delivery_log`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`PhoneNumber`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`Parcel_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
