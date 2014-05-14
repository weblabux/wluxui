-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2014 at 08:05 PM
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
-- Table structure for table `study_periods`
--

CREATE TABLE IF NOT EXISTS `study_periods` (
  `studyPeriodId` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique record ID',
  `studyId` bigint(20) unsigned NOT NULL COMMENT 'Study ID (study_general:studyId of the study to which this schedule period belongs. Study owner is defined by the study ID in the study_general table.',
  `periodName` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The human-readable name of this study period.',
  `periodDescription` longtext COLLATE utf8_unicode_ci COMMENT 'Free text field to describe the study period.',
  `periodParticipantLimit` bigint(20) unsigned DEFAULT NULL COMMENT 'The maximum number of participant sessions to accept during this study period. -1 = no limit. This is the total number of sessions to allow: completed and partial.',
  `periodStartTime` datetime NOT NULL COMMENT 'Start time of this period. Participant sessions will be allowed when the current time is > this time. A time of 0 = the session starts immediately.',
  `periodEndTime` datetime NOT NULL COMMENT 'End time of this period. Participant sessions will be allowed when the current time is < this time. A time of 0 = the session runs forever.',
  `periodAnnouncementText` longtext COLLATE utf8_unicode_ci COMMENT 'Recruitment email text sent to periodEmailList when study opens.',
  `periodEmailList` longtext COLLATE utf8_unicode_ci COMMENT 'Comma-separated list of e-mail names',
  `periodTaskSequence` enum('sequential','random') COLLATE utf8_unicode_ci DEFAULT 'random' COMMENT 'Specifies the task order of tasks marked as programmed.',
  `periodStudyVariations` enum('singleRandom') COLLATE utf8_unicode_ci DEFAULT 'singleRandom' COMMENT 'For now. Future options could include: singleSequential,mulitpleRandom, multipleSequential, etc.)',
  `periodTimeZone` enum('UTC+00 Europe/London','UTC+01 Europe/Berlin','UTC+02 Europe/Kiev','UTC+03 Asia/Riyadh','UTC+03:30 Asia/Tehran','UTC+04 Europe/Moscow','UTC+04:30 Asia/Kabul','UTC+05 Indian/Maldives','UTC+05:30 Asia/Calcutta','UTC+05:45 Asia/Kathmandu','UTC+06 Indian/Chagos','UTC+06:30 Asia/Rangoon','UTC+07 Asia/Bangkok','UTC+08 Asia/Brunei','UTC+08:45 Australia/Eucla','UTC+09 Asia/Tokyo','UTC+09:30 Australia/Adelaide','UTC+10 Australia/Melbourne','UTC+10:30 Australia/Lord_Howe','UTC+11 Pacific/Pohnpei','UTC+11:30 Pacific/Norfolk','UTC+12 Asia/Kamchatka','UTC+12:45 Pacific/Chatham','UTC+13 Pacific/Tongatapu','UTC+14 Pacific/Kiritimati','UTC−01 America/Scoresbysund','UTC−02 America/Atlantic islands','UTC−03 America/Argentina/Mendoza','UTC−03:30 Canada/Newfoundland','UTC−04 America/Halifax','UTC−04:30 America/Caracas','UTC−05 America/New_York','UTC−06 America/Chicago','UTC−07 America/Denver','UTC−08 America/Los_Angeles','UTC−09 America/Anchorage','UTC−09:30 Pacific/Marquesas','UTC−10 America/Adak','UTC−11 Pacific/Midway') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UTC−08 America/Los_Angeles' COMMENT 'Defaults to study timezone value',
  `dateCreated` datetime NOT NULL COMMENT 'The date the record was created in server local time.',
  `dateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'The date the record was updated in server local time.',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'When true, the record is no longer available to users or computations',
  PRIMARY KEY (`studyPeriodId`),
  UNIQUE KEY `studyPeriodId` (`studyPeriodId`),
  KEY `studyPeriodId_2` (`studyPeriodId`),
  KEY `studyId_2` (`studyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Describes when a study can accept participants.' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `study_periods`
--

INSERT INTO `study_periods` (`studyPeriodId`, `studyId`, `periodName`, `periodDescription`, `periodParticipantLimit`, `periodStartTime`, `periodEndTime`, `periodAnnouncementText`, `periodEmailList`, `periodTaskSequence`, `periodStudyVariations`, `periodTimeZone`, `dateCreated`, `dateModified`, `deleted`) VALUES
(1, 1234, 'The first period', 'The first period of the test study', NULL, '2014-02-10 00:00:00', '2014-02-15 00:00:00', NULL, NULL, 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-04-25 16:51:50', 0),
(2, 1234, 'The second period', 'The first period of the test study', 500, '2014-02-17 00:00:00', '2014-02-22 00:00:00', NULL, NULL, 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-04-25 16:51:50', 0),
(3, 1236, 'Third Period', 'Third Period Test Data', 250, '2014-04-01 03:00:00', '2014-04-04 06:17:30', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-05-06 03:46:07', 0),
(4, 8889, 'Study', 'Third Period Test Data', 250, '2014-04-01 03:00:00', '2014-04-04 06:17:30', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-05-06 03:46:07', 0),
(5, 8889, 'Second Study', 'Third Period Test Data', 250, '2014-04-01 03:00:00', '2014-04-04 06:17:30', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-05-06 03:46:07', 0),
(6, 4567, 'The study', 'Third Period Test Data', 250, '2014-04-01 03:00:00', '2014-04-04 06:17:30', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-05-06 03:46:07', 0),
(7, 4567, 'The other Study', 'Third Period Test Data', 250, '2014-04-01 03:00:00', '2014-04-04 06:17:30', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-05-06 03:46:07', 0),
(8, 1234, 'The third period', 'The first period of the test study', 500, '2014-02-17 00:00:00', '2014-02-22 00:00:00', NULL, NULL, 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-04-25 16:51:50', 0),
(9, 1236, 'The fourth period', 'Third Period Test Data', 250, '2014-04-01 03:00:00', '2014-04-04 06:17:30', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', '2014-04-25 16:51:50', '2014-05-06 03:46:07', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
