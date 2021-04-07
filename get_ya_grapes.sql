-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 02:20 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `get_ya_grapes`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(3) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `item_origin` varchar(100) NOT NULL,
  `item_type` varchar(50) NOT NULL,
  `item_price` float NOT NULL,
  `item_stock_level` int(3) NOT NULL,
  `item_image` text NOT NULL,
  `item_hot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `item_origin`, `item_type`, `item_price`, `item_stock_level`, `item_image`, `item_hot`) VALUES
(1, 'Persian Grapes', 'Persia', 'Seeded', 28.23, 13, 'persianGrapes.jpg', 'No'),
(2, 'Lion Grapes', 'Ethiopia', 'Seeded', 25, 15, 'lionGrapes.jpg', 'Yes'),
(3, 'Italian Wine Grapes', 'Italy', 'Seeded', 30.02, 22, 'italianWineGrapes.webp', 'Yes'),
(4, 'Blue Mountain Grapes', 'Jamaica', 'Seedles', 24.12, 18, 'blueMountainGrapes.jpg', 'Yes'),
(5, 'Texas Grapes', 'USA', 'Seeded', 25.56, 10, 'texasGrapes.jpeg', 'No'),
(6, 'Love Grapes', 'France', 'Seedless', 26, 19, 'loveGrapes.jpg', 'No'),
(7, 'Perfume Grapes', 'USA', 'Seedless', 20.15, 0, 'perfumeGrapes.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_role` varchar(50) NOT NULL DEFAULT 'public-user',
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `randSalt` varchar(100) NOT NULL DEFAULT '$2y$10$fjskelwmdlotjcklaotjc3',
  `user_firstname` varchar(150) NOT NULL,
  `user_lastname` varchar(150) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_zip` varchar(10) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_state` varchar(150) NOT NULL,
  `user_street_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_role`, `user_email`, `user_password`, `randSalt`, `user_firstname`, `user_lastname`, `user_phone`, `user_zip`, `user_city`, `user_state`, `user_street_address`) VALUES
(1, 'admin', 'defaultUser@gmail.com', 'defaultUser', '$2y$10$fjskelwmdlotjcklaotjc3', 'Default', 'User', '7705067065', '30645', '', '', ''),
(10, 'public-user', 'ellisorane@yahoo.com', '$2y$10$fjskelwmdlotjcklaotjcuD.KpN88Me4CxTCfCNicU.8XhHKcb5dO', '$2y$10$fjskelwmdlotjcklaotjc3', 'Orane', 'Ellis', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
