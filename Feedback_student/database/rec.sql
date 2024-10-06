SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `feedback`
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
(1, 'Planning and organization of the course', 'Planning'),
(2, 'Teacher''s understanding of the subject', 'understanding'),
(3, 'Punctuality and adherence to the Time Table', 'Punctuality'),
(4, 'Stress on the basic and important point', 'basics'),
(5, 'Effective delivery of the subject', 'subject Effectiveness'),
(6, 'Coverage of the subject 5 : 100%,4 : 95%, 3 : 90%, 2 : 85%, 1 : Below 85%', 'Coverage'),
(7, 'Encourage questions & interactions in the class room', 'Encourage'),
(8, 'Availability & access of the teacher in the department', 'Availability'),
(9, 'Extent of knowledge gained by you in the course', 'knowledge'),
(10, 'Usefullness of the test questions and fairness of valuation', 'Usefullness');
