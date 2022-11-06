-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 04:09 PM
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
-- Database: `db_barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `seniorCitizenID` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `purokId` varchar(255) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `pension` varchar(255) NOT NULL,
  `monthlyPension` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `contactPerson` varchar(255) NOT NULL,
  `contactPersonNumber` varchar(255) NOT NULL,
  `contactAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pension`
--

CREATE TABLE `pension` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `monthlyPension` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pension`
--

INSERT INTO `pension` (`id`, `name`, `monthlyPension`, `date`) VALUES
(13, 'java ,doreen o.', '3000', '2022-10-10'),
(14, 'Rabago ,Joanna A.', '500', '2022-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `id` int(11) NOT NULL,
  `purokName` varchar(225) NOT NULL,
  `firstName` varchar(225) NOT NULL,
  `lastName` varchar(225) NOT NULL,
  `contactInfo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`id`, `purokName`, `firstName`, `lastName`, `contactInfo`) VALUES
(9, 'Purok San Gabriel', 'Eduardo ', 'Buttt', '09123456789'),
(10, 'Purok Rosal I', 'Lionedes', 'Balceda', '09123456789'),
(11, 'Purok Rosal II', 'Allan', 'Alvarez', '09123456789'),
(12, 'Purok Malacañang', 'Anabelle', 'Segido', '09123456789'),
(14, 'puroksantan', 'brandon', 'martin', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `senior_citizen`
--

CREATE TABLE `senior_citizen` (
  `id` int(11) NOT NULL,
  `seniorCitizenID` varchar(225) NOT NULL,
  `firstName` varchar(225) NOT NULL,
  `middleName` varchar(225) NOT NULL,
  `lastName` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `birthdate` varchar(225) NOT NULL,
  `age` varchar(225) NOT NULL,
  `birthplace` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `purokId` int(11) NOT NULL,
  `contactNumber` varchar(225) NOT NULL,
  `pension` varchar(225) NOT NULL,
  `monthlyPension` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `contactPerson` varchar(225) NOT NULL,
  `contactPersonNumber` varchar(225) NOT NULL,
  `contactAddress` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `senior_citizen`
--

INSERT INTO `senior_citizen` (`id`, `seniorCitizenID`, `firstName`, `middleName`, `lastName`, `gender`, `birthdate`, `age`, `birthplace`, `address`, `purokId`, `contactNumber`, `pension`, `monthlyPension`, `status`, `contactPerson`, `contactPersonNumber`, `contactAddress`) VALUES
(41, '123456', 'Victorino charles', 'Feria', 'Martin', 'Male', '1957-12-12', '64', 'Bago City', 'Barangay Balingasag , Bago City', 9, '09817160320', 'Yes', '4000', 'active', 'Brandon Zega T. martin', '09511089548', 'Barangay Balingsag , Purok San Gabriel , Bago City   '),
(42, '123457', 'Brandon Zega', 'Timbad', 'Martin', 'Male', '1940-06-17', '82', 'Bago City', 'Barangay Balingasag , Bago City', 10, '09466379199', 'Yes', '4000', 'Pending', 'Victorino charles Feria Martin', '0909090909', 'Barangay Balingasag , Purok San Gabriel , Bago City   '),
(43, '123458', 'Kristal Jane', 'Quiñal', 'Cantiller', 'Female', '1957-03-12', '65', 'Bago City', 'Barangay Balingasag , Bago City', 11, '09811397852', 'Yes', '3000', 'Pending', 'Victorino charles Feria Martin', '0909090909', 'Barangay Balingsag , Purok San Gabriel , Bago City   '),
(44, '123459', 'Joanna', 'Antinero', 'Rabago', 'Female', '1960-07-31', '62', 'Bago City', 'Barangay Balingasag , Bago City', 12, '09466379199', 'Yes', '3500', 'active', 'Victorino charles Feria Martin', '0909090909', 'Barangay Balingsag , Purok San Gabriel , Bago City   '),
(45, '123455', 'Mathew', 'Marupok', 'Pallorina', 'Male', '1961-12-22', '60', 'Bago City', 'Barangay Balingasag , Bago City', 10, '09124132882', 'No', '', 'active', 'Victorino charles Feria Martin', '0909090909', 'Barangay Balingsag , Purok San Gabriel , Bago City   '),
(46, '123454', 'Ma Doreen', 'Casisid', 'Java', 'Female', '1944-12-12', '77', 'Bago City', ' purok rosal l Barangay Balingasag , Bago City', 10, '09856353104', 'Yes', '4500', 'inactive', 'Victorino charles Feria Martin', '0909090909', 'Barangay Balingsag , Purok San Gabriel , Bago City   ');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivity`
--

CREATE TABLE `tblactivity` (
  `id` int(11) NOT NULL,
  `dateofactivity` date NOT NULL,
  `activity` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblactivity`
--

INSERT INTO `tblactivity` (`id`, `dateofactivity`, `activity`, `description`) VALUES
(1, '2022-10-20', 'jxcxjcxkcjxkcjxk', 'jsidjsidjsdjsij');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivityphoto`
--

CREATE TABLE `tblactivityphoto` (
  `id` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblactivityphoto`
--

INSERT INTO `tblactivityphoto` (`id`, `activityid`, `filename`) VALUES
(1, 1, '1666335450448Screenshot (13).png'),
(2, 1, '1666335493412Screenshot (11).png');

-- --------------------------------------------------------

--
-- Table structure for table `tblblotter`
--

CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL,
  `yearRecorded` varchar(4) NOT NULL,
  `dateRecorded` date NOT NULL,
  `complainant` text NOT NULL,
  `cage` int(11) NOT NULL,
  `caddress` text NOT NULL,
  `ccontact` int(11) NOT NULL,
  `personToComplain` text NOT NULL,
  `page` int(11) NOT NULL,
  `paddress` text NOT NULL,
  `pcontact` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `actionTaken` varchar(50) NOT NULL,
  `sStatus` varchar(50) NOT NULL,
  `locationOfIncidence` text NOT NULL,
  `recordedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblclearance`
--

CREATE TABLE `tblclearance` (
  `id` int(11) NOT NULL,
  `clearanceNo` int(11) NOT NULL,
  `residentid` int(11) NOT NULL,
  `findings` text NOT NULL,
  `purpose` text NOT NULL,
  `orNo` int(11) NOT NULL,
  `samount` int(11) NOT NULL,
  `dateRecorded` date NOT NULL,
  `recordedBy` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblhousehold`
--

CREATE TABLE `tblhousehold` (
  `id` int(11) NOT NULL,
  `householdno` int(11) NOT NULL,
  `zone` varchar(11) NOT NULL,
  `totalhouseholdmembers` int(2) NOT NULL,
  `headoffamily` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`id`, `user`, `logdate`, `action`) VALUES
(3, 'Administrator', '2022-09-11 15:14:38', 'Added Purok Leader Purok San Gabriel'),
(4, 'Administrator', '2022-09-11 15:24:26', 'Update Purok InfoPurok San Gabriel 1'),
(5, 'Administrator', '2022-09-11 15:25:23', 'Update Purok InfoPurok San Gabriel'),
(6, 'Administrator', '2022-09-11 15:26:38', 'Added Purok Leader Purok San Gabriel'),
(16, 'Administrator', '2022-09-17 13:25:32', 'Added New User123 1231'),
(17, 'Administrator', '2022-09-17 13:25:48', 'Update Usershark802'),
(18, 'Administrator', '2022-09-17 13:47:46', 'Added New Usertest user 123 test '),
(19, 'Administrator', '2022-09-17 13:48:56', 'Update User'),
(20, 'Administrator', '2022-09-17 13:53:29', 'Update User'),
(22, 'Administrator', '2022-09-17 13:57:35', 'Update User'),
(23, 'Administrator', '2022-09-17 13:58:30', 'Update User'),
(24, 'Administrator', '2022-09-17 13:59:29', 'Update User'),
(25, 'Administrator', '2022-09-17 14:00:21', 'Update User'),
(30, 'Administrator', '2022-09-17 14:26:00', 'Added Senior Citizen named rabago, jonna Q'),
(31, 'Administrator', '2022-09-17 14:26:45', 'Added Senior Citizen named Cantiller, Kristasl Q.'),
(32, 'Administrator', '2022-09-17 14:28:34', 'Added Senior Citizen named ,  '),
(33, 'Administrator', '2022-09-17 15:39:00', 'Added New Userbrandon martin'),
(34, 'Administrator', '2022-09-17 16:33:03', 'Added Purok Leader '),
(35, 'Administrator', '2022-09-17 16:33:12', 'Added Purok Leader purok rosas'),
(36, 'Administrator', '2022-09-17 16:37:28', 'Added Purok Leader purok rosas'),
(37, 'Administrator', '2022-09-19 09:28:35', 'Added Purok Leader santan'),
(38, 'Administrator', '2022-09-22 09:47:12', 'Added Senior Citizen named brandon, martin Q.'),
(39, 'Administrator', '2022-09-22 09:52:48', 'Added Senior Citizen named brandon, martin Q.'),
(40, 'Administrator', '2022-09-22 09:54:39', 'Added Senior Citizen named ,  '),
(41, 'Administrator', '2022-09-22 09:54:48', 'Added Senior Citizen named ,  '),
(42, 'Administrator', '2022-09-22 09:54:54', 'Added Senior Citizen named ,  '),
(43, 'Administrator', '2022-09-22 09:55:01', 'Added Senior Citizen named ,  '),
(44, 'Administrator', '2022-09-22 10:07:06', 'Added Senior Citizen named brandon, martin Q.'),
(45, 'Administrator', '2022-09-22 10:15:28', 'Added Senior Citizen named Cantiller, Kristal Q.'),
(46, 'Administrator', '2022-09-22 10:28:50', 'Added Permit with business name of '),
(47, 'Administrator', '2022-09-22 11:50:50', 'Added Senior Citizen named brandon, martin Q.'),
(48, 'Administrator', '2022-09-22 11:55:31', 'Added Senior Citizen named brandon, martin Q.'),
(49, 'Administrator', '2022-09-27 17:39:46', 'Added Senior Citizen named Cantiller, kristal jane Q.'),
(50, 'Administrator', '2022-09-27 17:42:59', 'Added New UserTimbad Judith'),
(51, 'Administrator', '2022-09-28 10:30:44', 'Added New UserCantiller kristal'),
(52, 'Administrator', '2022-09-29 06:16:11', 'Added Senior Citizen named Rabago, Joanna A.'),
(53, 'Administrator', '2022-10-07 20:25:46', 'Added Purok Leader Purok Rosas'),
(54, 'Administrator', '2022-10-07 20:28:10', 'Added Purok Leader Purok Hi-way'),
(55, 'Administrator', '2022-10-07 20:30:05', 'Added Purok Leader Purok San Gabriel'),
(56, 'Administrator', '2022-10-07 20:31:15', 'Added Purok Leader Purok Rosal I'),
(57, 'Administrator', '2022-10-07 20:31:17', 'Added Purok Leader Purok Rosal I'),
(58, 'Administrator', '2022-10-07 20:31:18', 'Added Purok Leader Purok Rosal I'),
(59, 'Administrator', '2022-10-07 20:31:20', 'Added Purok Leader Purok Rosal I'),
(60, 'Administrator', '2022-10-07 20:31:23', 'Added Purok Leader Purok Rosal I'),
(61, 'Administrator', '2022-10-07 20:31:24', 'Added Purok Leader Purok Rosal I'),
(62, 'Administrator', '2022-10-07 20:31:25', 'Added Purok Leader Purok Rosal I'),
(63, 'Administrator', '2022-10-07 20:31:26', 'Added Purok Leader Purok Rosal I'),
(64, 'Administrator', '2022-10-07 20:31:27', 'Added Purok Leader Purok Rosal I'),
(65, 'Administrator', '2022-10-07 20:31:29', 'Added Purok Leader Purok Rosal I'),
(66, 'Administrator', '2022-10-07 20:31:32', 'Added Purok Leader Purok Rosal I'),
(67, 'Administrator', '2022-10-07 20:32:35', 'Added Purok Leader Purok Rosal II'),
(68, 'Administrator', '2022-10-07 20:36:20', 'Added Purok Leader Purok Malacañang'),
(69, 'Administrator', '2022-10-07 20:36:31', 'Update Purok InfoPurok Rosas'),
(70, 'Administrator', '2022-10-07 20:41:00', 'Added Senior Citizen named Timbad, Judith M.'),
(71, 'Administrator', '2022-10-07 20:52:58', 'Added Senior Citizen named Timbad, Judith M.'),
(72, 'Administrator', '2022-10-07 21:03:55', 'Added New UserMartin Brandon'),
(73, 'Administrator', '2022-10-07 21:07:40', 'Added New UserMartin Brandon'),
(74, 'Administrator', '2022-10-07 21:12:26', 'Added Senior Citizen named Martin, Victorino charles Feria'),
(75, 'Administrator', '2022-10-08 07:51:52', 'Added New UserMartin Brandon'),
(76, 'Administrator', '2022-10-08 07:56:54', 'Update Purok InfoPurok Rosas'),
(77, 'Administrator', '2022-10-08 07:57:16', 'Update Purok InfoPurok San Gabriel'),
(78, 'Administrator', '2022-10-08 07:57:24', 'Update Purok InfoPurok Rosal I'),
(79, 'Administrator', '2022-10-08 07:57:36', 'Update Purok InfoPurok Rosal II'),
(80, 'Administrator', '2022-10-08 07:57:47', 'Update Purok InfoPurok Malacañang'),
(81, 'Administrator', '2022-10-08 08:18:16', 'Update Purok InfoPurok Rosas'),
(82, 'Administrator', '2022-10-08 13:45:27', 'Added Purok Leader cdfdfdfdfdf'),
(83, 'Administrator', '2022-10-08 14:30:30', 'Update Userbrandon.zega'),
(84, 'Administrator', '2022-10-08 15:04:09', 'Added Purok Leader puroksantan'),
(85, 'Administrator', '2022-10-08 15:04:48', 'Update Purok InfoPurok Rosas'),
(86, 'Administrator', '2022-10-08 15:13:33', 'Added Senior Citizen named java, doreen o.'),
(87, 'Administrator', '2022-10-08 19:06:42', 'Added Senior Citizen named Rabago, Joanna A.'),
(88, 'Administrator', '2022-10-09 10:20:43', 'Added New UserMartin Brandon'),
(89, 'Administrator', '2022-10-11 15:16:50', 'Added Senior Citizen named martin , brandon t'),
(90, 'Administrator', '2022-10-11 15:43:09', 'Added Senior Citizen named kristal, cantiller q.'),
(91, 'Administrator', '2022-10-11 18:33:19', 'Added Senior Citizen named java, doreen q'),
(92, 'Administrator', '2022-10-11 18:37:08', 'Added Senior Citizen named java, doreen Q.'),
(93, 'Administrator', '2022-10-11 18:43:28', 'Added Senior Citizen named Martin, Victorino charles Feria'),
(94, 'Administrator', '2022-10-12 09:02:12', 'Added Request named Martin, roselyn T.'),
(95, 'Administrator', '2022-10-12 12:26:43', ' Request Receive From Client named pallorina, mathew A.'),
(110, 'Administrator', '2022-10-14 17:57:28', 'Update Userkristal.cantiller'),
(111, 'Administrator', '2022-10-14 18:17:38', 'Added New UserCantiller Kristal'),
(112, 'New User Registration', '2022-10-14 18:33:21', ' User Registration test, test tst'),
(113, 'New User Registration', '2022-10-14 18:33:52', ' User Registration de los Reyes, Jason Villanueva'),
(114, 'New User Registration', '2022-10-14 18:48:40', ' User Registration de los Reyes, sses Villanueva'),
(115, 'New User Registration', '2022-10-14 20:37:01', ' User Registration martin, roselyn M.'),
(116, 'New User Registration', '2022-10-14 20:46:06', ' User Registration guillema, mirafe l'),
(117, 'New User Registration', '2022-10-15 08:00:21', ' User Registration martin, bryan T'),
(118, 'Administrator', '2022-10-16 06:52:13', 'Update Purok InfoPurok San Gabriel'),
(119, 'Administrator', '2022-10-21 14:57:30', 'Added Activity jxcxjcxkcjxkcjxk'),
(120, 'Administrator', '2022-10-21 21:30:35', 'Added Senior Citizen named Martin, Victorino charles Feria'),
(121, 'New User Registration', '2022-10-21 21:35:34', ' User Registration Martin, Brandon Zega Timbad'),
(122, 'New User Registration', '2022-10-21 21:42:32', ' User Registration Cantiller, Kristal Jane Quiñal'),
(123, 'Administrator', '2022-10-21 21:44:50', 'Added Senior Citizen named Rabago, Joanna Antinero'),
(124, 'Administrator', '2022-10-21 21:48:01', 'Added Senior Citizen named Pallorina, Mathew Marupok'),
(125, 'Administrator', '2022-10-21 21:53:20', 'Added Senior Citizen named Java, Ma Doreen Casisid');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficial`
--

CREATE TABLE `tblofficial` (
  `id` int(11) NOT NULL,
  `sPosition` varchar(50) NOT NULL,
  `completeName` text NOT NULL,
  `pcontact` varchar(20) NOT NULL,
  `paddress` text NOT NULL,
  `termStart` date NOT NULL,
  `termEnd` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblofficial`
--

INSERT INTO `tblofficial` (`id`, `sPosition`, `completeName`, `pcontact`, `paddress`, `termStart`, `termEnd`, `status`) VALUES
(4, 'Captain', 'Reymar Medes', '091234567890', 'Brgy. Tan-awan. Kabankalan City', '2018-05-22', '2022-05-22', 'Ongoing Term'),
(5, 'Kagawad(Ordinance)', 'Benjie Miranda', '09234567894', 'Brgy. Tan-awan. Kabankalan City', '2018-05-21', '2022-05-23', 'Ongoing Term'),
(6, 'Kagawad(Public Safety)', 'Rhodora Molina', '09452316722', 'Brgy. Tan-awan. Kabankalan City', '2018-05-22', '2022-05-22', 'Ongoing Term'),
(7, 'Kagawad(Tourism)', 'Ronilo Boyayot', '09456732456', 'Brgy. Tan-awan. Kabankalan City', '2018-05-22', '2022-05-22', 'Ongoing Term'),
(8, 'Kagawad(Budget & Finance)', 'Dondon Laurico', '09337869045', 'Brgy. Tan-awan. Kabankalan City', '2018-05-22', '2022-05-22', 'Ongoing Term'),
(9, 'Kagawad(Agriculture)', 'Joseph Soligan', '09227865784', 'Brgy.Tan-awan, Kabankalan City', '2018-05-22', '2022-05-22', 'Ongoing Term'),
(10, 'Kagawad(Education)', 'Idol Anono', '094567892341', 'Brgy. Tan-awan. Kabankalan City', '2018-05-22', '2022-05-23', 'Ongoing Term'),
(11, 'Kagawad(Infrastracture)', 'Rolly Torres', '09386784563', 'Brgy. Tan-awan. Kabankalan City', '2018-05-22', '2022-05-22', 'Ongoing Term');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermit`
--

CREATE TABLE `tblpermit` (
  `id` int(11) NOT NULL,
  `residentid` int(11) NOT NULL,
  `businessName` text NOT NULL,
  `businessAddress` text NOT NULL,
  `typeOfBusiness` varchar(50) NOT NULL,
  `orNo` int(11) NOT NULL,
  `samount` int(11) NOT NULL,
  `dateRecorded` date NOT NULL,
  `recordedBy` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `bdate` varchar(20) NOT NULL,
  `bplace` text NOT NULL,
  `age` int(11) NOT NULL,
  `barangay` varchar(120) NOT NULL,
  `zone` varchar(5) NOT NULL,
  `totalhousehold` int(5) NOT NULL,
  `differentlyabledperson` varchar(100) NOT NULL,
  `relationtohead` varchar(50) NOT NULL,
  `maritalstatus` varchar(50) NOT NULL,
  `bloodtype` varchar(10) NOT NULL,
  `civilstatus` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `monthlyincome` int(12) NOT NULL,
  `householdnum` int(11) NOT NULL,
  `lengthofstay` int(11) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `skills` text NOT NULL,
  `igpitID` int(11) NOT NULL,
  `philhealthNo` int(12) NOT NULL,
  `highestEducationalAttainment` varchar(50) NOT NULL,
  `houseOwnershipStatus` varchar(50) NOT NULL,
  `landOwnershipStatus` varchar(20) NOT NULL,
  `dwellingtype` varchar(20) NOT NULL,
  `waterUsage` varchar(20) NOT NULL,
  `lightningFacilities` varchar(20) NOT NULL,
  `sanitaryToilet` varchar(20) NOT NULL,
  `formerAddress` text NOT NULL,
  `remarks` text NOT NULL,
  `image` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `lname`, `fname`, `mname`, `bdate`, `bplace`, `age`, `barangay`, `zone`, `totalhousehold`, `differentlyabledperson`, `relationtohead`, `maritalstatus`, `bloodtype`, `civilstatus`, `occupation`, `monthlyincome`, `householdnum`, `lengthofstay`, `religion`, `nationality`, `gender`, `skills`, `igpitID`, `philhealthNo`, `highestEducationalAttainment`, `houseOwnershipStatus`, `landOwnershipStatus`, `dwellingtype`, `waterUsage`, `lightningFacilities`, `sanitaryToilet`, `formerAddress`, `remarks`, `image`, `username`, `password`) VALUES
(1, 'Suares', 'Jude', 'Reyes', '2021-10-12', 'Brgy. Mambato, Himamaylan City', 0, 'Brgy.Tan-awan', '1', 10, 'yes', 'Brother', 'single', '0+', 'Single', 'Programmer', 300000, 1, 5, 'Catholic', 'Filipino', 'Male', 'Programming', 1122, 2147483647, 'Doctorate degree', 'Live with Parents/Relatives', 'Care Taker', '2nd Option', 'Deep Well', '2147483647', 'Water-sealed', 'brgy. enlcaro', 'None', '1634804844819_[Complete] Laravel Ecommerce Project with Source Code.png', 'jude', 'jude123');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`id`, `name`, `username`, `password`) VALUES
(1, 'Adones Evangelista', 'adones', 'adones123');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `firstname` varchar(2252) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `firstname`, `lastname`, `type`) VALUES
(14, 'brandon.martin', '81dc9bdb52d04dc20036dbd8313ed055', 'Brandon', 'Martin', 'administrator'),
(15, 'kristal.cantiller', '26a050b5fca66e78e03f753802b51849', 'Kristal', 'Cantiller', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tblzone`
--

CREATE TABLE `tblzone` (
  `id` int(5) NOT NULL,
  `zone` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblzone`
--

INSERT INTO `tblzone` (`id`, `zone`, `username`, `password`) VALUES
(0, '051820', 'jude', 'jude');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pension`
--
ALTER TABLE `pension`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senior_citizen`
--
ALTER TABLE `senior_citizen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblactivity`
--
ALTER TABLE `tblactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblactivityphoto`
--
ALTER TABLE `tblactivityphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblotter`
--
ALTER TABLE `tblblotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclearance`
--
ALTER TABLE `tblclearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficial`
--
ALTER TABLE `tblofficial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpermit`
--
ALTER TABLE `tblpermit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblzone`
--
ALTER TABLE `tblzone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pension`
--
ALTER TABLE `pension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `senior_citizen`
--
ALTER TABLE `senior_citizen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tblactivity`
--
ALTER TABLE `tblactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblactivityphoto`
--
ALTER TABLE `tblactivityphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclearance`
--
ALTER TABLE `tblclearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tblofficial`
--
ALTER TABLE `tblofficial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpermit`
--
ALTER TABLE `tblpermit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
