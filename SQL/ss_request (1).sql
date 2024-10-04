-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-10-01 14:12:18
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ss`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ss_request`
--

CREATE TABLE `ss_request` (
  `request_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `request_idea_id` int(12) NOT NULL,
  `request_idea_title` varchar(200) NOT NULL,
  `request_status` int(12) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ss_request`
--

INSERT INTO `ss_request` (`request_id`, `user_id`, `request_idea_id`, `request_idea_title`, `request_status`, `indate`) VALUES
(4, 7, 5, '', 1, '2024-09-15 08:26:31'),
(5, 7, 5, '', 1, '2024-09-15 09:05:50'),
(6, 8, 6, '', 1, '2024-09-22 00:25:21'),
(7, 7, 5, '', 1, '2024-09-29 10:23:20'),
(8, 7, 11, 'ｗｈｑｈｑ', 1, '2024-09-29 18:34:12'),
(9, 8, 6, 'ああああああああああああああああああああああああああああああ', 1, '2024-09-29 22:14:14');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ss_request`
--
ALTER TABLE `ss_request`
  ADD PRIMARY KEY (`request_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ss_request`
--
ALTER TABLE `ss_request`
  MODIFY `request_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
