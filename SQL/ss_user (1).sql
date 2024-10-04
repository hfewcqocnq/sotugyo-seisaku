-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-10-01 14:12:34
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
-- テーブルの構造 `ss_user`
--

CREATE TABLE `ss_user` (
  `user_id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `netname` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `ss_user`
--

INSERT INTO `ss_user` (`user_id`, `name`, `netname`, `lid`, `lpw`) VALUES
(6, 'あいうえお', 'あい', 'test1', '$2y$10$QzbL9lARHNOo/L0rnc/8Ter2./IoCky0dJJ6oOgFjmeSX.Jyfj6.m'),
(7, 'かきくけこ', 'かき', 'test2', '$2y$10$r/nSzhYIQsQscfcPX1u6CuPKeqnPyQUjptlybB06rzAgi3cxkpdCG'),
(8, 'たちつてと', 'たちつ', 'test3', '$2y$10$vC4KJzSVZySQqF5/hD6cFeKR13rYLU5aYrvTHQx9buqZdu9.VZJia'),
(9, 'さしすせそ', 'さし', 'test4', '$2y$10$EiW2gSZaxobiMit4ERJcE.1eyTjHdsDcOAh6mNJvorqXsM6DMNs2y');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ss_user`
--
ALTER TABLE `ss_user`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `ss_user`
--
ALTER TABLE `ss_user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
