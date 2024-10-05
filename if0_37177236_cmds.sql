-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： sql103.infinityfree.com
-- 生成日期： 2024-10-04 22:39:43
-- 服务器版本： 10.6.19-MariaDB
-- PHP 版本： 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `if0_37177236_cmds`
--

-- --------------------------------------------------------

--
-- 表的结构 `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` char(11) NOT NULL,
  `isUsed` tinyint(1) NOT NULL
) ;

--
-- 转存表中的数据 `codes`
--

INSERT INTO `codes` (`id`, `code`, `isUsed`) VALUES
(1, '1234567890a', 1),
(2, '1234567890b', 0),
(3, '1234567890e', 0);

-- --------------------------------------------------------

--
-- 表的结构 `Command`
--

CREATE TABLE `Command` (
  `command_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `command_text` text NOT NULL,
  `command_type` varchar(50) DEFAULT NULL,
  `block_type` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `has_condition` tinyint(1) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 转存表中的数据 `Command`
--

INSERT INTO `Command` (`command_id`, `group_id`, `command_text`, `command_type`, `block_type`, `is_active`, `has_condition`, `description`) VALUES
(4, 1, '?', '?', '?', 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `CommandGroup`
--

CREATE TABLE `CommandGroup` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 转存表中的数据 `CommandGroup`
--

INSERT INTO `CommandGroup` (`group_id`, `user_id`, `group_name`) VALUES
(1, 3, 'abc');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT current_timestamp(),
  `uuid` char(36) NOT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `imgurl` varchar(255) CHARACTER SET big5 COLLATE big5_chinese_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `regtime`, `uuid`, `verification_code`, `code`, `imgurl`) VALUES
(3, 'zhaishis', '$2y$10$RGY6byAAWQLCAL2wmpoTnu3MASt8vUoEabKEUDbfARHgPM5bWj82O', '2024-10-02 03:09:28', 'a6e6810c-e9b8-1520-e116-5f241c3730b9', NULL, NULL, 'https://www.huaqu.club/cache/user/0/0/60cdc2093c9834e0f36d1c1c65850863.jpg?v=1727863175'),
(7, 'exe', '$2y$10$QdiYKsx3fHHOGG08dmuiauG48RCWY3VEolXUW/HPn1.geyapaNs0e', '2024-10-04 09:11:02', '9cb785c1-1af2-c856-691a-d17c0d11102e', NULL, '1234567890c', NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `Command`
--
ALTER TABLE `Command`
  ADD PRIMARY KEY (`command_id`),
  ADD KEY `group_id` (`group_id`);

--
-- 表的索引 `CommandGroup`
--
ALTER TABLE `CommandGroup`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `Command`
--
ALTER TABLE `Command`
  MODIFY `command_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用表AUTO_INCREMENT `CommandGroup`
--
ALTER TABLE `CommandGroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
