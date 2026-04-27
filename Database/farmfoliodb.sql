-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 09:03 AM
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
-- Database: `farmfoliodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `appointment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `fid`, `did`, `appointment_time`) VALUES
(1, 1, 2, '2025-05-09 14:44:23'),
(2, 18, 2, '2025-05-10 13:46:46'),
(3, 18, 2, '2025-05-10 13:46:48'),
(4, 1, 4, '2025-05-11 18:15:30'),
(5, 2, 4, '2025-05-11 18:17:27'),
(6, 1, 1, '2025-05-11 19:02:04'),
(7, 1, 5, '2025-05-11 19:02:09'),
(8, 1, 2, '2025-05-11 19:02:10'),
(9, 1, 1, '2025-05-11 19:03:52'),
(10, 1, 6, '2025-05-11 19:08:13'),
(11, 1, 2, '2025-05-13 05:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `breedingdetails`
--

CREATE TABLE `breedingdetails` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `tagno` bigint(20) NOT NULL,
  `breeding_status` varchar(100) NOT NULL,
  `last_breeding_date` date DEFAULT NULL,
  `expected_calving_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breedingdetails`
--

INSERT INTO `breedingdetails` (`id`, `fid`, `tagno`, `breeding_status`, `last_breeding_date`, `expected_calving_date`) VALUES
(1, 1, 123456, 'Dry', NULL, NULL),
(2, 1, 123456, 'Pregnant', '2025-04-30', '2025-05-15'),
(3, 2, 178901, 'Dry', NULL, NULL),
(4, 1, 190123, 'Pregnant', '2025-04-01', '2025-07-10'),
(5, 2, 145678, 'Upcoming Calving', '2025-01-15', '2025-05-20'),
(6, 1, 123457, 'Pregnant', '2025-03-10', '2025-06-15'),
(7, 1, 235673, 'Dry', NULL, NULL),
(8, 2, 456789, 'Upcoming Calving', '2025-02-05', '2025-05-25'),
(9, 3, 101231, 'Heat', NULL, NULL),
(10, 2, 178901, 'Upcoming Calving', NULL, NULL),
(11, 1, 987654, 'Heat', NULL, NULL),
(12, 1, 654321, 'Upcoming Calving', NULL, NULL),
(13, 1, 123456, 'Pregnant', '2025-05-01', '2025-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `cattledetails`
--

CREATE TABLE `cattledetails` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `cattle_type` varchar(100) NOT NULL,
  `tagno` bigint(20) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cattledetails`
--

INSERT INTO `cattledetails` (`id`, `fid`, `cattle_type`, `tagno`, `breed`, `age`, `gender`, `weight`, `height`) VALUES
(1, 1, 'cow', 123457, 'gir', 5, 'Female', 63, 92),
(2, 1, 'cow', 123456, 'gir', 10, 'Female', 130, 120),
(3, 1, 'Buffalo', 654321, 'Mehsana', 12, 'Male', 400.5, 156),
(4, 1, 'cow', 987654, 'gir', 15, 'Female', 135.4, 118),
(5, 2, 'cow', 456789, 'gir', 21, 'Female', 245, 123),
(6, 2, 'Cow', 145678, 'gir', 12, 'Female', 420.5, 130.2),
(7, 3, 'Buffalo', 156789, 'Murrah', 13, 'Female', 500, 140),
(8, 2, 'Bull', 167890, 'Kankrej', 10, 'Male', 550.3, 145.6),
(9, 2, 'Cow', 178901, 'Sahiwal', 12, 'Female', 390, 128.4),
(10, 3, 'Calf', 189012, 'Jersey', 1, 'Male', 120.5, 90),
(11, 1, 'Cow', 190123, 'Red Sindhi', 6, 'Female', 460.2, 135.7),
(12, 2, 'Calf', 101234, 'gir', 4, 'Female', 65, 94),
(13, 2, 'Buffalo', 23132, 'Mehsana', 3, 'Female', 495.6, 138.9),
(14, 2, 'Calf', 234256, 'Holstein Friesian', 2, 'Female', 40, 95),
(15, 1, 'Bull', 235673, 'Ongole', 5, 'Male', 560, 150),
(16, 1, 'Calf', 543210, 'gir', 3, 'Female', 59, 90),
(17, 3, 'cow', 101231, 'gie', 18, 'Female', 127.4, 142.5),
(18, 1, 'Calf', 856014, 'gir', 2, 'Female', 65, 91);

-- --------------------------------------------------------

--
-- Table structure for table `doctordetails`
--

CREATE TABLE `doctordetails` (
  `did` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `dnumber` varchar(20) NOT NULL,
  `dlocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctordetails`
--

INSERT INTO `doctordetails` (`did`, `dname`, `dnumber`, `dlocation`) VALUES
(1, 'Paavan', '7435866849', 'vallabh vidyanagar'),
(2, 'Miloni', '9586858635', 'napad'),
(3, 'Tisha', '9913379000', 'mogri'),
(4, 'Kalp', '8200381120', 'anand'),
(5, 'Shrey', '9876543211', 'napad'),
(6, 'Kishan', '8269381121', 'vallabh vidyanagar'),
(7, 'Henil', '9438775560', 'mogri'),
(8, 'Sikha', '9586843547', 'anand'),
(9, 'Mirali', '7655409869', 'anand'),
(10, 'Krish', '8970684325', 'napad'),
(11, 'Tej', '8671020215', 'mogri'),
(12, 'mihir', '9824905787', 'vallabh vidhyanagar'),
(13, 'vishal ', '9019891290', 'mogri');

-- --------------------------------------------------------

--
-- Table structure for table `farmerdetails`
--

CREATE TABLE `farmerdetails` (
  `fid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `fnumber` varchar(20) NOT NULL,
  `flocation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmerdetails`
--

INSERT INTO `farmerdetails` (`fid`, `fname`, `fnumber`, `flocation`) VALUES
(1, 'Agam', '9429019891', 'napad'),
(2, 'Prachi', '8469483416', 'mogri'),
(3, 'kinnari', '9737442255', 'vallabh vidyanagar'),
(4, 'Manan', '8758285993', 'anand'),
(5, 'Ravi', '9876543210', 'anand'),
(6, 'Anita', '8765432109', 'mogri'),
(7, 'Nisha', '9234567890', 'napad'),
(8, 'Dev', '9345678901', 'napad'),
(9, 'Meet', '9123456780', 'vallabh vidyanagar'),
(10, 'Sneha', '9871112233', 'mogri'),
(11, 'Neha', '9862223344', 'anand'),
(12, 'Veer', '9706531280', 'napad'),
(13, 'Kevin', '9808889900', 'vallabh vidyanagar'),
(14, 'Vrunda', '9826667788', 'mogri'),
(15, 'Devansh', '9493875022', 'napad'),
(16, 'Deep', '9753344556', 'mogri'),
(17, 'Kunj', '7086954730', 'anand'),
(18, 'Prakash', '9834546631', 'mogri'),
(19, 'deep', '9834661024', 'napad');

-- --------------------------------------------------------

--
-- Table structure for table `healthdetails`
--

CREATE TABLE `healthdetails` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `tagno` bigint(20) NOT NULL,
  `health_type` varchar(100) NOT NULL,
  `health_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthdetails`
--

INSERT INTO `healthdetails` (`id`, `fid`, `tagno`, `health_type`, `health_date`) VALUES
(1, 1, 123456, 'Vaccination', '2025-05-01'),
(2, 2, 178901, 'Deworming', '2025-04-15'),
(3, 1, 235673, 'Vaccination', '2025-05-05'),
(4, 3, 156789, 'Illness', '2025-03-28'),
(5, 2, 234256, 'Vaccination', '2025-04-20'),
(6, 1, 543210, 'Vaccination', '2025-05-10'),
(7, 1, 654321, 'Deworming', '2025-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_type` enum('doctor','farmer') NOT NULL,
  `receiver_type` enum('doctor','farmer') NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `sender_type`, `receiver_type`, `receiver_id`, `message`, `timestamp`) VALUES
(1, 1, 'farmer', 'doctor', 2, 'Hello', '2025-05-09 16:01:15'),
(2, 2, 'doctor', 'farmer', 1, 'Hii', '2025-05-09 16:01:38'),
(3, 1, 'farmer', 'doctor', 2, 'Hello Doctor', '2025-05-10 12:01:07'),
(4, 2, 'doctor', 'farmer', 1, 'hello farmers', '2025-05-10 12:31:17'),
(5, 18, 'farmer', 'doctor', 2, 'Hello Doctor', '2025-05-10 13:46:59'),
(6, 1, 'farmer', 'doctor', 4, 'Hello', '2025-05-11 18:15:36'),
(7, 2, 'farmer', 'doctor', 4, 'Hello Doctor', '2025-05-11 18:17:14'),
(8, 4, 'doctor', 'farmer', 2, 'Hello Farmer', '2025-05-11 18:19:03'),
(9, 1, 'farmer', 'doctor', 4, 'Hello', '2025-05-11 18:49:36'),
(10, 1, 'farmer', 'doctor', 2, 'He\'ll', '2025-05-11 19:02:20'),
(11, 1, 'farmer', 'doctor', 2, 'Hiii', '2025-05-11 19:02:30'),
(12, 1, 'farmer', 'doctor', 1, 'Hello Doctor', '2025-05-11 19:08:20'),
(13, 1, 'farmer', 'doctor', 6, 'Hey doctor', '2025-05-11 19:08:36'),
(14, 2, 'doctor', 'farmer', 1, 'Hello farmer', '2025-05-11 19:10:58'),
(15, 2, 'doctor', 'farmer', 18, 'Hello', '2025-05-11 19:11:10'),
(16, 2, 'doctor', 'farmer', 1, 'hello', '2025-05-12 18:12:25'),
(17, 1, 'farmer', 'doctor', 2, 'Hii', '2025-05-12 18:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pdetails` varchar(255) NOT NULL,
  `ppacking` int(11) NOT NULL,
  `pimage` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`pid`, `pname`, `pdetails`, `ppacking`, `pimage`) VALUES
(1, 'Amul Super Dan', 'High yielding cattle and buffalo', 25, 'product_681e114795c524.72730759_1746800967.jpeg'),
(2, 'Amul Power Dan', 'Animal giving milk to 10L/Day', 25, 'product_681e29def10ef2.27999773_1746807263.jpeg'),
(3, 'Amul Pregnancy Feed', 'Cattle feed for pregnant animals', 30, 'product_681e2a2deff2b9.38812475_1746807341.jpeg'),
(4, 'Amul Buffalo Feed', 'Replacement of Contton seed cake with Bypass Fat, Bypass Protein, Minerals and Vitamins', 50, 'product_681e2af7a33906.48232807_1746807543.jpeg'),
(5, 'Amul Power Mixture', 'milking animal producing up to 10 litters of milk per day', 50, 'product_681e2c14cf4451.74727043_1746807828.jpeg'),
(6, 'Nutri Power Pellet High Five Feed', 'high yielding cattle and buffalo', 50, 'product_681e2f8256d143.67787115_1746808706.jpeg'),
(7, 'Amul Calf starter', 'Calf feed', 5, 'product_681e2fc0415377.77633570_1746808768.jpeg'),
(8, 'Jeevan ( Calf Milk Replacer)', 'Protein based calf milk replacers', 5, 'product_681e2fdbd2f889.13047549_1746808795.jpeg'),
(10, 'Amul mixture product', 'cattle feeds', 25, 'product_68218062cb0592.89113396_1747026018.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breedingdetails`
--
ALTER TABLE `breedingdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fid` (`fid`),
  ADD KEY `tagno` (`tagno`);

--
-- Indexes for table `cattledetails`
--
ALTER TABLE `cattledetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tagno` (`tagno`),
  ADD KEY `cattledetails_ibfk_1` (`fid`);

--
-- Indexes for table `doctordetails`
--
ALTER TABLE `doctordetails`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `dnumber` (`dnumber`);

--
-- Indexes for table `farmerdetails`
--
ALTER TABLE `farmerdetails`
  ADD PRIMARY KEY (`fid`,`fnumber`),
  ADD UNIQUE KEY `fnumber` (`fnumber`);

--
-- Indexes for table `healthdetails`
--
ALTER TABLE `healthdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fid` (`fid`),
  ADD KEY `tagno` (`tagno`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `breedingdetails`
--
ALTER TABLE `breedingdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cattledetails`
--
ALTER TABLE `cattledetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctordetails`
--
ALTER TABLE `doctordetails`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farmerdetails`
--
ALTER TABLE `farmerdetails`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `healthdetails`
--
ALTER TABLE `healthdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `breedingdetails`
--
ALTER TABLE `breedingdetails`
  ADD CONSTRAINT `breedingdetails_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `farmerdetails` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `breedingdetails_ibfk_3` FOREIGN KEY (`tagno`) REFERENCES `cattledetails` (`tagno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cattledetails`
--
ALTER TABLE `cattledetails`
  ADD CONSTRAINT `cattledetails_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `farmerdetails` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `healthdetails`
--
ALTER TABLE `healthdetails`
  ADD CONSTRAINT `healthdetails_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `farmerdetails` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `healthdetails_ibfk_2` FOREIGN KEY (`tagno`) REFERENCES `cattledetails` (`tagno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
