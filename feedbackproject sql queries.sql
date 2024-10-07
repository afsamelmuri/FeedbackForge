-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2019 at 05:48 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedbackproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastaccess` datetime NOT NULL,
  PRIMARY KEY (`uname`)
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

DROP TABLE IF EXISTS `batch_master`;
CREATE TABLE IF NOT EXISTS `batch_master` (
  `batch_id` int(20) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(255) NOT NULL,
  `feedback_no` int(2) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `branch_master`;
CREATE TABLE IF NOT EXISTS `branch_master` (
  `b_id` int(20) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `faculty_master`;
CREATE TABLE IF NOT EXISTS `faculty_master` (
  `f_id` int(20) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `b_id` int(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `branch` varchar(50) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(7, 'Ms. Prachi', 'Agarwal', 2, 'faculty', 'ME'),
(8, 'SHAKUNTALA', 'RAO', 1, '0', 'CSE'),
(9, 'ANURAG', 'PATIL', 1, '0', 'CSE'),
(10, 'AJAY', 'KAUSHIK', 1, '0', 'CSE'),
(11, 'Amar', 'T', 1, '0', 'CSE'),
(12, 'Jay', 'L', 1, '0', 'CSE'),
(13, 'Amar', 'H', 1, '0', 'CSE'),
(14, 'Tousif', 'mulla', 1, '0', 'CSE'),
(15, 'PUROHIT', 'PANDEY', 1, '0', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `FEEDBACKID` int(20) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`FEEDBACKID`),
  KEY `REGISTERNUMBER` (`REGISTERNUMBER`,`SUBJECTID`),
  KEY `SUBJECTID` (`SUBJECTID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FEEDBACKID`, `REGISTERNUMBER`, `SUBJECTID`, `DATE`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`, `Q7`, `Q8`, `Q9`, `Q10`, `STATUS`, `semester`) VALUES
(1, '2RH14CS030', 1, '29/04/2018 19:15:08', 1, 2, 1, 1, 2, 1, 5, 5, 4, 1, 'ACTIVE', 6),
(2, '2RH14CS030', 2, '29/04/2018 19:15:08', 1, 4, 5, 5, 4, 1, 4, 5, 1, 4, 'ACTIVE', 6),
(3, '2RH14CS030', 3, '29/04/2018 19:15:08', 2, 2, 3, 4, 5, 0, 5, 0, 5, 0, 'ACTIVE', 6),
(4, '2RH14CS030', 8, '29/04/2018 19:15:08', 1, 2, 2, 2, 2, 2, 2, 2, 2, 0, 'ACTIVE', 6),
(6, '2RH14CS030', 5, '2018-04-29 19:15:08', 2, 2, 2, 2, 2, 2, 2, 1, 2, 2, 'ACTIVE', 6),
(7, '2rh16cs0124', 10, '2018-04-29 20:35:21', 2, 3, 3, 3, 3, 3, 0, 4, 3, 3, 'ACTIVE', 8),
(8, '2rh16cs0124', 2, '2018-04-29 20:35:52', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(9, '2rh16cs0124', 4, '2018-04-29 20:38:33', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(10, '2rh16cs0124', 3, '2018-04-29 20:40:02', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(11, '2rh16cs0124', 5, '2018-04-29 20:40:21', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(12, '2RH14CS030', 4, '2018-04-29 20:45:48', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 6),
(13, '2RH14CS030', 9, '2019-11-04 14:49:55', 1, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'ACTIVE', 6),
(14, '2RH14CS030', 7, '2019-11-04 21:20:10', 5, 5, 5, 1, 5, 1, 5, 1, 5, 3, 'ACTIVE', 6),
(15, '2rh16cs0121', 1, '2019-11-05 16:45:19', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 8),
(16, '2rh16cs0121', 8, '2019-11-05 16:54:57', 4, 2, 3, 2, 3, 2, 4, 1, 2, 1, 'ACTIVE', 8),
(17, '18N10401', 1, '2019-11-05 17:49:34', 3, 4, 3, 3, 3, 3, 5, 2, 3, 3, 'ACTIVE', 6),
(18, '18N10401', 2, '2019-11-05 17:49:59', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'ACTIVE', 6),
(19, '2JH18CS001', 1, '2019-11-06 16:31:13', 1, 1, 1, 1, 3, 3, 3, 2, 1, 1, 'ACTIVE', 6);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_questions`
--

DROP TABLE IF EXISTS `feedback_questions`;
CREATE TABLE IF NOT EXISTS `feedback_questions` (
  `q_id` int(20) NOT NULL AUTO_INCREMENT,
  `ques` varchar(255) NOT NULL,
  `one_word` varchar(255) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ques_master`
--

DROP TABLE IF EXISTS `feedback_ques_master`;
CREATE TABLE IF NOT EXISTS `feedback_ques_master` (
  `q_id` int(20) NOT NULL AUTO_INCREMENT,
  `ques` varchar(255) NOT NULL,
  `one_word` varchar(255) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `SLNO` int(20) NOT NULL AUTO_INCREMENT,
  `UNAME` varchar(100) NOT NULL,
  `USN` varchar(50) NOT NULL,
  `SEMESTER` int(20) NOT NULL,
  `DEPARTMENT` varchar(225) NOT NULL,
  `DATEOFBIRTH` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'ACTIVE',
  `DIVISION` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SLNO`),
  UNIQUE KEY `USN` (`USN`),
  KEY `DEPARTMENT` (`DEPARTMENT`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`SLNO`, `UNAME`, `USN`, `SEMESTER`, `DEPARTMENT`, `DATEOFBIRTH`, `EMAIL`, `PASSWORD`, `STATUS`, `DIVISION`) VALUES
(1, 'student1', '2RH14CS030', 6, 'CSE', '04/08/2018', 'student1@gmail.com', '1772dc10ea0fd0c1c5861f046ed8078e', 'ACTIVE', ''),
(2, 'STUDENT1', '2rh16cs0122', 8, 'CSE', '1990-12-31', 'STUDENT1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE', ''),
(3, 'STUDENT2', '2rh16cs0123', 8, 'CSE', '1990-12-05', 'STUDENT2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE', ''),
(4, 'STUDENT3', '2rh16cs0124', 8, 'CSE', '1990-12-03', 'STUDENT3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'ACTIVE', ''),
(5, 'ad', '2rh16cs0121', 8, 'CSE', '2018-04-29', 'STUDENT1@gmail.com', 'd8c9d0d3172cd949c5c45fd6354a46fa', 'ACTIVE', ''),
(6, 'Anil Sharma', '18N10401', 6, 'CSE', '1997-06-17', 'xyz@gmail.com', '350b48b08269f1ddde3b93f49d808a33', 'ACTIVE', ''),
(7, 'SHARAN', '2JH17CS005', 6, 'CSE', '1997-06-17', 'sharan@gmail.com', 'c9917f2f20e8913e64ab22254e27ccf0', 'ACTIVE', '1'),
(8, 'Aarush', '2JH18CS001', 6, 'CSE', '1986-12-31', 'aarush@gmail.com', '05891dac10bc22efaac049051296635f', 'ACTIVE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `semester_master`
--

DROP TABLE IF EXISTS `semester_master`;
CREATE TABLE IF NOT EXISTS `semester_master` (
  `sem_id` int(20) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(255) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `subjectdictionary`;
CREATE TABLE IF NOT EXISTS `subjectdictionary` (
  `slno` int(20) NOT NULL AUTO_INCREMENT,
  `subjectno` int(20) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `subjectcode` varchar(50) NOT NULL,
  `sem` int(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `subject_master`;
CREATE TABLE IF NOT EXISTS `subject_master` (
  `sub_id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) NOT NULL,
  `sem_id` int(20) NOT NULL,
  `f_id` int(20) NOT NULL,
  `batch_id` int(20) NOT NULL,
  `division_id` varchar(10) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`sub_id`, `sub_name`, `sem_id`, `f_id`, `batch_id`, `division_id`) VALUES
(1, 'OPERATING SYSTEM', 6, 1, 2, '1'),
(2, 'JAVA', 6, 1, 2, '1'),
(3, 'SYSTEM SOFTWARE', 8, 3, 2, '1'),
(4, 'WEB PROGRAMMING', 8, 2, 2, '1'),
(5, 'COMPUTER NETWORK', 8, 2, 2, '2'),
(6, 'Wireless Communication', 8, 6, 2, '1'),
(7, 'Wireless LAN', 7, 4, 2, '2'),
(8, 'CCN', 8, 5, 2, '1'),
(9, 'FLAT', 2, 8, 2, '2'),
(10, 'Database Management System', 1, 7, 2, '1'),
(11, 'SOFTWARE ARCHITETURE', 6, 10, 1, '1'),
(12, 'DISCRETE MATHEMATICAL STRUCTURES', 4, 14, 1, '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`REGISTERNUMBER`) REFERENCES `registration` (`USN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
