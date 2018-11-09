-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2016 at 09:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkingallocationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `phn_no` varchar(30) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Firstname`, `Lastname`, `Username`, `Email`, `Password`, `phn_no`, `Created`, `type`) VALUES
('sdfs', 'dfvdf', 'vdf', 'a@b', '123', '0123', '2016-12-25 13:19:36', 'user'),
('aaa', 'ttt', 'tyu', 'admin@admin', '123', '0123654', '2016-12-25 11:22:20', 'admin'),
('Rakib', 'Hasan', 'rakib', 'hasan@hotmail.com', '1234', '01974519173', '2016-12-30 15:48:32', 'user'),
('AJ', 'Styles', 'ajs', 'incharge@incharge', '1234', '01789456525', '2016-12-30 11:26:45', 'incharge'),
('Shahriar', 'Reza', 'msrr', 'msrr@gmail.com', '1234', '12455', '2016-12-25 11:22:24', 'user'),
('poi', 'jkl', 'mnb', 'q2@gmail.com', '1', '0147852369', '2016-12-30 10:12:13', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `SlipID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Name`, `Email`, `PhoneNumber`, `SlipID`) VALUES
('Rakib', 'hasan@hotmail.com', '01674519424', 2),
('Reza', 'msrr@gmail.com', '01717052405', 1),
('Sam', 'q2@gmail.com', '01688244566', 3);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `Floor_id` varchar(30) NOT NULL,
  `FloorNumber` varchar(30) DEFAULT NULL,
  `NumberOfSlot` int(11) DEFAULT NULL,
  `Lot_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`Floor_id`, `FloorNumber`, `NumberOfSlot`, `Lot_id`) VALUES
('frl_1', '1st floor', 1, 'pkl_9'),
('frl_2', '1st floor', 1, 'pkl_9'),
('frl_3', '1st floor', 1, 'pkl_9'),
('frl_4', '1st floor', 1, 'pkl_9'),
('frl_5', '1st floor', 1, 'pkl_10'),
('frl_6', '2nd floor', 1, 'pkl_10'),
('frl_7', '3rd floor', 0, 'pkl_10'),
('frl_8', '4th floor', 0, 'pkl_10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `f_c`
-- (See below for the actual view)
--
CREATE TABLE `f_c` (
`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `parkinglot`
--

CREATE TABLE `parkinglot` (
  `Lot_id` varchar(30) NOT NULL,
  `LotName` varchar(30) NOT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `LotCapasity` int(11) DEFAULT NULL,
  `LotOccupied` int(11) DEFAULT '0',
  `NoOfFloor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkinglot`
--

INSERT INTO `parkinglot` (`Lot_id`, `LotName`, `Address`, `LotCapasity`, `LotOccupied`, `NoOfFloor`) VALUES
('pkl_10', 'oll', 'oiu', 7, 0, 2),
('pkl_4', 'qaz', 'wsx', 444, 23, 11),
('pkl_5', 'Riya', 'aaaa', 123, 55, 8),
('pkl_7', 'qwer', 'ytre', 444, 0, 5),
('pkl_8', 'qw', 'wqqw', 0, 0, 4),
('pkl_9', 'qq', '11', 5, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `parkingslip`
--

CREATE TABLE `parkingslip` (
  `SlipID` int(11) NOT NULL,
  `SlotID` varchar(30) DEFAULT NULL,
  `NetParkingCharges` decimal(10,3) DEFAULT '0.000',
  `ParkingTimeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingslip`
--

INSERT INTO `parkingslip` (`SlipID`, `SlotID`, `NetParkingCharges`, `ParkingTimeStamp`) VALUES
(1, 'slt_id_1', '50.000', '2016-12-30 13:40:12'),
(2, 'slt_id_2', '100.000', '2016-12-30 15:50:49'),
(3, 'slt_id_3', '50.000', '2016-12-30 15:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `parkingslot`
--

CREATE TABLE `parkingslot` (
  `SlotID` varchar(30) NOT NULL,
  `SlotOccupied` int(11) DEFAULT '0',
  `Floor_id` varchar(30) DEFAULT NULL,
  `ParkingCharges` decimal(7,3) DEFAULT '50.550'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingslot`
--

INSERT INTO `parkingslot` (`SlotID`, `SlotOccupied`, `Floor_id`, `ParkingCharges`) VALUES
('slt_id_1', 1, 'frl_1', '50.550'),
('slt_id_2', 1, 'frl_1', '50.550'),
('slt_id_3', 0, 'frl_1', '50.550');

-- --------------------------------------------------------

--
-- Stand-in structure for view `parklot`
-- (See below for the actual view)
--
CREATE TABLE `parklot` (
`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `SlipID` (`SlipID`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`Floor_id`),
  ADD KEY `Lot_id` (`Lot_id`);

--
-- Indexes for table `parkinglot`
--
ALTER TABLE `parkinglot`
  ADD PRIMARY KEY (`Lot_id`),
  ADD UNIQUE KEY `LotName` (`LotName`);

--
-- Indexes for table `parkingslip`
--
ALTER TABLE `parkingslip`
  ADD PRIMARY KEY (`SlipID`),
  ADD KEY `SlotID` (`SlotID`);

--
-- Indexes for table `parkingslot`
--
ALTER TABLE `parkingslot`
  ADD PRIMARY KEY (`SlotID`),
  ADD KEY `Floor_id` (`Floor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parkingslip`
--
ALTER TABLE `parkingslip`
  MODIFY `SlipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `accounts` (`Email`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`SlipID`) REFERENCES `parkingslip` (`SlipID`);

--
-- Constraints for table `floor`
--
ALTER TABLE `floor`
  ADD CONSTRAINT `floor_ibfk_1` FOREIGN KEY (`Lot_id`) REFERENCES `parkinglot` (`Lot_id`);

--
-- Constraints for table `parkingslip`
--
ALTER TABLE `parkingslip`
  ADD CONSTRAINT `parkingslip_ibfk_1` FOREIGN KEY (`SlotID`) REFERENCES `parkingslot` (`SlotID`);

--
-- Constraints for table `parkingslot`
--
ALTER TABLE `parkingslot`
  ADD CONSTRAINT `parkingslot_ibfk_1` FOREIGN KEY (`Floor_id`) REFERENCES `floor` (`Floor_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Structure for view `f_c`
--
DROP TABLE IF EXISTS `f_c`;

CREATE VIEW `f_c` AS SELECT COUNT(`floor`.`Floor_id`) AS `count` FROM `floor`;
-- --------------------------------------------------------

--
-- Structure for view `parklot`
--
DROP TABLE IF EXISTS `parklot`;

CREATE VIEW `parklot` AS SELECT COUNT(`parkinglot`.`Lot_id`) AS `count` FROM `parkinglot`;

--
-- Indexes for dumped tables
--
