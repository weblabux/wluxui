-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2014 at 10:15 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wlux_services`
--
USE wlux_services;

--
-- Loading developer study defs into table `study_general`
--

INSERT INTO `study_general` (`studyId`, `ownerId`, `studyName`, `studyDescription`, `researcherOrg`, `researcherFirstName`, `researcherLastName`, `researcherEmail`, `researcherAddress`, `ethicsBoardEmail`, `defaultTimeZone`, `defaultVariationMethod`, `defaultTaskBarRoot`, `defaultTaskBarCssPath`, `defaultVariationRoot`, `defaultVariationCssPath`, `defaultExitButtonText`, `defaultTabShowText`, `defaultTabHideText`, `clientTimeStampFormat`, `studyStatus`, `dateCreated`, `dateModified`) VALUES
(1234, 2, 'Test study 1', 'This is a test study used while developing new code.', 'Ibuxl', 'Default', 'Researcher', 'researcher@ibuxl.uw.edu', 'N/A', NULL, 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'draft', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(4567, 2, 'Another Test', 'This is a test study used during development', 'IBUXL', 'Default', 'Researcher', 'researcher@ibuxl.uw.edu', 'N/A', NULL, 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'draft', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(1236, 2, 'Elizabeth', 'This is a test of the emergency broadcast system.', 'UW', 'User', 'April', 'may@june.com', '123 July St', 'ethics@uw.edu', 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'draft', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(8889, 3, 'Jan', 'We are making progress.', 'UW', 'August', 'September', 'october@november.edu', '123 December Ave', 'ethics@uw.edu', 'UTC−08 America/Los_Angeles', 'singleRandom', 'wlux', 'css/', 'wlux', 'css/', 'Exit task', 'Show', 'Hide', 'default', 'draft', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

INSERT INTO study_periods (studyPeriodId, studyId, periodName, periodDescription, periodParticipantLimit, periodStartTime, periodEndTime, periodAnnouncementText, periodEmailList, periodTaskSequence, periodStudyVariations, periodTimeZone, dateCreated, dateModified) VALUES ('3', '1234', 'Third Period', 'Third Period Test Data', '250', '2014-04-01 03:00:00.000000', '2014-04-04 06:17:30.000000', 'This is the third period announcement', 'NULL', 'random', 'singleRandom', 'UTC−08 America/Los_Angeles', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);