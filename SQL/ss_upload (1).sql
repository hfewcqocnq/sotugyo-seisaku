-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-10-01 14:12:27
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
-- テーブルの構造 `ss_upload`
--

CREATE TABLE `ss_upload` (
  `idea_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `idea_title` varchar(30) NOT NULL,
  `idea_naiyou` varchar(500) NOT NULL,
  `indate` datetime NOT NULL,
  `request_count` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ss_upload`
--

INSERT INTO `ss_upload` (`idea_id`, `user_id`, `idea_title`, `idea_naiyou`, `indate`, `request_count`) VALUES
(1, 6, 'aaaa', 'aaaaaaaabbbbbbbbbbbbbbbb', '2024-09-11 22:43:43', 0),
(4, 6, 'eeeeeeee', 'eeeeeeeeeeeeeeeee', '2024-09-14 22:01:51', 0),
(5, 6, 'aaaaaaaaaa', 'ffffffffffffff', '2024-09-14 22:01:59', 0),
(6, 6, 'ああああああああああああああああああああああああああああああ', 'あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ', '2024-09-21 17:36:48', 0),
(7, 6, '21212121', '212121212', '2024-09-22 20:14:48', 0),
(9, 7, 'れたrb', 'abfqb', '2024-09-24 22:36:53', 0),
(10, 7, 'gq', 'qhhq', '2024-09-24 22:47:23', 0),
(11, 7, 'ｗｈｑｈｑ', 'q3hq', '2024-09-24 22:59:22', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ss_upload`
--
ALTER TABLE `ss_upload`
  ADD PRIMARY KEY (`idea_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ss_upload`
--
ALTER TABLE `ss_upload`
  MODIFY `idea_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
