-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 07:47 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ias`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `coursename` varchar(150) NOT NULL,
  `subject_id` varchar(150) NOT NULL,
  `id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `coursename`, `subject_id`, `id`) VALUES
(17, 'DIT', '', ''),
(18, 'DMAAN', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `course_student_id` int(11) NOT NULL,
  `id` varchar(150) NOT NULL,
  `course_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`course_student_id`, `id`, `course_id`) VALUES
(16, '22 ', '17'),
(17, '23 ', '18'),
(18, '25 ', '18'),
(19, '21 ', '17');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `subject_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `grade`, `id`, `subject_id`, `course_id`) VALUES
(44, '90', '21 ', '43 ', '17'),
(45, '90', '22 ', '43 ', '17'),
(46, '91', '21 ', '45 ', '18'),
(47, '91', '22 ', '45 ', '18'),
(48, '91', '23 ', '45 ', '18'),
(49, '91', '25 ', '45 ', '18');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` varchar(150) NOT NULL,
  `gen` varchar(150) NOT NULL,
  `con` varchar(150) NOT NULL,
  `econ` varchar(150) NOT NULL,
  `addr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `email`, `dob`, `gen`, `con`, `econ`, `addr`) VALUES
(21, 'Student 1', 'stud@hccd.edu', '', '', '', '', ''),
(22, 'Student 2', 'stud2@hccd.edu', '', '', '', '', ''),
(23, 'Student 3', 'stud3@hccd.edu', '', '', '', '', ''),
(25, 'Student 4', 'stud4@hccd.edu', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subcode` varchar(60) NOT NULL,
  `req` varchar(50) NOT NULL,
  `units` varchar(50) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `subname` varchar(150) NOT NULL,
  `course_id` varchar(150) NOT NULL,
  `id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subcode`, `req`, `units`, `sem`, `subname`, `course_id`, `id`) VALUES
(43, 'S1', 'None', '3', '1st', 'Puposive Communication', '', ''),
(44, 'S2', 'None', '3', '1st', 'Discrete Math', '', ''),
(45, 'S3', 'None', '3', '1st', 'NSTP', '', ''),
(46, 'S4', 'NSTP', '3', '2nd', 'NSTP 2', '', ''),
(47, 'S5', 'Discrete Math', '6', '2nd', 'HCI', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_course`
--

CREATE TABLE `sub_course` (
  `sub_course_id` int(11) NOT NULL,
  `course_id` varchar(150) NOT NULL,
  `subject_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_course`
--

INSERT INTO `sub_course` (`sub_course_id`, `course_id`, `subject_id`) VALUES
(27, '17', '43 '),
(28, '17', '44 '),
(29, '17', '45 '),
(30, '18', '45 '),
(31, '18', '46 '),
(32, '18', '47 ');

-- --------------------------------------------------------

--
-- Table structure for table `sub_teach`
--

CREATE TABLE `sub_teach` (
  `subject_teach_id` int(11) NOT NULL,
  `subject_id` varchar(150) NOT NULL,
  `id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_teach`
--

INSERT INTO `sub_teach` (`subject_teach_id`, `subject_id`, `id`) VALUES
(57, '43 ', '24'),
(58, '45 ', '24'),
(59, '44 ', '26'),
(60, '45 ', '26'),
(61, '45 ', '27'),
(62, '46 ', '27'),
(63, '43 ', '28'),
(64, '47 ', '28');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dob` varchar(150) NOT NULL,
  `gen` varchar(150) NOT NULL,
  `con` varchar(150) NOT NULL,
  `econ` varchar(150) NOT NULL,
  `addr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fname`, `email`, `dob`, `gen`, `con`, `econ`, `addr`) VALUES
(24, 'Teacher 1', '', '', '', '', '', ''),
(26, 'Teacher 2', '', '', '', '', '', ''),
(27, 'Teacher 3', '', '', '', '', '', ''),
(28, 'Teacher 4', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `utype` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `password`, `utype`) VALUES
(1, 'admin', 'admin@admin.com', '12345', 'admin'),
(21, 'Student 1', 'stud@hccd.edu', '1234', 'student'),
(22, 'Student 2', 'stud2@hccd.edu', '1234', 'student'),
(23, 'Student 3', 'stud3@hccd.edu', '1234', 'student'),
(24, 'Teacher 1', 'teach@hccd.edu', '1234', 'teacher'),
(25, 'Student 4', 'stud4@hccd.edu', '1234', 'student'),
(26, 'Teacher 2', 'teach2@hccd.edu', '1234', 'teacher'),
(27, 'Teacher 3', 'teach3@hccd.edu', '1234', 'teacher'),
(28, 'Teacher 4', 'teach4@hccd.edu', '1234', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `yearlevel`
--

CREATE TABLE `yearlevel` (
  `yearlevel_id` int(11) NOT NULL,
  `id` varchar(150) NOT NULL,
  `yr` varchar(150) NOT NULL,
  `sem` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`course_student_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `sub_course`
--
ALTER TABLE `sub_course`
  ADD PRIMARY KEY (`sub_course_id`);

--
-- Indexes for table `sub_teach`
--
ALTER TABLE `sub_teach`
  ADD PRIMARY KEY (`subject_teach_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yearlevel`
--
ALTER TABLE `yearlevel`
  ADD PRIMARY KEY (`yearlevel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `course_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `sub_course`
--
ALTER TABLE `sub_course`
  MODIFY `sub_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sub_teach`
--
ALTER TABLE `sub_teach`
  MODIFY `subject_teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `yearlevel`
--
ALTER TABLE `yearlevel`
  MODIFY `yearlevel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
