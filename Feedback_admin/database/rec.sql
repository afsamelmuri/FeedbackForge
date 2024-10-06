-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 03:46 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `feedbackproject`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `uname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastaccess` datetime NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`uname`, `password`, `lastaccess`) VALUES 
('admin', '21232f297a57a5a743894a0e4a801fc3', '2018-04-29 19:18:20');

-- --------------------------------------------------------

-- 
-- Table structure for table `batch_master`
-- 

CREATE TABLE `batch_master` (
  `batch_id` int(20) NOT NULL auto_increment,
  `batch_name` varchar(255) NOT NULL,
  `feedback_no` int(2) NOT NULL,
  PRIMARY KEY  (`batch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `batch_master`
-- 

INSERT INTO `batch_master` (`batch_id`, `batch_name`, `feedback_no`) VALUES 
(1, 'Jan08', 2),
(2, 'Feb08', 1),
(3, 'March08', 3);

-- --------------------------------------------------------

-- 
-- Table structure for table `branch_master`
-- 

CREATE TABLE `branch_master` (
  `b_id` int(20) NOT NULL auto_increment,
  `b_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `branch_master`
-- 

INSERT INTO `branch_master` (`b_id`, `b_name`) VALUES 
(1, 'CS'),
(2, 'MECHANICAL'),
(3, 'ECE');

-- --------------------------------------------------------

-- 
-- Table structure for table `faculty_master`
-- 

CREATE TABLE `faculty_master` (
  `f_id` int(20) NOT NULL auto_increment,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `b_id` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY  (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `faculty_master`
-- 

INSERT INTO `faculty_master` (`f_id`, `f_name`, `l_name`, `b_id`, `password`, `branch`) VALUES 
(1, 'Mr. Sudhakar', 'Pandey', 1, 'faculty', 'CSE'),
(2, 'Mr. Sanjay', 'Kumar', 1, 'faculty', 'CSE'),
(3, 'Ms.Rakesh', 'Tripathi', 1, 'faculty', 'CSE'),
(4, 'Dr. Rajesh', 'Doriya', 1, 'faculty', 'CSE'),
(5, 'Mr. Deepika', 'Agarwal', 1, 'faculty', 'CSE'),
(6, 'Ms. Nivedita', 'Sharma', 1, 'faculty', 'ME'),
(7, 'Ms. Prachi', 'Agarwal', 2, 'faculty', 'ME');

-- --------------------------------------------------------

-- 
-- Table structure for table `feedback`
-- 

CREATE TABLE `feedback` (
  `FEEDBACKID` int(20) NOT NULL auto_increment,
  `REGISTERNUMBER` varchar(50) NOT NULL,
  `SUBJECTID` int(20) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `Q1` int(10) NOT NULL,
  `Q2` int(10) NOT NULL,
  `Q3` int(10) NOT NULL,
  `Q4` int(10) NOT NULL,
  `Q5` int(10) NOT NULL,
  `Q6` int(10) NOT NULL,
  `Q7` int(10) NOT NULL,
  `Q8` int(10) NOT NULL,
  `Q9` int(10) NOT NULL,
  `Q10` int(10) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `semester` int(20) NOT NULL,
  PRIMARY KEY  (`FEEDBACKID`),
  KEY `REGISTERNUMBER` (`REGISTERNUMBER`,`SUBJECTID`),
  KEY `SUBJECTID` (`SUBJECTID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `feedback`
-- 

INSERT INTO `feedback` (`FEEDBACKID`, `REGISTERNUMBER`, `SUBJECTID`, `DATE`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `STATUS`, `semester`) VALUES 
(1, '2RH14CS030', 1, '29/04/2018 19:15:08', 1, 2, 1, 1, 2, 1, 5, 5, 4, 1, 'ACTIVE', 6),
(2, '2RH14CS030', 2, '29/04/2018 19:15:08', 1, 4, 5, 5, 4, 1, 4, 5, 1, 4, 'ACTIVE', 6),
(3, '2RH14CS030', 3, '29/04/2018 19:15:08', 2, 2, 3, 4, 5, 0, 5, 0, 5, 0, 'ACTIVE', 6),
(4, '2RH14CS030', 8, '29/04/2018 19:15:08', 1, 2, 2, 2, 2, 2, 2, 2, 2, 0, 'ACTIVE', 6),
(6, '2RH14CS030', 5, '2018-04-29 19:15:08', 2, 2, 2, 2, 2, 2, 2, 1, 2, 2, 'ACTIVE', 6),
(7, '2rh16cs0124', 1, '2018-04-29 20:35:21', 2, 3, 3, 3, 3, 3, 0, 4, 3, 3, 'ACTIVE', 8),
(8, '2rh16cs0124', 2, '2018-04-29 20:35:52', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(9, '2rh16cs0124', 4, '2018-04-29 20:38:33', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(10, '2rh16cs0124', 3, '2018-04-29 20:40:02', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(11, '2rh16cs0124', 5, '2018-04-29 20:40:21', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(12, '2RH14CS030', 4, '2018-04-29 20:45:48', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 6);

-- --------------------------------------------------------

-- 
-- Table structure for table `feedback_questions`
-- 

CREATE TABLE `feedback_questions` (
  `q_id` int(20) NOT NULL auto_increment,
  `ques` varchar(255) NOT NULL,
  `one_word` varchar(255) NOT NULL,
  PRIMARY KEY  (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `feedback_questions`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `feedback_ques_master`
-- 

CREATE TABLE `feedback_ques_master` (
  `q_id` int(20) NOT NULL auto_increment,
  `ques` varchar(255) NOT NULL,
  `one_word` varchar(255) NOT NULL,
  PRIMARY KEY  (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `feedback_ques_master`
-- 

INSERT INTO `feedback_ques_master` (`q_id`, `ques`, `one_word`) VALUES 
(1, 'Subject Knowledge', 'Knowledge'),
(2, 'Communication Skills', 'Communication'),
(3, 'Ability to simplify concepts and solutions', 'Ability'),
(4, 'Clarity of problems solved in the class', 'Clarity'),
(5, 'Interest generated in the subject', 'Interest'),
(6, 'Usage of various Learning Resources(PPT Slides, Videos, Images, Pdf documents etc..)', 'Resources'),
(7, 'Question handling and doubt clearing ability', 'doubt clearing'),
(8, 'Attention given to individual student during problem being solved in the class', 'Attention'),
(9, 'Concern and involvement about student understanding of the subject', 'understanding'),
(10, 'Overall effectiveness of the Teacher', 'effectiveness');

-- --------------------------------------------------------

-- 
-- Table structure for table `registration`
-- 

CREATE TABLE `registration` (
  `SLNO` int(20) NOT NULL auto_increment,
  `UNAME` varchar(100) NOT NULL,
  `USN` varchar(50) NOT NULL,
  `SEMESTER` int(20) NOT NULL,
  `DEPARTMENT` varchar(225) NOT NULL,
  `DATEOFBIRTH` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL default 'ACTIVE',
  PRIMARY KEY  (`SLNO`),
  UNIQUE KEY `USN` (`USN`),
  KEY `DEPARTMENT` (`DEPARTMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `registration`
-- 

INSERT INTO `registration` (`SLNO`, `UNAME`, `USN`, `SEMESTER`, `DEPARTMENT`, `DATEOFBIRTH`, `EMAIL`, `PASSWORD`, `STATUS`) VALUES 
(1, 'student1', '2RH14CS030', 6, 'CSE', '04/08/2018', 'student1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE'),
(2, 'STUDENT1', '2rh16cs0122', 8, 'CSE', '1990-12-31', 'STUDENT1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE'),
(3, 'STUDENT2', '2rh16cs0123', 8, 'CSE', '1990-12-05', 'STUDENT2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE'),
(4, 'STUDENT3', '2rh16cs0124', 8, 'CSE', '1990-12-03', 'STUDENT3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE'),
(5, 'ad', '2rh16cs0121', 8, 'CSE', '2018-04-29', 'STUDENT1@gmail.com', '202cb962ac59075b964b07152d234b70', 'ACTIVE');

-- --------------------------------------------------------

-- 
-- Table structure for table `semester_master`
-- 

CREATE TABLE `semester_master` (
  `sem_id` int(20) NOT NULL auto_increment,
  `sem_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`sem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `semester_master`
-- 

INSERT INTO `semester_master` (`sem_id`, `sem_name`) VALUES 
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII');

-- --------------------------------------------------------

-- 
-- Table structure for table `subjectdictionary`
-- 

CREATE TABLE `subjectdictionary` (
  `slno` int(20) NOT NULL auto_increment,
  `subjectno` int(20) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `subjectcode` varchar(50) NOT NULL,
  `sem` int(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  PRIMARY KEY  (`slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `subjectdictionary`
-- 

INSERT INTO `subjectdictionary` (`slno`, `subjectno`, `subjectname`, `subjectcode`, `sem`, `branch`) VALUES 
(1, 1, 'C++', '15CS61T', 6, 'COMPUTER SCIENCE'),
(2, 2, 'JAVA', '15CS62T', 6, 'COMPUTER SCIENCE');

-- --------------------------------------------------------

-- 
-- Table structure for table `subject_master`
-- 

CREATE TABLE `subject_master` (
  `sub_id` int(20) NOT NULL auto_increment,
  `sub_name` varchar(255) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `f_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `division_id` int(10) NOT NULL,
  PRIMARY KEY  (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `subject_master`
-- 

INSERT INTO `subject_master` (`sub_id`, `sub_name`, `sem_id`, `f_id`, `batch_id`, `division_id`) VALUES 
(1, 'OPERATING SYSTEM', 6, 1, 2, 1),
(2, 'JAVA', 6, 1, 2, 1),
(3, 'SYSTEM SOFTWARE', 8, 1, 2, 1),
(4, 'WEB PROGRAMMING', 8, 2, 2, 1),
(5, 'COMPUTER NETWORK', 8, 2, 2, 2),
(6, 'Wireless Communication', 8, 4, 2, 1),
(7, 'Wireless LAN', 7, 4, 2, 2),
(8, 'CCN', 8, 5, 2, 1),
(9, 'FLAT', 2, 5, 2, 2),
(10, 'Database Management System', 1, 7, 2, 1);

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `feedback`
-- 
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`REGISTERNUMBER`) REFERENCES `registration` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;
