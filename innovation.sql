-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 11:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innovation`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `roll_number` varchar(100) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `roll_number`, `student_id`) VALUES
(20, 'Da Lyfstyle Fitness', 'Address\r\n\r\nAditya Mall Basement, Kala Patthar Road, Way Adjacent To Big Bazar, Indirapuram (Noida), 201014', 'uploads/Screenshot (6).png', '840083', NULL),
(21, 'zxcxvvcb msdhjas ADDJHAJSDF', 'SNDJS ajhds ddhgfhj sndsshdf', 'uploads/Screenshot (2).png', '12050', NULL),
(22, 'cdsvfd', 'this isdemo a', 'uploads/Screenshot (6).png', '12562', NULL),
(23, 'test jnxfsfs', 'nfdg Here are the best free apps for creating social media graphics', 'uploads/Screenshot (3).png', '12562', NULL),
(24, 'k jfjhjk kdfjhjk', 'fjdkfh sdjhfdj jhfj djhfjgh', 'uploads/Screenshot (5).png', '12567', NULL),
(25, 'sfhjg skdkjdfhdjh gsjfhjdg', 'sdjf kjfh jdjfhfjg', 'uploads/Screenshot (2).png', '12567', NULL),
(26, 'sfd msfhjkfd sjdh fdj', 'asfdgfdkj f sjfhdjh sjfhdjh', 'uploads/Screenshot (6).png', '1245', NULL),
(27, 'mbvjdfm ,sdjcsk fj', ',zmcxcnxj dhkhjdf gh', 'uploads/Screenshot (5).png', '18706', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roll_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `roll_number`, `password`) VALUES
(52, 'fgdffh', 'anitapatel2050@gmail.com', 'aesfrsyt', 'qi8F0iLy'),
(53, 'dzxfgfdsgdf', 'anitapatel2050@gmail.com', '12325334', 'i7RbYxEN'),
(54, 'admin', 'anitapatel2050@gmail.com', '12345', 'QcQXO86x'),
(55, 'anita', 'anitapatel2050@gmail.com', '18706', '6ADJKt1X'),
(56, 'abcd', 'ads@gmail.com', '12024', '97588199'),
(57, 'himanshu', 'himansh11@gmailcom', '12562', '39753328'),
(58, 'nidhi', 'nidhi50@gmail.com', '12756', '24433205'),
(59, 'survi', 'survi234@gmail.com', '12050', '32060830'),
(60, 'admin', 'admin@admin.com', '1245', 'xJf32xL2'),
(61, 'jatin', 'jatin50@gmail.com', '12567', 'ySDdxEf3'),
(62, 'ankita', 'ankita22@gmail.com', '11111', '41dVqa4d'),
(63, 'alka', 'alka232@gmail.com', '840083', '85623298'),
(64, 'msdf', 'zvv20@gmail.com', '14654', '48043712'),
(65, 'fddgfd', 'dgfhg22@gmail.com', '12348', '73489451'),
(66, 'vineet', 'vini133@gmil.com', '16832', '64080255');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_number` (`roll_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
