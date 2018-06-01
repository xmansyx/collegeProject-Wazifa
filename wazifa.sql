-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 09:32 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wazifa`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `commentcontent` mediumtext CHARACTER SET utf8 NOT NULL,
  `post_idpost` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `commentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followerlist`
--

CREATE TABLE `followerlist` (
  `idfollowerlist` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `user_idfollow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followerlist`
--

INSERT INTO `followerlist` (`idfollowerlist`, `user_iduser`, `user_idfollow`) VALUES
(1, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

CREATE TABLE `friendlist` (
  `idfriendlist` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `user_idfriend` int(11) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `idmessage` int(11) NOT NULL,
  `messagecontent` mediumtext CHARACTER SET utf8 NOT NULL,
  `user_idusersender` int(11) NOT NULL,
  `user_iduserreciever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `idnotification` int(11) NOT NULL,
  `nottype` varchar(100) CHARACTER SET utf8 NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `user_iduserowner` int(11) NOT NULL,
  `isseen` binary(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postcontent` longtext NOT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `postdate`, `postcontent`, `user_iduser`) VALUES
(12, '2018-05-02 12:15:54', 'post test', 5),
(13, '2018-05-02 12:18:26', 'asd', 5),
(14, '2018-05-02 14:12:25', 'ahahah', 5),
(15, '2018-05-02 14:44:44', 'test post', 5);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `idprofile` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `thekey` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idprofile`, `user_iduser`, `thekey`, `value`, `img`) VALUES
(8, 5, '', '', 'dist/img/bf13d1d9.png'),
(9, 6, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `shareid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `age`, `password`, `firstname`, `lastname`, `type`) VALUES
(5, 'hamada2', 'ahmed@ahmed.com', 12, '1234', 'mohamed', 'ali', 'admin'),
(6, 'ahmed', 'mohmaed@ahmed.com', 12, '12345', 'ahmed', 'mohaemd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`,`post_idpost`),
  ADD KEY `fk_comment_post1_idx` (`post_idpost`),
  ADD KEY `fk_comment_user` (`userid`);

--
-- Indexes for table `followerlist`
--
ALTER TABLE `followerlist`
  ADD PRIMARY KEY (`idfollowerlist`,`user_iduser`,`user_idfollow`),
  ADD KEY `fk_followerlist_user1_idx` (`user_iduser`),
  ADD KEY `fk_followerlist_user2_idx` (`user_idfollow`);

--
-- Indexes for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD PRIMARY KEY (`idfriendlist`,`user_iduser`,`user_idfriend`),
  ADD KEY `fk_friendlist_user1_idx` (`user_iduser`),
  ADD KEY `fk_friendlist_user2_idx` (`user_idfriend`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fk_user_like` (`userid`),
  ADD KEY `fk_post_like` (`postid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`,`user_idusersender`,`user_iduserreciever`),
  ADD KEY `fk_message_user1_idx` (`user_idusersender`),
  ADD KEY `fk_message_user2_idx` (`user_iduserreciever`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`idnotification`),
  ADD KEY `fk_notification_user1_idx` (`user_iduser`),
  ADD KEY `fk_notification_user2_idx` (`user_iduserowner`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`,`user_iduser`),
  ADD KEY `fk_post_user1_idx` (`user_iduser`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idprofile`),
  ADD KEY `fk_profile_1_idx` (`user_iduser`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`shareid`),
  ADD KEY `fk_post_share` (`postid`),
  ADD KEY `fk_user_share` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followerlist`
--
ALTER TABLE `followerlist`
  MODIFY `idfollowerlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friendlist`
--
ALTER TABLE `friendlist`
  MODIFY `idfriendlist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `idprofile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `shareid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_post` FOREIGN KEY (`post_idpost`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `followerlist`
--
ALTER TABLE `followerlist`
  ADD CONSTRAINT `fk_followerlist_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_followerlist_user2` FOREIGN KEY (`user_idfollow`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `friendlist`
--
ALTER TABLE `friendlist`
  ADD CONSTRAINT `fk_friendlist_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_friendlist_user2` FOREIGN KEY (`user_idfriend`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_post_like` FOREIGN KEY (`postid`) REFERENCES `post` (`idpost`),
  ADD CONSTRAINT `fk_user_like` FOREIGN KEY (`userid`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`user_idusersender`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user2` FOREIGN KEY (`user_iduserreciever`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_notification_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_user2` FOREIGN KEY (`user_iduserowner`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `fk_post_share` FOREIGN KEY (`postid`) REFERENCES `post` (`idpost`),
  ADD CONSTRAINT `fk_user_share` FOREIGN KEY (`userid`) REFERENCES `user` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
