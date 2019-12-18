-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 10:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaboutus`
--

CREATE TABLE `tblaboutus` (
  `AboutusId` int(11) NOT NULL,
  `AboutTitle` varchar(200) NOT NULL,
  `AboutDescription` text NOT NULL,
  `AboutImage` varchar(200) DEFAULT NULL,
  `IsActive` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `IsDelete` enum('0','1') NOT NULL DEFAULT '0',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaboutus`
--

INSERT INTO `tblaboutus` (`AboutusId`, `AboutTitle`, `AboutDescription`, `AboutImage`, `IsActive`, `IsDelete`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Lorem Ipsum', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.</p>', '36672About.jpg', 'Active', '0', 1, '2019-12-18 05:00:00', 1, '2019-11-20 10:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminId` int(11) NOT NULL,
  `Admin_Type` varchar(255) NOT NULL COMMENT 'supadmin=''1'',subadmin=''2''',
  `FullName` varchar(255) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Address` varchar(400) NOT NULL,
  `ProfileImage` varchar(255) DEFAULT NULL,
  `AdminContact` varchar(13) NOT NULL,
  `PasswordResetCode` varchar(50) DEFAULT NULL,
  `IsActive` enum('Active','Inactive') NOT NULL,
  `IsDelete` enum('0','1') NOT NULL DEFAULT '0',
  `CreatedOn` date NOT NULL,
  `UpdatedOn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminId`, `Admin_Type`, `FullName`, `EmailAddress`, `Password`, `Address`, `ProfileImage`, `AdminContact`, `PasswordResetCode`, `IsActive`, `IsDelete`, `CreatedOn`, `UpdatedOn`) VALUES
(1, '1', 'Bluegrey admin1', 'bluegreyindia@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '91355Admin.jpg', '1234567890', 'JTJh8', 'Active', '0', '2019-07-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcartype`
--

CREATE TABLE `tblcartype` (
  `CarId` int(11) NOT NULL,
  `CarName` varchar(100) NOT NULL,
  `NumberOfSeat` int(11) NOT NULL,
  `CarType` varchar(100) NOT NULL,
  `AirCondition` enum('AC','Nonac') NOT NULL,
  `CarNumber` varchar(20) NOT NULL,
  `CarImage` varchar(200) NOT NULL,
  `IsActive` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `IsDelete` enum('0','1') NOT NULL DEFAULT '0',
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcartype`
--

INSERT INTO `tblcartype` (`CarId`, `CarName`, `NumberOfSeat`, `CarType`, `AirCondition`, `CarNumber`, `CarImage`, `IsActive`, `IsDelete`, `CreatedOn`, `UpdatedOn`) VALUES
(1, 'Swift', 5, 'Swift', 'AC', 'GJ23DF2411', '42621Car.jpg', 'Active', '0', '2019-11-27 05:00:00', '2019-11-27 10:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `ContactId` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `EmailAddress` varchar(30) NOT NULL,
  `ContactNumber` varchar(13) NOT NULL,
  `City` varchar(50) NOT NULL,
  `MessageDescription` text NOT NULL,
  `IsDelete` enum('0','1') NOT NULL DEFAULT '0',
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`ContactId`, `FullName`, `EmailAddress`, `ContactNumber`, `City`, `MessageDescription`, `IsDelete`, `CreatedOn`) VALUES
(1, 'Mitesh Patel', 'mitnp16@gmail.com', '1234567890', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '0', '2019-11-21 09:40:51'),
(2, 'mitesh patel', 'bluegreyindia@gmail.com', '9974616445', 'Vadodra', 'xscasavfasv', '0', '2019-12-18 05:00:00'),
(3, 'Hr Shah', 'bluegreyindia@gmail.com', '9974616445', 'Vadodra', 'sacfasasc', '0', '2019-12-18 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblemail_setting`
--

CREATE TABLE `tblemail_setting` (
  `email_setting_id` int(11) NOT NULL,
  `mailer` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_port` varchar(255) NOT NULL,
  `smtp_email` varchar(255) NOT NULL,
  `smtp_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemail_setting`
--

INSERT INTO `tblemail_setting` (`email_setting_id`, `mailer`, `smtp_host`, `smtp_port`, `smtp_email`, `smtp_password`) VALUES
(1, 'mail', 'smtp.sendgrid.net', '465', 'mitesh@bluegreytech.co.in', 'Mitesh@123'),
(2, 'sendmail', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblemail_template`
--

CREATE TABLE `tblemail_template` (
  `email_template_id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `from_address` varchar(255) NOT NULL,
  `reply_address` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemail_template`
--

INSERT INTO `tblemail_template` (`email_template_id`, `task`, `from_address`, `reply_address`, `subject`, `message`) VALUES
(1, 'User registration', 'bluegreyindia@gmail.com', 'bluegreyindia@gmail.com', 'User registration', '\r\n   <html>\r\n    <head>\r\n        <title>Welcome to {site_name}</title>\r\n       \r\n    </head>\r\n    <body>\r\n         <table cellspacing=\"0\" style=\"border: 2px; width: 500px; height: 70px;\">\r\n            <tr>\r\n                <td style=\"background: #49ab48;\"><img src=\"{image_url}/images/logo-wide.png\" alt=\"Chem Sam Logo\"></td>\r\n              \r\n            </tr>\r\n           \r\n        </table>\r\n      \r\n        <table cellspacing=\"0\" style=\"border: 2px; width: 500px; height: 400px;\">\r\n            <tr>\r\n                <td>Hello {username},</td>\r\n                \r\n            </tr>\r\n            <tr >\r\n               <td><p>Thanks you for joining with us!</p></td>\r\n            </tr>\r\n            <tr>\r\n               <td><p>Regard</p>\r\n               <p>Chem Sam Team,</p></td>\r\n            </tr>\r\n        </table>\r\n        <table cellspacing=\"0\" style=\"border: 2px; width: 500px; height: 50px;\">\r\n            <tr>\r\n                <td style=\"background: #000;\"><p style=\"color: #fff; text-align: center;\">Copyright © {year} Chemshem Virtual Classes. All Rights Reserved</p></td>\r\n              \r\n            </tr>\r\n           \r\n        </table>\r\n        \r\n    </body>\r\n</html>'),
(2, 'Forgot Password by admin', 'bluegreyindia@gmail.com', 'bluegreyindia@gmail.com', 'Forgot Password by admin', '\r\n<!DOCTYPE html>\r\n   <html>\r\n    <head>\r\n          <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n        <title>Welcome to {site_name}</title>\r\n       \r\n    </head>\r\n    <body>\r\n         <table cellspacing=\"0\" style=\"border: 2px; width: 500px; height: 70px;\">\r\n            <tr>\r\n                <td style=\"background: #eee; border-bottom: 1px solid #f88120;\"><img src=\"http://nyalkaran.bluegreytech.co.in/admin/default/images/logo/logo.png\" alt=\"Nyalkaran Group Logo\" style=\"width: 121px;\"></td>\r\n              \r\n            </tr>\r\n           \r\n        </table>\r\n\r\n      \r\n        <table cellspacing=\"0\" style=\"border: 2px; width: 500px; height: 400px;background: #eee;\">\r\n            <tr>\r\n                <td>Hello {username},</td>\r\n            </tr>\r\n            <tr >\r\n               <td><p>We were told that you forgot your password on {username}.</p>\r\n                \r\n                <p>To reeset your password,please click this link: <a>{reset_link}</a></p>\r\n                \r\n               </td>\r\n            </tr>\r\n            <tr>\r\n               <td><p>Regard,</p>\r\n               <p>Nyalkaran Group,</p></td>\r\n            </tr>\r\n        </table>\r\n        <table cellspacing=\"0\" style=\"border: 2px; width: 500px; height: 50px;\">\r\n            <tr>\r\n                <td style=\"background: #283f82;\"><p style=\"color: #fff; text-align: center;\">Copyright © {year} Nyalkaran Group. All Rights Reserved</p></td>\r\n              \r\n            </tr>\r\n           \r\n        </table>\r\n        \r\n    </body>\r\n</html>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tblsitesetting`
--

CREATE TABLE `tblsitesetting` (
  `SettingId` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `SiteName` varchar(200) NOT NULL,
  `SiteEmail` varchar(30) NOT NULL,
  `SiteContactNumber` varchar(13) NOT NULL,
  `OfficeAddress` varchar(400) NOT NULL,
  `OfficeTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsitesetting`
--

INSERT INTO `tblsitesetting` (`SettingId`, `FullName`, `SiteName`, `SiteEmail`, `SiteContactNumber`, `OfficeAddress`, `OfficeTime`) VALUES
(1, 'Yashdeep Travels', 'http://yashdeeptravels.bluegreytech.co.in', 'yashdeeptravels@gmail.com', '1234567890', '101 Radhey Flats, 13/14 Sumant Park, opp. Shrenik, Par Park, Akota, Vadodara, Gujarat 390020', '9:00 AM to 6:00 PM ');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `TestimonialId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `TetimonialDescription` text NOT NULL,
  `TestimonialImage` varchar(200) DEFAULT NULL,
  `IsActive` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `IsDelete` enum('0','1') NOT NULL DEFAULT '0',
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`TestimonialId`, `FirstName`, `LastName`, `TetimonialDescription`, `TestimonialImage`, `IsActive`, `IsDelete`, `CreatedOn`, `UpdatedOn`) VALUES
(1, 'Mitesh', 'Patel', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '', 'Active', '0', '2019-11-21 10:18:22', '2019-11-21 10:18:22'),
(2, 'Mit', 'Patel', '<p>dfdfthfthftfhf nnnnnnnnnnn</p>', '69322Testimonial.jpg', 'Active', '0', '2019-12-18 05:00:00', '2019-11-21 11:38:23'),
(3, 'trytrytr', 'rttrjurjutr', '<p>rturtutrutru</p>', '36452Testimonial.jpg', 'Active', '0', '2019-11-27 05:00:00', '2019-11-27 09:02:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaboutus`
--
ALTER TABLE `tblaboutus`
  ADD PRIMARY KEY (`AboutusId`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `tblcartype`
--
ALTER TABLE `tblcartype`
  ADD PRIMARY KEY (`CarId`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `tblemail_setting`
--
ALTER TABLE `tblemail_setting`
  ADD PRIMARY KEY (`email_setting_id`);

--
-- Indexes for table `tblemail_template`
--
ALTER TABLE `tblemail_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `tblsitesetting`
--
ALTER TABLE `tblsitesetting`
  ADD PRIMARY KEY (`SettingId`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`TestimonialId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaboutus`
--
ALTER TABLE `tblaboutus`
  MODIFY `AboutusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcartype`
--
ALTER TABLE `tblcartype`
  MODIFY `CarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblemail_setting`
--
ALTER TABLE `tblemail_setting`
  MODIFY `email_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemail_template`
--
ALTER TABLE `tblemail_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsitesetting`
--
ALTER TABLE `tblsitesetting`
  MODIFY `SettingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `TestimonialId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
