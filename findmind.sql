-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019 年 10 月 03 日 12:28
-- サーバのバージョン： 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `coin_bankbox`
--

CREATE TABLE `coin_bankbox` (
  `ID` int(64) NOT NULL,
  `userId` int(64) NOT NULL,
  `Ruby` int(128) DEFAULT NULL,
  `Sapphire` int(128) DEFAULT NULL,
  `posts` int(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `coin_post`
--

CREATE TABLE `coin_post` (
  `Id` int(12) NOT NULL,
  `userId` int(64) NOT NULL,
  `coin_title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coin_text` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL,
  `coin_code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `coin_mind` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `coin_value` int(4) NOT NULL,
  `coin_open` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `coin_post`
--

INSERT INTO `coin_post` (`Id`, `userId`, `coin_title`, `coin_text`, `indate`, `coin_code`, `coin_mind`, `coin_value`, `coin_open`) VALUES
(3, 99999, 'dd', 'ddd', '2019-10-02 14:37:06', 'Ru_500', 'Ru', 500, 0),
(4, 99999, 'ss', 'ssss', '2019-10-02 14:59:29', 'Ru_500', 'Ru', 500, 0),
(5, 99999, 'd', 'dd', '2019-10-02 14:59:54', 'Ru_100', 'Ru', 100, 0),
(6, 99999, 'sss', 'lll\r\n', '2019-10-02 15:05:39', 'Ru_100', 'Ru', 100, 0),
(7, 99999, 'dd', 'ddd', '2019-10-02 15:09:03', 'Ru_100', 'Ru', 100, 0),
(8, 99999, 'sss', 'ssss', '2019-10-02 15:10:34', 'Ru_500', 'Ru', 500, 0),
(9, 99999, 'できた？？', 'でできた', '2019-10-02 18:30:05', 'Ru_100', 'Ru', 100, 0),
(10, 99999, 'できた？？', 'でできた', '2019-10-02 18:31:33', 'Ru_100', 'Ru', 100, 0),
(11, 99999, 'っd', 'っっd', '2019-10-03 12:18:03', 'Ru_10', 'Ru', 10, 0),
(12, 99999, 'dd', 'dd', '2019-10-03 14:05:04', 'Sa_100', 'Sa', 100, 0),
(13, 99999, 's', 'ss', '2019-10-03 14:05:42', 'Sa_10', 'Sa', 10, 0),
(14, 99999, 'dd', 'dd', '2019-10-03 14:25:36', 'Sa_10', 'Sa', 10, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `coin_user`
--

CREATE TABLE `coin_user` (
  `id` int(64) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sex` int(4) NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coin_bankbox`
--
ALTER TABLE `coin_bankbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coin_post`
--
ALTER TABLE `coin_post`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `coin_user`
--
ALTER TABLE `coin_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coin_bankbox`
--
ALTER TABLE `coin_bankbox`
  MODIFY `ID` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coin_post`
--
ALTER TABLE `coin_post`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `coin_user`
--
ALTER TABLE `coin_user`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
