-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 08:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contact` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'Shyam Krishna', '98765432', 'shyam@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Adventure'),
(2, 'Action'),
(3, 'Sports'),
(4, 'Fighting'),
(5, 'Action-Adventure'),
(6, 'Real-time Strategy'),
(7, 'Open world');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `chat_id` int(11) NOT NULL,
  `chat_content` varchar(50) NOT NULL,
  `chat_date` date NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`chat_id`, `chat_content`, `chat_date`, `community_id`, `user_id`) VALUES
(2, 'nice', '2023-10-05', 2, 1),
(3, 'Hello', '2023-10-05', 2, 2),
(4, 'hello', '2023-10-05', 2, 1),
(5, 'HAi', '2023-10-05', 2, 1),
(6, 'Hi', '2023-10-06', 3, 1),
(7, 'Do you want to challenge?', '2023-10-06', 3, 3),
(8, 'Hi', '2023-10-06', 12, 1),
(9, 'yes', '2023-10-10', 3, 1),
(10, 'hello', '2023-10-10', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(30) NOT NULL,
  `comment_date` date NOT NULL,
  `post_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment_content`, `comment_date`, `post_id`, `community_id`, `user_id`) VALUES
(1, 'Good', '2023-09-29', 1, 11, 4),
(2, 'Comment 1', '2023-10-05', 6, 3, 1),
(3, 'Good', '2023-10-05', 3, 2, 1),
(4, 'sdfds', '2023-10-05', 4, 9, 1),
(5, 'Comment 2', '2023-10-05', 1, 11, 1),
(6, 'Comment 2', '2023-10-05', 1, 11, 1),
(7, 'good', '2023-10-14', 3, 2, 1),
(8, 'hghg', '2023-10-14', 3, 2, 1),
(9, 'efsdid', '2023-10-14', 3, 2, 1),
(10, 'eiuyuyag', '2023-10-14', 3, 2, 1),
(11, 'eiuyuyag', '2023-10-14', 3, 2, 1),
(12, 'eiuyuyag', '2023-10-14', 3, 2, 1),
(13, 'eiuyuyag', '2023-10-14', 3, 2, 1),
(14, 'duifhi', '2023-10-14', 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_community`
--

CREATE TABLE `tbl_community` (
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_name` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL,
  `community_game` varchar(30) NOT NULL,
  `community_photo` varchar(100) NOT NULL,
  `community_details` varchar(200) NOT NULL,
  `community_doj` date NOT NULL,
  `community_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_community`
--

INSERT INTO `tbl_community` (`community_id`, `user_id`, `community_name`, `category_id`, `community_game`, `community_photo`, `community_details`, `community_doj`, `community_status`) VALUES
(1, 6, 'Firing  Ninjas', 2, 'Free Fire', 'free fire.jpg', 'Come and enjoy your free time with the firing ninjas ', '2023-09-29', 1),
(2, 6, 'Warriors', 2, 'Free Fire', 'free fire.jpg', 'Come and enjoy your free time with the warriors', '2023-09-29', 0),
(3, 1, 'Winning Eleven', 3, 'PES', 'eFootball-2023-PES-Apk-Obb-RisTechy.jpg', 'Come join with us to share and improve your gaming experience ', '2023-09-29', 0),
(4, 1, 'FIFA Players', 3, 'FIFA', 'fifa 2023.jpg', 'FIFA Community for improve your gaming experience', '2023-09-29', 0),
(5, 1, 'PES Lovers', 3, 'PES', 'eFootball-2023-PES-Apk-Obb-RisTechy.jpg', 'Only PES lovers are aloved', '2023-09-29', 1),
(7, 2, 'FIFA Fans Club', 3, 'FIFA', 'fifa 22.jpg', 'Only Football lovers are allowed in here', '2023-09-29', 1),
(8, 3, 'Deathless Warriors', 2, 'PUBG', 'pubg 3.jpg', 'A place for all PUBG lovers can come and enjoy', '2023-09-29', 0),
(9, 3, 'PUBG Lovers ', 2, 'PUBG', 'pubg 1.jpg', 'Community for all PUBG lovers', '2023-09-29', 0),
(10, 3, 'PUBG Experts United', 2, 'PUBG', 'pubg.jpg', 'Only PUBG experts are alloved', '2023-09-29', 1),
(11, 4, 'Battle filed', 5, 'Call Of Duty', 'OIP.jpeg', 'All Call Of Duty Lovers are welcome', '2023-09-29', 0),
(12, 5, 'Royale Arena', 6, 'Clash Of Clans', 'COD1.jpg', 'A place for all Clash  Of Clans lovers', '2023-09-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaitnt_id` int(11) NOT NULL,
  `complaint_title` varchar(30) NOT NULL,
  `complaint_details` varchar(30) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `complaint_replay` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaitnt_id`, `complaint_title`, `complaint_details`, `complaint_date`, `complaint_status`, `complaint_replay`, `user_id`) VALUES
(1, 'Complaint1 title', 'Complaint 1', '2023-09-29', 0, '', 4),
(4, 'Complaint Tittle 1', 'Complaint 1', '2023-10-05', 0, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaintcommunity`
--

CREATE TABLE `tbl_complaintcommunity` (
  `cc_id` int(11) NOT NULL,
  `cc_title` varchar(30) NOT NULL,
  `cc_details` varchar(50) NOT NULL,
  `cc_date` varchar(50) NOT NULL,
  `cc_status` int(11) NOT NULL DEFAULT 0,
  `cc_user` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaintcommunity`
--

INSERT INTO `tbl_complaintcommunity` (`cc_id`, `cc_title`, `cc_details`, `cc_date`, `cc_status`, `cc_user`, `user_id`, `community_id`) VALUES
(1, 'Complaint1 title', 'Complaint1', '2023-10-05', 0, 5, 1, 12),
(2, 'Complaint2 title', 'Complaint 2', '2023-10-05', 0, 1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'Ernakulam'),
(3, 'Kollam'),
(4, 'Idukki'),
(5, 'kottayam'),
(7, 'Kanoor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(30) NOT NULL,
  `feedback_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`, `user_id`) VALUES
(1, 'FeedBack 1', '2023-09-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_joinlist`
--

CREATE TABLE `tbl_joinlist` (
  `list_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `list_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_joinlist`
--

INSERT INTO `tbl_joinlist` (`list_id`, `community_id`, `user_id`, `list_status`) VALUES
(1, 1, 5, 0),
(2, 7, 5, 0),
(3, 10, 5, 0),
(4, 2, 5, 1),
(5, 9, 4, 1),
(6, 9, 4, 1),
(7, 9, 4, 1),
(8, 9, 4, 1),
(13, 11, 1, 1),
(14, 11, 1, 1),
(15, 12, 1, 1),
(16, 12, 5, 1),
(17, 3, 3, 1),
(18, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`like_id`, `post_id`, `community_id`, `user_id`) VALUES
(1, 3, 2, 5),
(3, 6, 3, 1),
(14, 1, 11, 1),
(20, 4, 9, 1),
(22, 5, 9, 1),
(23, 1, 11, 5),
(53, 6, 3, 3),
(54, 11, 3, 1),
(57, 3, 0, 0),
(58, 3, 0, 1),
(79, 10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `district_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`district_id`, `place_id`, `place_name`) VALUES
(1, 1, 'kothamangalam'),
(4, 2, 'Thodupuzha'),
(3, 5, 'punalur'),
(0, 6, 'Perumbavoor'),
(1, 7, 'kochi'),
(0, 8, 'aluva'),
(1, 9, 'aluva'),
(0, 10, 'kochi'),
(1, 12, 'konni'),
(3, 13, 'konni');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_content` varchar(30) NOT NULL,
  `post_file` varchar(100) NOT NULL,
  `community_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_content`, `post_file`, `community_id`, `user_id`, `post_date`) VALUES
(1, 'Journey Begins', 'OIP.jpeg', 11, 4, '2023-09-29'),
(2, 'Content 1', 'COD1.jpg', 12, 5, '2023-09-30'),
(3, 'Content 1', 'pubg 3.jpg', 2, 5, '2023-09-30'),
(5, 'Content 2', 'pubg 1.jpg', 9, 4, '2023-09-30'),
(6, 'Content 1', 'eFootball-2023-PES-Apk-Obb-RisTechy.jpg', 3, 1, '2023-09-30'),
(8, 'content 2', 'eFootball-2023-PES-Apk-Obb-RisTechy.jpg', 3, 1, '2023-10-03'),
(10, 'Content 2', 'pubg 1.jpg', 2, 1, '2023-10-05'),
(11, 'Post ', 'eFootball-2023-PES-Apk-Obb-RisTechy.jpg', 3, 1, '2023-10-06'),
(12, 'Good Gaming', 'pexels-ron-lach-7849760 (360p).mp4', 2, 1, '2023-10-14'),
(13, 'Good Gaming', 'pexels-ron-lach-7849760 (360p).mp4', 2, 1, '2023-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_dob` date NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_game` varchar(50) NOT NULL,
  `user_experience` varchar(30) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `place_id`, `user_gender`, `user_dob`, `user_password`, `user_photo`, `user_game`, `user_experience`, `category_id`) VALUES
(2, 'User 2', '098765432', 'user2@gmail.com', ' \r\n     User 2 Address    ', 7, 'Male', '2023-08-29', '123456789', 'black-panther-sitting-next-to-black-car-with-purple-lights-wallpaper-2560x1080_14.jpg', 'FIFA', 'Medium', 3),
(3, 'User 3', '987654321', 'user3@gmail.com', 'User 3 Address', 5, 'Male', '2019-02-06', '123456789', 'pubg.jpg', 'PUBG', 'Expert', 2),
(4, 'User 4', '987654321', 'user4@gmail.com', 'User 4 Address', 2, 'Male', '2023-08-28', '123456789', 'black-panther-sitting-next-to-black-car-with-purple-lights-wallpaper-2560x1080_14.jpg', 'Call Of Duty', 'Beginner', 2),
(5, 'User 5', '98765432', 'user5@gmail.com', 'User 5 Address', 12, 'Male', '2014-10-16', '123456789', 'black-panther-sitting-next-to-black-car-with-purple-lights-wallpaper-2560x1080_14.jpg', 'Clash Of Clans', 'Expert', 6),
(6, 'User 6', '98765432', 'user6@gmail.com', ' \r\n     User 6 Address    ', 9, 'Male', '2010-07-10', '123456789', 'black-panther-sitting-next-to-black-car-with-purple-lights-wallpaper-2560x1080_14.jpg', 'Free Fire', 'Expert', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_community`
--
ALTER TABLE `tbl_community`
  ADD PRIMARY KEY (`community_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaitnt_id`);

--
-- Indexes for table `tbl_complaintcommunity`
--
ALTER TABLE `tbl_complaintcommunity`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_joinlist`
--
ALTER TABLE `tbl_joinlist`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_community`
--
ALTER TABLE `tbl_community`
  MODIFY `community_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaitnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_complaintcommunity`
--
ALTER TABLE `tbl_complaintcommunity`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_joinlist`
--
ALTER TABLE `tbl_joinlist`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
