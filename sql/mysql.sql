-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-12-28 02:42:33
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `item_add`
--

CREATE TABLE `item_add` (
  `add_id` int(10) UNSIGNED NOT NULL COMMENT '增購索引',
  `add_item` varchar(64) NOT NULL COMMENT '增購消耗品項目',
  `add_number` int(10) UNSIGNED NOT NULL COMMENT '增購消耗品數量',
  `add_postTime` datetime NOT NULL COMMENT '增購消耗品時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `item_get`
--

CREATE TABLE `item_get` (
  `get_id` int(10) UNSIGNED NOT NULL COMMENT '領取索引',
  `get_item` varchar(255) NOT NULL COMMENT '領取消耗品名稱',
  `get_teacher` varchar(255) NOT NULL COMMENT '領取消耗品教師',
  `get_number` int(10) UNSIGNED NOT NULL COMMENT '領取消耗品數量',
  `get_postTime` datetime NOT NULL COMMENT '領取消耗品時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `item_teacher`
--

CREATE TABLE `item_teacher` (
  `teacher_id` int(11) NOT NULL COMMENT '教師名稱索引',
  `teacher_name` varchar(255) NOT NULL COMMENT '教師名稱',
  `teacher_postTime` datetime NOT NULL COMMENT '最後修改時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `thing_item`
--

CREATE TABLE `thing_item` (
  `item_id` int(10) UNSIGNED NOT NULL COMMENT '消耗品索引',
  `item_name` varchar(255) NOT NULL COMMENT '消耗品名稱',
  `item_number` int(10) UNSIGNED NOT NULL COMMENT '消耗品數量',
  `item_postTime` datetime NOT NULL COMMENT '最後修改時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `item_add`
--
ALTER TABLE `item_add`
  ADD PRIMARY KEY (`add_id`);

--
-- 資料表索引 `item_get`
--
ALTER TABLE `item_get`
  ADD PRIMARY KEY (`get_id`);

--
-- 資料表索引 `item_teacher`
--
ALTER TABLE `item_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- 資料表索引 `thing_item`
--
ALTER TABLE `thing_item`
  ADD PRIMARY KEY (`item_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `item_add`
--
ALTER TABLE `item_add`
  MODIFY `add_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '增購索引';
--
-- 使用資料表 AUTO_INCREMENT `item_get`
--
ALTER TABLE `item_get`
  MODIFY `get_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '領取索引';
--
-- 使用資料表 AUTO_INCREMENT `item_teacher`
--
ALTER TABLE `item_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '教師名稱索引';
--
-- 使用資料表 AUTO_INCREMENT `thing_item`
--
ALTER TABLE `thing_item`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '消耗品索引';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
