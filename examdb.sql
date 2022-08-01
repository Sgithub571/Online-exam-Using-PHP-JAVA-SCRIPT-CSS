-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2014 at 05:58 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `online_exam`
--
CREATE DATABASE `online_exam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_exam`;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `examID` int(11) NOT NULL AUTO_INCREMENT,
  `exam_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `no_qtn` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `subid` int(11) NOT NULL,
  `activated` int(11) NOT NULL,
  PRIMARY KEY (`examID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examID`, `exam_date`, `duration`, `no_qtn`, `password`, `subid`, `activated`) VALUES
(1, '2014-11-07', 10, 10, 'abcd', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE IF NOT EXISTS `exam_result` (
  `rollno` varchar(15) NOT NULL,
  `examID` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obt_marks` int(11) NOT NULL,
  PRIMARY KEY (`rollno`,`examID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`rollno`, `examID`, `total_marks`, `obt_marks`) VALUES
('1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `quesid` int(11) NOT NULL AUTO_INCREMENT,
  `subid` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(500) NOT NULL,
  `opt2` varchar(500) NOT NULL,
  `opt3` varchar(500) NOT NULL,
  `answer` varchar(10) NOT NULL,
  PRIMARY KEY (`quesid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quesid`, `subid`, `question`, `opt1`, `opt2`, `opt3`, `answer`) VALUES
(1, 3, 'How many primitive type java has?', '5', '6', '8', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `rollno` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `college` varchar(30) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `name`, `college`) VALUES
('1', 'Amit', 'AEC'),
('2', 'Sumit', 'GNIT');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `subname` varchar(30) NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`) VALUES
(2, 'Pro E'),
(3, 'Java');
