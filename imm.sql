-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2019 at 10:09 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `imm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$cGuHIMA/.dk1IPibScK6re.qo50WEdF6QafN3R40UoECJUoxptfqG');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` varchar(30) NOT NULL,
  `comment_by` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `student_id`, `teacher_id`, `comment`, `date`, `comment_by`) VALUES
(6, 36, 0, 'Parent commented', '07-11-2019 21:31:38', 'Parent'),
(7, 36, 0, 'Hi parent. I''m happy to set ', '07-11-2019 21:49:03', ''),
(8, 36, 0, 'Thid''s buye', '07-11-2019 21:49:20', ''),
(9, 36, 0, 'Thid''s buye', '07-11-2019 21:50:29', 'Swathi Cherian'),
(10, 36, 0, 'He is very nice in class', '08-11-2019 01:10:31', 'gokul');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`) VALUES
(1, 'BCA'),
(2, 'BBA'),
(3, 'BCOM');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `marks`) VALUES
(19, 36, 1, 0),
(20, 36, 2, 0),
(21, 36, 3, 0),
(22, 36, 4, 0),
(23, 36, 5, 0),
(24, 36, 6, 0),
(37, 37, 1, 0),
(38, 37, 2, 0),
(39, 37, 3, 0),
(40, 37, 4, 0),
(41, 37, 5, 0),
(42, 37, 6, 0),
(43, 36, 1, 0),
(44, 36, 2, 0),
(45, 36, 3, 0),
(46, 36, 4, 0),
(47, 36, 5, 0),
(48, 36, 6, 0),
(49, 36, 1, 0),
(50, 36, 2, 0),
(51, 36, 3, 0),
(52, 36, 4, 0),
(53, 36, 5, 0),
(54, 36, 6, 0),
(55, 37, 1, 0),
(56, 37, 2, 0),
(57, 37, 3, 0),
(58, 37, 4, 0),
(59, 37, 5, 0),
(60, 37, 6, 0),
(61, 38, 1, 0),
(62, 38, 2, 0),
(63, 38, 3, 0),
(64, 38, 4, 0),
(65, 38, 5, 0),
(66, 38, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `sem` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `sem`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, 'S3'),
(4, 'S4'),
(5, 'S5'),
(6, 'S6');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `admn_no` varchar(100) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parent_pass` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `course_id`, `sem_id`, `name`, `admn_no`, `father_name`, `mother_name`, `address`, `phone`, `email`, `parent_pass`) VALUES
(36, 1, 1, 'Tony', '100', 'Tom', 'Kochurani', 'Home', '9343244543', 'mail@gmail.com', '$2y$10$Gura92vhU5ohzw8mUs0wjO1e5./53Y8QLKVq9Lt8PzT/cuIfVm9Hu'),
(37, 1, 1, 'Gokul', '101', 'Gokuls father', 'Gokuls mother', 'Home', '123455', 'gokul@gmail.com', '$2y$10$MHx6i2vI1/nkkO6pXf0ir.jFKDH4RgoWkpEqKQFMoVhfho17lrOpK'),
(38, 1, 1, 'Tony', '109', 'Father', 'Mother', 'Chundakkattil House, Athirampuzha P O', '9495532248', 'tony@artincodes.com', '$2y$10$smtCslsnit7q1MVmJ8JcneZVmh7MH..sTm2HNOH5SA09C8ladTWii');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `course_id`, `sem_id`) VALUES
(1, 'English-I (Common)', 1, 1),
(2, 'Mathematics (Complementary)', 1, 1),
(3, 'Basic Statistics (Complementary)', 1, 1),
(4, 'Introduction to Computers (Core)', 1, 1),
(5, 'Methodology of Programming and programming in C (Core)', 1, 1),
(6, 'Software Lab I (Core)', 1, 1),
(7, 'English-II (Common)', 1, 2),
(8, 'Discrete Mathematics ( Complementary)', 1, 2),
(9, 'Accounting & Programming in Cobol (Core)', 1, 2),
(10, 'Data Structures (Core)', 1, 2),
(11, 'Fundamentals of Digital Systems (Core)', 1, 2),
(12, 'Software Lab- II (Core)', 1, 2),
(13, 'Advanced Statistical Methods (Complementary)', 1, 3),
(14, 'Design and Analysis Of Algorithms (Core)', 1, 3),
(15, 'Computer Organization & Architecture. (Core)', 1, 3),
(16, 'Computer Graphics (Core)', 1, 3),
(17, 'Object Oriented Programming and C++ (Core)', 1, 3),
(18, 'Software Lab III (Core)', 1, 3),
(19, 'Operational Research (Complementary)', 1, 4),
(20, 'Microprocessor & PC Hardware (Core)', 1, 4),
(21, 'System Analysis & Design (Core)', 1, 4),
(22, 'Database Management Systems (Core)', 1, 4),
(23, 'Visual Programming Techniques (Core)', 1, 4),
(24, 'Software Lab IV (Core)', 1, 4),
(25, 'Computer Networks (core)', 1, 5),
(26, 'Operating Systems (core)', 1, 5),
(27, 'Java Programming (core)', 1, 5),
(28, 'Open Course (core)', 1, 5),
(29, 'Software Lab V (core)', 1, 5),
(30, 'Software Development Lab I (Mini Project) (core)', 1, 5),
(31, 'Web Technology(core)', 1, 6),
(32, 'Software Engineering (core)', 1, 6),
(33, 'Elective (core)', 1, 6),
(34, 'Seminar', 1, 6),
(35, 'Software Development Lab II ( Main Project)', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `username`, `password`, `verified`, `gender`, `dob`) VALUES
(9, 'Swathi Cherian', 'swati@gmail.com', '$2y$10$v3GKQrC8RygqE84laTemfeiojNzXgyySjyW80vXu5stmKMV.gUDka', 1, 'female', '16/12/1993'),
(10, 'gokul', 'gokul@gmail.com', '$2y$10$o6JkJAdEix4TjBap.V4bHelHU3V8Icpcv1BnTcGpUVJ7CJ4.uQ56e', 1, 'male', '16-Dec-1993');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`id`, `teacher_id`, `subject_id`) VALUES
(7, 9, 1),
(8, 9, 2),
(9, 9, 3),
(10, 9, 4),
(11, 9, 5),
(12, 9, 6),
(13, 9, 8),
(14, 9, 9),
(15, 10, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `student_id_2` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id_2` (`student_id`),
  ADD KEY `subject_id_2` (`subject_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admn_no` (`admn_no`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `sem_id` (`sem_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id_2` (`teacher_id`),
  ADD KEY `subject_id_2` (`subject_id`),
  ADD KEY `teacher_id_3` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `teacher_subject_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
