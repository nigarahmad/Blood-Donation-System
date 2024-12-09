-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 06:21 PM
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
-- Database: `mypro_bdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_logged_in` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile_number`, `created_at`, `is_logged_in`) VALUES
(6, 'Camilla Horne', 'nygesyva@mailinator.com', 'Pa$$w0rd!', '202', '2024-09-09 13:38:57', 0),
(7, 'Roary Dickerson', 'pudody@mailinator.com', 'Pa$$w0rd!', '902', '2024-09-09 13:39:06', 0),
(9, 'Carissa Gould', 'kenuhe@mailinator.com', '0000', '14', '2024-11-08 16:43:54', 0),
(11, 'Joseph Zamora', 'typupe@mailinator.com', '123', '867', '2024-11-08 17:32:43', 0),
(13, 'Dolan Cabrera', 'vovygaked@mailinator.com', 'Pa$$w0rd!', '392', '2024-11-08 17:34:35', 0),
(14, 'Latifah Fulton', 'kysojy@mailinator.com', 'Pa$$w0rd!', '377', '2024-11-08 17:46:50', 0),
(15, 'Bertha Chambers', 'lozejonah@mailinator.com', 'Pa$$w0rd!', '576', '2024-11-08 20:13:03', 0),
(17, 'Nayda Kelley', 'nyzonocin@mailinator.com', 'Pa$$w0rd!', '653', '2024-11-08 20:13:21', 0),
(19, 'Deanna Hahn', 'qalusufibi@mailinator.com', 'Pa$$w0rd!', '728', '2024-12-09 07:22:12', 0),
(20, 'Clayton Stark', 'kycotedexu@mailinator.com', 'Pa$$w0rd!', '107', '2024-12-09 07:25:30', 0),
(21, 'Cassady Floyd', 'fise@mailinator.com', 'Pa$$w0rd!', '501', '2024-12-09 07:28:49', 0),
(22, 'Daria Silva', 'dewisirefa@mailinator.com', 'Pa$$w0rd!', '941', '2024-12-09 10:17:15', 0),
(23, 'Donovan Shaffer', 'giceqo@mailinator.com', 'Pa$$w0rd!', '94', '2024-12-09 16:14:56', 0),
(25, 'Camilla Hayden', 'juhobiqi@mailinator.com', 'Pa$$w0rd!', '982', '2024-12-09 16:15:12', 0),
(27, 'Rachel Delgado', 'bedyjo@mailinator.com', 'Pa$$w0rd!', '319', '2024-12-09 16:15:21', 0),
(28, 'Reece Guy', 'banubefufe@mailinator.com', 'Pa$$w0rd!', '377', '2024-12-09 16:17:05', 0),
(29, 'Kieran Joyce', 'deqy@mailinator.com', 'Pa$$w0rd!', '574', '2024-12-09 16:17:12', 0),
(30, 'admin', 'test@gmail.com', '1234', '234567890', '2024-12-09 16:18:10', 0),
(31, 'Alice Jefferson', 'vigico@mailinator.com', 'Pa$$w0rd!', '375', '2024-12-09 16:46:23', 0),
(32, 'Ahmad', 'nigarahmad491@gmail.com', '1234', '12345678', '2024-12-09 16:50:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation_schedules`
--

CREATE TABLE `donation_schedules` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('pending','completed','canceled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_registration`
--

CREATE TABLE `donor_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` varchar(25) DEFAULT NULL,
  `bgroup` varchar(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `mno` varchar(50) DEFAULT NULL,
  `exbgroup` varchar(50) DEFAULT NULL,
  `registration_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_registration`
--

INSERT INTO `donor_registration` (`id`, `name`, `fname`, `address`, `city`, `age`, `bgroup`, `email`, `mno`, `exbgroup`, `registration_date`) VALUES
(40, 'Owen Perkins', 'Emmanuel Bauer', 'A reprehenderit rati', 'Inventore at ut Nam ', 'Similique amet in l', 'O+', 'byliwov@mailinator.com', '599', NULL, '2024-12-09'),
(41, 'Shaeleigh Estes', 'Cherokee Mayer', 'Molestiae ut dolore ', 'Odit recusandae Lab', 'Mollit id vitae enim', 'A-', 'tivi@mailinator.com', '822', NULL, '2024-12-09'),
(42, 'Brenda Mcfarland', 'McKenzie Pace', 'Aut optio consequat', 'Illum veritatis asp', 'A magni id laudantiu', 'A-', 'baqy@mailinator.com', '437', NULL, '2024-12-09'),
(43, 'Glenna Leon', 'Vera Berg', 'Dolorem enim quis qu', 'Consectetur omnis qu', 'In voluptatibus faci', 'A+', 'terugyn@mailinator.com', '685', NULL, '2024-12-09'),
(44, 'Cassandra Hull', 'Kennan Rich', 'Pariatur Officia au', 'Irure est nesciunt', 'Incididunt esse cup', 'B-', 'hopebo@mailinator.com', '455', NULL, '2024-12-09'),
(46, 'Damon Mayo', 'Sloane Casey', 'Provident quis lore', 'Voluptas ab similiqu', 'Qui aperiam facere q', 'B+', 'camila@mailinator.com', '179', NULL, '2024-12-09'),
(47, 'Nigar Ahmad', 'Halla Garrison', 'mardan', 'mardan', '24', 'B-', 'khaniniga491@gmail.com', '234567890', NULL, '2024-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_b`
--

CREATE TABLE `exchange_b` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL,
  `bgroup` varchar(50) DEFAULT NULL,
  `ebgroup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exchange_b`
--

INSERT INTO `exchange_b` (`id`, `name`, `fname`, `address`, `city`, `age`, `email`, `mno`, `bgroup`, `ebgroup`) VALUES
(9, 'Mah Rukh', 'Akbar Ali', 'Katlang Road, Kodinaka Village, Mardan (23200) KPK', 'Mardan', '22', 'mahrukhsafi200@gmail.com', '03415668744', 'O+', 'A+'),
(10, 'Taqveem', '', '', '', '', '', '03415668744', 'A+', 'A+'),
(11, 'Taqveem', '', '', '', '', '', '03415668744', 'A+', 'A+'),
(12, 'Taqveem', '', '', '', '', '', '03415668744', 'A+', 'A+'),
(13, 'Taqveem', '', '', '', '', '', '03415668744', 'A+', 'A+'),
(14, 'Mah Rukh', 'Akbar Ali', 'Katlang Road, Kodinaka Village, Mardan (23200) KPK', 'Mardan', '3', 'mahrukhsafi200@gmail.com', '03415668744', 'O+', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `out_of_stock`
--

CREATE TABLE `out_of_stock` (
  `id` int(11) NOT NULL,
  `group_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `out_of_stock`
--

INSERT INTO `out_of_stock` (`id`, `group_name`) VALUES
(1, 'A+'),
(2, 'A-'),
(5, 'AB+'),
(6, 'AB-'),
(3, 'B+'),
(4, 'B-'),
(7, 'O+'),
(8, 'O-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `donation_schedules`
--
ALTER TABLE `donation_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donor` (`donor_id`);

--
-- Indexes for table `donor_registration`
--
ALTER TABLE `donor_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange_b`
--
ALTER TABLE `exchange_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_of_stock`
--
ALTER TABLE `out_of_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `donation_schedules`
--
ALTER TABLE `donation_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `donor_registration`
--
ALTER TABLE `donor_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `exchange_b`
--
ALTER TABLE `exchange_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `out_of_stock`
--
ALTER TABLE `out_of_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation_schedules`
--
ALTER TABLE `donation_schedules`
  ADD CONSTRAINT `fk_donor` FOREIGN KEY (`donor_id`) REFERENCES `donor_registration` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
