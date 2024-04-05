-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2024 at 01:20 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fs6_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Rodrigo Freitas'),
(2, 'Kwency Maye Dahilan');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `published_date` date NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `thumbnail` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author_id`, `title`, `published_date`, `content`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Understanding Psychotic Depression', '2024-03-01', 'Psychotic depression is a specific presentation of major depressive disorder (MDD) that involves symptoms of psychosis during an episode of depression. Here are some critical points about psychotic depression: Definition: Psychotic depression refers to MDD with features of psychosis, which can include: -Hallucinations: Seeing or hearing things that aren\'t there. -Delusions: Holding false beliefs despite evidence to the contrary. -Psychomotor impairment: Slowed movements and difficulty performing everyday tasks. -Stupor: A state of reduced responsiveness and awareness. -Prevalence: Estimates suggest that MDD with psychosis affects 10% to 19% of people experiencing a major depression episode. ', 'blog-post-1.jpg', '2024-03-22 14:20:27', '2024-03-22 14:20:27'),
(2, 2, 'The Power in Seeking Support', '2024-03-03', ' Among those receiving inpatient care for depression, this rate increases significantly. -Severity: Psychotic depression is often considered more severe than depression without psychosis because it may involve: -Melancholic features: Intense sadness and loss of pleasure.\r\n\r\nMore severe symptoms. Greater risk of self-harm or suicidal thoughts. If you or someone you know is struggling with thoughts of self-harm or suicide, please seek help immediately. ', 'blog-post-2.jpg', '2024-03-22 14:20:27', '2024-03-22 14:20:27'),
(3, 1, 'You are not alone', '2024-03-11', 'More severe symptoms. Greater risk of self-harm or suicidal thoughts. If you or someone you know is struggling with thoughts of self-harm or suicide, please seek help immediately.\r\n\r\nYou can call or text out to the National Suicide Prevention Lifeline at 9-8-8. You also can contact us by phone or email, we have our doors open to hear and help you. ', 'blog-post-3.jpg', '2024-03-22 14:20:27', '2024-03-22 14:20:27'),
(4, 2, 'Barriers to Find and Receive Support', '2024-03-20', 'Despite the high prevalence of mental health problems and disorders that develop in adolescence and young adulthood, the majority of young people and their families do not seek or receive help. For example, even for the most common problems like depression and anxiety, each of which is highly treatable, only about one third of young people seek professional help.', 'blog-post-4.jpg', '2024-03-22 14:20:27', '2024-03-22 14:20:27');

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
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_users`
--

INSERT INTO `contact_users` (`id`, `contact_name`, `contact_email`, `contact_message`) VALUES
(1, 'Kwency Dahilan', 'kwenox.dahilan@gmail.com', 'Hi, I want to apply as volunteer for your upcoming event! '),
(2, 'Edith Meyers', 'e_meyers@ldn.com', 'Hello. I just wanted to say that I feel welcomed in this community. '),
(3, 'Kwency Maye', 'kwenox.dahilan@gmail.com', 'test'),
(4, 'Kwency Maye Dahilan', 'kwenox.dahilan@gmail.com', 'This is a test');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `thumbnail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Unlock The Door To Possibility', 'Our campaign for mental health aims to break down barriers and encourage individuals to explore the possibilities that lie beyond their struggles. With the symbolic yellow door at the entrance bearing the slogan “Unlock the door to possibility,” we invite passersby to take a step towards supporting mental health initiatives. This door serves as a metaphorical representation of the opportunities awaiting those who are willing to engage with the topic, emphasizing that by opening up and contributing, individuals not only support a worthy cause but also open themselves up to new perspectives and experiences. ', 'event-1.jpg', '2024-03-23 03:02:24', '2024-03-23 03:02:24'),
(2, 'TikTok Challenge #DanceForMentalHealth', 'Nominate friends, family, or fellow dancers to take part in the \"Expressive Dance for Mental Health\" challenge. Introduce a donation pledge where participants commit to making a donation to Foundation Sixty6 for each like, share, or comment their dance video receives. Emphasize that their dance is not only raising awareness but also directly\r\ncontributing to improving mental healthcare access.\r\n', 'event-2.jpg', '2024-03-23 03:02:24', '2024-03-23 03:02:24'),
(3, 'Talent Donation With Fanshawe, Western', 'Inside the booth, a surprise awaits those who choose to donate such as the chance to encounter a celebrity. This unexpected twist adds an element of excitement and intrigue to the donation process, enticing more people to participate. As celebrities express their gratitude to donors, it fosters a sense of connection and community, reinforcing the idea that we are all in this together when it comes to supporting mental health. By capturing these moments on film and sharing them across social media platforms like Instagram, TikTok, and YouTube, we aim to spread awareness far and wide, inspiring others to join the movement and unlock the door to possibility for themselves and others.', 'event-3.jpg', '2024-03-23 03:02:24', '2024-03-23 03:02:24'),
(4, 'Instagram Photo Contest', 'Theme: Face\r\nü The face of an object that is not a person or animal such as a car’s front\r\nü If you just look at it at first, it\'s just a long box with circular patterns drawn on both sides, but if you look at it differently, it looks like a\r\nface.\r\n• Key message: When we recognized its face, It finally came into being.\r\nü There are many mentally ill people around us who are suffering, but we don\'t know much about it. When we look at them with interest,\r\nthey will become our neighbours and friends and we will no longer sit on the sidelines.\r\n• The best works among the nominated works will be posted on Instagram, and the photo that receives the most likes will be selected as the\r\nwinner of the contest.\r\n• For fundraising, an exhibition can be held with the works selected in this way.', 'event-4.jpg', '2024-03-23 03:02:24', '2024-03-23 03:02:24');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event_media`
--

INSERT INTO `event_media` (`id`, `event_id`, `image_url`) VALUES
(1, 1, 'event-1.jpg'),
(2, 1, 'event-1a.jpg'),
(3, 2, 'event-2.jpg'),
(4, 2, 'event-1a.jpg'),
(5, 3, 'event-3.jpg'),
(6, 3, 'event-3a.jpg'),
(7, 4, 'event-4.jpg'),
(8, 4, 'event-4a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

DROP TABLE IF EXISTS `test_users`;
CREATE TABLE IF NOT EXISTS `test_users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`id`, `username`, `password`) VALUES
(1, 'Foundation66', 'Sixty6!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `usertype_id` int NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype_id`, `avatar`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 2, 'kwency.png', 'Foundation66', 'Foundation66', 'Foundation66', 'Sixty6!'),
(2, 1, 'rodrigo_freitas.png', 'Rodrigo', 'Freitas', 'rfreitas', 'k0b3bryant24\''),
(3, 3, 'jon_yun.jpg', 'Jon', 'Yun', 'jonyun', 'root'),
(4, 2, 'kwency.png', 'Kwency', 'Dahilan', 'kwenox25', 'tom4ndj3rry!');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `usertype_id` int NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(255) NOT NULL,
  PRIMARY KEY (`usertype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`usertype_id`, `usertype_name`) VALUES
(1, 'Admin'),
(2, 'Event Coordinator'),
(3, 'Charity Manager'),
(4, 'Finance and Operation');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
