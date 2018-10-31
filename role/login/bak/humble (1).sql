-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 11 sep 2018 kl 12:59
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
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `chapter` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `menu`
--

INSERT INTO `menu` (`id`, `course`, `chapter`) VALUES
(1, 'Webbserverprogrammering', 'Databaser'),
(2, 'Programmering 1', ''),
(3, 'Webbutveckling 1', ''),
(4, 'Webbutveckling 2', ''),
(5, 'Gränssittsdesign', '');

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
  `text` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `header` text NOT NULL,
  `code` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `alt` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `post`
--

INSERT INTO `post` (`id`, `text`, `header`, `code`, `image`, `alt`, `menu_id`) VALUES
(78, 'a', 'b', 'c', 'd', 'e', 1),
(79, 'qwe', 'ert', 'jyujyu', 'jyujyukjy', 'yukiyuk', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
