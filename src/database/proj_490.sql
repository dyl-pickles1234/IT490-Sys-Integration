-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2025 at 12:53 AM
-- Server version: 8.0.43-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_490`
--

-- --------------------------------------------------------

--
-- Table structure for table `builds`
--

CREATE TABLE `builds` (
  `build_id` int NOT NULL,
  `user_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpu_id` int DEFAULT NULL,
  `motherboard_id` int DEFAULT NULL,
  `ram_id` int DEFAULT NULL,
  `gpu_id` int DEFAULT NULL,
  `psu_id` int DEFAULT NULL,
  `cooler_id` int DEFAULT NULL,
  `storage_id` int DEFAULT NULL,
  `case_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `builds`
--

INSERT INTO `builds` (`build_id`, `user_id`, `name`, `cpu_id`, `motherboard_id`, `ram_id`, `gpu_id`, `psu_id`, `cooler_id`, `storage_id`, `case_id`) VALUES
(1, 23, 'My First Build!', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpu`
--

CREATE TABLE `cpu` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cpu`
--

INSERT INTO `cpu` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Ryzen 7 5800x', 180.00, 'Amazon', 'https://www.amazon.com/AMD-Ryzen-5800X-16-Thread-Processor/dp/B0815XFSGK?th=1', '2,3,4,5,23,766'),
(2, 'Intel Core i7-12700KF', 200.00, 'Amazon', 'https://www.amazon.com/Corei7-Processor-12700KF-3-6GHz-BX8071512700KF/dp/B09GYJJ1PT', '');

-- --------------------------------------------------------

--
-- Table structure for table `cpu_old`
--

CREATE TABLE `cpu_old` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `speed` decimal(4,2) NOT NULL,
  `cores` int UNSIGNED NOT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cpu_old`
--

INSERT INTO `cpu_old` (`product_id`, `name`, `speed`, `cores`, `platform`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Ryzen 7 5800x', 3.80, 8, 'AM4', 180.00, 'Amazon', 'https://www.amazon.com/AMD-Ryzen-5800X-16-Thread-Processor/dp/B0815XFSGK?th=1', '2,3,4,5,23,766'),
(2, 'Intel Core i7-12700KF', 3.60, 12, 'LGA 1700', 200.00, 'Amazon', 'https://www.amazon.com/Corei7-Processor-12700KF-3-6GHz-BX8071512700KF/dp/B09GYJJ1PT', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT (curdate()),
  `content` varchar(4095) NOT NULL,
  `images` varchar(255) NOT NULL,
  `comments` varchar(2047) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `author`, `date`, `content`, `images`, `comments`, `likes`) VALUES
(1, 'My First Super Awesome Post', 'Dylan DiPalma', '2025-10-21', 'Hey guys! This is my first post ever!\r\n\r\nI really love it here and I think the community is aweseome. BLAH BLAH BALHA. post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post YEAHHHHHH BABEYYYY WOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post  EHAHEAHHHY ALRIGHGTT YEAHHH WOOOP', 'dog.jpg,pc.jpg', '{\"comments\": [{\"comment\": \"I really love this\", \"author\": \"Big Joe\"}, {\"comment\": \"OMG OMG OMGOMGOMGOMGOMGOM THIS IS SOOOOO SICK WOWOWOWOWOW LOV IT\", \"author\": \"Enthusiastic Joe\"}, {\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}, {\"comment\": \"i am tiny\", \"author\": \"Little Joe\"}]}', 42),
(2, 'My Second, Distinctly Less Awesome Post', 'Dylan DiPalma', '2025-10-21', 'Hey guys! poop now.', 'dog.jpg', '{\"comments\": [{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}, {\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}, {\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"},{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"},{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"},{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}]}', 42);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int UNSIGNED NOT NULL,
  `session_id` char(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `expires` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_id`, `email`, `f_name`, `l_name`, `user_id`, `expires`) VALUES
(62, '01e9f89a71406d1ba0daab46d27e4fc07b5ac7239067da027e349fc7c6fef625', 'guest@gmail.com', 'Meek', 'Hadi', 26, 1761108180),
(65, '50c3aafaddd3550e4950f1dae3ae2436500a0500eaf0a4dd0fdb0a2219f9bf24', 'ddd@njit.edu', 'dylan', 'dipalma', 23, 1761132090);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `f_name`, `l_name`) VALUES
(23, 'ddd@njit.edu', 'password', 'dylan', 'dipalma'),
(26, 'guest@gmail.com', '123456', 'Meek', 'Hadi'),
(27, 'test@njit.edu', 'test', 'dd', 'doo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`build_id`);

--
-- Indexes for table `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cpu_old`
--
ALTER TABLE `cpu_old`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `builds`
--
ALTER TABLE `builds`
  MODIFY `build_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpu_old`
--
ALTER TABLE `cpu_old`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
