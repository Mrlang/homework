-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-24 11:35:05
-- 服务器版本： 5.5.44-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swoolechat`
--

-- --------------------------------------------------------

--
-- 表的结构 `chat_content`
--

CREATE TABLE IF NOT EXISTS `chat_content` (
`id` int(20) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_get` int(1) unsigned zerofill NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `chat_content`
--

INSERT INTO `chat_content` (`id`, `content`, `sender`, `is_get`, `time`) VALUES
(1, '你好', '123', 0, '2015-08-23 12:09:34'),
(2, '在干嘛', '123', 0, '2015-08-23 12:40:36'),
(3, '撒地方', '123', 0, '2015-08-23 12:52:43'),
(4, '阿斯顿发送到', '邹游', 0, '2015-08-23 12:57:47'),
(5, '阿斯顿发送到', '邹游', 0, '2015-08-23 13:03:21'),
(6, '撒旦发生的', '邹游', 0, '2015-08-23 13:06:58'),
(7, '撒旦发生的', '邹游', 0, '2015-08-23 13:07:31'),
(8, '234523', '邹游', 0, '2015-08-23 13:07:34'),
(9, '大发光火', '123', 0, '2015-08-23 14:39:07'),
(10, 'asd ', '123', 0, '2015-08-23 15:38:38'),
(11, 'asdfsa ', '123', 0, '2015-08-23 15:41:31'),
(12, 'asdfsa ', '123', 0, '2015-08-23 15:41:33'),
(13, 'asdfsa ', '123', 0, '2015-08-23 15:41:34'),
(14, 'asdfsa ', '123', 0, '2015-08-23 15:41:34'),
(15, 'fsa ', '123', 0, '2015-08-23 15:51:30'),
(16, 'fsa ', '123', 0, '2015-08-23 15:52:22'),
(17, '撒地方', '123', 0, '2015-08-24 11:15:58'),
(18, '萨芬的', '123', 0, '2015-08-24 11:23:43'),
(19, '萨芬的', '123', 0, '2015-08-24 11:26:00');

-- --------------------------------------------------------

--
-- 表的结构 `chat_user`
--

CREATE TABLE IF NOT EXISTS `chat_user` (
`id` int(5) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_deny` int(1) unsigned zerofill NOT NULL,
  `can_del` int(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `chat_user`
--

INSERT INTO `chat_user` (`id`, `username`, `password`, `is_deny`, `can_del`) VALUES
(1, '123', '123', 0, 0),
(2, '邹游', '123', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_content`
--
ALTER TABLE `chat_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_content`
--
ALTER TABLE `chat_content`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `chat_user`
--
ALTER TABLE `chat_user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
