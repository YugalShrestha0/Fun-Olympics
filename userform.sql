-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 05, 2023 at 06:01 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userform`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rate` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `email`, `date`, `comment`, `rate`) VALUES
(21, 'yugalshrestha0@gmail.com', '2023/07/05', 'I like the video', 5);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`) VALUES
(2, 'Ronaldo hits form in time for another go at familiar foe Atletico', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus quam aperiam nobis aut praesentium temporibus nisi omnis voluptates impedit earum maxime id cupiditate quo officia suscipit illum fuga, ipsa autem? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus quam aperiam nobis aut praesentium temporibus nisi omnis voluptates impedit earum maxime id cupiditate quo officia suscipit illum fuga, ipsa autem?\r\n            \r\n                ', 'kajal.jpg'),
(3, 'Elon Musk dances at the grand opening of new Tesla giga factory', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus quam aperiam nobis aut praesentium temporibus nisi omnis voluptates impedit earum maxime id cupiditate quo officia suscipit illum fuga, ipsa autem? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus quam aperiam nobis aut praesentium temporibus nisi omnis voluptates impedit earum maxime id cupiditate quo officia suscipit illum fuga, ipsa autem? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus quam aperiam nobis aut praesentium temporibus nisi omnis voluptates impedit earum maxime id cupiditate quo officia suscipit illum fuga, ipsa autem?\r\n                \r\n                ', 'news1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `first_name`, `last_name`, `gender`, `dob`, `address`, `phone`, `email`, `subject`) VALUES
(1, 'Rose', 'Chaudhary', 'Female', '2023-02-22', 'London', 440098877, 'eyedust2000@gmail.com', 'CCNA'),
(2, 'abndjan', 'vsjkjdnfv', 'Male', '1222-01-12', 'bhsbv', 12215416541, 'abhiadk57@gmail.com', 'Web Development'),
(3, 'paras', 'kafle', 'Male', '2000-01-20', 'chitwan', 9840696263, 'abhiadk57@gmail.com', 'Web Development'),
(4, 'paras', 'kafle', 'Male', '2000-01-20', 'chitwan', 9840696263, 'abhiadk57@gmail.com', 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
CREATE TABLE IF NOT EXISTS `usertable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'unique',
  `password` varchar(255) NOT NULL,
  `code` mediumint NOT NULL,
  `status` text NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Subscriber',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`, `role`) VALUES
(90, 'Yukta', 'yukta@gmail.com', '$2y$10$fAQlNZ7E5l53Gs9cxADG1eagQ5Ki6xzNITgnx..Je/eU6VgnCKPvC', 0, 'verified', 'Subscriber'),
(92, 'yugal', 'yugalshrestha4@gmail.com', '$2y$10$vS1oD72vu/Erb29IAL6l7e8LKHS1qoTcEsgSXOAn98uSWxzftuRPy', 0, 'verified', 'Administrator'),
(95, 'Yugal Kumar Shrestha', 'yugalshrestha0@gmail.com', '$2y$10$4mkNM12W/E/UmmTUp/9kqurrXlxWNHktibwJ65AIGr1FxyeN/63mG', 0, 'verified', 'Administrator');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
