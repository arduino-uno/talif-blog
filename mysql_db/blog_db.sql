-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 08:23 AM
-- Server version: 10.5.17-MariaDB-1:10.5.17+maria~ubu2004
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `act_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `message` tinytext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`act_id`, `user_id`, `ip_address`, `message`, `created`) VALUES
(1, 1, '120.0.0.1', 'Test 1', '2022-09-03 03:41:41'),
(2, 1, '120.0.0.1', 'Test 2', '2022-08-31 19:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `description`) VALUES
(0, 'Uncategorized', ''),
(1, 'HTML5', 'HTML5 adalah sebuah bahasa markah untuk menstrukturkan dan menampilkan isi dari World Wide Web, sebuah teknologi inti dari Internet.'),
(2, 'CSS3', 'CSS 3 adalah versi CSS terbaru yang masih dikembangkan oleh W3C. '),
(3, 'Bootstrap', 'Bootstrap adalah kerangka kerja CSS yang sumber terbuka dan bebas untuk merancang situs web dan aplikasi web.');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `user_id`, `message`, `chat_date`) VALUES
(1, 1, 'Hello, this is the first example, where I am going to have a string that is over 50 characters and is super long.', '2022-08-12 07:33:43'),
(2, 2, 'Working with AdminLTE on a great new app! Wanna join?', '2022-08-12 08:05:24'),
(73, 1, 'check', '2022-09-06 03:37:41'),
(74, 1, 'test', '2022-09-06 03:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ct_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` tinytext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ct_id`, `fullname`, `email`, `subject`, `message`, `created`) VALUES
(1, 'Agah Nata', 'hashcat80@gmail.com', 'website down.', 'Your website is down for temporary.', '2022-08-25 09:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(250) DEFAULT NULL,
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` tinytext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `author`, `title`, `body`, `status`, `image`, `published`, `tags`) VALUES
(4, 1, 'About', 'We the believe that it#39;s one that is most adaptable to change will survive and lead a head, neither the strongest nor the biggest. With That Believe, all staff at GF Lines will continue to satisfy the ultimate expectations and needs of our clients\r\n\r\nAs one of the pioneers in the Indonesian freight trade, GF Lines has now been mandated a wide range of logistic service. Aside from it main focus in =\r\n\r\n\r\n	NVOCC and Consolidator Service.\r\n	GF LInes also provides comprehensive FCL Service.\r\n	Customs - brokerage\r\n	Warehouse\r\n	Transportation as well as both Air and Sea freight forwarding\r\n\r\n', 0, 'tv-4.jpg', '2022-09-12 23:39:19', 'tag1, tag2, tag3'),
(1, 1, 'Sea Freight', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\r\n', 0, 'tv-1.jpg', '2022-09-12 23:38:17', 'tag1, tag2, tag3'),
(2, 1, 'Air Freight', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\r\n', 0, 'tv-2.jpg', '2022-09-12 23:38:48', 'tag1, tag2, tag3'),
(3, 1, 'Network', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\r\n', 0, 'tv-3.jpg', '2022-09-12 23:39:12', 'tag1, tag2, tag3'),
(5, 1, 'Contact', 'For further information, please contact the email below Vice President = Daniel daniel@meelya.co.id General Manager = Ria ria@meelya.co.id Import Manager = Lily lily@meelya.co.id Import Document = Yoshita yoshita@meelya.co.id Export Document = Shanty shanty@meelya.co.id Accounting Fin = Yuni yuni@meelya.co.id Sales Executive = bayubayu@meelya.co.id\r\n', 0, 'tv-5.jpg', '2022-09-12 23:39:25', 'tag1, tag2, tag3');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT 1,
  `author` int(11) DEFAULT 1,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(250) DEFAULT 'AdminLTELogo.png',
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` tinytext DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `cat_id`, `author`, `title`, `body`, `status`, `image`, `published`, `tags`, `views`, `likes`) VALUES
(1, 0, 1, 'How to Find the Video Games of Your Youth Post 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 0, 'blog-1.jpg', '2022-09-11 09:56:15', 'tag1, tag2', 0, NULL),
(2, 1, 1, 'How to Find the Video Games of Your Youth', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'blog-2.jpg', '2022-09-11 09:56:19', 'tag1, tag2', 0, NULL),
(3, 2, 1, 'How to Find the Video Games of Your Youth', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 0, 'blog-3.jpg', '2022-09-11 09:56:24', 'tag1, tag2', 0, NULL),
(4, 3, 1, 'How to Find the Video Games of Your Youth', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 0, 'blog-4.jpg', '2022-09-11 09:56:28', 'tag1, tag2, tag3', 0, 0),
(113, 1, 1, 'How to Find the Video Games of Your Youth', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 0, 'blog-5.jpg', '2022-09-11 06:58:39', 'tag1, tag2, tag3', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

CREATE TABLE `siteinfo` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `google` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`ID`, `title`, `description`, `address`, `phone`, `fax`, `email`, `logo`, `facebook`, `twitter`, `google`, `linkedin`, `youtube`) VALUES
(1, 'AdminLTE - BlogZ', 'A Software Developer designs and builds computer programs that power mobile devices, desktop computers, and even cars. They not only identify user needs but also create new applications for any given market while making improvements based on feedback from users.', 'Ujung Menteng Bussines Centre Blok C, No. 45\r\nJl Sri Sultan Hamengkubuwono Jakarta 13960', '+6221 4680 2245', '', 'info@galatiaexpessindo.co.id', 'tokopedia.png', '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(50) DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'member',
  `user_image` varchar(100) DEFAULT 'AdminLTELogo.png',
  `user_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_fullname`, `user_email`, `user_pass`, `user_role`, `user_image`, `user_joined`, `user_status`) VALUES
(1, 'admin', 'Agah Nata', 'admin@example.com', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'user1-128x128.jpg', '2022-09-08 13:48:39', 1),
(2, 'member', 'Alexander Pierce', 'info@example.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'member', 'user2-160x160.jpg', '2022-09-05 09:06:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visit_id` int(11) NOT NULL,
  `user_ip` tinytext NOT NULL,
  `page` varchar(50) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `visited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visit_id`, `user_ip`, `page`, `views`, `likes`, `visited`) VALUES
(199, '::1', 'manage-categories', 5, 0, '2022-09-09 02:08:52'),
(177, '127.0.0.1', 'manage-activities', 51, 0, '2022-09-13 01:16:50'),
(204, '::1', 'manage-users', 2, 0, '2022-09-12 03:27:25'),
(203, '127.0.0.1', 'site-settings', 9, 0, '2022-09-13 01:16:43'),
(202, '::1', 'manage-activities', 5, 0, '2022-09-12 02:38:30'),
(201, '::1', 'direct-chat', 8, 0, '2022-09-12 02:38:34'),
(200, '::1', 'site-settings', 12, 0, '2022-09-12 03:29:04'),
(193, '127.0.0.1', 'manage-contacts', 4, 0, '2022-09-13 01:17:17'),
(192, '127.0.0.1', 'manage-users', 16, 0, '2022-09-08 13:51:14'),
(191, '127.0.0.1', 'manage-posts', 132, 0, '2022-09-13 01:17:02'),
(190, '127.0.0.1', 'manage-pages', 58, 0, '2022-09-13 01:16:58'),
(198, '::1', 'dashboard', 39, 0, '2022-09-12 22:38:45'),
(197, '::1', 'manage-posts', 209, 0, '2022-09-10 03:42:47'),
(196, '127.0.0.1', 'manage-categories', 6, 0, '2022-09-13 01:17:09'),
(195, '127.0.0.1', 'direct-chat', 6, 0, '2022-09-13 01:16:53'),
(194, '127.0.0.1', 'dashboard', 8, 0, '2022-09-13 01:16:14'),
(205, '::1', 'manage-pages', 15, 0, '2022-09-12 22:39:21'),
(206, '::1', 'manage-contacts', 1, 0, '2022-09-10 03:36:00'),
(207, '::1', 'cat_id=2', 29, 0, '2022-09-12 07:53:20'),
(208, '::1', 'cat_id=1', 37, 0, '2022-09-12 07:43:40'),
(209, '::1', '', 63, 0, '2022-09-12 07:53:23'),
(210, '::1', 'cat_id=0', 2, 0, '2022-09-12 07:31:37'),
(211, '::1', 'cat_id=3', 7, 0, '2022-09-12 07:31:11'),
(212, '::1', 'post_id=1', 12, 0, '2022-09-12 07:43:52'),
(213, '::1', 'site-templates', 27, 0, '2022-09-12 03:29:08'),
(214, '::1', 'post_id=2', 4, 0, '2022-09-12 07:43:51'),
(215, '::1', 'post_id=3', 4, 0, '2022-09-12 07:43:50'),
(216, '::1', 'id=3', 8, 0, '2022-09-12 07:43:48'),
(217, '::1', 'id=0', 1, 0, '2022-09-12 07:34:45'),
(218, '::1', 'id=2', 8, 0, '2022-09-12 07:54:31'),
(219, '127.0.0.1', '', 1, 0, '2022-09-12 22:40:57'),
(220, '127.0.0.1', 'id=1', 1, 0, '2022-09-12 22:44:49'),
(221, '127.0.0.1', 'cat_id=1', 3, 0, '2022-09-12 23:43:37'),
(222, '127.0.0.1', 'id=0', 6, 0, '2022-09-12 22:55:25'),
(223, '127.0.0.1', 'cat_id=0', 1, 0, '2022-09-12 22:45:48'),
(224, '127.0.0.1', 'cid=0', 5, 0, '2022-09-12 23:09:12'),
(225, '127.0.0.1', 'pid=0', 2, 0, '2022-09-12 23:06:42'),
(226, '127.0.0.1', 'pid=1', 6, 0, '2022-09-12 23:45:20'),
(227, '127.0.0.1', 'cid=', 1, 0, '2022-09-12 23:44:38'),
(228, '127.0.0.1', 'cid=2', 2, 0, '2022-09-13 01:22:30'),
(229, '127.0.0.1', 'cid=1', 3, 0, '2022-09-13 01:18:19'),
(230, '127.0.0.1', 'site-templates', 1, 0, '2022-09-13 01:16:39'),
(231, '127.0.0.1', 'pid=2', 2, 0, '2022-09-13 01:21:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

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
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
