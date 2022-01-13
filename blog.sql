-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-01-13 11:14:16
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `blog`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `artid` int(3) NOT NULL,
  `arttitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `artcontent` text COLLATE utf8_unicode_ci NOT NULL,
  `artposter` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `artdate` date NOT NULL DEFAULT current_timestamp(),
  `artcount` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`artid`, `arttitle`, `artcontent`, `artposter`, `artdate`, `artcount`) VALUES
(1, '文章標題1', '內容內容內容內容內容內容內容', 'w', '2021-12-14', 54),
(2, '文章標題2', '內容內容內容內容內容內容內容', 'wo', '2021-12-14', 8),
(6, '123', '123', '管理者', '2021-12-28', 3),
(7, '132', '123', '管理者', '2021-12-28', 1),
(8, '文章測試', '123', 'testuser_2', '2022-01-04', 3),
(9, '文章測試', '123', 'testuser_2', '2022-01-04', 1),
(10, '文章測試', '123', 'testuser_2', '2022-01-04', 4),
(11, '文章測試', '123', 'testuser_2', '2022-01-13', 2),
(12, '123', '123', '管理者', '2022-01-13', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `reply`
--

CREATE TABLE `reply` (
  `repid` int(3) NOT NULL,
  `artid` varchar(3) NOT NULL,
  `repcontent` text NOT NULL,
  `replyer` varchar(10) NOT NULL,
  `repdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `reply`
--

INSERT INTO `reply` (`repid`, `artid`, `repcontent`, `replyer`, `repdate`) VALUES
(1, '1', '123', '管理員', '2022-01-11'),
(2, '2', '123', '管理員', '2022-01-13');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `uauth` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`uid`, `upass`, `uname`, `uauth`) VALUES
('admin', '123', '管理者', '9'),
('testuser_2', '222', 'testuser_2', '2');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`artid`);

--
-- 資料表索引 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`repid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `artid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reply`
--
ALTER TABLE `reply`
  MODIFY `repid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
