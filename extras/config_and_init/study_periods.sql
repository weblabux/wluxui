-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2014 at 01:58 AM
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

USE 'wlux_services';

--
-- Truncate table before insert `study_periods`
--

TRUNCATE TABLE `study_periods`;
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
