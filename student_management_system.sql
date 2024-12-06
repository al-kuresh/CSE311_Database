-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 10:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(1, 'kuresh', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Al Kuresh', 'Muna'),
(2, 'sifat', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Sifat', 'Sadik'),
(3, 'mahee', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Nazifa', 'Tasnim');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_name` int(11) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `Days` varchar(50) DEFAULT NULL,
  `teacher's_Payment` decimal(10,2) DEFAULT NULL,
  `class_time` varchar(16) DEFAULT NULL,
  `student_payment` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_name`, `class_code`, `Days`, `teacher's_Payment`, `class_time`, `student_payment`) VALUES
(10, '10Bio', 'Tuesday', 5000.00, '04:30 -05:45 pm', 1200.00),
(10, '10Chem', 'Tuesday', 5000.00, '08:00-09:15 am', 1200.00),
(10, '10Eng', 'Sunday', 4000.00, '06:00-07:00 pm', 1200.00),
(10, '10Ict', 'Tuesday', 4000.00, '06:00-07:00 pm', 1200.00),
(10, '10Math', 'Sunday', 5000.00, '04:30-05:45 pm', 1200.00),
(10, '10Phy', 'Sunday', 5000.00, '08:00-09:15 am', 1200.00),
(11, '11Bio', 'Monday', 6000.00, '04:30-05:45 pm', 1500.00),
(11, '11Chem', 'Monday', 6000.00, '08:00-09:15 am', 1500.00),
(11, '11Eng', 'Monday', 5000.00, '06:00-07:00 pm', 1500.00),
(11, '11Ict', 'Wednesday', 5000.00, '06:00-07:00 pm', 1500.00),
(11, '11Math', 'Wednesday', 6000.00, '08:00-09:15 am', 1500.00),
(11, '11Phy', 'Wednesday', 6000.00, '04:30-05:45 pm', 1500.00),
(12, '12Bio', 'Sunday', 6000.00, '12:00-01:00 pm', 1500.00),
(12, '12Chem', 'Sunday', 6000.00, '01:15-02:15 pm', 1500.00),
(12, '12Eng', 'Sunday', 5000.00, '07:00-08:00 am', 1500.00),
(12, '12Ict', 'Monday', 5000.00, '07:00-08:00am', 1500.00),
(12, '12Math', 'Monday', 6000.00, '12:00-01:00 pm', 1500.00),
(12, '12Phy', 'Monday', 6000.00, '01:15-02:15 pm', 1500.00),
(9, '9Bio', 'Thursday', 5000.00, '04:30-05:45 pm', 1000.00),
(9, '9Chem', 'Thursday', 5000.00, '08:00-09:15 am', 1000.00),
(9, '9Eng', 'Thursday', 4000.00, '07:00-08:00 am', 1000.00),
(9, '9Ict', 'Saturday', 4000.00, '04:30-05:45 pm', 1000.00),
(9, '9Math', 'Saturday', 5000.00, '08:00-09:15 am', 1000.00),
(9, '9Phy', 'Saturday', 5000.00, '07:00-08:00 am', 1000.00);

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
('samir', '$2y$10$xRe2DtQt1MFmsC.a0bQWtee11MBimoUrlwYIddoe854kr0KWvDiK6', 'Shamir', 'onanto', 1, '10Phy', 'DIT, Narayangonj', 10),
('radi', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Radi', 'Yan', 2, '10Phy', 'Bandar, Narayangonj', 10),
('abhi', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abhisekh', 'Ujjol', 3, '11Chem', 'Bashundhara R/A, Dhaka', 11),
('sur', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Surja', 'Adham', 4, '10Math', 'Bashundhara R/A, Dhaka', 10),
('reh', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Rehnuma', 'Mahjabin', 5, '11Chem', 'Bandar, Narayanganj', 11),
('meem', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Meem', 'Rahman', 6, '9Eng', 'Uttara, Dhaka', 9),
('oma', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Omar', 'Sadik', 7, '9Math', 'Badda, Dhaka', 9),
('mehd', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Mehedi', 'Hasan', 8, '9Phy', 'Badda, Dhaka', 9),
('sai', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Saiham', 'Sami', 9, '10Eng', 'Badda, Dhaka', 10),
('bad', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Badhon', 'Minhaj', 10, '10Ict', 'Uttara, Dhaka', 10),
('abu', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abu', 'Sadat', 11, '10Bio', 'Badda, Dhaka', 10),
('malh', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Maliha', 'Aronno', 12, '12Bio', 'Banasree, Dhaka', 12),
('far', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Farihaa', 'Ahmed', 13, '12Math', 'Dhanmondi, Dhaka', 12),
('tasf', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Tasfia', 'Haque', 14, '12Ict', 'Dhanmondi, Dhaka', 12),
('umm', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Umme ', 'Sani', 15, '12Bio', 'Mirpur, Dhaka', 12),
('fou', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Fouzia', 'Luna', 16, '10Math', 'Badda, Dhaka', 10),
('moi', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Moinul', 'Haque', 17, '10Chem', 'Mirpur, Dhaka', 10),
('ish', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Ishraka', 'Jahir', 18, '9Chem', 'Badda, Dhaka', 9),
('sif', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Sifat', 'Ullah', 19, '9Ict', 'Mirpur, Dhaka', 9),
('ishm', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Ishmam', 'Ahmed', 20, '10Bio', 'Gulistan, Dhaka', 10),
('isht', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Ishtiaq', 'Ahmed', 21, '10Math', 'Badda, Dhaka', 10),
('nabil', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Nabil', 'Ahmed', 22, '9Ict', 'Mirpur, Dhaka', 9),
('orna', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Zerin', 'Orna', 23, '10Eng', 'Badda, Dhaka', 10),
('nafi', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Wasif', 'Nafi', 24, '10Eng', 'Uttara, Dhaka', 10),
('arif', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Ariful', 'Islam', 25, '9Chem', 'Mirpur, Dhaka', 9),
('moh', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Mohibul', 'Hasan', 26, '9Chem', 'Uttara, Dhaka', 9),
('gal', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Galib', 'Ahsan', 27, '9Math', 'Uttara, Dhaka', 9),
('jahn', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Jahan', 'Nahin', 28, '10Bio', 'Badda, Dhaka', 10),
('abd', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Abid', 'Pasha', 29, '10Eng', 'Dhanmondi, Dhaka', 10),
('saima', '$2b$12$0gXzSYA5m4ZWGHx85O.9N.sKfQx.kDg6p3vPdkvFktUFxFNFqUR7W', 'Saima', 'Abedin', 30, '11Chem', 'Uttara, Dhaka', 11);

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `student_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`student_id`, `profile_picture`) VALUES
(1, '45f13ce4f214bf4f18d707886a3036b2.jpg');

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
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `subject_code` int(3) NOT NULL,
  `class_code` varchar(255) DEFAULT NULL,
  `Address` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `teacher_profiles`
--

CREATE TABLE `teacher_profiles` (
  `teacher_id` int(11) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_profiles`
--

INSERT INTO `teacher_profiles` (`teacher_id`, `profile_picture`) VALUES
(4, 'male_teacher.webp');

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
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_class` (`class_code`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_class_code` (`class_code`);

--
-- Indexes for table `teacher_profiles`
--
ALTER TABLE `teacher_profiles`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_class` FOREIGN KEY (`class_code`) REFERENCES `class` (`class_code`) ON UPDATE CASCADE;

--
-- Constraints for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD CONSTRAINT `student_profiles_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_class_code` FOREIGN KEY (`class_code`) REFERENCES `class` (`class_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_profiles`
--
ALTER TABLE `teacher_profiles`
  ADD CONSTRAINT `teacher_profiles_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
