-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 11:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--
CREATE DATABASE IF NOT EXISTS `lms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lms`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `noOfCopies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `title`, `author`, `publisher`, `noOfCopies`) VALUES
(1, 'Introduction to Algorithms', 'Charles E. Leiserson, Thomas H. Cormen', 'MIT Press', 0),
(2, 'Database Design and Implementation', 'Howard Gould', 'Bookboon', 10),
(3, 'Introduction to Web Services With Java', 'Kiet T. Tran,PhD', 'The Ebook Company', 20),
(4, 'Digital Thinking and Mobile Teaching ', 'Dr. Julie Reinhart; Dr. Renee Robinson', 'Digital Library', 15),
(5, 'Building Information Modeling ', 'Yusuf Arayici', 'India Tech Forum', 15),
(6, 'Business Information Management', 'Dr. Vladena Benson; Kate Davis', 'Oregon Book Shelf ', 20),
(7, 'Technology-Based Enterprenuership', 'Dr. Brychan Thomas', 'FreeDigital Market', 30),
(8, 'Semantic Web and Ontology', 'Dhana Nandini', 'Eastern Indonesia BookShop', 25),
(9, 'Artifical Intelligence - Agents and Environments', 'William John Teahan', 'Greek Modern ', 25),
(10, 'An Introduction to Microsoft OS ', 'Einar Krogh', 'Microsoft Corporation', 30),
(11, 'Automation and Robotics', 'Dr. Militidias A. Boboulous', 'University of Vienna', 10);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowerID` varchar(20) NOT NULL,
  `bookID` int(11) NOT NULL,
  `issueDate` date NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowerID`, `bookID`, `issueDate`, `returnDate`) VALUES
('IMC/BCS/15/00001', 1, '2017-02-01', '2017-02-06'),
('IMC/BCS/15/00002', 1, '2017-01-31', '2017-02-07'),
('IMC/BCS/15/00002', 2, '2017-02-05', '2017-02-10'),
('IMC/BCS/15/00002', 3, '2017-02-06', '2017-02-16'),
('IMC/BCS/15/00002', 5, '2017-02-06', '2017-02-11'),
('IMC/BCS/15/00002', 10, '2017-02-06', '2017-02-08'),
('IMC/BCS/15/00003', 1, '2017-01-30', '2017-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` varchar(20) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `memberType` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `firstName`, `lastName`, `memberType`, `gender`, `email`) VALUES
('IFM/PF.001', 'Denis', 'Lupiana', 'Lecturer', 'Male', 'lupiana@ifm.ac.tz'),
('IFM/PF.002', 'Zanifa', 'Omary', 'Lecturer', 'Female', 'zanifa@ifm.ac.tz'),
('IFM/PF.003', 'Ediger', 'Msangawale', 'Lecturer', 'Male', 'msangawale@ifm.ac.tz'),
('IFM/PF.004', 'Juma', 'Khamisi', 'Librarian', 'Male', 'jumakhamis@ifm.ac.tz'),
('IFM/PF.005', 'Hawa', 'Juma', 'Librarian', 'Female', 'hawajuma@ifm.ac.tz'),
('IMC/BCS/15/00001', 'Mashavu', 'Abdallah', 'Student', 'Female', 'mashavuabdallah@yahoo.com'),
('IMC/BCS/15/00002', 'Aretus', 'Lyimo', 'Student', 'Male', 'aretuslyimo@gmail.com'),
('IMC/BCS/15/00003', 'Makoye', 'Mashimba', 'Student', 'Male', 'mmakoye@gmail.com'),
('IMC/BCS/15/00004', 'Francisco', 'Maruma', 'Student', 'Male', 'franciscomaruma@gmail.com'),
('IMC/BCS/15/00005', 'Hamza', 'Lusigi', 'Student', 'Male', 'hamzalusigi@gmail.com'),
('IMC/BCS/15/00006', 'Ernest', 'John', 'Student', 'Male', 'ernestjohn@gmail.com'),
('IMC/BCS/15/00007', 'Macha', 'Mkunde', 'Student', 'Female', 'machamkunde@gmail.com'),
('IMC/BCS/15/00008', 'Aaron', 'Duke', 'Student', 'Male', 'aaronduke@gmail.com'),
('IMC/BCS/15/00009', 'Ruth', 'Mkemwa', 'Student', 'Female', 'ruthmkemwa@gmail.com'),
('IMC/BCS/15/00010', 'Priscillah', 'Mwakalindile', 'Student', 'Female', 'priscillahmwakalindile@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `memberID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userID`, `username`, `password`, `level`, `memberID`) VALUES
(1, 'IFM/PF.004', '64a50f002ad5b697a71b040517579a8c', 'Librarian', 'IFM/PF.004'),
(2, 'Masha', '68c52c49d8983edeb5a488b3812ce678', 'Member', 'IMC/BCS/15/00001'),
(3, 'Aretus', 'cfb21f6088e7cca0598a7458bfe3d13d', 'Member', 'IMC/BCS/15/00002'),
(4, 'Mashimba', '0575048ff759581f041a05207fd95780', 'Member', 'IMC/BCS/15/00003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowerID`,`bookID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
