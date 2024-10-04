-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： sql103.infinityfree.com
-- 生成日期： 2024-10-04 04:26:35
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
-- 表的结构 `cmds`
--

CREATE TABLE `cmds` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `version` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 转存表中的数据 `cmds`
--

INSERT INTO `cmds` (`id`, `title`, `author`, `version`, `description`) VALUES
(1, '作品名称 1', '作者 1', '版本 1', '描述 1'),
(2, '作品名称 2', '作者 2', '版本 2', '描述 2'),
(3, '作品名称 3', '作者 3', '版本 3', '描述 3'),
(4, '作品名称 4', '作者 4', '版本 4', '描述 4');

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
(2, '1234567890b', 0);

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
(4, 0, '?', '?', '?', 1, 0, '');

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
(3, 'zhaishis', '$2y$10$RGY6byAAWQLCAL2wmpoTnu3MASt8vUoEabKEUDbfARHgPM5bWj82O', '2024-10-02 03:09:28', 'a6e6810c-e9b8-1520-e116-5f241c3730b9', NULL, NULL, 'https://www.huaqu.club/cache/user/0/0/60cdc2093c9834e0f36d1c1c65850863.jpg?v=1727863175');

--
-- 转储表的索引
--

--
-- 表的索引 `cmds`
--
ALTER TABLE `cmds`
  ADD PRIMARY KEY (`id`);

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
-- 使用表AUTO_INCREMENT `cmds`
--
ALTER TABLE `cmds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
