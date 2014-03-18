-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 01:51 AM
-- Server version: 5.5.33
-- PHP Version: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";

--
-- Database: `volcano`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `eStatus` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `tLastLogin` datetime NOT NULL,
  `vFromIP` varchar(15) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `username`, `password`, `name`, `country`, `eStatus`, `created_date`, `tLastLogin`, `vFromIP`) VALUES
(1, 'admin', 'admin', 'Eric', 'VN', 1, '2010-07-27 16:30:36', '2012-05-10 05:24:27', '122.169.32.189');

-- --------------------------------------------------------

--
-- Table structure for table `info_tbl`
--

CREATE TABLE `info_tbl` (
  `infoID` int(11) NOT NULL AUTO_INCREMENT,
  `info_key` varchar(50) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`infoID`),
  UNIQUE KEY `infoID` (`infoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `info_tbl`
--

INSERT INTO `info_tbl` (`infoID`, `info_key`, `info`) VALUES
(2, 'app_development', 'Honda; Yamaha; Suzuki'),
(3, 'web_development', 'audi; bmw; porsche'),
(4, 'design_and_more', 'Thongnhat; Giant;  Mini'),
(5, 'description', 'Volcano is a team of young and ambitious entrepreneurs, who have fire in the eyes and hunger in the gut. Together we build a team to develop new products and solve life problems. We hope to turn innovative ideas into real actions and create true values for as many people as we can.'),
(6, 'contact_email', 'eric.anhlhv@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `member_tbl`
--

CREATE TABLE `member_tbl` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `slot` int(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `member_tbl`
--

INSERT INTO `member_tbl` (`member_id`, `name`, `image_url`, `info`, `position`, `slot`) VALUES
(17, 'Thành Xinh Gái', 'member_17.png', 'Thành Xinh Gái', 'Coder', 9),
(18, 'Bình B&#432;&#7899;ng B&#7881;nh', 'member_18.png', 'Bình B&#432;&#7899;ng B&#7881;nh', 'Coder', 1),
(19, 'Khôi Khá Kh&#7849;m', 'member_19.png', 'Bình B&#432;&#7899;ng B&#7881;nh', 'FOUNDER/CEO', 6),
(20, 'Duy Duyên Dáng', 'member_20.png', 'Duy Duyên Dáng ', 'Coder', 4),
(21, 'Jokohama', 'member_21.png', 'Jokohama', 'Designer', 5),
(22, 'Tài Tí T&#7903;n', 'member_22.png', 'Tài Tí T&#7903;n', 'Coder', 8),
(23, 'Ngh&#297;a Ng&#7899; Ng&#7849;n', 'member_23.png', 'Ngh&#297;a Ng&#7899; Ng&#7849;n', 'Coder', 7),
(24, '&#272;&#259;ng &#272;&#7851;y &#272;à', 'member_24.png', '&#272;&#259;ng &#272;&#7851;y &#272;à', 'Coder', 3),
(25, 'Chi&#7871;n Ch&#7843;nh Ch&#7885;e', 'member_25.png', 'Chi&#7871;n Ch&#7843;nh Ch&#7885;e', 'Coder', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_tbl`
--

CREATE TABLE `project_tbl` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_tbl`
--

INSERT INTO `project_tbl` (`project_id`, `image_url`, `title`, `info`, `url`) VALUES
(2, 'project_2.png', 'Test', 'Test', 'http://ilu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `vDesc` varchar(255) NOT NULL DEFAULT '',
  `vName` varchar(255) NOT NULL DEFAULT '',
  `vValue` varchar(255) NOT NULL DEFAULT '',
  `vOrder` varchar(10) NOT NULL DEFAULT '0',
  `eStatus` enum('Active','Inactive','Deleted') NOT NULL DEFAULT 'Active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`vDesc`, `vName`, `vValue`, `vOrder`, `eStatus`) VALUES
('Main Site Title', 'site_title', ' ', '1', 'Active'),
('Admin Site Title', 'admin_title', ':: Site Control Panel for Admin', '2', 'Active'),
('Admin Email', 'ADMIN_EMAIL', ' ', '4', 'Active'),
('Site URL', 'SITE_URL', ' ', '', 'Active'),
('No Of Records Per Page (Admin Side)', 'RECLIMIT', '20', '', 'Active'),
('Company Country', 'xcart_country', 'USA', '', 'Active'),
('Name of the Site', 'SITE_NAME', ' ', '', 'Active');
