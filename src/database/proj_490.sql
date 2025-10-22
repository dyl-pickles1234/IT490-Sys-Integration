-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2025 at 02:55 PM
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
(1, 23, 'My Build!', 1, 1, 5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `case`
--

CREATE TABLE `case` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case`
--

INSERT INTO `case` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Ryzen 7 5800x', 180.00, 'Amazon', 'https://www.amazon.com/AMD-Ryzen-5800X-16-Thread-Processor/dp/B0815XFSGK?th=1', '2,3,4,5,766,23'),
(2, 'Intel Core i7-12700KF', 199.99, 'Amazon', 'https://www.amazon.com/Corei7-Processor-12700KF-3-6GHz-BX8071512700KF/dp/B09GYJJ1PT', ''),
(3, 'Intel Core i7-14700K', 329.99, 'Amazon', 'https://www.amazon.com/dp/B0CGJ41C9W', ''),
(4, 'AMD Ryzen 7 9800X3D', 459.98, 'Amazon', 'https://www.amazon.com/dp/B0DKFMSMYK', ''),
(5, 'Intel Core i7-7700K', 125.00, 'Amazon', 'https://www.amazon.com/dp/B01MXSI216', '');

-- --------------------------------------------------------

--
-- Table structure for table `cooler`
--

CREATE TABLE `cooler` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cooler`
--

INSERT INTO `cooler` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Gigabyte X570 AORUS PRO WIFI', 424.00, 'Amazon', 'https://www.amazon.com/dp/B07STNZF9L', ''),
(2, 'Asus PRIME B550M-A WIFI II', 99.99, 'Amazon', 'https://www.amazon.com/dp/B0B5M97W1T', ''),
(3, 'MSI PRO Z790-A MAX WIFI', 239.99, 'Amazon', 'https://www.amazon.com/dp/B0CJSJ9TB3', ''),
(4, 'MSI B760 GAMING PLUS WIFI', 159.99, 'Amazon', 'https://www.amazon.com/dp/B0C15THTK7', ''),
(5, 'ASRock H370M-HDV', 71.50, 'Amazon', 'https://www.amazon.com/dp/B08TV9LWGL', '');

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
(1, 'Ryzen 7 5800x', 180.00, 'Amazon', 'https://www.amazon.com/AMD-Ryzen-5800X-16-Thread-Processor/dp/B0815XFSGK?th=1', '2,3,4,5,766,23'),
(2, 'Intel Core i7-12700KF', 199.99, 'Amazon', 'https://www.amazon.com/Corei7-Processor-12700KF-3-6GHz-BX8071512700KF/dp/B09GYJJ1PT', ',29'),
(3, 'Intel Core i7-14700K', 329.99, 'Amazon', 'https://www.amazon.com/dp/B0CGJ41C9W', ''),
(4, 'AMD Ryzen 7 9800X3D', 459.98, 'Amazon', 'https://www.amazon.com/dp/B0DKFMSMYK', ''),
(5, 'Intel Core i7-7700K', 125.00, 'Amazon', 'https://www.amazon.com/dp/B01MXSI216', '');

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
-- Table structure for table `gpu`
--

CREATE TABLE `gpu` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gpu`
--

INSERT INTO `gpu` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Gigabyte GAMING OC Radeon RX 9070 XT', 709.99, 'Amazon', 'https://www.amazon.com/dp/B0DS2QG2KW', ''),
(2, 'MSI GeForce RTX 3060 Ventus 2X', 279.99, 'Amazon', 'https://www.amazon.com/dp/B08WPRMVWB', ''),
(3, 'Gigabyte WINDFORCE OC SFF GeForce RTX 5070', 579.99, 'Amazon', 'https://www.amazon.com/dp/B0DTQMLX4F', ''),
(4, 'Intel Limited Edition Arc B580', 290.00, 'Amazon', 'https://www.amazon.com/dp/B0DPM9923G', ''),
(5, 'XFX GTS XXX Radeon RX 580', 149.99, 'Amazon', 'https://www.amazon.com/dp/B06Y66K3XD', '');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Gigabyte X570 AORUS PRO WIFI', 424.00, 'Amazon', 'https://www.amazon.com/dp/B07STNZF9L', ''),
(2, 'Asus PRIME B550M-A WIFI II', 99.99, 'Amazon', 'https://www.amazon.com/dp/B0B5M97W1T', ''),
(3, 'MSI PRO Z790-A MAX WIFI', 239.99, 'Amazon', 'https://www.amazon.com/dp/B0CJSJ9TB3', ''),
(4, 'MSI B760 GAMING PLUS WIFI', 159.99, 'Amazon', 'https://www.amazon.com/dp/B0C15THTK7', ''),
(5, 'ASRock H370M-HDV', 71.50, 'Amazon', 'https://www.amazon.com/dp/B08TV9LWGL', '');

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
  `comments` varchar(2047) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{"comments": []}',
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `author`, `date`, `content`, `images`, `comments`, `likes`) VALUES
(1, 'My First Super Awesome Post', 'Dylan DiPalma', '2025-10-21', 'Hey guys! This is my first post ever!\r\n\r\nI really love it here and I think the community is aweseome. BLAH BLAH BALHA. post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post YEAHHHHHH BABEYYYY WOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOpost post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post post  EHAHEAHHHY ALRIGHGTT YEAHHH WOOOP', 'dog.jpg,pc.jpg', '{\"comments\":[{\"comment\":\"d\",\"author\":\"dylan dipalma\"},{\"comment\":\"w\'ggl\'e\",\"author\":\"dylan dipalma\"},{\"comment\":\"w\'ggl\\\"e\",\"author\":\"dylan dipalma\"}]}', 42),
(2, 'My Second, Distinctly Less Awesome Post', 'Dylan DiPalma', '2025-10-21', 'Hey guys! poop now.', 'dog.jpg', '{\"comments\": [{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}, {\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}, {\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"},{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"},{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"},{\"comment\": \"I\'m going to kill you.\", \"author\": \"Evil Joe\"}]}', 43),
(9, 'WEEE', 'dylan dipalma', '2025-10-22', 'YEHAHEHE BEBEY', 'dog.jpg', '{\"comments\":[{\"comment\":\"woo\",\"author\":\"dylan dipalma\"},{\"comment\":\"okay hell yeah\",\"author\":\"dylan dipalma\"},{\"comment\":null,\"author\":null},{\"comment\":null,\"author\":null},{\"comment\":null,\"author\":null},{\"comment\":null,\"author\":null},{\"comment\":\"qcsqscq\",\"author\":\"dylan dipalma\"}]}', 22),
(10, 'boo', 'dylan dipalma', '2025-10-22', 'cbwejnwjikcniw', '', '{\"comments\":[{\"comment\":\"goo bd\",\"author\":\"dylan dipalma\"}]}', 1),
(11, 'My buidld', 'dylan dipalma', '2025-10-22', 'Check out my build!\n\n-My First Build!-\nCPU: Intel Core i7-12700KF\nMobo: \nRAM: \nGPU: \nPSU: \nCooler: \nStorage: \nCase: \n\nTotal: $199.99\n', '', '{\"comments\":[{\"comment\":\"ok...\",\"author\":\"dylan dipalma\"}]}', 1),
(12, 'wscdwdv', 'dylan dipalma', '2025-10-22', 'Check out my build!\n\n-My First Build!-\nCPU: Intel Core i7-12700KF\nMobo: \nRAM: \nGPU: \nPSU: \nCooler: \nStorage: \nCase: \n\nTotal: $199.99\n', '', '{\"comments\":[{\"comment\":\"lame\",\"author\":\"Test User\"}]}', 1),
(13, '\"swdsw\'wsd', 'dylan dipalma', '2025-10-22', 'sqwccqe', '', '{\"comments\":[{\"comment\":\"lol rnadona\' \'ss;]e;f\' ]esd\'\\/eds.s\'{\\\"C\'\\\":>ac\",\"author\":\"dylan dipalma\"}]}', 0),
(14, 'we;vd.q\'ev.d\\]d/\'\\wwlv;\';ws', 'dylan dipalma', '2025-10-22', '\nwa\';veb,d\';e\'fd.qel;\'.v\'a;v[\\sd]l[e;sd', '', '{\"comments\": []}', 1),
(17, 'fdsw', 'dylan dipalma', '2025-10-22', '', '', '{\"comments\": []}', 0),
(18, 'Hewwo', 'Test User', '2025-10-22', 'this my first time pls love me', 'dog.jpg', '{\"comments\": []}', 1),
(19, 'my 1rst bild', 'Test User', '2025-10-22', 'Check out my build!\n\n-My Build-\nCPU: Intel Core i7-12700KF\nMobo: MSI PRO Z790-A MAX WIFI\nRAM: G.Skill Ripjaws V 32 GB\nGPU: \nPSU: \nCooler: \nStorage: \nCase: \n\nTotal: $584.71\n', 'pc.jpg', '{\"comments\":[{\"comment\":\"lol epic\",\"author\":\"Test User\"}]}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `psu`
--

CREATE TABLE `psu` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `psu`
--

INSERT INTO `psu` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Gigabyte X570 AORUS PRO WIFI', 424.00, 'Amazon', 'https://www.amazon.com/dp/B07STNZF9L', ''),
(2, 'Asus PRIME B550M-A WIFI II', 99.99, 'Amazon', 'https://www.amazon.com/dp/B0B5M97W1T', ''),
(3, 'MSI PRO Z790-A MAX WIFI', 239.99, 'Amazon', 'https://www.amazon.com/dp/B0CJSJ9TB3', ''),
(4, 'MSI B760 GAMING PLUS WIFI', 159.99, 'Amazon', 'https://www.amazon.com/dp/B0C15THTK7', ''),
(5, 'ASRock H370M-HDV', 71.50, 'Amazon', 'https://www.amazon.com/dp/B08TV9LWGL', '');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Corsair Vengeance RGB 32 GB', 198.99, 'Amazon', 'www.amazon.com/dp/B0BZHTVHN5', ''),
(2, 'Corsair Vengeance LPX 32 GB', 119.99, 'Amazon', 'https://www.amazon.com/dp/B07RW6Z692', ''),
(3, 'G.Skill Trident Z RGB 32 GB', 124.99, 'Amazon', 'https://www.amazon.com/dp/B07Z87ZMN3', ''),
(4, 'TEAMGROUP T-Force Delta RGB 16 GB', 84.99, 'Amazon', 'https://www.amazon.com/dp/B08FBGSPK2', ''),
(5, 'G.Skill Ripjaws V 32 GB', 144.73, 'Amazon', 'https://www.amazon.com/dp/B07Z86WC1Z', ',29');

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

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `product_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `link` varchar(511) NOT NULL,
  `subscribed_users` varchar(8191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`product_id`, `name`, `price`, `site`, `link`, `subscribed_users`) VALUES
(1, 'Gigabyte X570 AORUS PRO WIFI', 424.00, 'Amazon', 'https://www.amazon.com/dp/B07STNZF9L', ''),
(2, 'Asus PRIME B550M-A WIFI II', 99.99, 'Amazon', 'https://www.amazon.com/dp/B0B5M97W1T', ''),
(3, 'MSI PRO Z790-A MAX WIFI', 239.99, 'Amazon', 'https://www.amazon.com/dp/B0CJSJ9TB3', ''),
(4, 'MSI B760 GAMING PLUS WIFI', 159.99, 'Amazon', 'https://www.amazon.com/dp/B0C15THTK7', ''),
(5, 'ASRock H370M-HDV', 71.50, 'Amazon', 'https://www.amazon.com/dp/B08TV9LWGL', '');

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
(23, 'ddd@njit.edu', 'password', 'dylan', 'dipalma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`build_id`);

--
-- Indexes for table `case`
--
ALTER TABLE `case`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `cooler`
--
ALTER TABLE `cooler`
  ADD PRIMARY KEY (`product_id`);

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
-- Indexes for table `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `psu`
--
ALTER TABLE `psu`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `build_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `case`
--
ALTER TABLE `case`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cooler`
--
ALTER TABLE `cooler`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cpu`
--
ALTER TABLE `cpu`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cpu_old`
--
ALTER TABLE `cpu_old`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gpu`
--
ALTER TABLE `gpu`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `psu`
--
ALTER TABLE `psu`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
