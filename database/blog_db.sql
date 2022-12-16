-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 11:01 AM
-- Server version: 10.3.37-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

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
  `icon` varchar(20) DEFAULT NULL,
  `message` tinytext DEFAULT 'Other User Activity',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`act_id`, `user_id`, `ip_address`, `icon`, `message`, `created`) VALUES
(1, 2, '120.0.0.1', 'fas fa-user-plus', 'User Created Successfully', '2022-10-19 10:31:38'),
(2, 2, '120.0.0.1', 'fas fa-user-edit', 'User Updated Successfully', '2022-10-19 10:31:44'),
(3, 2, '127.0.0.1', 'fas fa-plus', 'Post Created Succesfully', '2022-10-19 10:31:50'),
(4, 2, '127.0.0.1', 'fas fa-edit', 'Post Updated Succesfully', '2022-10-19 10:32:14'),
(5, 2, '127.0.0.1', 'far fa-plus', 'Page Created Succesfully', '2022-10-19 10:32:17'),
(6, 2, '127.0.0.1', 'far fa-edit', 'Page Updated Succesfully', '2022-10-19 10:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `fullname` varchar(105) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comm_id`, `post_id`, `parent_id`, `fullname`, `email`, `website`, `message`, `likes`, `status`, `created`) VALUES
(1, 1, 0, 'John Doe', 'jhon_doe@gmail.com', 'https://nicoyazoom.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '2022-10-11 01:17:15'),
(2, 1, 1, 'David Adams', 'adam_davis@gmail.com', 'https://nicoyazoom.com', 'It\'s good to hear that you enjoyed this article.', 2, 0, '2022-10-11 04:14:32'),
(3, 1, 0, 'Michael', 'michael_davis@gmail.com', 'https://nicoyazoom.com', 'I appreciate the time and effort you spent writing this article, good job!', 0, 0, '2022-11-19 15:09:41'),
(11, 3, 0, 'Demo User', 'demo@examples.com', '', 'Send New Mesages!', 2, 0, '2022-12-04 03:50:40'),
(13, 3, 0, 'Agah Nata', 'hashcat80@gmail.com', 'talif-blog.com', 'event', NULL, 0, '2022-10-14 02:21:19'),
(14, 3, 1, 'Demo User', 'demo@examples.com', 'talif-blog.com', 'Test.. ah!', NULL, 0, '2022-10-17 04:04:35');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ct_id`, `fullname`, `email`, `subject`, `message`, `created`) VALUES
(1, 'Agah Nata', 'hashcat80@gmail.com', 'website down.', 'Your website is down for temporary.', '2022-08-25 09:56:46'),
(5, 'Agah Nata', 'admin@examples.com', 'Our FeedBack', 'FeedBack Here ..', '2022-10-19 04:10:22'),
(6, 'Agah Nata', 'demo@examples.com', 'Our FeedBack', 'Test Messages!', '2022-12-08 02:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `body` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(250) DEFAULT NULL,
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` tinytext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `author_id`, `title`, `body`, `status`, `image`, `published`, `tags`) VALUES
(4, 1, 'About', 'We the believe that it#39;s one that is most adaptable to change will survive and lead a head, neither the strongest nor the biggest. With That Believe, all staff at GF Lines will continue to satisfy the ultimate expectations and needs of our clients\r\n\r\nAs one of the pioneers in the Indonesian freight trade, GF Lines has now been mandated a wide range of logistic service. Aside from it main focus in =\r\n\r\n\r\n	NVOCC and Consolidator Service.\r\n	GF LInes also provides comprehensive FCL Service.\r\n	Customs - brokerage\r\n	Warehouse\r\n	Transportation as well as both Air and Sea freight forwarding\r\n\r\n', 0, 'tv-4.jpg', '2022-09-12 23:39:19', 'tag1, tag2, tag3'),
(1, 1, 'Sea Freight', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium nam quas inventore, ut iure iste modi eos adipisci ad ea itaque labore earum autem nobis et numquam, minima eius. Nam eius, non unde ut aut sunt eveniet rerum repellendus porro.\r\n', 0, 'tv-1.jpg', '2022-09-13 01:55:34', 'tag1, tag2, tag3'),
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
  `author_id` int(11) DEFAULT 1,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(250) DEFAULT 'AdminLTELogo.png',
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` tinytext DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `cat_id`, `author_id`, `title`, `body`, `status`, `image`, `published`, `tags`, `views`, `likes`) VALUES
(5, 1, 2, 'There&rsquo;s a Cool New Way for Men to Wear Socks and Sandals', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'img_5.jpg', '2022-10-20 16:33:46', 'tag1, tag2, tag3', 5, 2),
(4, 3, 2, 'There&rsquo;s a Cool New Way for Men to Wear Socks and Sandals', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'img_4.jpg', '2022-10-20 16:33:42', 'tag1, tag2, tag3', 5, 2),
(3, 2, 2, 'There&rsquo;s a Cool New Way for Men to Wear Socks and Sandals', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'img_3.jpg', '2022-10-20 16:33:38', 'tag1, tag2', 5, 2),
(2, 1, 1, 'There&rsquo;s a Cool New Way for Men to Wear Socks and Sandals', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'img_2.jpg', '2022-10-14 22:55:12', 'tag1, tag2', 5, 2),
(1, 0, 1, 'There&rsquo;s a Cool New Way for Men to Wear Socks and Sandals', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'img_1.jpg', '2022-10-14 22:54:29', 'tag1, tag2', 5, 2);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siteinfo`
--

INSERT INTO `siteinfo` (`ID`, `title`, `description`, `address`, `phone`, `fax`, `email`, `logo`, `facebook`, `twitter`, `google`, `linkedin`, `youtube`) VALUES
(1, 'Admin<strong>LTE</strong>', 'A Software Developer designs and builds computer programs that power mobile devices, desktop computers, and even cars. They not only identify user needs but also create new applications for any given market while making improvements based on feedback from users.', '123 Testing Ave, Testtown, 9876 NA', '+6221 4680 2245', '', 'info@galatiaexpessindo.co.id', 'ninja-logo.png', '#', '#', '#', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `temp_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_url` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `temp_dir` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`temp_id`, `title`, `description`, `author_name`, `author_url`, `image`, `temp_dir`, `status`, `created`) VALUES
(1, 'Wordify – Free HTML5 personal blog website template', 'Hence the name, Wordify is an easy-to-use writer website template for bloggers, journalists, authors, editors and the like. You can easily alter Wordify to your needs due to its simplistic, clean and stunning web design. Wordify is a Bootstrap Framework tool that means adjusting to different devices happens in a snap. Moreover, it is also in tune with all web browsers, retina screens and ensures fantastic performance.', ' Aigars SIlkalns', 'https://colorlib.com/wp/template/wordify', 'wordify-1.jpg', 'wordify', 0, '2022-12-11 03:12:16'),
(2, 'BizNews – Free News Website Template', 'It’s a lot easier for you to share news and articles online if you have a newspaper, news portal, or magazine website. You may know that there is a big challenge in creating a news or magazine website from scratch. If you are on a tight budget and time schedule, you should use our free news website template to make an incredible news portal or magazine website. Why starting from scratch if you have pre-built and free HTML templates?\r\n\r\nWe are here with a lightweight, easy-to-use, and fully responsive free magazine website template perfect for creating professional news, newspaper, news portal, news channel, news page, and online magazine websites. No matter if you haven’t built a single web page in your life yet, you will still succeed in making your online magazine website with this free magazine website template. The template is very easy to use and beginner-friendly for your convenience.\r\n\r\nBizNews – free news portal website template is built with Bootstrap CSS framework. It’s fully responsive and customizable. It comes with 4 pre-defined and ready-to-use HTML5 pages and many useful HTML5 & CSS3 design elements. With these pre-built HTML5 pages and design elements, you can create an impactful newspaper, news portal, or online magazine website easily without having extra coding knowledge.', 'HTML Codex', 'https://htmlcodex.com/free-news-website-template', 'biznews-1.jpg', 'biznews', 1, '2022-12-11 03:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(50) DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_orgname` varchar(100) DEFAULT NULL,
  `user_location` text DEFAULT NULL,
  `user_birthday` date DEFAULT current_timestamp(),
  `user_pass` varchar(50) DEFAULT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'member',
  `user_image` varchar(100) DEFAULT 'AdminLTELogo.png',
  `user_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_fullname`, `user_email`, `user_phone`, `user_orgname`, `user_location`, `user_birthday`, `user_pass`, `user_role`, `user_image`, `user_joined`, `user_status`) VALUES
(1, 'admin', 'Agah Nata', 'admin@example.com', '+62 813 8888', 'Ubuntu DIstributed', 'Depok, Indonesia', '2022-10-19', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'user1-128x128.jpg', '2022-10-24 01:59:38', 1),
(2, 'member', 'Alexander Pierce', 'info@example.com', '+62 813 9999', 'Ubuntu DIstributed', 'Depok, Indonesia', '2022-10-21', '5f4dcc3b5aa765d61d8327deb882cf99', 'member', 'user2-160x160.jpg', '2022-10-23 10:47:39', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`);

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
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`temp_id`);

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
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
