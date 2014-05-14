-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2014 at 08:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wlux_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `study_general`
--

CREATE TABLE IF NOT EXISTS `study_general` (
  `studyId` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique ID of a study configuration',
  `ownerId` bigint(20) unsigned NOT NULL COMMENT 'The account to which the study belongs. The value is the user_accounts:accountId of the owner.',
  `studyName` varchar(127) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'The human-readable name of the study.',
  `studyDescription` longtext COLLATE utf8_unicode_ci COMMENT 'Free text description of the study.',
  `researcherOrg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Organization name listed as contact info for the researcher who is the primary (public) contact for this study.',
  `researcherFirstName` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'First name for researcher who is the primary (public) contact for this study.',
  `researcherLastName` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Last name for the researcher who is the primary (public) contact for this study.',
  `researcherEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Contact email for the researcher who is the primary (public) contact for this study.',
  `researcherAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mailing addres for the researcher who is the primary (public) contact for this study.',
  `ethicsBoardEmail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Contact email for the ethics board / institutional review board who approved this studys procedures.',
  `defaultTimeZone` enum('UTC+00 Europe/London','UTC+01 Europe/Berlin','UTC+02 Europe/Kiev','UTC+03 Asia/Riyadh','UTC+03:30 Asia/Tehran','UTC+04 Europe/Moscow','UTC+04:30 Asia/Kabul','UTC+05 Indian/Maldives','UTC+05:30 Asia/Calcutta','UTC+05:45 Asia/Kathmandu','UTC+06 Indian/Chagos','UTC+06:30 Asia/Rangoon','UTC+07 Asia/Bangkok','UTC+08 Asia/Brunei','UTC+08:45 Australia/Eucla','UTC+09 Asia/Tokyo','UTC+09:30 Australia/Adelaide','UTC+10 Australia/Melbourne','UTC+10:30 Australia/Lord_Howe','UTC+11 Pacific/Pohnpei','UTC+11:30 Pacific/Norfolk','UTC+12 Asia/Kamchatka','UTC+12:45 Pacific/Chatham','UTC+13 Pacific/Tongatapu','UTC+14 Pacific/Kiritimati','UTC−01 America/Scoresbysund','UTC−02 America/Atlantic islands','UTC−03 America/Argentina/Mendoza','UTC−03:30 Canada/Newfoundland','UTC−04 America/Halifax','UTC−04:30 America/Caracas','UTC−05 America/New_York','UTC−06 America/Chicago','UTC−07 America/Denver','UTC−08 America/Los_Angeles','UTC−09 America/Anchorage','UTC−09:30 Pacific/Marquesas','UTC−10 America/Adak','UTC−11 Pacific/Midway') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UTC−08 America/Los_Angeles' COMMENT 'Default time zone to use for this account',
  `defaultVariationMethod` enum('singleRandom') COLLATE utf8_unicode_ci DEFAULT 'singleRandom' COMMENT 'Describes how IV levels are selected during a participant session.',
  `defaultTaskBarRoot` enum('wlux','client') COLLATE utf8_unicode_ci DEFAULT 'wlux' COMMENT 'The URL root path to use for the task bar CSS.',
  `defaultTaskBarCssPath` varchar(1024) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The path to use for the task bar CSS from the specified root path.',
  `defaultVariationRoot` enum('wlux','client') COLLATE utf8_unicode_ci DEFAULT 'wlux' COMMENT 'The URL root path to use for the variation CSS files.',
  `defaultVariationCssPath` varchar(1024) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The path to use for the variation CSS files from the specified root path.',
  `defaultExitButtonText` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Exit task' COMMENT 'Text to display on the button that ends the task on the client site and returns to the page desribed by the taskReturnUrl.',
  `defaultTabShowText` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Show' COMMENT 'Text to display on the SHOW button of the the task bar displayed on the client site during a task.',
  `defaultTabHideText` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Hide' COMMENT 'Text to display on the HIDE button of the the task bar displayed on the client site during a task.',
  `clientTimeStampFormat` enum('default') COLLATE utf8_unicode_ci DEFAULT 'default' COMMENT 'The formula to use to interpret the client time stamp sent to the log_transition file.',
  `studyStatus` enum('draft','scheduled','completed','archived') COLLATE utf8_unicode_ci DEFAULT 'draft' COMMENT 'The current state of this study.',
  `dateCreated` datetime NOT NULL COMMENT 'The date the record was created in server local time.',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'The date the record was created in server local time.',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'When true, the record is no longer available to users or computations',
  PRIMARY KEY (`studyId`),
  UNIQUE KEY `studyId` (`studyId`),
  UNIQUE KEY `studyName` (`studyName`),
  KEY `studyId_2` (`studyId`),
  KEY `studyName_2` (`studyName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Describes the general characteristics of a study.' AUTO_INCREMENT=8890 ;

--
-- Dumping data for table `study_general`
--

INSERT INTO `study_general` (`studyId`, `ownerId`, `studyName`, `studyDescription`, `researcherOrg`, `researcherFirstName`, `researcherLastName`, `researcherEmail`, `researcherAddress`, `ethicsBoardEmail`, `defaultTimeZone`, `defaultVariationMethod`, `defaultTaskBarRoot`, `defaultTaskBarCssPath`, `defaultVariationRoot`, `defaultVariationCssPath`, `defaultExitButtonText`, `defaultTabShowText`, `defaultTabHideText`, `clientTimeStampFormat`, `studyStatus`, `dateCreated`, `dateModified`, `deleted`) VALUES
(1234, 2, 'Test study 1', 'This is a test study used while developing new code.', 'Ibuxl', 'Default', 'Researcher', 'researcher@ibuxl.uw.edu', 'N/A', NULL, 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'scheduled', '2014-04-25 16:51:50', '2014-04-28 22:39:32', 0),
(1236, 2, 'Elizabeth', 'This is a test of the emergency broadcast system.', 'UW', 'User', 'April', 'may@june.com', '123 July St', 'ethics@uw.edu', 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'archived', '2014-04-25 16:51:50', '2014-04-28 22:39:46', 0),
(4567, 2, 'Another Test', 'This is a test study used during development', 'IBUXL', 'Default', 'Researcher', 'researcher@ibuxl.uw.edu', 'N/A', NULL, 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'completed', '2014-04-25 16:51:50', '2014-04-28 22:40:08', 0),
(8889, 3, 'Jan', 'We are making progress.', 'UW', 'August', 'September', 'october@november.edu', '123 December Ave', 'ethics@uw.edu', 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'draft', '2014-04-25 16:51:50', '2014-04-25 16:51:50', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
