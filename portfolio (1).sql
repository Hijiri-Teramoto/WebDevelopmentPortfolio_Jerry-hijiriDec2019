-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.8-MariaDB
-- PHP のバージョン: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `portfolio`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(5, 'Life'),
(6, 'Memo'),
(7, 'Dairy'),
(8, 'study'),
(9, 'hobby'),
(10, 'Kredo');

-- --------------------------------------------------------

--
-- テーブルの構造 `follow`
--

CREATE TABLE `follow` (
  `following_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `follow`
--

INSERT INTO `follow` (`following_id`, `user_id`, `follower_id`) VALUES
(1, 8, 9),
(2, 10, 9),
(4, 8, 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `title_name` varchar(50) NOT NULL,
  `post_content` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`post_id`, `post_image`, `title_name`, `post_content`, `category_id`, `user_id`, `post_date`) VALUES
(5, 'S__7266344.jpg', 'This is a Chinase book', 'My Chinese Books', 5, 6, '2019-12-19'),
(8, '天安門S__7774226.jpg', '天安門', 'This is a famous building in China', 2, 8, '2019-12-20'),
(9, 'S__7266344.jpg', 'Chinese books', 'I was studying Chinese everyday', 7, 8, '2019-12-20'),
(10, 'S__7266344.jpg', 'This is a Chinase book', 'This is my books', 5, 8, '2019-12-23'),
(12, 'プロフィール写真jpg.jpg', 'It is me!!!!!', 'It is me last Jaunary', 5, 8, '2019-12-23'),
(13, 'Wechat.jpg', 'aaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 7, 13, '2019-12-27');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `bio` varchar(100) NOT NULL,
  `user_picture` varchar(100) NOT NULL DEFAULT 'human-icon-big.png',
  `user_birthday` date NOT NULL,
  `registrationDate` date NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(1) NOT NULL DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `username`, `email`, `phone`, `password`, `nationality`, `occupation`, `bio`, `user_picture`, `user_birthday`, `registrationDate`, `user_status`) VALUES
(5, 'test', 'test', 'test1', 'test@i.com', 123456, '827ccb0eea8a706c4c34a16891f84e7b', 'Japan', '学生', 'aaaaaaaaaaaaaaaaaaaa', 'IMG_0278.JPG', '2019-12-13', '2019-12-15', 'A'),
(8, 'Hijiri', 'Teramto', 'jerry', 'hijiri.teramoto.kredo@gmail.com', 966196, '827ccb0eea8a706c4c34a16891f84e7b', 'Japan', '学生', 'Nice to meet you!\r\n', 'プロフィール写真jpg.jpg', '1998-04-30', '2019-12-19', 'U'),
(10, '', '', 'test4', '', 0, '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 'human-icon-big.png', '0000-00-00', '2019-12-24', 'U'),
(13, '', '', 'John', 'john@email', 0, '827ccb0eea8a706c4c34a16891f84e7b', '', '', 'hello', '天安門S__7774226.jpg', '0000-00-00', '2019-12-27', 'U'),
(14, '', '', 'hijiri', 'hijiri@email', 0, '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 'human-icon-big.png', '0000-00-00', '2019-12-27', 'U');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- テーブルのインデックス `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`following_id`);

--
-- テーブルのインデックス `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルのAUTO_INCREMENT `follow`
--
ALTER TABLE `follow`
  MODIFY `following_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルのAUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
