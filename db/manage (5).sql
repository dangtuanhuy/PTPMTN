-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 08:32 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassId`, `ClassName`, `Enrollment`, `ClassStatus`, `GradeId`) VALUES
(1, 'PRE1801-01', 41, 0, 1),
(2, 'PRE1802', 50, 1, 1),
(3, 'PRE1803', 40, 0, 1),
(4, 'KIND1801', 45, 0, 2),
(5, 'KIND1802', 54, 0, 2),
(6, 'KIND1803', 41, 1, 2),
(7, 'KIND1804', 38, 1, 2),
(8, 'PRE 1601', 12, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `DepartmentId` int(11) NOT NULL,
  `DepartmentName` varchar(255) NOT NULL,
  `DepartmentDetails` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`DepartmentId`, `DepartmentName`, `DepartmentDetails`) VALUES
(1, 'Human Resouces (HR)', '<p>Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support. (HR)</p>\r\n'),
(2, 'Accounting (KT)', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.'),
(3, 'Consulting ', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.'),
(4, 'Classroom', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.'),
(5, 'Dining room', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.'),
(6, 'Teacher''s room', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.'),
(7, 'Warehouse', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.'),
(8, 'Administrative offices', 'Office administration is an indispensable part of any company, undertakes affairs related to administrative procedures and welcome reception, organization of clerical support to the whole human You can also provide legal advice if needed. Due to the nature of the work, in many companies, the Administration - Human Resources or Administrative - Organizational Unit are usually arranged together to facilitate mutual exchange and support.');

-- --------------------------------------------------------

--
-- Table structure for table `Grade`
--

CREATE TABLE IF NOT EXISTS `Grade` (
  `GradeId` int(11) NOT NULL,
  `GradeName` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Grade`
--

INSERT INTO `Grade` (`GradeId`, `GradeName`) VALUES
(1, 'Pre'),
(2, 'Kindergarten'),
(3, 'Primary'),
(4, 'Lá'),
(5, 'Lá 1'),
(6, 'Leaves'),
(7, 'Lá 3'),
(13, 'Left Green'),
(16, 'Quản trị hệ thống');

-- --------------------------------------------------------

--
-- Table structure for table `ImgPersonel`
--

CREATE TABLE IF NOT EXISTS `ImgPersonel` (
  `ImgPersonelId` int(11) NOT NULL,
  `ImgPersonel` varchar(255) DEFAULT NULL,
  `PersonelCode` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ImgPersonel`
--

INSERT INTO `ImgPersonel` (`ImgPersonelId`, `ImgPersonel`, `PersonelCode`) VALUES
(1, 'CP0810_ALG.png', 'CP0810'),
(2, 'CP0810_ALG.png', 'CP0810'),
(3, 'CP0810_AP.png', 'CP0810'),
(4, 'CP0810_AP.png', 'CP0810'),
(5, 'CP0810_AP.png', 'CP0810'),
(6, 'CP0810_AP.png', 'CP0810'),
(7, 'CP0810_AP.png', 'CP0810'),
(8, 'CP0810_AP.png', 'CP0810'),
(9, 'CP0810_AP.png', 'CP0810'),
(10, 'CP0810_AP.png', 'CP0810'),
(11, 'CP0810_AP.png', 'CP0810'),
(12, 'CP0810_AP.png', 'CP0810'),
(13, 'CP0810_AP.png', 'CP0810'),
(14, 'CP0810_AP.png', 'CP0810'),
(15, 'CP0810_AP.png', 'CP0810'),
(16, 'CP0810_AP.png', 'CP0810'),
(17, 'CP0810_AP.png', 'CP0810'),
(18, 'CP0810_AP.png', 'CP0810'),
(19, 'CP0810_AP.png', 'CP0810'),
(20, 'CP0810_AP.png', 'CP0810'),
(21, 'CP0810_AP.png', 'CP0810'),
(22, 'CP0810_AP.png', 'CP0810');

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
  `PersonnelCode` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Personel_Class`
--

INSERT INTO `Personel_Class` (`ClassId`, `PersonnelCode`) VALUES
(2, 'CP0810');

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
  `PersonnelActive` int(11) DEFAULT '0',
  `PersonnelNote` smallint(6) DEFAULT '1',
  `PositionId` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `PersonnelStatus` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`PersonnelCode`, `PersonnelName`, `PersonnelPass`, `PersonnelBirth`, `PersonnelGender`, `PersonnelAddress`, `PersonnelNum`, `PersonnelEmail`, `PersonnelActive`, `PersonnelNote`, `PositionId`, `RoleId`, `PersonnelStatus`) VALUES
('CP0809', 'Nguyen Thi Cam Tuyen', 'cbb2e126f7265748e7b6403625431f21', '1994-01-20', 1, 'Thot Not', '09093509', 'ntctuyen@gmail.com', 1, 0, 1, 1, 1),
('CP0810', 'Pham Hoai An', 'abba8340466a1b7ddc56c287821923af', '1996-03-08', 0, 'An Giang', '08779339', 'phan@gmail.com', 0, 1, 1, 1, 1),
('CP6969', 'Nguyen Thuc', '21232f297a57a5a743894a0e4a801fc3', '1996-01-01', 0, 'Dong Thap', '0907355924', 'me@ngthuc.com', 1, 0, 1, 2, 1),
('CP6970', 'nguyenthuc', '21232f297a57a5a743894a0e4a801fc3', '1996-04-24', 0, '<p>Teacher</p>\r\n', ' 907355924', 'thuc.edu@gmail.com', 0, 1, 4, 4, 0),
('CP900', 'Đặng Tuấn Huy', '202cb962ac59075b964b07152d234b70', '1997-01-02', 0, '<p>Ben Tre</p>\r\n', ' 0963505927', 'adobedangtuanhuy@gmail.com', 0, 1, 2, 1, 0),
('CP912', 'Viet Nam', '202cb962ac59075b964b07152d234b70', '2018-04-15', 0, '<p>122</p>\r\n', ' 0963505927', 'adobedangtuanhuy@gmail.com', 0, 1, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE IF NOT EXISTS `Position` (
  `PositionId` int(11) NOT NULL,
  `PositionName` varchar(140) NOT NULL,
  `PositionDetails` text,
  `DepartmentId` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Position`
--

INSERT INTO `Position` (`PositionId`, `PositionName`, `PositionDetails`, `DepartmentId`) VALUES
(1, 'Principal', '<p>The Rector is the head of a school (Elementary, secondary, College, University, etc.), management decisions for the school that 1</p>\r\n', 3),
(2, 'The ministers', 'The Rector is the head of a school (Elementary, secondary, College, University, etc.), management decisions for the school that', 1),
(3, 'Labor', 'The Rector is the head of a school (Elementary, secondary, College, University, etc.), management decisions for the school that', 7),
(4, 'Teacher', 'The Rector is the head of a school (Elementary, secondary, College, University, etc.), management decisions for the school that', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(150) NOT NULL,
  `RoleDescription` varchar(255) DEFAULT NULL,
  `RoleDetail` varchar(254) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`RoleId`, `RoleName`, `RoleDescription`, `RoleDetail`) VALUES
(1, 'User', 'Ex: Teacher ', 'student,home,class,grade,schoolyears'),
(2, 'Admin', 'Ex: Adminstrator', 'fullcontrol,student,personnel,home,class,department,role,grade,personnel,schoolyears'),
(4, 'Aao', 'Ex: Academic Affairs Officer', 'student,personnel,home,class,department,grade,position,schoolyears');

-- --------------------------------------------------------

--
-- Table structure for table `SchoolYears`
--

CREATE TABLE IF NOT EXISTS `SchoolYears` (
  `SchoolYearsId` tinyint(4) NOT NULL,
  `SchoolYears` varchar(155) NOT NULL,
  `Details` varchar(155) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SchoolYears`
--

INSERT INTO `SchoolYears` (`SchoolYearsId`, `SchoolYears`, `Details`) VALUES
(1, '2014-2015', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit'),
(2, '2015-2016', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit'),
(3, '2016-2017', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit'),
(4, '2017-2018', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit'),
(5, '2018-2019', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit'),
(6, '2019-2020', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit'),
(10, '2020-2021', 'The interest and help of the education and training of Cam expert preschool PGD, the leadership, the local authorities, agencies, unions created all condit');

-- --------------------------------------------------------

--
-- Table structure for table `SchoolYears_Class`
--

CREATE TABLE IF NOT EXISTS `SchoolYears_Class` (
  `SchoolYearsId` tinyint(4) NOT NULL,
  `ClassId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `StudentCode` varchar(155) NOT NULL,
  `StudentName` varchar(155) NOT NULL,
  `StudentBirth` date NOT NULL,
  `StudentGender` int(11) NOT NULL DEFAULT '0',
  `StudentAddress` varchar(150) NOT NULL,
  `YourFatherName` varchar(70) NOT NULL,
  `JobFather` varchar(50) DEFAULT NULL,
  `YourMotherName` varchar(70) NOT NULL,
  `JobMother` varchar(50) DEFAULT NULL,
  `PhoneHouse` varchar(50) NOT NULL,
  `StudentStatus` smallint(6) DEFAULT '1',
  `ClassId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentCode`, `StudentName`, `StudentBirth`, `StudentGender`, `StudentAddress`, `YourFatherName`, `JobFather`, `YourMotherName`, `JobMother`, `PhoneHouse`, `StudentStatus`, `ClassId`) VALUES
('CP101', 'Dang Tuan Huy', '1997-01-02', 0, 'Ben Tre', 'Mr', NULL, 'Mrs', NULL, '08083508', 1, 1),
('PRE003', 'Pham Hoai An', '2018-04-11', 0, '<p>Kieng Giang</p>\r\n', 'NULL', 'NULL ', 'NULL', 'NULL', '0963505927', 1, 2);

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
-- Indexes for table `SchoolYears`
--
ALTER TABLE `SchoolYears`
  ADD PRIMARY KEY (`SchoolYearsId`);

--
-- Indexes for table `SchoolYears_Class`
--
ALTER TABLE `SchoolYears_Class`
  ADD PRIMARY KEY (`SchoolYearsId`,`ClassId`),
  ADD KEY `ClassId` (`ClassId`);

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
  MODIFY `ClassId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Department`
--
ALTER TABLE `Department`
  MODIFY `DepartmentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Grade`
--
ALTER TABLE `Grade`
  MODIFY `GradeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ImgPersonel`
--
ALTER TABLE `ImgPersonel`
  MODIFY `ImgPersonelId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ImgStudent`
--
ALTER TABLE `ImgStudent`
  MODIFY `ImgStudentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Position`
--
ALTER TABLE `Position`
  MODIFY `PositionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `SchoolYears`
--
ALTER TABLE `SchoolYears`
  MODIFY `SchoolYearsId` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
-- Constraints for table `SchoolYears_Class`
--
ALTER TABLE `SchoolYears_Class`
  ADD CONSTRAINT `schoolyears_class_ibfk_1` FOREIGN KEY (`SchoolYearsId`) REFERENCES `SchoolYears` (`SchoolYearsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolyears_class_ibfk_2` FOREIGN KEY (`ClassId`) REFERENCES `Class` (`ClassId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ClassId`) REFERENCES `Class` (`ClassId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
