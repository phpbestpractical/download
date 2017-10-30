-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 02:06 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dark`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `user_agent`, `timestamp`, `data`) VALUES
('1b6fa1b44a15edd1a223b78e4d7a52b00cfb7760', '::1', '', 1499584730, '__ci_last_regenerate|i:1499584686;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('2630b870e7c758a8c5b78cb5253214fa4a7dd505', '::1', '', 1499584631, '__ci_last_regenerate|i:1499584345;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('201947aa28067121f535495a807444a3293f53bc', '::1', '', 1499584170, '__ci_last_regenerate|i:1499583880;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('c378edba86cce65a036d456c801e14da83d6f196', '::1', '', 1499583209, '__ci_last_regenerate|i:1499583200;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('650ab0e1b81863d89c1b756e9df56b0bf4dd8887', '::1', '', 1499583019, '__ci_last_regenerate|i:1499582867;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('e6b98c5d712f8406f3abb3c4d90f60cb8b31e50a', '::1', '', 1499582812, '__ci_last_regenerate|i:1499582551;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('9d3a9d27e8e14ddebdad6d79057f172317bc3392', '::1', '', 1499575223, '__ci_last_regenerate|i:1499574894;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('1453b6615d493d4a0124f6da40f99e94cb7548af', '::1', '', 1499575286, '__ci_last_regenerate|i:1499575286;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('40c9f0f23e81fea84d13d100f9cf8f334ef33467', '::1', '', 1499575287, '__ci_last_regenerate|i:1499575287;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('093eeb941a75a3eaa1718863ba6e4c5d828e01e8', '::1', '', 1499575287, '__ci_last_regenerate|i:1499575287;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('2f5530f7df0d1635125fcbacf120c38b784b1621', '::1', '', 1499575287, '__ci_last_regenerate|i:1499575287;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('7201a83ee590194026282fe0395b5744c21e1331', '::1', '', 1499575556, '__ci_last_regenerate|i:1499575287;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('cf13fffa94d501ca55aa63035bdd7276afa080fa', '::1', '', 1499575840, '__ci_last_regenerate|i:1499575609;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('ff5b37a0dee676c2a83e25d3da7f95005a1629fe', '::1', '', 1499576048, '__ci_last_regenerate|i:1499576006;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;flash_success_msg|s:25:"Store update Successfully";__ci_vars|a:1:{s:17:"flash_success_msg";s:3:"old";}'),
('e081e8013d86a4a5292544a69bf983e1a1c84c76', '::1', '', 1499576913, '__ci_last_regenerate|i:1499576613;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('8f2c7b817aa63984891cb37a61ac13da4a3fb220', '::1', '', 1499577273, '__ci_last_regenerate|i:1499576975;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('7c510673a08af3a09d98e4b527b5fe39b7978e27', '::1', '', 1499580770, '__ci_last_regenerate|i:1499577277;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('40d50b07ad0f9e55a7f78503499977ec962d0eb1', '::1', '', 1499580892, '__ci_last_regenerate|i:1499580786;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('1f03a6d248f13072c26ce2faea8455fdeff659c4', '::1', '', 1499582128, '__ci_last_regenerate|i:1499581851;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;'),
('97c5ee059d8c2e22ba3603b66c7aa9f36ee604f8', '::1', '', 1499582430, '__ci_last_regenerate|i:1499582217;username|s:5:"admin";id|s:1:"1";is_logged_in|b:1;');

-- --------------------------------------------------------

--
-- Table structure for table `fl_account`
--

CREATE TABLE `fl_account` (
  `AccountID` int(11) NOT NULL,
  `AccountName` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_account`
--

INSERT INTO `fl_account` (`AccountID`, `AccountName`, `Description`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 'Arthisoft', ' This is test account description', 1, 1, 0, '2017-06-15 04:55:29', 0, '0000-00-00 00:00:00', ''),
(3, 'fbdfb', 'dfbsbfbf', 0, 1, 0, '2017-06-26 17:50:29', 0, '2017-06-27 15:57:59', ''),
(5, 'first febricsdv', 'scsasvv sdvsdv', 1, 1, 0, '2017-06-27 15:56:43', 0, '2017-06-27 15:57:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_acl`
--

CREATE TABLE `fl_acl` (
  `ACLID` int(11) NOT NULL,
  `PersonActionID` int(11) NOT NULL,
  `PersonRoleID` int(11) NOT NULL,
  `Allow` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_activitylog`
--

CREATE TABLE `fl_activitylog` (
  `ActivityLogID` int(11) NOT NULL,
  `ActivityLogTypeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_activitylogtype`
--

CREATE TABLE `fl_activitylogtype` (
  `ActivityLogTypeID` int(11) NOT NULL,
  `SystemKeyword` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Enabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_adstype`
--

CREATE TABLE `fl_adstype` (
  `AdsTypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_adstype`
--

INSERT INTO `fl_adstype` (`AdsTypeID`, `Name`, `Description`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 'Alert', 'This is yesy2 type descrioption', 1, 1, 0, '2017-06-15 04:29:57', 0, '2017-06-26 18:10:10', ''),
(2, 'Banner Ad', 'This is yesy2 type descrioption', 1, 1, 0, '2017-06-15 04:29:57', 0, '0000-00-00 00:00:00', ''),
(3, 'Popup', 'This is yesy2 type descrioption', 1, 1, 0, '2017-06-15 04:29:57', 0, '2017-06-27 15:58:35', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_category`
--

CREATE TABLE `fl_category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_category`
--

INSERT INTO `fl_category` (`CategoryID`, `Name`, `Description`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 'test', 'test description', 1, 1, 1, '2017-06-13 04:13:13', 2, '2017-06-13 11:26:21', ''),
(3, 'test2', 'tesing comment', 1, 1, 0, '2017-06-14 04:02:45', 0, '0000-00-00 00:00:00', ''),
(6, 'asdvds', 'dasvdvsdDASV', 0, 1, 0, '2017-06-14 18:00:40', 0, '2017-06-26 18:10:40', ''),
(7, 'sasdv', 'sddav', 1, 1, 0, '2017-06-14 18:01:21', 0, '2017-06-18 07:28:59', ''),
(8, 'aSCSC', 'ASSCA', 0, 1, 0, '2017-06-14 18:03:39', 0, '0000-00-00 00:00:00', ''),
(9, 'test9', 'test 9 desc', 0, 1, 0, '2017-06-14 18:04:22', 0, '2017-06-15 04:16:23', ''),
(10, 'tests1', 'test2', 1, 1, 0, '2017-06-18 07:37:35', 0, '2017-06-27 16:00:22', ''),
(12, 'SACDSV', 'DSVADV', 1, 1, 0, '2017-06-26 18:10:31', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_displaytype`
--

CREATE TABLE `fl_displaytype` (
  `DisplayTypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_displaytype`
--

INSERT INTO `fl_displaytype` (`DisplayTypeID`, `Name`, `Description`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 'efdv', 'dsvsdav', 1, 1, 0, '2017-06-18 07:35:55', 0, '0000-00-00 00:00:00', ''),
(2, 'asdvvdsdavdv1', 'sdvvdsda1', 0, 1, 0, '2017-06-18 07:36:11', 0, '2017-06-27 16:06:35', ''),
(4, 'ascas', 'assccas', 0, 1, 0, '2017-06-18 07:40:09', 0, '0000-00-00 00:00:00', ''),
(5, 'asCS', 'ASCS', 1, 1, 0, '2017-06-26 18:12:39', 0, '2017-06-27 16:06:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_person`
--

CREATE TABLE `fl_person` (
  `PersonID` int(11) NOT NULL,
  `PersonGUID` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `SaltKey` int(11) NOT NULL,
  `Avatar` varchar(255) NOT NULL,
  `LanguageID` int(11) NOT NULL,
  `IsAdmin` tinyint(4) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IpAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_person`
--

INSERT INTO `fl_person` (`PersonID`, `PersonGUID`, `Email`, `Username`, `PasswordHash`, `SaltKey`, `Avatar`, `LanguageID`, `IsAdmin`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IpAddress`) VALUES
(1, '1365', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '', 0, 0, 0, 0, 0, '2017-06-17 10:21:02', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_service`
--

CREATE TABLE `fl_service` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(255) NOT NULL,
  `DeviceType` int(11) NOT NULL,
  `AppTypeID` int(11) NOT NULL,
  `PackageName` varchar(255) NOT NULL,
  `MessageText` text NOT NULL,
  `LogoImage` varchar(255) DEFAULT NULL,
  `BannerImage` varchar(255) DEFAULT NULL,
  `BannerAdImage` varchar(255) DEFAULT NULL,
  `FullAdImage` varchar(255) DEFAULT NULL,
  `PlayStoreImageURL` varchar(255) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_service`
--

INSERT INTO `fl_service` (`ServiceID`, `ServiceName`, `DeviceType`, `AppTypeID`, `PackageName`, `MessageText`, `LogoImage`, `BannerImage`, `BannerAdImage`, `FullAdImage`, `PlayStoreImageURL`, `AccountID`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 'Fairy Salon', 2, 2, 'test package', 'asasscs dasasc', 'dff20a95185041acce06b335d3914c42.jpg', '3d79ccf33e4084acdc29f6f0affe1354.jpg', '2cc582e77797e238eaddd01e15b047c4.jpg', '9b85c7eae12bd61e6c2a1ef76e55d8ab.jpg', 'google.com', 1, 0, 0, 0, '2017-06-27 16:13:14', 0, '0000-00-00 00:00:00', ''),
(3, 'Test2', 1, 1, 'test pckage', 'test desc', 'f78a3f268c0691df1788182152b325ff.jpg', '388a3a86f216b3f29765ab703447c5d5.png', 'cc154a784de234338339589050bb5e13.png', 'f49b0ceb098fcc29eb08b9d7f0d53e94.png', 'www.h2e.com', 1, 0, 0, 0, '2017-06-27 16:15:36', 0, '0000-00-00 00:00:00', ''),
(4, 'Test5', 1, 1, 'ascssc', 'ascscs', '', '', '', '', 'asccsc', 3, 0, 0, 0, '2017-07-09 07:12:18', 0, '0000-00-00 00:00:00', ''),
(5, 'Test4', 1, 1, 'dsvadvd', 'dsvavdvdv', '', '', '', '', '', 1, 1, 0, 0, '2017-07-09 07:12:09', 0, '0000-00-00 00:00:00', ''),
(6, 'Test3', 1, 1, 'dsvavdv u', 'dasvddv u', '', '', '', '', 'dsvvdasv', 5, 1, 0, 0, '2017-07-09 07:11:48', 0, '0000-00-00 00:00:00', ''),
(7, '', 1, 1, '', '', '', '', '', '', '', 1, 0, 0, 0, '2017-07-09 07:18:28', 0, '0000-00-00 00:00:00', ''),
(8, '', 1, 1, '', '', '', '', '', '', '', 1, 0, 0, 0, '2017-07-09 07:18:39', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_serviceaccounttype`
--

CREATE TABLE `fl_serviceaccounttype` (
  `AccountTypeID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_serviceaccounttype`
--

INSERT INTO `fl_serviceaccounttype` (`AccountTypeID`, `ServiceID`, `AccountID`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(20, 6, 1, 1, 0, 0, '2017-07-09 07:11:48', 0, '0000-00-00 00:00:00', ''),
(21, 6, 5, 1, 0, 0, '2017-07-09 07:11:48', 0, '0000-00-00 00:00:00', ''),
(22, 5, 3, 1, 0, 0, '2017-07-09 07:12:09', 0, '0000-00-00 00:00:00', ''),
(23, 4, 1, 1, 0, 0, '2017-07-09 07:12:18', 0, '0000-00-00 00:00:00', ''),
(24, 4, 5, 1, 0, 0, '2017-07-09 07:12:18', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_serviceadsdetail`
--

CREATE TABLE `fl_serviceadsdetail` (
  `ServiceAdsDetailID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `AdsTypeID` int(11) NOT NULL,
  `DeviceTypeID` int(11) NOT NULL,
  `AppTypeID` int(11) NOT NULL,
  `OrderBy` int(11) NOT NULL,
  `Seconds` int(11) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_serviceadsdetail`
--

INSERT INTO `fl_serviceadsdetail` (`ServiceAdsDetailID`, `ServiceID`, `AccountID`, `AdsTypeID`, `DeviceTypeID`, `AppTypeID`, `OrderBy`, `Seconds`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 1, 1, 2, 1, 1, 3, 25, 1, 1, 0, '2017-06-23 00:00:00', 0, '2017-06-23 04:00:00', ''),
(3, 3, 2, 2, 2, 2, 0, 0, 1, 0, 0, '2017-06-26 17:19:29', 0, '0000-00-00 00:00:00', ''),
(4, 3, 1, 1, 1, 1, 0, 0, 1, 0, 0, '2017-06-26 18:12:09', 0, '0000-00-00 00:00:00', ''),
(5, 1, 1, 3, 1, 1, 3, 25, 1, 0, 0, '2017-06-27 04:19:33', 0, '0000-00-00 00:00:00', ''),
(6, 1, 1, 1, 2, 1, 0, 0, 1, 0, 0, '2017-06-26 17:18:36', 0, '0000-00-00 00:00:00', ''),
(7, 3, 1, 1, 2, 1, 0, 0, 1, 0, 0, '2017-07-09 05:22:02', 0, '0000-00-00 00:00:00', ''),
(8, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, '2017-07-09 05:44:58', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_servicecategory`
--

CREATE TABLE `fl_servicecategory` (
  `ServiceCategoryID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_servicecategory`
--

INSERT INTO `fl_servicecategory` (`ServiceCategoryID`, `ServiceID`, `CategoryID`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(23, 6, 3, 1, 0, 0, '2017-07-09 07:11:48', 0, '0000-00-00 00:00:00', ''),
(24, 6, 8, 1, 0, 0, '2017-07-09 07:11:48', 0, '0000-00-00 00:00:00', ''),
(25, 5, 8, 1, 0, 0, '2017-07-09 07:12:09', 0, '0000-00-00 00:00:00', ''),
(26, 5, 10, 1, 0, 0, '2017-07-09 07:12:09', 0, '0000-00-00 00:00:00', ''),
(27, 4, 1, 1, 0, 0, '2017-07-09 07:12:18', 0, '0000-00-00 00:00:00', ''),
(28, 4, 9, 1, 0, 0, '2017-07-09 07:12:18', 0, '0000-00-00 00:00:00', ''),
(29, 4, 10, 1, 0, 0, '2017-07-09 07:12:18', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `fl_setting`
--

CREATE TABLE `fl_setting` (
  `SettingID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Value` int(255) NOT NULL,
  `Description` int(11) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IpAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fl_store`
--

CREATE TABLE `fl_store` (
  `StoreID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `StoreURL` varchar(255) NOT NULL,
  `IsActive` tinyint(2) NOT NULL,
  `IsDeleted` tinyint(2) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifiedDate` datetime NOT NULL,
  `IPAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fl_store`
--

INSERT INTO `fl_store` (`StoreID`, `Name`, `Description`, `StoreURL`, `IsActive`, `IsDeleted`, `CreatedBy`, `CreatedDate`, `ModifiedBy`, `ModifiedDate`, `IPAddress`) VALUES
(1, 'SASCS', 'AScssc', 'asCSC', 1, 1, 0, '2017-06-26 18:10:59', 0, '2017-06-27 16:00:50', ''),
(2, 'dsfdv1', 'asfdvc ssdd1', 'sdvasdvdvv davdd1', 1, 1, 0, '2017-06-27 16:10:11', 0, '2017-07-09 06:54:08', ''),
(3, 'sasv', 'dsvad', 'dasvvds', 1, 1, 0, '2017-07-09 06:53:37', 0, '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_activity_idx` (`timestamp`);

--
-- Indexes for table `fl_account`
--
ALTER TABLE `fl_account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `fl_acl`
--
ALTER TABLE `fl_acl`
  ADD PRIMARY KEY (`ACLID`);

--
-- Indexes for table `fl_activitylog`
--
ALTER TABLE `fl_activitylog`
  ADD PRIMARY KEY (`ActivityLogID`);

--
-- Indexes for table `fl_activitylogtype`
--
ALTER TABLE `fl_activitylogtype`
  ADD PRIMARY KEY (`ActivityLogTypeID`);

--
-- Indexes for table `fl_adstype`
--
ALTER TABLE `fl_adstype`
  ADD PRIMARY KEY (`AdsTypeID`);

--
-- Indexes for table `fl_category`
--
ALTER TABLE `fl_category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `fl_displaytype`
--
ALTER TABLE `fl_displaytype`
  ADD PRIMARY KEY (`DisplayTypeID`);

--
-- Indexes for table `fl_person`
--
ALTER TABLE `fl_person`
  ADD PRIMARY KEY (`PersonID`);

--
-- Indexes for table `fl_service`
--
ALTER TABLE `fl_service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `fl_serviceaccounttype`
--
ALTER TABLE `fl_serviceaccounttype`
  ADD PRIMARY KEY (`AccountTypeID`);

--
-- Indexes for table `fl_serviceadsdetail`
--
ALTER TABLE `fl_serviceadsdetail`
  ADD PRIMARY KEY (`ServiceAdsDetailID`);

--
-- Indexes for table `fl_servicecategory`
--
ALTER TABLE `fl_servicecategory`
  ADD PRIMARY KEY (`ServiceCategoryID`);

--
-- Indexes for table `fl_setting`
--
ALTER TABLE `fl_setting`
  ADD PRIMARY KEY (`SettingID`);

--
-- Indexes for table `fl_store`
--
ALTER TABLE `fl_store`
  ADD PRIMARY KEY (`StoreID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fl_account`
--
ALTER TABLE `fl_account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fl_acl`
--
ALTER TABLE `fl_acl`
  MODIFY `ACLID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fl_activitylog`
--
ALTER TABLE `fl_activitylog`
  MODIFY `ActivityLogID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fl_activitylogtype`
--
ALTER TABLE `fl_activitylogtype`
  MODIFY `ActivityLogTypeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fl_adstype`
--
ALTER TABLE `fl_adstype`
  MODIFY `AdsTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fl_category`
--
ALTER TABLE `fl_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `fl_displaytype`
--
ALTER TABLE `fl_displaytype`
  MODIFY `DisplayTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fl_person`
--
ALTER TABLE `fl_person`
  MODIFY `PersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fl_service`
--
ALTER TABLE `fl_service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fl_serviceaccounttype`
--
ALTER TABLE `fl_serviceaccounttype`
  MODIFY `AccountTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `fl_serviceadsdetail`
--
ALTER TABLE `fl_serviceadsdetail`
  MODIFY `ServiceAdsDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fl_servicecategory`
--
ALTER TABLE `fl_servicecategory`
  MODIFY `ServiceCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `fl_setting`
--
ALTER TABLE `fl_setting`
  MODIFY `SettingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fl_store`
--
ALTER TABLE `fl_store`
  MODIFY `StoreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
