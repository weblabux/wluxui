-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2014 at 01:57 AM
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
-- Truncate table before insert `study_general`
--

TRUNCATE TABLE `study_general`;
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
