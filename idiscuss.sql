-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 12:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_discription` varchar(200) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_discription`, `created`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Its language constructs and object-oriented app', '2024-01-08'),
(2, 'Java', 'The Java language is a key pillar in Android, an open source mobile operating system. Although Android, built on the Linux kernel, is written largely in C, the Android SDK uses the Java language ', '2024-01-08'),
(3, 'C++', 'C++ is a statically-typed, free-form, (usually) compiled, multi-paradigm, general-purpose middle-level programming language based on C. It was developed by Bjarne Stroustrup in 1979. ', '2024-01-08'),
(4, 'HTML', 'HTML is hypertext markup language', '2024-01-10'),
(5, 'CSS', 'the css is cascading style sheet', '2024-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` varchar(200) NOT NULL,
  `thread_id` int(4) NOT NULL,
  `user_id` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `user_id`, `comment_time`) VALUES
(1, 'i dont know about it', 1, 10, '2024-01-09 00:00:00'),
(3, '  this is ganesh', 1, 8, '2024-01-09 00:00:00'),
(4, '  you can install it from chrome', 17, 11, '2024-01-09 00:00:00'),
(5, '  from browser you can install it', 18, 9, '2024-01-09 00:00:00'),
(6, 'it\'s easy', 1, 9, '2024-01-09 11:16:31'),
(7, '  this is your problem...........', 6, 11, '2024-01-09 18:48:45'),
(8, '  What can i do??', 1, 10, '2024-01-09 22:02:12'),
(9, '  What can i do??', 1, 8, '2024-01-09 22:05:15'),
(10, '  ddd', 1, 8, '2024-01-09 22:07:02'),
(11, '  your question is too silly ', 1, 8, '2024-01-09 22:07:36'),
(12, '  ', 24, 10, '2024-01-09 22:12:27'),
(13, '  you did not know this simple things', 24, 10, '2024-01-09 22:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` varchar(300) NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'php is not installing', 'in my pc there is problem to install php .', 1, 10, '2024-01-08'),
(2, 'how to download the php', 'I am is unable to download the php in my mac book . please provide me solution', 1, 9, '2024-01-08'),
(3, 'php auto suggetion not working', 'In my pc php auto suggetion not working. please help me', 1, 8, '2024-01-09'),
(5, '  php is good or bad language', 'i am unable to find out is php good language', 1, 8, '2024-01-09'),
(6, '  how to install java', 'how to install java in windows os.  how many memory require this software package', 2, 9, '2024-01-09'),
(17, '  How to Install mingw', 'please help me', 3, 12, '2024-01-09'),
(18, '  unable to install cpp', 'sssssssssssssssssss', 3, 11, '2024-01-09'),
(19, '  cpp  language importance', 'is cpp language is use in now days in industry?', 3, 11, '2024-01-09'),
(20, '   how php language connect  html', 'i have to make project in php. there is problem to connect the php with html', 1, 11, '2024-01-09'),
(21, '   how php language connect  html', 'i have to make project in php. there is problem to connect the php with html', 1, 8, '2024-01-09'),
(22, '   how php language connect  html', 'i have to make project in php. there is problem to connect the php with html', 1, 9, '2024-01-09'),
(23, '  php is hard language', 'is php is hard language', 1, 8, '2024-01-09'),
(24, '  how to connect css with html externally', 'how to connect css with html externally . i have two file one is html and one is css how we can connect them ', 5, 8, '2024-01-09'),
(25, '  how to connect css with html externally', 'this is also my problem too', 5, 10, '2024-01-09'),
(26, '  how to use java to backend', 'how to use java to backend. which type of software we needed to use java as backend', 2, 10, '2024-01-09'),
(27, '  how to use java to backend', 'how to use java to backend. which type of software we needed to use java as backend', 2, 10, '2024-01-09'),
(28, '  dddd', 'ddddf', 2, 10, '2024-01-10'),
(31, '  Hii this is ganesh ', 'Hii this is ganesh ', 1, 12, '2024-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr_no` int(8) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(300) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr_no`, `user_name`, `user_email`, `user_pass`, `timestamp`) VALUES
(8, 'Ganesh bodakhe', 'bodakheganesh24@gmail.com', '$2y$10$uLsnSNd0YrWYW.R5zlMwmexeWWhKXD5aIsfbaL9uMuEvEhl0sRv6q', '2024-01-09 21:00:14'),
(9, 'Krushna bodakhe', 'krushna24@gmail.com', '$2y$10$Pyk1Iof2rYKhkjBao8q7yehhjIukRQYz3fqckBxhMGN1JVLvaaj.G', '2024-01-09 21:06:30'),
(10, 'Pankaj Dhavle', 'pankaj.dhawale.122020@gcoeara.ac.in', '$2y$10$W5kWGOOJsPUpQd3LLc2Mde14qhr2SIYkFT9lPFsDRUIus3wbXbszO', '2024-01-09 21:07:18'),
(11, 'Vishal shinde', 'vishalshinde24@gmail.com', '$2y$10$KFcxIMp7ltwVFtmIIr6VcufFtGkxcKQGwzaZcBsl3hntrxGPt4YUy', '2024-01-09 21:07:52'),
(12, 'Ganesh', 'yogirajkachave007@gmail.com', '$2y$10$GSAMP8XjIZNyM9IUtbTmUee8njbgg1S2iqk4xGdvAtI2IVWHhh.fy', '2024-01-26 19:25:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr_no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
