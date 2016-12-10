-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time:  7 дек 2016 в 15:28
-- Версия на сървъра: 10.0.27-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webacademy`
--

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`id`, `name`, `receiver`, `about`, `message`, `date`, `is_read`) VALUES
(13, 'test company', 'sales', 'asdsad', 'asdasdassadasdasdas', 1481115431, 0),
(14, 'test company', 'tech', 'asdsad', 'asdasdassadasdasdas', 1481115431, 0),
(15, 'test company', 'support', 'asdsad', 'asdasdassadasdasdas', 1481115431, 0),
(16, 'test company', 'hr', 'asdsad', 'asdasdassadasdasdas', 1481115431, 0),
(17, 'asdasdas', 'sales', 'asdasdda', 'adsasdas', 1481116703, 0),
(18, 'asdasdas', 'tech', 'asdasdda', 'adsasdas', 1481116703, 0),
(19, 'asdasdas', 'support', 'asdasdda', 'adsasdas', 1481116703, 1),
(20, 'asdasdas', 'hr', 'asdasdda', 'adsasdas', 1481116703, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
