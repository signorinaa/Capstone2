-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 11:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conde`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `Email`, `password`) VALUES
(30402010, 'John Paul', 'Bon', 'admin@gmail.com', 'shane1234');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(50) DEFAULT NULL,
  `ClassDescription` text DEFAULT NULL,
  `gradeLevel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `ClassName`, `ClassDescription`, `gradeLevel`) VALUES
(1, 'Underdogs', NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `EnrollmentID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `ClassID` int(11) DEFAULT NULL,
  `EnrollDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`EnrollmentID`, `StudentID`, `ClassID`, `EnrollDate`) VALUES
(1, 10203040, 1, '2023-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `FacultyID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`, `password`) VALUES
(1, 'Roi Vincent', 'Razon', 'roirazon@gmail.com', '09500330571', 'Bukal, Lemery, Batangas', '123456789'),
(2, 'Hazel', 'Perez', NULL, NULL, NULL, NULL),
(3, 'Ana', 'Hortelano', NULL, NULL, NULL, NULL),
(4, 'Irene', 'Flores', NULL, NULL, NULL, NULL),
(5, 'Donna', 'Furto', NULL, NULL, NULL, NULL),
(6, 'Liezel', 'Samson', NULL, NULL, NULL, NULL),
(7, 'Dian', 'Carmona', NULL, NULL, NULL, NULL),
(8, 'Dr. Phreey', 'Noche', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `GradingID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `Grade` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`GradingID`, `StudentID`, `SubjectID`, `Grade`) VALUES
(1, 10203040, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `ScheduleID` int(11) NOT NULL,
  `ClassID` int(11) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `DayOfWeek` varchar(10) DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Room` varchar(50) DEFAULT NULL,
  `Instructor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`ScheduleID`, `ClassID`, `SubjectID`, `DayOfWeek`, `StartTime`, `EndTime`, `Room`, `Instructor`) VALUES
(1, 1, 1, 'Monday', '07:15:00', '08:15:00', 'H101', NULL),
(2, 1, 2, 'Monday', '08:15:00', '09:15:00', 'H102', NULL),
(3, 1, 3, 'Monday', '09:30:00', '10:30:00', 'H103', NULL),
(4, 1, 4, 'Monday', '10:30:00', '11:30:00', 'H104', NULL),
(5, 1, 5, 'Monday', '11:30:00', '12:30:00', 'H105', NULL),
(6, 1, 6, 'Monday', '13:15:00', '14:15:00', 'H106', NULL),
(7, 1, 7, 'Monday', '14:15:00', '15:15:00', 'H107', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `EnrollmentStatus` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `FatherName` varchar(100) DEFAULT NULL,
  `MotherName` varchar(100) DEFAULT NULL,
  `Image` blob DEFAULT NULL,
  `FatherPhone` varchar(50) DEFAULT NULL,
  `FatherAdd` varchar(100) DEFAULT NULL,
  `MotherPhone` varchar(50) DEFAULT NULL,
  `MotherAdd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `FirstName`, `LastName`, `DateOfBirth`, `Email`, `Phone`, `Address`, `password`, `EnrollmentStatus`, `MiddleName`, `Gender`, `FatherName`, `MotherName`, `Image`, `FatherPhone`, `FatherAdd`, `MotherPhone`, `MotherAdd`) VALUES
(10203040, 'John Paul', 'Bon', '2023-11-07', 'bonjohnpaul@gmail.com', '09500330571', 'Edville st. Cuta batangas city', 'bon1234', 'Enrolled', 'Tabinas', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(100) DEFAULT NULL,
  `SubjectCode` varchar(20) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectID`, `SubjectName`, `SubjectCode`, `Description`) VALUES
(1, 'Oral Communication', 'OC11', NULL),
(2, 'Kuminikasyon', 'K11', NULL),
(3, 'GEN.MATHEMATICS', 'G11', NULL),
(4, 'EMPOWERMNENT TECH', 'E11', NULL),
(5, 'Intro to world Religion', 'I11', NULL),
(6, 'Earth and life Science', 'ELF11', NULL),
(7, 'Creative Non-Function', 'CN11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachingassignments`
--

CREATE TABLE `teachingassignments` (
  `AssignmentID` int(11) NOT NULL,
  `FacultyID` int(11) DEFAULT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `AcademicYear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachingassignments`
--

INSERT INTO `teachingassignments` (`AssignmentID`, `FacultyID`, `SubjectID`, `AcademicYear`) VALUES
(0, 1, 1, NULL),
(1, 2, 1, NULL),
(2, 1, 2, NULL),
(3, 4, 3, NULL),
(4, 5, 4, NULL),
(5, 6, 5, NULL),
(6, 7, 6, NULL),
(7, 8, 7, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`FacultyID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`GradingID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectID`),
  ADD UNIQUE KEY `SubjectCode` (`SubjectCode`);

--
-- Indexes for table `teachingassignments`
--
ALTER TABLE `teachingassignments`
  ADD PRIMARY KEY (`AssignmentID`),
  ADD KEY `FacultyID` (`FacultyID`),
  ADD KEY `SubjectID` (`SubjectID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`);

--
-- Constraints for table `grading`
--
ALTER TABLE `grading`
  ADD CONSTRAINT `grading_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`),
  ADD CONSTRAINT `grading_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `subjects` (`SubjectID`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `subjects` (`SubjectID`);

--
-- Constraints for table `teachingassignments`
--
ALTER TABLE `teachingassignments`
  ADD CONSTRAINT `teachingassignments_ibfk_1` FOREIGN KEY (`FacultyID`) REFERENCES `faculty` (`FacultyID`),
  ADD CONSTRAINT `teachingassignments_ibfk_2` FOREIGN KEY (`SubjectID`) REFERENCES `subjects` (`SubjectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
