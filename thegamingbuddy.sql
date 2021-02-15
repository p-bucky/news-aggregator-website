-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 05:59 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thegamingbuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`) VALUES
(29, 'Hardware', 'hardware.png'),
(30, 'Gaming', 'gaming.jpg'),
(31, 'News', 'esport_india.jpg'),
(32, 'Esports', 'esport.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` varchar(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `external_link` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image_credit` varchar(255) NOT NULL DEFAULT 'Internet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `external_link`, `post_tags`, `status`, `image_credit`) VALUES
(32, '29', 'FAU-G vs PUBG Mobile: Game modes, availability and other differences', 'bucky', '2021-01-27 16:52:17', 'https://resize.indiatvnews.com/en/resize/newbucket/715_-/2021/01/pubg-vs-faug-1611756410.jpg', 'FAUG or Fearless And United – Guards mobile game has finally launched in India. The game was being touted as a PUBG Mobile rival. However, at launch, many of the features that were supposed to come with the game are not made available for the users. Here’s a quick comparison between the newly launched FAU-G and the long-gone PUBG Mobile. ', 'https://www.indiatvnews.com/technology/gaming-faug-vs-pubg-mobile-comparison-680864', 'Hardware, faug', 'online', 'indiatvnews'),
(33, '30', 'You can now stream retro games to your browser, TV and Android devices with Plex Arcade ', 'bucky', '2021-01-27 16:54:28', 'https://images.hindustantimes.com/tech/img/2021/01/27/960x540/plex-image-arcade-blog-devices-2-1440x835_1611762327573_1611762347412.png', 'With more people spending time at home for the past year, we’ve all got more time on our hands that we would have otherwise spent commuting to work. That time has been spent rather well, catching up on our favourite Netflix shows and playing games.', 'https://tech.hindustantimes.com/gaming/news/you-can-now-stream-retro-games-to-your-browser-tv-and-android-devices-with-plex-arcade-71611762233075.html', 'new games, gaming, latest games, new, 2021 games, 2021', 'online', 'HT'),
(34, '31', 'Gaming revenue for the first time: Nadella ', 'bucky', '2021-01-27 16:56:42', 'https://bsmedia.business-standard.com/_media/bs/img/article/2020-12/12/full/1607767921-7009.jpg', ' Microsoft has surpassed $5 billion in gaming revenue for the first time in the quarter that ended on December 31, CEO Satya Nadella has revealed.\r\n\r\nOn the earnings call with analysts late on Tuesday, Nadella said that Xbox Live has more than a 100 million monthly active users while Game Pass now has 18 million subscribers.', 'https://www.business-standard.com/article/technology/microsoft-surpasses-5bn-in-gaming-revenue-for-the-first-time-nadella-121012700238_1.html', 'new games, gaming, latest games, new, 2021 games, 2021', 'online', 'bsmedia'),
(35, '32', 'Farmers sow seeds of violence: Union ends tractor rally, security beefed up ', 'bucky', '2021-01-27 16:57:35', 'https://bsmedia.business-standard.com/_media/bs/img/article/2021-01/27/full/1611689783-7983.jpg', ' There was chaos and a death on Delhi’s roads on the 72nd Republic Day on Tuesday as teeming numbers of farmers, protesting against the three controversial farm Acts for two months, broke barriers and indulged in mayhem during a planned tractor parade.\r\n\r\nA protesting farmer died after his tractor overturned at ITO, which is in central Delhi, the police said. They said the details about the deceased were yet to be gathered.', 'https://www.business-standard.com/article/current-affairs/farmers-sow-seeds-of-violence-union-ends-tractor-rally-security-beefed-up-121012700031_1.html', 'gaming, accessories, hyperx, kingston, hardware', 'online', 'bsmedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `biography` text DEFAULT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_email`, `biography`, `user_role`) VALUES
(25, 'bucky', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Prashant', 'bucky@gmail.com', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
