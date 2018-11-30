-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2018 at 11:07 PM
-- Server version: 10.2.14-MariaDB-10.2.14+maria~xenial
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

-- Randomly generated names to populate the demo database

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpro`
--

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`room_id`, `capacity`)
VALUES
  (100, 00000025),
  (101, 00000030),
  (102, 00000035),
  (103, 00000035),
  (200, 00000040),
  (201, 00000040),
  (203, 00000040),
  (204, 00000040),
  (301, 00000100);

--
-- Dumping data for table `class_meetings`
--

INSERT INTO `class_meetings` (`meeting_course`, `meeting_section`, `day`, `start_time`, `end_time`)
VALUES
  (147, 466, 'Tuesday', '08:00:00', '10:00:00'),
  (147, 466, 'Thursday', '08:00:00', '10:00:00'),
  (148, 466, 'Tuesday', '10:00:00', '11:00:00'),
  (148, 466, 'Thursday', '10:00:00', '11:00:00'),
  (149, 466, 'Monday', '10:00:00', '11:00:00'),
  (149, 466, 'Wednesday', '10:00:00', '11:00:00'),
  (150, 32, 'Saturday', '13:00:00', '16:15:00'),
  (150, 466, 'Monday', '10:00:00', '11:00:00'),
  (150, 466, 'Wednesday', '10:00:00', '11:00:00'),
  (151, 470, 'Friday', '10:00:00', '13:00:00'),
  (152, 470, 'Saturday', '10:00:00', '13:00:00'),
  (223, 101, 'Monday', '08:00:00', '10:00:00'),
  (223, 101, 'Wednesday', '08:00:00', '10:00:00'),
  (223, 102, 'Tuesday', '08:00:00', '10:00:00'),
  (223, 102, 'Thursday', '08:00:00', '10:00:00'),
  (225, 102, 'Monday', '15:00:00', '17:00:00'),
  (225, 102, 'Wednesday', '15:00:00', '17:00:00'),
  (226, 105, 'Tuesday', '15:00:00', '17:00:00'),
  (226, 105, 'Thursday', '15:00:00', '17:00:00'),
  (245, 466, 'Monday', '08:00:00', '10:00:00'),
  (245, 466, 'Wednesday', '08:00:00', '10:00:00'),
  (268, 471, 'Monday', '18:00:00', '20:00:00'),
  (268, 471, 'Wednesday', '18:00:00', '20:00:00'),
  (268, 472, 'Monday', '18:00:00', '20:00:00'),
  (268, 472, 'Wednesday', '18:00:00', '20:00:00'),
  (270, 472, 'Monday', '18:00:00', '20:00:00'),
  (270, 472, 'Wednesday', '18:00:00', '20:00:00'),
  (280, 472, 'Tuesday', '17:00:00', '19:00:00'),
  (280, 472, 'Thursday', '17:00:00', '19:00:00'),
  (298, 480, 'Tuesday', '17:00:00', '19:00:00'),
  (298, 480, 'Thursday', '17:00:00', '19:00:00'),
  (299, 485, 'Saturday', '18:00:00', '19:00:00');

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_title`, `c_textbook`, `c_units`, `c_dept`)
VALUES
(147, 'How do I not lose money?', 'Book on how to be good with money', 3, 14),
(148, 'How to make money', 'How to make money book', 2, 14),
(149, 'Accounting', 'Accounting Book', 3, 10),
(150, 'Financial Accounting', 'Financial Accounting Book', 3, 10),
(151, 'Auditing', 'Auditing Book', 3, 10),
(152, 'Corporate Accounting', 'Corporate Accounting Book', 3, 10),
(223, 'Intro to Programming 1', 'Intro to Programming 1 Book', 3, 12),
(225, 'Intro to Programming 2', 'Intro to Programming 2 Book', 3, 12),
(226, 'Compilers', 'Compilers Book', 4, 12),
(245, 'Data Systems', 'Data Systems Book', 3, 12),
(268, 'Introduction to Biochemistry', 'Introduction to Biochemistry Book', 3, 11),
(270, 'The Living World: Molecular Scale', 'The Living World: Molecular Scale Book', 4, 11),
(280, 'Biotechnology in Society', 'Biotechnology in Society Book', 4, 11),
(298, 'English 1', 'How to Write?', 3, 13),
(299, 'English 2', 'English Story Book', 3, 13);

--
-- Dumping data for table `course_prerequisites`
--

INSERT INTO `course_prerequisites` (`preq_for`, `preq_course`)
VALUES
  (148, 147),
  (150, 149),
  (151, 150),
  (152, 151),
  (225, 223),
  (226, 225),
  (245, 225),
  (270, 268),
  (280, 270),
  (299, 298);

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`course_fkey`, `section_num`, `classroom`, `instructor`)
VALUES
  (150, 32, 200, 894153986),
  (223, 101, 100, 258418910),
  (223, 102, 100, 258418910),
  (225, 102, 103, 258418910),
  (226, 105, 301, 258418910),
  (147, 466, 301, 548369621),
  (148, 466, 301, 894153986),
  (149, 466, 301, 894153986),
  (150, 466, 204, 879344406),
  (245, 466, 103, 264448568),
  (151, 470, 203, 587416335),
  (152, 470, 203, 587416335),
  (268, 471, 201, 145636116),
  (268, 472, 203, 199423789),
  (270, 472, 301, 516290241),
  (280, 472, 100, 516290241),
  (298, 480, 203, 548369621),
  (299, 485, 103, 548369621);

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_num`, `d_name`, `d_phone`, `d_location`, `d_chair`)
VALUES
(10, 'Accounting', '(479)717-8719', 'Main Office Building Room 1', 145636116),
(11, 'Biochemistry', '(303)231-3005', 'Main Office Building Room 2', 199423789),
(12, 'Computer Science', '(502)994-2749', 'Main Office Building Room 3', 258418910),
(13, 'English', '(330)230-7621', 'Main Office Building Room 4', 548369621),
(14, 'Finance', '(708)662-3009', 'Main Office Building Room 5', 879344406);

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrolled_course`, `enrolled_section`, `enrolled_student`, `grade`)
VALUES
  (147, 466, 1013, 'IP'),
  (147, 466, 1088, 'IP'),
  (147, 466, 1094, 'IP'),
  (147, 466, 1218, 'IP'),
  (148, 466, 1088, 'IP'),
  (148, 466, 1094, 'IP'),
  (148, 466, 1569, 'IP'),
  (152, 470, 1013, 'A'),
  (152, 470, 1088, 'B+'),
  (152, 470, 1094, 'A-'),
  (152, 470, 1218, 'D+'),
  (152, 470, 1273, 'C'),
  (152, 470, 1474, 'B'),
  (152, 470, 1552, 'B-'),
  (152, 470, 1569, 'A'),
  (152, 470, 1768, 'A-'),
  (152, 470, 1813, 'C+'),
  (152, 470, 1853, 'D'),
  (152, 470, 1955, 'D+'),
  (223, 102, 1013, 'B-'),
  (223, 102, 1088, 'A-'),
  (223, 102, 1094, 'B'),
  (223, 102, 1218, 'B'),
  (223, 102, 1273, 'B'),
  (223, 102, 1474, 'D'),
  (223, 102, 1552, 'F'),
  (223, 102, 1569, 'W'),
  (223, 102, 1768, 'D'),
  (223, 102, 1813, 'C'),
  (223, 102, 1853, 'D'),
  (223, 102, 1955, 'C+'),
  (226, 105, 1013, 'A-'),
  (226, 105, 1088, 'B'),
  (226, 105, 1094, 'C'),
  (226, 105, 1218, 'D-'),
  (268, 472, 1013, 'A'),
  (268, 472, 1088, 'C'),
  (268, 472, 1094, 'B-'),
  (268, 472, 1218, 'B'),
  (268, 472, 1273, 'A-'),
  (268, 472, 1474, 'D-');

--
-- Dumping data for table `minors`
--

INSERT INTO `minors` (`student_m`, `minor_department`)
VALUES
  (1013, 10),
  (1088, 12),
  (1094, 14),
  (1218, 10),
  (1273, 14);

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`p_ssn`, `p_name`, `p_address`, `p_phone`, `p_sex`, `p_title`, `p_salary`)
VALUES
  (1, 'Root Professor', '', '000', 'male', 'Full_Professor', 0),
  (145636116, 'Andrew Phillips', '29 Park Court  Port Richey, FL 34668', '(325)899-9797', 'male', 'Full_Professor',
   65000),
  (199423789, 'Larry Lopez', '320 Valley St.  Cartersville, GA 30120', '(330)814-6524', 'male', 'Full_Professor',
   55000),
  (258418910, 'Carl	Thompson', '870 Indian Summer Ave.  Naples, FL 34116', '(762)222-2072', 'male', 'Instructor',
   45000),
  (264448568, 'Kelly Miller', '604 Ketch Harbour St. Marcus Hook, PA 19061', '(657)214-8738', 'female', 'Associate',
   50000),
  (325069572, 'Christine	Baker', '8380 Broad St.  Apt 93  Evans, GA 30809', '(225)932-6167', 'female', 'Distinguished',
   75000),
  (400683186, 'Cheryl Washington', '7740 Briarwood Street  Beaver Falls, PA 15010', '(650)996-1709', 'female',
   'Assistant', 55000),
  (516290241, 'Ralph Bryant', '876 Lookout Dr. Ormond Beach, FL 32174', '(419)418-2376', 'male', 'Associate', 55000),
  (548369621, 'Tina	Brooks', '7337 Fulton Ave. Grand Haven, MI 49417', '(331)245-7918', 'female', 'Instructor', 55000),
  (587416335, 'Kevin Miller', '604 Ketch Harbour St. Marcus Hook, PA 19061', '(657)214-8738', 'male', 'Associate',
   50000),
  (879344406, 'Amanda Parker', '649 Center Drive  Duluth, GA 30096', '(856)702-2654', 'female', 'Instructor', 55000),
  (894153986, 'William Mitchell', '7426 South Jockey Hollow Rd.  Pikesville, MD 21208', '(240)315-8970', 'male',
   'Assistant', 45000);

--
-- Dumping data for table `professor_degrees`
--

INSERT INTO `professor_degrees` (`p_ssn_fk`, `degree`)
VALUES
  (145636116, 'Biology MS'),
  (258418910, 'Computer Science MS'),
  (264448568, 'Computer Science MS'),
  (894153986, 'English BA');

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`cwid`, `s_fname`, `s_lname`, `s_areaCode`, `s_phone`, `s_address`, `s_city`, `s_state`, `s_zip`,
                       `s_major`)
VALUES
(1013, 'Phillip', 'Morris', 657, 300, '889 Augusta Lane', 'Fullerton', 'CA', 90621, 14),
(1088, 'Rose', 'Anderson', 657, 322, '817 North 1st Street', 'Fullerton', 'CA', 90621, 11),
(1094, 'Chris', 'Hughes', 657, 853, '655 River Street', 'Fullerton', 'CA', 90621, 10),
(1218, 'Larry', 'Phillips', 657, 305, '313 West George Drive', 'Fullerton', 'CA', 90621, 12),
(1273, 'Harold', 'Diaz', 657, 963, '8 Williams St.', 'Fullerton', 'CA', 90621, 12),
(1474, 'Gregory', 'Rogers', 657, 554, '470 Hall Ave.', 'Fullerton', 'CA', 90621, 12),
(1552, 'Gloria', 'Edwards', 657, 231, '78 Constitution Street', 'Fullerton', 'CA', 90621, 11),
(1569, 'Jane', 'Ross', 657, 704, '489 Theatre St.', 'Fullerton', 'CA', 90621, 13),
(1768, 'Susan', 'Cook', 657, 231, '37 Longfellow Rd.', 'Fullerton', 'CA', 90621, 12),
(1813, 'Jimmy', 'Bryant', 657, 571, '8069 Miles St.', 'Fullerton', 'CA', 90621, 13),
(1853, 'Donna', 'Butler', 657, 924, '285 Airport Street', 'Fullerton', 'CA', 90621, 10),
(1955, 'Julie', 'Garcia', 657, 910, '8059 Water Rd.', 'Fullerton', 'CA', 90621, 12);
SET FOREIGN_KEY_CHECKS = 1;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
