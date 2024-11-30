-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Nov 30, 2024 at 05:57 PM
=======
-- Generation Time: Nov 25, 2024 at 05:08 PM
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `f_name`, `l_name`) VALUES
<<<<<<< HEAD
(1, 'kuresh', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Al Kuresh', 'Muna'),
(2, 'sifat', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Sifat', 'Sadik'),
=======
(1, 'sanam', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Sanam Ara', 'Niloy'),
(2, 'abir', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abir Al', 'Mahdi'),
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7
(3, 'mahee', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Nazifa', 'Tasnim');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
<<<<<<< HEAD
  `class_name` int(11) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `Days` varchar(50) DEFAULT NULL,
  `teacher's_Payment` decimal(10,2) DEFAULT NULL,
  `class_time` varchar(16) DEFAULT NULL
=======
  `class_id` int(11) NOT NULL,
  `class` varchar(31) NOT NULL,
  `class_code` varchar(7) NOT NULL
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

<<<<<<< HEAD
INSERT INTO `class` (`class_name`, `class_code`, `Days`, `teacher's_Payment`, `class_time`) VALUES
(10, '10Bio', 'Tuesday', 5000.00, '04:30 -05:45 pm'),
(10, '10Chem', 'Tuesday', 5000.00, '08:00-09:15 am'),
(10, '10Eng', 'Sunday', 4000.00, '06:00-07:00 pm'),
(10, '10Ict', 'Tuesday', 4000.00, '06:00-07:00 pm'),
(10, '10Math', 'Sunday', 5000.00, '04:30-05:45 pm'),
(10, '10Phy', 'Sunday', 5000.00, '08:00-09:15 am'),
(11, '11Bio', 'Monday', 6000.00, '04:30-05:45 pm'),
(11, '11Chem', 'Monday', 6000.00, '08:00-09:15 am'),
(11, '11Eng', 'Monday', 5000.00, '06:00-07:00 pm'),
(11, '11Ict', 'Wednesday', 5000.00, '06:00-07:00 pm'),
(11, '11Math', 'Wednesday', 6000.00, '08:00-09:15 am'),
(11, '11Phy', 'Wednesday', 6000.00, '04:30-05:45 pm'),
(12, '12Bio', 'Sunday', 6000.00, '12:00-01:00 pm'),
(12, '12Chem', 'Sunday', 6000.00, '01:15-02:15 pm'),
(12, '12Eng', 'Sunday', 5000.00, '07:00-08:00 am'),
(12, '12Ict', 'Monday', 5000.00, '07:00-08:00am'),
(12, '12Math', 'Monday', 6000.00, '12:00-01:00 pm'),
(12, '12Phy', 'Monday', 6000.00, '01:15-02:15 pm'),
(9, '9Bio', 'Thursday', 5000.00, '04:30-05:45 pm'),
(9, '9Chem', 'Thursday', 5000.00, '08:00-09:15 am'),
(9, '9Eng', 'Thursday', 4000.00, '07:00-08:00 am'),
(9, '9Ict', 'Saturday', 4000.00, '04:30-05:45 pm'),
(9, '9Math', 'Saturday', 5000.00, '08:00-09:15 am'),
(9, '9Phy', 'Saturday', 5000.00, '07:00-08:00 am');
=======
INSERT INTO `class` (`class_id`, `class`, `class_code`) VALUES
(1, '9', 'SSC_1'),
(2, '10', 'SSC_2'),
(3, '11', 'HSC_1'),
(4, '12', 'HSC_2');
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_code` varchar(50) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `class_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `password`, `f_name`, `l_name`, `student_id`, `class_code`, `Address`, `class_name`) VALUES
('samir', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Shamir', 'onanto', 1, '10Phy', 'DIT, Narayangonj', 10),
('radi', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Radi', 'Yan', 2, '10Phy', 'Bandar, Narayangonj', 10),
('abhi', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abhisekh', 'Ujjol', 3, '11Chem', 'Bashundhara R/A, Dhaka', 11);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL,
  `subject_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `subject_code`) VALUES
(1, 'Physics', 101),
(2, 'Chemistry', 102),
(3, 'Maths', 103),
(4, 'Biology', 104),
(5, 'English', 105),
(6, 'ICT', 106);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL,
  `subject_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `subject_code`) VALUES
(1, 'Physics', 101),
(2, 'Chemistry', 102),
(1, 'Maths', 103),
(1, 'Biology', 104);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
<<<<<<< HEAD
  `subject_code` int(3) NOT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL
=======
  `class` int(11) NOT NULL,
  `subject_code` int(3) NOT NULL
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

<<<<<<< HEAD
INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `f_name`, `l_name`, `subject_code`, `class_code`, `Address`) VALUES
(1, 'abrar', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abrar', 'Yasir', 103, '12Math', 'Bandar, Narayangonj'),
(2, 'araf', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abdullah Al', 'Mahmud', 101, '12Phy', 'Azimpur,Dhaka'),
(3, 'hamja', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Amir Ali', 'Hamja', 105, '10Eng', 'Bandar, Narayangonj'),
(4, 'rumman', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Mehedi Hasan', 'Rumman', 101, '10Phy', 'Bandar, Narayangonj'),
(5, 'kuresh', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Al Kuresh', 'Muna', 102, '10Chem', 'Bandar,Narayangonj'),
(6, 'Tanvir', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Tanvir', 'Ahmed', 104, '10Bio', 'Signboard, Narayangonj\r\n'),
(7, 'safat', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Shafayet', 'Karim', 104, '11Bio', 'Bashundhara R/A, Dhaka'),
(8, 'shakib', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Junaid', 'Ahammed', 106, '11Ict', 'Mirpur, Narayangonj'),
(9, 'nafis', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Nafis', 'Nadim', 101, '9Phy', 'Palashi, Dhaka'),
(10, 'rIfat', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Mahmudul Hasa', 'Rifat', 103, '10Math', 'Panthapath,Dhaka');
=======
INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `f_name`, `l_name`, `class`, `subject_code`) VALUES
(1, 'pronoy', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Khalid', 'Pronoy', 0, 101),
(2, 'samia', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Samia', 'Khan', 0, 102);
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
<<<<<<< HEAD
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_class_code` (`class_code`);
=======
  ADD UNIQUE KEY `username` (`username`);
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
<<<<<<< HEAD
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
<<<<<<< HEAD
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_class_code` FOREIGN KEY (`class_code`) REFERENCES `class` (`class_code`) ON DELETE CASCADE ON UPDATE CASCADE;
=======
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 5be267d2ac6469c8ae12fb24941bc50bdcf142b7
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
