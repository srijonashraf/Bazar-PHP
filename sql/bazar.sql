-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 12:29 PM
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
-- Database: `bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`) VALUES
('srijon', 'srijon123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(5, 'Mango (Amrupali)', 140.00, 'mango.png'),
(6, 'Lichu', 200.00, 'lichi.png'),
(7, 'Guava', 100.00, 'guava.png'),
(29, 'Orange', 180.00, 'orange.png'),
(31, 'Banana 4Pcs', 40.00, 'banana.png'),
(32, 'Orange - NetBag', 120.00, 'oranges_netting.jpg'),
(33, 'Lifebouy Handwash Yellow', 100.00, 'lifebouy.jpg'),
(36, 'Pran UHT Milk 1Ltr', 120.00, 'pran-uht-milk-100ml.jpg'),
(37, 'Fresh Turmeric Powder 200gm', 75.00, 'fresh-turmeric.jpeg'),
(42, 'Potato', 30.00, 'potato.png'),
(43, 'Brinjal', 80.00, 'brinjal.png'),
(44, 'Atta', 150.00, 'ashirvaad-atta.jpg'),
(45, 'Lays Chips', 50.00, 'lays-kettle-cooked.jpeg'),
(46, 'Drumstick', 250.00, 'drumstick.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
('00123', 'Latifah Webster', 'Timothy Boyd', 'Colby Hickman', 'mawi@mailinator.com', '$2y$10$MtAtis8H3DHsDOjVkrBmcORrfaQNQgSghW90ac/6faVAQIMPe/A0S'),
('08649', 'Zephr Bennett', 'Demetrius Weber', 'nabilaislam', 'kila@mailinator.com', '$2y$10$guKRfUE0LzovvqLkQSMDMuI8qexuFrjr8pTlVWpkBnT6KcfjgyVYS'),
('10046', 'Stephen Kirkland', 'Sybil Stone', 'dddd', 'qaduheqaw@mailinator.com', '$2y$10$UzqNxHRSNwLDqteQxktx3.4Oe6HJ/pJ8po69KgqL/7Y.mzmKAYBNG'),
('13029', 'Srijon', 'Ashraf', 'srijonashrafbd', 'srijonashraf@gmail.com', '$2y$10$8DEJI5ciy75fcmw4onQD1upkGMi56PrhxDiadcHEp9OrZ3jSfx.6q'),
('16713', 'Rylee Cross', 'Eaton Gamble', 'srijontest22', 'dadaqotuw@mailinator.com', 'srijon1234'),
('18563', 'Eliana Wood', 'Mary Rivas', 'abir2002', 'fuxum@mailinator.com', 'abir2002'),
('32779', 'Kasper Powell', 'Madison Haley', 'nabila', 'jywi@mailinator.com', 'Pa$$w0rd!'),
('48443', 'Quon Potter', 'Cally Lowery', 'srijon', 'sypud@mailinator.com', 'Pa$$w0rd!'),
('50477', 'Morgan Figueroa', 'Karina Harmon', 'srijonashraf', 'remaqagyc@mailinator.com', '$2y$10$HbsbCJ1H9CkcvyTEZBUxGuLgSPGyWSwp3lXNSZY6I4KGoH8MOV0xa'),
('52016', 'Wang Bowers', 'Oprah Joyner', 'srijonnnnn', 'hikoson@mailinator.com', '$2y$10$TcCy4EQN3nUSvfVF/73BKeE7igBWF2NgM/jHNOcNcbexOcK9YVqlC'),
('57148', 'Kasimir Edwards', 'Kennan Kidd', 'moriambd', 'jaduqada@mailinator.com', '$2y$10$VErG5kkd6DkEx9iegoAiYerIMVyuJ6sRPp6tWVB3gJP4gbBDdduqm'),
('68552', 'Nabila', 'Islam', 'nabilam', 'nabila@gmail.com', '$2y$10$rIKIQxjyLf/flXSOKzXt2uFKYXXx8/u/xQ.1tuqn..NUGIa7aWG1C'),
('69813', 'Amal Merrill', 'Bryar Sawyer', 'Cole Kane', 'zice@mailinator.com', 'Pa$$w0rd!'),
('78763', 'Mirza ', 'Abir', 'mirzaabir121212', 'mirzaabir121212@gmail.com', '$2y$10$kmc1lgfP/jtqcuoWb33Z0O15UI.FxmSSt7G0ewQ/74Na26DHjHwM.'),
('87198', 'Sybill Browning', 'Willow Melendez', 'assasa', 'syvilur@mailinator.com', '$2y$10$PVAOuEK.1f2P0jM0pgSCMuQIcvzA8MP3EgbjywvU2n4hLgc2mMsHu'),
('87999', 'Nabila', 'Islam', 'islamnabila', 'islamnabila098765@gmail.com', '$2y$10$.fVttqYoZwcOP5F3kUZ/rOWaovpoPj9vKzBUVCBmqx6MJp6de4fJy'),
('88159', 'Mahir', 'Faisal', 'mahirfaisal', 'mahirfaisalrocy28@gmail.com', '$2y$10$9b/QOXCsqC9evZeDgl5o3u5QennZ47Wt33t/I.CYxYuQ6Mffdm3iK'),
('88633', 'Madison Rojas', 'Vance Salazar', 'Leigh', 'zesol@mailinator.com', '$2y$10$ySi9nZ5uxz4CKZ13VL3JXeY7ahtlGTxHnZT/3eJ8tJkP7wKLBBdPm'),
('94480', 'Philip Oneil', 'September Stafford', 'srijontest', 'wufu@mailinator.com', 'srijon1234'),
('99247', 'Nabila', 'Islam', 'moriam', 'moriam22@gmail.com', '$2y$10$aCwkwxUKmbyKy/B00nCJc.kMH9NIo6r165OMNg4aSZDgo5eLKMxJa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
