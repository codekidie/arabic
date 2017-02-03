-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 03, 2017 at 01:41 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amaquizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_option_id` int(11) NOT NULL DEFAULT '0',
  `answer_numeric` int(11) NOT NULL,
  `answer_text` varchar(255) NOT NULL,
  `answer_yn` tinyint(1) NOT NULL,
  `unit_of_measure_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `question_option_id`, `answer_numeric`, `answer_text`, `answer_yn`, `unit_of_measure_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 0, 'QURAN', 0, 0, 1475550508, 1475550508),
(2, 3, 1, 0, 'HADITH', 0, 0, 1475550508, 1475550508),
(3, 3, 1, 0, 'Adf', 0, 0, 1485699817, 1485699817),
(4, 3, 1, 0, 'Adfadf', 0, 0, 1485699817, 1485699817),
(5, 3, 1, 0, 'Adfs', 0, 0, 1485699829, 1485699829),
(6, 3, 1, 0, 'Adfadf', 0, 0, 1485699829, 1485699829),
(7, 3, 1, 0, '2', 0, 0, 1485764772, 1485764772),
(8, 3, 1, 0, '3', 0, 0, 1485764772, 1485764772);

-- --------------------------------------------------------

--
-- Table structure for table `inputtypes`
--

CREATE TABLE `inputtypes` (
  `id` int(11) unsigned NOT NULL,
  `input_type_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_users'),
('app', 'default', '002_create_questions'),
('app', 'default', '003_create_optiongroups'),
('app', 'default', '004_create_questionoptions'),
('app', 'default', '005_create_surversections'),
('app', 'default', '006_create_surveyheaders'),
('app', 'default', '007_create_inputtypes'),
('app', 'default', '008_create_optionchoices'),
('app', 'default', '009_create_usersurveysections'),
('app', 'default', '010_create_surveycomments'),
('app', 'default', '011_create_answers'),
('app', 'default', '012_create_unitofmeasures');

-- --------------------------------------------------------

--
-- Table structure for table `optionchoices`
--

CREATE TABLE `optionchoices` (
  `id` int(11) unsigned NOT NULL,
  `optiongroupid` int(11) NOT NULL,
  `option_choice_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `optiongroups`
--

CREATE TABLE `optiongroups` (
  `id` int(11) unsigned NOT NULL,
  `option_group_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questionoptions`
--

CREATE TABLE `questionoptions` (
  `id` int(11) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_choice_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `question_subtext` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `allow_multiple_option_answers` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_name`, `question_subtext`, `answer`, `option_group_id`, `allow_multiple_option_answers`, `created_at`, `updated_at`) VALUES
(1, '1. Muslim Holy book?', '1. Muslim Holy book?', '1. QUR’AN', 1, '0', 1475523545, 1475523545),
(2, '2. The way of life prescribed as normative for Muslims on the of the teachings and practices of Muhammad and interpretations of the Quran. ', '2. The way of life prescribed as normative for Muslims on the of the teachings and practices of Muhammad and interpretations of the Quran. ', 'HADITH', 1, '0', 1475523649, 1475523649);

-- --------------------------------------------------------

--
-- Table structure for table `surversections`
--

CREATE TABLE `surversections` (
  `id` int(11) unsigned NOT NULL,
  `survey_header_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_title` varchar(255) NOT NULL,
  `section_subheading` varchar(255) NOT NULL,
  `section_required_yn` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surveycomments`
--

CREATE TABLE `surveycomments` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `survey_header_id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surveyheaders`
--

CREATE TABLE `surveyheaders` (
  `id` int(11) unsigned NOT NULL,
  `organization_id` int(11) NOT NULL,
  `survey_name` varchar(255) NOT NULL,
  `instructions` varchar(255) NOT NULL,
  `other_header_info` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unitofmeasures`
--

CREATE TABLE `unitofmeasures` (
  `id` int(11) unsigned NOT NULL,
  `unit_of_measures_name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'NtgTF8q6Z9UyyUwQS7Ma5Bvj+uTrK/F66iMji9su1XY=', 100, 'phil@example.com', 1486096030, '696102604f94fb693587d53eaaea52cb470aea20', 'a:0:{}', 1475519635, NULL),
(3, 'codeflux', 'apyquP9ijI14VfX+NSFs/t36J7R8oB6Zq9Gw6Kr9Xvc=', 1, 'codeflux@gmail.com', 1485764756, '764019b03a62571cd7cea31b4290be9e9ad1eae6', 'a:1:{s:8:"fullname";s:9:"Code Flux";}', 1475520242, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersurveysections`
--

CREATE TABLE `usersurveysections` (
  `id` int(11) unsigned NOT NULL,
  `userid` int(11) NOT NULL,
  `surveysectionid` int(11) NOT NULL,
  `completed_on` datetime NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputtypes`
--
ALTER TABLE `inputtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optionchoices`
--
ALTER TABLE `optionchoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `optiongroups`
--
ALTER TABLE `optiongroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionoptions`
--
ALTER TABLE `questionoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surversections`
--
ALTER TABLE `surversections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveycomments`
--
ALTER TABLE `surveycomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveyheaders`
--
ALTER TABLE `surveyheaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitofmeasures`
--
ALTER TABLE `unitofmeasures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersurveysections`
--
ALTER TABLE `usersurveysections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `inputtypes`
--
ALTER TABLE `inputtypes`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `optionchoices`
--
ALTER TABLE `optionchoices`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `optiongroups`
--
ALTER TABLE `optiongroups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questionoptions`
--
ALTER TABLE `questionoptions`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `surversections`
--
ALTER TABLE `surversections`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surveycomments`
--
ALTER TABLE `surveycomments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surveyheaders`
--
ALTER TABLE `surveyheaders`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unitofmeasures`
--
ALTER TABLE `unitofmeasures`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usersurveysections`
--
ALTER TABLE `usersurveysections`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
