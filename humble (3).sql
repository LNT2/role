-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 31 okt 2018 kl 14:54
-- Serverversion: 5.7.21
-- PHP-version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `humble`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', '$1$zlnYwMy4$XJXe7it14YoWwr0lrK3M4.', 'test@test.com'),
(2, 'LNO', '$2y$10$GZYzdqVqy8HOcMTYICre/.Ya9YdfRIeYjx35FG6HxD81uQFGgxYXe', 'abremen@hotmail.com');

-- --------------------------------------------------------

--
-- Tabellstruktur `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` text COLLATE utf8_swedish_ci NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `menu`
--

INSERT INTO `menu` (`id`, `course`, `parent`) VALUES
(1, 'Webbserverprogrammering', 1),
(2, 'Programmering 1', 1),
(3, 'Webbutveckling 1', 1),
(4, 'Webbutveckling 2', 1),
(5, 'Gränssittsdesign', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footer` text COLLATE utf8_swedish_ci NOT NULL,
  `title` text COLLATE utf8_swedish_ci NOT NULL,
  `background_image` text COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `page`
--

INSERT INTO `page` (`id`, `footer`, `title`, `background_image`) VALUES
(1, 'Programmed by LNT for his poor pupils :)', 'Titelinf', 'images/back.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET latin1 NOT NULL,
  `header` text CHARACTER SET latin1 NOT NULL,
  `code` text COLLATE utf8_swedish_ci NOT NULL,
  `image` text COLLATE utf8_swedish_ci,
  `alt` text COLLATE utf8_swedish_ci,
  `menu_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`id`, `text`, `header`, `code`, `image`, `alt`, `menu_id`) VALUES
(102, 'abcåäöåååå', '', '', '', '', 5),
(103, 'abcÃ¥', 'ddasdas', 'asdasda', 'sdasd', 'asdasd', 5),
(104, 'dsadasd', 'ddddsad', 'rqewrqwr', 'qerqwe', 'dxzd', 5),
(105, 'ab', 'b', 'c', 'd', 'e', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
