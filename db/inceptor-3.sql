-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2023 at 09:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inceptor`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `price`, `status`) VALUES
(3, 'Electronic Repair Training', 45000, 1),
(9, 'Mobile Repair Training', 35000, 1),
(10, 'Computer Repair Training', 45000, 1),
(11, 'Computer and Mobile Repair Training', 70000, 1),
(12, 'CCTV & ALARM', 45000, 1),
(13, 'Graphics Design', 45000, 1),
(14, 'Digital Marketing', 60000, 1),
(19, 'React Native', 16000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `githublink` text NOT NULL,
  `ytlink` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `marks` int(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`firstname`, `lastname`, `phone`, `githublink`, `ytlink`, `course`, `marks`, `status`) VALUES
('Jim', 'Choo', 112163919, 'git.io', 'yt.io', 'Mobile Repair Training', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `regfee` int(255) NOT NULL DEFAULT 0,
  `course` varchar(255) NOT NULL,
  `course2` varchar(255) NOT NULL DEFAULT '0',
  `start` date NOT NULL,
  `duration` int(255) NOT NULL DEFAULT 0,
  `firstly` int(255) NOT NULL DEFAULT 0,
  `pdone` varchar(255) NOT NULL DEFAULT '0',
  `secondly` int(255) NOT NULL DEFAULT 0,
  `pdtwo` varchar(255) NOT NULL DEFAULT '0',
  `thirdly` int(255) NOT NULL DEFAULT 0,
  `pdthree` varchar(255) NOT NULL DEFAULT '0',
  `fourthly` int(255) NOT NULL DEFAULT 0,
  `pdfour` varchar(255) NOT NULL DEFAULT '0',
  `fifthly` int(255) NOT NULL DEFAULT 0,
  `pdfive` varchar(255) NOT NULL DEFAULT '0',
  `discount` int(255) NOT NULL DEFAULT 0,
  `totally` int(255) NOT NULL DEFAULT 0,
  `admission_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `phone`, `parent`, `p_phone`, `regfee`, `course`, `course2`, `start`, `duration`, `firstly`, `pdone`, `secondly`, `pdtwo`, `thirdly`, `pdthree`, `fourthly`, `pdfour`, `fifthly`, `pdfive`, `discount`, `totally`, `admission_date`, `status`) VALUES
(12, 'Ben', 'Kaberia', '0112163919', 'Inceptor', '0114068776', 1500, 'Graphics Design', 'Electronic Repair Training', '0000-00-00', 0, 12000, '2023-06-27', 1000, '2023-06-27', 3000, '2023-06-30', 0, '', 0, '', 0, 35000, '2023-06-26', 1),
(13, 'Jim', 'Choo', '0112163919', 'Irving', '0114068774', 1500, 'Mobile Repair Training', '0', '0000-00-00', 4, 1000, '2023-06-26', 4000, '2023-06-30', 0, '', 2000, '', 0, '', 0, 35000, '2023-07-05', 1),
(14, 'Collo', 'Muemah', '0112163919', 'Inceptor', '0114068775', 0, 'Computer Repair Training', '0', '2023-06-28', 0, 1000, '', 0, '', 0, '', 0, '', 0, '', 0, 45000, '2023-06-26', 1),
(15, 'Lyn', 'Alice', '0978763434', 'Inceptor', '983463478', 0, 'Mobile Repair Training', '0', '2023-07-06', 0, 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, 0, '2023-07-13', 1),
(16, 'Xyz', 'yyt', '092745345', 'bnvnbvnb', '9873495738', 0, 'CCTV & ALARM', 'Mobile Repair Training', '2023-07-14', 0, 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, 0, '2023-07-13', 1),
(17, 'Kyrie', 'Irving', '0798765432', 'Lebron', '0789653423', 0, 'React Native', 'select course 2', '2023-08-03', 0, 3000, '', 0, '', 0, '', 0, '', 0, '', 12000, -12000, '2023-08-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `email`, `phone`, `password`) VALUES
(1, 'Patricia', 'lihanda@gmail.com', '12345678', '25d55ad283aa400af464c76d713c07ad'),
(2, 'Jim', 'jimmy@gmail.com', '09873534', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
