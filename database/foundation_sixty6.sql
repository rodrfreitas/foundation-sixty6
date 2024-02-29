-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 29, 2024 at 05:22 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foundation_sixty6`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_name` varchar(200) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` text NOT NULL,
  `blog_thumbnail` varchar(250) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `author_name`, `blog_date`, `blog_title`, `blog_content`, `blog_thumbnail`) VALUES
(1, 'Rodrigo Freitas', '2024-02-29', 'Understanding Psychotic Depression', 'Psychotic depression is a specific presentation of major depressive disorder (MDD) that involves symptoms of psychosis during an episode of depression. Here are some critical points about psychotic depression: Definition: Psychotic depression refers to MDD with features of psychosis, which can include: -Hallucinations: Seeing or hearing things that aren\'t there. -Delusions: Holding false beliefs despite evidence to the contrary. -Psychomotor impairment: Slowed movements and difficulty performing everyday tasks. -Stupor: A state of reduced responsiveness and awareness. -Prevalence: Estimates suggest that MDD with psychosis affects 10% to 19% of people experiencing a major depression episode. ', 'blog-post-1.jpg'),
(2, 'Jon Woog Yun', '2024-02-29', 'The Power in Seeking Support', ' Among those receiving inpatient care for depression, this rate increases significantly. -Severity: Psychotic depression is often considered more severe than depression without psychosis because it may involve: -Melancholic features: Intense sadness and loss of pleasure.\r\n\r\nMore severe symptoms. Greater risk of self-harm or suicidal thoughts. If you or someone you know is struggling with thoughts of self-harm or suicide, please seek help immediately. ', 'blog-post-2.jpg'),
(3, 'Tiago Witt', '2024-02-29', 'You are not alone', 'More severe symptoms. Greater risk of self-harm or suicidal thoughts. If you or someone you know is struggling with thoughts of self-harm or suicide, please seek help immediately.\r\n\r\nYou can call or text out to the National Suicide Prevention Lifeline at 9-8-8. You also can contact us by phone or email, we have our doors open to hear and help you. ', 'blog-post-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_media`
--

DROP TABLE IF EXISTS `blog_media`;
CREATE TABLE IF NOT EXISTS `blog_media` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int UNSIGNED NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_media`
--

INSERT INTO `blog_media` (`id`, `blog_id`, `image_url`) VALUES
(1, 1, 'blog-post-1.jpg'),
(2, 1, 'blog-post-1b.jpg'),
(3, 2, 'blog-post-2.jpg'),
(4, 2, 'blog-post-2b.jpg'),
(5, 3, 'blog-post-3.jpg'),
(6, 3, 'blog-post-3b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_users`
--

DROP TABLE IF EXISTS `contact_users`;
CREATE TABLE IF NOT EXISTS `contact_users` (
  `contact_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_users`
--

INSERT INTO `contact_users` (`contact_id`, `contact_name`, `contact_email`, `contact_message`) VALUES
(1, 'Kwency Dahilan', 'kwenox.dahilan@gmail.com', 'Hi, I want to apply as volunteer for your upcoming event! ');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_title` varchar(250) NOT NULL,
  `event_content` text NOT NULL,
  `event_thumbnail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_content`, `event_thumbnail`) VALUES
(1, 'Unlock The Door To Possibility', 'Our campaign for mental health aims to break down barriers and encourage individuals to explore the possibilities that lie beyond their struggles. With the symbolic yellow door at the entrance bearing the slogan “Unlock the door to possibility,” we invite passersby to take a step towards supporting mental health initiatives. This door serves as a metaphorical representation of the opportunities awaiting those who are willing to engage with the topic, emphasizing that by opening up and contributing, individuals not only support a worthy cause but also open themselves up to new perspectives and experiences. ', 'event-1.jpg'),
(2, 'TikTok Challenge #DanceForMentalHealth', 'Nominate friends, family, or fellow dancers to take part in the \"Expressive Dance for Mental Health\" challenge. Introduce a donation pledge where participants commit to making a donation to Foundation Sixty6 for each like, share, or comment their dance video receives. Emphasize that their dance is not only raising awareness but also directly\r\ncontributing to improving mental healthcare access.\r\n', 'event-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_media`
--

DROP TABLE IF EXISTS `event_media`;
CREATE TABLE IF NOT EXISTS `event_media` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int UNSIGNED NOT NULL,
  `image_url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `image_url`) VALUES
(1, 1, 'event-1.jpg'),
(2, 1, 'event-1a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Kwency', 'Dahilan', 'kwenox25', 'tomandjerry!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
