-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2020 at 04:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Happy_Smiles_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `APPOINTMENT`
--

CREATE TABLE `APPOINTMENT` (
  `AppointmentID` int(11) NOT NULL,
  `Date` varchar(11) NOT NULL,
  `Time` varchar(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `DentistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `APPOINTMENT`
--

INSERT INTO `APPOINTMENT` (`AppointmentID`, `Date`, `Time`, `CustomerID`, `DentistID`) VALUES
(1, '2020-12-24', '1PM', 120, 111003),
(2, '2020-12-21', '1PM', 121, 222003),
(7, '2020-12-28', '2PM', 126, 111003),
(8, '2020-12-13', '11AM', 127, 222003),
(9, '2020-12-21', '12PM', 128, 222002),
(10, '2020-12-18', '2PM', 129, 444001),
(11, '2020-12-15', '3PM', 130, 444005),
(12, '2020-12-15', '12PM', 131, 444001),
(13, '2020-12-07', '8AM', 132, 444005);

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `CustomerID` int(11) NOT NULL,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`CustomerID`, `FName`, `LName`, `Phone`, `Email`, `Address`) VALUES
(100, 'Mark', 'Duran', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(101, 'Catrina', 'Beck', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(102, 'Zakir', 'Daly', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(103, 'Aiza', 'Talley', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(104, 'Aoife', 'Nixon', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(105, 'Athena', 'Rivas', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(106, 'Marissa', 'Burgess', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(107, 'Omari', 'Okumura', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(108, 'Viktor', 'Talbot', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(109, 'Tina', 'McKnight', 'xxx-xxx-xxxx', 'someone@gmail.com', 'Somewhere Lane'),
(111, 'Yachiyo', 'Nanami', '555-555-5555', '', 'Kamihama'),
(112, 'Sayaka', 'Miki', '777-777-9898', '', 'Mitakihara'),
(120, 'Erica', 'Dayes', '343-333-3333', '', 'Somewhere'),
(121, 'Amiya', 'Rabit', '444-444-4444', '', 'Lungmen'),
(126, 'Franka', 'Fox', '647-777-7777', '', 'Black Steel'),
(127, 'Steward', 'Saihara', '678-777-6666', '', 'Rhodes Island'),
(128, 'Cardigan', 'Carson', '111-111-1111', '', 'Rhodes Island'),
(129, 'Siege', 'Victoria', '756-444-7777', '', 'Rhodes Island'),
(130, 'Pramanix', 'Snow', '111-111-1111', '', 'Kjerag'),
(131, 'Cliffheart', 'Snow', '333-333-3333', '', 'Kjerag'),
(132, 'Silver Ash', 'Snow', '111-111-1111', '', 'Kjerag');

-- --------------------------------------------------------

--
-- Table structure for table `DENTIST`
--

CREATE TABLE `DENTIST` (
  `DentistID` int(11) NOT NULL,
  `DFName` varchar(45) NOT NULL,
  `DLName` varchar(45) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `LocationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DENTIST`
--

INSERT INTO `DENTIST` (`DentistID`, `DFName`, `DLName`, `ServiceID`, `LocationID`) VALUES
(111000, 'Aila', 'Rawlings', 11111, 1),
(111001, 'Letita', 'McCarthy', 11111, 1),
(111002, 'Mihai', 'Graves', 11124, 1),
(111003, 'Phillippa', 'Nevillle', 11126, 1),
(111004, 'Jago', 'Dominguez', 11124, 1),
(222001, 'Haroon', 'Peel', 11111, 2),
(222002, 'Ella-Mae', 'Miles', 11111, 2),
(222003, 'Ammaarah', 'Parks', 11124, 2),
(222004, 'Bernice', 'Hutton', 11124, 2),
(222005, 'Marcia', 'Wyatt', 11126, 2),
(333001, 'Chase', 'Rosales', 11111, 3),
(333002, 'Lena', 'Cummings', 11112, 3),
(333003, 'Szymon', 'McKinney', 11112, 3),
(333004, 'Linda', 'Miller', 11124, 3),
(333005, 'Ryker', 'Southern', 11126, 3),
(444001, 'Armaan', 'Pace', 11125, 4),
(444002, 'Ewen', 'England', 11125, 4),
(444003, 'Connagh', 'Clements', 11128, 4),
(444004, 'Dafydd', 'Lam', 11127, 4),
(444005, 'Becky', 'Holden', 11111, 4);

-- --------------------------------------------------------

--
-- Table structure for table `LOCATIONS`
--

CREATE TABLE `LOCATIONS` (
  `LocationID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `ZIPCode` varchar(45) DEFAULT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `LOCATIONS`
--

INSERT INTO `LOCATIONS` (`LocationID`, `Name`, `City`, `State`, `ZIPCode`, `Description`) VALUES
(1, 'Green Bay Office', 'Green Bay', 'Wisconsin', '54304', 'This location is situated in lovely downtown Green Bay. Our first location.'),
(2, 'Hayward Office', 'Hayward', 'Wisconsin', '54843', 'Hayward is our Northern Wisconsin location. Like all our other locations, quality care is available.'),
(3, 'Oshkosh Office', 'Oshkosh', 'Wisconsin', '54902', 'Our Oshkosh office is a lovely practice with lovely dentists.'),
(4, 'Madison Office', 'Madison', 'Wisconsin', '53711', 'Our Madison office is our most recent office to date. Come see the new place!');

-- --------------------------------------------------------

--
-- Table structure for table `SERVICES`
--

CREATE TABLE `SERVICES` (
  `ServiceID` int(11) NOT NULL,
  `ServiceType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SERVICES`
--

INSERT INTO `SERVICES` (`ServiceID`, `ServiceType`) VALUES
(11111, 'Hygienist'),
(11112, 'Orthodontist'),
(11124, 'General'),
(11125, 'Oral and maxillofacial surgeon'),
(11126, 'Periodontist'),
(11127, 'Prosthodontist'),
(11128, 'Endodontist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `APPOINTMENT`
--
ALTER TABLE `APPOINTMENT`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `CustID` (`CustomerID`),
  ADD KEY `DentistID` (`DentistID`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `DENTIST`
--
ALTER TABLE `DENTIST`
  ADD PRIMARY KEY (`DentistID`),
  ADD KEY `ServiceID` (`ServiceID`),
  ADD KEY `LocationID` (`LocationID`);

--
-- Indexes for table `LOCATIONS`
--
ALTER TABLE `LOCATIONS`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `SERVICES`
--
ALTER TABLE `SERVICES`
  ADD PRIMARY KEY (`ServiceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `APPOINTMENT`
--
ALTER TABLE `APPOINTMENT`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `DENTIST`
--
ALTER TABLE `DENTIST`
  MODIFY `DentistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444007;

--
-- AUTO_INCREMENT for table `LOCATIONS`
--
ALTER TABLE `LOCATIONS`
  MODIFY `LocationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `SERVICES`
--
ALTER TABLE `SERVICES`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `APPOINTMENT`
--
ALTER TABLE `APPOINTMENT`
  ADD CONSTRAINT `CustID` FOREIGN KEY (`CustomerID`) REFERENCES `CUSTOMER` (`CustomerID`),
  ADD CONSTRAINT `DentistID` FOREIGN KEY (`DentistID`) REFERENCES `DENTIST` (`DentistID`);

--
-- Constraints for table `DENTIST`
--
ALTER TABLE `DENTIST`
  ADD CONSTRAINT `LocationID` FOREIGN KEY (`LocationID`) REFERENCES `LOCATIONS` (`LocationID`),
  ADD CONSTRAINT `ServiceID` FOREIGN KEY (`ServiceID`) REFERENCES `SERVICES` (`ServiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
