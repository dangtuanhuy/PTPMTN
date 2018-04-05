-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2018 at 01:41 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE IF NOT EXISTS `Class` (
  `ClassId` int(10) NOT NULL,
  `ClassName` varchar(100) NOT NULL,
  `Enrollment` int(10) unsigned NOT NULL,
  `ClassStatus` tinyint(4) DEFAULT '0',
  `GradeId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassId`, `ClassName`, `Enrollment`, `ClassStatus`, `GradeId`) VALUES
(1, 'PRE1801', 40, 0, 1),
(2, 'PRE1802', 50, 0, 1),
(3, 'PRE1803', 40, 0, 1),
(4, 'KIND1801', 45, 0, 2),
(5, 'KIND1802', 54, 0, 2),
(6, 'KIND1803', 41, 1, 2),
(7, 'KIND1804', 38, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `DepartmentId` int(11) NOT NULL,
  `DepartmentName` varchar(255) NOT NULL,
  `DepartmentDetails` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Grade`
--

CREATE TABLE IF NOT EXISTS `Grade` (
  `GradeId` int(11) NOT NULL,
  `GradeName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Grade`
--

INSERT INTO `Grade` (`GradeId`, `GradeName`) VALUES
(1, 'Pre'),
(2, 'Kindergarten'),
(3, 'Primary');

-- --------------------------------------------------------

--
-- Table structure for table `ImgPersonel`
--

CREATE TABLE IF NOT EXISTS `ImgPersonel` (
  `ImgPersonelId` int(11) NOT NULL,
  `ImgPersonel` varchar(255) DEFAULT NULL,
  `PersonelCode` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ImgStudent`
--

CREATE TABLE IF NOT EXISTS `ImgStudent` (
  `ImgStudentId` int(11) NOT NULL,
  `ImgStudent` varchar(255) DEFAULT NULL,
  `StudentCode` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Personel_Class`
--

CREATE TABLE IF NOT EXISTS `Personel_Class` (
  `ClassId` int(11) NOT NULL,
  `PersonnelCode` varchar(150) NOT NULL,
  `Start` date NOT NULL,
  `End` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE IF NOT EXISTS `Personnel` (
  `PersonnelCode` varchar(150) NOT NULL,
  `PersonnelName` varchar(150) NOT NULL,
  `PersonnelPass` varchar(150) NOT NULL,
  `PersonnelBirth` date NOT NULL,
  `PersonnelGender` tinyint(4) NOT NULL,
  `PersonnelAddress` text NOT NULL,
  `PersonnelNum` varchar(15) NOT NULL,
  `PersonnelEmail` varchar(50) NOT NULL,
  `PersonnelStatus` smallint(6) DEFAULT '0',
  `PositionId` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE IF NOT EXISTS `Position` (
  `PositionId` int(11) NOT NULL,
  `PositionName` varchar(140) NOT NULL,
  `PositionDetails` text,
  `DepartmentId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(150) NOT NULL,
  `RoleActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `StudentCode` varchar(155) NOT NULL,
  `StudentName` varchar(155) NOT NULL,
  `StudentBirth` date NOT NULL,
  `StudentGender` int(11) NOT NULL,
  `StudentPhone` varchar(50) NOT NULL,
  `StudentEmail` varchar(150) NOT NULL,
  `YourFatherName` varchar(70) NOT NULL,
  `YourMotherName` varchar(70) NOT NULL,
  `PhoneHouse` varchar(50) DEFAULT NULL,
  `StudentStatus` smallint(6) DEFAULT '1',
  `ClassId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`ClassId`),
  ADD KEY `GradeId` (`GradeId`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`DepartmentId`);

--
-- Indexes for table `Grade`
--
ALTER TABLE `Grade`
  ADD PRIMARY KEY (`GradeId`);

--
-- Indexes for table `ImgPersonel`
--
ALTER TABLE `ImgPersonel`
  ADD PRIMARY KEY (`ImgPersonelId`),
  ADD KEY `PersonelCode` (`PersonelCode`);

--
-- Indexes for table `ImgStudent`
--
ALTER TABLE `ImgStudent`
  ADD PRIMARY KEY (`ImgStudentId`),
  ADD KEY `StudentCode` (`StudentCode`);

--
-- Indexes for table `Personel_Class`
--
ALTER TABLE `Personel_Class`
  ADD PRIMARY KEY (`ClassId`,`PersonnelCode`),
  ADD KEY `PersonnelCode` (`PersonnelCode`);

--
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`PersonnelCode`),
  ADD KEY `PositionId` (`PositionId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- Indexes for table `Position`
--
ALTER TABLE `Position`
  ADD PRIMARY KEY (`PositionId`),
  ADD KEY `DepartmentId` (`DepartmentId`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentCode`),
  ADD KEY `ClassId` (`ClassId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `ClassId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Department`
--
ALTER TABLE `Department`
  MODIFY `DepartmentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Grade`
--
ALTER TABLE `Grade`
  MODIFY `GradeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ImgPersonel`
--
ALTER TABLE `ImgPersonel`
  MODIFY `ImgPersonelId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ImgStudent`
--
ALTER TABLE `ImgStudent`
  MODIFY `ImgStudentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Position`
--
ALTER TABLE `Position`
  MODIFY `PositionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Class`
--
ALTER TABLE `Class`
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`GradeId`) REFERENCES `Grade` (`GradeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ImgPersonel`
--
ALTER TABLE `ImgPersonel`
  ADD CONSTRAINT `imgpersonel_ibfk_1` FOREIGN KEY (`PersonelCode`) REFERENCES `Personnel` (`PersonnelCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ImgStudent`
--
ALTER TABLE `ImgStudent`
  ADD CONSTRAINT `imgstudent_ibfk_1` FOREIGN KEY (`StudentCode`) REFERENCES `Student` (`StudentCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Personel_Class`
--
ALTER TABLE `Personel_Class`
  ADD CONSTRAINT `personel_class_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `Class` (`ClassId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personel_class_ibfk_2` FOREIGN KEY (`PersonnelCode`) REFERENCES `Personnel` (`PersonnelCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`PositionId`) REFERENCES `Position` (`PositionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnel_ibfk_2` FOREIGN KEY (`RoleId`) REFERENCES `Role` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Position`
--
ALTER TABLE `Position`
  ADD CONSTRAINT `position_ibfk_1` FOREIGN KEY (`DepartmentId`) REFERENCES `Department` (`DepartmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `Class` (`ClassId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
