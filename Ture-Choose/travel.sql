-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-10-30 15:19:51
-- 服务器版本： 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`ID`, `name`, `password`) VALUES
(1, 'wangwentong', '1234'),
(2, 'zhanghang', '1234'),
(3, 'cuilinshen', '1234');

-- --------------------------------------------------------

--
-- 表的结构 `travel_prejudice`
--

CREATE TABLE IF NOT EXISTS `travel_prejudice` (
  `name` varchar(20) NOT NULL,
  `place` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` date NOT NULL,
  `price` int(20) NOT NULL,
  `else` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='对同伴的要求';

--
-- 转存表中的数据 `travel_prejudice`
--

INSERT INTO `travel_prejudice` (`name`, `place`, `time`, `price`, `else`) VALUES
('zhanghang', 'baoding', '2015-01-01', 1000, 'wu'),
('', 'baoding', '2015-01-01', 200, ''),
('', 'baoding', '2015-01-01', 200, ''),
('', 'baoding', '2015-01-01', 1000, ''),
('', 'baoding', '2015-01-01', 1000, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
