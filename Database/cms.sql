-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 05:32 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `id` int(9) NOT NULL,
  `lec_hall` varchar(255) NOT NULL,
  `capacity` int(9) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `busy` tinyint(2) NOT NULL,
  `current_capacity` int(255) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_room`
--

INSERT INTO `class_room` (`id`, `lec_hall`, `capacity`, `subject_name`, `location`, `busy`, `current_capacity`, `lecturer_id`) VALUES
(1, '101', 250, NULL, 'Ground', 0, 0, NULL),
(3, '102', 50, NULL, 'Ground', 0, 0, NULL),
(5, 'Lab 1', 65, NULL, 'Ground', 0, 0, NULL),
(6, 'Lab 2', 80, NULL, 'First', 0, 0, NULL),
(8, '103', 70, NULL, 'Ground', 0, 0, 0),
(9, '104', 75, NULL, 'Ground', 0, 0, NULL),
(10, '105', 80, NULL, 'Ground', 0, 0, 0),
(11, '106', 80, NULL, 'Ground', 0, 0, 0),
(12, '107', 90, NULL, 'Ground', 0, 0, 0),
(13, '108', 90, NULL, 'Ground', 0, 0, NULL),
(20, 'Staff Lauge', 75, NULL, 'First', 0, 0, NULL),
(21, '109', 110, NULL, 'Ground', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(2) NOT NULL,
  `dep_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`) VALUES
(1, 'MIT'),
(2, 'Management'),
(3, 'Bcom');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_attendance_table`
--

CREATE TABLE `lecturer_attendance_table` (
  `id` int(10) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dep_id` int(2) NOT NULL,
  `pro_pic_location` varchar(5000) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `sms` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer_attendance_table`
--

INSERT INTO `lecturer_attendance_table` (`id`, `u_id`, `password`, `name`, `dep_id`, `pro_pic_location`, `description`, `attendance`, `sms`) VALUES
(1, 'sabraz', 's', 'Ms.Sabraz Nawaz', 1, '', 'Senior Lecturer', 1, 'now'),
(2, 'irshad', 'i', 'Ms.MBM Irshad', 1, '', 'Senior Lecturer | Dept. Head', 0, ''),
(3, 'hasmi', 'h', 'Ms.AJM Hasmi', 1, '', 'Senior Lecturer', 1, NULL),
(4, 'rashida', 'r', 'Ms.Rashida', 1, '', 'Senior Lecturer', 1, NULL),
(5, 'murshitha', 'm', 'Ms.SM Murshitha', 1, '', 'Senior Lecturer', 1, NULL),
(6, 'erandi', 'e', 'Ms.Erandi Lekamge', 1, '', 'Demo', 1, NULL),
(7, 'rauf', 'r', 'Ms.Rauf', 3, '', 'Senior Lecturer | Dept. Head', 0, NULL),
(8, 'shafeena', 's', 'Ms.MAC Shafeena', 2, '', 'Senior Lecturer | Dept. Head', 1, NULL),
(9, 'musthafa', 'm', 'Ms.Musthafa', 2, '', 'Senior Lecturer', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_table`
--

CREATE TABLE `news_table` (
  `id` int(9) NOT NULL,
  `admin_id` int(9) DEFAULT NULL,
  `lecturer_id` int(9) DEFAULT NULL,
  `news` varchar(2000) NOT NULL,
  `news_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_table`
--

INSERT INTO `news_table` (`id`, `admin_id`, `lecturer_id`, `news`, `news_date`) VALUES
(2, NULL, 1, 'a', '2018-03-16'),
(3, 0, NULL, 'This is the third testing news for the CMS system', '2018-03-09'),
(4, 0, NULL, 'another msg from admin', '1994-04-05'),
(11, 0, NULL, 'Good Morning', '2018-03-16'),
(23, NULL, 2, 'this message from me', '2018-03-16'),
(32, NULL, 7, 'df', '0000-00-00'),
(34, 0, NULL, 'this notice from admin on sunday', '2018-03-18'),
(35, NULL, 4, 'this is testing msg', '2018-03-18'),
(36, NULL, 1, 'now now', '2018-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(500) NOT NULL,
  `student_reg_no` varchar(100) NOT NULL,
  `semester` int(9) NOT NULL,
  `department_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `student_reg_no`, `semester`, `department_id`) VALUES
(1, 'Gayathra Kalana Laksuran', 'SEU/IS/13/MIT/050', 4, 2),
(3, 'Isura Hirantha Somarathna', 'SEU/IS/13/MIT/070', 5, 3),
(4, 'Shalika Dilrukshi', 'SEU/IS/13/MIT/101', 5, 1),
(5, 'Rukshan', 'SEU/IS/13/MIT/070', 3, 1),
(6, 'Ashraf', 'SEU/IS/13/MIT/111', 1, 1),
(7, 'Isuru', 'SEU/IS/13/MIT/099', 1, 1),
(8, 'Loshanthan', 'SEU/IS/13/MIT/058', 1, 1),
(9, 'Jamhar', 'SEU/IS/13/MIT/092', 1, 1),
(13, 's', 'SEU/IS/13/MIT/042', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_reg_no` varchar(50) NOT NULL,
  `lecturer_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `student_reg_no`, `lecturer_id`, `subject_id`, `semester_id`, `department_id`, `attendance_date`, `attendance`) VALUES
(1, 5, 'SEU/IS/13/MIT/070', 1, 1, 1, 1, '2018-03-20', 1),
(2, 6, 'SEU/IS/13/MIT/111', 1, 1, 1, 1, '2018-03-20', 1),
(5, 7, 'SEU/IS/13/MIT/99', 1, 1, 1, 1, '2018-03-20', 1),
(6, 8, 'SEU/IS/13/MIT/58', 1, 1, 1, 1, '2018-03-20', 1),
(7, 9, 'SEU/IS/13/MIT/92', 1, 1, 1, 1, '2018-03-20', 1),
(8, 5, 'SEU/IS/13/MIT/70', 2, 2, 1, 1, '2018-03-20', 1),
(9, 6, 'SEU/IS/13/MIT/111', 2, 2, 1, 1, '2018-03-20', 1),
(10, 7, 'SEU/IS/13/MIT/99', 2, 2, 1, 1, '2018-03-20', 1),
(11, 8, 'SEU/IS/13/MIT/58', 2, 2, 1, 1, '2018-03-20', 0),
(12, 9, 'SEU/IS/13/MIT/92', 2, 2, 1, 1, '2018-03-20', 0),
(13, 5, 'SEU/IS/13/MIT/70', 1, 1, 1, 1, '2018-03-21', 0),
(14, 5, 'SEU/IS/13/MIT/070', 1, 3, 1, 1, '2018-03-21', 1),
(15, 5, '', 1, 1, 1, 1, '2018-03-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `semester` int(2) NOT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `number_of_students` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_code`, `subject_name`, `semester`, `lecturer_id`, `number_of_students`) VALUES
(1, '11012', 'D B M S', 5, 1, 100),
(2, '11022', 'Networking', 2, 2, 100),
(3, '32033', 'Operations management', 6, 8, 91),
(4, '21022', 'IPT', 3, 3, 75),
(5, '32043', 'new', 1, 1, 101),
(6, '41023', 'Testin', 7, 9, 45);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `table_id` int(255) NOT NULL,
  `semester_id` int(2) NOT NULL,
  `department_id` int(11) NOT NULL,
  `time_of` varchar(255) NOT NULL,
  `monday` varchar(1000) DEFAULT NULL,
  `tuesday` varchar(1000) DEFAULT NULL,
  `wednsday` varchar(1000) DEFAULT NULL,
  `thursday` varchar(1000) DEFAULT NULL,
  `friday` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`table_id`, `semester_id`, `department_id`, `time_of`, `monday`, `tuesday`, `wednsday`, `thursday`, `friday`) VALUES
(1, 1, 1, '8.30-9.30', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: '),
(2, 1, 1, '9.30-10.30', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: '),
(3, 1, 1, '10.30-11.30', ' Lecture Hall  Lecturer:  Subject: ', ' Lecture Hall  Lecturer:  Subject: ', ' Lecture Hall  Lecturer:  Subject: ', ' Lecture Hall  Lecturer:  Subject: ', ' Lecture Hall  Lecturer:  Subject: '),
(4, 1, 1, '11.30-12.30', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: '),
(5, 1, 1, '1.30-2.30', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: '),
(6, 1, 1, '2.30-3.30', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: ', ' Lecture Hall:  Lecturer:  Subject: '),
(7, 1, 1, '3.30-4.30', ' Lecture Hall:  Lecturer:  Subject:  ', ' Lecture Hall:  Lecturer:  Subject:  ', ' Lecture Hall:  Lecturer:  Subject:  ', ' Lecture Hall:  Lecturer:  Subject:  ', ' Lecture Hall:  Lecturer:  Subject:  ');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(9) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `username`, `password`, `name`, `birthday`) VALUES
(0, 'admin', 'admin', 'Admin', '1994-04-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `lecturer_attendance_table`
--
ALTER TABLE `lecturer_attendance_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_table`
--
ALTER TABLE `news_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `subject-lecturer-id` (`lecturer_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lecturer_attendance_table`
--
ALTER TABLE `lecturer_attendance_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news_table`
--
ALTER TABLE `news_table`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `table_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
