-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 12:40 PM
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
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_subscription`
--

CREATE TABLE `data_subscription` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `subs_date` date DEFAULT NULL,
  `name` text NOT NULL,
  `no_telp` int(13) NOT NULL,
  `plan` varchar(256) NOT NULL,
  `meal_type` text NOT NULL,
  `delivery_days` mediumtext NOT NULL,
  `address` mediumtext NOT NULL,
  `note` mediumtext NOT NULL,
  `payment_method` text NOT NULL,
  `total_harga` int(100) NOT NULL,
  `status` varchar(20) DEFAULT 'Active',
  `pause_start` date DEFAULT NULL,
  `pause_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_subscription`
--

INSERT INTO `data_subscription` (`id`, `user_id`, `subs_date`, `name`, `no_telp`, `plan`, `meal_type`, `delivery_days`, `address`, `note`, `payment_method`, `total_harga`, `status`, `pause_start`, `pause_end`) VALUES
(9, 3, '2025-07-01', 'Joko Wesker', 2147483647, 'Protein', 'breakfast', 'friday, saturday, sunday', 'Jakarta', '', 'Cash On Delivery', 516000, 'cancelled', '2025-07-05', '2025-07-06'),
(10, 3, '2025-07-01', 'Dan', 1208319222, 'Protein', 'lunch', 'tuesday, wednesday, thursday', 'bandung', 'Extra Vegetable', 'Cash On Delivery', 516000, 'cancelled', NULL, NULL),
(11, 3, '2025-07-01', 'Resky', 2147483647, 'Royal', 'dinner', 'tuesday, thursday, saturday, sunday', 'Jakarta', '-', 'Cash On Delivery', 1032000, 'paused', '2025-07-02', '2025-07-06'),
(12, 3, '2025-07-01', 'budiman setiawan luhur', 839973929, 'Royal', 'dinner', 'monday, tuesday, wednesday', 'Jakarta', '-', 'Cash On Delivery', 774000, 'paused', '2025-07-08', '2025-07-10'),
(13, 3, '2025-07-01', 'ARIF', 2147483647, 'Protein', 'lunch, dinner', 'monday, tuesday, thursday', 'GAMPING', '-', 'Cash On Delivery', 1032000, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE `testimonies` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `message` longtext NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`id`, `name`, `message`, `rating`) VALUES
(1, 'Riza', 'Wow wow just wow', 5),
(2, 'Budi', 'Mantap sukses terus buat SEA Ccatering\r\n', 5),
(3, 'Stephanny', 'Sangat Enak ga ada lawan, porsi cukup cocok buat gue yang ga bisa makan banyak, rasanya oke cocok di lidah dan kerasa banget bahannya punya  kualitas', 5),
(4, 'Tyler', 'Cool food, amazing taste, all marvelous ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `profile_image`) VALUES
(3, 'Tyler Rake', 'Tyler@mail.com', 'de80f8de93e42a3223ff64088ceae3ca685f0b9ba3c3e02bf7fd5162e046062c', 'user', 'profile_3_1751363252.jpg'),
(6, 'Brian', 'Brian@mail.com', '3fbef0522a8dc678df05f7135526d8db4da9d88d61915e945261d92cbdb1b224', 'admin', NULL),
(7, 'Akmal', 'Akmal@mail.com', '9b4f4d896f80da83aa3e72037ef3e2beccda3b8aa2e9c7d9ac1c2b33a87dce95', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_subscription`
--
ALTER TABLE `data_subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_subscription`
--
ALTER TABLE `data_subscription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_subscription`
--
ALTER TABLE `data_subscription`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
