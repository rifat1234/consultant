-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2016 at 08:39 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consult`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `username` text NOT NULL,
  `answer` text NOT NULL,
  `q_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `up_vote` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`username`, `answer`, `q_id`, `a_id`, `up_vote`) VALUES
('tamim@gmail.com', 'Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer Test answer', 1, 1, 3),
('rifat@gmail.com', 'test answer by rifat', 1, 2, 1),
('rifat@gmail.com', 'test answer', 1, 3, 1),
('shakil@gmail.com', 'test answer\r\n', 6, 4, 2),
('hafiz@gmail.com', 'this is answer', 8, 5, 2),
('abid@gmail.com', 'answer anything', 1, 6, 0),
('tamim@gmail.com', 'answer is this', 7, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `username` text NOT NULL,
  `article` text NOT NULL,
  `title` text NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`username`, `article`, `title`, `art_id`) VALUES
('tamim@gmail.com', 'bla bla bla wrfsf asfasdf asdfasdf asdfsaf sdf sdfsdfas dfasdf asdf asd fsad fsd fs df asdf asddf sgsfkask  dfhasd fiasdfia sdif aisdfh isdhfiuasdfh fuidh iasdfh iasdfhsdf hsdfiashdfisadfisdh fisdf iuasdf hasdf hsdfiohsdfiosdfiosf dfois sdfas diiads ioi sddf ioasdfhiasdfh iasdfh isdfhaisidf shsiiiasav osh iasof ioassohfioasshfioasdfhoi dfi dfasd    sa ddsdoihfhosdfui', 'First article by Tamim', 1),
('rifat@gmail.com', 'iefjAO EA EF AFASD FSADFHASDF DFFA UHU uh uhUH uhu asudfhsduf osdfhoif rfoir woh isofhuisfiosfhi shfg iashsifhasi asfhasif asdf asidfhasdfihasdifasiudfhi asohasfiashdfiuashddfhasdiufhsid f ufhdufdufhudfhud du duf d duufhfuddfd hfud hdfudufhdu hdu h dhfhdfhduf du hud hfdu d', 'first article by rifat ', 2),
('shakil@gmail.com', 'wfasdfoi saddfo jsddofijs odf ofjdo', 'test article', 3),
('tamim@gmail.com', 'dsojjasd sdhhasdus di sidudsdc sdiuc iuasd diiidISDD H DFISHIASDI DFDFISADFHISDFISDNNASDDDNJSDND SHSUDD ihi nij ni', 'test article', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category_follow_person`
--

CREATE TABLE `category_follow_person` (
  `user_name` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_follow_person`
--

INSERT INTO `category_follow_person` (`user_name`, `c_id`, `time`) VALUES
('tamim@gmail.com', 10, '2016-04-16 18:16:38'),
('tamim@gmail.com', 23, '2016-07-22 15:39:53'),
('tamim@gmail.com', 22, '2016-08-05 19:39:57'),
('tamim@gmail.com', 15, '2016-08-05 19:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `Category_list`
--

CREATE TABLE `Category_list` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `no_followers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category_list`
--

INSERT INTO `Category_list` (`c_id`, `c_name`, `no_followers`) VALUES
(1, 'art\n', 0),
(2, 'automotive\n', 0),
(3, 'beauty\n', 0),
(4, 'business\n', 0),
(5, 'comedy\n', 0),
(6, 'education\n', 0),
(7, 'entertainment\n', 0),
(8, 'eye candy\n', 0),
(9, 'family \n', 0),
(10, 'fashion\n', 0),
(11, 'food\n', 0),
(12, 'gaming\n', 0),
(13, 'good\n', 0),
(14, 'health\n', 0),
(15, 'higher power\n', 0),
(16, 'how to get a job\n', 0),
(17, 'journals\n', 0),
(18, 'lifestyle\n', 0),
(19, 'men\n', 0),
(20, 'movies & tv\n', 0),
(21, 'music \n', 0),
(22, 'news\n', 0),
(23, 'opinionated\n', 0),
(24, 'outstanding\n', 0),
(25, 'pets & anmals\n', 0),
(26, 'photography\n', 0),
(27, 'politics\n', 0),
(28, 'relationships\n', 0),
(29, 'science \n', 0),
(30, 'self\n', 0),
(31, 'society\n', 0),
(32, 'sports\n', 0),
(33, 'tech\n', 0),
(34, 'travel\n', 0),
(35, 'women\n', 0),
(36, 'writing\n', 0),
(40, 'ios', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_question`
--

CREATE TABLE `category_question` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `c_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_question`
--

INSERT INTO `category_question` (`id`, `q_id`, `c_name`) VALUES
(1, 11, 'beauty\n'),
(2, 11, 'ios'),
(3, 11, 'art\n');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `user_name` text NOT NULL,
  `follower` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`user_name`, `follower`) VALUES
('tamim@gmail.com', 'rifat@gmail.com'),
('tamim@gmail.com', 'shakil@gmail.com'),
('rifat@gmail.com', 'shakil@gmail.com'),
('tamim@gmail.com', 'rakin@gmail.com'),
('rifat@gmail.com', 'rakin@gmail.com'),
('shakil@gmail.com', 'rakin@gmail.com'),
('tamim@gmail.com', 'hafiz@gmail.com'),
('tamim@gmail.com', 'abid@gmail.com'),
('shakil@gmail.com', 'abid@gmail.com'),
('rifat@gmail.com', 'abid@gmail.com'),
('rahul@gmail.com', 'hafiz@gmail.com'),
('shakil@gmail.com', 'tamim@gmail.com'),
('shakil@gmail.com', 'tamim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` text NOT NULL,
  `pass` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `image_url` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `pass`, `first_name`, `last_name`, `image_url`, `address`) VALUES
('tamim@gmail.com', 'tamim', 'Tamim', 'Ibn Aman', 'uploads/tamim@gmail.com', 'Dhaka'),
('rifat@gmail.com', 'rifat', 'rifat', 'monzur', 'uploads/rifat@gmail.com', 'mirpur'),
('shakil@gmail.com', 'shakil', 'shakil', 'ahmed', 'uploads/shakil@gmail.com', 'wari'),
('rahul@gmail.com', 'rahul', 'rahul', 'biswas', 'uploads/rahul@gmail.com', 'basundhara'),
('rakin@gmail.com', 'rakin', 'rakin', 'shadman', 'uploads/rakin@gmail.com', ''),
('hafiz@gmail.com', 'hafiz', 'hafiz', 'rahman', 'uploads/hafiz@gmail.com', ''),
('yeasir@gmail.com', 'yeasir', 'yeasir', 'islam', 'uploads/yeasir@gmail.com', ''),
('abid@gmail.com', 'abid', 'abid', 'jamal', 'uploads/abid@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `username`, `question`) VALUES
(1, 'tamim@gmail.com', 'This is my first question. whats up?'),
(9, 'abid@gmail.com', 'what is 2+2 ?'),
(10, 'tamim@gmail.com', 'What is Life ?'),
(11, 'tamim@gmail.com', 'What is ios ?');

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `user_name` text NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`user_name`, `a_id`) VALUES
('hafiz@gmail.com', 1),
('abid@gmail.com', 1),
('abid@gmail.com', 1),
('abid@gmail.com', 0),
('abid@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 5),
('tamim@gmail.com', 4),
('tamim@gmail.com', 1),
('tamim@gmail.com', 7),
('tamim@gmail.com', 1),
('tamim@gmail.com', 1),
('tamim@gmail.com', 1),
('tamim@gmail.com', 1),
('tamim@gmail.com', 2),
('tamim@gmail.com', 3),
('tamim@gmail.com', 7),
('tamim@gmail.com', 5),
('', 4),
('tamim@gmail.com', 0),
('tamim@gmail.com', 0),
('tamim@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `name` text NOT NULL,
  `address` text NOT NULL,
  `d_photo` text NOT NULL,
  `login_pass` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `email` text NOT NULL,
  `posts` int(11) NOT NULL,
  `upvotes` int(11) NOT NULL,
  `comments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `Category_list`
--
ALTER TABLE `Category_list`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_name` (`c_name`),
  ADD UNIQUE KEY `c_name_2` (`c_name`);

--
-- Indexes for table `category_question`
--
ALTER TABLE `category_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Category_list`
--
ALTER TABLE `Category_list`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `category_question`
--
ALTER TABLE `category_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
