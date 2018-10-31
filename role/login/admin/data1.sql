-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 19 okt 2018 kl 07:42
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
-- Databas: `data1`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `address_book`
--

DROP TABLE IF EXISTS `address_book`;
CREATE TABLE IF NOT EXISTS `address_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text COLLATE utf8_swedish_ci,
  `last_name` text COLLATE utf8_swedish_ci,
  `street` text COLLATE utf8_swedish_ci,
  `city` text COLLATE utf8_swedish_ci,
  `county` text COLLATE utf8_swedish_ci,
  `country` text COLLATE utf8_swedish_ci,
  `tel` text COLLATE utf8_swedish_ci,
  `mail` text COLLATE utf8_swedish_ci,
  `postal_code` text COLLATE utf8_swedish_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `address_book`
--

INSERT INTO `address_book` (`id`, `first_name`, `last_name`, `street`, `city`, `county`, `country`, `tel`, `mail`, `postal_code`) VALUES
(59, 'John', 'Doe', NULL, NULL, NULL, 'Land', NULL, NULL, NULL),
(66, 'Mary', 'Moe', NULL, NULL, NULL, 'Land', NULL, NULL, NULL);